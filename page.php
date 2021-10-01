<?php
/**
 * Custom Page Template
 */

get_header();

$protected = '';

if (post_password_required()) {
    $protected = 'protected-page';
}

while (have_posts()) : the_post();

    wp_enqueue_style('rela-blog-single', RELA_T_URI . '/assets/css/blog/blog-single.css'); ?>

    <div class="rela-blog--single-wrapper <?php echo esc_attr($protected); ?>">
        <?php if (function_exists('is_woocommerce') && (is_cart() || is_checkout() || is_account_page())) {

            $rela_img = '';
            $rela_background_image = '';

            if (function_exists('aheto')) {
                $rela_shop_image = Aheto\Helper::get_settings('theme-options.rela_shop_image');
                $rela_background_image = isset($rela_shop_image) && !empty($rela_shop_image) ? "style=background-image:url(" . $rela_shop_image . ")" : '';
                $rela_img = isset($rela_shop_image) && !empty($rela_shop_image) ? 'with-image' : '';
            } ?>

            <div class="rela-shop-banner <?php echo esc_attr($rela_img); ?> " <?php echo esc_attr($rela_background_image); ?>>
                <h1 class="title"><?php the_title(); ?></h1>
            </div>

        <?php } else { ?>
            <div class="rela-blog--single__top-content">

                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <?php the_title('<h1 class="rela-blog--single__title text-center">', '</h1>'); ?>

                        </div>
                    </div>
                </div>

            </div>
        <?php } ?>
        <div class="container rela-blog--single__post-content">
            <div class="row">
                <div class="col-12">

                    <div class="rela-blog--single__content-wrapper page">

                        <?php the_content();
                        wp_link_pages('link_before=<span class="rela-blog--single__pages">&link_after=</span>&before=<div class="rela-blog--single__post-nav"> <span>' . esc_html__("Page:", 'rela') . ' </span> &after=</div>'); ?>

                    </div>

                    <?php if (comments_open() || '0' != get_comments_number() && wp_count_comments($get_id)) { ?>
                        <div class="rela-blog--single__comments page">
                            <?php comments_template('', true); ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>


<?php
endwhile;

get_footer();
