<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class MHCQR_Render {

    /*
    |--------------------------------------------------------------------------
    | Render Form
    |--------------------------------------------------------------------------
    */

    public function render_form( $atts = [] ) {

        $template = MHCQR_PLUGIN_DIR . 'templates/form.php';

        if ( ! file_exists( $template ) ) {
            return;
        }

        // Create nonce
        $nonce = wp_create_nonce( 'mhcqr_nonce' );

        // Allowed attributes (future use)
        $type = '';

        if ( isset( $atts['type'] ) ) {
            $type = sanitize_text_field( $atts['type'] );
        }

        /*
        -------------------------
        Load template
        -------------------------
        */

        include $template;

    }

}