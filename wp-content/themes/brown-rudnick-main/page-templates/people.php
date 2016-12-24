<!-- TO DO: conditional for tax and meta field arrays -->




<?php
/*
Template Name: People Landing Page
*/

function array_flatten(array $array, $max_depth = -1, $_depth = 0) {
  $result = array();

  foreach ($array as $key => $value) {
    if (is_array($value) && ($max_depth < 0 || $_depth < $max_depth)) {
      $flat = array_flatten($value, $max_depth, $_depth + 1);
      if (is_string($key)) {
        $duplicate_keys = array_keys(array_intersect_key($array, $flat));
        foreach ($duplicate_keys as $k) {
          $flat["$key.$k"] = $flat[$k];
          unset($flat[$k]);
        }
      }
      $result = array_merge($result, $flat);
    }
    else {
      if (is_string($key)) {
        $result[$key] = $value;
      }
      else {
        $result[] = $value;
      }
    }
  }

  return $result;
}

function array_filter_recursive($array) {
  foreach ($array as $key => &$value) {
    if (empty($value)) {
       unset($array[$key]);
    }
    else {
      if (is_array($value)) {
          $value = array_filter_recursive($value);
        if (empty($value)) {
          unset($array[$key]);
        }
      }
    }
  }
  return $array;
}



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

