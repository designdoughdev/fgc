<?php

// Register styles

function fgc_register_styles()
{

    $version = wp_get_theme()->get('Version');

    // Main stylesheet
    wp_enqueue_style('fgc', get_template_directory_uri() . '/dist/scss/main.css', array(), 1.001);
}

add_action('wp_enqueue_scripts', 'fgc_register_styles');



// Register scripts

function fgc_register_scripts()
{

    $version = wp_get_theme()->get('Version');

    wp_enqueue_script('fgc-main', get_template_directory_uri() . '/dist/js/main.js', array(), $version, true);
}

add_action('wp_enqueue_scripts', 'fgc_register_scripts');

//------------------------ Theme Support -------------------------------//

function fgc_theme_support()
{

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'fgc_theme_support');

// add_filter( 'query_vars', 'addnew_query_vars_blogs', 10, 1 );
/* include functions */


//------------------------ Includes -------------------------------//

// require get_parent_theme_file_path('/inc/admincss.php');
// require get_parent_theme_file_path('/inc/comments.php');
// require get_parent_theme_file_path('/inc/contactform.php');
require get_parent_theme_file_path('/inc/responsiveimages.php');
// require get_parent_theme_file_path('/inc/siteoptions.php');
require get_parent_theme_file_path('/inc/customposttypes.php');
// require get_parent_theme_file_path('/inc/disableadminbar.php');
require get_parent_theme_file_path('/inc/posttonews.php');
// require get_parent_theme_file_path('/inc/excerpt-length.php');
require get_parent_theme_file_path('/inc/disable-comments.php');
require get_parent_theme_file_path('/inc/disable-gutenburg.php');
require get_parent_theme_file_path('/inc/disable-content-editor.php');
require get_parent_theme_file_path('/inc/disable-tags.php');
require get_parent_theme_file_path('/inc/disable-categories.php');
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';





// ACF field syncing

// Only run if ACF is active
if (function_exists('acf')) {

    // Define the ACF JSON directory
    define('MY_ACF_JSON_DIR', get_stylesheet_directory() . '/acf-json');

    // Create the ACF JSON directory if it doesn't exist
    function my_acf_create_json_dir()
    {
        if (!file_exists(MY_ACF_JSON_DIR)) {
            mkdir(MY_ACF_JSON_DIR, 0755, true);
        }
    }
    add_action('after_setup_theme', 'my_acf_create_json_dir');

    // Save ACF JSON files to a specific folder in your theme
    function my_acf_json_save_point($path)
    {
        return MY_ACF_JSON_DIR;
    }
    add_filter('acf/settings/save_json', 'my_acf_json_save_point');

    // Load ACF JSON files from a specific folder in your theme
    function my_acf_json_load_point($paths)
    {
        array_unshift($paths, MY_ACF_JSON_DIR);
        return $paths;
    }
    add_filter('acf/settings/load_json', 'my_acf_json_load_point');
}


//------------------------ DD theme -------------------------------//









// function addnew_query_vars($vars) {
// 	$vars[] = 'designdough-portfolio'; // c is the name of variable you want to add
// 	//	$vars[] = 'c'; // c is the name of variable you want to add
// 	return $vars;
// }
// add_filter( 'query_vars', 'addnew_query_vars', 10, 1 );


// function addnew_query_vars_blogs($vars) {
// 	$vars[] = 'designdough-blogs'; // c is the name of variable you want to add
// 	//	$vars[] = 'c'; // c is the name of variable you want to add
// 	return $vars;
// }




// format the clock
$timezone = new DateTimeZone('Europe/London');



// add svg support
function add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

//------------------------ Plugin Management -------------------------------//

add_action('tgmpa_register', 'dd_theme_register_required_plugins');

function dd_theme_register_required_plugins()
{
    $plugins = array(
        // ACF Pro - Packaged with the theme as a ZIP file
        array(
            'name'      => 'Advanced Custom Fields Pro',
            'slug'      => 'advanced-custom-fields-pro',
            'source'    => get_template_directory() . '/plugins/advanced-custom-fields-pro.zip', // Path to bundled ZIP
            'required'  => true,  // This plugin is required
        ),
        // Duplicator Pro - Packaged with the theme as a ZIP file
        array(
            'name'      => 'Duplicator Pro',
            'slug'      => 'duplicator-pro',
            'source'    => get_template_directory() . '/plugins/duplicator-pro.zip',
            'required'  => false,
        ),

        // Contact Form 7 - Available in the WordPress repository
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,  // Optional plugin
        ),
    );

    $config = array(
        'id'           => 'dd_theme',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => true,
    );

    tgmpa($plugins, $config);
}

