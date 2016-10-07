<?php
/*
Template Name: NALP Report
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



$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );

$data['featured_image_url'] = $data['featured_image_url'][0];

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/nalp.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>