$tax_index = 0;
$keyword_index = 0;
$all_people_by_taxonomies_array = [];
$all_people_by_meta_fields_array = [];
if ( count($keywords) > 0 ) {
  foreach ($keywords as $keyword) {
  $tax_people_args = array( 
    'post_type' =>  'people',
    'posts_per_page'=>-1,
    'tax_query' => array(
      'relation' => 'OR',
    )
  );
  $meta_people_args = array( 
    'post_type' =>  'people',
    'posts_per_page'=>-1,
    'meta_query' => array(
      'relation' => 'OR',
    )
  );
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
    array_push($meta_people_args['meta_query'], $first_name_query );
    $last_name_query = array(
      'key' => 'last_name',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($meta_people_args['meta_query'], $last_name_query );
    $job_title_query = array(
      'key' => 'job_title',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($meta_people_args['meta_query'], $job_title_query );

    $specialization_query = array(
      'key' => 'specialization',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($meta_people_args['meta_query'], $specialization_query );

    $primary_city_query = array(
      'key' => 'primary_city',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($meta_people_args['meta_query'], $primary_city_query );

    $primary_state_query = array(
      'key' => 'primary_state',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($meta_people_args['meta_query'], $primary_state_query );

    $secondary_city_query = array(
      'key' => 'secondary_city',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($meta_people_args['meta_query'], $secondary_city_query );

    $secondary_state_query = array(
      'key' => 'secondary_state',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($meta_people_args['meta_query'], $secondary_state_query );

    $email_query = array(
      'key' => 'email',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($meta_people_args['meta_query'], $email_query );

    $education_query = array(
      'key' => 'education',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($meta_people_args['meta_query'], $education_query );

    $language_query = array(
      'key' => 'language',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($meta_people_args['meta_query'], $language_query );
    $related_experience_query = array(
      'key' => 'related_experience',
      'value' => $keyword,
      'compare' => 'LIKE',
    );
    array_push($meta_people_args['meta_query'], $related_experience_query );
    // taxonomies
    $tax_people_keyword_query = Timber::get_posts($tax_people_args);
    array_push( $all_people_by_taxonomies_array, $tax_people_keyword_query );
    // var_dump("total number of people matching by tax for ".$keyword.": ".count($tax_people_keyword_query));
    // Meta Fields
    $meta_people_keyword_query = Timber::get_posts($meta_people_args);
    array_push( $all_people_by_meta_fields_array, $meta_people_keyword_query );
// counter
    $tax_index++;
    $keyword_index++;
  };
  // tax

  $all_people_by_taxonomies_array = array_filter_recursive($all_people_by_taxonomies_array);

  $tax_people_by_keyword = call_user_func_array('array_intersect', $all_people_by_taxonomies_array[0]);

  // meta
  $all_people_by_meta_fields_array = array_filter_recursive($all_people_by_meta_fields_array);
  $meta_people_by_keyword = call_user_func_array('array_intersect', $all_people_by_meta_fields_array[0]);



  // var_dump(array_filter_recursive($all_people_by_taxonomies_array));

  // var_dump(count($all_people_by_taxonomies_array));
  // var_dump(count($all_people_by_taxonomies_array[1]));
  // var_dump(count($all_people_by_taxonomies_array[2]));

  // var_dump(count($all_people_by_taxonomies_array));
  // var_dump(count($all_people_by_meta_fields_array));


 

  // var_dump($all_people_by_meta_fields_array[0][0]);
  // var_dump($all_people_by_meta_fields_array[1][0]);
  // var_dump($all_people_by_meta_fields_array[2][0]);


  // var_dump(count($tax_people_by_keyword));
  // var_dump(count($meta_people_by_keyword));



  if (count($meta_people_by_keyword) >= 1 && count($tax_people_by_keyword) >= 1)  {
    $keyword_matches = array_intersect($meta_people_by_keyword, $tax_people_by_keyword);
  } elseif ( count($meta_people_by_keyword) == 0 && count($tax_people_by_keyword) >= 1 ) {
    $keyword_matches = $tax_people_by_keyword;
  } elseif ( count($meta_people_by_keyword) >= 1  && count($tax_people_by_keyword) == 0 ) {
    $keyword_matches = $meta_people_by_keyword;
  } else {
    $keyword_matches = [];
  }
  
  // var_dump("tax fields matches: ".count($tax_people_by_keyword));
  // var_dump("meta fields matches: ".count($meta_people_by_keyword));


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
  $filter_meta_people_args = array( 
    'post_type' =>  'people',
    'posts_per_page'=>-1,
    'meta_query' => array(
      'relation' => 'OR',
    )
  );
  $filter_meta_people_args["tax_query"] = array( 'relation' => 'AND' );
  if ( $geography !== "" ) {
    $geography_term_query_array = array('taxonomy' => 'geography', 'field' => 'slug', 'terms' => array( $geography));
    array_push($filter_meta_people_args['tax_query'], $geography_term_query_array );
  }
  if ( $industry !== "" ) {
    $industry_term_query_array = array('taxonomy' => 'industry', 'field' => 'slug', 'terms' => array( $industry));
    array_push($filter_meta_people_args['tax_query'], $industry_term_query_array );
  }
  if ( $practice !== "" ) {
    $practice_term_query_array = array('taxonomy' => 'practice', 'field' => 'slug', 'terms' => array( $practice));
    array_push($filter_meta_people_args['tax_query'], $practice_term_query_array );
  }
  if ( $language !== "" ) {
    $language_term_query_array = array('taxonomy' => 'languages', 'field' => 'slug', 'terms' => array( $language));
    array_push($filter_meta_people_args['tax_query'], $language_term_query_array );
  }
  if ( $location !== "" ) {
    $location_term_query_array = array('taxonomy' => 'locations', 'field' => 'slug', 'terms' => array( $location));
    array_push($filter_meta_people_args['tax_query'], $location_term_query_array );
  }
  if ( $admission !== "" ) {
    $admission_term_query_array = array('taxonomy' => 'admissions', 'field' => 'slug', 'terms' => array( $admission));
    array_push($filter_meta_people_args['tax_query'], $admission_term_query_array );
  }
  if ( $education !== "" ) {
    $education_term_query_array = array('taxonomy' => 'educations', 'field' => 'slug', 'terms' => array( $education));
    array_push($filter_meta_people_args['tax_query'], $education_term_query_array );
  }
  $filter_matches = Timber::get_posts($filter_meta_people_args);
}

$data['people'] = [];
$people = [];
$tax_people = [];


if ( count($keywords) >= 1 || (($geography !== "") || ( $industry !== "") || ($practice !== "") || ($language !== "") || ($location !== "") || ($admission !== "") || ($education !== "")) ) {
  if ( count($keyword_matches) >= 1 AND count($filter_matches) >= 1 ) {
    $data['people'] = array_intersect($keyword_matches, $filter_matches);
  } elseif ( count($keyword_matches) >= 1 AND count($filter_matches) == 0 ) {
    $data['people'] = $keyword_matches;
  } elseif (count($keyword_matches) == 0 AND count($filter_matches) >= 1) {
    $data['people'] = $filter_matches;
  }
} else {
  $all_people_args = array( 
    'post_type' =>  'people',
    'posts_per_page'=>-1,
  );
  $data['people'] = Timber::get_posts($all_people_args);
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
        data-animsition-in-duration="800"
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