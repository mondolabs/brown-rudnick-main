<?php
/*
Template Name: Publication Request
*/
get_header();

$data = Timber::get_context();
$data['post'] = $post;
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['pub_request_header_text'] = get_field('request_publication_header_text');
?>


<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
  <h1>
  </h1>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/publication-request.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>