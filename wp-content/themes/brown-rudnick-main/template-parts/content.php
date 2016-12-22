<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div class = "columns small-12 medium-12 large-12 margin-top-20">
<div id="post-<?php the_ID(); ?>" <?php post_class('blogpost-entry'); ?>>
		<p class="title__text "><a class="black" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
	<div class="entry-content">
		<?php the_excerpt();?>
	</div>
	<div class="page__divider grey"></div>
</div>
</div>
