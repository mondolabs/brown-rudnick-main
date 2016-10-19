<?php
/*
Template Name: Hiring Committee Page
*/
get_header();

$data = Timber::get_context();
$post = new TimberPost();
$data['post'] = $post;

$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];

$data['header_text'] = get_field('header_text');

$args = array(
    'post_type' =>  'people',
    'posts_per_page'=>-1,
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

?>

<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
      <?php Timber::render('/twig-templates/hiring-committee.twig', $data); ?>
    </div>  
    <?php do_action( 'foundationpress_after_content' ); ?>
    <?php get_footer(); ?>
  </body>
</html>