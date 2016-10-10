<?php
/**
 * The Template used to display Tag Archive pages
 */

	get_header();
?>

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Tag: %s', 'my-theme' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
			<?php
				$tag_description = tag_description();
				if ( ! empty( $tag_description ) ) echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
			?>
		</header>

		<?php themes_starter_content_nav( 'nav-above' ); ?>

		<?php
			$count = 1;
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

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

	<?php
		endif;
		wp_reset_postdata(); // end of the loop.
	?>


<?php get_footer(); ?>
