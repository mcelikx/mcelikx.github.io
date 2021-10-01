<?php
/**
 * The Banner Slider Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

use Aheto\Helper;

extract($atts);

$banners = $this->parse_group($rela_creative_banners);

if ( empty($banners) ) {
	return '';
}

if ( !$cs_swiper_custom_options ) {
	$speed  = 1000;
	$effect = 'fade';
	$loop   = false;
}

$this->generate_css();
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());
$this->add_render_attribute('wrapper', 'class', 'aheto-banner-slider--rela-creative');

/**
 * Set carousel params
 */
$carousel_default_params = [
	'speed' => 1000,
]; // will use when not chosen option 'Change slider params'

$carousel_params = Helper::get_carousel_params($atts, 'cs_swiper_creative_', $carousel_default_params);

/**
 * Set dependent style
 */
$sc_dir = RELA_T_URI . '/aheto/banner-slider/';
wp_enqueue_style('rela-banner-slider-creative', $sc_dir . 'assets/css/cs_layout2.css', null, null);

?>
<div <?php $this->render_attribute_string('wrapper'); ?>>
	<div class="swiper">
		<div class="swiper-container" data-pagination-type="fraction" <?php echo esc_attr($carousel_params); ?>>
			<div class="swiper-wrapper swiper-pagination--numeric">
				<?php foreach ( $banners as $banner ) :
					$banner = wp_parse_args($banner, [
						'cs_image'         => ''
					]);
					extract($banner);

					if ( !$cs_image ) {
						continue;
					}
                    $swiper_lazy_class = $cs_swiper_lazy ? ' swiper-lazy' : '';
                    $background_image = Helper::get_background_attachment($cs_image,'full', $atts,'', $cs_swiper_lazy);
					?>
					<div class="swiper-slide">
						<div class="aheto-banner-slider-wrap <?php echo esc_attr($align . $swiper_lazy_class); ?>" <?php echo esc_attr($background_image); ?>>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
            <?php $this->swiper_pagination('cs_swiper_creative_'); ?>
		</div>
		<?php $this->swiper_arrow('cs_swiper_creative_'); ?>
	</div>
</div>
