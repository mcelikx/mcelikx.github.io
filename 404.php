<?php
/**
 * 404 Page
 */

get_header(); ?>

    <div class="rela-error--wrap">

        <div class="rela-error--big-title"><?php esc_html_e( 'OOPS!', 'rela' ); ?></div>

        <div class="rela-error--small-title"><?php esc_html_e( '404', 'rela' ); ?></div>

        <h1 class="rela-error--title"><?php esc_html_e( 'Page not found', 'rela' ); ?></h1>

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="rela-error--button"><?php esc_html_e( 'Go home', 'rela' ); ?></a>

    </div>

<?php get_footer();
