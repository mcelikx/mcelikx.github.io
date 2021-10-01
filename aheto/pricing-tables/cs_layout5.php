<?php
/**
 * The Pricing Tables Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

use Aheto\Helper;

extract( $atts );

wp_enqueue_script('isotope');

$this->generate_css();

$cs_active = isset($cs_active) && cs_active ? 'active' : '';

// Wrapper.
$this->add_render_attribute( 'wrapper', 'id', $element_id );
$this->add_render_attribute( 'wrapper', 'class', 'aheto-pricing aheto-pricing--rela-isotope' );
$this->add_render_attribute( 'wrapper', 'class', $this->the_custom_classes() );
$this->add_render_attribute( 'wrapper', 'class', $cs_active );

/**
 * Set dependent style
 */
$sc_dir = RELA_T_URI . '/aheto/pricing-tables/';
wp_enqueue_style('rela-pricing-tables-isotope', $sc_dir . 'assets/css/cs_layout5.css', null, null);
wp_enqueue_script( 'rela-pricing-tables-isotope-js', $sc_dir . 'assets/js/cs_layout5.js', array( 'jquery' ), null );

?>

<div <?php $this->render_attribute_string( 'wrapper' ); ?>>
    <div class="aheto-pricing__head">
        <ul class="aheto-pricing__list ">

            <?php

            $all_filters = array();

            foreach ( $cs_pricings as $index => $item ) :

            $item['cs_pricings_heading'] = !empty($item['cs_pricings_heading']) ? $item['cs_pricings_heading'] : '';

                $filter_heading = str_replace( ' ', '_', $item['cs_pricings_heading'] );
                $filter_heading = strtolower($filter_heading);

            if (!in_array($item['cs_pricings_heading'], $all_filters)) {

                $all_filters[] = $item['cs_pricings_heading'];

                $heading_tag = isset( $item['heading_tag'] ) && !empty( $item['heading_tag'] ) ? $item['heading_tag'] : 'h1';
                $active = $index > 0 ? '' : 'active'; ?>

                <li class="aheto-pricing__list-item <?php echo esc_attr( $active ); ?>">

                    <a href="#" data-pricing-filter="<?php echo esc_html( $filter_heading ); ?>" class="aheto-pricing__list-link js-tab-list">
                        <?php if ( !empty( $item['cs_pricings_heading'] )) :

                            echo esc_html( $item['cs_pricings_heading'] );

                        endif; ?>
                    </a>
                </li>
                <?php
            }
            endforeach; ?>

        </ul>
    </div>


    <div class="aheto-pricing__content">
        <?php foreach ( $cs_pricings as $index => $item ) :

            $filter_heading = str_replace( ' ', '_', $item['cs_pricings_heading'] );
            $filter_heading = strtolower($filter_heading);

            $is_label = !empty($item['cs_pricings_label']) && isset($item['cs_pricings_label']) ? 'is-label' : '';
            ?>

            <div class="aheto-pricing__box js-isotope-box <?php echo esc_attr( $filter_heading ); ?> <?php echo esc_attr( $is_label ); ?>">
                <div class="aheto-pricing__box-inner">
                    <div class="aheto-pricing__box-header">
                        <?php if ( !empty($item['cs_pricings_title'] ) ) : ?>
                            <h5 class="aheto-pricing__box-title">
                                <?php echo wp_kses( $item['cs_pricings_title'], 'post' ); ?>

                                <span>
                                    <?php
                                        if(!empty($item['cs_pricings_label'])) {
                                            echo wp_kses( $item['cs_pricings_label'],'post' );
                                        }
                                    ?>
                                </span>

                            </h5>
                        <?php endif; ?>
                        <?php if ( !empty($item['cs_pricings_price'] ) ): ?>
                            <h5 class="aheto-pricing__box-price">
                                <?php echo wp_kses( $item['cs_pricings_price'],'post' ); ?>
                            </h5>
                        <?php endif; ?>
                    </div>
                    <div class="aheto-pricing__box-content">
                        <?php if ( !empty($item['cs_pricings_descr'] ) ): ?>
                            <p class="aheto-pricing__box-descr">
                                <?php echo wp_kses( $item['cs_pricings_descr'],'post' ); ?>
                            </p>
                        <?php endif; ?>

                    </div>

                </div>
            </div>

        <?php endforeach; ?>

    </div>


</div>
