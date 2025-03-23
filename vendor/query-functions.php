<?php
/**
 * Display category based on theme options
 */

if (!function_exists('mori_single_category')) :

    function mori_single_category($default = true)
    {

        if ('post' == get_post_type()) {
            $categories = get_the_category();
            if ($default == true) {
                $separator = ' ';
            } else {
                $separator = ' ,';
            }

            $output = '';
            if ($categories) {
                foreach ($categories as $category) {

                    $output .= '<a class="d-inline-block" href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;

                }
                $cat = trim($output, $separator);
                return $cat;
            }
        }

    }
endif;

function mori_post_category_id($taxonomy)
{
    global $post;
    $terms = get_the_terms($post->ID, $taxonomy);
    foreach ($terms as $term) {
        return $term->term_id;
    }
}

function mori_drop_cat($tax)
{
    $args =  [
        'taxonomy'=> $tax
    ];
    $categories_obj = get_categories($args);
    $categories = array();

    foreach ($categories_obj as $pn_cat) {
        $categories[$pn_cat->slug] = $pn_cat->cat_name;
    }

    return $categories;
}

function mori_single_category($default = true)
{
    if ('post' == get_post_type()) {
        $categories = get_the_category();
        $separator = ',';
        $output = '';
        if ($categories) {
            foreach ($categories as $category) {
                $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
            }
            $cat = trim($output, $separator);
            return $cat;
        }
    }
}

function mori_get_category_link($taxonomy)
{

    global $post;
    $output = '';
    $ids = $taxonomy;
    $terms = wp_get_post_terms($post->ID, $ids);
    $separator = ', ';
    if ($terms) {
        foreach ($terms as $term) {
            $term_link = get_term_link($term);
            $output .= '<a href="' . esc_url($term_link) . '">' . $term->name . '</a>' . $separator;
        }
    }
    return trim($output, $separator);
}

function mori_drop_posts($post_type)
{
    $args = array(
        'numberposts' => -1,
        'post_type' => $post_type
    );

    $posts = get_posts($args);
    $list = array();
    foreach ($posts as $cpost) {
        //  print_r($cform);
        $list[$cpost->ID] = $cpost->post_title;
    }
    return $list;
}
