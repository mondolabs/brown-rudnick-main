<?php
/*
Template Name: Sitemap Page
*/
$data = Timber::get_context();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['sitemap_header_text'] = get_field('sitemap_header_text');
$data['post'] = $post;
?>
<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <?php get_template_part('template-parts/off-canvas-search')?>
          <div id="page-full-width-homepage" class ="full-width" role="main">
            <?php Timber::render('/twig-templates/sitemap.twig', $data); ?>    
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div>  
        </div>  
      </div>  
    </div>  
  </body>
</html>