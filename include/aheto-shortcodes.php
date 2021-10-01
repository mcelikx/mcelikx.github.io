<?php

use Aheto\Helper;
use Aheto\Sanitize;

add_action( 'aheto_before_aheto_heading_register', 'rela_heading_shortcode' );
add_action( 'aheto_before_aheto_features-single_register', 'rela_features_single_shortcode' );
add_action( 'aheto_before_aheto_custom-post-types_register', 'rela_custom_post_types_shortcode' );
add_action( 'aheto_before_aheto_testimonials_register', 'rela_testimonials_shortcode' );
add_action( 'aheto_before_aheto_pricing-tables_register', 'rela_pricing_tables_shortcode' );
add_action( 'aheto_before_aheto_blockquote_register', 'rela_blockquote_shortcode' );
add_action( 'aheto_before_aheto_video-btn_register', 'rela_video_btn_shortcode' );
add_action( 'aheto_before_aheto_clients_register', 'rela_clients_shortcode' );
add_action( 'aheto_before_aheto_features-timeline_register', 'rela_features_timeline_shortcode' );
add_action( 'aheto_before_aheto_contact-forms_register', 'rela_contact_forms_shortcode' );
add_action( 'aheto_before_aheto_contacts_register', 'rela_contacts_shortcode' );
add_action( 'aheto_before_aheto_contact-info_register', 'rela_contact_info_shortcode' );
add_action( 'aheto_before_aheto_banner-slider_register', 'rela_banner_slider_shortcode' );
add_action( 'aheto_before_aheto_social-networks_register', 'rela_social_networks_shortcode' );
add_action( 'aheto_before_aheto_contents_register', 'rela_contents_shortcode' );
add_action( 'aheto_before_aheto_media_register', 'rela_media_shortcode' );
add_action( 'aheto_before_aheto_navbar_register', 'rela_navbar_shortcode' );
add_action( 'aheto_before_aheto_navigation_register', 'rela_navigation_shortcode' );
add_action( 'aheto_before_aheto_coming-soon_register', 'rela_coming_soon_shortcode' );
add_action( 'aheto_before_aheto_list_register', 'rela_list_shortcode' );
add_action( 'aheto_before_aheto_team-member_register', 'rela_team_member_shortcode' );


/**
 * Navigation Shortcode
 */
function rela_navigation_shortcode( $shortcode ) {

    $theme_dir = RELA_T_URI . '/aheto/navigation/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela main', 'rela' ),
        'image' => $theme_dir . 'cs_layout1.jpg',
    ] );

    $shortcode->add_layout( 'cs_layout2', [
        'title' => esc_html__( 'Rela second', 'rela' ),
        'image' => $theme_dir . 'cs_layout2.jpg',
    ] );

    $shortcode->add_layout( 'cs_layout3', [
        'title' => esc_html__( 'Rela footer navigation', 'rela' ),
        'image' => $theme_dir . 'cs_layout3.jpg',
    ] );

    $shortcode->add_layout( 'cs_layout4', [
        'title' => esc_html__( 'Rela third', 'rela' ),
        'image' => $theme_dir . 'cs_layout4.jpg',
    ] );

    $shortcode->add_dependecy( 'cs_mob_menu_title', 'template', ['cs_layout1','cs_layout2','cs_layout4'] );

    $shortcode->add_dependecy('cs_search_size', 'template', ['cs_layout1','cs_layout2', 'cs_layout4']);
    $shortcode->add_dependecy('cs_dropdown_ico_size', 'template', ['cs_layout1','cs_layout2','cs_layout4']);

    $shortcode->add_dependecy( 'cs_use_mob_menu_title_typo', 'template', ['cs_layout1','cs_layout2','cs_layout4'] );
    $shortcode->add_dependecy( 'cs_mob_menu_title_typo', 'cs_use_mob_menu_title_typo', 'true' );

    $shortcode->add_dependecy('cs_use_logo_label_typo', 'template', 'cs_layout4');
    $shortcode->add_dependecy('cs_logo_label_typo', 'cs_use_logo_label_typo', 'true');

    $shortcode->add_dependecy( 'cs_use_link_typo', 'template', 'cs_layout3' );
    $shortcode->add_dependecy( 'cs_link_typo', 'cs_use_link_typo', 'true' );

    $shortcode->add_dependecy( 'cs_use_submenu_typo', 'template', ['cs_layout1','cs_layout2','cs_layout4'] );
    $shortcode->add_dependecy( 'cs_submenu_typo', 'cs_use_submenu_typo', 'true' );

    $shortcode->add_dependecy( 'cs_use_menu_typo', 'template', ['cs_layout1','cs_layout2','cs_layout4'] );
    $shortcode->add_dependecy( 'cs_menu_typo', 'cs_use_menu_typo', 'true' );

    $shortcode->add_dependecy( 'cs_use_megamenu_typo', 'template', ['cs_layout1','cs_layout2','cs_layout4'] );
    $shortcode->add_dependecy( 'cs_megamenu_typo', 'cs_use_megamenu_typo', 'true' );

    rela_add_dependency('search', ['cs_layout1', 'cs_layout4'], $shortcode);
    rela_add_dependency('max_width', ['cs_layout1','cs_layout2','cs_layout4'], $shortcode);
    rela_add_dependency('mob_logo', ['cs_layout1','cs_layout2','cs_layout4'], $shortcode);
    rela_add_dependency(['add_scroll_logo', 'scroll_logo'], ['cs_layout1', 'cs_layout2'], $shortcode);
    rela_add_dependency(['add_mob_scroll_logo', 'scroll_mob_logo'], ['cs_layout1', 'cs_layout2'], $shortcode);
    rela_add_dependency('transparent', ['cs_layout1','cs_layout2'], $shortcode);
    rela_add_dependency('label_logo', ['cs_layout4'], $shortcode);
    rela_add_dependency(['type_logo', 'logo', 'text_logo'], ['cs_layout1','cs_layout2','cs_layout4'], $shortcode);

    rela_add_dependency('title', ['cs_layout3'], $shortcode);
    rela_add_dependency('title_space', ['cs_layout3'], $shortcode);
    rela_add_dependency('list_space', ['cs_layout3'], $shortcode);
    rela_add_dependency('text_typo', ['cs_layout3'], $shortcode);
    rela_add_dependency('hovercolor', ['cs_layout3'], $shortcode);

    $shortcode->add_params( [
        'cs_use_megamenu_typo' => [
            'type' => 'switch',
            'heading' => esc_html__('Use custom font for Megamenu title?', 'rela'),
            'grid' => 3,
        ],
        'cs_megamenu_typo' => [
            'type' => 'typography',
            'group' => 'Megamenu title Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .mega-menu .mega-menu__title',
        ],
        'cs_use_menu_typo' => [
            'type' => 'switch',
            'heading' => esc_html__('Use custom font for Menus?', 'rela'),
            'grid' => 3,
        ],
        'cs_menu_typo' => [
            'type' => 'typography',
            'group' => 'Menus Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .main-menu>li>a',
        ],
        'cs_use_submenu_typo' => [
            'type' => 'switch',
            'heading' => esc_html__('Use custom font for Submenus?', 'rela'),
            'grid' => 3,
        ],
        'cs_submenu_typo' => [
            'type' => 'typography',
            'group' => 'Submenus Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .main-menu ul li a',
        ],
        'cs_use_logo_label_typo' => [
            'type' => 'switch',
            'heading' => esc_html__('Use custom font for Logo label?', 'rela'),
            'grid' => 3,
        ],
        'cs_logo_label_typo' => [
            'type' => 'typography',
            'group' => 'Logo label Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .main-header__logo-label',
        ],
        'cs_dropdown_ico_size' => [
            'type'    => 'text',
            'heading' => esc_html__('Dropdown icon size', 'rela'),
            'description' => esc_html__( 'Enter Dropdown icon font size with units.', 'rela' ),
            'grid'        => 6,
            'selectors' => [ '{{WRAPPER}} .dropdown-btn' => 'font-size: {{VALUE}}'],
        ],
        'cs_search_size' => [
            'type'    => 'text',
            'heading' => esc_html__('Search icon size', 'rela'),
            'description' => esc_html__( 'Enter search icon font size with units.', 'rela' ),
            'grid'        => 6,
            'selectors' => [ '{{WRAPPER}} .search-btn' => 'font-size: {{VALUE}}'],
        ],
        'cs_mob_menu_title'        => [
            'type'    => 'text',
            'heading' => esc_html__( 'Type Mobile menu title', 'rela' ),
            'default' => esc_html__( 'Menu', 'rela' ),
        ],
        'cs_use_mob_menu_title_typo' => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Use custom font for Mobile menu title?', 'rela' ),
            'grid'    => 3,
        ],
        'cs_mob_menu_title_typo' => [
            'type'     => 'typography',
            'group'    => 'Mobile menu title Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .main-header__mob_menu_title',
        ],
        'cs_use_link_typo' => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Use custom font for Menu links?', 'rela' ),
            'grid'    => 3,
        ],
        'cs_link_typo' => [
            'type'     => 'typography',
            'group'    => 'Menu links Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .menu-item a',
        ],
    ] );

    \Aheto\Params::add_button_params($shortcode, [
        'prefix' => 'cs_main_',
        'group'   => 'Desktop buttons',
        'icons'      => true,
        'dependency' => ['template', ['cs_layout1', 'cs_layout2', 'cs_layout4']]
    ]);

    \Aheto\Params::add_button_params($shortcode, [
        'prefix' => 'cs_main_mob_',
        'group'   => 'Mobile Buttons',
        'icons'      => true,
        'dependency' => ['template', ['cs_layout1', 'cs_layout2', 'cs_layout4']]
    ]);

    \Aheto\Params::add_button_params($shortcode, [
        'prefix' => 'cs_scroll_main_',
        'group'   => 'Scroll Buttons',
        'icons'      => true,
        'dependency' => ['template', ['cs_layout1', 'cs_layout2']]
    ]);
}

