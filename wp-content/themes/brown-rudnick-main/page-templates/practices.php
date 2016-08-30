<?php
/*
Template Name: Practices
*/
get_header();
$data = Timber::get_context();
$practice_posts_args = array(
    'post_type' =>  'practice',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page'=>-1
);
$data['practices'] = Timber::get_posts($practice_posts_args);
$data['post'] = $post;
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['practice_header_text'] = get_field('practice_header_text');
$data['practice_sidebar_header'] = get_field('practice_sidebar_header');
$data['practice_sidebar_link_1_text'] = get_field('practice_sidebar_link_1_text');
$data['practice_sidebar_link_1_url'] = get_field('practice_sidebar_link_1_url');
$data['practice_sidebar_link_2_text'] = get_field('practice_sidebar_link_2_text');
$data['practice_sidebar_link_2_url'] = get_field('practice_sidebar_link_2_url');
$data['practice_sidebar_link_3_text'] = get_field('practice_sidebar_link_3_text');
$data['practice_sidebar_link_3_url'] = get_field('practice_sidebar_link_3_url');
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";
?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/practices.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>