<?php
/**
 * The Acacia Media Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

use Aheto\Helper;

extract($atts);

if ( empty($cs_image) ) {
	return '';
}

$this->generate_css();

// Wrapper.
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute( 'wrapper', 'class', 'aheto_media aheto_media--rela' );
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());

/**
 * Set dependent style
 */
$sc_dir = RELA_T_URI . '/aheto/media/';
wp_enqueue_style( 'rela-media-simple-gallery-style', $sc_dir . 'assets/css/cs_layout1.css', null, null );
wp_enqueue_script( 'rela-media-simple-gallery-scripts', $sc_dir . 'assets/js/cs_layout1.js', array( 'jquery' ), null );


?>
<div <?php $this->render_attribute_string('wrapper'); ?>>

    <div class="aheto-single-gallery-img">
		<?php echo Helper::get_attachment($cs_image, ['class' => 'js-bg'], $cs_image_size, $atts, 'cs_'); ?>
    </div>
    <div class="aheto-single-gallery-popup">
        <div class="aheto-single-gallery-popup_overlay"></div>
        <img src="#" alt="active image">
        <span class='close'>&times;</span>
    </div>

</div>
