<?php
/**
 * Template Name: Blog Index
 * Description: The template for displaying the Blog index /blog.
 *
 */

	get_header();

	$page_id = get_option( 'page_for_posts' );
?>

	<div class="row">
	
		<div class="col-lg-12">
			<?php
				echo nl2br( apply_filters( 'the_content', get_post_field( 'post_content', $page_id ) ) );// = echo content from Bloghome

				edit_post_link( __( 'Edit', 'my-theme' ), '<span class="edit-link">', '</span>', $page_id );
			?>
		</div>
		
		<?php themes_starter_content_nav( 'nav-above' ); ?>

		<?php
			/** Loading only 3 latest posts (no themes_starter_content_nav!!!) *
			query_posts(array(
				'showposts' => 3
			));*/

			$count = 1;

			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();

					get_template_part( 'content', 'index' ); // Post format: content-index.php!
					comments_template( '', false );

					if ( 0 === $count % 2 ) :
						echo '<div class="clearfix"></div>'; // Clearfix after 2 posts.
					endif;

					$count++;

				endwhile;
			endif;
			wp_reset_postdata(); // end of the loop.
		?>

		<?php themes_starter_content_nav( 'nav-below' ); ?>
		
	</div><!-- /.row -->

<?php get_footer(); ?>
