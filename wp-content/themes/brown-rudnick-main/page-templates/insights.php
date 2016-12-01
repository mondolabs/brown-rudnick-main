<?php
/*
Template Name: Insights
*/
$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];

$parent = get_page($post->post_parent);
$parent_name = $parent->post_name;
$sidebar_slug = $parent_name . '-sidebar';
$args = array(
  'name'        => $sidebar_slug,
  'post_type'   => 'sidebar',
  'post_status' => 'publish',
  'numberposts' => 1
);
$data['sidebar'] = get_posts($args);

$data['news_articles'] = get_field('news_articles');
$data['alerts'] = get_field('alerts');
$data['blogs'] = get_field('blogs');

$data['contact_name'] = get_field('contact_name');
$data['contact_title'] = get_field('contact_title');
$data['contact_phone_number'] = get_field('contact_phone_number');
$data['contact_email'] = get_field('contact_email');
$data['publications_header'] = get_field('publications_header');
$data['publications'] = get_field('publications');

// begin generate options for advanced search fields
$all_posts_args = array(
  'post_type' => array('article', 'event', 'alert'),
  'numberposts' => -1,
  'posts_per_page' => -1,
  'orderby' => 'date',
  'post_status' => array( 'publish', 'future')
);

$all_dates = [];
$all_posts = get_posts($all_posts_args);
$all_ids = [];

foreach ( $all_posts as $all_post ) {
  array_push( $all_dates, strtotime($all_post->post_date));
  array_push( $all_ids, $all_post->ID);
};

$data['all_dates'] = array_unique($all_dates);
$data['all_geographies'] = wp_get_object_terms( $all_ids, 'geography' );
$data['all_industries'] = wp_get_object_terms( $all_ids, 'industry' );
$data['all_practices'] = wp_get_object_terms( $all_ids, 'practice' );
// end generate options for advanced search fields

$slug = basename(get_permalink());
$data['slug'] = $slug;

?>
<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
   <?php get_template_part('template-parts/off-canvas-search')?>
          <div id="page-full-width-homepage" class ="full-width" role="main">
            <?php Timber::render('/twig-templates/insights.twig', $data); ?>  
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>