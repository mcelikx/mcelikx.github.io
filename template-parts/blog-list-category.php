<?php
//BLOG LIST CATEGORY

global $wp_query;

$active_plugin = class_exists( 'aheto/class-aheto.php');
$content_size_class =  is_active_sidebar( 'rela-sidebar' ) && !$active_plugin ? 'col-12 col-lg-8' : 'col-12';
$post_size_class    = is_active_sidebar( 'rela-sidebar' ) && !$active_plugin ? 6 : 4; ?>

<div class="rela-blog--wrapper">
    <div class="container">
        <div class="row">
            <div class="rela-blog--posts <?php echo esc_attr( $content_size_class ); ?>">
                <div class="rela-blog--isotope row">
	                <?php while ( have_posts() ) :
		                the_post();

						$post_id = get_the_ID();
						$no_image     = !has_post_thumbnail() ? ' no-image' : '';
						$image_id = get_post_thumbnail_id($post_id);
		                $author_id =  get_the_author_meta('ID');
                        $format = get_post_format( $post_id ) ? get_post_format( $post_id ) : 'image'; ?>

                        <div <?php post_class( 'rela-blog--post col-xs-12 col-sm-6 col-lg-' . esc_attr( $post_size_class . ' rela--post-format-' . $format) ); ?>>
                            <div class="rela-blog--post__item">
		                        <?php if ( !empty($image_id) ) {
			                        $image = wp_get_attachment_image_url($image_id, 'large');
			                        $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); ?>
                                    <div class="rela-blog--post__media">
                                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="js-bg">
                                    </div>
		                        <?php } ?>

                                <div class="rela-blog--post__info-wrap">
                                    <div class="rela-blog--post__info-wrap-date">
                                        <a href="<?php the_permalink(); ?>">
                                            <i class="ion-clock"></i>
					                        <?php the_time( get_option( 'date_format' ) ); ?>
                                        </a>
                                    </div>
                                    <a href="<?php the_permalink(); ?>"
                                       class="rela-blog--post__title"><?php the_title(); ?></a>
                                    <div class="rela-blog--post__text"><?php the_excerpt(); ?></div>
                                    <div class="rela-blog--post__author">

				                        <?php echo get_avatar($author_id, 30);
				                        esc_html_e('by ', 'rela');
				                        echo esc_html(get_the_author()); ?>
                                    </div>


                                </div>
                            </div>
                        </div>

					<?php endwhile;
					wp_reset_postdata(); ?>

                </div>
				<?php if( $wp_query->max_num_pages > 1 ){ ?>
                    <div class="rela-blog--pagination">
	                    <?php echo paginate_links(
		                    array(
			                    'prev_text'    => __('Previous', 'rela'),
			                    'next_text'    => __('Next', 'rela'),
			                    'total'     => $wp_query->max_num_pages
		                    )
	                    ); ?>
                    </div>
				<?php } ?>
            </div>
			<?php if ( is_active_sidebar( 'rela-sidebar' ) && !$active_plugin  ) {

				wp_enqueue_style( 'rela-sidebar', RELA_T_URI . '/assets/css/blog/sidebar.css' );

				get_sidebar( 'rela-sidebar' );

			} ?>
        </div>
    </div>
</div>