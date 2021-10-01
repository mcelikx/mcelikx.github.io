<?php

$footer_text = get_bloginfo( 'name' ) . ' ' . esc_html__( ' &copy;', 'rela' ) . date( 'Y' );

?>

</div><!-- #content -->

<footer id="footer" class="rela-footer">
	<div class="rela-footer--copyright"><?php echo wp_kses($footer_text, 'post'); ?></div>
</footer>