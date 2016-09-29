<?php
/*
Template Name: People Landing Page
*/
get_header();
$data = Timber::get_context();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['header_text'] = get_field('header_text');
$data['sidebar_header'] = get_field('sidebar_header');
$data['sidebar_items'] = get_field('sidebar_items');
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";
$data['alphabet'] = range('A', 'Z');

$post_type_args = array(
  'post_type' => 'people',
  'numberposts' => -1,
  'posts_per_page' => -1
);

$custom_posts = get_posts($post_type_args);
$ids = [];

foreach ( $custom_posts as $post ) {
  array_push($ids, $post->ID);
}

$data['geographies'] = wp_get_object_terms( $ids, 'geography' );
$data['industries'] = wp_get_object_terms( $ids, 'industry' );
$data['practices'] = wp_get_object_terms( $ids, 'practice' );
$data['languages'] = wp_get_object_terms( $ids, 'languages' );
$data['locations'] = wp_get_object_terms( $ids, 'locations' );
$data['admissions'] = wp_get_object_terms( $ids, 'admissions' );
$data['educations'] = wp_get_object_terms( $ids, 'educations' );

$geography = get_query_var('geography_query', "GEOGRAPHIES");
$industry = get_query_var('industry_query', "INDUSTRIES");
$practice = get_query_var('practice_query', "PRACTICES");
$language = get_query_var('language_query', "LANGUAGES");
$location = get_query_var('location_query', "LOCATIONS");
$admission = get_query_var('admission_query', "ADMISSIONS");
$education = get_query_var('education_query', "EDUCATION");

$geography =  str_replace("-and-", " & ", $geography);
$industry =  str_replace("-and-", " & ", $industry);
$practice =  str_replace("-and-", " & ", $practice);
$language =  str_replace("-and-", " & ", $language);
$location =  str_replace("-and-", " & ", $location);
$admission =  str_replace("-and-", " & ", $admission);
$education =  str_replace("-and-", " & ", $education);

$geography =  str_replace("-slash-", " / ", $geography);
$industry =  str_replace("-slash-", " / ", $industry);
$practice =  str_replace("-slash-", " / ", $practice);
$language =  str_replace("-slash-", " / ", $language);
$location =  str_replace("-slash-", " / ", $location);
$admission =  str_replace("-slash-", " / ", $admission);
$education =  str_replace("-slash-", " / ", $education);

$people_args = array(
    'post_type' =>  'people',
    'orderby' => 'meta_value',
    'meta_key'  => 'last_name',
    'order' => 'ASC',
    'posts_per_page'=>-1
);

if( ($geography !== "GEOGRAPHIES") || ( $industry !== "INDUSTRIES") || ($practice !== "PRACTICES") || ($language !== "LANGUAGES") || ($location !== "LOCATIONS") || ($admission !== "ADMISSIONS") || ($education !== "EDUCATION")) {
  $people_args["tax_query"] = array( 'relation' => 'AND' );
  if ( $geography !== "GEOGRAPHIES" ) {
    $geography_term_query_array = array('taxonomy' => 'geography', 'field' => 'slug', 'terms' => array( $geography));
    array_push($people_args['tax_query'], $geography_term_query_array );
  }
  if ( $industry !== "INDUSTRIES" ) {
    $industry_term_query_array = array('taxonomy' => 'industry', 'field' => 'slug', 'terms' => array( $industry));
    array_push($people_args['tax_query'], $industry_term_query_array );
  }
  if ( $practice !== "PRACTICES" ) {
    $practice_term_query_array = array('taxonomy' => 'practice', 'field' => 'slug', 'terms' => array( $practice));
    array_push($people_args['tax_query'], $practice_term_query_array );
  }
  if ( $language !== "LANGUAGES" ) {
    $language_term_query_array = array('taxonomy' => 'languages', 'field' => 'slug', 'terms' => array( $language));
    array_push($people_args['tax_query'], $language_term_query_array );
  }
  if ( $location !== "LOCATIONS" ) {
    $location_term_query_array = array('taxonomy' => 'locations', 'field' => 'slug', 'terms' => array( $location));
    array_push($people_args['tax_query'], $location_term_query_array );
  }
  if ( $admission !== "ADMISSIONS" ) {
    $admission_term_query_array = array('taxonomy' => 'admissions', 'field' => 'slug', 'terms' => array( $admission));
    array_push($people_args['tax_query'], $admission_term_query_array );
  }
    if ( $education !== "EDUCATION" ) {
    $education_term_query_array = array('taxonomy' => 'educations', 'field' => 'slug', 'terms' => array( $education));
    array_push($people_args['tax_query'], $education_term_query_array );
  }
}


$data['people'] = Timber::get_posts($people_args);
$data['people'] = array_unique($data['people']);

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/people.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>
