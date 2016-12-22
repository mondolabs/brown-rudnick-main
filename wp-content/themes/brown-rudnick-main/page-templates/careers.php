<?php
/*
Template Name: Careers Landing Page
*/
$data = Timber::get_context();
$practice_posts_args = array(
    'post_type' =>  'practice',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page'=>-1
);
$post = new TimberPost();
$data['post'] = $post;
$data['careers_header_text'] = get_field('careers_header_text');

$sidebar_slug = 'careers-sidebar';
$args = array(
  'name'        => $sidebar_slug,
  'post_type'   => 'sidebar',
  'post_status' => 'publish',
  'numberposts' => 1
);
$data['sidebar'] = get_posts($args);

$data['careers_tile_one'] = get_field('careers_tile_one');
$data['careers_tile_two'] = get_field('careers_tile_two');
$data['careers_tile_three'] = get_field('careers_tile_three');
$data['careers_tile_four'] = get_field('careers_tile_four');
$data['careers_top_text'] = get_field('careers_top_text');
$data['careers_tiles_header'] = get_field('careers_tiles_header');
$data['careers_tile_one_link'] = get_field('careers_tile_one_link');
$data['careers_tile_two_link'] = get_field('careers_tile_two_link');
$data['careers_tile_three_link'] = get_field('careers_tile_three_link');
$data['careers_tile_four_link'] = get_field('careers_tile_four_link');
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];

$slug = basename(get_permalink());
$data['slug'] = $slug;
$parent = get_page($post->post_parent);
$parent_name = $parent->post_name;
$data['parent_link'] = get_permalink( $post->post_parent );
?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <?php get_template_part('template-parts/off-canvas-search') ?>
    <?php get_template_part('template-parts/diversity-statement') ?>
          <div id="page-full-width-homepage" class ="full-width" role="main">
            <?php Timber::render('/twig-templates/careers.twig', $data); ?> 
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div> 
        </div> 
      </div> 
    </div> 
  </body>
</html>