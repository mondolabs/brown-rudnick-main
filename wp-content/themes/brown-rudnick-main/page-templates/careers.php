<?php
/*
Template Name: Careers Landing Page
*/
get_header();
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
$data['careers_sidebar_header'] = get_field('careers_sidebar_header');
$data['careers_sidebar_items'] = get_field('careers_sidebar_items');
$data['careers_tile_one'] = get_field('careers_tile_one');
$data['careers_tile_two'] = get_field('careers_tile_two');
$data['careers_tile_three'] = get_field('careers_tile_three');
$data['careers_tile_four'] = get_field('careers_tile_four');
$data['careers_top_text'] = get_field('careers_top_text');
$data['careers_tiles_header'] = get_field('careers_tiles_header');
$data['bullet_section_header'] = get_field('bullet_section_header');
$data['bullets'] = get_field('bullets');
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";
$data['white_hover_arrow'] = get_template_directory_uri() . "/assets/images/white-long-arrow.svg";

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/careers.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>