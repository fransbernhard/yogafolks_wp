<?php

add_action('init', function() {
    $labels = [
        'name' => _x('Categories', 'plural', 'yogafolks'),
        'singular_name' => _x('Category', 'singular', 'yogafolks'),
        'menu_name' => _x('Categories', 'admin menu', 'yogafolks'),
        'all_items' => __('All Categories', 'yogafolks'),
        'edit_item' => __('Edit Category', 'yogafolks'),
        'view_item' => __('View Category', 'yogafolks'),
        'update_item' => __('Update Category', 'yogafolks'),
        'add_new_item' => __('Add new Category', 'yogafolks'),
        'new_item_name' => __('New Categories name', 'yogafolks'),
        'parent_item' > __('Parent Category', 'yogafolks'),
        'parent_item_colon' => __('Parent Category', 'yogafolks'),
        'search_items' => __('Search Categories', 'yogafolks'),
        'popular_items' => __('Popular Categories', 'yogafolks'),
        'separate_items_with_commas' => __('Seperate Categories with comma', 'yogafolks'),
        'add_or_remove_items' => __('Add or remove Categories', 'yogafolks'),
        'choose_from_most_used' => __('Choose from the most used Categories', 'yogafolks'),
        'not_found' => __('No Categories found', 'yogafolks'),
    ];

    $args = [
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'query_var' => true,
        'show_in_rest' => true,
    ];

    register_taxonomy('treatment_category', ['treatment'], $args);
}, 0);
