<?php
/*
Template Name: Privacy and terms of use Page
*/
$data = Timber::get_context();
$data['post'] = $post;
$data['terms_of_use_header'] = get_field('terms_of_use_header');
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
            <?php Timber::render('/twig-templates/terms-of-use.twig', $data); ?>    
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div>
           </div>
        </div>
      </div>
    </div>
  </body>
</html>