function rela_navigation_shortcode_dynamic_css( $css, $shortcode ) {

    if ( ! empty( $shortcode->atts['cs_use_link_typo'] ) && ! empty( $shortcode->atts['cs_link_typo'] ) ) {
        \aheto_add_props( $css['global']['%1$s .menu-item a'], $shortcode->parse_typography( $shortcode->atts['cs_link_typo'] ) );
    }

    if ( ! empty( $shortcode->atts['cs_use_mob_menu_title_typo'] ) && ! empty( $shortcode->atts['cs_mob_menu_title_typo'] ) ) {
        \aheto_add_props( $css['global']['%1$s .main-header__mob_menu_title'], $shortcode->parse_typography( $shortcode->atts['cs_mob_menu_title_typo'] ) );
    }

    if ( !empty($shortcode->atts['cs_dropdown_ico_size']) ) {
        $css['global']['%1$s .dropdown-btn']['font-size'] = Sanitize::size( $shortcode->atts['cs_dropdown_ico_size'] );
    }
    if ( !empty($shortcode->atts['cs_search_size']) ) {
        $css['global']['%1$s .search-btn']['font-size'] = Sanitize::size( $shortcode->atts['cs_search_size'] );
    }
    if (!empty($shortcode->atts['cs_use_logo_label_typo']) && !empty($shortcode->atts['cs_logo_label_typo'])) {
        \aheto_add_props($css['global']['%1$s .main-header__logo-label'], $shortcode->parse_typography($shortcode->atts['cs_logo_label_typo']));
    }
    if (!empty($shortcode->atts['cs_use_submenu_typo']) && !empty($shortcode->atts['cs_submenu_typo'])) {
        \aheto_add_props($css['global']['%1$s .main-menu ul li a'], $shortcode->parse_typography($shortcode->atts['cs_submenu_typo']));
    }
    if (!empty($shortcode->atts['cs_use_menu_typo']) && !empty($shortcode->atts['cs_menu_typo'])) {
        \aheto_add_props($css['global']['%1$s .main-menu>li>a'], $shortcode->parse_typography($shortcode->atts['cs_menu_typo']));
    }
    if (!empty($shortcode->atts['cs_use_megamenu_typo']) && !empty($shortcode->atts['cs_megamenu_typo'])) {
        \aheto_add_props($css['global']['%1$s .mega-menu .mega-menu__title'], $shortcode->parse_typography($shortcode->atts['cs_megamenu_typo']));
    }
    return $css;
}

add_filter( 'aheto_navigation_dynamic_css', 'rela_navigation_shortcode_dynamic_css', 10, 2 );



/**
 * Contents Shortcode
 */
function rela_contents_shortcode( $shortcode ) {

    $theme_dir = RELA_T_URI . '/aheto/contents/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela Faq', 'rela' ),
        'image' => $theme_dir . 'cs_layout1.jpg',
    ] );

    rela_add_dependency( 'faqs', [ 'cs_layout1' ], $shortcode );
    rela_add_dependency( 'multi_active', [ 'cs_layout1' ], $shortcode );
    rela_add_dependency( 'first_is_opened', [ 'cs_layout1' ], $shortcode );

    $shortcode->add_dependecy( 'cs_icon_size', 'template', 'cs_layout1' );

    $shortcode->add_params( [
        'cs_icon_size' => [
            'type'    => 'text',
            'heading' => esc_html__('Icon size', 'rela'),
            'description' => esc_html__( 'Enter icon font size with units.', 'rela' ),
            'grid'        => 6,
            'selectors' => [ '{{WRAPPER}} .aheto-contents__item i' => 'font-size: {{VALUE}}'],
        ],
    ] );
}

function rela_contents_shortcode_dynamic_css( $css, $shortcode ) {

    if ( !empty($shortcode->atts['cs_icon_size']) ) {
        $css['global']['%1$s .aheto-contents__item i']['font-size'] = Sanitize::size( $shortcode->atts['cs_icon_size'] );
    }
    return $css;
}

add_filter( 'aheto_contents_dynamic_css', 'rela_contents_shortcode_dynamic_css', 10, 2 );

/**
 * Team Member
 */
function rela_team_member_shortcode( $shortcode ) {


    $theme_dir = RELA_T_URI . '/aheto/team-member/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela Simple', 'rela' ),
        'image' => $theme_dir . 'cs_layout1.jpg',
    ] );

    rela_add_dependency('name', ['cs_layout1'], $shortcode);
    rela_add_dependency('designation', ['cs_layout1'], $shortcode);
}


/**
 * Pricing Tables Shortcode
 */
function rela_pricing_tables_shortcode( $shortcode ) {

    $theme_dir = RELA_T_URI . '/aheto/pricing-tables/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela Modern', 'rela' ),
        'image' => $theme_dir . 'cs_layout1.jpg',
    ] );

    $shortcode->add_layout( 'cs_layout2', [
        'title' => esc_html__( 'Rela Short', 'rela' ),
        'image' => $theme_dir . 'cs_layout2.jpg',
    ] );

    $shortcode->add_layout( 'cs_layout3', [
        'title' => esc_html__( 'Rela Minimal', 'rela' ),
        'image' => $theme_dir . 'cs_layout3.jpg',
    ] );

    $shortcode->add_layout( 'cs_layout4', [
        'title' => esc_html__( 'Rela Narrow', 'rela' ),
        'image' => $theme_dir . 'cs_layout4.jpg',
    ] );

    //Isotope
    $shortcode->add_layout( 'cs_layout5', [
        'title' => esc_html__( 'Rela Consult Isotope', 'rela' ),
        'image' => $theme_dir . 'cs_layout5.jpg',
    ] );
    //Isotope

    $shortcode->add_layout( 'cs_layout6', [
        'title' => esc_html__( 'Rela Side', 'rela' ),
        'image' => $theme_dir . 'cs_layout6.jpg',
    ] );

    $shortcode->add_dependecy( 'cs_features', 'template', ['cs_layout1', 'cs_layout4', 'cs_layout6'] );
    $shortcode->add_dependecy( 'cs_active', 'template', ['cs_layout1'] );
    $shortcode->add_dependecy( 'cs_heading', 'template', ['cs_layout1', 'cs_layout2', 'cs_layout4', 'cs_layout6'] );
    $shortcode->add_dependecy( 'cs_use_heading_typo', 'template', ['cs_layout2', 'cs_layout4', 'cs_layout6'] );
    $shortcode->add_dependecy( 'cs_use_description_typo', 'template', 'cs_layout2' );
    $shortcode->add_dependecy( 'cs_special_color', 'template', 'cs_layout3' );
    $shortcode->add_dependecy( 'cs_min_price', 'template', 'cs_layout3' );
    $shortcode->add_dependecy( 'cs_use_price_typo', 'template', ['cs_layout1', 'cs_layout2', 'cs_layout4', 'cs_layout6'] );

    $shortcode->add_dependecy('cs_use_time_typo', 'template', ['cs_layout1','cs_layout6']);
    $shortcode->add_dependecy('cs_time_typo', 'cs_use_time_typo', 'true');

    $shortcode->add_dependecy('cs_use_item_typo', 'template', 'cs_layout6');
    $shortcode->add_dependecy('cs_item_typo', 'cs_use_item_typo', 'true');

    $shortcode->add_dependecy('cs_use_spec_typo', 'template', 'cs_layout3');
    $shortcode->add_dependecy('cs_spec_typo', 'cs_use_spec_typo', 'true');

    $shortcode->add_dependecy( 'cs_price_typo', 'cs_use_price_typo', 'true' );
    $shortcode->add_dependecy( 'cs_heading_typo', 'cs_use_heading_typo', 'true' );
    $shortcode->add_dependecy( 'cs_description_typo', 'cs_use_description_typo', 'true' );

    rela_add_dependency('price', ['cs_layout1','cs_layout2', 'cs_layout4', 'cs_layout6'], $shortcode);
    rela_add_dependency('description', ['cs_layout1','cs_layout2', 'cs_layout4', 'cs_layout6'], $shortcode);

    //Isotope
    $shortcode->add_dependecy('cs_pricings', 'template', 'cs_layout5');

    $shortcode->add_dependecy('cs_use_label_typo', 'template', 'cs_layout5');
    $shortcode->add_dependecy('cs_label_typo', 'cs_use_label_typo', 'true');

    $shortcode->add_dependecy('cs_use_list_title_typo', 'template', 'cs_layout5');
    $shortcode->add_dependecy('cs_list_title_typo', 'cs_use_list_title_typo', 'true');

    $shortcode->add_params( [
        //Isotope
        'cs_pricings' => [
            'type'    => 'group',
            'heading' => esc_html__( 'Rela Consult Pricing Items', 'rela' ),
            'params'  => [
                'cs_pricings_heading'        => [
                    'type'    => 'text',
                    'heading' => esc_html__( 'Category', 'rela' ),
                    'default' => esc_html__( 'Put your text...', 'rela' ),
                ],
                'cs_pricings_title'        => [
                    'type'    => 'text',
                    'heading' => esc_html__( 'Category heading', 'rela' ),
                    'default' => esc_html__( 'Put your text...', 'rela' ),
                ],
                'cs_pricings_label'        => [
                    'type'    => 'text',
                    'heading' => esc_html__( 'Category label', 'rela' ),
                    'default' => esc_html__( '', 'rela' ),
                ],
                'cs_pricings_price'        => [
                    'type'    => 'text',
                    'heading' => esc_html__( 'Category price', 'rela' ),
                    'default' => esc_html__( 'Put your text...', 'rela' ),
                ],
                'cs_pricings_descr'        => [
                    'type'    => 'textarea',
                    'heading' => esc_html__( 'Category description', 'rela' ),
                    'default' => esc_html__( 'Put your text...', 'rela' ),
                ],
            ],
        ],
        'cs_use_label_typo' => [
            'type' => 'switch',
            'heading' => esc_html__('Use custom font for Label?', 'rela'),
            'grid' => 3,
        ],
        'cs_label_typo' => [
            'type' => 'typography',
            'group' => 'Label Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .aheto-pricing__box-title span',
        ],
        'cs_use_list_title_typo' => [
            'type' => 'switch',
            'heading' => esc_html__('Use custom font for List titles?', 'rela'),
            'grid' => 3,
        ],
        'cs_list_title_typo' => [
            'type' => 'typography',
            'group' => 'List titles Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .aheto-pricing__list-link',
        ],

        //Isotope

        'cs_use_spec_typo' => [
            'type' => 'switch',
            'heading' => esc_html__('Use custom font for Special?', 'rela'),
            'grid' => 3,
        ],
        'cs_spec_typo' => [
            'type' => 'typography',
            'group' => 'Special Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .aheto-pricing__special',
        ],
        'cs_use_item_typo' => [
            'type' => 'switch',
            'heading' => esc_html__('Use custom font for Item?', 'rela'),
            'grid' => 3,
        ],
        'cs_item_typo' => [
            'type' => 'typography',
            'group' => 'Item Typography',
            'settings' => [
                'text_align' => true,
            ],
            'selector' => '{{WRAPPER}} .aheto-pricing__list-item',
        ],
        'cs_use_time_typo' => [
            'type' => 'switch',
            'heading' => esc_html__('Use custom font for Time?', 'rela'),
            'grid' => 3,
        ],
        'cs_time_typo' => [
            'type' => 'typography',
            'group' => 'Time Typography',
            'settings' => [
                'text_align' => true,
            ],
            'selector' => '{{WRAPPER}} .aheto-pricing__cost-time',
        ],
        'cs_heading'    => [
            'type'        => 'text',
            'heading'     => esc_html__( 'Heading', 'rela' ),
            'default'     => esc_html__( 'Heading text.', 'rela' ),
            'admin_label' => true,
        ],
        'cs_active'     => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Mark as active?', 'rela' ),
            'grid'    => 12,
        ],
        'cs_use_heading_typo' => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Use custom font for Heading?', 'rela' ),
            'grid'    => 3,
        ],
        'cs_heading_typo' => [
            'type'     => 'typography',
            'group'    => 'Heading Typography',
            'settings' => [
                'text_align' => true,
            ],
            'selector' => '{{WRAPPER}} .aheto-pricing__title',
        ],
        'cs_use_price_typo' => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Use custom font for Price?', 'rela' ),
            'grid'    => 3,
        ],
        'cs_price_typo' => [
            'type'     => 'typography',
            'group'    => 'Price Typography',
            'settings' => [
                'text_align' => true,
            ],
            'selector' => '{{WRAPPER}} .aheto-pricing__cost-value',
        ],
        'cs_use_description_typo' => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Use custom font for Description?', 'rela' ),
            'grid'    => 3,
        ],
        'cs_description_typo' => [
            'type'     => 'typography',
            'group'    => 'Description Typography',
            'settings' => [
                'text_align' => true,
            ],
            'selector' => '{{WRAPPER}} .aheto-pricing__description',
        ],
        'cs_features'          => [
            'type'    => 'group',
            'heading' => esc_html__('Features', 'rela' ),
            'params'  => [
                'cs_feature' => [
                    'type'    => 'text',
                    'heading' => esc_html__('Feature', 'rela' ),
                ],
                'cs_mark' => [
                    'type'    => 'select',
                    'heading' => esc_html__('Decoration', 'rela' ),
                    'default' => 'default',
                    'options' => [
                        'default'   => esc_html__('Default', 'rela' ),
                        'line-through'   => esc_html__('Line-through', 'rela' ),
                        'opacity'   => esc_html__('Opacity', 'rela' ),
                    ],
                ],
                'cs_resp_descr' => [
                    'type'    => 'text',
                    'heading' => esc_html__('Description for tablets and mobiles', 'rela' ),
                ],
            ],
        ],
        'cs_min_price'          => [
            'type'    => 'group',
            'heading' => esc_html__('Item', 'rela' ),
            'params'  => [
                'cs_time' => [
                    'type'    => 'text',
                    'heading' => esc_html__('Heading', 'rela' ),
                ],
                'cs_special'    => [
                    'type'        => 'text',
                    'heading'     => esc_html__( 'Special', 'rela' ),
                ],
                'cs_price'             => [
                    'type'    => 'text',
                    'heading' => esc_html__('Price', 'rela' ),
                ],
            ],
        ],
        'cs_special_color' => [
            'type'      => 'colorpicker',
            'heading'   => esc_html__('Special color', 'rela' ),
            'grid'      => 6,
            'selectors' => ['{{WRAPPER}} .aheto-pricing__special' => 'color: {{VALUE}}']
        ],

    ] );

    \Aheto\Params::add_button_params( $shortcode, [
        'add_button' => true,
        'prefix'     => 'cs_',
        'dependency' => [ 'template', 'cs_layout1' ]
    ] );

    \Aheto\Params::add_button_params( $shortcode, [
        'add_button' => true,
        'prefix'     => 'cs_narrow_',
        'dependency' => [ 'template', 'cs_layout4' ]
    ] );

    \Aheto\Params::add_button_params( $shortcode, [
        'add_button' => true,
        'prefix'     => 'cs_side_',
        'dependency' => [ 'template', 'cs_layout6' ]
    ] );
}

