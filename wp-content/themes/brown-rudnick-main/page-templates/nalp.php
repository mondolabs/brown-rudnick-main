<?php
/*
Template Name: NALP Report
*/
$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['header_text'] =  get_field('header_text');
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['middle_text_content'] = get_field('middle_text_content');
$data['nalp_report_banner_header'] = get_field('nalp_report_banner_header');
$data['nalp_report_banner_text_content'] = get_field('nalp_report_banner_text_content');
$data['nalp_bottom_banner_image'] = get_field('nalp_bottom_banner_image');
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
            <?php Timber::render('/twig-templates/nalp.twig', $data); ?>      
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div>
        </div>
      </div>
      </div>
    </div>
  </body>
</html>