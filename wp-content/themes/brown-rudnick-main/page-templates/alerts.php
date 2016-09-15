<?php
/*
Template Name: Alerts
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

$geography = get_query_var('geography_query', "GEOGRAPHIES");
$industry = get_query_var('industry_query', "INDUSTRY");
$practice = get_query_var('practice_query', "PRACTICE");

$insights_args = array(
    'post_type' => 'alert',
    'posts_per_page' => -1, 
);

if( !strcasecmp($geography, "GEOGRAPHIES") && !strcasecmp($industry, "INDUSTRIES") && !strcasecmp($practice, "PRACTICES") ) {
  $tax_query_array = array("tax_query" => array( 'relation' => 'AND' ) ); 
  array_push( $insights_args, $tax_query_array );
  if ( !strcasecmp($geography, "GEOGRAPHIES") ) {
    $geography_term_query_array = array('taxonomy' => 'geography', 'terms' => $geography);
    array_push($insights_args['tax_query'], $geography_term_query_array );
  }
  if ( !strcasecmp($industry, "INDUSTRIES") ) {
    $industry_term_query_array = array('taxonomy' => 'industry', 'terms' => $industry);
    array_push($insights_args['tax_query'], $industry_term_query_array );
  }
  if ( !strcasecmp($practice, "PRACTICES") ) {
    $practice_term_query_array = array('taxonomy' => 'practice', 'terms' => $practice);
    array_push($insights_args['tax_query'], $practice_term_query_array );
  }
}




// foreach ($data['geography_insights'] as &$geography_insight) {
//   array_push($data['insights'], $geography_insight );
// }
// foreach ($data['industry_insights'] as &$geography_insight) {
//   array_push($data['insights'], $geography_insight );
// }
// foreach ($data['practice_insights'] as &$geography_insight) {
//   array_push($data['insights'], $geography_insight );
// }

$data['insights'] = Timber::get_posts($insights_args);
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
      <?php Timber::render('/twig-templates/insight_landing.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>