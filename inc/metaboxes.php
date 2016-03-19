<?php

/** 
 * Add Custom Metabox with class: http://codex.wordpress.org/Function_Reference/add_meta_box#Class
 *
 * 1. render_meta_box_class: "_class"
 * 2. render_meta_box_style: "_style"
 */

    function themes_starter_call_addCustomMetabox() {
        new themes_starter_addCustomMetabox();
    }

    if ( is_admin() ) {
        add_action( 'load-post.php', 'themes_starter_call_addCustomMetabox' );
        add_action( 'load-post-new.php', 'themes_starter_call_addCustomMetabox' );
    }
    
    class themes_starter_addCustomMetabox {

        /**
         * Hook into the appropriate actions when the class is constructed.
         */
        public function __construct() {
            add_action( 'add_meta_boxes', array( $this, 'themes_starter_add_metabox' ) );
            add_action( 'save_post', array( $this, 'themes_starter_save' ) );
        }

        /**
         * Adds the meta box container.
         */
        public function themes_starter_add_metabox( $post_type ) {
            $post_types = array('page'); // limit meta box to Edit page

            if ( in_array( $post_type, $post_types )) {
                // 1. "class"
                add_meta_box(
                    'class',
                    __( 'class', 'my-theme' ),
                    array( $this, 'themes_starter_render_metabox_class' ),
                    $post_type,
                    'side',
                    'low'
                );
                // 2. "style"
                add_meta_box(
                    'style',
                    __( 'style', 'my-theme' ),
                    array( $this, 'themes_starter_render_metabox_style' ),
                    $post_type,
                    'side',
                    'low'
                );
            }
        }

        /**
         * Save the meta when the post is saved.
         *
         * @param int $post_id The ID of the post being saved.
         */
        public function themes_starter_save( $post_id ) {

            /*
             * We need to verify this came from the our screen and with proper authorization,
             * because save_post can be triggered at other times.
             */

            // Check if our nonce is set.
            if ( ! isset( $_POST['myplugin_inner_custom_box_nonce'] ) )
                return $post_id;

            $nonce = $_POST['myplugin_inner_custom_box_nonce'];

            // Verify that the nonce is valid.
            if ( ! wp_verify_nonce( $nonce, 'myplugin_inner_custom_box' ) )
                return $post_id;

            // If this is an autosave, our form has not been submitted,
                    //     so we don't want to do anything.
            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
                return $post_id;

            // Check the user's permissions.
            if ( 'page' == $_POST['post_type'] ) {

                if ( ! current_user_can( 'edit_page', $post_id ) )
                    return $post_id;

            }

            /* OK, its safe for us to save the data now. */

            // Sanitize the user input.
            $myclass = sanitize_text_field( $_POST['class'] );
            $mystyle = sanitize_text_field( $_POST['style'] );

            // Update the meta field.
            update_post_meta( $post_id, '_class', $myclass );
            update_post_meta( $post_id, '_style', $mystyle );
        }


        /**
         * Render Meta Box content.
         *
         * @param WP_Post $post The post object.
         */
        public function themes_starter_render_metabox_class( $post ) {

            // Add an nonce field so we can check for it later.
            wp_nonce_field( 'myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce' );

            // Use get_post_meta to retrieve an existing value from the database.
            $value = sanitize_text_field( get_post_meta( $post->ID, '_class', true ) );

            // Display the form, using the current value.
            echo '<input type="text" id="_class" name="class"';
            echo ' value="' . esc_attr( $value ) . '" size="25" />';
        }
        
        public function themes_starter_render_metabox_style( $post ) {

            // Add an nonce field so we can check for it later.
            wp_nonce_field( 'myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce' );

            // Use get_post_meta to retrieve an existing value from the database.
            $value = get_post_meta( $post->ID, '_style', true );

            // Display the form, using the current value.
            echo '<input type="text" id="_style" name="style"';
            echo ' value="' . esc_attr( $value ) . '" size="25" />';
        }
		
    }

?>