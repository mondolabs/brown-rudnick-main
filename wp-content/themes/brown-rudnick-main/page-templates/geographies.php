<?php
/*
Template Name: Geographies
*/
get_header();
$data = Timber::get_context();
$geographies_posts_args = array(
    'post_type' =>  'geography',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page'=>-1 
);
$data['geographies'] = Timber::get_posts($geographies_posts_args);
$data['post'] = $post;
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['geographies_header_text'] = get_field('geographies_header_text');
$data['geographies_sidebar_header'] = get_field('geographies_sidebar_header');
$data['geographies_sidebar_items'] = get_field('geographies_sidebar_items');
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";
?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/geographies.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>