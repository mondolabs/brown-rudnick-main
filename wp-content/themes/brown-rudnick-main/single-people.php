<?php
/*
Template Name: Single People Page
*/
$data = Timber::get_context();
$data['person'] = new TimberPost();
$data['specialization'] = get_field('specialization');
$data['related_experiences'] = get_field('related_experiences');
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$card = get_field('v_card');
$data['card_title'] = $card['filename'];
$data['breadcrumb_color'] = get_field('breadcrumb_color');
?>
<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <?php get_template_part('template-parts/off-canvas-search')?>
          <div id="page-full-width-homepage" class ="full-width" role="main">
            <?php Timber::render('/twig-templates/person.twig', $data); ?>   
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div>  
        </div>  
      </div>  
    </div>  
  </body>
</html>