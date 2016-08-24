<?php
/*
Template Name: Single Practice Page
*/
get_header();

$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );
$data['featured_image_url'] = $data['featured_image_url'][0];
$people_posts_args = array(
    'post_type' =>  'people',
    'orderby' => 'title',
    'order' => 'ASC',
     'posts_per_page'=>-1
);
$data['people'] = Timber::get_posts($people_posts_args);


?>
<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/practice.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>