function rela_pricing_tables_shortcode_dynamic_css( $css, $shortcode ) {
    if ( ! empty( $shortcode->atts['cs_use_list_title_typo'] ) && ! empty( $shortcode->atts['cs_list_title_typo'] ) ) {
        \aheto_add_props( $css['global']['%1$s .aheto-pricing__list-link'], $shortcode->parse_typography( $shortcode->atts['cs_list_title_typo'] ) );
    }
    if ( ! empty( $shortcode->atts['cs_use_heading_typo'] ) && ! empty( $shortcode->atts['cs_heading_typo'] ) ) {
        \aheto_add_props( $css['global']['%1$s .aheto-pricing__title'], $shortcode->parse_typography( $shortcode->atts['cs_heading_typo'] ) );
    }
    if ( ! empty( $shortcode->atts['cs_use_price_typo'] ) && ! empty( $shortcode->atts['cs_price_typo'] ) ) {
        \aheto_add_props( $css['global']['%1$s .aheto-pricing__cost-value'], $shortcode->parse_typography( $shortcode->atts['cs_price_typo'] ) );
    }
    if ( ! empty( $shortcode->atts['cs_use_description_typo'] ) && ! empty( $shortcode->atts['cs_description_typo'] ) ) {
        \aheto_add_props( $css['global']['%1$s .aheto-pricing__description'], $shortcode->parse_typography( $shortcode->atts['cs_description_typo'] ) );
    }
    if (!empty($shortcode->atts['cs_use_time_typo']) && !empty($shortcode->atts['cs_time_typo'])) {
        \aheto_add_props($css['global']['%1$s .aheto-pricing__cost-time'], $shortcode->parse_typography($shortcode->atts['cs_time_typo']));
    }
    if (!empty($shortcode->atts['cs_use_time_typo']) && !empty($shortcode->atts['cs_time_typo'])) {
        \aheto_add_props($css['global']['%1$s .aheto-pricing__cost-time'], $shortcode->parse_typography($shortcode->atts['cs_time_typo']));
    }
    if (!empty($shortcode->atts['cs_use_spec_typo']) && !empty($shortcode->atts['cs_spec_typo'])) {
        \aheto_add_props($css['global']['%1$s .aheto-pricing__special'], $shortcode->parse_typography($shortcode->atts['cs_spec_typo']));
    }
    if (!empty($shortcode->atts['cs_use_item_typo']) && !empty($shortcode->atts['cs_item_typo'])) {
        \aheto_add_props($css['global']['%1$s .aheto-pricing__list-item'], $shortcode->parse_typography($shortcode->atts['cs_item_typo']));
    }
    if ( ! empty( $shortcode->atts['cs_special_color'] ) ) {
        $color                                                    = Sanitize::color( $shortcode->atts['cs_special_color'] );
        $css['global']['%1$s .aheto-pricing__special']['color'] = $color;
    }

    return $css;
}

add_filter( 'aheto_pricing_tables_dynamic_css', 'rela_pricing_tables_shortcode_dynamic_css', 10, 2 );


/**
 * List Shortcode
 */
function rela_list_shortcode( $shortcode ) {

    $theme_dir = RELA_T_URI . '/aheto/list/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela list', 'rela' ),
        'image' => $theme_dir . 'cs_layout1.jpg',
    ] );

    rela_add_dependency('lists', ['cs_layout1'], $shortcode);
    rela_add_dependency('heading', ['cs_layout1'], $shortcode);
    rela_add_dependency('text_tag', ['cs_layout1'], $shortcode);
    rela_add_dependency('color', ['cs_layout1'], $shortcode);

}


/**
 * Coming Soon Shortcode
 */
function rela_coming_soon_shortcode( $shortcode ) {

    $theme_dir = RELA_T_URI . '/aheto/coming-soon/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela coming soon', 'rela' ),
        'image' => $theme_dir . 'cs_layout1.jpg',
    ] );

    rela_add_dependency('light', ['cs_layout1'], $shortcode);
    rela_add_dependency('days_desktop', ['cs_layout1'], $shortcode);
    rela_add_dependency('days_mobile', ['cs_layout1'], $shortcode);
    rela_add_dependency('hours_desktop', ['cs_layout1'], $shortcode);
    rela_add_dependency('hours_mobile', ['cs_layout1'], $shortcode);
    rela_add_dependency('mins_desktop', ['cs_layout1'], $shortcode);
    rela_add_dependency('mins_mobile', ['cs_layout1'], $shortcode);
    rela_add_dependency('secs_desktop', ['cs_layout1'], $shortcode);
    rela_add_dependency('secs_mobile', ['cs_layout1'], $shortcode);
    rela_add_dependency(['use_typo_numbers', 'typo_numbers'], ['cs_layout1'], $shortcode);
    rela_add_dependency(['use_typo_caption', 'typo_caption'], ['cs_layout1'], $shortcode);

    $shortcode->add_dependecy('cs_use_dots_typo', 'template', 'cs_layout1');
    $shortcode->add_dependecy('cs_dots_typo', 'cs_use_dots_typo', 'true');

    $shortcode->add_params([
        'cs_use_dots_typo' => [
            'type' => 'switch',
            'heading' => esc_html__('Use custom font for dots?', 'rela'),
            'grid' => 12,
            'default' => '',
        ],
        'cs_dots_typo' => [
            'type' => 'typography',
            'group' => 'Dots Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .aheto-coming-soon__dots',
        ],
    ]);
}

function rela_coming_soon_shortcode_dynamic_css($css, $shortcode)
{
    if (!empty($shortcode->atts['cs_use_dots_typo']) && !empty($shortcode->atts['cs_dots_typo'])) {
        \aheto_add_props($css['global']['%1$s .aheto-coming-soon__dots'], $shortcode->parse_typography($shortcode->atts['cs_dots_typo']));
    }

    return $css;
}

add_filter('aheto_coming_soon_dynamic_css', 'rela_coming_soon_shortcode_dynamic_css', 10, 2);



/**
 * Contact-info Shortcode
 */
