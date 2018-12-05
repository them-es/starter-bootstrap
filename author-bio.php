<?php
/**
 * Author description
 */

	if ( get_the_author_meta( 'description' ) ) :
?>
	<div class="author-info<?php if ( ! is_single() ) : ?> well<?php endif; ?>">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 author-avatar text-center">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themes_starter_author_bio_avatar_size', 128 ) ); ?>
			</div><!-- /.author-avatar -->
			<div class="col-lg-9 col-md-9 col-sm-12 author-description">
				<h2><?php printf( __( 'About %s', 'my-theme' ), get_the_author() ); ?></h2>
				<p><?php the_author_meta( 'description' ); ?></p>
				<p class="author-links">
					<?php
						if ( ! empty( get_the_author_meta( 'user_url' ) ) ) :
							printf( '<a href="%s" class="www btn btn-default btn-sm">' . __( 'Website', 'my-theme' ) . '</a>', esc_url( get_the_author_meta( 'user_url' ) ) );
						endif;
						
						// Add new Profile fields for Users in functions.php
						$fields = array(
							array(
								'meta' => 'facebook_profile',
								'label' => 'Facebook',
							),
							array(
								'meta' => 'twitter_profile',
								'label' => 'Twitter',
							),
							array(
								'meta' => 'google_profile',
								'label' => 'Google+',
							),
							array(
								'meta' => 'linkedin_profile',
								'label' => 'LinkedIn',
							),
							array(
								'meta' => 'xing_profile',
								'label' => 'Xing',
							),
							array(
								'meta' => 'github_profile',
								'label' => 'GitHub',
							),
						);
				
						foreach ( $fields as $key => $data ) {
							$link = get_the_author_meta( esc_attr( $data['meta'] ) );
							if ( ! empty( $link ) ) {
								$label = esc_html( $data['label'] );
								echo ' <a href="' . esc_url( $link ) . '" class="btn btn-default btn-sm" title="' . $label . '">' . $label . '</a> ';
							}
						}
					?>
				</p>
			</div><!-- /.author-description -->
		</div><!-- /.row -->
	</div><!-- /.author-info -->

	<hr>

<?php endif; ?>
