<?php
/*
Template Name: Lawyers and Staff
*/

get_header();
$data = Timber::get_context();
$data['post'] = new TimberPost();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";
$data['sidebar_header'] = get_field('sidebar_header');
$data['lawyers_sidebar_items'] = get_field('lawyers_sidebar_items');
$data['header_text'] = get_field('header_text');
$data['top_text_header'] = get_field('top_text_header');
$data['top_text_content'] = get_field('top_text_content');
$data['middle_text_header'] = get_field('middle_text_header');
$data['middle_text_content'] = get_field('middle_text_content');
$data['features_header'] = get_field('features_header');
$data['lawyers_features'] = get_field('lawyers_features');
$data['features_bottom_text'] = get_field('features_bottom_text');
$data['benefits_header'] = get_field('benefits_header');
$data['lawyers_benefits'] = get_field('lawyers_benefits');
$data['bottom_banner_text'] = get_field('bottom_banner_text');
$data['bottom_banner_image'] = get_field('bottom_banner_image');

$slug = basename(get_permalink());
$data['slug'] = $slug;

$post_type_args = array(
  'post_type' => 'job-opening',
  'numberposts' => -1
);


$job_opening_posts = get_posts($post_type_args);
$ids = [];
// get array of IDs for all custom post types
foreach ( $job_opening_posts as $post ) {
  array_push($ids, $post->ID);
}


$data['job_opportunities'] = Timber::get_posts($post_type_args);
// get custom post type object taxonomy with the IDs
$data['locations'] = wp_get_object_terms( $ids, 'locations' );
// filter the location when we reload the page
$data['location'] = get_query_var('job_location_query', "");

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/lawyers.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>




