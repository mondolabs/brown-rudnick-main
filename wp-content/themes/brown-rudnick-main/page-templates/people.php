<?php
/*
Template Name: People Landing Page
*/

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

$geography = get_query_var('geography_query', "");
$industry = get_query_var('industry_query', "");
$practice = get_query_var('practice_query', "");
$language = get_query_var('language_query', "");
$location = get_query_var('location_query', "");
$admission = get_query_var('admission_query', "");
$education = get_query_var('education_query', "");
$keyword = get_query_var('keyword');

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


$data['geography'] = str_replace("-AND-", " & ", $geography);
$data['industry'] = str_replace("-AND-", " & ", $industry);
$data['practice'] = str_replace("-AND-", " & ", $practice);
$data['language'] = str_replace("-AND-", " & ", $language);
$data['location'] = str_replace("-AND-", " & ", $location);
$data['admission'] = str_replace("-AND-", " & ", $admission);
$data['education'] = str_replace("-AND-", " & ", $education);
$data['keyword'] = str_replace("-AND-", " & ", $keyword);

$data['geography'] = ucwords(strtolower($data['geography']));
$data['industry'] = ucwords(strtolower($data['industry']));
$data['practice'] = ucwords(strtolower($data['practice']));
$data['language'] = ucwords(strtolower($data['language']));
$data['location'] = ucwords(strtolower($data['location']));
$data['admission'] = ucwords(strtolower($data['admission']));
$data['education'] = ucwords(strtolower($data['education']));

$keywords = explode(" ", $data['keyword']);

$keywords = array_filter( $keywords, function($value) { return $value !== ''; });

var_dump(count($keywords) > 0);

