<?php
/*
Template Name: Experience
*/

$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['experience_header_text'] = get_field('experience_header_text');
$data['experience_tile_one'] = get_field('experience_tile_one');
$data['experience_tile_two'] = get_field('experience_tile_two');
$data['experience_tile_three'] = get_field('experience_tile_three');
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";

?>
<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <?php 
      get_header(); 
    ?>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/experience.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>
