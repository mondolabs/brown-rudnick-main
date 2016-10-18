<?php
/*
Template Name: Law Students
*/

get_header();
$data = Timber::get_context();
$data['post'] = new TimberPost();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['sidebar_header'] = get_field('sidebar_header');
$data['sidebar_items'] = get_field('sidebar_items');
$data['header_text'] = get_field('header_text');
$data['top_text_content'] = get_field('top_text_content');
$data['ceo'] = get_field('ceo');
$data['tiles_header'] = get_field('tiles_header');
$data['tiles'] = get_field('tiles');
$data['bottom_banner_text'] = get_field('bottom_banner_text');
$data['bottom_banner_image'] = get_field('bottom_banner_image');
$data['middle_text_content'] = get_field('middle_text_content');

$slug = basename(get_permalink());
$data['slug'] = $slug;
$post_type_args = array(
  'post_type' => 'job-opening',
  'numberposts' => -1
);
$job_opening_posts = get_posts($post_type_args);
$ids = [];
foreach ( $job_opening_posts as $post ) {
  array_push($ids, $post->ID);
}
$data['locations'] = wp_get_object_terms( $ids, 'locations' );


?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/students.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>