function rela_contact_info_shortcode( $shortcode ) {

    $theme_dir = RELA_T_URI . '/aheto/contact-info/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela minimal', 'rela' ),
        'image' => $theme_dir . 'cs_layout1.jpg',
    ] );

    $shortcode->add_dependecy( 'cs_use_title_typo', 'template', 'cs_layout1' );
    $shortcode->add_dependecy( 'cs_title_typo', 'cs_use_title_typo', 'true' );
    $shortcode->add_dependecy('cs_use_links_typo', 'template', 'cs_layout1');
    $shortcode->add_dependecy('cs_links_typo', 'cs_use_links_typo', 'true');

    rela_add_dependency('title', ['cs_layout1'], $shortcode);
    rela_add_dependency('address', ['cs_layout1'], $shortcode);
    rela_add_dependency('email', ['cs_layout1'], $shortcode);
    rela_add_dependency('phone', ['cs_layout1'], $shortcode);
    rela_add_dependency(['type_logo', 'use_typo_logo', 'text_logo', 'logo'], ['cs_layout1'], $shortcode);
    rela_add_dependency(['use_typo_text', 'text_typo'], ['cs_layout1'], $shortcode);
    rela_add_dependency('hovercolor', ['cs_layout1'], $shortcode);

    $shortcode->add_params( [
        'cs_use_links_typo' => [
            'type' => 'switch',
            'heading' => esc_html__('Use custom font for Links?', 'rela'),
            'grid' => 3,
        ],
        'cs_links_typo' => [
            'type' => 'typography',
            'group' => 'Links Typography',
            'settings' => [
                'text_align' => false,
                'tag' => false,
            ],
            'selector' => '{{WRAPPER}} .widget_aheto__info a',
        ],
        'cs_use_title_typo' => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Use custom font for Title?', 'rela' ),
            'grid'    => 3,
        ],
        'cs_title_typo' => [
            'type'     => 'typography',
            'group'    => 'Title Typography',
            'settings' => [
                'text_align' => true,
                'tag' => false,
            ],
            'selector' => '{{WRAPPER}} .widget_aheto__title',
        ],
    ] );
}

function rela_contact_info_shortcode_dynamic_css($css, $shortcode)
{
    if (!empty($shortcode->atts['cs_use_title_typo']) && !empty($shortcode->atts['cs_title_typo'])) {
        \aheto_add_props($css['global']['%1$s .widget_aheto__title'], $shortcode->parse_typography($shortcode->atts['cs_title_typo']));
    }

    if (!empty($shortcode->atts['cs_use_links_typo']) && !empty($shortcode->atts['cs_links_typo'])) {
        \aheto_add_props($css['global']['%1$s .widget_aheto__info a'], $shortcode->parse_typography($shortcode->atts['cs_links_typo']));
    }

    return $css;
}

add_filter('aheto_contact_info_dynamic_css', 'rela_contact_info_shortcode_dynamic_css', 10, 2);

/**
 * Navbar Shortcode
 */
function rela_navbar_shortcode( $shortcode ) {

    $theme_dir = RELA_T_URI . '/aheto/navbar/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela Top Nav', 'rela' ),
        'image' => $theme_dir . 'cs_layout1.jpg',
    ] );

    $shortcode->add_dependecy( 'cs_search', 'template', 'cs_layout1' );
    $shortcode->add_dependecy( 'cs_max_width', 'template', 'cs_layout1' );
    $shortcode->add_dependecy('cs_search_size', 'template', 'cs_layout1');

    $shortcode->add_dependecy('cs_use_labels_icon_typo', 'template', 'cs_layout1');
    $shortcode->add_dependecy('cs_labels_icon_typo', 'cs_use_labels_icon_typo', 'true');

    rela_add_dependency('remove_borders', ['cs_layout1'], $shortcode);
    rela_add_dependency(['columns', 'right_links', 'right_hide_mobile'], ['cs_layout1'], $shortcode);
    rela_add_dependency('left_links', ['cs_layout1'], $shortcode);
    rela_add_dependency('left_hide_mobile', ['cs_layout1'], $shortcode);
    rela_add_dependency(['use_links_typo', 'links_typo'], ['cs_layout1'], $shortcode);
    rela_add_dependency(['use_socials_typo', 'socials_typo'], ['cs_layout1'], $shortcode);

    $shortcode->add_params( [
        'cs_use_labels_icon_typo' => [
            'type' => 'switch',
            'heading' => esc_html__('Use custom font for Labels icon?', 'rela'),
            'grid' => 3,
        ],
        'cs_labels_icon_typo' => [
            'type' => 'typography',
            'group' => 'Labels icon Typography',
            'settings' => [
                'text_align' => false,
                'tag' => false,
            ],
            'selector' => '{{WRAPPER}} .aheto-navbar--item-label i',
        ],
        'cs_search_size' => [
            'type'    => 'text',
            'heading' => esc_html__('Search icon size', 'rela'),
            'description' => esc_html__( 'Enter search icon font size with units.', 'rela' ),
            'grid'        => 6,
            'selectors' => [ '{{WRAPPER}} .aheto-navbar--search' => 'font-size: {{VALUE}}'],
        ],
        'cs_search'       => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Searchbox', 'rela' ),
        ],
        'cs_max_width'          => [
            'type'      => 'slider',
            'heading'   => esc_html__('Max width for navbar', 'rela' ),
            'grid'      => 12,
            'range'     => [
                'px' => [
                    'min'  => 0,
                    'max'  => 3000,
                    'step' => 5,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .aheto-navbar--wrap' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ],
    ] );
}

function rela_navbar_shortcode_dynamic_css( $css, $shortcode ) {

    if (!empty($shortcode->atts['cs_use_labels_icon_typo']) && !empty($shortcode->atts['cs_labels_icon_typo'])) {
        \aheto_add_props($css['global']['%1$s .aheto-navbar--item-label i'], $shortcode->parse_typography($shortcode->atts['cs_labels_icon_typo']));
    }
    if ( ! empty( $shortcode->atts['cs_max_width'] ) ) {
        $css['global']['%1$s .aheto-navbar--wrap']['max-width'] = Sanitize::size( $shortcode->atts['cs_max_width'] );
    }
    if ( !empty($shortcode->atts['cs_search_size']) ) {
        $css['global']['%1$s .aheto-navbar--search']['font-size'] = Sanitize::size( $shortcode->atts['cs_search_size'] );
    }
    return $css;
}

add_filter( 'aheto_heading_dynamic_css', 'rela_navbar_shortcode_dynamic_css', 10, 2 );


/**
 * Features Timeline Shortcode
 */
function rela_features_timeline_shortcode($shortcode) {
    $dir = RELA_T_URI . '/aheto/features-timeline/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela Modern', 'rela' ),
        'image' => $dir . 'cs_layout1.jpg',
    ] );

    $shortcode->add_dependecy( 'cs_timeline', 'template', 'cs_layout1' );
    $shortcode->add_dependecy( 'cs_dark_version', 'template', 'cs_layout1' );
    $shortcode->add_dependecy('cs_arrow_size', 'template', 'cs_layout1');


    $shortcode->add_params( [
        'cs_arrow_size' => [
            'type'    => 'text',
            'heading' => esc_html__('Arrow size', 'rela'),
            'description' => esc_html__( 'Enter arrow font size with units.', 'rela' ),
            'grid'        => 6,
            'selectors' => [ '{{WRAPPER}} .aheto-timeline__navigation a' => 'font-size: {{VALUE}}'],
        ],
        'cs_timeline' => [
            'type'    => 'group',
            'heading' => esc_html__( 'Items', 'rela' ),
            'params'  => [
                'cs_timeline_date'       => [
                    'type'    => 'text',
                    'heading' => esc_html__( 'Date', 'rela' ),
                ],
                'cs_timeline_title'        => [
                    'type'    => 'textarea',
                    'heading' => esc_html__( 'Title', 'rela' ),
                    'description' => esc_html__( 'To Hightlight text insert text between: [[ Your Text Here ]]', 'rela' ),
                    'default'     => esc_html__( 'Title with [[ hightlight ]] text.', 'rela' ),
                ],
                'cs_timeline_content'        => [
                    'type'    => 'textarea',
                    'heading' => esc_html__( 'Content', 'rela' ),
                    'default' => esc_html__( 'Add some text for content', 'rela' ),
                ],
                'cs_timeline_image'     => [
                    'type'    => 'attach_image',
                    'heading' => esc_html__('Add image', 'rela' ),
                ],
            ],
        ],

        'cs_dark_version'    => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Enable dark version?', 'rela' ),
            'grid'    => 3,
        ],
    ] );

    \Aheto\Params::add_button_params($shortcode, [
        'prefix' => 'cs_',
        'icons'      => true,
    ], 'cs_timeline');

    \Aheto\Params::add_image_sizer_params($shortcode, [
        'prefix' => 'cs_',
        'dependency' => ['template', ['cs_layout1']]
    ]);
}

function rela_features_timeline_shortcode_dynamic_css( $css, $shortcode ) {

    if ( !empty($shortcode->atts['cs_arrow_size']) ) {
        $css['global']['%1$s .aheto-timeline__navigation a']['font-size'] = Sanitize::size( $shortcode->atts['cs_arrow_size'] );
    }

    return $css;
}

add_filter( 'aheto_features-timeline_dynamic_css', 'rela_features_timeline_shortcode_dynamic_css', 10, 2 );

/**
 * Banner Slider
 */
