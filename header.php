<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>
</head>

<?php
	$navbar_scheme = get_theme_mod( 'navbar_scheme', 'navbar-light bg-light' ); // get custom meta-value
	$navbar_position = get_theme_mod( 'navbar_position', 'static' ); // get custom meta-value

	$search_enabled = get_theme_mod( 'search_enabled', '1' ); // get custom meta-value
?>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<a href="#main" class="sr-only sr-only-focusable"><?php _e( 'Skip to main content', 'my-theme' ); ?></a>

<div id="wrapper">

	<header>
		<nav id="header" class="navbar navbar-expand-md <?php echo $navbar_scheme; if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position) : echo ' fixed-top'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' fixed-bottom'; endif; if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
			<div class="container">
				<a class="navbar-brand" href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php
						$header_logo = get_theme_mod( 'header_logo' ); // get custom meta-value

						if ( ! empty( $header_logo ) ) :
					?>
						<img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
					<?php
						else :
							echo esc_attr( get_bloginfo( 'name', 'display' ) );
						endif;
					?>
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="<?php _e( 'Toggle navigation', 'my-theme' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<div id="navbar" class="collapse navbar-collapse">
					<?php
						/** Loading WordPress Custom Menu (theme_location) **/
						wp_nav_menu( array(
							'theme_location'  => 'main-menu',
							'container'       => '',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
							'walker'          => new WP_Bootstrap_Navwalker(),
						) );
					?>
					
					<?php if ( '1' === $search_enabled ) : ?>
						<form class="form-inline search-form my-2 my-lg-0" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<input type="text" id="s" name="s" class="form-control mr-sm-2" placeholder="<?php _e( 'Search', 'my-theme' ); ?>..." title="<?php echo esc_attr( __( 'Search', 'my-theme' ) ); ?>" />
							<button type="submit" id="searchsubmit" name="submit" class="btn btn-outline-secondary my-2 my-sm-0"><?php _e( 'Search', 'my-theme' ); ?></button>
						</form>
					<?php endif; ?>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		</nav><!-- /#header -->
	</header>
	
	<main id="main" class="container"<?php if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' style="padding-top: 100px;"'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' style="padding-bottom: 100px;"'; endif; ?>>
		
		<?php
			// If Single or Archive (Category, Tag, Author or a Date based page)
			if ( is_single() || is_archive() ) :
		?>
			<div class="row">
				<div class="col-md-8 col-sm-12">
		<?php
			endif;
		?>
