<?php
/*
Template Name: Events
*/
global $paged;
  if (!isset($paged) || !$paged){
      $paged = 1;
  }

$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];

$parent = get_page($post->post_parent);
$parent_name = $parent->post_name;
$sidebar_slug = $parent_name . '-sidebar';
$slug = basename(get_permalink());
$data['slug'] = $slug;
$data['parent_link'] = get_permalink( $post->post_parent );

$args = array(
  'name'        => $sidebar_slug,
  'post_type'   => 'sidebar',
  'post_status' => 'publish',
  'numberposts' => 1
);
$data['sidebar'] = get_posts($args);
$data['contact_name'] = get_field('contact_name');
$data['contact_title'] = get_field('contact_title');
$data['contact_phone_number'] = get_field('contact_phone_number');
$data['contact_email'] = get_field('contact_email');


$data['upcoming_events'] = get_field('upcoming_events');
$data['past_events'] = get_field('past_events');

$post_type_args = array(
  'post_type' => 'event',
  'numberposts' => -1,
  'posts_per_page' => 5,
  'paged'=> $paged
);

$date = get_query_var('date_query', "");

$year = substr($date, -4 );
$month = substr($date, 0, 2 );
$posts_args = array(
  'post_type' => 'event',
  'numberposts' => -1,
  'posts_per_page' => -1,
  'orderby' => 'date',
);

$data['posts_collection'] = get_posts($posts_args);
$posts_from_collection_args = array(
  'post_type' => 'event',
  'numberposts' => -1,
  'posts_per_page' => -1,
  'orderby' => 'date',
  'post_status' => array( 'publish', 'future')
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

if (($geography !== "GEOGRAPHIES") || ( $industry !== "INDUSTRIES") || ($practice !=="PRACTICES") || $date_query_term !== "DATE" ) {

  $geography =  str_replace("-and-", " & ", $geography);
  $industry =  str_replace("-and-", " & ", $industry);
  $practice =  str_replace("-and-", " & ", $practice);

  $geography =  str_replace("-slash-", " / ", $geography);
  $industry =  str_replace("-slash-", " / ", $industry);
  $practice =  str_replace("-slash-", " / ", $practice);


  $year_query = intval($year);
  $month_query = intval($month); 
  $events_args = array(
    'post_type' => 'event',
    'posts_per_page' => 5,
    'paged'=> $paged, 
    'orderby'=>'date',
    'post_status' => array( 'publish', 'future'),
    'date_query' => array(
      array(
        'column' => "date",
        'year'  => $year_query,
        'month' => $month_query,
      ),
    )
  );

  if( ($geography !== "GEOGRAPHIES") || ( $industry !== "INDUSTRIES") || ($practice !=="PRACTICES")  ) {
    $events_args["paged"] = 0;
    $events_args["tax_query"] = array( 'relation' => 'AND' );
    if ( $geography !== "GEOGRAPHIES" ) {
      $geography_term_query_array = array('taxonomy' => 'geography', 'field' => 'slug', 'terms' => array( $geography));
      array_push($events_args['tax_query'], $geography_term_query_array );
    }
    if ( $industry !== "INDUSTRIES" ) {
      $industry_term_query_array = array('taxonomy' => 'industry', 'field' => 'slug', 'terms' => array( $industry));
      array_push($events_args['tax_query'], $industry_term_query_array );
    }
    if ( $practice !== "PRACTICES" ) {
      $practice_term_query_array = array('taxonomy' => 'practice', 'field' => 'slug', 'terms' => array( $practice));
      array_push($events_args['tax_query'], $practice_term_query_array );
    }
  }

  // for pagination
  query_posts($events_args);

  $results = Timber::get_posts($events_args);
  $data['events'] = $results;
  $data['events'] = array_unique($data['events']);

  function sort_objects_by_date($a, $b) {
    if($a->date == $b->date){
      return 0;
    }
    return ($a->date < $b->date) ? -1 : 1;
  }

  usort($data['events'], "sort_objects_by_date");
  $data['events'] = array_slice($data['events'], 0, 5 );
  $data['events'] = array_reverse($data['events']);
  $data['pagination'] = Timber::get_pagination();
}

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
        data-animsition-out-duration="800" >
      <?php get_template_part('template-parts/off-canvas-search')?>
          <div id="page-full-width-homepage" class ="full-width" role="main">
            <?php Timber::render('/twig-templates/events_landing_page.twig', $data); ?> 
          <?php do_action( 'foundationpress_after_content' ); ?>
          <?php get_footer(); ?>
          </div> 
        </div> 
      </div> 
    </div> 
     </div> 
  </body>
</html>