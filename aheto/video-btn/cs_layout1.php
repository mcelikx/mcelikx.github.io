<?php
/**
 * The Button Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

use Aheto\Helper;

extract($atts);
$this->generate_css();

// Wrapper.
$this->add_render_attribute('wrapper', 'id', $this->atts['element_id']);
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());
$this->add_render_attribute('wrapper', 'class', 'aheto_video-btn---rela');

/**
 * Set dependent style
 */
$sc_dir = RELA_T_URI . '/aheto/video-btn/';
wp_enqueue_style('rela-video-btn', $sc_dir . 'assets/css/cs_layout1.css', null, null);


?>

<div <?php $this->render_attribute_string('wrapper'); ?>>
    <div class="aheto-video-container <?php echo esc_attr($this->atts['align']); ?>">
        <?php if (!empty($cs_text)) {
            echo '<h2 class="aheto-btn-video__text">' . wp_kses($cs_text,'post') . '</h2>';
        } ?>
        <?php echo Helper::get_video_button($atts); ?>
    </div>
</div>
