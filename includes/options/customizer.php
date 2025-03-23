<?php if (!defined('ABSPATH')) {
    die;
}

$prefix = '_mori';

CSF::createCustomizeOptions($prefix);

CSF::createSection($prefix, array(
    'id' => 'fields',
    'title' => 'Mori',
    'priority' => 1,
));

//
CSF::createSection($prefix, array(
    'parent' => 'fields',
    'title' => 'General',
    'fields' => array(

        array(
            'id' => 'bgcolor',
            'type' => 'background',
            'title' => 'Background color',
            'output' => 'body',
            'output_mode' => 'background-color',
        ),

    )
));

CSF::createSection($prefix, array(
    'parent' => 'fields',
    'title' => 'Typography',
    'fields' => array(
        array(
            'id' => 'mori_body_fonts',
            'type' => 'typography',
            'title' => 'Body Typography',
            'output' => 'body',

        ),
        array(
            'id' => 'mori_h1_fonts',
            'type' => 'typography',
            'title' => 'H1 Typography',
            'output' => 'h1',
        ),
        array(
            'id' => 'mori_h2_fonts',
            'type' => 'typography',
            'title' => 'H2 Typography',
            'output' => 'h2',
        ),
        array(
            'id' => 'mori_h3_fonts',
            'type' => 'typography',
            'title' => 'H3 Typography',
            'output' => 'h3',
        ),
        array(
            'id' => 'mori_h4_fonts',
            'type' => 'typography',
            'title' => 'H4 Typography',
            'output' => 'h4',
        ),
        array(
            'id' => 'mori_h5_fonts',
            'type' => 'typography',
            'title' => 'H5 Typography',
            'output' => 'h5',
        ),
        array(
            'id' => 'mori_h6_fonts',
            'type' => 'typography',
            'title' => 'H6 Typography',
            'output' => 'h6',
        ),
    )
));
//
CSF::createSection($prefix, array(
    'parent' => 'fields',
    'title' => 'Template Settings',
    'fields' => array(

        array(
            'id' => 'enb_pre',
            'type' => 'switcher',
            'title' => 'Preloader',
        ),
        array(
            'id' => 'enb_scroll',
            'type' => 'switcher',
            'title' => 'Scroll Top',
        ),
        array(
            'id' => 'prebg',
            'type' => 'background',
            'title' => 'Overlay background',
            'output' => array('#preloader'),
            'output_important' => true,
            'dependency' => array('enb_pre', '==', 'true'),
        ),

        array(
            'type' => 'backup',
        ),

    )
));

