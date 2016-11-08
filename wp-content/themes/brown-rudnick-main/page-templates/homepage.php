<?php
/*
Template Name: Homepage
*/

get_header();

$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['posts'] = Timber::get_posts();
$data['main_image_id'] = $post->contact_us_image;
$data['homepage_text_section'] = get_field('homepage_text_section');
$data['have_rows_homepage_slider'] = have_rows('homepage_slider');
$featured_posts_args = array(
  'post_type' =>  array('article', 'emerging_technology', 'event', 'crime_watch', 'government_contract', 'alert'),
  'orderby' => 'date',
  'order' => 'DESC',
  'max_num_pages'=> 5
);
$data['featured_posts'] = Timber::get_posts($featured_posts_args);
$data['homepage_section_3_image'] = get_field('homepage_section_3_image');
$data['homepage_section_3_button_link'] = get_field('homepage_section_3_button_link');
$data['homepage_section_3_description'] = get_field('homepage_section_3_description');
$data['homepage_section_3_header'] = get_field('homepage_section_3_header');

$alphabet = range('A', 'Z');
?>

  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div class="off-canvas-wrapper">
      <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <div class="off-canvas position-right search__people__off__canvas__container" id="offCanvas" data-off-canvas data-position="right">
           <button class="close-button" aria-label="Close menu" type="button" data-close>
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="search__people__off__canvas">
            <p class="title__text">Search People</p>
            <p>Search by last name</p>
              <?php $count = 0; foreach ($alphabet as $letter) { $count++?>
              <div class="columns medium-4 large-4 small-2 <?php if ($count == 26) {?> float-left  <?php };?>letter__link--outer-wrapper">
                <div class="letter__link--inner-wrapper active">
                  <a href="<?php echo '/all-people#'.$letter;?>" data-letter="<?php echo $letter;?>" class="letter__link">
                    <?php echo $letter;?>
                  </a>
                </div>
              </div>            
          <?php }; ?>  

             <p>search by keyword</p>  
          </div>
        </div>
        <div class="off-canvas-content" data-off-canvas-content>
        <div id="page-full-width-homepage" class ="full-width" role="main">
          <?php Timber::render('/twig-templates/slider.twig', $data); ?>
          <?php Timber::render('/twig-templates/blog-tiles.twig', $data); ?>
          <?php Timber::render('/twig-templates/homepage-section-3.twig', $data); ?>

            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>



