<?php

/**
 * Rela functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Rela
 */

defined('RELA_T_URI') or define('RELA_T_URI', get_template_directory_uri());
defined('RELA_T_PATH') or define('RELA_T_PATH', get_template_directory());

require_once ABSPATH . 'wp-admin/includes/plugin.php';

require_once RELA_T_PATH . '/include/class-tgm-plugin-activation.php';
require_once RELA_T_PATH . '/include/custom-header.php';
require_once RELA_T_PATH . '/include/actions-config.php';
require_once RELA_T_PATH . '/include/helper-function.php';
require_once RELA_T_PATH . '/include/aheto-shortcodes.php';
require_once RELA_T_PATH . '/include/customizer.php';

require RELA_T_PATH . '/vendor/autoload.php';



/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_rela() {

	if ( ! class_exists( 'Appsero\Client' ) ) {
		require_once RELA_T_PATH . '/vendor/appsero/client/src/Client.php';
	}

	$client = new \Appsero\Client( '8e79b21d-f65d-4091-8313-79f6b3369ff6', 'Rela', __FILE__ );

	// Active insights
	$client->insights()->init();

	// Active automatic updater
	$client->updater();

}

appsero_init_tracker_rela();



if (!function_exists('rela_setup')) :

    function rela_setup()
    {

        register_nav_menus(array('primary-menu' => esc_html__('Primary menu', 'rela')));
        load_theme_textdomain('rela', get_template_directory() . '/languages');


        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
        add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

        add_theme_support( 'woocommerce' );

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('rela_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');


        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;

add_action('after_setup_theme', 'rela_setup');


// ALT for wp users
function crunchify_gravatar_alt($crunchifyGravatar) {
    if (have_comments()) {
        $alt = get_comment_author();
    }
    else {
        $alt = get_the_author_meta('display_name');
    }
    $crunchifyGravatar = str_replace('alt=\'\'', 'alt=\'Avatar for ' . $alt . '\' title=\'Gravatar for ' . $alt . '\'', $crunchifyGravatar);
    return $crunchifyGravatar;
}
add_filter('get_avatar', 'crunchify_gravatar_alt');


// Disable REST API link tag
remove_action('wp_head', 'rest_output_link_wp_head', 10);


add_filter( 'aheto_template_kit_category', function () {
    return 'rela';
} );




add_filter('aheto_shortcodes_data', function ( $data ){

    unset($data['portfolio-nav'], $data['call-to-action'], $data['time-schedule'], $data['title-bar'], $data['instagram'], $data['team'], $data['features-tabs'], $data['features-slider'], $data['progress-bar'], $data['recent-posts']);

    return $data;
}, 10, 1);


if ( ! function_exists( 'rela_deactivate_layouts' ) ) :
    function rela_deactivate_layouts() {
        $current_options = Array(
            'aheto_banner-slider' => Array(
                'layout1',
            ),
            'aheto_blockquote' => Array(
                'layout1',
            ),
            'aheto_clients' => Array(
                'layout1',
            ),
            'aheto_coming-soon' => Array(
                'layout1',
            ),
            'aheto_contents' => Array(
                'layout1',
            ),
            'aheto_contact-forms' => Array(
                'layout1',
                'layout2',
                'layout3',
                'layout4',
                'layout5',
            ),
            'aheto_contact-info' => Array(
                'layout1',
                'layout2',
            ),
            'aheto_contacts' => Array(
                'layout1',
                'layout2',
                'layout3',
            ),
            'aheto_features-single' => Array(
                'layout1',
                'layout2',
                'layout3',
                'layout4',
                'layout5',
                'layout6',
                'layout7',
            ),
            'aheto_features-timeline' => Array(
                'layout1',
            ),
            'aheto_list' => Array(
                'layout1',
                'layout2',
            ),
            'aheto_media' => Array(
                'layout1',
                'layout2',
            ),
            'aheto_navbar' => Array(
                'layout1',
                'layout2',
            ),
            'aheto_navigation' => Array(
                'layout1',
                'layout2',
                'layout3',
                'layout4',
                'layout5',
                'layout6',
                'layout7',
                'layout8',
            ),
            'aheto_pricing-tables' => Array(
                'layout1',
                'layout2',
                'layout3',
                'layout4',
            ),
            'aheto_social-networks' => Array(
                'layout2',
            ),
            'aheto_team-member' => Array(
                'layout1',
                'layout2',
            ),
            'aheto_testimonials' => Array(
                'layout1',
            ),
            'aheto_video-btn' => Array(
                'layout1',
            ),
            'aheto_heading' => Array(
                'layout2',
            ),
        );
        return $current_options;
    }
endif;
add_filter( 'aheto_active_leyouts', 'rela_deactivate_layouts', 10 );


function rela_export_data() {
    if ( class_exists( 'Aheto\Template_Kit\API' ) ) {

        $aheto_api = new Aheto\Template_Kit\API;

        $endpoint = '/aheto/v1/getThemeTemplate/1821';


        $response = $aheto_api->get_demodata( $endpoint, false, false );
        return $response;
    }
}

add_filter( 'export_data', 'rela_export_data', 10 );


if ( ! function_exists( 'rela_woocommerce_template_loop_product_title' ) ) {

    /**
     * Show the product title in the product loop. By default this is an H2.
     */
    function rela_woocommerce_template_loop_product_title() {
        echo '<h4 class="woocommerce-loop-product--title">' . get_the_title() . '</h4>';
    }
}

add_action( 'woocommerce_shop_loop_item_title', 'rela_woocommerce_template_loop_product_title', 20 );


if ( function_exists( 'aheto' ) ) {
    function rela_theme_options( $theme_tabs ) {

        $theme_tabs = [
            'rela_shop' => [
                'icon'  => 'dashicons dashicons-admin-generic pink-color',
                'title' => esc_html__( 'Shop Options', 'aheto' ),
                'desc'  => esc_html__( 'This tab contains the theme shop options.', 'aheto' ),
                'file'  => RELA_T_PATH . '/include/shop-options.php',
            ],
            'rela_blog' => [
                'icon'  => 'dashicons dashicons-admin-generic yellow-color',
                'title' => esc_html__( 'Blog Options', 'aheto' ),
                'desc'  => esc_html__( 'This tab contains the theme blog options.', 'aheto' ),
                'file'  => RELA_T_PATH . '/include/blog-options.php',
            ],
        ];

        return $theme_tabs;
    }
}

add_filter( 'aheto_theme_options', 'rela_theme_options', 10, 2 );


add_filter( 'aheto_wizard', function () {
	return true;
} );