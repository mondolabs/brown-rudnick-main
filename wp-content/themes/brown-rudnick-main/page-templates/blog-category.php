<?php
/*
Template Name: Blog - Monthly
*/
function flatten_array(array $array) {
  return iterator_to_array(
  new \RecursiveIteratorIterator(new \RecursiveArrayIterator($array)));
}

$data = Timber::get_context();
$data['post'] = new TimberPost();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['header_text'] = get_field('header_text');

$data['tag'] = get_query_var('tag', "");
$data['filtered_by_category'] = true;

$parent = get_page($post->post_parent);
$parent_name = $parent->post_name;

$data['parent_name'] = $parent_name;
$data['parent_link'] = get_permalink( $post->post_parent );

$blog_name = str_replace("-", "_", $parent_name);
$blog_title_category_obj = get_category_by_slug($blog_name);
$data['blog_title_category_id'] = $blog_title_category_obj->term_id;

$blog_posts_by_tag_args = array(
  'category_name' => $blog_name,
  'numberposts' => -1,
  'tag' => $data['tag'],
);

$blog_posts_for_sidebar_args = array(
  'category_name' => $blog_name,
  'numberposts' => -1,
);

$data['blog_posts'] = Timber::get_posts($blog_posts_by_tag_args);
$data['blog_posts_for_sidebar'] = Timber::get_posts($blog_posts_for_sidebar_args);

$all_tags_for_blog_posts = [];
$all_dates_for_blog_posts = [];

foreach ($data['blog_posts_for_sidebar'] as $k => $v) {
  $tags  = get_the_tags($v->ID);  
  array_push($all_dates_for_blog_posts, strtotime(($v->date)));
  foreach ((array)$tags as $k => $v) {
    array_push($all_tags_for_blog_posts, strtoupper($v->name));
  }
}

$data['all_tags_for_blog_posts'] = array_unique($all_tags_for_blog_posts);
$data['all_dates_for_blog_posts'] = array_unique($all_dates_for_blog_posts);

array_filter($data['all_tags_for_blog_posts'], function($value) { return $value !== ''; });
array_filter($data['all_dates_for_blog_posts'], function($value) { return $value !== ''; });

$slug = basename(get_permalink());
$data['slug'] = $slug;
$data['parent_link'] = get_permalink( $post->post_parent );

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
   <div class="animsition"
        data-animsition-in-class="fade-in"
        data-animsition-in-duration="800"
        data-animsition-out-class="fade-out"
        data-animsition-out-duration="800" >
        <?php get_template_part('template-parts/off-canvas-search')?>
          <div id="page-full-width-homepage" class ="full-width" role="main">
            <?php Timber::render('/twig-templates/blogs_landing.twig', $data); ?>
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div> 
        </div> 
      </div> 
    </div> 
    </div> 
  </body>
</html>