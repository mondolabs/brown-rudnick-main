<?php
/*
Template Name: Insights Advanced Search Results
*/
global $paged;
  if (!isset($paged) || !$paged){
      $paged = 1;
  }

$data = Timber::get_context();
$data['post'] = new TimberPost();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['header_text'] = get_field('header_text');
$parent = get_page($post->post_parent);
$parent_name = "insights";
$sidebar_slug = $parent_name . '-sidebar';
$args = array(
  'name'        => $sidebar_slug,
  'post_type'   => 'sidebar',
  'post_status' => array('publish', 'future'),
  'numberposts' => 1
);
$data['sidebar'] = get_posts($args);

$data['contact_name'] = get_field('contact_name');
$data['contact_title'] = get_field('contact_title');
$data['contact_phone_number'] = get_field('contact_phone_number');
$data['contact_email'] = get_field('contact_email');

$slug = basename(get_permalink());
$data['slug'] = $slug;
$data['parent_link'] = get_permalink( $post->post_parent );

$post_type_args = array(
  'post_type' => 'alert',
  'numberposts' => -1,
  'posts_per_page' => 5,
  'paged'=> $paged
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
	
$data['previous_parent'] = get_query_var('previous-parent');
$data['previous_slug'] = get_query_var('previous-slug');

$date_query_term = get_query_var('date_query', "DATE");
$type = get_query_var('type_query', array('alert', 'article', 'event' ));
$geography = get_query_var('geography_query', "GEOGRAPHIES");
$industry = get_query_var('industry_query', "INDUSTRIES");
$practice = get_query_var('practice_query', "PRACTICES");
$keyword = get_query_var('keyword');



$type =  str_replace("-and-", " & ", $type);
$geography =  str_replace("-and-", " & ", $geography);
$industry =  str_replace("-and-", " & ", $industry);
$practice =  str_replace("-and-", " & ", $practice);

// clean up keyword search
$keyword = str_replace("-", " ", $keyword);
$keyword = str_replace("%20", " ", $keyword);

$type =  str_replace("-slash-", " / ", $type);
$geography =  str_replace("-slash-", " / ", $geography);
$industry =  str_replace("-slash-", " / ", $industry);
$practice =  str_replace("-slash-", " / ", $practice);

$year_query = intval($year);
$month_query = intval($month); 
$insights_args = array(
  'post_type' => $type,
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

if( ($geography !== "GEOGRAPHIES") || ( $industry !== "INDUSTRIES") || ($practice !=="PRACTICES") ||  ($keyword !== "") ) {
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
  if ( $keyword !== "" ) {
    $insights_args['s'] = $keyword;
  }
}


// for pagination

query_posts($insights_args);
$test = new WP_Query($insights_args);
$data['total_results'] = $test->found_posts;
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
$data['insights'] = array_reverse($data['insights']);

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <?php get_template_part('template-parts/off-canvas-search')?>
          <div id="page-full-width-homepage" class ="full-width" role="main">
            <?php Timber::render('/twig-templates/insights-advanced-search-results.twig', $data); ?>     
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div> 
        </div> 
      </div> 
    </div> 
  </body>
</html>