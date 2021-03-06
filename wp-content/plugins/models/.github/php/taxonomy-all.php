<?php
return [
    'active' => true,
    'type' => 'tax',
    'name' => 'genre',
    'links' => [
        'post', 'book',
    ],
    'labels' => [
        'has_one' => 'Genre',
        'has_many' => 'Genres',
        'text_domain' => 'sage',
        'overrides' => [
            'name' => 'Genres',
            'singular_name' => 'Genre',
            'search_items' => 'Search Genres',
            'popular_items' => 'Popular Tags',
            'all_items' => 'All Tags',
            'parent_item' => 'Parent Category',
            'parent_item_colon' => 'Parent Category:',
            'edit_item' => 'Edit Tag',
            'view_item' => 'View Tag',
            'update_item' => 'Update Tag',
            'add_new_item' => 'Update New Tag',
            'new_item_name' => 'New Tag Name',
            'separate_items_with_commas' => 'Separate tags with commass',
            'add_or_remove_items' => 'Add or remove tags',
            'choose_from_most_used' => 'Choose from the most used tags',
            'not_found' => 'No tags found.',
            'no_terms' => 'No tags',
            'items_list_navigation' => 'Tags list navigation',
            'items_list' => 'Tags list',
        ],
    ],
    'config' => [
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'rest_base' => 'genre',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        'show_tagcloud' => true,
        'show_in_quick_edit' => true,
        'show_admin_column' => false,
        'capabilities' => [
            'manage_terms' => 'manage_categories',
            'edit_terms' => 'manage_categories',
            'delete_terms' => 'manage_categories',
            'assign_terms' => 'edit_posts',
        ],
        'rewrite' => [
            'slug' => 'genre',
            'hierarchical' => false,
        ],
    ],
];