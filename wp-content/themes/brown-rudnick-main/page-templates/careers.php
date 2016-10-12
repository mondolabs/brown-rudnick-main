<?php
/*
Template Name: Careers Landing Page
*/
get_header();
$data = Timber::get_context();
$practice_posts_args = array(
    'post_type' =>  'practice',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page'=>-1
);
$post = new TimberPost();
$data['post'] = $post;
$data['careers_header_text'] = get_field('careers_header_text');
$data['careers_sidebar_header'] = get_field('careers_sidebar_header');
$data['careers_sidebar_items'] = get_field('careers_sidebar_items');
$data['careers_tile_one'] = get_field('careers_tile_one');
$data['careers_tile_two'] = get_field('careers_tile_two');
$data['careers_tile_three'] = get_field('careers_tile_three');
$data['careers_tile_four'] = get_field('careers_tile_four');
$data['careers_top_text'] = get_field('careers_top_text');
$data['careers_tiles_header'] = get_field('careers_tiles_header');

$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];

$slug = basename(get_permalink());
$data['slug'] = $slug;

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div class="vellum black--vellum modal__background diversity hidden">
      <div class="row">
        <div class="diversity__modal--outer-wrapper table__wrapper relative">
          <div class="diversity__modal--inner-wrapper table__innner">
            <div class="diversity__modal--text-wrapper">
              <button class="close__modal cancel">
                
              </button>
              <p class="title__text text-align__center">
                Equal Opportunity Employer Statement
              </p>
              <p class="body__text text-align__center">
                Brown Rudnick LLP is an Equal Employment Opportunity Employer.  All persons are afforded equal opportunity in every area of hiring and employment without regard to race, color, religion, age, sex, sexual orientation, gender identity, national origin, marital status, disability, handicap, veteran’s status or any other legally protected status recognized by federal, state or local laws.
              </p>
            </div>
          </div>  
        </div>
      </div>  
    </div>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/careers.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>