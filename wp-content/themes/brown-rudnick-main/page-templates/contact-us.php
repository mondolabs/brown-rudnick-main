<?php
/*
Template Name: Contact Us Page
*/

$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['contact_us_header_text'] = get_field('contact_us_header_text');
$data['bottom_banner_header_text'] = get_field('bottom_banner_header_text');
$data['bottom_banner_content_text'] = get_field('bottom_banner_content_text');
$data['bottom_banner_image'] = get_field('bottom_banner_image');
$alphabet = range('A', 'Z');
?>
<html> 
  <head>
    <?php wp_head()?>
  </head>
    <body>
      <?php get_template_part('template-parts/off-canvas-search')?>
            <div id="page-full-width-homepage" class ="full-width" role="main">
              <?php Timber::render('/twig-templates/contact-us.twig', $data); ?>            
              <?php do_action( 'foundationpress_after_content' ); ?>
              <?php get_footer(); ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>