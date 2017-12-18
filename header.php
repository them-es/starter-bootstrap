<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<?php
	$navbar_scheme = get_theme_mod( 'navbar_scheme', 'default' ); // get custom meta-value
	$navbar_position = get_theme_mod( 'navbar_position', 'static' ); // get custom meta-value

	$search_enabled = get_theme_mod( 'search_enabled', '1' ); // get custom meta-value
?>

<body <?php body_class(); ?>>

<a href="#main" class="sr-only sr-only-focusable"><?php _e( 'Skip to main content', 'my-theme' ); ?></a>

<div id="wrapper">
	
	<header id="header"<?php if ( is_home() || is_front_page() ) : ?> class="home"<?php endif; ?>>
		<nav class="navbar navbar-<?php echo $navbar_scheme; if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' navbar-fixed-top'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' navbar-fixed-bottom'; else : echo ' navbar-static-top'; endif; ?>">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php
						$header_logo = get_theme_mod( 'header_logo' ); // get custom meta-value

						if ( isset( $header_logo ) && ! empty( $header_logo ) ) :
					?>
						<img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
					<?php
						else :

							echo esc_attr( get_bloginfo( 'name', 'display' ) );

						endif;
					?>
					</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<?php
						/** Loading WordPress Custom Menu (theme_location) **/
						wp_nav_menu( array(
							'theme_location' => 'main-menu',
							'container'      => '',
							'items_wrap'     => '<ul class="nav navbar-nav">%3$s</ul>',
							'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
							'walker'         => new wp_bootstrap_navwalker(),
						) );
					?>
					
					<?php if ( isset( $search_enabled ) && '1' === $search_enabled ) : ?>
						<form class="navbar-form navbar-right search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<div class="input-group input-group-sm">
								<input type="text" id="s" name="s" class="form-control" placeholder="<?php _e( 'Search', 'my-theme' ); ?>">
								<span class="input-group-btn">
									<button type="submit" id="searchsubmit" name="submit" class="btn btn-default"><?php _e( 'Search', 'my-theme' ); ?></button>
							</span>
							</div>
						</form>
					<?php endif; ?>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		</nav>
	</header><!-- /#header -->
	
	<div id="main" class="container"<?php if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' style="padding-top: 80px;"'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' style="padding-bottom: 80px;"'; endif; ?>>
		
		<?php
			// If Single or Archive (Category, Tag, Author or a Date based page)
			if ( is_single() || is_archive() ) :
		?>
			<div class="row">
				<div class="col-lg-8 col-lg-push-4 col-md-8 col-md-push-4 col-sm-12">
		<?php
			endif;
		?>
