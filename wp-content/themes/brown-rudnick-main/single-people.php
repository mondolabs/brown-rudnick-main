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
$data['card_url'] = $card;
$data['awards_and_honors']= get_field('awards_and_honors');
$data['breadcrumb_color'] = get_field('breadcrumb_color');
$data['print_logo_url'] = get_home_url() . '/wp-content/themes/brown-rudnick-main/assets/images/BR-logo-for-nav.png';
?>
<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div class="animsition"
        data-animsition-in-class="fade-in"
        data-animsition-in-duration="800"
        data-animsition-out-class="fade-out"
        data-animsition-out-duration="800" >
    <?php get_template_part('template-parts/off-canvas-search')?>
          <div id="page-full-width-homepage" class ="full-width" role="main">
            <?php Timber::render('/twig-templates/person.twig', $data); ?>   
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div> 
          </div>  
        </div>  
      </div>  
    </div>  
  </body>
</html>