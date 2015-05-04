<?php
/**
 * The Template for displaying all single posts.
 */

    get_header();
?>

	<div class="row">
		
		<div class="col-lg-8 col-lg-push-4 col-md-8 col-md-push-4 col-sm-12">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<?php
					get_template_part( 'content', 'single' );
					                    
				    // If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
				
			<?php endwhile; endif; wp_reset_query(); // end of the loop. ?>
			
			<?php
				$count_posts = wp_count_posts();

				if ( $count_posts->publish > '1' ) :
			?>
				<ul class="pager">
					<li><?php previous_post_link( '%link', '<span aria-hidden="true">&larr;</span> ' . __( 'Previous Post', 'my-theme' ) ); ?></li>
					<li><?php next_post_link( '%link', __( 'Next Post', 'my-theme' ) . ' <span aria-hidden="true">&rarr;</span>' ); ?></li>
				</ul><!-- /.pager -->
			<?php endif; ?>
			
		</div><!-- /.col -->
		
		<?php get_sidebar(); ?>
		
	</div><!-- /.row -->

<?php get_footer(); ?>