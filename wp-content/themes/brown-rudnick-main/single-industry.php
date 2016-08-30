<?php
/*
Template Name: Single Industry Page
*/
get_header();

$data = Timber::get_context();
$data['post'] = $post;
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['industry_header_text'] = get_field('industry_header_text');
$data['text_content_top'] = get_field('text_content_top');
$data['text_content_body'] = get_field('text_content_body');
$data['headlines'] = get_field('headlines');
$data['related_experience'] = get_field('related_experience');
$data['industry_group_leaders'] = get_field('industry_group_leaders');
$data['related_people'] = get_field('related_people');
$data['services_header'] = get_field('services_header');
$data['services'] = get_field('services');

?>
<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/industry.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>