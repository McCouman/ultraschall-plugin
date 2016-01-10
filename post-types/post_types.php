<?php
/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 04.01.16
 * Time: 22:03
 */


//------------------------------- post_type: ultraschall_options_page

if ( function_exists( 'acf_add_options_page' ) )
{
    $page = acf_add_options_page( array(
            'page_title' => 'Ultraschall Einstellungen',
            'menu_title' => 'Ultraschall',
            'menu_slug'  => 'ultraschall-theme-general-settings',
            'capability' => 'edit_posts',
            'redirect'   => false
        )
    );
}

//------------------------------- post_type: ultraschall_versions

add_action( 'init', 'post_type_ultraschall_versions', 0 );
function post_type_ultraschall_versions() {

    //globale vars
    global $user_level; //nur für leveling!
    global $menu;

    //registriere Post Type
    register_post_type( 'ultraschall_versions', array(
            'label'       => __( 'Version' ),
            'labels'      => array(
                'name'          => __( 'Versionen' ),
                'singular_name' => __( 'Version' ),
                'add_new'       => __( 'Version Eintragen' ),
                'add_new_item'  => __( 'Erstelle eine neue Version von Ultraschall' ),
                'edit'          => __( 'Bearbeiten' ),
                'edit_item'     => __( 'Version Bearbeiten' ),
                'new_item'      => __( 'Version' ),
                'view'          => __( 'Version Ansehen' ),
                'view_item'     => __( 'Version Ansehen' ),
                'search_items'  => __( 'Suche nach Version' ),
                'not_found'     => __( 'Kein Versionen gefunden' ),
                'parent'        => __( 'Parent Versions' ),
            ),
            'description' => __( 'Neue Version anlegen?!' ),
            'menu_icon'   => 'dashicons-shield',
            #'menu_icon'   => 'dashicons-list-view',

            'public'              => true,
            'show_ui'             => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => true,
            'show_admin_column'   => true,
            'menu_position'       => 4,
            'query_var'           => true,

            //Admin ok
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'show_in_menu'        => true,
            'show_admin_column'   => true,

            'rewrite'    => array( 'slug' => 'versions' ),

            //export ok!
            'can_export' => true,

            //page widgets:
            /*
            * Find mor infos to support widgets: :) M.C.
            *
            * - title: Text input field to create a post title.
            * - editor: Content input box for writing.
            * - comments: Ability to turn comments on/off.
            * - trackbacks: Ability to turn trackbacks and pingbacks on/off.
            * - revisions: Allows revisions to be made of your post.
            * - author: Displays a select box for changing the post author.
            * - excerpt: A textarea for writing a custom excerpt.
            * - thumbnail: The thumbnail (featured image in 3.0) uploading box.
            * - custom-fields: Custom fields input area.
            * - page-attributes:  The attributes box shown for pages.
            *                           this is important for hierarchical post types,
            *                           so you can select the parent post.
            */
            'supports'   => array( 'title', 'author' )
        )
    );
    /*
        $labels = array(
            'name'              => __( 'Kategorien' ),
            'singular_name'     => __( 'Kategorie' ),
            'search_items'      => __( 'Kategorien durchsuchen' ),
            'all_items'         => __( 'Alle Kategorien' ),
            'parent_item'       => __( 'Hauptkategorie' ),
            'parent_item_colon' => __( 'Hauptkategorie:' ),
            'edit_item'         => __( 'Kategorie bearbeiten' ),
            'update_item'       => __( 'Kategorie aktualisieren' ),
            'add_new_item'      => __( 'Neue Kategorie hinzufügen' ),
            'new_item_name'     => __( 'Neue Kategorie Name' ),
            'menu_name'         => __( 'Kategorien' ),
        );

        // Name der Taxonomie - array('product') verbindet diese Taxonomie mit dem Post-Type product

        register_taxonomy('podcasts_category',array('podcasts'), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column'     => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'cat-podcasts' ),
        ));
        */

}

//------------------------------- post_type: ultraschall_clogs

add_action( 'init', 'post_type_ultraschall_changelogs', 0 );
function post_type_ultraschall_changelogs() {

    //globale vars
    global $user_level; //nur für leveling!
    global $menu;

    //registriere Post Type
    register_post_type( 'ultraschall_clogs', array(
            'label'       => __( 'Changelogs' ),
            'labels'      => array(
                'name'          => __( 'Changelogs' ),
                'singular_name' => __( 'Changelog' ),
                'add_new'       => __( 'Changelog Eintragen' ),
                'add_new_item'  => __( 'Erstelle neues Changelog für Ultraschall' ),
                'edit'          => __( 'Bearbeiten' ),
                'edit_item'     => __( 'Changelog Bearbeiten' ),
                'new_item'      => __( 'Changelog' ),
                'view'          => __( 'Changelog Ansehen' ),
                'view_item'     => __( 'Changelog Ansehen' ),
                'search_items'  => __( 'Suche nach Changelogs' ),
                'not_found'     => __( 'Kein Changelog gefunden' ),
                'parent'        => __( 'Parent Changelogs' ),
            ),
            'description' => __( 'Neues Changelog anlegen?!' ),
            'menu_icon'   => 'dashicons-clipboard',

            'public'              => true,
            'show_ui'             => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => true,
            'show_admin_column'   => true,
            'menu_position'       => 4,
            'query_var'           => true,

            //Admin ok
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'show_in_menu'        => true,
            'show_admin_column'   => true,

            'rewrite'    => array( 'slug' => 'changelogs' ),

            //export ok!
            'can_export' => true,

            //page widgets:
            /*
            * Find mor infos to support widgets: :) M.C.
            *
            * - title: Text input field to create a post title.
            * - editor: Content input box for writing.
            * - comments: Ability to turn comments on/off.
            * - trackbacks: Ability to turn trackbacks and pingbacks on/off.
            * - revisions: Allows revisions to be made of your post.
            * - author: Displays a select box for changing the post author.
            * - excerpt: A textarea for writing a custom excerpt.
            * - thumbnail: The thumbnail (featured image in 3.0) uploading box.
            * - custom-fields: Custom fields input area.
            * - page-attributes:  The attributes box shown for pages.
            *                           this is important for hierarchical post types,
            *                           so you can select the parent post.
            */
            'supports'   => array( 'title', 'author', 'custom-fields' )
        )
    );

}

