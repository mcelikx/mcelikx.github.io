<?php
/**
 * Header Rela Menu.
 */

use Aheto\Helper;

extract( $atts );

if ( empty( $menus ) ) {
	return;
}

$this->generate_css();

// Wrapper.
$this->add_render_attribute( 'wrapper', 'id', $element_id );
$this->add_render_attribute( 'wrapper', 'class', $this->the_custom_classes() );
$this->add_render_attribute( 'wrapper', 'class', 'main-header' );
$this->add_render_attribute( 'wrapper', 'class', 'main-header--rela-second' );
$this->add_render_attribute( 'wrapper', 'class', 'main-header-js' );
$this->add_render_attribute( 'wrapper', 'class', $transparent );

/**
 * Set dependent style
 */
$sc_dir = RELA_T_URI . '/aheto/navigation/';
wp_enqueue_style('rela-navigation-second', $sc_dir . 'assets/css/cs_layout2.css', null, null);


$type_logo = isset( $type_logo ) && !empty( $type_logo ) ? $type_logo : 'image';


$button = $this->get_button_attributes( 'main' );


?>
<div <?php $this->render_attribute_string( 'wrapper' ); ?>>
    <div class="main-header__main-line">

        <div class="aheto-logo main-header__logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php if ( ! empty( $logo ) && $type_logo == 'image' ) {
                    echo Helper::get_attachment( $logo, [ 'class' => 'aheto-logo__image' ] );
                }
                if ( ! empty( $scroll_logo ) && $type_logo == 'image' ) {
                    echo Helper::get_attachment( $scroll_logo, [ 'class' => 'aheto-logo__image aheto-logo__image-scroll' ] );
                }
                if ( ! empty( $mob_logo ) && $type_logo == 'image' ) {
                    echo Helper::get_attachment( $mob_logo, [ 'class' => 'aheto-logo__image mob-logo' ] );
                }
                if ( ! empty( $scroll_mob_logo ) && $type_logo == 'image' ) {
                    echo Helper::get_attachment( $scroll_mob_logo, [ 'class' => 'aheto-logo__image mob-logo aheto-logo__image-mob-scroll' ] );
                }
                 ?>
            </a>
        </div>

        <div class="main-header__menu-box">

            <?php  if ( !empty($cs_mob_menu_title) ) {  ?>
                <div class="main-header__mob_menu_title">
                    <?php  echo wp_kses($cs_mob_menu_title, 'post'); ?>
                </div>
            <?php  } ?>

            <?php
            wp_nav_menu( [
                'container'       => 'nav',
                'container_class' => 'menu-home-page-container',
                'menu_class'      => 'main-menu main-menu--inline',
                'menu'            => $menus,
            ] );
            ?>

            <div class="main-header__widget-box-mobile">

                <?php if ( $search ) : ?>

                    <a class="main-header__widget-box--search search-btn js-open-search" href="#">
                        <i class="icon ion-ios-search" aria-hidden="true"></i>
                    </a>

                <?php endif; ?>

                <?php if ( $cs_main_mob_add_button ) { ?>
                    <?php echo Helper::get_button($this, $atts, 'cs_main_mob_'); ?>
                <?php } ?>
            </div>
        </div>

        <div class="main-header__widget-box">

            <div class="main-header__widget-box-desktop">
                <?php if ( $search ) : ?>

                    <a class="main-header__widget-box--search search-btn js-open-search" href="#">
                        <i class="icon ion-ios-search" aria-hidden="true"></i>
                    </a>

                <?php endif; ?>

                <?php
                if ( $cs_main_add_button ) { ?>
                    <div class="aheto-btn--nonscrolled">
                        <?php echo Helper::get_button($this, $atts, 'cs_main_'); ?>
                    </div>
                <?php  }

                if ( $cs_scroll_main_add_button ) {  ?>
                <div class="aheto-btn--scrolled">
                 <?php   echo Helper::get_button( $this, $atts, 'cs_scroll_main_' ); ?>
                </div>
              <?php  } ?>


            </div>

            <button class="hamburger main-header__hamburger js-toggle-mobile-menu" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>

    </div>
</div>