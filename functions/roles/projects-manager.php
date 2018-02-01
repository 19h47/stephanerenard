<?php

function magacom_projects_manager_role() {

    global $wp_roles;

    // list new capabilities for custom post type "project"
    // and custom taxonomy "project_category"
    $capabilities = array(
        // standard
        'read'                       => 1,
        // custom post type
        'edit_project'               => 1,
        'read_project'               => 1,
        'delete_project'             => 1,
        'edit_projects'              => 1,
        'edit_others_projects'       => 1,
        'publish_projects'           => 1,
        'read_private_projects'      => 1,
        'delete_projects'            => 1,
        'delete_private_projects'    => 1,
        'delete_published_projects'  => 1,
        'delete_others_projects'     => 1,
        'edit_private_projects'      => 1,
        'edit_published_projects'    => 1,
        // custom taxonomy
        // 'manage_project_categories'  => 1,
    );

    // add custom role and capabilities for project custom post type
    // $wp_roles->remove_role( 'projects_manager' );
    $wp_roles->add_role( 'projects_manager', 'Gestionnaire de projets', $capabilities );

    // list other built-in roles who must have new capabilities
    $other_roles = array( 'administrator', 'editor' );

    // add new capabilities to all other roles
    foreach ( $wp_roles->role_objects as $role_name => $role ) {
        if ( ! in_array( $role_name, $other_roles ) )
            continue;

        foreach ( array_keys( $capabilities ) as $capability )
            $role->add_cap( $capability );
    }
}
add_action( 'admin_init', 'magacom_projects_manager_role' );

// -----------------------------------------------------------------------------
