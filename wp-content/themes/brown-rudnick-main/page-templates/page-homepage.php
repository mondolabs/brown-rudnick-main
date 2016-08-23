<?php
/*
Template Name: Homepage
*/

get_header();

$data = Timber::get_context();

$post = new TimberPost();
$data['post'] = $post;
$data['posts'] = Timber::get_posts();
$data['main_image_id'] = $post->contact_us_image;
$data['homepage_text_section'] = get_field('homepage_text_section');
$data['have_rows_homepage_slider'] = have_rows('homepage_slider');
$featured_posts_args = array(
    'post_type' =>  array('news', 'emerging_technology', 'event', 'crime_watch', 'government_contract', 'alert'),
    'orderby' => 'date',
    'order' => 'DESC',
    'max_num_pages'=> 5
);
$data['featured_posts'] = Timber::get_posts($featured_posts_args);
$data['homepage_section_3_image'] = get_field('homepage_section_3_image');
$data['homepage_section_3_button_link'] = get_field('homepage_section_3_button_link');
$data['homepage_section_3_description'] = get_field('homepage_section_3_description');
$data['homepage_section_3_header'] = get_field('homepage_section_3_header');
?>
<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('slider.twig', $data); ?>
      <?php Timber::render('blog-tiles.twig', $data); ?>
      <?php Timber::render('homepage-section-3.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>