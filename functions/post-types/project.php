<?php

// Register Custom Post Type
function stephanerenard_project_post_type() {

    $labels = array(
        'name'                => _x( 'Projets', 'Projet Nom pluriel', 'stephanerenard' ),
        'singular_name'       => _x( 'Projet', 'Projet Nom singulier', 'stephanerenard' ),
        'menu_name'           => __( 'Projets', 'stephanerenard' ),
        'menu_admin_bar'      => __( 'Projet', 'stephanerenard' ),
        'parent_item_colon'   => __( '', 'stephanerenard' ),
        'all_items'           => __( 'Tous les projets', 'stephanerenard' ),
        'add_new'             => __( 'Ajouter', 'stephanerenard' ),
        'add_new_item'        => __( 'Ajouter un nouveau projet', 'stephanerenard' ),
        'edit_item'           => __( 'Modifier le projet', 'stephanerenard' ),
        'new_item'            => __( 'Nouveau projet', 'stephanerenard' ),
        'view_item'           => __( 'Voir le projet', 'stephanerenard' ),
        'search_items'        => __( 'Chercher parmi les projets', 'stephanerenard' ),
        'not_found'           => __( 'Aucun projet trouvé.', 'stephanerenard' ),
        'not_found_in_trash'  => __( 'Aucun projet trouvé dans la corbeille.', 'stephanerenard' ),
        // 'update_item'         => __( 'Mettre à jour', 'stephanerenard' ),
    );
    $rewrite = array(
        'slug'                => 'etudes-de-cas',
        'with_front'          => true,
        'pages'               => false,
        'feeds'               => true,
    );
    $args = array(
        'label'               => 'project',
        'description'         => __( 'Les projets', 'stephanerenard' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'excerpt', 'author', 'revisions', 'thumbnail', ),
        'taxonomies'          => array(),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_nav_menus'   => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-portfolio',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => $rewrite,
        'capability_type'     => 'project',
        'map_meta_cap'        => true,
    );
    register_post_type( 'project', $args );

}

// Hook into the 'init' action
add_action( 'init', 'stephanerenard_project_post_type', 0 );

// -----------------------------------------------------------------------------

function stephanerenard_bulk_post_updated_messages_filter( $bulk_messages, $bulk_counts ) {

    $bulk_messages['project'] = array(
        'updated'   => _n( '%s projet mis à jour.', '%s projets mis à jour.', $bulk_counts['updated'] ),
        'locked'    => _n( '%s projet n\'a pas été mis à jour, quelqu\'un est en train de le modifier.', '%s projets n\'ont pas été mis à jour, quelqu\'un est en train de les modifier.', $bulk_counts['locked'] ),
        'deleted'   => _n( '%s projet supprimé définitivement.', '%s projets supprimés définitivement.', $bulk_counts['deleted'] ),
        'trashed'   => _n( '%s projet déplacé dans la Corbeille.', '%s projets déplacés dans la Corbeille.', $bulk_counts['trashed'] ),
        'untrashed' => _n( '%s projet récupéré depuis la Corbeille.', '%s projets récupérés depuis la Corbeille.', $bulk_counts['untrashed'] ),
    );

    return $bulk_messages;

}
add_filter( 'bulk_post_updated_messages', 'stephanerenard_bulk_post_updated_messages_filter', 10, 2 );

// -----------------------------------------------------------------------------

/**
 * "At a glance" items (dashboard widget): add the projects.
 */
function stephanerenard_at_a_glance_projects( $items ) {
    $post_type = 'project';
    $post_status = 'publish';

    $object = get_post_type_object( $post_type );
    
    $num_posts = wp_count_posts( $post_type );
    // if ( ! $num_posts )
    if ( ! $num_posts || ! isset ( $num_posts->{$post_status} ) || 0 === (int) $num_posts->{$post_status} )
        return $items;

    $text = sprintf(
        _n( '%1$s %4$s%2$s', '%1$s %4$s%3$s', $num_posts->{$post_status} ), 
        number_format_i18n( $num_posts->{$post_status} ), 
        strtolower( $object->labels->singular_name ), 
        strtolower( $object->labels->name ),
        'pending' === $post_status ? 'Pending ' : ''
    );
    if ( current_user_can( $object->cap->edit_posts ) )
        $items[] = sprintf( '<a class="%1$s-count" href="edit.php?post_status=%2$s&post_type=%1$s">%3$s</a>', $post_type, $post_status, $text );
    else
        $items[] = sprintf( '<span class="%1$s-count">%s</span>', $text );
    
    return $items;
}
add_filter( 'dashboard_glance_items', 'stephanerenard_at_a_glance_projects' );

// -----------------------------------------------------------------------------

/**
 * Display or return the plural name of the custom post type Location.
 * @param  boolean $display
 * @return
 */
function stephanerenard_the_project_plural_name( $display = true ) {
    $post_type = get_post_type_object( 'project' );
    if ( ! $post_type )
        return;

    if ( ! $display )
        return $post_type->labels->name;

    echo $post_type->labels->name;
}

// -----------------------------------------------------------------------------

function stephanerenard_nopaging_for_projects( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }

    if ( 'project' === $query->get( 'post_type' ) ) {
        $query->set( 'posts_per_archive_page', -1 );
    }
}
add_action( 'pre_get_posts', 'stephanerenard_nopaging_for_projects' );

// -----------------------------------------------------------------------------

/**
 * Custom post type archive title for "project".
 *
 * @param string $post_type_name Post type 'name' label.
 * @param string $post_type      Post type.
 */
function stephanerenard_project_archive_title( $post_type_name, $post_type ) {
    if ( 'project' !== $post_type ) {
        return $post_type_name;
    }

    return 'Nos études de cas';
}
add_filter( 'post_type_archive_title', 'stephanerenard_project_archive_title', 10, 2 );

// -----------------------------------------------------------------------------
