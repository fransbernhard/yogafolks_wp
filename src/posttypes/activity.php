<?php

function register_activity() {

    $single = _x('Activity', 'Post type single string');
    $plural = _x('Activities', 'Post type plural string');
    $labels = post_type_labels($single, $plural);

    $args = [
        'label' => __('Activity'),
        'description' => __('Activities'),
        'labels' => $labels,
        'supports' => ['title', 'editor', 'thumbnail', 'revisions'],
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => false,
        'show_in_rest' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'menu_icon' => 'dashicons-admin-site-alt',
    ];

    register_post_type('activity', $args);
}

add_action('init', 'register_activity', 0);