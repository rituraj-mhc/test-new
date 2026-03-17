<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class MHCQR_Security {

    /*
    |--------------------------------------------------------------------------
    | Sanitize Text
    |--------------------------------------------------------------------------
    */

    public static function sanitize_text( $value ) {

        return sanitize_text_field( $value );

    }


    /*
    |--------------------------------------------------------------------------
    | Sanitize URL
    |--------------------------------------------------------------------------
    */

    public static function sanitize_url( $value ) {

        return esc_url_raw( $value );

    }


    /*
    |--------------------------------------------------------------------------
    | Escape HTML
    |--------------------------------------------------------------------------
    */

    public static function esc_html( $value ) {

        return esc_html( $value );

    }


    /*
    |--------------------------------------------------------------------------
    | Escape Attribute
    |--------------------------------------------------------------------------
    */

    public static function esc_attr( $value ) {

        return esc_attr( $value );

    }


    /*
    |--------------------------------------------------------------------------
    | Verify Nonce
    |--------------------------------------------------------------------------
    */

    public static function verify_nonce( $nonce ) {

        if ( ! isset( $nonce ) ) {
            return false;
        }

        if ( ! wp_verify_nonce( $nonce, 'mhcqr_nonce' ) ) {
            return false;
        }

        return true;

    }

}