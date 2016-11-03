<?php
/*
Template Name: Diversity
*/
get_header();
$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['banner_image'] = get_field('banner_image');
$data['hover_arrow'] = get_template_directory_uri() . "/assets/images/hover-arrow.png";
$sidebar_slug = 'about-sidebar';
$args = array(
  'name'        => $sidebar_slug,
  'post_type'   => 'sidebar',
  'post_status' => 'publish',
  'numberposts' => 1
);
$data['sidebar'] = get_posts($args);
$data['diversity_header_text'] = get_field('diversity_header_text');
$data['diversity_top_content'] = get_field('diversity_top_content');
$data['diversity_video_url'] = get_field('diversity_video_url');
$data['diversity_efforts_header'] = get_field('diversity_efforts_header');
$data['diversity_efforts'] = get_field('diversity_efforts');
$slug = basename(get_permalink());
$data['slug'] = $slug;

$data['parent_link'] = get_permalink( $post->post_parent );

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
      <?php Timber::render('/twig-templates/diversity.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>