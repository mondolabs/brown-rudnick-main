<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
$data = Timber::get_context();
$data['post'] = new TimberPost();

global $wp;
$current_url = home_url(add_query_arg(array(),$wp->request));
$data['link_url'] = $current_url;

$data['featured_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = 'post-thumbnail' );
$data['featured_image_url'] = $data['featured_image_url'][0];
$data['header_text'] = get_field('header_text');
$parent = get_page($post->post_parent);
$parent_name = $parent->post_name;
$data['parent_page_url'] = '/insights';
$data['parent_page_name'] = 'insights';
$comments = get_comments($post); 
$data['comments'] = $comments;
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
						<?php Timber::render('/twig-templates/individual-blog-post.twig', $data); ?>  
				    <?php get_footer(); ?>
				  </div>
				  </div>
			  </div>
		  </div>
	  </div>
  </body>
</html>