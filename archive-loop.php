<?php
/**
 * The template for displaying the archive loop
 */
?>

<?php themes_starter_content_nav( 'nav-above' ); ?>

<div class="row">
	<?php
		/* Start the Loop */
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
			
				/* Include the Post-Format-specific template for the content.
				 * If you want to overload this in a child theme then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', 'index' ); // Post format: content-index.php
				
			endwhile;
		endif;

		wp_reset_postdata(); // end of the loop.
	?>
</div><!-- /.card-columns -->

<?php themes_starter_content_nav( 'nav-below' ); ?>
