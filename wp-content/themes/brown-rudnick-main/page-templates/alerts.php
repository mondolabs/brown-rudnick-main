<?php
/*
Template Name: Insight Landing Page
*/
get_header();
$data = Timber::get_context();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['header_text'] = get_field('header_text');
$data['sidebar_header'] = get_field('sidebar_header');
$data['sidebar_items'] = get_field('sidebar_items');
$data['contact_name'] = get_field('contact_name');
$data['contact_title'] = get_field('contact_title');
$data['contact_phone_number'] = get_field('contact_phone_number');
$data['contact_email'] = get_field('contact_email');
$data['top_content'] = get_field('top_content');
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";
$slug = basename(get_permalink());
$data['slug'] = $slug;

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/insight_landing.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>