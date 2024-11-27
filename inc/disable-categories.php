<?php
// Disable the default 'categories' taxonomy for certain post types
function disable_categories_for_post_types()
{
    // List the post types where you want to remove 'categories'
    $post_types_to_exclude = array('page', 'public-body'); // Replace with your post types

    foreach ($post_types_to_exclude as $post_type) {
        unregister_taxonomy_for_object_type('category', $post_type); // Unregister 'categories'
    }
}
add_action('init', 'disable_categories_for_post_types');