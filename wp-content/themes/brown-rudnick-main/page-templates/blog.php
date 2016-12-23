<?php
/*
Template Name: Blog Landing
*/

global $paged;
if (!isset($paged) || !$paged){
    $paged = 1;
}

global $wp;
$current_url = home_url(add_query_arg(array(),$wp->request));
$data['link_url'] = $current_url;

$data = Timber::get_context();
$data['post'] = new TimberPost();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['header_text'] = get_field('header_text');
$parent = get_page($post->post_parent);
$parent_name = $parent->post_name;
$blog_name = $data['post']->slug;
$blog_name = str_replace("-", "_", $blog_name);
$blog_title_category_obj = get_category_by_slug($blog_name);
$data['blog_title_category_id'] = $blog_title_category_obj->term_id;

$blog_posts_args = array(
                    'category_name' => $blog_name, 
                    'numberposts' => -1,
                    'posts_per_page' => 5,
                    'paged'=> $paged,
                    'orderby' => 'date', 
                  );

// for pagination
query_posts($blog_posts_args);
$data['blog_posts'] = Timber::get_posts($blog_posts_args);
$data['blog_posts'] = array_unique($data['blog_posts']);

function sort_objects_by_date($a, $b) {
  if($a->date == $b->date){
    return 0;
  }
  return ($a->date < $b->date) ? -1 : 1;
}

usort($data['blog_posts'], "sort_objects_by_date");
$data['blog_posts'] = array_reverse($data['blog_posts']);
$data['blog_posts'] = array_slice($data['blog_posts'], 0, 5 );
$data['pagination'] = Timber::get_pagination();

$data['unfiltered'] = true;

$all_tags_for_blog_posts = [];
$all_dates_for_blog_posts = [];

foreach ($data['blog_posts'] as $key => $value) {
  array_push($all_dates_for_blog_posts, strtotime(($value->date)));
  $tags  = get_the_tags($value->ID);  
  foreach ((array)$tags as $k => $v) {
    array_push($all_tags_for_blog_posts, strtoupper($v->name));
  }
}

$data['all_tags_for_blog_posts'] = array_unique($all_tags_for_blog_posts);
$data['all_dates_for_blog_posts'] = array_unique($all_dates_for_blog_posts);

$slug = basename(get_permalink());
$data['slug'] = $slug;
$data['parent_link'] = get_permalink( $post->post_parent );

$date = get_query_var('date_query', "");

$year = substr($date, -4 );
$month = substr($date, 0, 2 );

$dates = [];
$posts_from_collection = get_posts($posts_from_collection_args);
foreach ( $posts_from_collection as $post_from_collection ) {
  array_push( $dates, strtotime($post_from_collection->post_date));
};
$data['dates'] = array_unique($dates);
$custom_posts = get_posts($post_type_args);
$ids = [];

foreach ( $custom_posts as $post ) {
  array_push($ids, $post->ID);
}

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
        <?php get_template_part('template-parts/off-canvas-search')?>
          <div id="page-full-width-homepage" class ="full-width" role="main">
            <?php Timber::render('/twig-templates/blogs_landing.twig', $data); ?>         
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div>  
        </div>  
      </div>  
    </div>  
  </body>
</html>