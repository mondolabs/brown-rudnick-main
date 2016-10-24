<?php
/*
Template Name: Professional Development
*/
get_header();
$data = Timber::get_context();
$data['post'] = new TimberPost();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";

$data['sidebar_header'] = get_field('sidebar_header');
$data['sidebar_items'] = get_field('sidebar_items');
$data['header_text'] = get_field('header_text');
$data['first_paragraph'] = get_field('first_paragraph');
$data['second_paragraph'] = get_field('second_paragraph');
$data['third_paragraph'] = get_field('third_paragraph');

$data['highlights_title'] = get_field('highlights_title');
$data['highlights'] = get_field('highlights');
$data['main_body_title'] = get_field('main_body_title');

$slug = basename(get_permalink());
$data['slug'] = $slug;
?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/professional-development.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>
