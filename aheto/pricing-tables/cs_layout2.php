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
$this->add_render_attribute( 'wrapper', 'class', 'aheto-pricing aheto-pricing--rela-short' );
$this->add_render_attribute( 'wrapper', 'class', $cs_active );
$this->add_render_attribute( 'wrapper', 'class', $this->the_custom_classes() );



// Button Link.
$link = $this->get_button_attributes( 'link' );

/**
 * Set dependent style
 */
$sc_dir = RELA_T_URI . '/aheto/pricing-tables/';
wp_enqueue_style('rela-pricing-tables-short', $sc_dir . 'assets/css/cs_layout2.css', null, null);

?>
<div <?php $this->render_attribute_string( 'wrapper' ); ?>>

	<div class="aheto-pricing__header">
		<?php
		if ( !empty( $cs_heading )) {
			echo '<h2 class="aheto-pricing__title">' . wp_kses( $cs_heading,'post' ) . '</h2>';
		}
		?>
		<div class="aheto-pricing__cost">
			<?php
            if ( !empty( $description )) {
                echo '<h4 class="aheto-pricing__description">' . wp_kses( $description,'post' ) . '</h4>';
            }
			if ( !empty( $price )) {
				echo '<h5 class="aheto-pricing__cost-value">' . esc_html( $price ) . '</h5>';
			}
			?>
		</div>
	</div>
</div>
