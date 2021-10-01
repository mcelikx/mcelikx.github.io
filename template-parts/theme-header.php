<div class="rela-preloader"></div>

<div class="rela-main-wrapper">
    <header class="rela-header--wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- HEADER -->
                    <div class="rela-header">

                        <!-- NAVIGATION -->
                        <nav id="topmenu" class="rela-header--topmenu">

                            <div class="rela-header--logo-wrap">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="rela-header--logo">
                                    <span><?php echo get_option( 'blogname' ); ?></span>
                                </a>
                            </div>

                            <div class="rela-header--menu-wrapper">
								<?php if ( has_nav_menu( 'primary-menu' ) ) {

									$args                   = array( 'container' => '' );
									$args['theme_location'] = 'primary-menu';
									wp_nav_menu( $args );

								} else {

									echo '<span class="no-menu primary-no-menu">' . esc_html__( 'Please register Top Navigation from', 'rela' ) . ' <a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" target="_blank">' . esc_html__( 'Appearance &gt; Menus', 'rela' ) . '</a></span>';

								} ?>

                            </div>

                            <!-- SEARCH -->
                            <div class="rela-header--search-wrap">
								<?php do_action( 'rela_search' ); ?>
                            </div>

                            <!-- MOB MENU ICON -->
                            <div class="rela-header--mob-nav">
                                <a href="#" class="rela-header--mob-nav__hamburger">
                                    <span></span>
                                </a>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </header>

