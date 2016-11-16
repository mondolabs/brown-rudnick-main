<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

$data = Timber::get_context();
$data['missing_page_header_text'] = get_field('missing_page_header_text');
$data['missing_page_image'] = get_field('missing_page_image');
$data['missing_page_header'] = get_field('missing_page_header');
$data['missing_page_paragraph'] = get_field('missing_page_paragraph');
    
get_header(); ?>
<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
	  <div id="page-full-width-homepage" class ="full-width" role="main">
	  	<?php Timber::render('/twig-templates/404.twig', $data); ?>
	  </div>
		<?php do_action( 'foundationpress_after_content' ); ?>
		<?php get_footer();?>
  </body>
</html>


