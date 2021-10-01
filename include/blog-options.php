<?php
/**
 * General settings.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto
 * @author     UPQODE <info@upqode.com>
 */


$cmb->add_field([
	'id'      => 'rela_blog_image',
	'type'    => 'file',
	'name'    => __( '<i class="fas fa-image green-color"></i> <span>Banner image</span>', 'aheto' ),
	'desc'    => esc_html__( 'This options only for blog page', 'aheto' ),
]);