//------------------------------- post_type: ultraschall_features

add_action( 'init', 'post_type_ultraschall_features', 0 );
function post_type_ultraschall_features() {

    //globale vars
    global $user_level; //nur für leveling!
    global $menu;

    //registriere Post Type
    register_post_type( 'ultraschall_features', array(
            'label'       => __( 'Merkmale' ),
            'labels'      => array(
                'name'          => 'Features',
                'singular_name' => 'Feature',
                'add_new'       => 'Features Eintragen',
                'add_new_item'  => 'Erstelle neues Feature unter Ultraschall',
                'edit'          => 'Bearbeiten',
                'edit_item'     => 'Merkmal Feature',
                'new_item'      => 'Neues Feature',
                'view'          => 'Feature Ansehen',
                'view_item'     => 'Feature Ansehen',
                'search_items'  => 'Suche nach Features',
                'not_found'     => 'Kein Feature gefunden',
                'parent'        => 'Parent Feature',
            ),
            'description' => 'Neues Feature anlegen?!',
            'menu_icon'   => 'dashicons-chart-line',

            'public'              => true,
            'show_ui'             => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => true,
            'show_admin_column'   => true,
            'menu_position'       => 4,
            'query_var'           => true,

            //Admin ok
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'show_in_menu'        => true,
            'show_admin_column'   => true,

            'rewrite'    => array( 'slug' => 'features' ),

            //export ok!
            'can_export' => true,

            //page widgets:
            /*
            * Find mor infos to support widgets: :) M.C.
            *
            * - title: Text input field to create a post title.
            * - editor: Content input box for writing.
            * - comments: Ability to turn comments on/off.
            * - trackbacks: Ability to turn trackbacks and pingbacks on/off.
            * - revisions: Allows revisions to be made of your post.
            * - author: Displays a select box for changing the post author.
            * - excerpt: A textarea for writing a custom excerpt.
            * - thumbnail: The thumbnail (featured image in 3.0) uploading box.
            * - custom-fields: Custom fields input area.
            * - page-attributes:  The attributes box shown for pages.
            *                           this is important for hierarchical post types,
            *                           so you can select the parent post.
            */
            'supports'   => array( 'title', 'author', 'custom-fields' )
        )
    );

}

//------------------------------- post_type: ultraschall_features

add_action( 'init', 'post_type_ultraschall_team', 0 );
function post_type_ultraschall_team() {

    //globale vars
    global $user_level; //nur für leveling!
    global $menu;

    //registriere Post Type
    register_post_type( 'ultraschall_team', array(
            'label'       => __( 'Team' ),
            'labels'      => array(
                'name'          => __( 'Team' ),
                'singular_name' => __( 'Team' ),
                'add_new'       => __( 'Person Eintragen' ),
                'add_new_item'  => __( 'Erstelle Personendaten' ),
                'edit'          => __( 'Bearbeiten' ),
                'edit_item'     => __( 'Person Bearbeiten' ),
                'new_item'      => __( 'Person' ),
                'view'          => __( 'Person Ansehen' ),
                'view_item'     => __( 'Person Ansehen' ),
                'search_items'  => __( 'Suche nach Person' ),
                'not_found'     => __( 'Kein Person gefunden' ),
                'parent'        => __( 'Parent Person' ),
            ),
            'description' => __( 'Neues Person anlegen?!' ),
            'menu_icon'   => 'dashicons-groups',

            'public'              => true,
            'show_ui'             => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => true,
            'show_admin_column'   => true,
            'menu_position'       => 4,
            'query_var'           => true,

            //Admin ok
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'show_in_menu'        => true,
            'show_admin_column'   => true,

            'rewrite'    => array( 'slug' => 'team' ),

            //export ok!
            'can_export' => true,

            //page widgets:
            /*
            * Find mor infos to support widgets: :) M.C.
            *
            * - title: Text input field to create a post title.
            * - editor: Content input box for writing.
            * - comments: Ability to turn comments on/off.
            * - trackbacks: Ability to turn trackbacks and pingbacks on/off.
            * - revisions: Allows revisions to be made of your post.
            * - author: Displays a select box for changing the post author.
            * - excerpt: A textarea for writing a custom excerpt.
            * - thumbnail: The thumbnail (featured image in 3.0) uploading box.
            * - custom-fields: Custom fields input area.
            * - page-attributes:  The attributes box shown for pages.
            *                           this is important for hierarchical post types,
            *                           so you can select the parent post.
            */
            'supports'   => array( 'title', 'author', 'custom-fields' )
        )
    );

}








/*
//aus der Wordpress UI, die Kategorien entfernen
function my_remove_meta_boxes() {
    remove_meta_box('special_podcasts_categorydiv', 'podcasts', 'side');
    remove_meta_box('podcasts_categorydiv', 'podcasts', 'side');
    //remove_meta_box('_infoboxing', 'podcasts', 'normal');
}
*/