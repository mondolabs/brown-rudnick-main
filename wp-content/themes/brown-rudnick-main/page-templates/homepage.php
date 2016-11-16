<?php
/*
Template Name: Homepage
*/



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
        <?php get_header();?>
        <div class="off-canvas position-right search__people__off__canvas__container" id="offCanvas" data-off-canvas data-position="right" data-options="sticky_on: large">
           <button class="close-button" aria-label="Close menu" type="button" data-close>
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="search__people__off__canvas">
            <div id="search__people__letter__grid" class="padding-top-20">
            <p class="title__text padding-top-20">Search People</p>
            <p class="search__people__homepage">Search by last name</p>
              <?php $count = 0; foreach ($alphabet as $letter) { $count++?>
              <div class="columns medium-3 large-3 small-3 <?php if ($count == 26) {?> float-left  <?php };?>letter__link--outer-wrapper">
                <div class="letter__link--inner-wrapper letter--active">
                  <a href="<?php echo '/all-people#'.$letter;?>" data-letter="<?php echo $letter;?>" class="letter__link">
                    <?php echo $letter;?>
                  </a>
                </div>
              </div>            
          <?php }; ?>  
              <div class="columns small-12">
                <a href="/all-people/"><p id="all__people__navigate">see all people</p></a>
              </div>
              <div id="search__by__keyword" class="columns small-12 ">

                <form id="search__people">  
                  <div id="homepage__search__svg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46.21 46.21"><defs><style>.cls-1-homepage,.cls-2-homepage {fill:none; stroke:#fff; stroke-miterlimit:10;stroke-width:6px;}.cls-2-homepage{ stroke:#fff; stroke-linecap:round;}</style></defs><title>Asset 3</title><g id="Layer_2" data-name="Layer 2"><g id="icons"><circle class="cls-1-homepage" cx="19" cy="19" r="16"/><line class="cls-2-homepage" x1="30.35" y1="30.27" x2="43.21" y2="43.21"/></g></g></svg>
                  </div>
                  <input type="text" id="search-by-keyword" class="margin-bottom--20" placeholder="Search By Keyword">
                  <input type="submit" id="submit-keyword-search" value="Search">
                </form>             
              </div>  
            </div>
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



