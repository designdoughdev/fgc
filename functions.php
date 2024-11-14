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
// require get_parent_theme_file_path('/inc/responsiveimages.php');
// require get_parent_theme_file_path('/inc/siteoptions.php');
// require get_parent_theme_file_path('/inc/customposttypes.php');
// require get_parent_theme_file_path('/inc/disableadminbar.php');
// require get_parent_theme_file_path('/inc/posttonews.php');
// require get_parent_theme_file_path('/inc/excerpt-length.php');
require get_parent_theme_file_path('/inc/disable-comments.php');
require get_parent_theme_file_path('/inc/disable-gutenburg.php');
require get_parent_theme_file_path('/inc/disable-content-editor.php');
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




// if( function_exists('acf_add_options_page') ) {
//     acf_add_options_page();
// }

// /* Actions and Filters */
// add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );
// add_filter( 'body_class', function( $classes ) {
// 	return array_merge( $classes, array( 'class-name' ) );
// } );




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

<?php
//------------------------ Plugin Management -------------------------------//

add_action('tgmpa_register', 'dd_theme_register_required_plugins');

function dd_theme_register_required_plugins() {
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
            'required'  => false,  // Optional plugin
        ),
        // Contact Form 7 - Available in the WordPress repository
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,  // Optional plugin
        ),
        // AltText.ai - Recommended plugin from the WordPress repository
        array(
            'name'      => 'AltText.ai',
            'slug'      => 'alttext-ai',
            'required'  => false,  // Optional plugin
        ),
        // WP Mail SMTP - Recommended plugin from the WordPress repository
        array(
            'name'      => 'WP Mail SMTP',
            'slug'      => 'wp-mail-smtp',
            'required'  => false,  // Optional plugin
        ),
        // CookieYes | GDPR Cookie Consent - Recommended plugin from the WordPress repository
        array(
            'name'      => 'CookieYes | GDPR Cookie Consent',
            'slug'      => 'cookie-law-info',
            'required'  => false,  // Optional plugin
        ),
        // Flamingo - Recommended plugin from the WordPress repository
        array(
            'name'      => 'Flamingo',
            'slug'      => 'flamingo',
            'required'  => false,  // Optional plugin
        ),
    );

    $config = array(
        'id'           => 'dd_theme',                 // Unique ID for hashing notices for multiple instances of TGMPA
        'default_path' => '',                         // Default absolute path to bundled plugins
        'menu'         => 'tgmpa-install-plugins',    // Menu slug
        'parent_slug'  => 'themes.php',               // Parent menu slug
        'capability'   => 'edit_theme_options',       // Capability needed to view plugin install page
        'has_notices'  => true,                       // Show admin notices or not
        'dismissable'  => true,                       // Dismissable by user
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


// Function to display breadcrumb navigation with 'current' class on the current page
function display_breadcrumbs()
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
    foreach ($ancestors as $ancestor) {
        $breadcrumb .= ' &gt; <a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a>';
    }

    // Add the current page as a clickable link with 'current' class
    $breadcrumb .= ' &gt; <a href="' . get_permalink($post->ID) . '" class="current">' . get_the_title($post->ID) . '</a>';

    // Display the breadcrumb trail
    echo $breadcrumb;
}