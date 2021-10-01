<?php
/**
 * The Clients Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

use Aheto\Helper;

extract($atts);

$clients = $this->parse_group($clients);
if ( empty($clients) ) {
	return '';
}

$this->generate_css();

$item_per_row = isset($item_per_row) && !empty($item_per_row) ? $item_per_row : 2;

// Wrapper.
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute('wrapper', 'class', 'aheto-clients');
$this->add_render_attribute('wrapper', 'class', 'aheto-clients--rela');
$this->add_render_attribute('wrapper', 'class', 'aheto-clients--' . $item_per_row . '-in-row');
$this->add_render_attribute('wrapper', 'class', $cs_hover_style);
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());

/**
 * Set dependent style
 */
$sc_dir = RELA_T_URI . '/aheto/clients/';
wp_enqueue_style('rela-clients', $sc_dir . 'assets/css/cs_layout1.css', null, null);


?>
<div <?php $this->render_attribute_string('wrapper'); ?>>

	<?php foreach ( $clients as $item ) :
		if ( !empty($item['image']) ) :
			$button = $this->get_link_attributes($item['link_url']); ?>

			<div class="aheto-clients__holder">

				<?php
				if ( isset($button['href']) && !empty($button['href']) ) :?>
                    <a href="<?php echo esc_url($button['href']); ?>">
                        <?php echo Helper::get_attachment($item['image'], [], $cs_image_size, $atts, 'cs_'); ?>
                    </a>
				<?php else :
					echo Helper::get_attachment($item['image'], [], $cs_image_size, $atts, 'cs_');
				endif; ?>

			</div>

		<?php endif; ?>

	<?php endforeach; ?>

</div>
