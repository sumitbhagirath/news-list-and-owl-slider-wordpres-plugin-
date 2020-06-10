<?php

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if (!function_exists('nwowls_news_init')) {
    // Initialization function
    add_action('init', 'nwowls_news_init');

    function nwowls_news_init() {
      // Create new News custom post type
        $news_labels = array(
            'name'                 => _x('News', 'nwowls-news'),
            'singular_name'        => _x('news', 'nwowls-news'),
            'add_new'              => _x('Add News', 'nwowls-news'),
            'add_new_item'         => __('Add New News', 'nwowls-news'),
            'edit_item'            => __('Edit News', 'nwowls-news'),
            'new_item'             => __('New News', 'nwowls-news'),
            'view_item'            => __('View News', 'nwowls-news'),
            'search_items'         => __('Search News','nwowls-news'),
            'not_found'            =>  __('No News found', 'nwowls-news'),
            'not_found_in_trash'   => __('No News found in Trash', 'nwowls-news'),
            'parent_item_colon'    => '',
            'menu_name'          => _x( 'News', 'admin menu', 'nwowls-news' )
        );
        $news_args = array(
            'labels'              => $news_labels,
            'public'              => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'show_ui'             => true,
            'show_in_menu'        => true, 
            'query_var'           => true,
            'rewrite'             => array( 
            							'slug'       => 'news',
            							'with_front' => false
        							),
            'capability_type'     => 'post',
            'has_archive'         => true,
            'hierarchical'        => false,
            'menu_position'       => 5,
        	'menu_icon'   		  => 'dashicons-feedback',
            'supports'            => array('title','editor','thumbnail','excerpt','comments', 'author'),
    		'show_in_rest'		  => true,
            'taxonomies'          => array('post_tag')
        );
        
    	register_post_type( NWOWLS_POST_TYPE, apply_filters( 'nwowls_news_registered_post_type_args', $news_args ) );
    }
}

/* Register Taxonomy */
if (!function_exists('nwowls_taxonomies')) {
    add_action( 'init', 'nwowls_taxonomies');
    function nwowls_taxonomies() {
        $labels = array(
            'name'              => _x( 'Category', 'nwowls-news' ),
            'singular_name'     => _x( 'Category', 'nwowls-news' ),
            'search_items'      => __( 'Search Category', 'nwowls-news' ),
            'all_items'         => __( 'All Category', 'nwowls-news' ),
            'parent_item'       => __( 'Parent Category', 'nwowls-news' ),
            'parent_item_colon' => __( 'Parent Category:', 'nwowls-news' ),
            'edit_item'         => __( 'Edit Category', 'nwowls-news' ),
            'update_item'       => __( 'Update Category', 'nwowls-news' ),
            'add_new_item'      => __( 'Add New Category', 'nwowls-news' ),
            'new_item_name'     => __( 'New Category Name', 'nwowls-news' ),
            'menu_name'         => __( 'Category', 'nwowls-news' )
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
    		'show_in_rest'		=> true,
            'rewrite'           => array( 'slug' => NWOWLS_CAT )
        );
        register_taxonomy( NWOWLS_CAT, array( NWOWLS_POST_TYPE ), $args );
    }
}

if (!function_exists('nwowls_rewrite_flush')) {
    function nwowls_rewrite_flush() {
    	nwowls_news_init();
        nwowls_taxonomies();
        flush_rewrite_rules();
    }
    register_activation_hook( __FILE__, 'nwowls_rewrite_flush' );
}