function rela_banner_slider_shortcode( $shortcode ) {

    $theme_dir = RELA_T_URI . '/aheto/banner-slider/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela Modern', 'rela' ),
        'image' => $theme_dir . 'cs_layout1.jpg',
    ] );

    $shortcode->add_layout( 'cs_layout2', [
        'title' => esc_html__( 'Rela Creative', 'rela' ),
        'image' => $theme_dir . 'cs_layout2.jpg',
    ] );

    $shortcode->add_dependecy( 'rela_modern_banners', 'template', 'cs_layout1' );
    $shortcode->add_dependecy( 'rela_creative_banners', 'template', 'cs_layout2' );

    $shortcode->add_dependecy( 'cs_use_description_typo', 'template', 'cs_layout1');
    $shortcode->add_dependecy( 'cs_description_typo', 'cs_use_description_typo', 'true' );
    $shortcode->add_dependecy( 'cs_use_pagination_typo', 'template', 'cs_layout2');
    $shortcode->add_dependecy( 'cs_pagination_typo', 'cs_use_pagination_typo', 'true');

    rela_add_dependency(['use_heading', 't_heading'], ['cs_layout1'], $shortcode);

    $shortcode->add_params( [
        'cs_use_pagination_typo' => [
            'type' => 'switch',
            'heading' => esc_html__('Use custom font for pagination?', 'rela'),
            'grid' => 12,
            'default' => '',
        ],
        'cs_pagination_typo' => [
            'type' => 'typography',
            'group' => 'Pagination Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .swiper-pagination--numeric .swiper-pagination',
        ],
        'cs_use_description_typo'   => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Use custom font for description?', 'rela' ),
            'grid'    => 12,
            'default' => '',
        ],
        'cs_description_typo' => [
            'type'     => 'typography',
            'group'    => 'Description Typography',
            'settings' => [
                'text_align' => true,
            ],
            'selector' => '{{WRAPPER}} .aheto-banner-slider__desc',
        ],
        'rela_modern_banners' => [
            'type'    => 'group',
            'heading' => esc_html__( 'Banners', 'rela' ),
            'params'  => [
                'cs_image'         => [
                    'type'    => 'attach_image',
                    'heading' => esc_html__( 'Background Image', 'rela' ),
                ],
                'cs_add_image'     => [
                    'type'    => 'attach_image',
                    'heading' => esc_html__( 'Additional Image', 'rela' ),
                ],
                'cs_title'         => [
                    'type'    => 'text',
                    'heading' => esc_html__( 'Title', 'rela' ),
                ],
                'cs_desc'          => [
                    'type'    => 'textarea',
                    'heading' => esc_html__( 'Description', 'rela' ),
                ],
                'cs_align' => [
                    'type'    => 'select',
                    'heading' => esc_html__('Align', 'rela'),
                    'options' => Helper::choices_alignment(),
                ],
                'cs_btn_direction' => [
                    'type'    => 'select',
                    'heading' => esc_html__( 'Buttons Direction', 'rela' ),
                    'options' => [
                        ''            => esc_html__( 'Horizontal', 'rela' ),
                        'is-vertical' => esc_html__( 'Vertical', 'rela' ),
                    ],
                ],
                'cs_overlay-color' => [
                    'type'      => 'colorpicker',
                    'heading'   => esc_html__('Overlay color', 'rela' ),
                    'grid'      => 6,
                    'selectors' => ['{{WRAPPER}} .swiper-slide-overlay' => 'background-color: {{VALUE}}']
                ],
                'cs_desc_max_width'     => [
                    'type'      => 'slider',
                    'heading'   => esc_html__('Description Max width', 'rela' ),
                    'group'     => esc_html__('Content', 'rela' ),
                    'grid'      => 6,
                    'range'     => [
                        'px' => [
                            'min'  => 10,
                            'max'  => 1920,
                            'step' => 5,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aheto-banner-slider__desc' => 'max-width: {{SIZE}}{{UNIT}}; margin-left: auto; margin-right: auto;',
                    ],
                ],
                'cs_title_max_width'     => [
                    'type'      => 'slider',
                    'heading'   => esc_html__('Title Max width', 'rela' ),
                    'group'     => esc_html__('Content', 'rela' ),
                    'grid'      => 6,
                    'range'     => [
                        'px' => [
                            'min'  => 10,
                            'max'  => 1920,
                            'step' => 5,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aheto-banner__title' => 'max-width: {{SIZE}}{{UNIT}}; margin-left: auto; margin-right: auto;',
                    ],
                ],
            ]
        ],

        'rela_creative_banners' => [
            'type'    => 'group',
            'heading' => esc_html__( 'Banners', 'rela' ),
            'params'  => [
                'cs_image'     => [
                    'type'    => 'attach_image',
                    'heading' => esc_html__( 'Background Image', 'rela' ),
                ]
            ]
        ]

    ] );

    \Aheto\Params::add_button_params( $shortcode, [
        'add_button' => true,
        'prefix' => 'cs_main_',
    ], 'rela_modern_banners' );

    \Aheto\Params::add_button_params( $shortcode, [
        'add_button' => true,
        'prefix'    => 'cs_add_',
        'add_label' => esc_html__( 'Add additional button?', 'rela' ),
    ], 'rela_modern_banners' );

    \Aheto\Params::add_carousel_params( $shortcode, [
        'custom_options' => true,
        'prefix'         => 'cs_swiper_',
        'include'        => [ 'effect', 'pagination', 'speed', 'loop', 'autoplay', 'arrows', 'lazy', 'simulate_touch', 'arrows_style', 'arrows_num_typo', 'arrows_color', 'arrows_size'],
        'dependency'     => [ 'template', [ 'cs_layout1' ] ]
    ] );

    \Aheto\Params::add_carousel_params( $shortcode, [
        'custom_options' => true,
        'prefix'         => 'cs_swiper_creative_',
        'include'        => [ 'effect', 'speed', 'loop', 'autoplay', 'arrows', 'lazy', 'simulate_touch', 'pagination'],
        'dependency'     => [ 'template', [ 'cs_layout2' ] ]
    ] );

    \Aheto\Params::add_image_sizer_params($shortcode, [
        'prefix' => 'cs_add_',
        'group' => 'Additional Image size',
        'dependency' => ['template', ['cs_layout1']]
    ]);

    \Aheto\Params::add_image_sizer_params($shortcode, [
        'prefix' => 'cs_creative_',
        'dependency' => ['template', ['cs_layout2']]
    ]);
}

function rela_banner_slider_shortcode_dynamic_css( $css, $shortcode ) {

    if (! empty( $shortcode->atts['cs_use_pagination_typo'] ) && !empty($shortcode->atts['cs_pagination_typo'])) {
        \aheto_add_props($css['global']['%1$s .swiper-pagination--numeric .swiper-pagination'], $shortcode->parse_typography($shortcode->atts['cs_pagination_typo']));
    }

    if ( ! empty( $shortcode->atts['cs_use_description_typo'] ) && ! empty( $shortcode->atts['cs_description_typo'] ) ) {
        \aheto_add_props( $css['global']['%1$s .aheto-banner-slider__desc'], $shortcode->parse_typography( $shortcode->atts['cs_description_typo'] ) );
    }

    if ( ! empty( $shortcode->atts['cs_overlay-color'] ) ) {
        $color = Sanitize::color( $shortcode->atts['cs_overlay-color'] );
        $css['global']['%1$s .swiper-slide-overlay']['background-color'] = $color;
    }

    if ( ! empty( $shortcode->atts['cs_desc_max_width'] ) ) {
        $css['global']['%1$s .aheto-banner-slider__desc']['max-width'] = Sanitize::size( $shortcode->atts['cs_desc_max_width'] );
        $css['global']['%1$s .aheto-banner-slider__desc']['margin-left']  = 'auto';
        $css['global']['%1$s .aheto-banner-slider__desc']['margin-right'] = 'auto';
    }

    if ( ! empty( $shortcode->atts['cs_title_max_width'] ) ) {
        $css['global']['%1$s .aheto-banner__title']['max-width'] = Sanitize::size( $shortcode->atts['cs_title_max_width'] );
        $css['global']['%1$s .aheto-banner__title']['margin-left']  = 'auto';
        $css['global']['%1$s .aheto-banner__title']['margin-right'] = 'auto';
    }

    return $css;
}

add_filter( 'aheto_banner_slider_dynamic_css', 'rela_banner_slider_shortcode_dynamic_css', 10, 2 );



/**
 * Features Single Shortcode
 */
function rela_features_single_shortcode( $shortcode ) {

    $theme_dir = RELA_T_URI . '/aheto/features-single/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela Classic', 'rela' ),
        'image' => $theme_dir . 'cs_layout1.jpg',
    ] );

    $shortcode->add_layout( 'cs_layout2', [
        'title' => esc_html__( 'Rela Minimal', 'rela' ),
        'image' => $theme_dir . 'cs_layout2.jpg',
    ] );

    $shortcode->add_layout( 'cs_layout3', [
        'title' => esc_html__( 'Rela Modern', 'rela' ),
        'image' => $theme_dir . 'cs_layout3.jpg',
    ] );

    $shortcode->add_layout( 'cs_layout4', [
        'title' => esc_html__( 'Rela Packages', 'rela' ),
        'image' => $theme_dir . 'cs_layout4.jpg',
    ] );

    $shortcode->add_dependecy( 'cs_use_title_typo', 'template', ['cs_layout1','cs_layout2','cs_layout3','cs_layout4'] );
    $shortcode->add_dependecy( 'cs_use_description_typo', 'template', ['cs_layout1','cs_layout2','cs_layout3','cs_layout4'] );
    $shortcode->add_dependecy( 'cs_background-color', 'template', ['cs_layout1','cs_layout2','cs_layout3'] );
    $shortcode->add_dependecy( 'cs_border-color', 'template', ['cs_layout4'] );
    $shortcode->add_dependecy( 'cs_price', 'template', ['cs_layout4'] );
    $shortcode->add_dependecy( 'cs_hover-color', 'template', ['cs_layout4'] );
    $shortcode->add_dependecy( 'cs_link_url', 'template', ['cs_layout3'] );

    $shortcode->add_dependecy( 'cs_title_typo', 'cs_use_title_typo', 'true' );
    $shortcode->add_dependecy( 'cs_description_typo', 'cs_use_description_typo', 'true' );

    rela_add_dependency('s_image', ['cs_layout1','cs_layout2','cs_layout3','cs_layout4'], $shortcode);
    rela_add_dependency('s_heading', ['cs_layout1','cs_layout2','cs_layout3','cs_layout4'], $shortcode);
    rela_add_dependency('s_description', ['cs_layout1','cs_layout2','cs_layout3','cs_layout4'], $shortcode);
    rela_add_dependency('button', ['cs_layout4'], $shortcode);

    $shortcode->add_params( [
        'cs_link_url' => [
            'type'        => 'text',
            'heading'     => esc_html__( 'Service URL', 'rela' ),
            'description' => esc_html__( 'Add url to for service', 'rela' ),
            'default'     => '#',
        ],
        'cs_price'    => [
            'type'        => 'text',
            'heading'     => esc_html__( 'Price', 'rela' ),
        ],
        'cs_hover-color' => [
            'type'      => 'colorpicker',
            'heading'   => esc_html__('Hover color', 'rela' ),
            'grid'      => 6,
            'selectors' => ['{{WRAPPER}} .aheto-features-block__overlay' => 'background-color: {{VALUE}}']
        ],
        'cs_use_title_typo'   => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Use custom font for heading?', 'rela' ),
            'grid'    => 12,
            'default' => '',
        ],
        'cs_title_typo' => [
            'type'     => 'typography',
            'group'    => 'Heading Typography',
            'settings' => [
                'text_align' => true,
            ],
            'selector' => '{{WRAPPER}} .aheto-features-block__title',
        ],
        'cs_use_description_typo'   => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Use custom font for description?', 'rela' ),
            'grid'    => 12,
            'default' => '',
        ],
        'cs_description_typo' => [
            'type'     => 'typography',
            'group'    => 'Description Typography',
            'settings' => [
                'text_align' => true,
            ],
            'selector' => '{{WRAPPER}} .aheto-features-block__description',
        ],
        'cs_background-color' => [
            'type'      => 'colorpicker',
            'heading'   => esc_html__('Background color', 'rela' ),
            'grid'      => 6,
            'selectors' => ['{{WRAPPER}} .aheto-features-block__image-wrap' => 'background-color: {{VALUE}}']
        ],
        'cs_border-color' => [
            'type'      => 'colorpicker',
            'heading'   => esc_html__('Border color', 'rela' ),
            'grid'      => 6,
            'selectors' => ['{{WRAPPER}} .aheto-features-block__image:before' => 'border-color: {{VALUE}}']
        ],
    ] );


    \Aheto\Params::add_button_params( $shortcode, [
        'prefix'     => 'cs_',
        'icons'      => true,
        'dependency' => [ 'template', 'cs_layout4' ]
    ] );

    \Aheto\Params::add_image_sizer_params($shortcode, [
        'prefix'     => 'cs_',
        'dependency' => ['template', ['cs_layout1','cs_layout2','cs_layout3','cs_layout4']]
    ]);

}

