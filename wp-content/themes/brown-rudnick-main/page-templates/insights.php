<?php
/*
Template Name: Insights
*/

$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];

$data['insights_sidebar_header'] = get_field('insights_sidebar_header');
$data['insights_sidebar_items'] = get_field('insights_sidebar_items');

$data['news_articles'] = get_field('news_articles');
$data['alerts'] = get_field('alerts');
$data['blogs'] = get_field('blogs');

$data['contact_name'] = get_field('contact_name');
$data['contact_title'] = get_field('contact_title');
$data['contact_phone_number'] = get_field('contact_phone_number');
$data['contact_email'] = get_field('contact_email');
$data['publications_header'] = get_field('publications_header');
$data['publications'] = get_field('publications');

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
      <?php Timber::render('/twig-templates/insights.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>