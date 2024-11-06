<?php

// Register styles

function adams_wp_starter_register_styles()
{

    $version = wp_get_theme()->get('Version');

    wp_enqueue_style('adams_wp_starter', get_template_directory_uri() . '/dist/scss/main.css', array(), $version);
}

add_action('wp_enqueue_scripts', 'adams_wp_starter_register_styles');


// Register scripts

function adams_wp_starter_register_scripts()
{

    $version = wp_get_theme()->get('Version');

    wp_enqueue_script('adams_wp_starter-main', get_template_directory_uri() . '/dist/js/main.js', array(), $version, true);
}

add_action('wp_enqueue_scripts', 'adams_wp_starter_register_scripts');

//------------------------ Theme Support -------------------------------//

function adams_wp_starter_theme_support()
{

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'adams_wp_starter_theme_support');

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