function rela_features_single_shortcode_dynamic_css( $css, $shortcode ) {

    if ( ! empty( $shortcode->atts['cs_use_title_typo'] ) && ! empty( $shortcode->atts['cs_title_typo'] ) ) {
        \aheto_add_props( $css['global']['%1$s .aheto-features-block__title'], $shortcode->parse_typography( $shortcode->atts['cs_title_typo'] ) );
    }

    if ( ! empty( $shortcode->atts['cs_use_description_typo'] ) && ! empty( $shortcode->atts['cs_description_typo'] ) ) {
        \aheto_add_props( $css['global']['%1$s .aheto-features-block__description'], $shortcode->parse_typography( $shortcode->atts['cs_description_typo'] ) );
    }

    if ( ! empty( $shortcode->atts['cs_hover-color'] ) ) {
        $color                                                    = Sanitize::color( $shortcode->atts['cs_hover-color'] );
        $css['global']['%1$s .aheto-features-block__overlay']['background-color'] = $color;
    }

    if ( ! empty( $shortcode->atts['cs_background-color'] ) ) {
        $color                                                    = Sanitize::color( $shortcode->atts['cs_background-color'] );
        $css['global']['%1$s .aheto-features-block__image-wrap']['background-color'] = $color;
    }

    if ( ! empty( $shortcode->atts['cs_border-color'] ) ) {
        $color                                                    = Sanitize::color( $shortcode->atts['cs_border-color'] );
        $css['global']['%1$s .aheto-features-block__image']['border-color'] = $color;
    }

    return $css;
}

add_filter( 'aheto_features_single_dynamic_css', 'rela_features_single_shortcode_dynamic_css', 10, 2 );


/**
 * Clients Shortcode
 */
function rela_clients_shortcode( $shortcode ) {

    $theme_dir = RELA_T_URI . '/aheto/clients/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela main', 'rela' ),
        'image' => $theme_dir . 'cs_layout1.jpg',
    ] );

    $shortcode->add_dependecy( 'cs_hover_style', 'template', 'cs_layout1' );

    rela_add_dependency('clients', ['cs_layout1'], $shortcode);
    rela_add_dependency('item_per_row', ['cs_layout1'], $shortcode);

    $shortcode->add_params( [
        'cs_hover_style'  => [
            'type'    => 'select',
            'heading' => esc_html__('Hover Style', 'rela' ),
            'default' => 'default',
            'options' => [
                'default'   => esc_html__('Default', 'rela' ),
                'grayscale' => esc_html__('Grayscale', 'rela' ),
                'darkness'  => esc_html__('Darkness', 'rela' ),
                'opacity_d'  => esc_html__('Opacity decrease', 'rela' ),
            ],
        ]
    ] );

    \Aheto\Params::add_image_sizer_params($shortcode, [
        'prefix'    => 'cs_',
        'dependency' => ['template', 'cs_layout1']
    ]);
}


/**
 * Blockquote Shortcode
 */
function rela_blockquote_shortcode( $shortcode ) {

    $theme_dir = RELA_T_URI . '/aheto/blockquote/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela blockquote', 'rela' ),
        'image' => $theme_dir . 'cs_layout1.jpg',
    ] );

    $shortcode->add_dependecy( 'cs_date', 'template', 'cs_layout1' );
    $shortcode->add_dependecy( 'cs_use_author_typo', 'template', 'cs_layout1' );
    $shortcode->add_dependecy( 'cs_author_typo', 'cs_use_author_typo', 'true' );
    $shortcode->add_dependecy('cs_use_date_typo', 'template', 'cs_layout1');
    $shortcode->add_dependecy('cs_date_typo', 'cs_use_date_typo', 'true');
    $shortcode->add_dependecy('cs_use_quote_typo', 'template', 'cs_layout1');
    $shortcode->add_dependecy('cs_quote_typo', 'cs_use_quote_typo', 'true');


    rela_add_dependency('quote', ['cs_layout1'], $shortcode);
    rela_add_dependency('qoute_tag', ['cs_layout1'], $shortcode);
    rela_add_dependency('use_quote', ['cs_layout1'], $shortcode);
    rela_add_dependency('author', ['cs_layout1'], $shortcode);
    rela_add_dependency('align', ['cs_layout1'], $shortcode);
    rela_add_dependency('max_width', ['cs_layout1'], $shortcode);
    rela_add_dependency('quote_spacing', ['cs_layout1'], $shortcode);
    rela_add_dependency('icon_position', ['cs_layout1'], $shortcode);
    rela_add_dependency('icon_size', ['cs_layout1'], $shortcode);
    rela_add_dependency('icon_color', ['cs_layout1'], $shortcode);

    $shortcode->add_params( [
        'cs_use_quote_typo' => [
            'type' => 'switch',
            'heading' => esc_html__('Use custom font for Quote?', 'rela'),
            'grid' => 12,
            'default' => '',
        ],
        'cs_quote_typo' => [
            'type' => 'typography',
            'group' => 'Quote Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .aheto-quote--rela-simple:before',
        ],
        'cs_use_date_typo' => [
            'type' => 'switch',
            'heading' => esc_html__('Use custom font for Date?', 'rela'),
            'grid' => 12,
            'default' => '',
        ],
        'cs_date_typo' => [
            'type' => 'typography',
            'group' => 'Date Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .aheto-quote__date',
        ],
        'cs_date' => [
            'type'     => 'text',
            'group'    => 'Content',
            'heading' => esc_html__( 'Date', 'rela' ),
        ],
        'cs_use_author_typo'   => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Use custom font for Author?', 'rela' ),
            'grid'    => 12,
            'default' => '',
        ],
        'cs_author_typo' => [
            'type'     => 'typography',
            'group'    => 'Author Typography',
            'settings' => [
                'text_align' => true,
            ],
            'selector' => '{{WRAPPER}} .aheto-quote__author',
        ],
    ] );

}

function rela_blockquote_shortcode_dynamic_css( $css, $shortcode ) {
    if ( ! empty( $shortcode->atts['cs_use_author_typo'] ) && ! empty( $shortcode->atts['cs_author_typo'] ) ) {
        \aheto_add_props( $css['global']['%1$s .aheto-quote__author'], $shortcode->parse_typography( $shortcode->atts['cs_author_typo'] ) );
    }
    if (!empty($shortcode->atts['cs_use_quote_typo']) && !empty($shortcode->atts['cs_quote_typo'])) {
        \aheto_add_props($css['global']['%1$s .aheto-quote--rela-simple:before'], $shortcode->parse_typography($shortcode->atts['cs_quote_typo']));
    }
    if (!empty($shortcode->atts['cs_use_date_typo']) && !empty($shortcode->atts['cs_date_typo'])) {
        \aheto_add_props($css['global']['%1$s .aheto-quote__date'], $shortcode->parse_typography($shortcode->atts['cs_date_typo']));
    }
    return $css;
}
add_filter( 'aheto_blockquote_dynamic_css', 'rela_blockquote_shortcode_dynamic_css', 10, 2 );



/**
 * Rela Button Shortcode
 */
function rela_button_layout1( $btn_layout1 ) {
    $dir  = RELA_T_URI . '/aheto/button/previews/';
    $btn_layout1['cs-button--rela-main'] = array(
        'title' => esc_html__( 'Rela Main', 'rela' ),
        'image' => $dir . 'cs_layout1.jpg',
    );
    return $btn_layout1;
}
add_filter( 'aheto_button_all_layouts', 'rela_button_layout1', 10, 2 );

function rela_button_layout2( $btn_layout2 ) {
    $dir  = RELA_T_URI . '/aheto/button/previews/';
    $btn_layout2['cs-button--rela-trans'] = array(
        'title' => esc_html__( 'Rela Transparent', 'rela' ),
        'image' => $dir . 'cs_layout2.jpg',
    );
    return $btn_layout2;
}
add_filter( 'aheto_button_all_layouts', 'rela_button_layout2', 10, 2 );




/**
 * Heading Shortcode
 */
