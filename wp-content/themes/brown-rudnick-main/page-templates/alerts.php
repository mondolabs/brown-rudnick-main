<?php
/*
Template Name: Alerts & Bulletins
*/
get_header();
$data = Timber::get_context();

$featured_posts_args = array(
    'post_type' =>  'alert',
    'orderby' => 'date',
    'order' => 'DESC',
    'max_num_pages'=>5
);
$data['featured_posts'] = Timber::get_posts($featured_posts_args);
$data['top_content'] = get_field('top_content');
$data['media_inquiry_name'] = get_field('media_inquiry_name');
$data['media_inquiry_title'] = get_field('media_inquiry_title');
$data['media_inquiry_phone_number'] = get_field('media_inquiry_phone_number');
$data['media_inquiry_email'] = get_field('media_inquiry_email');
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/alerts.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>



