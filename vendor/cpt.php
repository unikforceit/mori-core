<?php
class mori_custom_post_type {

    function __construct() {
        add_action('init', array(&$this, 'mori_builder_post_type'));
        add_action('init', array(&$this, 'create_builder_post_taxonomy'));

        // Add new column
        add_filter('manage_mori_builders_posts_columns', array(&$this, 'add_shortcode_column'));

        // Display the shortcode in the new column
        add_action('manage_mori_builders_posts_custom_column', array(&$this, 'show_shortcode_column'), 10, 2);

        add_shortcode('mori_builder', [$this, 'mori_builder_shortcode']);
    }

    // Register Mori Builder Post Type
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
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'elementor'),
            'show_in_rest' => true, // This enables the Gutenberg editor
            'has_archive' => false,
            'rewrite' => array('slug' => 'mori_builder'),
        );

        register_post_type('mori_builders', $args);
    }

    // Create Builder Post Taxonomy
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

    function mori_builder_shortcode($atts) {
        // Assuming you want to display the custom post based on ID
        $atts = shortcode_atts( array(
            'id' => 0,
        ), $atts );

        // Get the post object
        $post = get_post($atts['id']);
        if ($post) {
            // Do something with the post (e.g., display title, content, etc.)
            return $post->post_content;
        }

        return 'Post not found';
    }

    // Add Shortcode column to the admin post list
    function add_shortcode_column($columns) {
        $columns['shortcode'] = __('Shortcode', 'mori');
        return $columns;
    }

    // Show shortcode for each post in the column
    function show_shortcode_column($column, $post_id) {
        if ('shortcode' === $column) {
            // Generate the shortcode, for example: [mori_builder id="1"]
            $shortcode = '[mori_builder id="' . $post_id . '"]';

            // Show the rendered shortcode output
            echo '<input type="text" value="' . esc_attr($shortcode) . '" readonly onclick="this.select(); this.setSelectionRange(0, this.value.length)" class="shortcode-input" />';
        }
    }
}

new mori_custom_post_type();