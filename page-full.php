<?php 
/**
 * Template Name: Page (Full width)
 * Description: Page template full width
 *
 */

	get_header();

	$id = get_the_ID();

	// Add class via custom field (optional)
	$class = sanitize_text_field( get_post_meta( $id, '_class', true ) );// get custom meta-value
	$style = sanitize_text_field( get_post_meta( $id, '_style', true ) );// get custom meta-value
?>

	<?php the_post(); ?>
	
	<div id="post-<?php the_ID(); ?>" <?php if ( isset($class) && $class != "" ) : post_class('content ' . $class); else: echo post_class('content'); endif; ?><?php if ( isset($style) && $style != "" ) : echo ' style="' . $style . '"'; endif; ?>>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php
			the_content();
			
			wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'my-theme' ) . '&after=</div>');
			edit_post_link( __( 'Edit', 'my-theme' ), '<span class="edit-link">', '</span>' );
		?>
	</div><!-- /#post-<?php the_ID(); ?> -->

	<?php
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>
	
<?php get_footer(); ?>
