<?php
/**
 * The template for displaying content in the index.php template
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-6 col-md-6'); ?>>
	
	<div class="panel panel-default">
		<header class="entry-header panel-heading">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'my-theme' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php
						themes_starter_article_posted_on();

						$num_comments = get_comments_number();

						if ( comments_open() ) :
							if ( $num_comments == 0 ) {
								//$comments = __( 'No Comments', 'my-theme' );
							} elseif ( $num_comments > 1 ) {
								$comments = $num_comments . ' ' . __( 'Comments', 'my-theme' );
							} else {
								$comments = '1 ' . __( 'Comment', 'my-theme' );
							}

							if ( isset($comments) ) {
								echo ', <a href="' . get_comments_link() .'">'. $comments.'</a>';
							}
						endif;
					?>
				</div><!-- /.entry-meta -->
			<?php endif; ?>
		</header><!-- /.entry-header -->

		<div class="entry-content panel-body">
			<?php
				if ( has_post_thumbnail() ) :
					echo '<div class="post-thumbnail">' . the_post_thumbnail() . '</div>';
				endif;
			?>
			<?php 
				if ( is_search() ) :
					the_excerpt();
				else:
					the_content();
				endif;
			?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'my-theme' ) . '</span>', 'after' => '</div>' ) ); ?>
		</div><!-- /.entry-content -->

		<footer class="entry-meta panel-body">
			<a href="<?php echo get_permalink(); ?>" class="btn btn-default"><?php _e( 'more', 'my-theme' ); ?></a>
		</footer><!-- .entry-meta -->
	</div>
</article><!-- /#post-<?php the_ID(); ?> -->
