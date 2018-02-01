<?php

/**
 * Functions'prefix is stephanerenard_
 */


// includes necessary files
include get_template_directory() . '/functions/_includes.php';

// -----------------------------------------------------------------------------

function stephanerenard_setup() {

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1600 );

    // register 1 menu used in the theme
    register_nav_menus( array(
        'primary'   => 'Navigation principale (header)',
    ) );

    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, icons, and column width.
     */
    // add_editor_style( array( 'css/editor-style.css' ) );

    // Add custom image sizes
    // add_image_size( 'col-sm-2', 364 );
    // add_image_size( 'col-sm-3', 546 );
    // add_image_size( 'col-sm-6', 1092 );
}
add_action( 'after_setup_theme', 'stephanerenard_setup' );

// -----------------------------------------------------------------------------

/**
 * Add scripts and stylesheets in theme.
 */
function stephanerenard_add_custom_assets() {
    if ( ! is_admin() ) {

        // register STYLESHEETS ------------------------------------------------

        // 👁👁 Add webfonts
        $webfonts = array();
        foreach ( stephanerenard_webfonts() as $name => $url ) {
            wp_register_style( 'font-' . $name, $url, array(), null );
            $webfonts[] = 'font-' . $name;
        }

        // Global styles
        wp_register_style( 'stephanerenard-global', get_template_directory_uri() . '/dist/css/global.css', $webfonts, null );


        // register SCRIPTS ----------------------------------------------------

        // global $wp_scripts;

        // remove wp-embed script from WordPress
        wp_deregister_script( 'wp-embed' );
        // remove contact-form-7 script from CF7
        // wp_deregister_script( 'contact-form-7' );

        // remove native version of jQuery
        wp_deregister_script( 'jquery' );
        // use custom CDN version
        wp_register_script( 'jquery', '//code.jquery.com/jquery-2.2.3.min.js', false, null, true );

        // GSAP - https://greensock.com/tweenmax
        wp_register_script( 'gsap-tweenmax', '//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/TweenMax.min.js', false, null, true );
        // wp_register_script( 'gsap-scrollto', '//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/plugins/ScrollToPlugin.min.js', array( 'gsap-tweenmax' ), null, true );
        // ScrollMagic - http://scrollmagic.io/
        wp_register_script( 'scrollmagic', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js', false, null, true );
        wp_register_script( 'scrollmagic-gsap', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.min.js', false, null, true );
        // wp_register_script( 'scrollmagic-debug', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js', false, null, true );
        wp_register_script( 'google-maps', '//maps.googleapis.com/maps/api/js?key=AIzaSyB9HhuT1Ef6VRX5NtytPL8Hwqg2AVE-91Q&callback=map.init', false, null, true );

        // Global functions
        wp_register_script(
            'stephanerenard-functions',
            get_template_directory_uri() . '/dist/js/min/functions.min.js',
            array(
                'jquery',
                'gsap-tweenmax',
                'scrollmagic',
                'scrollmagic-gsap'
            ),
            null,
            true
        );

        // App
        wp_register_script( 'stephanerenard-app', get_template_directory_uri() . '/dist/js/min/app.min.js', array( 'stephanerenard-functions' ), null, true );

        wp_localize_script( 'stephanerenard-app', 'wp', array(
            'template_directory_uri'    => get_template_directory_uri(),
            'home_url'                  => home_url( '/' ),
            'base_url'                  => site_url(),
            'map_lat_01'                => get_option( 'map_lat_01' ),
            'map_lng_01'                => get_option( 'map_lng_01' ),
            'map_title_01'              => get_option( 'map_title_01' ),
            'map_lat_02'                => get_option( 'map_lat_02' ),
            'map_lng_02'                => get_option( 'map_lng_02' ),
            'map_title_02'              => get_option( 'map_title_02' ),
            'map_zoom'                  => get_option( 'map_zoom' )
        ) );

        // Homepage
        wp_register_script( 'stephanerenard-home', get_template_directory_uri() . '/dist/js/min/home.min.js', array( 'stephanerenard-functions' ), null, true );


        // then load -----------------------------------------------------------

        wp_enqueue_style( 'stephanerenard-global' );
        wp_enqueue_script( 'stephanerenard-functions' );

        // if ( is_front_page() ) {

            wp_enqueue_script( 'stephanerenard-home' );

        // }

        wp_enqueue_script( 'stephanerenard-app');
        wp_enqueue_script( 'google-maps' );
    }
}
add_action( 'wp_enqueue_scripts', 'stephanerenard_add_custom_assets', 11 );

// -----------------------------------------------------------------------------
/**
 * List webfonts used by the theme.
 * @return array
 */
function stephanerenard_webfonts() {
    return array(

        // OPEN SANS
        'open-sans'     => '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,800italic,800,700italic',

        // MONTSERRAT
        'montserrat'    => 'https://fonts.googleapis.com/css?family=Montserrat:400,700',
    );
}

// -----------------------------------------------------------------------------

/**
 * Change tite separator.
 * @param  string $sep Default title separator
 * @return string
 */
function stephanerenard_document_title_separator( $sep ) {
    return '&bull;';
}
add_filter( 'document_title_separator', 'stephanerenard_document_title_separator' );

// -----------------------------------------------------------------------------

/**
 * Handles JavaScript detection.
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function stephanerenard_javascript_detection() {
?>
    <script>
        document.documentElement.className = document.documentElement.className.replace('no-js', 'js');
        if (feature.touch && !navigator.userAgent.match(/Trident\/7\./)) {
            document.documentElement.className = document.documentElement.className.replace('no-touch', 'touch');
        }
        if (feature.canvas) {
            document.documentElement.className = document.documentElement.className.replace('no-canvas', 'canvas');
        }
    </script>
<?php
}
add_action( 'wp_head', 'stephanerenard_javascript_detection', 1 );

// -----------------------------------------------------------------------------

/**
 * Add all favicon metas in <head>.
 * Generated with http://realfavicongenerator.net/
 */
function stephanerenard_favicons() {
?>
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo site_url( '/' ) ?>apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo site_url( '/' ) ?>apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo site_url( '/' ) ?>apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo site_url( '/' ) ?>apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo site_url( '/' ) ?>apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo site_url( '/' ) ?>apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo site_url( '/' ) ?>apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo site_url( '/' ) ?>apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url( '/' ) ?>apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="<?php echo site_url( '/' ) ?>favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo site_url( '/' ) ?>favicon-194x194.png" sizes="194x194">
    <link rel="icon" type="image/png" href="<?php echo site_url( '/' ) ?>favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php echo site_url( '/' ) ?>android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php echo site_url( '/' ) ?>favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo site_url( '/' ) ?>manifest.json">
    <link rel="mask-icon" href="<?php echo site_url( '/' ) ?>safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#62b6ce">
    <meta name="msapplication-TileImage" content="<?php echo site_url( '/' ) ?>mstile-144x144.png">
    <meta name="theme-color" content="#62b6ce">
<?php
}
// add_action( 'wp_head', 'stephanerenard_favicons', 1 );

// -----------------------------------------------------------------------------

/**
 * Add/remove custom classes to/from body.
 * @param  array $classes
 * @param  array $class
 * @return array
 */
function stephanerenard_body_classes( $classes, $class ) {
    if ( is_front_page() ) {
        // remove "page" from classes on homepage
        if ( false !== ( $key = array_search( 'page', $classes ) ) ) {
            unset( $classes[ $key ] );
        }
    } else if ( is_post_type_archive( 'project' ) ) {
        $classes[] = 'page';
        $classes[] = 'page-case-studies';
    }

    return $classes;
}
add_filter( 'body_class', 'stephanerenard_body_classes', 10, 2 );

// -----------------------------------------------------------------------------

/**
 * Add Barba namespace to barba-container.
 * @param  string $namespace Explicit namespace
 * @return string
 */
function stephanerenard_barba_namespace( $namespace ) {
    // do not override given namespace
    if ( ! empty( $namespace ) ) {
        return $namespace;
    }

    if ( is_front_page() ) {
        $namespace = 'home';
    } else {
        $namespace = 'page';
    }

    return $namespace;
}
add_filter( 'barba_namespace', 'stephanerenard_barba_namespace' );

// -----------------------------------------------------------------------------

/**
 * Wrap embed result in a <div>.
 * @param  string $html
 * @param  string $url
 * @param  array $args
 * @return string
 */
function stephanerenard_embed_add_wrapper( $html, $url, $args ) {
    return '<div class="embed-container">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'stephanerenard_embed_add_wrapper', 10, 3 );

// -----------------------------------------------------------------------------

/**
 * Remove nav menu item id.
 */
add_filter( 'nav_menu_item_id', '__return_false' );

// -----------------------------------------------------------------------------

/**
 * Add custom classes to menu items.
 * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
 * @param object $item    The current menu item.
 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
 * @param int    $depth   Depth of menu item. Used for padding.
 * @return array
 */
function stephanerenard_nav_menu_css_class( $classes, $item, $args, $depth ) {
    $classes[] = 'site-nav__item';

    return $classes;
}
add_filter( 'nav_menu_css_class', 'stephanerenard_nav_menu_css_class', 10, 4 );

// -----------------------------------------------------------------------------

/**
 * Add class attributes menu items'link.
 * @param array $atts {
 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
 *
 *     @type string $title  Title attribute.
 *     @type string $target Target attribute.
 *     @type string $rel    The rel attribute.
 *     @type string $href   The href attribute.
 * }
 * @param object $item  The current menu item.
 * @param array  $args  An array of {@see wp_nav_menu()} arguments.
 * @param int    $depth Depth of menu item. Used for padding.
 */
function stephanerenard_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
    $atts['class'] = 'site-nav__item__link';

    $menu_items = array('Contact');
    if (in_array($item->title, $menu_items)) {
      $atts['class'] = 'site-nav__item__link js-anchor';
    }

    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'stephanerenard_nav_menu_link_attributes', 10, 4 );

// -----------------------------------------------------------------------------

/**
 * Get the title from a ACF field if exists.
 * @param  string $title
 * @param  int    $post_id
 * @return string
 */
function stephanerenard_the_title( $title, $post_id ) {
    global $post;

    // do not overwrite title in admin or if not current page (e.g. in menus) or not in the loop
    if ( is_admin() || $post->ID !== $post_id || ! in_the_loop() ) {
        return $title;
    }

    $main_title = get_field( 'main_title', $post_id );
    if ( ! empty( $main_title ) ) {
        return $main_title;
    }

    return $title;
}
add_filter( 'the_title', 'stephanerenard_the_title', 10, 2 );

// -----------------------------------------------------------------------------