<?php
/**
 * The List Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

extract($atts);

$lists = $this->parse_group($lists);
if ( empty($lists) ) {
	return '';
}

$this->generate_css();

// Wrapper.
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());
$this->add_render_attribute('wrapper', 'class', 'aheto-list aheto-list--rela');
$this->add_render_attribute('wrapper', 'class', 'aheto-list--bullets');

/**
 * Set dependent style
 */
$sc_dir = RELA_T_URI . '/aheto/list/';
wp_enqueue_style('rela-list', $sc_dir . 'assets/css/cs_layout1.css', null, null);


?>
<div <?php $this->render_attribute_string('wrapper'); ?>>
    <?php
        if ( !empty( $heading )) {
            echo '<' . $text_tag . ' class="aheto-list__title">' . wp_kses($heading, 'post') . '</' . $text_tag . '>';
        }
    ?>
	<ul>
		<?php
		foreach ( $lists as $item ) {
			echo '<li>' . wp_kses($item['list'], 'post') . '</li>';
		}
		?>
	</ul>

</div>
