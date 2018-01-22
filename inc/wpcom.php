<?php
/**
 * Support for wordpress.com-specific functions.
 * 
 */

	// @global array $themecolors
	function themes_starter_wpcom_setup() {
		global $themecolors;

		// Set theme colors for third party services.
		if ( ! isset( $themecolors ) ) {
			$themecolors = array(
				'bg'     => '',
				'border' => '',
				'text'   => '',
				'link'   => '',
				'url'    => '',
			);
		}
	}
	add_action( 'after_setup_theme', 'themes_starter_wpcom_setup' );

?>