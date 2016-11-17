<?php
/*
Template Name: Sitemap Page
*/
get_header();
$data = Timber::get_context();
$data['sitemap_header_text'] = get_field('sitemap_header_text');
$data['post'] = $post;

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/sitemap.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>