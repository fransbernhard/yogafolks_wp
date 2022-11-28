<?php

function register_treatment() {

    $single = _x('Treatment', 'Post type single string');
    $plural = _x('Treatments', 'Post type plural string');
    $labels = post_type_labels($single, $plural);

    $args = [
        'label' => __('Treatment'),
        'description' => __('Treatments'),
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
        'menu_icon' => 'dashicons-universal-access-alt',
    ];

    register_post_type('treatment', $args);
}

add_action('init', 'register_treatment', 0);
