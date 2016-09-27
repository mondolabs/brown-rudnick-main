<?php
/*
Template Name: Locations
*/
get_header();
$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['banner_image'] = get_field('banner_image');
$data['locations_header_text'] = get_field('locations_header_text');
$data['banner_image'] = get_field('banner_image');
$data['bottom_banner_image'] = get_field('bottom_banner_image');
$data['bottom_banner_header_text'] = get_field('bottom_banner_header_text');
$data['bottom_banner_content_text'] = get_field('bottom_banner_content_text');
$data['locations'] = get_field('locations');
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";


?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/locations.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>



