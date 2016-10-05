<?php
/*
Template Name: Pro Bono
*/
get_header();
$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['banner_image'] = get_field('banner_image');
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";
$data['about_sidebar_header'] = get_field('about_sidebar_header');
$data['about_sidebar_items'] = get_field('about_sidebar_items');
$data['parent'] = get_post($post->post_parent);
$data['pro_bono_header_text'] = get_field('pro_bono_header_text');
$data['pro_bono_top_content'] = get_field('pro_bono_top_content');
$data['pro_bono_bottom_banner_header'] = get_field('pro_bono_bottom_banner_header');
$data['pro_bono_bottom_banner_text_content'] = get_field('pro_bono_bottom_banner_text_content');
$data['pro_bono_bottom_banner_link_url'] = get_field('pro_bono_bottom_banner_link_url');
$data['pro_bono_bottom_banner_image'] = get_field('pro_bono_bottom_banner_image');

$slug = basename(get_permalink());
$data['slug'] = $slug;

var_dump($data['parent']);


?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/pro-bono.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>

