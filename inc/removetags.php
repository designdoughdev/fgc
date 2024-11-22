<?php
// Remove tag support from all post types
function remove_tags_from_post_types()
{
    $post_types = get_post_types(); // Get all registered post types

    foreach ($post_types as $post_type) {
        unregister_taxonomy_for_object_type('post_tag', $post_type); // Remove the 'post_tag' taxonomy
    }
}
add_action('init', 'remove_tags_from_post_types');