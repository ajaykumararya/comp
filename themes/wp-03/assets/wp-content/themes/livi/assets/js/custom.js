jQuery.noConflict();
jQuery(document).ready(function($) {
    "use strict";

    // Keyboard navigation for primary navigation
    if ($("ul.wdt-primary-nav").length) {
        var $primaryNav = $("ul.wdt-primary-nav");

        $primaryNav.on('focus', 'a', function() {
            $(this).parent("li").addClass('focus');
        }).on('blur', 'a', function() {
            $(this).parent("li").removeClass('focus');
        });

        $primaryNav.on('focus', '.menu-item-has-children a', function() {
            $(this).closest(".menu-item-has-children").addClass('focus');
        }).on('blur', '.menu-item-has-children a', function() {
            $(this).closest(".menu-item-has-children").removeClass('focus');
        });
    }

    // Handle keyboard navigation
    $(document).on('keydown', function(event) {
        if (!$('body').hasClass('nav-is-visible')) return;

        var tabKey = event.keyCode === 9;
        var shiftKey = event.shiftKey;
        var escKey = event.keyCode === 27;

        if (escKey) {
            $('.mobile-menu-overlay').trigger('click');
        }

        var activeItem = $(':focus');
        if (activeItem.parent().hasClass('menu-item')) {
            var $menuItem = activeItem.parent('.menu-item');

            if (shiftKey && tabKey) {
                if ($menuItem.prev().hasClass('menu-item-has-children')) {
                    event.preventDefault();
                    $menuItem.prev().find('a:first').focus();
                }
            } else if (!shiftKey && tabKey) {
                if ($menuItem.next().hasClass('menu-item-has-children')) {
                    event.preventDefault();
                    $menuItem.next().find('a:first').focus();
                } else if ($menuItem.hasClass('menu-item-has-children')) {
                    event.preventDefault();
                    $menuItem.next().find('a:first').focus();
                } else if ($menuItem.is('.mobile-menu .menu-item:last') ||
                    $menuItem.is($menuItem.parent('.sub-menu').find('.menu-item:last'))) {
                    event.preventDefault();
                    $('.mobile-menu').find('.close-nav:first a').focus();
                }
            }
        } else if (shiftKey && tabKey && activeItem.parent('li').hasClass('close-nav')) {
            event.preventDefault();
            if (activeItem.closest('.sub-menu').length) {
                activeItem.closest('.sub-menu').find('.menu-item:last a').focus();
            } else {
                $('.mobile-menu .menu-item-depth-0:last a').focus();
            }
        }
    });

    // Set Header and Footer Heights
    function setElementHeight(selector, cssVar) {
        var $element = $(selector);
        if ($element.length) {
            var height = $element.height().toFixed(2);
            $('body').css(cssVar, height + 'px');
        }
    }

    let $sticky_header = $('.sticky-header');

    setElementHeight('body > .wrapper > .inner-wrapper > #header-wrapper > header', '--header-height');
    if ($sticky_header) {
        setElementHeight('body > .wrapper > .inner-wrapper > #header-wrapper > header .sticky-header', '--sticky-height');
    }
    setElementHeight('body.wdt-fixed-footer-enabled > .wrapper > .inner-wrapper > footer', '--footer-height');

    // Desktop Menu Animation
    $('.animate-menu-item').parents('.menu-item').find('a').hover(
        function() {
            var $menuItem = $(this).parents('.menu-item');
            var animationClass = $menuItem.find('.animate-menu-item').data('animation');
            $menuItem.find('.animate-menu-item').addClass(animationClass);
        },
        function() {
            var $menuItem = $(this).parents('.menu-item');
            var animationClass = $menuItem.find('.animate-menu-item').data('animation');
            $menuItem.find('.animate-menu-item').removeClass(animationClass);
        }
    );

    // Mobile Menu
    var clicked = "false";

    $('.menu-trigger').on('click', function(event) {
        event.preventDefault();
        if (clicked == "false") {

            $('html, body').css('overflow', 'hidden');
            clicked = "true";

            var menuItem = $(this).parents('.wdt-header-menu').find('.wdt-primary-nav:not(.wdt-secondary-nav)').clone();

            // Remove animation Class
            $('[data-animation]', menuItem).each(function(ix, ele) {
                $(ele).removeClass('animate-menu-item');
            });

            $('<div class="mobile-menu" />').appendTo($("body"));
            menuItem.appendTo('.mobile-menu');
            $('<div class="mobile-menu-overlay"></div>').appendTo($("body"));

            $('.mobile-menu').toggleClass('nav-is-visible');
            $('.mobile-menu-overlay').toggleClass('is-visible');
            $('body').toggleClass('nav-is-visible');

            $('.mobile-menu').find('.close-nav:first a').focus();

            // Initializing mobile nav
            initializeMobileNav();

        } else {
            closeMobNav();
        }
    });

    function closeMobNav() {

        var scrollPos = $(window).scrollTop();

        $('html, body').css('overflow', 'auto');

        clicked = "false";

        $('.mobile-menu, .mobile-menu-overlay').removeClass('is-visible');
        $('body').removeClass('nav-is-visible');

        $('.mobile-menu').remove();
        $('.mobile-menu-overlay').remove();

        $(window).scrollTop(scrollPos);

        // $('.menu-trigger').focus();
    }


    // FitVids for Video Posts

    function initializeMobileNav() {

        $('li.close-nav').on('click', function(event) {
            closeMobNav();
        });

        $('.mobile-menu-overlay').on('click', function(event) {
            closeMobNav();
        });

        // Sub Menu in Mobile Menu
        $('.menu-item-has-children > a, .page_item_has_children > a').on('click', function(event) {

            event.preventDefault();
            var $subMenu = $(this).next('ul.sub-menu');

            if ($subMenu.hasClass('is-hidden')) {
                $subMenu.removeClass('is-hidden');
            } else {
                $subMenu.addClass('is-hidden');
            }

            if (!$subMenu.hasClass('is-hidden')) {
                $subMenu.find('a:first').focus();
            }
        });

        // Go Back in Mobile Menu
        $('.go-back').on('click', function(event) {
            event.preventDefault();
            $(this).parent('ul:not(.menu)').addClass('is-hidden');
            $(this).parents('.menu-item').find('a:first').focus();
        });
    }


    $("div.wdt-video-wrap").fitVids();

    // Smart Resize
    $(window).on("resize", function() {
        if ($(".apply-isotope").length) {
            $(".apply-isotope").isotope({
                itemSelector: '.column',
                transformsEnabled: false,
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });
        }
    });

    $(window).on('load', function() {
        if ($("ul.entry-gallery-post-slider").length && $("ul.entry-gallery-post-slider li").length > 1) {
            $("ul.entry-gallery-post-slider").bxSlider({
                mode: 'fade',
                auto: false,
                video: true,
                pager: '',
                autoHover: true,
                adaptiveHeight: false,
                responsive: true
            });
        }

        if ($(".apply-isotope").length) {
            $(".apply-isotope").isotope({
                itemSelector: '.column',
                transformsEnabled: false,
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });
        }

        if ($('.tpl-blog-holder.apply-equal-height').length) {
            $(".tpl-blog-holder.apply-equal-height article").matchHeight({
                property: "min-height"
            });
        }
    });

    // Magnific Popup for Lightbox Images
    $('.single .entry-thumb.single-preview-img a.mag-pop, a.lightbox-preview-img').magnificPopup({
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true,
            titleSrc: function(item) {
                return item.el.attr('title') + ' &middot; <a class="image-source-link" href="' + item.el.attr('href') + '" target="_blank">image source</a>';
            }
        },
        zoom: {
            enabled: true,
            duration: 300,
            opener: function(element) {
                return element.find('img');
            }
        }
    });

    // Select2 Initialization
    $("select:not(.dt-select-service,.dt-select-staff,.start-time,.end-time,.wdt-sf-field)").select2();

    // Add spinner class to CF7 inputs
    $('form.wpcf7-form input').parent("p").addClass('with-spinner');
});

