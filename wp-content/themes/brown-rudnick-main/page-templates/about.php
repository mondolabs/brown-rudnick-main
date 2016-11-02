<?php
/*
Template Name: About Landing Page
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

$sidebar_slug = 'foundation-sidebar';
$args = array(
  'name'        => $sidebar_slug,
  'post_type'   => 'sidebar',
  'post_status' => 'publish',
  'numberposts' => 1
);
$data['sidebar'] = get_posts($args);

$data['text_content_top'] = get_field('text_content_top');
$data['text_content_body'] = get_field('text_content_body');
$data['bullet_section_header'] = get_field('bullet_section_header');
$data['bullets'] = get_field('bullets');
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";
?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/about.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>


