<?php
/**
 * The template for displaying "not found" content in the Blog Archives
 */

$search_enabled = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value
?>
<article id="post-0" class="post no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'my-theme' ); ?></h1>
	</header><!-- /.entry-header -->
	<div class="entry-content">
		<p><?php _e( 'Apologies, but no results were found for the requested archive.', 'my-theme' ); ?></p>
		<?php
			if ( '1' === $search_enabled ) :
				get_search_form();
			endif;
		?>
	</div><!-- /.entry-content -->
</article><!-- /#post-0 -->
