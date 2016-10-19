<?php
/*
Template Name: London Trainee Program
*/
get_header();
$data = Timber::get_context();
$data['post'] = new TimberPost();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['header_text'] = get_field('header_text');
$data['content_title'] =get_field('content_title');
$data['content_text_first'] = get_field('content_text_first');
$data['trainee_faq_title'] = get_field('trainee_faq_title');
$data['trainee_faq_items'] = get_field('trainee_faq_items');
$data['trainee_bottom_banner_text_content'] = get_field('trainee_bottom_banner_text_content');
$data['trainee_bottom_banner_header'] = get_field('trainee_bottom_banner_header');
$data['trainee_bottom_banner_image'] = get_field('trainee_bottom_banner_image');

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/london-trainee.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>