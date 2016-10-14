<?php
/**
 * The template for displaying Comments.
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="form-horizontal">
	<?php if ( comments_open() && ! have_comments() ) : ?>
		<h2 id="comments-title">
			<?php
				_e( 'No Comments yet!', 'my-theme' );
			?>
		</h2>
	<?php endif; ?>

	<?php if ( have_comments() ) : ?>
		<h2 id="comments-title">
			<?php
				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'my-theme' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'my-theme' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'my-theme' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'my-theme' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>
		
		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use theme_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define theme_comment() and that will be used instead.
				 * See theme_comment() in my-theme/functions.php for more.
				 */
				wp_list_comments( array( 'callback' => 'themes_starter_comment' ) );
			?>
		</ol>
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'my-theme' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'my-theme' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'my-theme' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<h2 id="comments-title" class="nocomments"><?php _e( 'Comments are closed.', 'my-theme' ); ?></h2>
		
	<?php
		endif;

		// Show Comment Form (customized in functions.php!)
		comment_form();
	?>
</div><!-- /#comments -->