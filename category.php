<?php
/**
 * Category Template
 */
$count = isset( $posts->found_posts ) && ! empty( $posts->found_posts ) ? $posts->found_posts : '0';
$count_text = $count == '1' ? esc_html__( 'result found', 'rela' ) : esc_html__( 'results found', 'rela' );

$rela_img = '';
$rela_background_image = '';

if (function_exists('aheto')) {
    $rela_shop_image = Aheto\Helper::get_settings('theme-options.rela_blog_image');
    $rela_background_image = isset($rela_shop_image) && !empty($rela_shop_image) ? "style=background-image:url(" . $rela_shop_image . ")" : '';
    $rela_img = isset($rela_shop_image) && !empty($rela_shop_image) ? 'with-image' : '';
}

get_header(); ?>
    <div class="rela-blog--banner <?php echo esc_attr($rela_img); ?>" <?php echo esc_attr($rela_background_image); ?>>
		<?php if ( is_search() ) { ?>
            <div class="rela-blog--banner__title-wrap">
                <h1 class="rela-blog--banner__title"><?php esc_html_e( 'Showing results for ', 'rela' ); ?>
                    <span>"<?php echo esc_html( $term ); ?>"</span></h1>
                <div class="rela-blog--banner__count-results"><?php echo esc_html( $count . ' ' . $count_text ); ?></div>
            </div>
		<?php } else { ?>
            <div class="rela-blog--banner__title-wrap">
                <h1 class="rela-blog--banner__title"><?php esc_html_e( 'Blog', 'rela' ); ?></h1>
            </div>
		<?php } ?>
    </div>

<?php

if ( have_posts() ) :
	get_template_part( 'template-parts/blog', 'list-category' );
	wp_enqueue_style( 'rela-blog-list', RELA_T_URI . '/assets/css/blog/blog-list.css' );

else : ?>
    <div class="rela-blog--search-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="rela-blog--search-page__title"><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'rela' ); ?></h3>
                    <div class="rela-blog--search-page__search-form">
						<?php get_search_form( true ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif;

get_footer();