<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function get_builder_image($url='',$class=''){
    if ($url){
        return '<a class="'.$class.'" href="'.esc_url( home_url( '/' )).'"><img src="'. esc_url( $url).'" alt="'.get_bloginfo( 'name' ).'"></a>';
    }

}


    function velanto_options($opt)
    {
        $options = get_option('_velanto');
        if (isset($options[$opt])) {
            return $options[$opt];
        }
    }

    function velanto_meta($opt)
    {
        $options = get_post_meta(get_the_ID(), '_velanto_meta', true);
        if (isset($options[$opt])) {
            return $options[$opt];
        }
    }

    function velanto_service_meta($opt)
    {
        $options = get_post_meta(get_the_ID(), '_servicemeta', true);
        if (isset($options[$opt])) {
            return $options[$opt];
        }
    }

    function velanto_feature_meta($opt)
    {
        $options = get_post_meta(get_the_ID(), '_featuremeta', true);
        if (isset($options[$opt])) {
            return $options[$opt];
        }
    }

function velanto_drop_taxolist(){

    $args = array(
      'public'   => true,
      '_builtin' => false
      
    ); 
    $output = 'names'; // or objects
    $operator = 'or'; // 'and' or 'or'

    $taxonomies = get_taxonomies( $args, $output, $operator ); 
    return $taxonomies;

}

function velanto_check_odd_even($data){
    if($data % 2 == 0){
        $data = "Even";
    }
    else{
        $data = "Odd";
    }

    return $data;
}

function client_ratings($count){
    $out = '';
    for ($i=0; $i<$count['size']; $i++) {
        $out.= '<li><i class="fas fa-star"></i></li>';
    }
    return $out;
}

function velanto_get_that_link($link){

    $url = $link['url'] ? 'href='.esc_url($link['url']). '' : '';
    $ext = $link['is_external'] ? 'target= _blank' : '';
    $nofollow = $link['nofollow'] ? 'rel="nofollow"' : '';
    $link = $url.' '.$ext.' '.$nofollow;
    return $link;
}
function velanto_list_control($settings, $icon, $tag="li"){
    if(!empty($settings)){
        $content_decode = json_decode($settings, true);
        foreach ($content_decode as $value) {
            echo "<$tag>". $icon . " " .$value['content_list']. "</$tag>";
        }
    }
}
function velanto_get_that_image($source, $class = 'image'){
    if ($source['url']){
        $image = '<img class="'.$class.'" src="'. esc_url( $source['url'] ).'" alt="'.get_bloginfo( 'name' ).'">';
    }
    return $image;
}

function king_buildermeta_to_string($items) {
    if (!is_array($items) || empty($items)){
        return;
    }
     foreach( $items as $item ){
        $metaf[] =$item['meta'];
      }
      return implode(',' , $metaf);
}

function king_menu_select_choices() {
    $menus = wp_get_nav_menus();
    $items = array();
    $i     = 0;
    foreach ( $menus as $menu ) {
        if ( $i == 0 ) {
            $default = $menu->slug;
            $i ++;
        }
        $items[ $menu->slug ] = $menu->name;
    }

    return $items;
}


function velanto_image_size_choose() {
  $image_sizes = get_intermediate_image_sizes(); 

    $addsizes = array(
        "full" => 'Full size'
    );
    $newsizes = array_merge($image_sizes, $addsizes);

  return array_combine($newsizes, $newsizes);
}

function velantoelement_template_select() {

        global $post;
        $args = array('numberposts' => -1,'post_type' => 'elementor_library',);
        $posts = get_posts($args);  

        foreach ($posts as $pn_cat) {
            $categories[$pn_cat->ID] = get_the_title($pn_cat->ID);
        }
        return $categories;   

}

function velanto_page_title($arg){

        if ( is_category() ) {
            /* translators: Category archive title. 1: Category name */
            $title = single_cat_title( $arg['cat'], false);
        } elseif ( is_tag() ) {
            /* translators: Tag archive title. 1: Tag name */
            $title = single_cat_title( $arg['tag'],false);
        } elseif ( is_author() ) {
            $title = sprintf( $arg['author'].'%s', '<span>' . get_the_author() . '</span>' );
            //$title = get_the_author( 'Author: ', true );
        } elseif ( is_year() ) {
            /* translators: Yearly archive title. 1: Year */
            $title = sprintf( $arg['yarchive'], '<span>' .get_the_date('F Y', 'yearly archives date format' ). '</span>' );
        } elseif ( is_month() ) {
            /* translators: Monthly archive title. 1: Month name and year */
            $title =  sprintf( $arg['marchive'], '<span>' .get_the_date('F Y', 'monthly archives date format' ). '</span>' );
        } elseif ( is_404() ) {
            /* translators: Daily archive title. 1: Date */
            $title = $arg['notfound'];
        }elseif ( is_post_type_archive() ) {
            /* translators: Post type archive title. 1: Post type name */
            $title = post_type_archive_title( '', false );
        } elseif ( is_tax() ) {
            $tax = get_taxonomy( get_queried_object()->taxonomy );
            /* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term */
            $title = single_term_title( '', false ) ;
        } elseif (is_search()){
            $title = sprintf( $arg['search'].'%s','<span>' . get_search_query() . '</span>' );
        }elseif( is_home() && is_front_page() ){
          $title = esc_html__( 'Frontpage', 'velanto' );
        } elseif( is_singular() ){
          $title = get_the_title();
        }else {
            $title = esc_html__( 'Archives','velanto' );
        }

        return $title;

}
