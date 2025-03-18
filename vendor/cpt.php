<?php

	class mori_custom_post_type {
		
		function __construct() {
			
			add_action('init', array(&$this,'mori_builder_post_type'));
			add_action('init', array(&$this,'create_builder_post_taxonomy'));

        }
	  // Builder Post Type
		function mori_builder_post_type() {
        $labels = array(
            'name' => __('Mori Builder', 'mori'),
            'singular_name' => __('Mori Builder', 'mori'),
            'add_new' => __('Add mori builder', 'mori'),
            'add_new_item' => __('Add mori builder', 'mori'),
            'edit_item' => __('Edit mori builder', 'mori'),
            'new_item' => __('New mori builder', 'mori'),
            'all_items' => __('All mori builder', 'mori'),
            'view_item' => __('View mori builder', 'mori'),
            'search_items' => __('Search mori builder', 'mori'),
            'not_found' => __('No mori builder found', 'mori'),
            'not_found_in_trash' => __('No portfolio found in the trash', 'mori'),
            'parent_item_colon' => '',
            'menu_name' => __('Mori Theme Builder', 'mori')
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'menu_position' => 4,
            'menu_icon' => 'dashicons-admin-multisite',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt','elementor'),
            'has_archive' => false,
        );
            register_post_type('mori_builders', $args);
        }

        function create_builder_post_taxonomy() {
            $labels = array(
                'name' => __('Category', 'mori'),
                'singular_name' => __('Category', 'mori'),
                'search_items' => __('Search categories', 'mori'),
                'all_items' => __('Categories', 'mori'),
                'parent_item' => __('Parent category', 'mori'),
                'parent_item_colon' => __('Parent category:', 'mori'),
                'edit_item' => __('Edit category', 'mori'),
                'update_item' => __('Update category', 'mori'),
                'add_new_item' => __('Add category', 'mori'),
                'new_item_name' => __('New category', 'mori'),
                'menu_name' => __('Category', 'mori'),
            );
            $args = array(
                'labels' => $labels,
                'hierarchical' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'rewrite' => array('slug' => 'mori_builder_cat'),
            );
            register_taxonomy('mori_builder_cat', 'mori_builders', $args);
        }

	}  

    new mori_custom_post_type();