// Automatically activate required plugins after theme switch
function dd_theme_activate_required_plugins()
{
    // Define the paths for each required plugin's main file
    $required_plugins = array(
        'advanced-custom-fields-pro/acf.php',   // ACF Pro
        'duplicator-pro/duplicator-pro.php',    // Duplicator Pro
        'contact-form-7/wp-contact-form-7.php', // Contact Form 7
    );

    // Loop through each plugin and activate it if it's not active
    foreach ($required_plugins as $plugin_path) {
        if (file_exists(WP_PLUGIN_DIR . '/' . $plugin_path) && !is_plugin_active($plugin_path)) {
            activate_plugin($plugin_path);
        }
    }
}
add_action('after_switch_theme', 'dd_theme_activate_required_plugins');

//------------------------ Custom theme functions -------------------------------//


// Function to display breadcrumb navigation 
function display_breadcrumbs($root_parent_as_link = true)
{
    global $post;

    $home_icon_url = get_template_directory_uri() . '/assets/images/svg/home.svg';

    $breadcrumb = '<img class="home-icon" src="' . $home_icon_url . '" alt="Home Icon">';
    $breadcrumb .= '<a href="' . home_url() . '">Home</a>';

    // Initialize an array to hold the ancestor pages
    $ancestors = array();

    // Get all parent pages up the hierarchy if the current page has parents
    if ($post->post_parent) {
        $ancestors = get_post_ancestors($post->ID);
        $ancestors = array_reverse($ancestors); // Reverse to start from the top ancestor
    }

    // Loop through each ancestor page and add it as a clickable link
    $is_first_ancestor = true;
    foreach ($ancestors as $ancestor) {
        $ancestor_title = get_the_title($ancestor);

        // Check if this is the root parent and if links should be disabled
        if ($is_first_ancestor && !$root_parent_as_link) {
            $breadcrumb .= ' &gt; <p class="root-ancestor">' . $ancestor_title . '</p>'; // Display as plain text
        } else {
            $breadcrumb .= ' &gt; <a href="' . get_permalink($ancestor) . '">' . $ancestor_title . '</a>';
        }

        $is_first_ancestor = false; // After the first ancestor, this is no longer true
    }

    // Add the current page as a clickable link with 'current' class
    $breadcrumb .= ' &gt; <a href="' . get_permalink($post->ID) . '" class="current">' . get_the_title($post->ID) . '</a>';

    // Display the breadcrumb trail
    echo $breadcrumb;
}


function filter_posts()
{
    $category = $_POST['category'] ?? '';
    $type = $_POST['type'] ?? '';
    $topic = $_POST['topic'] ?? '';
    $location = $_POST['location'] ?? '';
    $year = $_POST['year'] ?? '';
    $sort = $_POST['sort'] ?? 'newest';  // Default to 'newest'

    $args = [
        'post_type' => 'post',
        'posts_per_page' => -1,
        'tax_query' => [
            'relation' => 'AND',
        ],
    ];

    // Add taxonomy filters if provided
    if ($category) {
        $args['tax_query'][] = [
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $category,
        ];
    }

    if ($type) {
        $args['tax_query'][] = [
            'taxonomy' => 'type',
            'field' => 'slug',
            'terms' => $type,
        ];
    }

    if ($topic) {
        $args['tax_query'][] = [
            'taxonomy' => 'topic',
            'field' => 'slug',
            'terms' => $topic,
        ];
    }

    if ($location) {
        $args['tax_query'][] = [
            'taxonomy' => 'location',
            'field' => 'slug',
            'terms' => $location,
        ];
    }

    // Add year filter if provided
    if ($year) {
        $args['date_query'] = [
            [
                'year' => $year,
            ],
        ];
    }

    // Add sorting logic based on 'newest' or 'oldest'
    if ($sort === 'oldest') {
        $args['orderby'] = 'date';
        $args['order'] = 'ASC';  // Oldest posts first
    } else {
        $args['orderby'] = 'date';
        $args['order'] = 'DESC'; // Newest posts first
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('components/includes/post_card');
        }
        wp_reset_postdata();
    } else {
        echo '<p class="no-posts-msg">Sorry, no results</p>';
    }

    die();
}

add_action('wp_ajax_filter_posts', 'filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');

// custom search query changes

add_action('pre_get_posts', function ($query) {
    if ($query->is_main_query() && $query->is_search()) {
        // Check if a post type is specified
        $post_type = get_query_var('post_type', null);

        // If post_type is provided, modify the query to include it
        if ($post_type) {
            $query->set('post_type', $post_type);
        } else {
            // Optional: Include multiple post types if none is specified
            $query->set('post_type', array('post', 'page')); // Adjust as needed
        }

        // Additional query modifications (optional)
        $query->set('posts_per_page', 10); // Example: Limit results
    }
});