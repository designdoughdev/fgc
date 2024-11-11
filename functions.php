<?php

// Register styles

function fgc_register_styles()
{

    $version = wp_get_theme()->get('Version');

    // Main stylesheet
    wp_enqueue_style('fgc', get_template_directory_uri() . '/dist/scss/main.css', array(), $version);

    // // AOS stylesheet
    // wp_enqueue_style('aos', get_template_directory_uri() . '/node_modules/aos/dist/aos.css', array(), '3.0.0'); // Adjust version if needed
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

//------------------------ Custom Functions -------------------------------//

// Save ACF JSON files to a specific folder in your theme
function my_acf_json_save_point($path)
{
    // Update path to 'acf-json' folder in your theme
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}
add_filter('acf/settings/save_json', 'my_acf_json_save_point');

// Load ACF JSON files from a specific folder in your theme
function my_acf_json_load_point($paths)
{
    // Clear the default load path
    unset($paths[0]);

    // Update path to 'acf-json' folder in your theme
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