function rela_heading_shortcode( $shortcode ) {

    $theme_dir = RELA_T_URI . '/aheto/heading/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela Simple', 'rela' ),
        'image' => $theme_dir . 'cs_layout1.jpg',
    ] );

    $shortcode->add_dependecy( 'cs_use_description_typo', 'template', 'cs_layout1' );
    $shortcode->add_dependecy( 'cs_desc_max_width', 'template', 'cs_layout1' );
    $shortcode->add_dependecy( 'cs_title_max_width', 'template', 'cs_layout1' );

    $shortcode->add_dependecy( 'cs_description_typo', 'cs_use_description_typo', 'true' );

    rela_add_dependency('text_typo', ['cs_layout1'], $shortcode);
    rela_add_dependency('use_typo', ['cs_layout1'], $shortcode);
    rela_add_dependency('heading', [ 'cs_layout1' ], $shortcode );
    rela_add_dependency('text_typo_hightlight', ['cs_layout1'], $shortcode);
    rela_add_dependency('use_typo_hightlight', ['cs_layout1'], $shortcode);
    rela_add_dependency('description', ['cs_layout1'], $shortcode);
    rela_add_dependency('alignment', ['cs_layout1'], $shortcode);
    rela_add_dependency('text_tag', ['cs_layout1'], $shortcode);

    $shortcode->add_params( [
        'cs_title_max_width'     => [
            'type'      => 'slider',
            'heading'   => esc_html__('Title Max width', 'rela' ),
            'group'     => esc_html__('Content', 'rela' ),
            'grid'      => 6,
            'range'     => [
                'px' => [
                    'min'  => 10,
                    'max'  => 1920,
                    'step' => 5,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .aheto-heading__title' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ],
        'cs_desc_max_width'     => [
            'type'      => 'slider',
            'heading'   => esc_html__('Description Max width', 'rela' ),
            'group'     => esc_html__('Content', 'rela' ),
            'grid'      => 6,
            'range'     => [
                'px' => [
                    'min'  => 10,
                    'max'  => 1920,
                    'step' => 5,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .aheto-heading__desc' => 'max-width: {{SIZE}}{{UNIT}}; margin-left: auto; margin-right: auto;',
            ],
        ],
        'cs_use_description_typo' => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Use custom font for Description?', 'rela' ),
            'grid'    => 3,
        ],
        'cs_description_typo' => [
            'type'     => 'typography',
            'group'    => 'Description Typography',
            'settings' => [
                'tag'        => false,
                'text_align' => true,
            ],
            'selector' => '{{WRAPPER}} .aheto-heading__desc',
        ]
    ] );
}

function rela_heading_shortcode_dynamic_css( $css, $shortcode ) {

    if ( ! empty( $shortcode->atts['cs_use_description_typo'] ) && ! empty( $shortcode->atts['cs_description_typo'] ) ) {
        \aheto_add_props( $css['global']['%1$s .aheto-heading__desc'], $shortcode->parse_typography( $shortcode->atts['cs_description_typo'] ) );
    }

    if ( ! empty( $shortcode->atts['cs_title_max_width'] ) ) {
        $css['global']['%1$s .aheto-heading__title']['max-width'] = Sanitize::size( $shortcode->atts['cs_title_max_width'] );
    }

    if ( ! empty( $shortcode->atts['cs_desc_max_width'] ) ) {
        $css['global']['%1$s .aheto-heading__desc']['max-width'] = Sanitize::size( $shortcode->atts['cs_desc_max_width'] );
        $css['global']['%1$s .aheto-heading__desc']['margin-left']  = 'auto';
        $css['global']['%1$s .aheto-heading__desc']['margin-right'] = 'auto';
    }
    return $css;
}

add_filter( 'aheto_heading_dynamic_css', 'rela_heading_shortcode_dynamic_css', 10, 2 );


/**
 * Rela custom post type style for blog items
 */
function rela_custom_post_types_shortcode($shortcode) {


    $shortcode->add_dependecy("сs_img_off", "skin", "cs_skin-1");
    $shortcode->add_dependecy("сs_date_off", "skin", "cs_skin-1");
    $shortcode->add_dependecy("cs_date_label", "skin", "cs_skin-1");
    $shortcode->add_dependecy("cs_use_date_typo", "skin", "cs_skin-1" );
    $shortcode->add_dependecy("cs_use_author_typo", "skin", "cs_skin-1" );

    $shortcode->add_dependecy( "cs_date_typo", "cs_use_date_typo", "true" );
    $shortcode->add_dependecy( "cs_author_typo", "cs_use_author_typo", "true" );
// CUSTOM SKIN 1
    $aheto_skins      = $shortcode->params["skin"]["options"];
    $rela_skins = array(
        "cs_skin-1" => "Rela skin 1",
    );
    $shortcode->add_params([
        "сs_img_off" => [
            "type"    => "switch",
            "heading" => esc_html__("Disable post image?", 'rela'),
            "grid"    => 12,
        ],
        "сs_date_off" => [
            "type"    => "switch",
            "heading" => esc_html__("Disable post date?", 'rela'),
            "grid"    => 12,
        ],
        "cs_date_label"        => [
            "type"    => "text",
            "heading" => esc_html__( "Date label", 'rela' ),
            "default" => esc_html__( "in World", 'rela' ),
        ],
        'cs_use_date_typo' => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Use custom font for Date?', 'rela' ),
            'grid'    => 3,
        ],
        'cs_date_typo' => [
            'type'     => 'typography',
            'group'    => 'Date Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .aheto-cpt-article__date',
        ],
        'cs_use_author_typo' => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Use custom font for Author?', 'rela' ),
            'grid'    => 3,
        ],
        'cs_author_typo' => [
            'type'     => 'typography',
            'group'    => 'Author Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .aheto-cpt-article__author',
        ],
    ]);
    $all_skins                            = array_merge($aheto_skins, $rela_skins);
    $shortcode->params["skin"]["options"] = $all_skins;
}

function rela_cpt_shortcode_dynamic_css( $css, $shortcode ) {

    if ( ! empty( $shortcode->atts['cs_use_date_typo'] ) && ! empty( $shortcode->atts['cs_date_typo'] ) ) {
        \aheto_add_props( $css['global']['%1$s .aheto-cpt-article__date'], $shortcode->parse_typography( $shortcode->atts['cs_date_typo'] ) );
    }

    if ( ! empty( $shortcode->atts['cs_use_author_typo'] ) && ! empty( $shortcode->atts['cs_author_typo'] ) ) {
        \aheto_add_props( $css['global']['%1$s .aheto-cpt-article__author'], $shortcode->parse_typography( $shortcode->atts['cs_author_typo'] ) );
    }

    return $css;
}


add_filter( 'aheto_cpt_dynamic_css', 'rela_cpt_shortcode_dynamic_css', 10, 2 );


/**
 * Testimonials Shortcode
 */
function rela_testimonials_shortcode( $shortcode ) {

    $theme_dir = RELA_T_URI . '/aheto/testimonials/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela Modern', 'rela' ),
        'image' => $theme_dir . 'cs_layout1.jpg',
    ] );

    $shortcode->add_layout( 'cs_layout2', [
        'title' => esc_html__( 'Rela Minimal', 'rela' ),
        'image' => $theme_dir . 'cs_layout2.jpg',
    ] );

    $shortcode->add_dependecy( 'cs_testimonials', 'template', 'cs_layout1' );
    $shortcode->add_dependecy( 'cs_testimonials_minimal', 'template', 'cs_layout2' );


    $shortcode->add_params( [
        'cs_testimonials' => [
            'type'    => 'group',
            'heading' => esc_html__( 'Modern Testimonials Items', 'rela' ),
            'params'  => [
                'cs_image'       => [
                    'type'    => 'attach_image',
                    'heading' => esc_html__( 'Author photo', 'rela' ),
                ],
                'cs_name'        => [
                    'type'    => 'text',
                    'heading' => esc_html__( 'Name', 'rela' ),
                    'default' => esc_html__( 'Author name', 'rela' ),
                ],
                'cs_company'     => [
                    'type'    => 'text',
                    'heading' => esc_html__( 'Position', 'rela' ),
                    'default' => esc_html__( 'Author position', 'rela' ),
                ],
                'cs_testimonial' => [
                    'type'    => 'textarea',
                    'heading' => esc_html__( 'Testimonial', 'rela' ),
                    'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'rela' ),
                ],
            ],
        ],
        'cs_testimonials_minimal' => [
            'type'    => 'group',
            'heading' => esc_html__( 'Minimal Testimonials Items', 'rela' ),
            'params'  => [
                'cs_name'        => [
                    'type'    => 'text',
                    'heading' => esc_html__( 'Name', 'rela' ),
                    'default' => esc_html__( 'Author name', 'rela' ),
                ],
                'cs_company'     => [
                    'type'    => 'text',
                    'heading' => esc_html__( 'Position', 'rela' ),
                    'default' => esc_html__( 'Author position', 'rela' ),
                ],
                'cs_testimonial' => [
                    'type'    => 'textarea',
                    'heading' => esc_html__( 'Testimonial', 'rela' ),
                    'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'rela' ),
                ],
            ],
        ],
    ] );

    \Aheto\Params::add_carousel_params( $shortcode, [
        'custom_options' => true,
        'prefix'         => 'cs_swiper_',
        'include'        => [ 'loop', 'autoplay', 'speed', 'slides', 'spaces', 'simulate_touch' ],
        'dependency'     => [ 'template', [ 'cs_layout1' ] ]
    ] );

    \Aheto\Params::add_carousel_params( $shortcode, [
        'custom_options' => true,
        'prefix'         => 'cs_swiper_min_',
        'include'        => [ 'loop', 'autoplay', 'speed', 'slides', 'spaces', 'simulate_touch', 'pagination' ],
        'dependency'     => [ 'template', [ 'cs_layout2' ] ]
    ] );

    \Aheto\Params::add_image_sizer_params($shortcode, [
        'prefix' => 'cs_',
        'dependency' => ['template', ['cs_layout1']]
    ]);
}


/**
 * Simple media
 */
function rela_media_shortcode ($shortcode) {
    $dir = RELA_T_URI . '/aheto/media/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela Media Single', 'rela' ),
        'image' => $dir . 'cs_layout1.jpg',
    ] );

    $shortcode->add_dependecy( 'cs_image', 'template', 'cs_layout1' );

    $shortcode->add_params([
        'cs_image'     => [
            'type'    => 'attach_image',
            'heading' => esc_html__('Add image', 'rela' ),
        ],
    ]);

    \Aheto\Params::add_image_sizer_params($shortcode, [
        'prefix'     => 'cs_',
        'dependency' => ['template', ['cs_layout1']]
    ]);
}


/**
 * Contact forms Shortcode
 */
function rela_contact_forms_shortcode( $shortcode ) {

    $theme_dir = RELA_T_URI . '/aheto/contact-forms/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela Email', 'rela' ),
        'image' => $theme_dir . 'cs_layout1.jpg',
    ] );

    $shortcode->add_layout( 'cs_layout2', [
        'title' => esc_html__( 'Rela Classic', 'rela' ),
        'image' => $theme_dir . 'cs_layout2.jpg',
    ] );

    rela_add_dependency( 'title', [ 'cs_layout2' ], $shortcode );
    rela_add_dependency( 'title_typo', [ 'cs_layout2' ], $shortcode );
    rela_add_dependency( 'use_title_typo', [ 'cs_layout2' ], $shortcode );
    rela_add_dependency( 'button_align', [ 'cs_layout2' ], $shortcode );
    rela_add_dependency( 'border_radius_button', [ 'cs_layout2' ], $shortcode );
    rela_add_dependency( 'border_radius_input', [ 'cs_layout2' ], $shortcode );
    rela_add_dependency( 'bg_color_fields', [ 'cs_layout1', 'cs_layout2' ], $shortcode );
    rela_add_dependency( 'full_width_button', [ 'cs_layout2' ], $shortcode );

    $shortcode->add_dependecy( 'cs_max_width', 'template', 'cs_layout1' );
    $shortcode->add_dependecy( 'cs_title_tag', 'template', 'cs_layout2' );


    $shortcode->add_params( [

        'cs_title_tag' => [
            'type'    => 'select',
            'heading' => esc_html__( 'Element tag for Title', 'rela' ),
            'options' => [
                'h1'  => 'h1',
                'h2'  => 'h2',
                'h3'  => 'h3',
                'h4'  => 'h4',
                'h5'  => 'h5',
                'h6'  => 'h6',
                'p'   => 'p',
                'div' => 'div',
            ],
            'default' => 'h5',
            'grid'    => 5,
        ],
        'cs_max_width'     => [
            'type'      => 'slider',
            'heading'   => esc_html__('Max width', 'rela' ),
            'group'     => esc_html__('Content', 'rela' ),
            'grid'      => 6,
            'range'     => [
                'px' => [
                    'min'  => 10,
                    'max'  => 1920,
                    'step' => 5,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .widget_aheto__cf--rela__subscribe-simple' => 'max-width: {{SIZE}}{{UNIT}}; margin-left: auto; margin-right: auto;',
            ],
        ],

    ] );
}

