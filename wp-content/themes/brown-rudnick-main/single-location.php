<?php
/*
Template Name: Single Location Page
*/
$data = Timber::get_context();
$data['post']= new TimberPost();
$data['location'] = new TimberPost();
$data['related_people'] = get_field('related_people');
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['color'] = get_field('breadcrumb_color_location');
$data['about_section_header'] = get_field('about_section_header');
$data['about_section']= get_field('about_section_body');
?>
<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <?php get_template_part('template-parts/off-canvas-search')?>
          <div id="page-full-width-homepage" class ="full-width" role="main">
            <?php Timber::render('/twig-templates/location.twig', $data); ?>      
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>