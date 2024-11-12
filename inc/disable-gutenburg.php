<?php

// Disable Gutenberg editor for all post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);


// Disable Gutenberg editor for specific post types
function dd_theme_disable_gutenberg($use_block_editor, $post_type)
{
    // List post types for which Gutenberg should be disabled
    $disabled_post_types = array('post', 'page'); // Add other post types if needed

    if (in_array($post_type, $disabled_post_types)) {
        return false;
    }

    return $use_block_editor;
}
add_filter('use_block_editor_for_post_type', 'dd_theme_disable_gutenberg', 10, 2);


// Remove Gutenberg-specific styles
function dd_theme_remove_gutenberg_styles()
{
    wp_dequeue_style('wp-block-library');       // WordPress core block library CSS
    wp_dequeue_style('wp-block-library-theme'); // WordPress core block library theme CSS
    wp_dequeue_style('wc-block-style');         // WooCommerce block CSS (if WooCommerce is installed)
}
add_action('wp_enqueue_scripts', 'dd_theme_remove_gutenberg_styles', 100);
