<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class MHCQR_Shortcode {

    public function __construct() {

        add_shortcode(
            'mhc_qr_generator',
            [ $this, 'render_shortcode' ]
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Shortcode callback
    |--------------------------------------------------------------------------
    */

    public function render_shortcode( $atts = [] ) {

        // Security: prevent admin render issues
        if ( is_admin() ) {
            return '';
        }

        // Attributes (for future use)
        $atts = shortcode_atts(
            [
                'type' => '',
            ],
            $atts,
            'mhc_qr_generator'
        );


        /*
        -------------------------
        Render form
        -------------------------
        */

        if ( ! class_exists( 'MHCQR_Render' ) ) {
            return '';
        }

        ob_start();

        $renderer = new MHCQR_Render();
        $renderer->render_form( $atts );

        return ob_get_clean();

    }

}