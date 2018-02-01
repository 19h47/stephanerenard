<?php

if ( ! function_exists( 'wpcf7_validate_confirmation_password' ) ) :

/**
 * Validate password and confirmation password.
 */
function wpcf7_validate_confirmation_password( $result, $tag ) {
    $tag = new WPCF7_Shortcode( $tag );
 
    if ( 'your-password-confirm' !== $tag->name ) {
    	return $result;
    }

    $your_password = isset( $_POST['your-password'] ) ? trim( $_POST['your-password'] ) : '';
    $your_password_confirm = isset( $_POST['your-password-confirm'] ) ? trim( $_POST['your-password-confirm'] ) : '';

    if ( $your_password !== $your_password_confirm ) {
        $result->invalidate( $tag, "Password must match" );
    }
 
    return $result;
}
add_filter( 'wpcf7_validate_password*', 'wpcf7_validate_confirmation_password', 20, 2 );

endif;

// -----------------------------------------------------------------------------
