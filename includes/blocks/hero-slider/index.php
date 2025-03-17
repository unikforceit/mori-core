<?php
add_action('acf/init', 'mori_register_hero_slider_block');
function mori_register_hero_slider_block() {

    // Ensure ACF exists
    if( function_exists('acf_register_block_type') ) {

        // Register Slider Block
        acf_register_block_type(array(
            'name'              => 'mori-hero-slider',
            'title'             => __('Mori Hero Slider', 'mori'),
            'description'       => __('A customizable slider block with style controls.', 'mori'),
            'render_callback'   => 'mori_render_hero_slider_block',
            'category'          => 'mori-blocks',
            'icon'              => 'images-alt2',
            'keywords'          => array( 'slider', 'carousel', 'banner', 'hero' ),
            'enqueue_assets'    => 'mori_global_enqueue_assets',
        ));
    }
}

include dirname(__FILE__) . '/view.php';