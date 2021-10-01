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

$banners = $this->parse_group($rela_modern_banners);

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
$this->add_render_attribute('wrapper', 'class', 'aheto-banner-slider--rela-modern');

/**
 * Set carousel params
 */
$carousel_default_params = [
	'speed' => 1000,
];

$carousel_params = Helper::get_carousel_params($atts, 'cs_swiper_', $carousel_default_params);

/**
 * Set dependent style
 */
$sc_dir = RELA_T_URI . '/aheto/banner-slider/';
wp_enqueue_style('rela-banner-slider-modern', $sc_dir . 'assets/css/cs_layout1.css', null, null);
wp_enqueue_script( 'rela-banner-slider-modern-js', $sc_dir . 'assets/js/cs_layout1.min.js', array( 'jquery' ), null );

?>
<div <?php $this->render_attribute_string('wrapper'); ?>>
	<div class="swiper">
		<div class="swiper-container" <?php echo esc_attr($carousel_params); ?>>
			<div class="swiper-wrapper">
				<?php foreach ( $banners as $banner ) :
					$banner = wp_parse_args($banner, [
						'cs_image'         => '',
						'cs_add_image'         => '',
						'cs_title'         => '',
						'cs_desc'          => '',
						'cs_align'         => '',
						'btn_direction' => ''
					]);
					extract($banner);

					if ( !$cs_image ) {
						continue;
					}
                    $swiper_lazy_class = $cs_swiper_lazy ? ' swiper-lazy' : '';
					$background_image = Helper::get_background_attachment($cs_image,'full', $atts,'', $cs_swiper_lazy);
                    ?>
					<div class="swiper-slide">
                        <div class="swiper-slide-overlay"></div>
						<div class="aheto-banner-slider-wrap cs-full-min-height-js <?php echo esc_attr($cs_align . $swiper_lazy_class); ?>" <?php echo esc_attr($background_image); ?>>
							<div class="aheto-banner-slider__content">
								<?php if ( !empty($cs_add_image) ) { ?>
									<?php echo Helper::get_attachment( $cs_add_image,  ['class' => 'aheto-banner-slider__add-image'], $cs_add_image_size, $atts, 'cs_add_' ); ?>
								<?php }

								if ( !empty( $cs_title )) { ?>
									<h2 class="aheto-banner__title"><?php echo wp_kses($cs_title, 'post'); ?></h2>
								<?php }

								if ( !empty( $cs_desc )) { ?>
									<p class="aheto-banner-slider__desc"><?php echo wp_kses($cs_desc, 'post'); ?></p>
								<?php }

								if ( $cs_main_add_button || $cs_add_add_button ) { ?>
									<div class="aheto-banner-slider__links">
										<?php
										echo Helper::get_button($this, $banner, 'cs_main_');

                                        if($cs_btn_direction){ ?>
                                            <br>
                                        <?php }

										echo Helper::get_button($this, $banner, 'cs_add_'); ?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<?php $this->swiper_pagination('cs_swiper_'); ?>
		</div>
        <?php $this->swiper_arrow('cs_swiper_'); ?>
	</div>
</div>

