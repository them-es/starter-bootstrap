	<?php
		// If Single or Archive (Category, Tag, Author or a Date based page)
		if ( is_single() || is_archive() ) :
	?>
			</div><!-- /.col -->

			<?php get_sidebar(); ?>

		</div><!-- /.row -->
	<?php
		endif;
	?>

		<div id="footer">
			<hr>
			<div class="row">
				<p class="col-lg-6 col-md-6">&copy; <?php echo date('Y'); ?> <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></p>
				
				<?php
					if ( has_nav_menu( 'footer-menu' ) ) : // see function register_nav_menus() in functions.php
						echo '<div class="col-lg-6 col-md-6"><ul class="menu nav nav-tabs">';

							/*
								Loading WordPress Custom Menu (theme_location) ... remove <div> <ul> containers and show only <li> items!!!
								Menu name taken from functions.php!!! ... register_nav_menu( 'footer-menu', 'Footer Menu' );
								!!! IMPORTANT: After adding all pages to the menu, don't forget to assign this menu to the Footer menu of "Theme locations" /wp-admin/nav-menus.php (on left side) ... Otherwise the themes will not know, which menu to use!!!
							*/
							wp_nav_menu( array(
								'theme_location'  => 'footer-menu',
								'container'       => '',
								'fallback_cb'     => '',
								'items_wrap'      => '%3$s',
								'walker'          => '',
							) );

						echo '</ul></div>';
					endif;
				?>

				<?php if ( is_sidebar_active( 'third_widget_area' ) ) : ?>
					<div class="pull-right"><?php dynamic_sidebar( 'third_widget_area' ); ?></div>
				<?php endif; ?>
			</div>
		</div><!-- /#footer -->

	</div><!-- /#main -->
	
</div><!-- /#wrapper -->

<?php wp_footer(); ?>

</body>
</html>