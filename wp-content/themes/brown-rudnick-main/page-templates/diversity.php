<?php
/*
Template Name: Diversity
*/
get_header();
$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['banner_image'] = get_field('banner_image');
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";
$data['about_sidebar_header'] = get_field('about_sidebar_header');
$data['about_sidebar_items'] = get_field('about_sidebar_items');
$data['diversity_top_content'] = get_field('diversity_top_content');
$data['diversity_top_content'] = get_field('diversity_top_content');
$data['diversity_video_url'] = get_field('diversity_video_url');
$data['diversity_efforts_header'] = get_field('diversity_efforts_header');
$data['diversity_efforts'] = get_field('diversity_efforts');
$slug = basename(get_permalink());
$data['slug'] = $slug;

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/diversity.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>