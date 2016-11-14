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
						/*
							Loading WordPress Custom Menu (theme_location) ... remove <div> <ul> containers and show only <li> items!!!
							Menu name taken from functions.php!!! ... register_nav_menu( 'footer-menu', 'Footer Menu' );
							!!! IMPORTANT: After adding all pages to the menu, don't forget to assign this menu to the Footer menu of "Theme locations" /wp-admin/nav-menus.php (on left side) ... Otherwise the themes will not know, which menu to use!!!
						*/
						wp_nav_menu( array(
							'theme_location'  => 'footer-menu',
							'container'       => 'nav',
							'container_class' => 'col-lg-6 col-md-6',
							'fallback_cb'     => '',
							'items_wrap'      => '<ul class="menu nav nav-tabs">%3$s</ul>',
							'walker'          => '',
						) );
					endif;
				?>

				<?php if ( is_sidebar_active( 'third_widget_area' ) ) : ?>
					<div class="pull-right">
						<?php dynamic_sidebar( 'third_widget_area' ); ?>

						<?php if ( current_user_can( 'manage_options' ) ) : ?>
							<p class="edit-link"><a href="<?php echo admin_url( 'widgets.php' ); ?>" class="badge badge-info"><?php _e( 'Edit', 'my-theme' ); ?></a></p><!-- Show Edit Widget link -->
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div><!-- /#footer -->

	</div><!-- /#main -->
	
</div><!-- /#wrapper -->

<?php wp_footer(); ?>

</body>
</html>