<?php
/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 06.01.16
 * Time: 11:15
 */

if ( function_exists( 'acf_add_local_field_group' ) ):

    acf_add_local_field_group( array(
        'key'                   => 'group_568cd60781f14',
        'title'                 => 'Team: Personendaten',
        'fields'                => array(
            array(
                'key'               => 'field_568cd63937843',
                'label'             => 'Beschreibung',
                'name'              => 'description',
                'type'              => 'textarea',
                'instructions'      => '',
                'required'          => 1,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'maxlength'         => '',
                'rows'              => 3,
                'new_lines'         => '',
                'readonly'          => 0,
                'disabled'          => 0,
            ),
            array(
                'key'               => 'field_568cd68837844',
                'label'             => 'Photo',
                'name'              => 'photo',
                'type'              => 'image',
                'instructions'      => '',
                'required'          => 1,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ),
                'return_format'     => 'url',
                'preview_size'      => 'medium',
                'library'           => 'uploadedTo',
                'min_width'         => 300,
                'min_height'        => 300,
                'min_size'          => '',
                'max_width'         => 1400,
                'max_height'        => 1400,
                'max_size'          => '',
                'mime_types'        => 'png, jpg, jpng',
            ),
            array(
                'key'               => 'field_568cd6f737845',
                'label'             => 'Netzwerke',
                'name'              => 'networks',
                'type'              => 'repeater',
                'instructions'      => 'Hier können Soziale Netzwerke für den Nutzer angegeben werden. Dies ist jedoch kein muss.',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ),
                'collapsed'         => 'field_568cd77537846',
                'min'               => '',
                'max'               => '',
                'layout'            => 'table',
                'button_label'      => '+ Netzwerk',
                'sub_fields'        => array(
                    array(
                        'key'               => 'field_568cd77537846',
                        'label'             => 'Netzwerk',
                        'name'              => 'network',
                        'type'              => 'select',
                        'instructions'      => '',
                        'required'          => 0,
                        'conditional_logic' => 0,
                        'wrapper'           => array(
                            'width' => 50,
                            'class' => '',
                            'id'    => '',
                        ),
                        'choices'           => array(
                            'twitter' => 'Twitter',
                            'adn'     => 'App.Net',
                            'github'  => 'Github',
                            'web'     => 'Blog',
                        ),
                        'default_value'     => array(),
                        'allow_null'        => 0,
                        'multiple'          => 0,
                        'ui'                => 0,
                        'ajax'              => 0,
                        'placeholder'       => '',
                        'disabled'          => 0,
                        'readonly'          => 0,
                    ),
                    array(
                        'key'               => 'field_568cd7a537847',
                        'label'             => 'URL',
                        'name'              => 'url',
                        'type'              => 'url',
                        'instructions'      => '',
                        'required'          => 1,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field'    => 'field_568cd77537846',
                                    'operator' => '==',
                                    'value'    => 'twitter',
                                ),
                            ),
                            array(
                                array(
                                    'field'    => 'field_568cd77537846',
                                    'operator' => '==',
                                    'value'    => 'adn',
                                ),
                            ),
                            array(
                                array(
                                    'field'    => 'field_568cd77537846',
                                    'operator' => '==',
                                    'value'    => 'github',
                                ),
                            ),
                            array(
                                array(
                                    'field'    => 'field_568cd77537846',
                                    'operator' => '==',
                                    'value'    => 'web',
                                ),
                            ),
                        ),
                        'wrapper'           => array(
                            'width' => 50,
                            'class' => '',
                            'id'    => '',
                        ),
                        'default_value'     => '',
                        'placeholder'       => '',
                    ),
                ),
            ),
        ),
        'location'              => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'ultraschall_team',
                ),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen'        => array(
            0  => 'permalink',
            1  => 'the_content',
            2  => 'excerpt',
            3  => 'custom_fields',
            4  => 'discussion',
            5  => 'comments',
            6  => 'revisions',
            7  => 'slug',
            8  => 'format',
            9  => 'page_attributes',
            10 => 'featured_image',
            11 => 'categories',
            12 => 'tags',
            13 => 'send-trackbacks',
        ),
        'active'                => 1,
        'description'           => '',
    )
    );

endif;