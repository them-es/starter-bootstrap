<?php
/**
 * The Template for displaying Author pages.
 */

    get_header();
?>
 
	<?php if ( have_posts() ) : ?>
			
		<?php
			/* Queue the first post, that way we know
			* what author we're dealing with (if that is the case).
			*
			* We reset this later so we can run the loop
			* properly with a call to rewind_posts().
			*/
			the_post();
		?>

		<header class="page-header">
			<h1 class="page-title author">
				<?php 
					printf( __( 'Author Archives: %s', 'my-theme' ), '<span class="vcard">' . get_the_author() . '</span>' ); 
				?>
			</h1>
		</header>

		<?php
			/* Since we called the_post() above, we need to
			* rewind the loop back to the beginning that way
			* we can run the loop properly, in full.
			*/
			rewind_posts();
		?>

		<?php themes_starter_content_nav( 'nav-above' ); ?>

			<?php get_template_part( 'author', 'bio' ); ?>

		<?php 
			$count = 1;
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/* Include the Post-Format-specific template for the content.
				* If you want to overload this in a child theme then include a file
				* called content-___.php (where ___ is the Post Format name) and that will be used instead.
				*/
				get_template_part( 'content', 'index' );

				if ( $count%2 == 0) echo '<div class="clearfix"></div>';
				$count++;

			endwhile;
		?>

		<?php themes_starter_content_nav( 'nav-below' ); ?>

	<?php else : ?>

		<?php
			// 404
			get_template_part( 'content', 'none' );
		?>

	<?php endif; wp_reset_query(); // end of the loop. ?>


<?php get_footer(); ?>