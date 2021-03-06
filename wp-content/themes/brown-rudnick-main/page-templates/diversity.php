<?php
/*
Template Name: Diversity
*/
$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['banner_image'] = get_field('banner_image');
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";

$parent = get_page($post->post_parent);
$parent_name = $parent->post_name;
$sidebar_slug = $parent_name . '-sidebar';
$args = array(
  'name'        => $sidebar_slug,
  'post_type'   => 'sidebar',
  'post_status' => 'publish',
  'numberposts' => 1
);
$data['sidebar'] = get_posts($args);

$data['diversity_header_text'] = get_field('diversity_header_text');
$data['diversity_top_content'] = get_field('diversity_top_content');
$data['diversity_video_url'] = get_field('diversity_video_url');
$data['diversity_efforts_header'] = get_field('diversity_efforts_header');
$data['diversity_efforts'] = get_field('diversity_efforts');
$slug = basename(get_permalink());
$data['slug'] = $slug;

$data['parent_link'] = get_permalink( $parent );

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
    <?php get_template_part('template-parts/diversity-statement') ?>   
        <div id="page-full-width-homepage" class ="full-width" role="main">
          <?php Timber::render('/twig-templates/diversity.twig', $data); ?> 
          <?php do_action( 'foundationpress_after_content' ); ?>
          <?php get_footer(); ?>
        </div> 
        </div> 
      </div> 
    </div>
     </div> 
  </body>
</html>