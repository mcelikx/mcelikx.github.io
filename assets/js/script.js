;(function ($, window, document, undefined) {
    'use strict';

    if (typeof fitVids === 'function') {
        $('body').fitVids({ignore: '.vimeo-video, .youtube-simple-wrap iframe, .iframe-video.for-btn iframe, .post-media.video-container iframe'});
    }
    /*=================================*/
    /* PAGE CALCULATIONS */
    /*=================================*/
    /**
     *
     * PageCalculations function
     * @since 1.0.0
     * @version 1.0.0
     * @var winW
     * @var winH
     * @var winS
     * @var pageCalculations
     * @var onEvent
     **/
    if (typeof pageCalculations !== 'function') {

        var winW, winH, pageCalculations, onEvent = window.addEventListener;

        pageCalculations = function (func) {

            winW = window.innerWidth;
            winH = window.innerHeight;

            if (!func) return;

            onEvent('load', func, true); // window onload
            onEvent('resize', func, true); // window resize
            onEvent("orientationchange", func, false); // window orientationchange

        }; // end pageCalculations

        pageCalculations(function () {
            pageCalculations();
        });
    }





    $(window).on('load', function () {
        if ($('.rela-preloader').length) {
            $('.rela-preloader').fadeOut(400);
        }

        wpc_add_img_bg('.js-bg');
    });

    function calcPaddingMainWrapper() {

        if($('.rela-footer').length){
            var footer = $('.rela-footer');
            var paddValue = footer.outerHeight();

            footer.bind('heightChange', function () {
                $('body').css('padding-bottom', paddValue);

            });

            footer.trigger('heightChange');
        }
    }


    function blogIsotope() {
        if ($('.rela-blog--isotope').length) {
            $('.rela-blog--isotope').each(function () {
                var self = $(this);
                self.isotope({
                    itemSelector: '.rela-blog--post',
                    layoutMode: 'masonry',
                    masonry: {
                        columnWidth: '.rela-blog--post'
                    }
                });
            });
        }
    }


    function wpc_add_img_bg(img_sel, parent_sel) {
        if (!img_sel) {
            return false;
        }

        var $parent, $imgDataHidden, _this;
        $(img_sel).each(function () {
            _this = $(this);
            $imgDataHidden = _this.data('s-hidden');
            $parent = _this.closest(parent_sel);
            $parent = $parent.length ? $parent : _this.parent();
            $parent.css('background-image', 'url(' + this.src + ')').addClass('s-back-switch');
            if ($imgDataHidden) {
                _this.css('visibility', 'hidden');
                _this.show();
            }
            else {
                _this.hide();
            }
        });
    }

    function adminBarPositionFix(){
        if($('#wpadminbar').length){
            $('#wpadminbar').css('position', 'fixed');
        }
    }

    function errorPageHeight(){
        if($('.rela-error--wrap').length){
            var footerH = $('.rela-footer').length ? $('.rela-footer').outerHeight() : 0,
                headerH = $('.rela-header--wrap').length ? $('.rela-header--wrap').outerHeight() : 0,
                errorH = $(window).height() - footerH - headerH;

            $('.rela-error--wrap').outerHeight(errorH);
        }
    }


    $(window).on('load resize orientationchange', function () {
        calcPaddingMainWrapper();
        blogIsotope();
        adminBarPositionFix();
        errorPageHeight();
        accesibilityMenu();
    });



    function accesibilityMenu() {
        $('.menu-item-has-children a').focus( function () {
            $(this).siblings('.sub-menu').addClass('focused');
        }).blur(function(){
            $(this).siblings('.sub-menu').removeClass('focused');
        });

        // Sub Menu
        $('.sub-menu a').focus( function () {
            $(this).parents('.sub-menu').addClass('focused');
        }).blur(function(){
            $(this).parents('.sub-menu').removeClass('focused');
        });
    }

})(jQuery, window, document);