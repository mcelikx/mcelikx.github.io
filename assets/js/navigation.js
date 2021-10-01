/**
 * Header menu
 */
;(function ($, window, document, undefined) {
    'use strict';


    /*=================================*/
    /* MOBILE MENU */
    /*=================================*/

    $('.rela-header--mob-nav__hamburger').on('click', function (e) {
        e.preventDefault();

        $(this).toggleClass('active');

        if ($(this).hasClass('active')) {
            $('html').addClass('no-scroll').height(window.innerHeight + 'px');
        } else {
            $('html').removeClass('no-scroll').height('auto');
        }

        $('.rela-header--menu-wrapper').slideToggle(250);

    });

    function resizeMenu() {
        if ($(window).width() > 1199 && $('html').hasClass('no-scroll')) {
            $('html').removeClass('no-scroll').height('auto');
            $('.rela-header--menu-wrapper').slideToggle(0);
            $('.rela-header--mob-nav__hamburger').toggleClass('active');
        } else {

            var adminBar = 0;

            if ($('#wpadminbar').length) {
                adminBar = $(window).width() && $('#wpadminbar').length > 782 ? 32 : 46;
            }

            var menuHeight = $(window).height() - $('.rela-header--wrap').height() - adminBar;

            $('.rela-header--menu-wrapper').outerHeight(menuHeight);
        }
    }


    $(window).on('load resize orientationchange', function () {
        resizeMenu();
    })

})(jQuery, window, document);
