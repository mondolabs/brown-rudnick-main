<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

$data = Timber::get_context();
    
get_header(); ?>
<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/default.twig', $data); ?>
    </div>
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer();?>
  </body>
</html>

