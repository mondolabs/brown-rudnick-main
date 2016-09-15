<?php
/*
Template Name: Articles
*/


get_header();

$data = Timber::get_context();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['header_text'] = get_field('header_text');
$data['sidebar_header'] = get_field('sidebar_header');
$data['sidebar_items'] = get_field('sidebar_items');
$data['contact_name'] = get_field('contact_name');
$data['contact_title'] = get_field('contact_title');
$data['contact_phone_number'] = get_field('contact_phone_number');
$data['contact_email'] = get_field('contact_email');
$data['top_content'] = get_field('top_content');
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";
$slug = basename(get_permalink());
$data['slug'] = $slug;

$geography = get_query_var('geography_query', "Geographies");
$industry = get_query_var('industry_query', "Industries");
$practice = get_query_var('practice_query', "Practices");

$data['geographies'] = get_terms( 
  array(
    'taxonomy' => 'geography',
    'hide_empty' => true,
  )
);

$data['industries'] = get_terms( 
  array(
    'taxonomy' => 'industry',
    'hide_empty' => true,
  )
);

$data['practices'] = get_terms( 
  array(
    'taxonomy' => 'practice',
    'hide_empty' => true,
  )
);


$alerts_args = array(
  'post_type' =>  'alert',
  'tax_query' => array(
    'relation' => 'AND',
    array(
        'taxonomy' => 'geography',
        'field' => 'slug',
        'terms' => array( $geography )
    ),
    array(
        'taxonomy' => 'industry',
        'field' => 'slug',
        'terms' => array( $industry )
    ),
    array(
        'taxonomy' => 'practice',
        'field' => 'slug',
        'terms' => array( $practice )
    )
  ),
  'max_num_pages'=> 5,
  'orderby' => 'date',
  'order' => 'DESC'
);

$data['alerts'] = Timber::get_posts($alerts_args);
// var_dump($data['alerts']);

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/insight_landing.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>