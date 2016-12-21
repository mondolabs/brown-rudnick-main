<?php
/*
Template Name: Locations
*/
$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['banner_image'] = get_field('banner_image');
$data['locations_header_text'] = get_field('locations_header_text');
$data['banner_image'] = get_field('banner_image');
$data['bottom_banner_image'] = get_field('bottom_banner_image');
$data['bottom_banner_header_text'] = get_field('bottom_banner_header_text');
$data['bottom_banner_content_text'] = get_field('bottom_banner_content_text');
$data['locations_bottom_banner_link_url'] = get_field('locations_bottom_banner_link_url');
$locations_args = 
$locations_args = array(
    'post_type' =>  'location',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page'=>-1
);
$data['locations'] = Timber::get_posts($locations_args);
$alphabet = range('A', 'Z');
?>
<html> 
  <head>
    <?php wp_head()?>
  </head>
    <body>
      <?php get_template_part('template-parts/off-canvas-search')?>
            <div id="page-full-width-homepage" class ="full-width" role="main">
                <?php Timber::render('/twig-templates/locations.twig', $data); ?>
                <?php do_action( 'foundationpress_after_content' ); ?>
                <?php get_footer(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>