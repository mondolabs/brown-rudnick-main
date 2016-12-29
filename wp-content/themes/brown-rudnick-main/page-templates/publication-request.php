<?php
/*
Template Name: Publication Request
*/
$data = Timber::get_context();
$data['post'] = $post;
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['pub_request_header_text'] = get_field('publication_request_header_text');
$data['pub_request_excerpt'] = get_field('publication_request_excerpt');
$data['pub_request_title'] = get_the_title();
$alphabet = range('A', 'Z');
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
              <?php Timber::render('/twig-templates/publication-request.twig', $data); ?>
            </div>  
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>