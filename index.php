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
		
		<div class="col-md-12">
			<?php
				echo nl2br( apply_filters( 'the_content', get_post_field( 'post_content', $page_id ) ) ); // = echo content from Bloghome

				edit_post_link( __( 'Edit', 'my-theme' ), '<span class="edit-link">', '</span>', $page_id );
			?>
		</div><!-- /.col -->

		<div class="col-md-12">
			<?php
				get_template_part( 'archive', 'loop' );
			?>
		</div><!-- /.col -->
		
	</div><!-- /.row -->

<?php get_footer(); ?>
