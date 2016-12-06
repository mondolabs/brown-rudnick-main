<?php
/*
Template Name: Single Practice Page
*/
$data = Timber::get_context();
$data['post'] = $post;
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['practice_header_text'] = get_field('practice_header_text');
$data['text_content_top'] = get_field('text_content_top');
$data['text_content_body'] = get_field('text_content_body');
$data['headlines'] = get_field('headlines');
$data['related_experience'] = get_field('related_experience');
$data['practice_group_leaders'] = get_field('practice_group_leaders');
$data['related_people'] = get_field('practice_related_people');
$data['services_header'] = get_field('services_header');
$data['services'] = get_field('services');
$data['breadcrumb_color'] = get_field('breadcrumb_color');
?>
<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
  <?php get_template_part('template-parts/off-canvas-search')?>
          <div id="page-full-width-homepage" class ="full-width" role="main">
            <?php Timber::render('/twig-templates/practice.twig', $data); ?>
          </div>  
        <?php do_action( 'foundationpress_after_content' ); ?>
        <?php get_footer(); ?>
        </div> 
      </div> 
    </div> 
  </body>
</html>