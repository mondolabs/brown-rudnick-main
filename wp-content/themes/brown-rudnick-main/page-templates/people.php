<?php
/*
Template Name: People Landing Page
*/
get_header();
$data = Timber::get_context();
$people_args = array(
    'post_type' =>  'people',
    'orderby' => 'meta_value',
    'meta_key'  => 'last_name',
    'order' => 'ASC',
    'posts_per_page'=>-1
);
$data['people'] = Timber::get_posts($people_args);
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['header_text'] = get_field('header_text');
$data['sidebar_header'] = get_field('sidebar_header');
$data['sidebar_items'] = get_field('sidebar_items');
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";
$data['alphabet'] = range('A', 'Z');

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
  <div id="advancedSearchModal" class="vellum black--vellum modal__background diversity hidden">
      <div class="row">
        <div class="diversity__modal--outer-wrapper table__wrapper relative">
          <div class="diversity__modal--inner-wrapper table__innner">
            <div class="diversity__modal--text-wrapper">
              <button class="close__modal cancel">
                
              </button>
              <p class="title__text text-align__center">
                Advanced Search
              </p>
              <p class="body__text bigger text-align__center">
                SEARCH ALL PEOPLE
              </p>
              <div class="columns large-12 medium-12 small-12">
                <input type="text" name="name">
              </div>

              <div class="columns large-6 medium-6 small-6">
                <select>
                  
                </select>
              </div>
              <div class="columns large-6 medium-6 small-6">
                <select>
                  
                </select>
              </div>

            </div>
          </div>  
        </div>
      </div>  
    </div>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/people.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>
