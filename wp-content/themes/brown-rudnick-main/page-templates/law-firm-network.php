<?php
/*
Template Name: Law Firm Network Page
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
$data['banner_image'] = get_field('banner_image');
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";
$data['law_firm_network_header_text'] = get_field('law_firm_network_header_text');
$data['law_firm_network_sidebar_header'] = get_field('law_firm_network_sidebar_header');
$data['law_firm_network_sidebar_items'] = get_field('law_firm_network_sidebar_items');
$data['text_content_top'] = get_field('text_content_top');
$data['text_content_body'] = get_field('text_content_body');
$data['bullet_section_header'] = get_field('bullet_section_header');
$data['bullets'] = get_field('bullets');
$data['bullet_section_bottom_content'] = get_field('bullet_section_bottom_content');
$data['bullet_section_notice'] = get_field('bullet_section_notice');
$slug = basename(get_permalink());
$data['slug'] = $slug;
?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/law-firm-network.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>


