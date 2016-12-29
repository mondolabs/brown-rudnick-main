<?php
/*
Template Name: Single Press Release Page
*/
$data = Timber::get_context();
$data['post'] = new TimberPost();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['related_experiences'] = get_field('related_experiences');
$data['parent_page_name'] = "Press Releases";
$data['parent_page_url'] = "/press";
$data['breadcrumb_color'] = get_field('breadcrumb_color');

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
            <?php Timber::render('/twig-templates/individual_insight.twig', $data); ?>     
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div>
          </div> 
        </div> 
      </div> 
    </div> 
  </body>
</html>