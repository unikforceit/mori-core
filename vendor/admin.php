<?php
function mori_welcome_page(){
    require_once 'welcome.php';
}
function mori_demo_importer_function(){
    admin_url( 'admin.php?page=ae-demo-importer' );
}
add_action( 'admin_menu', 'mori_admin_meu' );
function mori_admin_meu() {
    // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page( 'Mori', 'Mori', 'administrator', 'mori-admin-menu', 'mori_welcome_page', 'dashicons-smiley', 2 );
    add_submenu_page('mori-admin-menu', 'Theme Options', 'Theme Options', 'manage_options', 'customize.php' );
    add_submenu_page( 'mori-admin-menu', esc_html__( 'Demo Importer', 'mori' ), esc_html__( 'Demo Importer', 'mori' ), 'administrator', 'ae-demo-importer',  'mori_demo_importer_function');
}