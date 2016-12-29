<?php
/*
Template Name: Paralegals
*/
$data = Timber::get_context();
$data['post'] = new TimberPost();

$parent = get_page($post->post_parent);
$parent_name = $parent->post_name;
$data['parent_link'] = get_permalink( $post->post_parent );

$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];

$sidebar_slug = 'careers-sidebar';
$args = array(
  'name'        => $sidebar_slug,
  'post_type'   => 'sidebar',
  'post_status' => 'publish',
  'numberposts' => 1
);
$data['sidebar'] = get_posts($args);

$data['header_text'] = get_field('header_text');
$data['top_text_header'] = get_field('top_text_header');
$data['top_text_content'] = get_field('top_text_content');


$slug = basename(get_permalink());
$data['slug'] = $slug;

$post_type_args = array(
  'post_type' => 'paralegal_openings',
  'numberposts' => -1,
);
$job_opening_posts = get_posts($post_type_args);
$ids = [];
// get array of IDs for all custom post types
foreach ( $job_opening_posts as $post ) {
  array_push($ids, $post->ID);
}
$data['job_opportunities'] = Timber::get_posts($post_type_args);

$data['job_locations'] = wp_get_object_terms( $ids, 'locations' );
// filter the location when we reload the page
$data['location'] = get_query_var('job_location_query', "");

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
            <?php Timber::render('/twig-templates/career_landing.twig', $data); ?>     
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div>
          </div> 
        </div> 
      </div> 
    </div> 
  </body>
</html>