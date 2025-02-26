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
            'name' => 'News',
            'singular_name' => 'press_releases',
            'menu_icon' => 'megaphone',
			'singular_label' => 'News', // custom key
        ),
        array(
            'name' => 'Resources',
            'singular_name' => 'resources_posts',
            'menu_icon' => 'book',
			'singular_label' => 'Resource', // custom key
        ),
        array(
            'name' => 'Public Bodies',
            'singular_name' => 'Public Body',
            'menu_icon' => 'portfolio',
			'singular_label' => 'Public Body', // custom key
			'menu_icon' => 'money',
        ),
		array(
            'name' => 'Public Service Boards',
            'singular_name' => 'Public Service Board',
            'menu_icon' => 'portfolio',
			'singular_label' => 'PSB', // custom key
			'menu_icon' => 'clipboard',
        ),
        array(
            'name' => 'Public Information',
            'singular_name' => 'public_info',
            'menu_icon' => 'text-page',
			'singular_label' => 'Public Info', // custom key
			'menu_icon' => 'bank',
        ),
        array(
            'name' => 'Case Studies',
            'singular_name' => 'Case Study',
            'menu_icon' => 'search',
			'singular_label' => 'Case Study', // custom key
			'menu_icon' => 'clipboard',
        ),

    );


    foreach ($post_types as $post_type) {
        $labels = array(
            'name'               => _x($post_type['name'], 'post type general name', 'designdough'),
            'singular_name'      => _x($post_type['singular_name'], 'post type singular name', 'designdough'),
            'menu_name'          => _x($post_type['name'], 'admin menu', 'designdough'),
            'name_admin_bar'     => _x($post_type['singular_name'], 'add new on admin bar', 'designdough'),
            'add_new'            => _x('Add New', sanitize_title($post_type['singular_label']), 'designdough'),
            'add_new_item'       => __('Add New ' . $post_type['singular_label'], 'designdough'),
            'new_item'           => __('New ' . $post_type['singular_label'], 'designdough'),
            'edit_item'          => __('Edit ' . $post_type['singular_label'], 'designdough'),
            'view_item'          => __('View ' . $post_type['singular_label'], 'designdough'),
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
                'supports' => array(
                    'title',
                    //'editor',
                    'custom-fields',
                    'thumbnail',
                    'category',
                    // 'tags',
                    //'excerpt'
                ),
                'taxonomies' => array('post_tag', 'category'),
                'has_archive' => false,
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

// news cat for importing posts from old site

function create_news_cat_taxonomy()
{
    $labels = array(
        'name'              => _x('News Categories', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('News Category', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search News Categories', 'textdomain'),
        'all_items'         => __('All News Categories', 'textdomain'),
        'parent_item'       => __('Parent News Category', 'textdomain'),
        'parent_item_colon' => __('Parent News Category:', 'textdomain'),
        'edit_item'         => __('Edit News Category', 'textdomain'),
        'update_item'       => __('Update News Category', 'textdomain'),
        'add_new_item'      => __('Add New News Category', 'textdomain'),
        'new_item_name'     => __('New News Category Name', 'textdomain'),
        'menu_name'         => __('News Categories', 'textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'rewrite' => array('slug' => 'location'),
        'hierarchical' => true,
        'show_admin_column' => true,
    );

    register_taxonomy('news_cat', array('press_releases'), $args);
}
add_action('init', 'create_news_cat_taxonomy');

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
        'name'              => _x('Types', 'taxonomy general name', 'textdomain'),
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
        'name'              => _x('Postcodes', 'taxonomy general name', 'textdomain'),
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
        'rewrite' => array('slug' => 'postcode'),
        'hierarchical' => true,
        'show_admin_column' => true,
    );

    register_taxonomy('postcode', array('public-body'), $args);
}
add_action('init', 'create_postcode_taxonomy');

function create_public_information_taxonomy()
{
    $labels = array(
        'name'              => _x('Public Information Categories', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('public information category', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Public Information Categories', 'textdomain'),
        'all_items'         => __('All Public Information Categories', 'textdomain'),
        'parent_item'       => __('Parent Public Information Category', 'textdomain'),
        'parent_item_colon' => __('Parent Public Information Category:', 'textdomain'),
        'edit_item'         => __('Edit Public Information Category', 'textdomain'),
        'update_item'       => __('Update Public Information Category', 'textdomain'),
        'add_new_item'      => __('Add New Public Information Category', 'textdomain'),
        'new_item_name'     => __('New Public Information Category', 'textdomain'),
        'menu_name'         => __('Public Information Categories', 'textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'rewrite' => array('slug' => 'public-information'),
        'hierarchical' => true,
        'show_admin_column' => true,
    );

    register_taxonomy('public-information-category', array('public-information'), $args);
}
add_action('init', 'create_public_information_taxonomy');