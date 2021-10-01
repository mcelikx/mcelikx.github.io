<?php
/**
 * The Features Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

extract($atts);

use Aheto\Helper;

$this->generate_css();

// Wrapper.
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute('wrapper', 'class', 'widget widget_aheto');
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());

// Block Wrapper.
$this->add_render_attribute('block_wrapper', 'class', 'aheto-features--rela-packages');

// Button.
$button = $this->get_button_attributes('link');

/**
 * Set dependent style
 */
$sc_dir = RELA_T_URI . '/aheto/features-single/';
wp_enqueue_style('rela-features-single-packages', $sc_dir . 'assets/css/cs_layout4.css', null, null);
wp_enqueue_script( 'rela-features-single-packages-js', $sc_dir . 'assets/js/cs_layout4.min.js', array( 'jquery' ), null );


?>
<div <?php $this->render_attribute_string('wrapper'); ?>>

	<div <?php $this->render_attribute_string('block_wrapper'); ?>>
		<div class="aheto-features-block__wrap">
			<?php if ( $s_image ) : ?>
            <div class="aheto-features-block__image-wrap">

                <?php
                $background_image = Helper::get_background_attachment($s_image, $cs_image_size, $atts, 'cs_');
                ?>
                <div class="aheto-features-block__image" <?php echo esc_attr($background_image); ?>>

                    <?php if ( !empty( $cs_price )) : ?>
                    <div class="aheto-features-block__overlay">
                        <h2 class="aheto-features-block__price"><?php echo esc_html($cs_price); ?></h2>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
			<?php endif; ?>

			<?php if ( !empty( $s_heading )) : ?>
                <?php $highlight_heading = $this->highlight_text($s_heading) ?>
				<h4 class="aheto-features-block__title"><?php echo wp_kses($highlight_heading,'post'); ?></h4>
			<?php endif; ?>

				<?php if ( !empty( $s_description )) : ?>
					<p class="aheto-features-block__description ">
						<?php echo wp_kses($s_description,'post'); ?>
					</p>
				<?php endif;

                if ( $cs_add_button ) { ?>
                    <div class="aheto-features-block__link">
                        <?php echo \Aheto\Helper::get_button($this, $atts, 'cs_'); ?>
                    </div>
                <?php }

                if ( isset($button['href']) && !empty($button['href']) ) :
                    $this->add_render_attribute('button', $button);
                    $this->add_render_attribute('button', 'class', 'aheto-link aheto-btn--primary');
                    ?>
                    <div class="aheto-btn-container">
                        <a <?php $this->render_attribute_string('button'); ?>><?php echo esc_html($button['title']); ?></a>
                    </div>
                <?php endif;
                ?>

		</div>

	</div>

</div>
