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

?>


<html>
  <head>
    <?php wp_head()?>
  </head>
  <body>
    <div id="page-full-width-homepage" class ="full-width" role="main">
		<?php Timber::render('/twig-templates/individual-blog-post.twig', $data); ?>
    		<form action="<?php echo get_option( 'siteurl' ); ?>/wp-comments-post.php" method="post" id="commentform">
		<p>
			<label for="author">
				<?php
					_e( 'Name', 'foundationpress' ); if ( $req ) { _e( ' (required)', 'foundationpress' ); }
				?>
			</label>
			<input type="text" class="five" name="author" id="author" value="<?php echo esc_attr( $comment_author ); ?>" size="22" tabindex="1" <?php if ( $req ) { echo "aria-required='true'"; } ?>>
		</p>
		<p>
			<label for="email">
				<?php
					_e( 'Email (will not be published)', 'foundationpress' ); if ( $req ) { _e( ' (required)', 'foundationpress' ); }
				?>
			</label>
			<input type="text" class="five" name="email" id="email" value="<?php echo esc_attr( $comment_author_email ); ?>" size="22" tabindex="2" <?php if ( $req ) { echo "aria-required='true'"; } ?>>
		</p>
		<p>
			<label for="comment">
					<?php
						_e( 'Comment', 'foundationpress' );
					?>
			</label>
			<textarea name="comment" id="comment" tabindex="4"></textarea>
		</p>
		<p><input name="submit" class="button" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e( 'Submit', 'foundationpress' ); ?>"></p>
		<?php comment_id_fields(); ?>
		<?php do_action( 'comment_form', $post->ID ); ?>
		<?php $comments = get_comments(); 
			var_dump($comments);
		?>
	</form>
    </div>  
    <?php get_footer(); ?>
  </body>
</html>