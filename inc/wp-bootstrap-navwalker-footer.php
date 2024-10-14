<?php

if ( ! class_exists( 'WP_Bootstrap4_Navwalker_Footer' ) ) {
	/**
	 * WP_Bootstrap4_Navwalker_Footer class.
	 *
	 * @extends Walker_Nav_Menu
	 */
	class WP_Bootstrap4_Navwalker_Footer extends Walker_Nav_Menu {

		/**
		 * Start Level.
		 *
		 * @see Walker::start_lvl()
		 * @since 1.0.0
		 *
		 * @param string   $output Used to append additional content (passed by reference).
		 * @param int      $depth  Depth of menu item. Used for padding.
		 * @param stdClass $args   An object of wp_nav_menu() arguments.
		 */
		public function start_lvl( &$output, $depth = 0, $args = null ) {
			$output .= '<ul role="menu" class="dropdown-menu">';
		}

		/**
		 * Start El.
		 *
		 * @see Walker::start_el()
		 * @since 1.0.0
		 *
		 * @param string   $output Used to append additional content (passed by reference).
		 * @param WP_Post  $item   Menu item data object.
		 * @param int      $depth  Depth of menu item. Used for padding.
		 * @param stdClass $args   An object of wp_nav_menu() arguments.
		 * @param int      $id     Current item ID.
		 */
		public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			$atts = array();

			if ( 0 === $depth ) {
				$classes[] = 'nav-item'; // First level.
			}
			if ( preg_grep( '/^current/', $classes ) ) {
				$classes[]            = 'active';
				$atts['aria-current'] = 'page';
			}

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= '<li' . $class_names . '>';

			$atts['role']   = 'menuitem';
			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['target'] = ! empty( $item->target ) ? $item->target : '';
			$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
			$atts['href']   = ! empty( $item->url ) ? $item->url : '';

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . esc_attr( $attr ) . '="' . $value . '"';
				}
			}

			$item_output      = $args->before;
			$item_output     .= '<a' . $attributes . ' class="nav-link">';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output     .= '</a>';
			$item_output     .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
}
