<?php
/**
 * Template Name: Not found
 * Description: Page template 404 Not found
 *
 */

    get_header();
?>

	<div id="post-0" class="content error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'my-theme' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'my-theme' ); ?></p>
			<div><?php get_search_form(); ?></div>
		</div><!-- /.entry-content -->
	</div><!-- /#post-0 -->
 
<?php get_footer(); ?>