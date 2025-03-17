<?php
if (!defined('ABSPATH')) {
    die;
} // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = 'mori_customizer_options';

//
// Create customize options
//
CSF::createCustomizeOptions($prefix);


//
// Create a section
//
CSF::createSection( $prefix, array(
    'title'    => 'Mori - Options',
    'priority' => 1,
    'fields'   => array(

        //
        // A text field
        //
        array(
            'id'    => 'opt-overview-text',
            'type'  => 'text',
            'title' => 'Text',
        ),

        array(
            'id'    => 'opt-overview-textarea',
            'type'  => 'textarea',
            'title' => 'Textarea',
            'help'  => 'The help text of the field.',
        ),

        array(
            'id'    => 'opt-upload',
            'type'  => 'upload',
            'title' => 'Upload',
        ),

        array(
            'id'    => 'opt-overview-switcher',
            'type'  => 'switcher',
            'title' => 'Switcher',
            'label' => 'The label text of the switcher.',
        ),

        array(
            'id'      => 'opt-overview-color',
            'type'    => 'color',
            'title'   => 'Color',
            'default' => '#3498db',
        ),

        array(
            'id'    => 'opt-overview-checkbox',
            'type'  => 'checkbox',
            'title' => 'Checkbox',
            'label' => 'The label text of the checkbox.',
        ),

        array(
            'id'      => 'opt-overview-radio',
            'type'    => 'radio',
            'title'   => 'Radio',
            'options' => array(
                'yes'   => 'Yes, Please.',
                'no'    => 'No, Thank you.',
            ),
            'default' => 'yes',
        ),

        array(
            'id'          => 'opt-overview-select',
            'type'        => 'select',
            'title'       => 'Select',
            'placeholder' => 'Select an option',
            'options'     => array(
                'opt-1'     => 'Option 1',
                'opt-2'     => 'Option 2',
                'opt-3'     => 'Option 3',
            ),
        ),

    )
) );

//
// Create a section
//
CSF::createSection( $prefix, array(
    'title'    => 'Mori - Reset & Backup',
    'priority' => 3,
    'fields'   => array(

        array(
            'type'  => 'backup',
        ),

    ),
) );
