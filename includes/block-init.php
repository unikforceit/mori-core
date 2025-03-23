<?php
function mori_register_block_category($categories) {
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'mori-blocks',
                'title' => __('Mori Blocks', 'mori'),
                'icon'  => 'star-filled'
            ),
        )
    );
}
add_filter('block_categories_all', 'mori_register_block_category');


function mori_global_enqueue_assets() {
    wp_enqueue_style('mori-block-css', MORI_PLUGIN_URL . 'assets/css/block.css', array(), mori_dynamic_version());
    wp_enqueue_style('mori-core-swiper', MORI_PLUGIN_URL . 'assets/css/swiper-bundle.min.css', array(), mori_dynamic_version(), 'all' );
    wp_enqueue_script('mori-core-swiper', MORI_PLUGIN_URL . 'assets/js/swiper-bundle.min.js', array(), mori_dynamic_version(), true);
}

if (class_exists('acf')){
    $block_directories = glob(MORI_PLUGIN_DIR . 'includes/blocks/*', GLOB_ONLYDIR);
    if (!empty($block_directories) && is_array($block_directories)) {
        foreach ($block_directories as $dir) {
            // Construct the full path to the `index.php` file for each block
            $block_file = $dir . '/index.php';
            // Check if the `index.php` file exists before including it
            if (file_exists($block_file)) {
                require_once $block_file;
            }
        }
    }
}