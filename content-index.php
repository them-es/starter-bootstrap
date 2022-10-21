<?php
/**
 * The template for displaying content in the index.php template.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-sm-6' ); ?>>
	<div class="card mb-4">
		<header class="card-body">
			<h2 class="card-title">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'my-theme' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
			<?php
				if ( 'post' === get_post_type() ) :
			?>
				<div class="card-text entry-meta">
					<?php
						themes_starter_article_posted_on();

						$num_comments = get_comments_number();
						if ( comments_open() && $num_comments >= 1 ) :
							echo ' <a href="' . get_comments_link() . '" class="badge badge-pill bg-secondary float-end" title="' . esc_attr( sprintf( _n( '%s Comment', '%s Comments', $num_comments, 'my-theme' ), $num_comments ) ) . '">' . $num_comments . '</a>';
						endif;
					?>
				</div><!-- /.entry-meta -->
			<?php
				endif;
			?>
		</header>
		<div class="card-body">
			<div class="card-text entry-content">
				<?php
					if ( has_post_thumbnail() ) :
						echo '<div class="post-thumbnail">' . get_the_post_thumbnail( get_the_ID(), 'large' ) . '</div>';
					endif;

					if ( is_search() ) :
						the_excerpt();
					else :
						the_content();
					endif;
				?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . esc_html__( 'Pages:', 'my-theme' ) . '</span>', 'after' => '</div>' ) ); ?>
			</div><!-- /.card-text -->
			<footer class="entry-meta">
				<a href="<?php echo get_the_permalink(); ?>" class="btn btn-outline-secondary"><?php esc_html_e( 'more', 'my-theme' ); ?></a>
			</footer><!-- /.entry-meta -->
		</div><!-- /.card-body -->
	</div><!-- /.col -->
</article><!-- /#post-<?php the_ID(); ?> -->
