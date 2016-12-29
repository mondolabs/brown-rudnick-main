<?php
/*
Template Name: Geographies
*/
$data = Timber::get_context();
$geographies_posts_args = array(
    'post_type' =>  'geography',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page'=>-1 
);
$data['experiences'] = Timber::get_posts($geographies_posts_args);
$data['post'] = $post;
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['header_text'] = get_field('header_text');
$sidebar_slug = 'experience-sidebar';
$args = array(
  'name'        => $sidebar_slug,
  'post_type'   => 'sidebar',
  'post_status' => 'publish',
  'numberposts' => 1
);
$data['sidebar'] = get_posts($args);
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";
$slug = basename(get_permalink());
$data['slug'] = $slug;
$data['parent_link'] = get_permalink( $post->post_parent );
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
            <?php Timber::render('/twig-templates/experience_landing.twig', $data); ?>     
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>