/* Live Search*/
jQuery('body').on('keypress', '.text_input', function(e) {
    if (jQuery('.text_input').is(":focus")) {

        var this_item = jQuery(this),
            search_val = this_item.val();
        if (search_val == "") {
            jQuery('.quick_search_results').html("");
            jQuery('.quick_search_results').removeClass('active');
        } else {
            jQuery.ajax({
                type: "POST",
                url: livi_urls.ajaxurl,
                data: {
                    action: 'livi_search_data_fetch',
                    search_val: search_val,
                    ajax_call: true,
                    function_call: 'livi_search_data_fetch',
                    security: ajax_object.ajax_nonce
                },
                success: function(data) {
                    jQuery('.quick_search_results').addClass('active');
                    jQuery('.quick_search_results').html(data);
                }
            });
        }
    }
});


// Header Menu Underline Style
(function($) {

    $navigation_item = $(".wdt-header-menu .menu-container .wdt-primary-nav"),
        $menu_items = $(".wdt-header-menu .menu-container .wdt-primary-nav > li"),
        $slideLine = $(".wdt-header-menu .menu-container .wdt-primary-nav ~ .slide-underline"),
        $currentItem = $(".wdt-header-menu .menu-container .wdt-primary-nav > li:is(.current-menu-item, .current-menu-ancestor, .current-page-ancestor)");

    $(function() {

        if ($currentItem[0]) {
            $slideLine.css({
                "width": $currentItem.width(),
                "left": $currentItem.position().left
            });
        };

        $($navigation_item).find($menu_items).hover(

            // Hover on
            function() {
                $slideLine.css({
                    "width": $(this).width(),
                    "left": $(this).position().left
                });
            },

            // Hover out
            function() {
                if ($currentItem[0]) {
                    $slideLine.css({
                        "width": $currentItem.width(),
                        "left": $currentItem.position().left
                    });
                } else {
                    $slideLine.width(0);
                };
            }
        );
    });

})(jQuery);



