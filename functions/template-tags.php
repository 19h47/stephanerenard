<?php

// -----------------------------------------------------------------------------

if ( ! function_exists( 'get_barba_namespace' ) ) :

/**
 * Retrieve data-namespace for Barba.js.
 * @return string
 */
function get_barba_namespace( $ns = '' ) {
    /**
     * Filter the namespace for the current post or page.
     *
     * @param string $ns Given namespace as parameter.
     */
    $ns = apply_filters( 'barba_namespace', $ns );

   	return $ns;
}

endif;

// -----------------------------------------------------------------------------

if ( ! function_exists( 'barba_namespace' ) ) :

/**
 * Display data-namespace for Barba.js.
 * @return string
 */
function barba_namespace( $ns = '' ) {
	$ns = get_barba_namespace( $ns );

	if ( empty( $ns ) ) {
		return;
	}

    echo 'data-namespace="' . $ns . '"';
}

endif;

// -----------------------------------------------------------------------------
