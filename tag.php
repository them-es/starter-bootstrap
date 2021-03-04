<?php
/**
 * The Template used to display Tag Archive pages
 */

get_header();

if ( have_posts() ) :
?>
	<header class="page-header">
		<h1 class="page-title"><?php printf( __( 'Tag: %s', 'my-theme' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
		<?php
			$tag_description = tag_description();
			if ( ! empty( $tag_description ) ) :
				echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
			endif;
		?>
	</header>
<?php
	get_template_part( 'archive', 'loop' );

else :

	// 404.
	get_template_part( 'content', 'none' );

endif;

wp_reset_postdata(); // End of the loop.

get_footer();
