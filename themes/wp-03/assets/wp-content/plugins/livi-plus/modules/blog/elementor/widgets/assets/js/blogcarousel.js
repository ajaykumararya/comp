(function($) {

    var dtBlogPosts = function($scope, $) {

        const $slider_option = $scope.find('.wdt-posts-list-wrapper.swiper-container');
        const $carouseleffect = $slider_option.data('carouseleffect');
        const $carouselslidesperview = $slider_option.data('carouselslidesperview');
        const $carouselloopmode = $slider_option.data('carouselloopmode');
        const $carouselmousewheelcontrol = $slider_option.data('carouselmousewheelcontrol');
        const $carouselbulletpagination = $slider_option.data('carouselbulletpagination');
        const $carouselarrowpagination = $slider_option.data('carouselarrowpagination');
        const $carouselscrollbar = $slider_option.data('carouselscrollbar');
        const $moduleId = $slider_option.data('id');
        const $carouselresponsive = $slider_option.data('carouselresponsive');

        if ($slider_option === undefined) {
            return;
        }

        const swiperOptions = {
            initialSlide: 0,
            simulateTouch: true,
            // roundLengths: true,
            keyboardControl: true,
            paginationClickable: true,
            autoHeight: true,
            grabCursor: true,

            slidesPerView: $carouselslidesperview,
            loop: $carouselloopmode,
            mousewheel: $carouselmousewheelcontrol,
            direction: 'horizontal',

            updateOnWindowResize: true,

            effect: $carouseleffect,
        }

        // Arrow pagination
        if ($carouselarrowpagination == true) {
            swiperOptions.navigation = {
                prevEl: '.wdt-products-arrow-prev-' + $moduleId,
                nextEl: '.wdt-products-arrow-next-' + $moduleId
            };
        }

        // Bullets pagination
        if ($carouselbulletpagination == true) {
            swiperOptions.pagination = {
                el: ".wdt-products-bullet-pagination",
                type: 'bullets',
                clickable: true,
            };
        }

        // scrollbar pagination
        if ($carouselscrollbar == true) {
            swiperOptions.scrollbar = {
                el: ".wdt-products-scrollbar",
                hide: false,
                draggable: true,
            };
        }

        // Update breakpoints
        if ($carouselresponsive !== undefined) {
            const $responsiveSettings = $carouselresponsive['responsive'];
            const $responsiveData = {};
            jQuery.each($responsiveSettings, function(index, value) {
                $responsiveData[value.breakpoint] = {
                    slidesPerView: value.toshow,
                };
            });
            swiperOptions['breakpoints'] = $responsiveData;
        }

        //Blog carousel
        const swiperGallery = new Swiper('.wdt-post-list-carousel-' + $moduleId, swiperOptions);

        $scope.find('.wdt-posts-list-wrapper').each(function() {

            var $page = 1;
            var $T = $(this);
            var $data = "",
                $content = $T.find('.tpl-blog-holder');

            // When load more button click...
            $('.wdt-posts-list-wrapper').on("click", ".loadmore-elementor-btn.more-items", function() {

                var $this = $(this);
                var $count = $this.attr('data-count'),
                    $cats = $this.attr('data-cats'),
                    $style = $this.attr('data-style'),
                    $layout = $this.attr('data-layout'),
                    $column = $this.attr('data-column'),
                    $list_type = $this.attr('data-listtype'),
                    $hover = $this.attr('data-hover'),
                    $overlay = $this.attr('data-overlay'),
                    $align = $this.attr('data-align'),
                    $mpages = $this.attr('data-maxpage'),
                    $pos = $this.attr('data-pos'),
                    $eheight = $this.attr('data-eheight'),
                    $meta = $this.attr('data-meta'),
                    $blogpostloadmore_nonce = $this.attr('data-blogpostloadmore-nonce'),
                    $settings = $this.attr('data-settings');

                if ($meta != '') {
                    $meta = JSON.parse($meta);
                }

                $content.addClass('loading');

                if ($this.hasClass('more-items')) {
                    $page++;
                }

                $.ajax({
                    type: "post",
                    dataType: "html",
                    url: livi_urls.ajaxurl,
                    data: {
                        action: "blog_elementor_sc_load_more_post",
                        count: $count,
                        cats: $cats,
                        pos: $pos,
                        style: $style,
                        layout: $layout,
                        column: $column,
                        pageNumber: $page,
                        listtype: $list_type,
                        hover: $hover,
                        overlay: $overlay,
                        align: $align,
                        meta: $meta,
                        blogpostloadmore_nonce: $blogpostloadmore_nonce,
                        settings: $settings
                    },
                    cache: true,
                    success: function(data) {
                        var $res = data.split('#####$$$$$');
                        if ($res.length > 0) {

                            $content.append($res[0]);
                            $T.find('.loadmore-elementor-btn').attr('data-pos', $res[1]);

                            var newbx = $content.find('ul.entry-gallery-post-slider');
                            if (newbx !== null) {
                                newbx.bxSlider({
                                    mode: 'fade',
                                    auto: false,
                                    video: true,
                                    pager: '',
                                    autoHover: true,
                                    adaptiveHeight: false,
                                    responsive: true
                                });
                            }

                            if ($eheight == null || $eheight == false) {
                                $content.css({
                                    overflow: 'hidden'
                                }).isotope('reloadItems').isotope();
                                $(window).trigger('resize');
                            }

                            if (parseInt($page) >= parseInt($mpages)) {
                                $T.find('.loadmore-elementor-btn').removeClass('more-items').html('All Posts Loaded');
                            } else {
                                $T.find('.loadmore-elementor-btn').addClass('more-items');
                            }
                        }
                        $content.removeClass('loading');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $content.html('No More Posts Found');
                    }
                });
                return false;
            });

            // WHen window scroll...
            $(window).scroll(function() {
                var $c = $T.find('.infinite-elementor-btn.more-items');

                var ST = $(window).scrollTop();
                var DH = $(document).height();
                var WH = $(window).height();

                if ((parseInt(ST) == parseInt(DH) - parseInt(WH)) && $c.length > 0) {

                    var $count = $c.attr('data-count'),
                        $cats = $c.attr('data-cats'),
                        $style = $c.attr('data-style'),
                        $layout = $c.attr('data-layout'),
                        $column = $c.attr('data-column'),
                        $list_type = $c.attr('data-listtype'),
                        $hover = $c.attr('data-hover'),
                        $overlay = $c.attr('data-overlay'),
                        $align = $c.attr('data-align'),
                        $mpages = $c.attr('data-maxpage'),
                        $pos = $c.attr('data-pos'),
                        $eheight = $c.attr('data-eheight'),
                        $meta = $c.attr('data-meta'),
                        $blogpostloadmore_nonce = $c.attr('data-blogpostloadmore-nonce'),
                        $settings = $c.attr('data-settings');

                    if ($meta != '') {
                        $meta = JSON.parse($meta);
                    }

                    $content.addClass('loading');

                    $page++;

                    $.ajax({
                        type: "post",
                        dataType: "html",
                        url: livi_urls.ajaxurl,
                        data: {
                            action: "blog_elementor_sc_load_more_post",
                            count: $count,
                            cats: $cats,
                            pos: $pos,
                            style: $style,
                            layout: $layout,
                            column: $column,
                            pageNumber: $page,
                            listtype: $list_type,
                            hover: $hover,
                            overlay: $overlay,
                            align: $align,
                            meta: $meta,
                            blogpostloadmore_nonce: $blogpostloadmore_nonce,
                            settings: $settings
                        },
                        cache: true,
                        success: function(data) {
                            var $res = data.split('#####$$$$$');
                            if ($res.length > 0) {

                                $content.append($res[0]);
                                $T.find('.infinite-elementor-btn').attr('data-pos', $res[1]);

                                var newbx = $content.find('ul.entry-gallery-post-slider');
                                if (newbx !== null) {
                                    newbx.bxSlider({
                                        mode: 'fade',
                                        auto: false,
                                        video: true,
                                        pager: '',
                                        autoHover: true,
                                        adaptiveHeight: false,
                                        responsive: true
                                    });
                                }

                                if ($eheight == null || $eheight == false) {
                                    $content.css({
                                        overflow: 'hidden'
                                    }).isotope('reloadItems').isotope();
                                    $(window).trigger('resize');
                                }

                                if (parseInt($page) >= parseInt($mpages)) {
                                    $c.removeClass('more-items');
                                }
                            }
                            $content.removeClass('loading');
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            $content.html('No More Posts Found');
                        }
                    });
                    return false;
                }
            });
        });

        //Image Animation
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


        //Image Animation for Blog's Classic Templates
        jQuery('.wdt-classic-style.wdt-scaleout-hover').on('mouseenter', function() {
            var $anchor = jQuery(this).find('.blog-image a');
            $anchor.css({
                transform: 'translate3d(0, 0, 0) scale(1.1)',
                transition: 'transform 0.3s ease',
            });

            jQuery(this).on('mousemove', function(e) {
                var rect = $anchor[0].getBoundingClientRect();
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

        jQuery('.wdt-classic-style.wdt-scaleout-hover').on('mouseleave', function() {
            var $anchor = jQuery(this).find('.blog-image a');

            jQuery(this).off('mousemove');

            $anchor.css({
                transform: 'translate3d(0, 0, 0) scale(1)',
                transition: 'transform 0.3s ease',
            });
        });

    };

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/wdt-blog-posts.default', dtBlogPosts);
    });

})(jQuery);