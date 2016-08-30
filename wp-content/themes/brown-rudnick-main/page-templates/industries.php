<?php
/*
Template Name: Industries
*/
get_header();
$data = Timber::get_context();
$industries_posts_args = array(
    'post_type' =>  'industry',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page'=>-1 
);
$data['industries'] = Timber::get_posts($industries_posts_args);
$data['post'] = $post;
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['industries_header_text'] = get_field('industries_header_text');
$data['industries_sidebar_header'] = get_field('industries_sidebar_header');
$data['industries_sidebar_link_1_text'] = get_field('industries_sidebar_link_1_text');
$data['industries_sidebar_link_1_url'] = get_field('industries_sidebar_link_1_url');
$data['industries_sidebar_link_2_text'] = get_field('industries_sidebar_link_2_text');
$data['industries_sidebar_link_2_url'] = get_field('industries_sidebar_link_2_url');
$data['industries_sidebar_link_3_text'] = get_field('industries_sidebar_link_3_text');
$data['industries_sidebar_link_3_url'] = get_field('industries_sidebar_link_3_url');
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";
?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/industries.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>