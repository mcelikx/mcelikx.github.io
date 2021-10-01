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
$this->add_render_attribute( 'wrapper', 'class', 'aheto-pricing aheto-pricing--rela-side' );
$this->add_render_attribute( 'wrapper', 'class', $cs_active );
$this->add_render_attribute( 'wrapper', 'class', $this->the_custom_classes() );

// Button Link.
$link = $this->get_button_attributes( 'link' );

/**
 * Set dependent style
 */
$sc_dir = RELA_T_URI . '/aheto/pricing-tables/';
wp_enqueue_style('rela-pricing-tables-side', $sc_dir . 'assets/css/cs_layout6.css', null, null);

?>
<div <?php $this->render_attribute_string( 'wrapper' ); ?>>

    <div class="aheto-pricing__header">

        <?php
        // Heading.
        if ( !empty( $cs_heading )) {
            echo '<h4 class="aheto-pricing__title">' . wp_kses( $cs_heading,'post' ) . '</h4>';
        }
        ?>

        <div class="aheto-pricing__cost">
            <?php
            // Price.
            if ( !empty( $price )) {
                echo '<h5 class="aheto-pricing__cost-value">' . esc_html( $price ) . '</h5>';
            }

            if ( !empty( $description )) {
                echo '<h5 class="aheto-pricing__cost-time">' . '/' . wp_kses( $description,'post' ) . '</h5>';
            }
            ?>
        </div>
    </div>


    <div class="aheto-pricing__content">

        <?php
        $cs_features = $this->parse_group( $cs_features );
        if ( $cs_features ) { ?>

            <div class="aheto-pricing__list">

                <?php foreach ( $cs_features as $item ) { ?>
                    <div class="aheto-pricing__list-item-wrap">
                        <div class="aheto-pricing__list-item <?php echo esc_html( $item['cs_mark'] ); ?>"><?php echo wp_kses( $item['cs_feature'],'post' ); ?></div>
                        <?php if ( !empty( $item['cs_resp_descr'] )) {
                            echo '<p class="aheto-pricing__resp-descr">' . esc_html( $item['cs_resp_descr'] ) . '</p>';
                        } ?>
                    </div>
                <?php } ?>

            </div>
        <?php }

        // Button Link.
        if ( $cs_side_add_button ) { ?>
            <div class="aheto-pricing__link">
                <?php echo \Aheto\Helper::get_button($this, $atts, 'cs_side_'); ?>
            </div>
        <?php }
        ?>

    </div>

</div>
