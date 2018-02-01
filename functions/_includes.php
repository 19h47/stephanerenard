<?php

// reset some WordPress behaviours
include __DIR__ . '/reset.php';

// utility functions
include __DIR__ . '/utilities.php';

// admin functions
if ( is_admin() ) include __DIR__ . '/admin.php';
// theme customizer
include __DIR__ . '/customizer.php';
// custom template tags for this theme
include __DIR__ . '/template-tags.php';
// override TinyMCE in backend
// include __DIR__ . '/tinymce-styles.php';
// custom taxonomies
// include __DIR__ . '/taxonomies/_includes.php';
// custom posts types
// include __DIR__ . '/post-types/_includes.php';
// custom roles
include __DIR__ . '/roles/_includes.php';
// custom shortcodes
// include __DIR__ . '/shortcodes/_includes.php';
// custom Walkers
include __DIR__ . '/walkers/_includes.php';

// TinyMCE
include __DIR__ . '/tinymce.php';

if ( class_exists( 'acf' ) ) :

// settings related to Advanced Custom Fields plugin
include __DIR__ . '/acf.php';

endif;

if ( class_exists( 'WPCF7' ) ) :

// settings related to Contact Form 7 plugin
include __DIR__ . '/contact-form-7/_includes.php';

endif;
