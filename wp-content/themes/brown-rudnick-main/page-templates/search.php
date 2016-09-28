<?php
/*
Template Name: Search Page
*/
get_header();

$data = Timber::get_context();
$search_query = get_search_query();
$search_args = array(
    's' =>  $search_query,
    'posts_per_page'=> -1
);
$data['results'] = Timber::get_posts($search_args);
$data['search_banner_image'] = get_template_directory_uri() . "/assets/images/search-bg.png";
$data['form_action'] = get_home_url();
$data['search_query'] = $search_query;

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
  <h1>
  </h1>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/search.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>