if ( count($keywords) > 0 ) {
  $tax_people_args = array( 
    'post_type' =>  'people',
    'posts_per_page'=>-1,
    'tax_query' => array(
      'relation' => 'OR',
    )
  );
  $people_args = array( 
    'post_type' =>  'people',
    'posts_per_page'=>-1,
    'meta_query' => array(
      'relation' => 'OR',
    )
  );
  foreach ($keywords as $keyword) {
    if ( $keyword !== "" ) {
      $geography_term_query_array = array('taxonomy' => 'geography', 'field' => 'slug', 'terms' => array($keyword));
      array_push($tax_people_args['tax_query'], $geography_term_query_array );
    }
    if ( $keyword !== "" ) {
      $industry_term_query_array = array('taxonomy' => 'industry', 'field' => 'slug', 'terms' => array($keyword));
      array_push($tax_people_args['tax_query'], $industry_term_query_array );
    }
    if ( $keyword !== "" ) {
      $practice_term_query_array = array('taxonomy' => 'practice', 'field' => 'slug', 'terms' => array($keyword));
      array_push($tax_people_args['tax_query'], $practice_term_query_array );
    }
    if ( $keyword !== "" ) {
      $language_term_query_array = array('taxonomy' => 'languages', 'field' => 'slug', 'terms' => array($keyword));
      array_push($tax_people_args['tax_query'], $language_term_query_array );
    }
    if ( $keyword !== "" ) {
      $location_term_query_array = array('taxonomy' => 'locations', 'field' => 'slug', 'terms' => array($keyword));
      array_push($tax_people_args['tax_query'], $location_term_query_array );
    }
    if ( $keyword !== "" ) {
      $admission_term_query_array = array('taxonomy' => 'admissions', 'field' => 'slug', 'terms' => array($keyword));
      array_push($tax_people_args['tax_query'], $admission_term_query_array );
    }
    if ( $keyword !== "" ) {
      $education_term_query_array = array('taxonomy' => 'educations', 'field' => 'slug', 'terms' => array($keyword));
      array_push($tax_people_args['tax_query'], $education_term_query_array );
    }

    $first_name_query = array(
      'key' => 'first_name',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($people_args['meta_query'], $first_name_query );
    $last_name_query = array(
      'key' => 'last_name',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($people_args['meta_query'], $last_name_query );
    $job_title_query = array(
      'key' => 'job_title',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($people_args['meta_query'], $job_title_query );

    $specialization_query = array(
      'key' => 'specialization',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($people_args['meta_query'], $specialization_query );

    $primary_city_query = array(
      'key' => 'primary_city',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($people_args['meta_query'], $primary_city_query );

    $primary_state_query = array(
      'key' => 'primary_state',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($people_args['meta_query'], $primary_state_query );

    $secondary_city_query = array(
      'key' => 'secondary_city',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($people_args['meta_query'], $secondary_city_query );

    $secondary_state_query = array(
      'key' => 'secondary_state',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($people_args['meta_query'], $secondary_state_query );

    $email_query = array(
      'key' => 'email',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($people_args['meta_query'], $email_query );

    $education_query = array(
      'key' => 'education',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($people_args['meta_query'], $education_query );

    $language_query = array(
      'key' => 'language',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($people_args['meta_query'], $language_query );
    $related_experience_query = array(
      'key' => 'related_experience',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($people_args['meta_query'], $related_experience_query );
  };
} else {
  $people_args = array(
    'post_type' =>  'people',
    'orderby' => 'meta_value',
    'meta_key'  => 'last_name',
    'order' => 'ASC',
    'posts_per_page'=>-1,
  );
}

if( ($geography !== "") || ( $industry !== "") || ($practice !== "") || ($language !== "") || ($location !== "") || ($admission !== "") || ($education !== "")  ) {
  $people_args["tax_query"] = array( 'relation' => 'AND' );
  if ( $geography !== "" ) {
    $geography_term_query_array = array('taxonomy' => 'geography', 'field' => 'slug', 'terms' => array( $geography));
    array_push($people_args['tax_query'], $geography_term_query_array );
  }
  if ( $industry !== "" ) {
    $industry_term_query_array = array('taxonomy' => 'industry', 'field' => 'slug', 'terms' => array( $industry));
    array_push($people_args['tax_query'], $industry_term_query_array );
  }
  if ( $practice !== "" ) {
    $practice_term_query_array = array('taxonomy' => 'practice', 'field' => 'slug', 'terms' => array( $practice));
    array_push($people_args['tax_query'], $practice_term_query_array );
  }
  if ( $language !== "" ) {
    $language_term_query_array = array('taxonomy' => 'languages', 'field' => 'slug', 'terms' => array( $language));
    array_push($people_args['tax_query'], $language_term_query_array );
  }
  if ( $location !== "" ) {
    $location_term_query_array = array('taxonomy' => 'locations', 'field' => 'slug', 'terms' => array( $location));
    array_push($people_args['tax_query'], $location_term_query_array );
  }
  if ( $admission !== "" ) {
    $admission_term_query_array = array('taxonomy' => 'admissions', 'field' => 'slug', 'terms' => array( $admission));
    array_push($people_args['tax_query'], $admission_term_query_array );
  }
  if ( $education !== "" ) {
    $education_term_query_array = array('taxonomy' => 'educations', 'field' => 'slug', 'terms' => array( $education));
    array_push($people_args['tax_query'], $education_term_query_array );
  }
}

$data['people'] = [];
$people = [];
$tax_people = [];

$people = Timber::get_posts($people_args);
$tax_people = Timber::get_posts($tax_people_args);

if (count($people) == 0 AND count($tax_people) != 0 ) {
  $data['people'] = $tax_people;
} elseif ( count($people) != 0 AND count($tax_people) == 0 ) {
  $data['people'] = $people;
} elseif (count($people) != 0 AND count($tax_people) != 0 ) {
  $data['people'] = array_merge($people + $tax_people);
} else {
  $data['people'] = [];
}

$data['people'] = array_unique( $data['people'] );


?>
<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div class="animsition"
        data-animsition-in-class="fade-in"
        data-animsition-in-duration="500"
        data-animsition-out-class="fade-out"
        data-animsition-out-duration="800">
          <?php get_header();?>
      <div id="page-full-width-homepage" class ="full-width" role="main">
        <?php Timber::render('/twig-templates/people.twig', $data); ?>
        <?php do_action( 'foundationpress_after_content' ); ?>
        <?php get_footer(); ?>
    </div>
    </div>
    </div>     
  </body>
</html>