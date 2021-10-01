<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rela
 */

if ( ! is_active_sidebar( 'rela-sidebar' ) ) {
	return;
}
?>

<div class="col-12 col-lg-4">
    <div class="rela-blog--sidebar">
		<?php dynamic_sidebar( 'rela-sidebar' ); ?>
    </div>
</div>

