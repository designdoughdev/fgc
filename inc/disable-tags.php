<?php
// disable tag support from all post types
function disable_tags_from_post_types()
{
    $post_types = get_post_types(); // Get all registered post types

    foreach ($post_types as $post_type) {
        unregister_taxonomy_for_object_type('post_tag', $post_type); // disable the 'post_tag' taxonomy
    }
}
add_action('init', 'disable_tags_from_post_types');