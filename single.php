<?php
/**
 * The Template for displaying all single posts.
 */

	get_header();
?>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<?php
			get_template_part( 'content', 'single' );
			
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>
		
	<?php endwhile; endif; wp_reset_postdata(); // end of the loop. ?>
	
	<?php
		$count_posts = wp_count_posts();

		if ( $count_posts->publish > '1' ) :
	?>
		<ul class="pager">
			<li><?php previous_post_link( '%link', '<span aria-hidden="true">&larr;</span> ' . __( 'Previous Post', 'my-theme' ) ); ?></li>
			<li><?php next_post_link( '%link', __( 'Next Post', 'my-theme' ) . ' <span aria-hidden="true">&rarr;</span>' ); ?></li>
		</ul><!-- /.pager -->
	<?php endif; ?>

<?php get_footer(); ?>