function rela_contact_forms_shortcode_button( $form_button ) {
    $form_button['dependency'][1][] = 'cs_layout1';
    $form_button['dependency'][1][] = 'cs_layout2';
    return $form_button;
}
add_filter( 'aheto_button_contact-forms', 'rela_contact_forms_shortcode_button', 10, 2 );


function rela_contact_forms_shortcode_dynamic_css( $css, $shortcode ) {

    if ( ! empty( $shortcode->atts['cs_max_width'] ) ) {
        $css['global']['%1$s .widget_aheto__cf--rela__subscribe-simple']['max-width'] = Sanitize::size( $shortcode->atts['cs_max_width'] );
        $css['global']['%1$s .widget_aheto__cf--rela__subscribe-simple']['margin-left']  = 'auto';
        $css['global']['%1$s .widget_aheto__cf--rela__subscribe-simple']['margin-right'] = 'auto';
    }
    return $css;
}
add_filter( 'aheto_contact_forms_dynamic_css', 'rela_contact_forms_shortcode_dynamic_css', 10, 2 );



/**
 * Contacts Shortcode
 */
function rela_contacts_shortcode( $shortcode ) {
    $dir = RELA_T_URI . '/aheto/contacts/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela Slider', 'rela' ),
        'image' => $dir . 'cs_layout1.jpg',
    ] );

    $shortcode->add_dependecy( 'cs_light_arrows', 'template', 'cs_layout1' );
    $shortcode->add_dependecy( 'cs_contacts_group', 'template', 'cs_layout1' );
    $shortcode->add_dependecy('cs_use_content_typo', 'template', 'cs_layout1');
    $shortcode->add_dependecy('cs_content_typo', 'cs_use_content_typo', 'true');

    rela_add_dependency(['use_heading', 't_heading'], ['cs_layout1'], $shortcode);

    $shortcode->add_params( [
        'cs_use_content_typo' => [
            'type' => 'switch',
            'heading' => esc_html__('Use custom font for Content?', 'rela'),
            'grid' => 12,
            'default' => '',
        ],
        'cs_content_typo' => [
            'type' => 'typography',
            'group' => 'Content Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .aheto-contact__info p, .aheto-contact__info a',
        ],
        'cs_light_arrows'     => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Tur on light arrows?', 'rela' ),
            'grid'    => 12,
        ],
        'cs_contacts_group' => [
            'type'    => 'group',
            'heading' => esc_html__( 'Contacts Items', 'rela' ),
            'params'  => [
                'cs_heading_tag' => [
                    'type'    => 'select',
                    'heading' => esc_html__( 'Element tag for Heading', 'rela' ),
                    'options' => [
                        'h1'  => 'h1',
                        'h2'  => 'h2',
                        'h3'  => 'h3',
                        'h4'  => 'h4',
                        'h5'  => 'h5',
                        'h6'  => 'h6',
                        'p'   => 'p',
                        'div' => 'div',
                    ],
                    'default' => 'h4',
                    'grid'    => 5,
                ],
                'cs_heading'   => [
                    'type'    => 'text',
                    'heading' => esc_html__( 'Heading', 'rela' ),
                ],
                'cs_address'     => [
                    'type'    => 'textarea',
                    'heading' => esc_html__( 'Address', 'rela' ),
                ],
                'cs_phone'       => [
                    'type'    => 'text',
                    'heading' => esc_html__( 'Phone', 'rela' ),
                ],
                'cs_email'       => [
                    'type'    => 'text',
                    'heading' => esc_html__( 'Email', 'rela' ),
                ]
            ]
        ],
    ] );
    \Aheto\Params::add_icon_params( $shortcode, [
        'add_icon'   => true,
        'add_label'  => esc_html__( 'Add address icon?', 'rela' ),
        'prefix'     => 'cs_address_',
        'exclude'    => [ 'align'],
        'dependency' => [ 'template', 'cs_layout1' ]
    ]);
    \Aheto\Params::add_icon_params( $shortcode, [
        'add_icon'   => true,
        'add_label'  => esc_html__( 'Add phone icon?', 'rela' ),
        'prefix'     => 'cs_phone_',
        'exclude'    => [ 'align'],
        'dependency' => [ 'template', 'cs_layout1' ]
    ]);
    \Aheto\Params::add_icon_params( $shortcode, [
        'add_icon'   => true,
        'add_label'  => esc_html__( 'Add email icon?', 'rela' ),
        'prefix'     => 'cs_email_',
        'exclude'    => [ 'align'],
        'dependency' => [ 'template', 'cs_layout1' ]
    ]);

    \Aheto\Params::add_carousel_params( $shortcode, [
        'custom_options' => true,
        'prefix'         => 'cs_contacts_',
        'include'        => [ 'arrows', 'loop', 'autoplay', 'speed', 'simulate_touch', 'arrows_size' ],
        'dependency'     => [ 'template', [ 'cs_layout1' ] ]
    ] );
}

function rela_contacts_shortcode_dynamic_css( $css, $shortcode ) {

    if (!empty($shortcode->atts['cs_use_content_typo']) && !empty($shortcode->atts['cs_content_typo'])) {
        \aheto_add_props($css['global']['%1$s .aheto-contact__info p, %1$s .aheto-contact__info a '], $shortcode->parse_typography($shortcode->atts['cs_content_typo']));
    }
    if ( !empty($shortcode->atts['cs_arrows_size']) ) {
        $css['global']['%1$s .swiper-button-next, %1$s .swiper-button-prev']['font-size'] = Sanitize::size( $shortcode->atts['cs_arrows_size'] );
    }
    return $css;
}
add_filter( 'aheto_contacts_dynamic_css', 'rela_contacts_shortcode_dynamic_css', 10, 2 );


/**
 * Video Button
 */
function rela_video_btn_shortcode( $shortcode ) {

    $theme_dir = RELA_T_URI . '/aheto/video-btn/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela Style', 'rela' ),
        'image' => $theme_dir . 'cs_layout1.jpg',
    ] );

    $shortcode->add_dependecy( 'cs_text', 'template', 'cs_layout1' );
    $shortcode->add_dependecy( 'cs_use_text_typo', 'template', 'cs_layout1' );
    $shortcode->add_dependecy( 'cs_text_typo', 'cs_use_text_typo', 'true' );

    $shortcode->add_params( [
        'cs_text' => [
            'type'          => 'text',
            'heading'       => esc_html__( 'Text for video button', 'rela' ),
        ],
        'cs_use_text_typo' => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Use custom font for text?', 'rela' ),
            'grid'    => 3,
        ],
        'cs_text_typo' => [
            'type'     => 'typography',
            'group'    => 'Text Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .aheto-btn-video__text',
        ],
    ] );
}

function rela_video_btn_shortcode_dynamic_css( $css, $shortcode ) {

    if ( ! empty( $shortcode->atts['cs_use_text_typo'] ) && ! empty( $shortcode->atts['cs_text_typo'] ) ) {
        \aheto_add_props( $css['global']['%1$s .aheto-btn-video__text'], $shortcode->parse_typography( $shortcode->atts['cs_text_typo'] ) );
    }

    return $css;
}

add_filter( 'aheto_video_btn_dynamic_css', 'rela_video_btn_shortcode_dynamic_css', 10, 2 );


/**
 * Social Networks
 */
function rela_social_networks_shortcode( $shortcode ) {

    $theme_dir = RELA_T_URI . '/aheto/social-networks/previews/';

    $shortcode->add_layout( 'cs_layout1', [
        'title' => esc_html__( 'Rela Modern', 'rela' ),
        'image' => $theme_dir . 'cs_layout1.jpg',
    ] );

    $shortcode->add_dependecy( 'cs_hovercolor', 'template', 'cs_layout1' );

    $shortcode->add_dependecy( 'cs_use_text_typo', 'template', 'cs_layout1' );
    $shortcode->add_dependecy( 'cs_text_typo', 'cs_use_text_typo', 'true' );

    rela_add_dependency('networks', ['cs_layout1'], $shortcode);
    rela_add_dependency('socials_align_mob', ['cs_layout1'], $shortcode);
    rela_add_dependency('socials_align', ['cs_layout1'], $shortcode);
    rela_add_dependency('size', ['cs_layout1'], $shortcode);

    $shortcode->add_params( [
        'cs_use_text_typo' => [
            'type'    => 'switch',
            'heading' => esc_html__( 'Use custom font for social name?', 'rela' ),
            'grid'    => 3,
        ],
        'cs_text_typo' => [
            'type'     => 'typography',
            'group'    => 'Social name Typography',
            'settings' => [
                'text_align' => false,
            ],
            'selector' => '{{WRAPPER}} .aheto-socials__link',
        ],
        'cs_hovercolor'    => [
            'type'      => 'colorpicker',
            'heading'   => esc_html__( 'Color on hover', 'rela' ),
            'grid'      => 6,
            'selectors' => [ '{{WRAPPER}} .aheto-socials__link:hover' => 'color: {{VALUE}}' ],
        ],
    ] );
}

function rela_social_networks_shortcode_dynamic_css( $css, $shortcode ) {

    if ( ! empty( $shortcode->atts['cs_hovercolor'] ) ) {
        $color                                                    = Sanitize::color( $shortcode->atts['cs_hovercolor'] );
        $css['global']['%1$s .aheto-socials__link:hover']['color'] = $color;
    }
    if ( ! empty( $shortcode->atts['cs_use_text_typo'] ) && ! empty( $shortcode->atts['cs_text_typo'] ) ) {
        \aheto_add_props( $css['global']['%1$s .aheto-socials__link'], $shortcode->parse_typography( $shortcode->atts['cs_text_typo'] ) );
    }
    return $css;
}

add_filter( 'aheto_social_networks_dynamic_css', 'rela_social_networks_shortcode_dynamic_css', 10, 2 );




/**
 * Aheto dependency
 */
function rela_add_dependency( $id, $args = array(), $shortcode ) {
	if ( is_array( $id ) ) {

		foreach ( $id as $slug ) {
			$param = (array)$shortcode->depedency[$slug]['template'];
			$shortcode->depedency[$slug]['template'] = array_merge($args, $param );
		}

	} else {
		$param = (array)$shortcode->depedency[$id]['template'];
		$shortcode->depedency[$id]['template'] = array_merge($args, $param );
	}

	return;
}