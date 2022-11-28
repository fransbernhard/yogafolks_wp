<?php

function register_training() {

    $single = _x('Training', 'Post type single string');
    $plural = _x('Trainings', 'Post type plural string');
    $labels = post_type_labels($single, $plural);

    $args = [
        'label' => __('Training'),
        'description' => __('Trainings'),
        'labels' => $labels,
        'supports' => ['title', 'editor', 'thumbnail', 'revisions'],
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'menu_icon' => 'dashicons-welcome-learn-more',
    ];

    register_post_type('training', $args);
}

add_action('init', 'register_training', 0);