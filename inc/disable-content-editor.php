<?php

// Disable the content editor for all post types
function dd_theme_disable_content_editor_all()
{
    foreach (get_post_types() as $post_type) {
        remove_post_type_support($post_type, 'editor');
    }
}
add_action('admin_init', 'dd_theme_disable_content_editor_all');
