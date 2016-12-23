<?php
/*
Template Name: Search Page
*/
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
$alphabet = range('A', 'Z');
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
                <?php Timber::render('/twig-templates/search.twig', $data); ?>          
                <?php do_action( 'foundationpress_after_content' ); ?>
                <?php get_footer(); ?>
              </div> 
          </div>
        </div>
      </div>
      </div>
    </div>
  </body>
</html>