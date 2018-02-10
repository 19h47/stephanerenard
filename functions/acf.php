<?php

if ( ! function_exists( 'acf_show_admin' ) ) :

/**
 * Hide ACF plugin in backend if user is not an administrator.
 * @param bool $show
 * @return bool
 */
function acf_show_admin( $show ) {
    $current_user = wp_get_current_user();

    return current_user_can( 'manage_options' );
}
add_filter( 'acf/settings/show_admin', 'acf_show_admin' );

endif;

// -----------------------------------------------------------------------------

if ( function_exists( 'eae_encode_emails' ) && ! function_exists( 'acf_encode_emails' ) ) :

/**
 * Encode emails inside ACF.
 * Rely on Email Address Encoder plugin.
 * @param  mixed $value
 * @param  int $post_id
 * @param  array $field
 * @return mixed
 */
function acf_encode_emails( $value, $post_id, $field ) {
    return eae_encode_emails( $value );
}
add_filter( 'acf/format_value/type=text', 'acf_encode_emails', 10, 3 );
add_filter( 'acf/format_value/type=textarea', 'acf_encode_emails', 10, 3 );
add_filter( 'acf/format_value/type=email', 'acf_encode_emails', 10, 3 );
add_filter( 'acf/format_value/type=wysiwyg', 'acf_encode_emails', 10, 3 );

endif;

// -----------------------------------------------------------------------------

if ( ! function_exists( 'acf_wrap_oembed' ) ) :

/**
 * Wrap oEmbed fields with the native WP oEmbed container.
 * @param  mixed $value
 * @param  int $post_id
 * @param  array $field
 * @return mixed
 */
function acf_wrap_oembed( $value, $post_id, $field ) {
    return '<div class="embed-container">' . $value . '</div>';
}
add_filter( 'acf/format_value/type=oembed', 'acf_wrap_oembed', 99, 3 );

endif;

// -----------------------------------------------------------------------------

if ( ! function_exists( 'get_image_field' ) ) :

/**
 * Retrieve a <img> from ACF image array.
 * @param  array  $image
 * @param  string $size
 * @param  array  $args
 * @return string
 */
function get_image_field( $image, $size = null, $args = array() ) {
    if ( ! is_array( $image ) ) {
        return;
    }

    // prepare attributes
    $atts = array(
        'class'     => '',
        'src'       => '',
        'title'     => '',
        'alt'       => '',
        'width'     => 0,
        'height'    => 0,
    );

    // ensure class is not an array
    if ( is_array( $args['class'] ) ) {
        $args['class'] = join( ' ', $args['class'] );
    }

    if ( ! $size || ! isset( $image['sizes'][ $size ] ) ) {
        $atts['width'] = $image['width'];
        $atts['height'] = $image['height'];
        $atts['src'] = $image['url'];
    } else {
        $atts['width'] = $image['sizes'][ $size . '-width' ];
        $atts['height'] = $image['sizes'][ $size . '-height' ];
        $atts['src'] = $image['sizes'][ $size ];
    }

    $atts['title'] = $image['title'];

    // filter out other attributes default ones
    $args = array_intersect_key( $args, $atts );

    // all attributes can be overwritten from args
    $atts = array_merge( $atts, $args );

    // escape attributes
    $atts = array_map( 'esc_attr', $atts );

    // flatten attributes
    $attributes = '';
    foreach ( $atts as $attr => $value ) {
        if ( ! empty( $value ) ) {
            $attributes .= " $attr=" . '"' . $value . '"';
        }
    }

    // build output
    $output = '<img' . $attributes . '>';

    return $output;
}

endif;

// -----------------------------------------------------------------------------

if ( ! function_exists( 'the_image_field' ) ) :

/**
 * Display a <img> from ACF image array.
 * @param  array  $image
 * @param  string $size
 * @param  array  $args
 */
function the_image_field( $image, $size = null, $args = array() ) {
    echo get_image_field( $image, $size, $args );
}

endif;

// -----------------------------------------------------------------------------

add_filter('acf/settings/save_json', 'acf_json_save_point');

/**
 * acf_json_save_point
 *
 * @param   $path
 * @see     https://www.advancedcustomfields.com/resources/local-json/
 * @return  $path
 */
function acf_json_save_point( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/acf-export';

    // return
    return $path;
}