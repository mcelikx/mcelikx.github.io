<?php
/**
 * The Pricing Tables Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

extract( $atts );
$this->generate_css();

//Active
$cs_active = $cs_active ? 'aheto-pricing__active' : '';

// Wrapper.
$this->add_render_attribute( 'wrapper', 'id', $element_id );
$this->add_render_attribute( 'wrapper', 'class', 'aheto-pricing aheto-pricing--rela-minimal' );
$this->add_render_attribute( 'wrapper', 'class', $cs_active );
$this->add_render_attribute( 'wrapper', 'class', $this->the_custom_classes() );


// Button Link.
$link = $this->get_button_attributes( 'link' );

/**
 * Set dependent style
 */
$sc_dir = RELA_T_URI . '/aheto/pricing-tables/';
wp_enqueue_style('rela-pricing-tables-minimal', $sc_dir . 'assets/css/cs_layout3.css', null, null);

?>
<div <?php $this->render_attribute_string( 'wrapper' ); ?>>

    <?php foreach ( $cs_min_price as $item ) { ?>
<div class="aheto-pricing__item">
        <div class="aheto-pricing__main">
            <?php
            if ( !empty( $item['cs_time'] )) {
                echo '<h5 class="aheto-pricing__time">' . wp_kses( $item['cs_time'],'post') . '</h5>';
            }
            if ( !empty( $item['cs_special'] )) {
                echo '<p class="aheto-pricing__special">' . wp_kses( $item['cs_special'],'post' ) . '</p>';
            }
            ?>
        </div>
        <div class="aheto-pricing__cost">
            <?php
            if ( !empty( $item['cs_price'] )) {
                echo '<h5 class="aheto-pricing__cost-value">' . esc_html( $item['cs_price'] ) . '</h5>';
            }
            ?>
        </div>
</div>
    <?php } ?>
</div>
