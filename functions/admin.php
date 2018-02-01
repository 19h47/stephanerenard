<?php

/**
 * Allow extra format for files in WP Media Uploader.
 * @param array $mimes
 * @return array
 */
function magacom_mime_types( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    
    return $mimes;
}
add_filter( 'upload_mimes', 'magacom_mime_types' );

// -----------------------------------------------------------------------------
