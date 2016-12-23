<?php
/*
Template Name: Hiring Committee Page
*/
$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['header_text'] = get_field('header_text');
$data['breadcrumb_color'] = get_field('breadcrumb_color');

// query people's committee memberships for Hiring Committee
$args = array(
    'post_type' =>  'people',
    'posts_per_page'=>-1,
    'order_by'=> 'name',
    'order'=> 'ASC',
    'tax_query' =>array(
    	array(
    		'taxonomy' => 'committee_memberships',
        	'field'=> 'slug',
        	'terms'=>'Hiring'
    	),
    ),
);
// pass results to twig template
$data['hiring_committee_members'] = Timber::get_posts($args);
$data['hiring_committee_members'] = array_unique($data['hiring_committee_members']);
$data['recruitment_manager'] = get_field('recruitment_manager');
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
            <?php Timber::render('/twig-templates/hiring-committee.twig', $data); ?>     
            <?php do_action( 'foundationpress_after_content' ); ?>
            <?php get_footer(); ?>
          </div> 
        </div> 
      </div> 
    </div>
    </div> 
  </body>
</html>