<?php

/**
 * Custom post types
 *
 * @package WordPress
 * @subpackage designdough
 * @since 1.0
 */

function designdough_custom_post_types()
{
    $post_types = array(
        array(
            'name' => 'Press Releases',
            'singular_name' => 'Press Release',
            'menu_icon' => 'megaphone',
        ),
        array(
            'name' => 'Resources',
            'singular_name' => 'Resource',
            'menu_icon' => 'book',
        ),
        array(
            'name' => 'Public Bodies',
            'singular_name' => 'Public Body',
            'menu_icon' => 'portfolio',
        ),

    );


    foreach ($post_types as $post_type) {
        $labels = array(
            'name'               => _x($post_type['name'], 'post type general name', 'designdough'),
            'singular_name'      => _x($post_type['singular_name'], 'post type singular name', 'designdough'),
            'menu_name'          => _x($post_type['name'], 'admin menu', 'designdough'),
            'name_admin_bar'     => _x($post_type['singular_name'], 'add new on admin bar', 'designdough'),
            'add_new'            => _x('Add New', sanitize_title($post_type['singular_name']), 'designdough'),
            'add_new_item'       => __('Add New ' . $post_type['singular_name'], 'designdough'),
            'new_item'           => __('New ' . $post_type['singular_name'], 'designdough'),
            'edit_item'          => __('Edit ' . $post_type['singular_name'], 'designdough'),
            'view_item'          => __('View ' . $post_type['singular_name'], 'designdough'),
            'all_items'          => __('All ' . $post_type['name'], 'designdough'),
            'search_items'       => __('Search ' . $post_type['name'], 'designdough'),
            'parent_item_colon'  => __('Parent ' . $post_type['name'] . ':', 'designdough'),
            'not_found'          => __('No ' . $post_type['name'] . ' found.', 'designdough'),
            'not_found_in_trash' => __('No ' . $post_type['name'] . ' found in Trash.', 'designdough')
        );

        register_post_type(
            sanitize_title($post_type['singular_name']),
            array(
                'labels' => $labels,
                'public' => true,
                'supports' => array('title',  'editor', 'custom-fields', 'thumbnail', 'category', 'tags', 'excerpt'),
                'taxonomies' => array('post_tag', 'category'),
                'has_archive' => true,
                'menu_icon' => 'dashicons-' . $post_type['menu_icon'],
                'rewrite' => array('slug' => sanitize_title($post_type['name'])),
                'slug'                       => 'type',
                'with_front'                 => true,
                'hierarchical'               => true,
            )

        );
    }
}

add_action('init', 'designdough_custom_post_types');


// creating custom taxonomies
function create_location_taxonomy()
{
    $labels = array(
        'name'              => _x('Locations', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Location', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Locations', 'textdomain'),
        'all_items'         => __('All Locations', 'textdomain'),
        'parent_item'       => __('Parent Location', 'textdomain'),
        'parent_item_colon' => __('Parent Location:', 'textdomain'),
        'edit_item'         => __('Edit Location', 'textdomain'),
        'update_item'       => __('Update Location', 'textdomain'),
        'add_new_item'      => __('Add New Location', 'textdomain'),
        'new_item_name'     => __('New Location Name', 'textdomain'),
        'menu_name'         => __('Locations', 'textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'rewrite' => array('slug' => 'location'),
        'hierarchical' => true,
        'show_admin_column' => true,
    );

    register_taxonomy('location', array('resource', 'press-release', 'post'), $args);
}
add_action('init', 'create_location_taxonomy');

function create_topic_taxonomy()
{
    $labels = array(
        'name'              => _x('Topics', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Topic', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Topics', 'textdomain'),
        'all_items'         => __('All Topics', 'textdomain'),
        'parent_item'       => __('Parent Topic', 'textdomain'),
        'parent_item_colon' => __('Parent Topic:', 'textdomain'),
        'edit_item'         => __('Edit Topic', 'textdomain'),
        'update_item'       => __('Update Topic', 'textdomain'),
        'add_new_item'      => __('Add New Topic', 'textdomain'),
        'new_item_name'     => __('New Topic Name', 'textdomain'),
        'menu_name'         => __('Topics', 'textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'rewrite' => array('slug' => 'topic'),
        'hierarchical' => true,
        'show_admin_column' => true,
    );

    register_taxonomy('topic', array('resource', 'press-release', 'post'), $args);
}
add_action('init', 'create_Topic_taxonomy');


function create_type_taxonomy()
{
    $labels = array(
        'name'              => _x('types', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('type', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search types', 'textdomain'),
        'all_items'         => __('All Types', 'textdomain'),
        'parent_item'       => __('Parent Type', 'textdomain'),
        'parent_item_colon' => __('Parent Type:', 'textdomain'),
        'edit_item'         => __('Edit Type', 'textdomain'),
        'update_item'       => __('Update Type', 'textdomain'),
        'add_new_item'      => __('Add New Type', 'textdomain'),
        'new_item_name'     => __('New Type Name', 'textdomain'),
        'menu_name'         => __('Types', 'textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'rewrite' => array('slug' => 'type'),
        'hierarchical' => true,
        'show_admin_column' => true,
    );

    register_taxonomy('type', array('resource', 'press-release', 'post', 'public-body'), $args);
}
add_action('init', 'create_type_taxonomy');


function create_postcode_taxonomy()
{
    $labels = array(
        'name'              => _x('postcodes', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('postcode', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Postcodes', 'textdomain'),
        'all_items'         => __('All Postcodes', 'textdomain'),
        'parent_item'       => __('Parent Postcode', 'textdomain'),
        'parent_item_colon' => __('Parent Postcode:', 'textdomain'),
        'edit_item'         => __('Edit Postcode', 'textdomain'),
        'update_item'       => __('Update Postcode', 'textdomain'),
        'add_new_item'      => __('Add New Postcode', 'textdomain'),
        'new_item_name'     => __('New Postcode Name', 'textdomain'),
        'menu_name'         => __('Postcodes', 'textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'rewrite' => array('slug' => 'Postcode'),
        'hierarchical' => true,
        'show_admin_column' => true,
    );

    register_taxonomy('postcode', array('public-body'), $args);
}
add_action('init', 'create_postcode_taxonomy');