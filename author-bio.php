<?php
/**
 * Author description
 */

	if ( get_the_author_meta( 'description' ) ) :
?>
	<div class="author-info<?php if ( ! is_single() ) : ?> bg-faded<?php endif; ?>">
		<div class="row">
			<div class="col-sm-12">
				<h2>
					<?php
						echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themes_starter_author_bio_avatar_size', 48 ) ) . '&nbsp;';
						printf( __( 'About %s', 'my-theme' ), get_the_author() );
					?>
				</h2>
				<div class="author-description">
					<?php the_author_meta( 'description' ); ?>
				</div>
				<p class="author-links">
					<?php
						if ( ! empty( get_the_author_meta( 'user_url' ) ) ) :
							printf( '<a href="%s" class="www btn btn-secondary btn-sm">' . __( 'Website', 'my-theme' ) . '</a>', esc_url( get_the_author_meta( 'user_url' ) ) );
						endif;
					?>
					<?php
						// Add new Profile fields for Users in functions.php
						function social_profile_link( $link, $title ) {
							echo ' <a href="' . esc_url( $link ) . '" class="btn btn-secondary btn-sm" title="' . $title . '">' . $title . '</a> ';
						}

						$facebook = get_the_author_meta( 'facebook_profile' );
						if ( ! empty( $facebook ) ) {
							social_profile_link( $facebook, 'Facebook' );
						}
						$twitter = get_the_author_meta( 'twitter_profile' );
						if ( ! empty( $twitter ) ) {
							social_profile_link( $twitter, 'Twitter' );
						}
						$google = get_the_author_meta( 'google_profile' );
						if ( ! empty( $google ) ) {
							social_profile_link( $google, 'Google+' );
						}
						$linkedin = get_the_author_meta( 'linkedin_profile' );
						if ( ! empty( $linkedin ) ) {
							social_profile_link( $linkedin, 'LinkedIn' );
						}
						$xing = get_the_author_meta( 'xing_profile' );
						if ( ! empty( $xing ) ) {
							social_profile_link( $xing, 'Xing' );
						}
						$github = get_the_author_meta( 'github_profile' );
						if ( ! empty( $github ) ) {
							social_profile_link( $github, 'GitHub' );
						}
					?>
				</p>
			</div><!-- /.author-description -->
		</div><!-- /.row -->
	</div><!-- /.author-info -->

	<hr>

<?php endif; ?>
