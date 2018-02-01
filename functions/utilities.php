<?php

if ( ! function_exists( 'get_partial' ) ) :

/**
 * Load given template with arguments as array.
 * arguments.
 * See get_template_part().
 * http://wordpress.stackexchange.com/a/103257
 */
function get_partial( $slug = null, $name = null, array $params = array() ) {
    global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

    do_action( "get_template_part_{$slug}", $slug, $name );
    $templates = array();
    if ( isset( $name ) ) {
        $templates[] = "{$slug}-{$name}.php";
    }

    $templates[] = "{$slug}.php";

    $_template_file = locate_template( $templates, false, false );

    if ( is_array( $wp_query->query_vars ) ) {
        extract( $wp_query->query_vars, EXTR_SKIP );
    }

    extract( $params, EXTR_SKIP );

    require( $_template_file );
}

endif;

// --------------------------------------------------------------------

if ( ! function_exists( 'unautop' ) ) :

/**
 * Undo autop WordPress filter.
 * @param string $value
 * @return string
 */
function unautop( $value ) {
    return str_replace( array( '<p>', '</p>' ), '', $value );
}

endif;

// --------------------------------------------------------------------

if ( ! function_exists( 'is_ssl' ) ) :

/**
 * Check if the current connection is being made over https
 * Borrowed from http://wordpress.org/extend/plugins/oa-social-login/
 */
function is_ssl() {
    if ( ! empty( $_SERVER['SERVER_PORT'] ) ) {
        if ( 443 == trim( $_SERVER['SERVER_PORT'] ) ) {
            return true;
        }
    }

    if ( ! empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) ) {
        if ( 'https' === strtolower(trim( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) ) ) {
            return true;
        }
    }

    if ( ! empty( $_SERVER['HTTPS'] ) ) {
        if ( 'on' === strtolower( trim( $_SERVER['HTTPS'] ) ) || '1' == trim( $_SERVER['HTTPS'] ) ) {
            return true;
        }
    }

    return false;
}

endif;

// --------------------------------------------------------------------

if ( ! function_exists( 'current_url' ) ) :

/**
 * Return the current url
 * Borrowed from http://wordpress.org/extend/plugins/oa-social-login/
 */
