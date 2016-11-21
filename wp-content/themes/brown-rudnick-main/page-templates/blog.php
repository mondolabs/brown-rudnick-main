<?php
/*
Template Name: Blog Landing
*/

get_header();

function flatten_array(array $array) {
  return iterator_to_array(
  new \RecursiveIteratorIterator(new \RecursiveArrayIterator($array)));
}

$data = Timber::get_context();
$data['post'] = new TimberPost();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['header_text'] = get_field('header_text');
$parent = get_page($post->post_parent);
$parent_name = $parent->post_name;
$blog_name = $data['post']->slug;
$blog_name = str_replace("-", "_", $blog_name);
$blog_title_category_obj = get_category_by_slug($blog_name);
$data['blog_title_category_id'] = $blog_title_category_obj->term_id;

$blog_posts_args = array('category_name' => $blog_name, 'numberposts' => -1 );

$data['blog_posts'] = Timber::get_posts($blog_posts_args);

$all_tags_for_blog_posts = [];
$all_dates_for_blog_posts = [];

foreach ($data['blog_posts'] as $k => $v) {
  $tags  = get_the_tags($v->ID);  
  array_push($all_dates_for_blog_posts, strtotime(($v->date)));
  foreach ($tags as $k => $v) {
    array_push($all_tags_for_blog_posts, strtoupper($v->name));
  }
}

$data['all_tags_for_blog_posts'] = array_unique($all_tags_for_blog_posts);
$data['all_dates_for_blog_posts'] = array_unique($all_dates_for_blog_posts);

function sort_objects_by_name($a, $b) {
  if($a->name == $b->name){
    return 0;
  }
  return ($a->name < $b->name) ? -1 : 1;
}

usort($data['all_tags_for_blog_posts'], "sort_objects_by_name");

$slug = basename(get_permalink());
$data['slug'] = $slug;
$data['parent_link'] = get_permalink( $post->post_parent );

$post_type_args = array(
  'post_type' => 'alert',
  'numberposts' => -1,
  'posts_per_page' => -1
);

$date = get_query_var('date_query', "");

$year = substr($date, -4 );
$month = substr($date, 0, 2 );
$posts_args = array(
  'post_type' => 'alert',
  'numberposts' => -1,
  'posts_per_page' => -1,
  'orderby' => 'date',
);

$data['posts_collection'] = get_posts($posts_args);
$posts_from_collection_args = array(
  'post_type' => 'alert',
  'numberposts' => -1,
  'posts_per_page' => -1,
  'orderby' => 'date',
);

$dates = [];
$posts_from_collection = get_posts($posts_from_collection_args);
foreach ( $posts_from_collection as $post_from_collection ) {
  array_push( $dates, strtotime($post_from_collection->post_date));
};
$data['dates'] = array_unique($dates);
$custom_posts = get_posts($post_type_args);
$ids = [];

foreach ( $custom_posts as $post ) {
  array_push($ids, $post->ID);
}

// begin generate options for advanced search fields
$all_posts_args = array(
  'post_type' => array('article', 'event', 'alert'),
  'numberposts' => -1,
  'posts_per_page' => -1,
  'orderby' => 'date',
  'post_status' => array( 'publish', 'future')
);

$all_dates = [];
$all_posts = get_posts($all_posts_args);
$all_ids = [];

foreach ( $all_posts as $all_post ) {
  array_push( $all_dates, strtotime($all_post->post_date));
  array_push( $all_ids, $all_post->ID);
};

$data['all_dates'] = array_unique($all_dates);
$data['all_geographies'] = wp_get_object_terms( $all_ids, 'geography' );
$data['all_industries'] = wp_get_object_terms( $all_ids, 'industry' );
$data['all_practices'] = wp_get_object_terms( $all_ids, 'practice' );

// end generate options for advanced search fields

$data['geographies'] = wp_get_object_terms( $ids, 'geography' );
$data['industries'] = wp_get_object_terms( $ids, 'industry' );
$data['practices'] = wp_get_object_terms( $ids, 'practice' );

$date_query_term = get_query_var('date_query', "DATE");
$geography = get_query_var('geography_query', "GEOGRAPHIES");
$industry = get_query_var('industry_query', "INDUSTRIES");
$practice = get_query_var('practice_query', "PRACTICES");

$geography =  str_replace("-and-", " & ", $geography);
$industry =  str_replace("-and-", " & ", $industry);
$practice =  str_replace("-and-", " & ", $practice);

$geography =  str_replace("-slash-", " / ", $geography);
$industry =  str_replace("-slash-", " / ", $industry);
$practice =  str_replace("-slash-", " / ", $practice);


$year_query = intval($year);
$month_query = intval($month); 
$insights_args = array(
  'post_type' => 'alert',
  'posts_per_page' => -1, 
  'orderby'=>'date',
  'date_query' => array(
    array(
      'column' => "date",
      'year'  => $year_query,
      'month' => $month_query,
    ),
  )
);

if( ($geography !== "GEOGRAPHIES") || ( $industry !== "INDUSTRIES") || ($practice !=="PRACTICES")  ) {
  $insights_args["tax_query"] = array( 'relation' => 'AND' );
  if ( $geography !== "GEOGRAPHIES" ) {
    $geography_term_query_array = array('taxonomy' => 'geography', 'field' => 'slug', 'terms' => array( $geography));
    array_push($insights_args['tax_query'], $geography_term_query_array );
  }
  if ( $industry !== "INDUSTRIES" ) {
    $industry_term_query_array = array('taxonomy' => 'industry', 'field' => 'slug', 'terms' => array( $industry));
    array_push($insights_args['tax_query'], $industry_term_query_array );
  }
  if ( $practice !== "PRACTICES" ) {
    $practice_term_query_array = array('taxonomy' => 'practice', 'field' => 'slug', 'terms' => array( $practice));
    array_push($insights_args['tax_query'], $practice_term_query_array );
  }
}

// if ($date_query_term !== "DATE") {
//   $year_query = intval($year);
//   $month_query = intval($month); 
//   $insights_args['date_query'] = [];
//   $dates_term_query_array = array(
//     'column' => 'date',
//     'year'  => $year_query,
//     'month' => $month_query,
//   );
//   array_push($insights_args['date_query'], $dates_term_query_array );
// }

// $data['insights'] = new WP_Query($insights_args);

$results = Timber::get_posts($insights_args);
$data['insights'] = $results;
$data['insights'] = array_unique($data['insights']);

function sort_objects_by_date($a, $b) {
  if($a->date == $b->date){
    return 0;
  }
  return ($a->date < $b->date) ? -1 : 1;
}

usort($data['insights'], "sort_objects_by_date");
$data['insights'] = array_slice($data['insights'], 0, 5 );
$data['insights'] = array_reverse($data['insights']);

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/blogs_landing.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>