<?php
/*
Template Name: Privacy and terms of use Page
*/
get_header();
$data = Timber::get_context();
$data['post'] = $post;
$data['terms_of_use_header'] = get_field('terms_of_use_header');
?>


<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/terms-of-use.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>