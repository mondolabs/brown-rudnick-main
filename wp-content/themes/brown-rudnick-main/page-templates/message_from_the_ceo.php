<?php
/*
Template Name: Message From the CEO
*/
get_header();
$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['banner_image'] = get_field('banner_image');
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";
$data['about_sidebar_header'] = get_field('about_sidebar_header');
$data['about_sidebar_items'] = get_field('about_sidebar_items');
$data['ceo_header_text'] = get_field('ceo_header_text');
$data['ceo_image'] = get_field('ceo_image');
$data['ceo_name'] = get_field('ceo_name');
$data['ceo_title'] = get_field('ceo_title');
$slug = basename(get_permalink());
$data['slug'] = $slug;

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/message-from-the-ceo.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>