<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class MHCQR_Assets {

    public function __construct() {

        add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );

    }


    /*
    |--------------------------------------------------------------------------
    | Register scripts & styles
    |--------------------------------------------------------------------------
    */

    public function register_assets() {

        if ( ! $this->should_load() ) {
            return;
        }

        /*
        -------------------------
        Tailwind CSS
        -------------------------
        */

        wp_enqueue_style(
            'mhcqr-tailwind',
            MHCQR_PLUGIN_URL . 'tailwind/tailwind.min.css',
            [],
            MHCQR_VERSION
        );


        /*
        -------------------------
        Plugin CSS
        -------------------------
        */

        wp_enqueue_style(
            'mhcqr-style',
            MHCQR_PLUGIN_URL . 'assets/css/style.css',
            [],
            MHCQR_VERSION
        );


        /*
        -------------------------
        QR Code Styling Library
        -------------------------
        */

        wp_enqueue_script(
            'mhcqr-qr-lib',
            MHCQR_PLUGIN_URL . 'assets/js/qr-code-styling.js',
            [],
            MHCQR_VERSION,
            true
        );


        /*
        -------------------------
        Plugin Script
        -------------------------
        */

        wp_enqueue_script(
            'mhcqr-script',
            MHCQR_PLUGIN_URL . 'assets/js/script.js',
            [ 'mhcqr-qr-lib' ],
            MHCQR_VERSION,
            true
        );


        /*
        -------------------------
        Pass data to JS
        -------------------------
        */

        wp_localize_script(
            'mhcqr-script',
            'mhcqrData',
            [
                'nonce' => wp_create_nonce( 'mhcqr_nonce' ),
            ]
        );

    }



    /*
    |--------------------------------------------------------------------------
    | Load only if shortcode exists
    |--------------------------------------------------------------------------
    */

    private function should_load() {

        global $post;

        if ( is_admin() ) {
            return false;
        }

        if ( empty( $post ) ) {
            return false;
        }

        if ( has_shortcode( $post->post_content, 'mhc_qr_generator' ) ) {
            return true;
        }

        return false;

    }

}