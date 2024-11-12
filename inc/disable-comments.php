<?php

//---------------- Disable All Comments in WordPress ----------------//

// Remove comment support from all post types
function dd_theme_disable_comments_support()
{
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'dd_theme_disable_comments_support');

// Disable comments on the front-end
add_filter('comments_open', '__return_false', 20);
add_filter('pings_open', '__return_false', 20);

// Hide existing comments from displaying
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments from the admin menu and redirect comments page access
function dd_theme_disable_comments_admin_menu()
{
    remove_menu_page('edit-comments.php'); // Remove comments link from admin menu

    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url()); // Redirect any direct access to comments page
        exit;
    }
}
add_action('admin_menu', 'dd_theme_disable_comments_admin_menu');
add_action('admin_init', 'dd_theme_disable_comments_admin_menu'); // Redirect comments page access

// Remove comments widget from the dashboard
function dd_theme_disable_comments_dashboard_widgets()
{
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'dd_theme_disable_comments_dashboard_widgets');

// Remove comments link from the admin bar
function dd_theme_disable_comments_admin_bar()
{
    remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
}
add_action('init', 'dd_theme_disable_comments_admin_bar');