function current_url() {
    // Extract parts
    $request_uri = ( isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF'] );
    $request_protocol = ( is_ssl() ? 'https' : 'http' );
    $request_host = ( isset( $_SERVER['HTTP_X_FORWARDED_HOST'] ) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : ( isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'] ) );

    // Port of this request
    $request_port = '';

    // We are using a proxy
    if ( isset( $_SERVER['HTTP_X_FORWARDED_PORT'] ) ) {
        // SERVER_PORT is usually wrong on proxies, don't use it!
        $request_port = intval( $_SERVER['HTTP_X_FORWARDED_PORT'] );
    }
    // Does not seem like a proxy
    elseif ( isset( $_SERVER['SERVER_PORT'] ) ) {
        $request_port = intval( $_SERVER ['SERVER_PORT'] );
    }

    // Remove standard ports
    $request_port = ( ! in_array( $request_port, array( 80, 443 ) ) ? $request_port : '' );

    // Remove port if exists in host
    if ( substr_compare( $request_host, $request_port, strlen( $request_host ) - strlen( $request_port ), strlen( $request_port ) ) === 0 ) {
        $request_port = '';
    }

    // Build url
    $current_url = $request_protocol . '://' . $request_host . ( ! empty( $request_port ) ? ( ':' . $request_port ) : '' ) . $request_uri;

    // overwrite all the above if ajax
    // if ( strpos( $current_url, 'admin-ajax.php' ) && isset( $_SERVER ['HTTP_REFERER'] ) && $_SERVER ['HTTP_REFERER'] ) {
    if ( is_ajax() ) {
        $current_url = $_SERVER ['HTTP_REFERER'];
    }

    // Done
    return $current_url;
}

endif;

// --------------------------------------------------------------------

// if ( ! function_exists( 'youtube_id' ) ) :

/**
 * Get YouTube ID from URL.
 * https://gist.github.com/MarioRicalde/1163103
 * @param  string $url YouTube URL
 * @return string      Video ID
 */
// function youtube_id( $url ) {

//     // Regular Expression (the magic).
//     $regexp = '/^https?:\/\/(?:www\.)?(?:youtube\.com|youtu\.be)\/(?:watch\?(?=.*v=([\w\-]+))(?:\S+)?|([\w\-]+))$/i';

//     // Match a URL.
//     preg_match( $regexp, $url, $matches );

//     // Remove empty values from the array (regexp shit).
//     $matches = array_filter( $matches, function( $var ) {
//         return $var !== '';
//     } );

//     // If we have 2 elements in array, it means we got a valid url!
//     // $matches[1] is the youtube ID!
//     if ( count( $matches ) === 2 ) {
//         return $matches[1];
//     }

//     return null;
// }

// endif;

// --------------------------------------------------------------------

if ( ! function_exists( 'twitter_handle' ) ) :

/**
 * Extract Twitter handle from Twitter URL.
 * http://stackoverflow.com/a/5948248
 * @param  string $url Twitter URL
 * @return string      Twitter handle
 */
function twitter_handle( $url ) {

    // Regular Expression (the magic).
    $regexp = '/^https?:\/\/(?:www\.)?twitter\.com\/(?:#!\/)?([^\/]+)(?:\/\w+)*$/i';

    // Match a URL.
    preg_match( $regexp, $url, $matches );

    // Remove empty values from the array (regexp shit).
    $matches = array_filter( $matches, function( $var ) {
        return $var !== '';
    } );

    // If we have 2 elements in array, it means we got a valid url!
    // $matches[1] is the Twitter handle!
    if ( count( $matches ) === 2 ) {
        return $matches[1];
    }

    return null;
}

endif;

// --------------------------------------------------------------------

if ( ! function_exists( 'wp_get_attachment_image_like_acf' ) ) :

/**
 * Create array with image data like ACF plugin does.
 * see advanced-custom-fields-pro/fields/image.php
 * @param  int $attachment_id
 * @return array
 */
function wp_get_attachment_image_like_acf( $attachment_id ) {

    $attachment = get_post( $attachment_id );

    // validate
    if ( ! $attachment ) {
        return false;
    }

    // create array to hold value data
    $src = wp_get_attachment_image_src( $attachment->ID, 'full' );

    $image = array(
        'ID'            => $attachment->ID,
        'id'            => $attachment->ID,
        'alt'           => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
        'title'         => $attachment->post_title,
        'caption'       => $attachment->post_excerpt,
        'description'   => $attachment->post_content,
        'url'           => $src[0],
        'width'         => $src[1],
        'height'        => $src[2],
    );

    // find all image sizes
    $image_sizes = get_intermediate_image_sizes();

    if ( $image_sizes ) {

        $image['sizes'] = array();

        foreach ( $image_sizes as $image_size ) {

            // find src
            $src = wp_get_attachment_image_src( $attachment->ID, $image_size );

            // add src
            $image['sizes'][ $image_size ] = $src[0];
            $image['sizes'][ $image_size . '-width' ] = $src[1];
            $image['sizes'][ $image_size . '-height' ] = $src[2];

        }
        // foreach( $image_sizes as $image_size )

    }
    // if ( $image_sizes )

    return $image;
}

endif;

// --------------------------------------------------------------------

if ( ! function_exists( 'is_ajax') ) :

/**
 * Check if we're currently in AJAX request.
 * @return boolean
 */
function is_ajax() {
    return defined( 'DOING_AJAX' ) && DOING_AJAX;
}

endif;

// --------------------------------------------------------------------

if ( ! function_exists( 'wp_get_attachment_id_from_url' ) ) :

function wp_get_attachment_id_from_url( $attachment_url = '' ) {

    global $wpdb;
    $attachment_id = false;

    // If there is no url, return.
    if ( '' === $attachment_url ) {
        return;
    }

    // Get the upload directory paths
    $upload_dir_paths = wp_upload_dir();

    // Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
    if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {

        // If this is the URL of an auto-generated thumbnail, get the URL of the original image
        $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );

        // Remove the upload path base directory from the attachment URL
        $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

        // Finally, run a custom database query to get the attachment ID from the modified attachment URL
        $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );

    }

    return $attachment_id;
}

endif;

// --------------------------------------------------------------------

if ( ! function_exists( 'get_html_class' ) ) :

/**
 * Retrieve the classes for the html element as an array.
 *
 * @param string|array $class One or more classes to add to the class list.
 * @return array Array of classes.
 */
function get_html_class( $class = '' ) {

    $classes = array();

    if ( ! empty( $class ) ) {
        if ( !is_array( $class ) ) {
            $class = preg_split( '#\s+#', $class );
        }
        $classes = array_merge( $classes, $class );
    } else {
        // Ensure that we always coerce class to being an array.
        $class = array();
    }

    $classes = array_map( 'esc_attr', $classes );

    /**
     * Filter the list of CSS html classes for the current post or page.
     *
     * @param array  $classes An array of html classes.
     * @param string $class   A comma-separated list of additional classes added to the html.
     */
    $classes = apply_filters( 'html_class', $classes, $class );

    return array_unique( $classes );
}

endif;

if ( ! function_exists( 'html_class' ) ) :

/**
 * Display the classes for the html element.
 *
 * @param string|array $class One or more classes to add to the class list.
 */
function html_class( $class = '' ) {
    // Separates classes with a single space, collates classes for html element
    echo 'class="' . join( ' ', get_html_class( $class ) ) . '"';
}

endif;

// --------------------------------------------------------------------

if ( ! function_exists( 'get_boundary_post_for_type' ) ) :

/**
 * Retrieve boundary post for custom post types.
 *
 * Boundary being either the first or last post by publish date within the constraints specified
 * by $in_same_term or $excluded_terms.
 *
 * Should be added soon in WP Core. https://core.trac.wordpress.org/ticket/27094
 *
 * @param string       $type           Optional. Post type.
 * @param bool         $in_same_term   Optional. Whether returned post should be in a same taxonomy term.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs.
 * @param bool         $start          Optional. Whether to retrieve first or last post.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 * @return null|array Array containing the boundary post object if successful, null otherwise.
 */
function get_boundary_post_for_type( $type = null, $in_same_term = false, $excluded_terms = '', $start = true, $taxonomy = 'category' ) {
    $post = get_post();
    if ( ! $post || ! is_single() || is_attachment() || ! taxonomy_exists( $taxonomy ) ) {
        return null;
    }

    $query_args = array(
        'posts_per_page'            => 1,
        'order'                     => $start ? 'ASC' : 'DESC',
        'update_post_term_cache'    => false,
        'update_post_meta_cache'    => false
    );

    if ( ! $type ) {
        $type = get_post_type( $post );
    }

    if ( $type ) {
        $query_args['post_type'] = $type;
    }

    $term_array = array();

    if ( ! is_array( $excluded_terms ) ) {
        if ( ! empty( $excluded_terms ) ) {
            $excluded_terms = explode( ',', $excluded_terms );
        } else {
            $excluded_terms = array();
        }
    }

    if ( $in_same_term || ! empty( $excluded_terms ) ) {
        if ( $in_same_term ) {
            $term_array = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
        }

        if ( ! empty( $excluded_terms ) ) {
            $excluded_terms = array_map( 'intval', $excluded_terms );
            $excluded_terms = array_diff( $excluded_terms, $term_array );

            $inverse_terms = array();
            foreach ( $excluded_terms as $excluded_term ) {
                $inverse_terms[] = $excluded_term * -1;
            }
            $excluded_terms = $inverse_terms;
        }

        $query_args[ 'tax_query' ] = array( array(
            'taxonomy' => $taxonomy,
            'terms' => array_merge( $term_array, $excluded_terms )
        ) );
    }

    return get_posts( $query_args );
}

endif;

// --------------------------------------------------------------------

//Page Slug Body Class
function add_slug_body_class( $classes ) {
    global $post;

    if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
    }
add_filter( 'body_class', 'add_slug_body_class' );
