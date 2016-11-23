<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
$search_query = get_search_query();
?>

	<p class="title__text smaller normal">
		Sorry! We couldn’t find any results for "<?php echo $search_query; ?>".
	</p>