/**Image Animations for Both Image Img and Blogs Anchor*/

jQuery('.wdt-scaleout-hover').on('mouseenter', function() {
    var image = jQuery(this).find('img')[0];
    jQuery(image).css({
        transform: 'translate3d(0, 0, 0) scale(1.1)',
        transition: 'transform 0.3s ease',
    });

    jQuery(this).on('mousemove', function(e) {
        var rect = this.getBoundingClientRect();
        var relX = e.clientX - rect.left;
        var relY = e.clientY - rect.top;

        var moveX = ((rect.width / 2 - relX) / (rect.width / 2)) * 10;
        var moveY = ((rect.height / 2 - relY) / (rect.height / 2)) * 10;

        jQuery(image).css({
            transform: `translate3d(${moveX}px, ${moveY}px, 0) scale(1.1)`,
            transition: 'transform 0.1s ease-out',
        });
    });
});

jQuery('.wdt-scaleout-hover').on('mouseleave', function() {
    var image = jQuery(this).find('img')[0];

    jQuery(this).off('mousemove');

    jQuery(image).css({
        transform: 'translate3d(0, 0, 0) scale(1)',
        transition: 'transform 0.3s ease',
    });
});

//Image Animation for Blog's Anchor
jQuery('.wdt-scaleout-hover').on('mouseenter', '.blog-image a', function() {
    var $anchor = jQuery(this);
    $anchor.css({
        transform: 'translate3d(0, 0, 0) scale(1.1)',
        transition: 'transform 0.3s ease',
    });

    $anchor.on('mousemove', function(e) {
        var rect = this.getBoundingClientRect();
        var relX = e.clientX - rect.left;
        var relY = e.clientY - rect.top;

        var moveX = ((rect.width / 2 - relX) / (rect.width / 2)) * 10;
        var moveY = ((rect.height / 2 - relY) / (rect.height / 2)) * 10;

        $anchor.css({
            transform: `translate3d(${moveX}px, ${moveY}px, 0) scale(1.1)`,
            transition: 'transform 0.1s ease-out',
        });
    });
});

jQuery('.wdt-scaleout-hover').on('mouseleave', '.blog-image a', function() {
    var $anchor = jQuery(this);

    $anchor.off('mousemove');

    $anchor.css({
        transform: 'translate3d(0, 0, 0) scale(1)',
        transition: 'transform 0.3s ease',
    });
});