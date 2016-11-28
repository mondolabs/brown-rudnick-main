<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header();

$data = Timber::get_context();
$data['post'] = new TimberPost();
$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['header_text'] = get_field('header_text');
$parent = get_page($post->post_parent);
$parent_name = $parent->post_name;
$comments = get_comments($post); 
$data['comments'] = $comments;


?>


<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
		<?php Timber::render('/twig-templates/individual-blog-post.twig', $data); ?>
    </div>  
    <?php get_footer(); ?>
  </body>
</html>