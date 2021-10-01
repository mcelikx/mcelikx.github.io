<?php
/**
 * The Heading Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

use Aheto\Helper;

extract( $atts );

$this->generate_css();


// Wrapper.
$this->add_render_attribute( 'wrapper', 'id', $element_id );
$this->add_render_attribute( 'wrapper', 'class', 'aheto-heading' );
$this->add_render_attribute( 'wrapper', 'class', 'aheto-heading--rela__simple' );
$this->add_render_attribute( 'wrapper', 'class', $alignment );
$this->add_render_attribute( 'wrapper', 'class', $this->the_custom_classes() );

/**
 * Set dependent style
 */
$sc_dir = RELA_T_URI . '/aheto/heading/';
wp_enqueue_style( 'rela-heading-simple', $sc_dir . 'assets/css/cs_layout1.css', null, null );

?>

<div <?php $this->render_attribute_string( 'wrapper' ); ?>>
    <?php
    // Heading.
    $heading = $this->get_heading();
    if ( !empty( $heading )) {
        echo '<' . $text_tag . ' class="aheto-heading__title">' . $this->highlight_text( $heading ) . '</' . $text_tag . '>';
    }

    if ( !empty( $description )) {
        echo '<p class="aheto-heading__desc">' . wp_kses( $description, 'post' ) . '</p>';
    }

    ?>

</div>
