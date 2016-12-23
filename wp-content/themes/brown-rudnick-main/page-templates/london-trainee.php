 <?php
/*
Template Name: London Trainee Program
*/
$data = Timber::get_context();
$data['post'] = new TimberPost();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['header_text'] = get_field('header_text');
$data['content_title'] =get_field('content_title');
$data['content_text_first'] = get_field('content_text_first');
$data['content_text_second'] = get_field('content_text_second');
$data['trainee_faq_title'] = get_field('trainee_faq_title');
$data['trainee_faq_items'] = get_field('trainee_faq_items');
$data['trainee_bottom_banner_text'] = get_field('trainee_bottom_banner_text');
$data['trainee_bottom_banner_header'] = get_field('trainee_bottom_banner_header');
$data['trainee_bottom_banner_image'] = get_field('trainee_bottom_banner_image');
$data['breadcrumb_color'] = get_field('breadcrumb_color');
$data['trainee_info'] = get_field('meet_our_trainees');
$data['trainee_testimonials'] = get_field('trainee_testimonials');
$data['trainee_lawyers'] = get_field('trainee_lawyers');
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
            <?php Timber::render('/twig-templates/london-trainee.twig', $data); ?>  
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div>
        </div>
      </div>
      </div>
    </div>
  </body>
</html>