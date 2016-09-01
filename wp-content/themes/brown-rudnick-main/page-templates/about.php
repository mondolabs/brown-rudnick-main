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
$data['abouts'] = Timber::get_posts($about_posts_args);
$data['post'] = $post;
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['about_header_text'] = get_field('about_header_text');
$data['about_sidebar_header'] = get_field('about_sidebar_header');
$data['about_sidebar_link_1_text'] = get_field('about_sidebar_link_1_text');
$data['about_sidebar_link_1_url'] = get_field('about_sidebar_link_1_url');
$data['about_sidebar_link_2_text'] = get_field('about_sidebar_link_2_text');
$data['about_sidebar_link_2_url'] = get_field('about_sidebar_link_2_url');
$data['about_sidebar_link_3_text'] = get_field('about_sidebar_link_3_text');
$data['about_sidebar_link_3_url'] = get_field('about_sidebar_link_3_url');
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