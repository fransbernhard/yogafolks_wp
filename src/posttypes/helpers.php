<?php

function post_type_labels($single, $plural = null) {
    $plural = is_null($plural) ? $single : $plural;
    return array(
        'name'                  => $plural,
        'singular_name'         => $single,
        'menu_name'             => $plural,
        'name_admin_bar'        => $single,
        'all_items'             => sprintf(__('All %s'), $plural),
        'add_new'               => __('Add new'),
        'add_new_item'          => sprintf(__('Add new %s'), $single),
        'edit_item'             => sprintf(__('Edit %s'), $single),
        'new_item'              => sprintf(__('New %s'), $single),
        'view_item'             => sprintf(__('View %s'), $single),
        'search_items'          => sprintf(__('Search %s'), $single),
        'not_found'             => sprintf(__('No %s found'), $plural),
        'not_found_in_trash'    => sprintf(__('No %s found in Trash'), $plural),
        'parent_item_colon'     => sprintf(__('Parent %s'), $single)
    );
}
