<?php
/*
Template Name: Blogs
*/

$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];

$data['blogs'] = get_field('blogs');

$sidebar_slug = 'insights-sidebar';
$args = array(
  'name'        => $sidebar_slug,
  'post_type'   => 'sidebar',
  'post_status' => 'publish',
  'numberposts' => 1
);
$data['sidebar'] = get_posts($args);

$data['contact_name'] = get_field('contact_name');
$data['contact_title'] = get_field('contact_title');
$data['contact_phone_number'] = get_field('contact_phone_number');
$data['contact_email'] = get_field('contact_email');

$slug = basename(get_permalink());
$data['slug'] = $slug;

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
            <?php Timber::render('/twig-templates/blogs.twig', $data); ?>
          <?php do_action( 'foundationpress_after_content' ); ?>
          <?php get_footer(); ?>
          </div>  
        </div>  
      </div>  
    </div> 
    </div>  
  </body>
</html>