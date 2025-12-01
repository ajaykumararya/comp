var dtLMSClassFrontendUtils = {

    dtLMSClassesListingIsotope: function() {

        jQuery('.dtlms-apply-isotope .dtlms-classes-listing-items').each(function() {

            jQuery(this).isotope({
                itemSelector: '.dtlms-column',
                percentPosition: true,
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });

        });

    }

};

var dtLMSClassFrontend = {

    dtInit: function() {

        dtLMSClassFrontend.dtClasses();
        dtLMSClassFrontend.dtClassesListing();
        dtLMSClassFrontend.dtClassesListingAnimation();
        dtLMSClassFrontend.dtClassesDetailAnimation();

        if (jQuery('body').hasClass('single-dtlms_classes')) {
            setTimeout(function() {
                jQuery(window).trigger('resize');
            }, 800);
        }

        jQuery(window).on('resize', function() {
            dtLMSClassFrontendUtils.dtLMSClassesListingIsotope();
        });

    },

    dtClasses: function() {

        jQuery('body').delegate('.dtlms-start-class-button', 'click', function(e) {

            var this_item = jQuery(this),
                startclass_nonce = this_item.attr('data-start-class-nonce'),
                class_id = this_item.attr('data-classid'),
                user_id = this_item.attr('data-userid'),
                author_id = this_item.attr('data-authorid');

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: {
                    action: 'dtlms_start_class_ajax_initialize',
                    startclass_nonce: startclass_nonce,
                    class_id: class_id,
                    user_id: user_id,
                    author_id: author_id,
                },
                beforeSend: function() {
                    this_item.prepend('<span><i class="fas fa-spinner fa-spin"></i></span>');
                },
                success: function(response) {
                    location.reload();
                },
                complete: function() {}
            });

            e.preventDefault();

        });

        jQuery('body').delegate('.dtlms-submit-class-button', 'click', function(e) {

            e.preventDefault();

            var this_item = jQuery(this),
                submitclass_nonce = this_item.attr('data-submit-class-nonce'),
                class_id = this_item.attr('data-classid'),
                user_id = this_item.attr('data-userid'),
                author_id = this_item.attr('data-authorid'),
                total_curriculumcount = this_item.attr('data-totalcurriculumcount'),
                submitted_curriculum_count = this_item.attr('data-submittedcurriculumcount');

            if (total_curriculumcount != submitted_curriculum_count) {
                alert(lmsfrontendobject.submitClass);
                return false;
            }

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: {
                    action: 'dtlms_submit_class_initialize',
                    submitclass_nonce: submitclass_nonce,
                    class_id: class_id,
                    user_id: user_id,
                    author_id: author_id,
                },
                beforeSend: function() {
                    this_item.prepend('<span><i class="fas fa-spinner fa-spin"></i></span>');
                },
                success: function(response) {
                    location.reload();
                },
                complete: function() {
                    this_item.find('span').remove();
                }
            });

        });

        jQuery('body').delegate('.dtlms-apply-onsite-class', 'click', function(e) {

            e.preventDefault();

            var this_item = jQuery(this),
                class_id = this_item.attr('data-classid'),
                user_id = this_item.attr('data-userid');

            if (!confirm(lmsfrontendobject.confirmRegistration)) {
                return false;
            }

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: {
                    action: 'dtlms_apply_onsite_class',
                    class_id: class_id,
                    user_id: user_id,
                },
                beforeSend: function() {
                    this_item.prepend('<span><i class="fas fa-spinner fa-spin"></i></span>');
                },
                success: function(response) {
                    var response = response.split('|');
                    this_item.parents('.dtlms-item-status-details').html('<span class="dtlms-applied"><span class="fas fa-check"></span>' + response[0] + '</span>');
                    jQuery('.dtlms-classes-details-holder').find('span').html(response[1]);
                },
                complete: function() {
                    this_item.find('span').remove();
                }
            });

        });

        jQuery('body').delegate('.dtlms-register-onsite-class', 'click', function(e) {

            e.preventDefault();

            var this_item = jQuery(this),
                class_id = this_item.attr('data-classid');

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: {
                    action: 'dtlms_register_onsite_class',
                    class_id: class_id,
                },
                beforeSend: function() {
                    this_item.prepend('<span><i class="fas fa-spinner fa-spin"></i></span>');
                },
                success: function(response) {
                    jQuery('body').find('.dtlms-class-registration-form-container').remove();
                    jQuery('body').append(response);
                },
                complete: function() {
                    this_item.find('span').remove();
                }
            });

        });

        jQuery('body').delegate('.dtlms-class-registration-form', 'submit', function() {

            var this_item = jQuery(this);
            var form = jQuery('.dtlms-class-registration-form')[0];
            var data = new FormData(form);
            data.append('action', 'dttheme_submit_class_registration_form');

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    this_item.find('.dtlms-submit-registration-form').prepend('<span><i class="fas fa-spinner fa-spin"></i></span>');
                },
                success: function(response) {

                    var response = response.split('|');

                    this_item.parents('.dtlms-class-registration-form-holder').find('.dtlms-error-box,.dtlms-success-box').remove();

                    if (response[0] == 'invalid') {

                        this_item.parents('.dtlms-class-registration-form-holder').append('<div class="dtlms-error-box">' + response[1] + '</div>').find('.dtlms-success-box').hide().fadeIn('slow');

                    } else {

                        jQuery('.dtlms-classes-details-holder').find('span').html(response[1]);
                        if (response[0] == 'true') {
                            jQuery('.dtlms-register-onsite-class').attr('disabled', 'disabled');
                            jQuery('.dtlms-register-onsite-class').val(lmsfrontendobject.closedRegistration);
                        }

                        this_item.parents('.dtlms-class-registration-form-holder').append('<div class="dtlms-success-box">' + lmsclassfrontendobject.registrationSuccess + '</div>').find('.dtlms-success-box').hide().fadeIn('slow');
                        this_item.find(':input').prop('disabled', true);
                        setTimeout(function() {
                            jQuery('body').css('overflow', '');
                            jQuery('body').find('.dtlms-class-registration-form-container').fadeOut();
                            jQuery('body').find('.dtlms-class-registration-form-overlay').fadeOut();
                        }, 800);

                    }

                },
                complete: function() {
                    this_item.find('.dtlms-submit-registration-form').find('span').remove();
                }
            });

            return false;

        });

        jQuery('body').delegate('.dtlms-class-registration-form-overlay', 'click', function(e) {

            jQuery('body').find('.dtlms-class-registration-form-container').fadeOut();
            jQuery('body').find('.dtlms-class-registration-form-overlay').fadeOut();

            e.preventDefault;

        });

    },

    dtClassesListing: function() {

        jQuery('body').delegate('.classfilter-orderby:not(.dtlms-without-ajax-load), .classfilter-classtype:not(.dtlms-without-ajax-load), .classfilter-instructor:not(.dtlms-without-ajax-load), .classfilter-cost:not(.dtlms-without-ajax-load), .classfilter-date:not(.dtlms-without-ajax-load)', 'change', function() {

            var this_item = jQuery(this).parents('.dtlms-classes-listing-holder');
            var offset = 0;
            var current_page = 1;

            // list class ajax call
            dtlmsListClasses(offset, current_page, this_item);

        });

        jQuery('.dtlms-classes-search-text:not(.dtlms-without-ajax-load)').on('input', function() {

            var this_item = jQuery(this).parents('.dtlms-classes-listing-holder');
            var offset = 0;
            var current_page = 1;

            // list class ajax call
            setTimeout(function() {
                dtlmsListClasses(offset, current_page, this_item);
            }, 1600);

        });

        jQuery('body').delegate('.dtlms-classes-display-type:not(.dtlms-without-ajax-load)', 'click', function(e) {

            jQuery('.dtlms-classes-display-type').removeClass('active');
            jQuery(this).addClass('active');
            var list_type = jQuery(this).attr('data-displaytype');
            jQuery(this).parents('.dtlms-classes-listing-holder').find('.dtlms-classes-listing-containers').removeClass('list grid');
            jQuery(this).parents('.dtlms-classes-listing-holder').find('.dtlms-classes-listing-containers').addClass(list_type);
            jQuery(this).trigger('change');

            var this_item = jQuery(this).parents('.dtlms-classes-listing-holder');
            var offset = 0;
            var current_page = 1;

            // list class ajax call
            dtlmsListClasses(offset, current_page, this_item);

            e.preventDefault();

        });

        jQuery('body').delegate('.dtlms-classes-listing-containers .dtlms-pagination a', 'click', function(e) {

            var this_item = jQuery(this).parents('.dtlms-classes-listing-holder');

            if (jQuery(this).parent().hasClass('prev-post')) {
                current_page = parseInt(jQuery(this).attr('data-currentpage'), 10) - 1;
            } else if (jQuery(this).parent().hasClass('next-post')) {
                current_page = parseInt(jQuery(this).attr('data-currentpage'), 10) + 1;
            } else {
                current_page = jQuery(this).text();
            }

            var post_per_page = jQuery(this).parents('.dtlms-classes-listing-holder').attr('data-postperpage');

            if (current_page == 1) {
                var offset = 0;
            } else if (current_page > 1) {
                var offset = ((current_page - 1) * post_per_page);
            }

            // list class ajax call
            dtlmsListClasses(offset, current_page, this_item);

            e.preventDefault();

        });

        function dtlmsListClasses(offset, current_page, this_item) {

            // gathering all default values
            var search_text = this_item.find('.dtlms-classes-search-text').val();

            var display_type = this_item.find('.dtlms-classes-display-type.active').attr('data-displaytype');

            var order_by = this_item.find('.classfilter-orderby').val();

            var class_type = this_item.find('.classfilter-classtype:checked').map(function() {
                return this.value;
            }).get();

            var instructor = this_item.find('.classfilter-instructor:checked').map(function() {
                return this.value;
            }).get();

            var cost_type = this_item.find('.classfilter-cost:checked').map(function() {
                return this.value;
            }).get();

            var start_date = this_item.find('.classfilter-date').val();


            var post_per_page = this_item.attr('data-postperpage');
            var columns = this_item.attr('data-columns');
            var enable_carousel = this_item.attr('data-enablecarousel');

            var disable_filters = this_item.attr('data-disablefilters');

            var apply_isotope = this_item.attr('data-applyisotope');

            var default_filter = this_item.attr('data-defaultfilter');
            var default_display_type = this_item.attr('data-defaultdisplaytype');
            var class_item_ids = this_item.attr('data-classitemids');
            var instructor_ids = this_item.attr('data-instructorids');
            var enable_fullwidth = this_item.attr('data-enablefullwidth');
            var show_pagination = this_item.attr('data-show-pagination');
            var type = this_item.attr('data-type');
            var excerpt_length = this_item.attr('data-excerpt_length');

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: {
                    action: 'dtlms_generate_classes_listing',
                    display_type: display_type,
                    order_by: order_by,
                    class_type: class_type,
                    instructor: instructor,
                    cost_type: cost_type,
                    start_date: start_date,
                    post_per_page: post_per_page,
                    columns: columns,
                    offset: offset,
                    current_page: current_page,
                    search_text: search_text,
                    enable_carousel: enable_carousel,
                    disable_filters: disable_filters,
                    apply_isotope: apply_isotope,
                    default_filter: default_filter,
                    default_display_type: default_display_type,
                    class_item_ids: class_item_ids,
                    instructor_ids: instructor_ids,
                    enable_fullwidth: enable_fullwidth,
                    show_pagination: show_pagination,
                    type: type,
                    excerpt_length: excerpt_length,
                },
                beforeSend: function() {
                    dtLMSCommonUtils.dtLMSAjaxBeforeSend(this_item);
                },
                error: function(xhr, status, error) {
                    this_item.find('.dtlms-classes-listing-containers').html('Something went wrong!');
                },
                success: function(response) {
                    this_item.find('.dtlms-classes-listing-containers').html(response);
                    if (enable_carousel == 'true') {
                        dtlmsClassesSwiper(this_item);
                    } else {
                        dtLMSClassFrontendUtils.dtLMSClassesListingIsotope();
                        setTimeout(function() {
                            jQuery(window).trigger('resize');
                        }, 1200);
                    }
                },
                complete: function() {
                    dtLMSCommonUtils.dtLMSAjaxAfterSend(this_item);
                }
            });

        }

        jQuery('.dtlms-classes-listing-holder:not(.dtlms-without-ajax-load)').each(function() {
            if (jQuery(this).length) {
                dtlmsListClasses(0, 1, jQuery(this));
            }
        });


        // Classes listing carousel

        function dtlmsClassesSwiper(this_item) {

            this_item.find('.dtlms-classes-swiper-listing').each(function() {

                var $swiperItem = jQuery(this);
                var moduleid = $swiperItem.attr('data-moduleid');

                // Get swiper options
                var effect = $swiperItem.attr('data-carouseleffect');
                var autoplay = parseInt($swiperItem.attr('data-carouselautoplay'), 10);

                var slidesperview = parseInt($swiperItem.attr('data-carouselslidesperview'), 10);
                var loopmode = ($swiperItem.attr('data-carouselloopmode') == 'true') ? true : false;
                var mousewheelcontrol = ($swiperItem.attr('data-carouselmousewheelcontrol') == 'true') ? true : false;

                var pagination_type = pagination_class = '';
                var bulletpagination = ($swiperItem.attr('data-carouselbulletpagination') == 'true') ? true : false;
                if (bulletpagination) {
                    var pagination_class = '.dtlms-swiper-bullet-pagination';
                    var pagination_type = 'bullets';
                }

                var spacebetween = parseInt($swiperItem.attr('data-carouselspacebetween'), 10);
                if (spacebetween == '') {
                    spacebetween = 0;
                }

                if (slidesperview == 1) {
                    var breakpoint_slides_1 = breakpoint_slides_2 = breakpoint_slides_3 = breakpoint_slides_4 = 1;
                } else if (slidesperview == 2) {
                    var breakpoint_slides_1 = 2;
                    var breakpoint_slides_2 = 2;
                    var breakpoint_slides_3 = 1;
                    var breakpoint_slides_4 = 1;
                } else if (slidesperview == 3) {
                    var breakpoint_slides_1 = 3;
                    var breakpoint_slides_2 = 2;
                    var breakpoint_slides_3 = 1;
                    var breakpoint_slides_4 = 1;
                } else if (slidesperview >= 4) {
                    var breakpoint_slides_1 = 4;
                    var breakpoint_slides_2 = 2;
                    var breakpoint_slides_3 = 1;
                    var breakpoint_slides_4 = 1;
                }

                // Generate swiper
                const classesswiperOptions = {

                    simulateTouch: true,
                    // roundLengths: true,
                    // keyboardControl: true,
                    paginationClickable: true,
                    autoHeight: true,

                    spaceBetween: spacebetween,
                    autoplay: autoplay,
                    slidesPerView: slidesperview,
                    loop: loopmode,
                    mousewheelControl: mousewheelcontrol,
                    direction: 'horizontal',

                    pagination: {
                        el: pagination_class,
                        type: pagination_type,
                        clickable: true
                    },

                    /* 	                pagination: pagination_class,
                    	                paginationType: pagination_type, */

                    effect: effect,
                    coverflow: {
                        rotate: 0,
                        stretch: 10,
                        depth: 200,
                        modifier: 1,
                    },
                    cube: {
                        shadow: true,
                        slideShadows: true,
                        shadowOffset: 20,
                        shadowScale: 0.94
                    },

                    breakpoints: {
                        1199: {
                            slidesPerView: breakpoint_slides_1,
                        },
                        991: {
                            slidesPerView: breakpoint_slides_2,
                        },
                        767: {
                            slidesPerView: breakpoint_slides_3,
                        },
                        320: {
                            slidesPerView: breakpoint_slides_4,
                        }
                    },

                }

                var arrowpagination = ($swiperItem.attr('data-carouselarrowpagination') == 'true') ? true : false;

                if (arrowpagination) {

                    classesswiperOptions.navigation = {
                        prevEl: '.dtlms-swiper-arrow-prev-' + moduleid,
                        nextEl: '.dtlms-swiper-arrow-next-' + moduleid
                    };
                }

                const swiperGallery = new Swiper('.dtlms-classes-swiper-listing-' + moduleid, classesswiperOptions);

            });

        }

    },

    dtClassesListingAnimation: function() {

        jQuery('body').on('mouseenter', '.dtlms-classlist-item-wrapper', function() {
            var image = jQuery(this).find('.dtlms-classlist-thumb img')[0];

            jQuery(image).css({
                transform: 'translate3d(0, 0, 0) scale(1.1)',
                transition: 'transform 0.15s ease-out'
            });

            jQuery(this).on('mousemove', function(e) {
                var rect = this.getBoundingClientRect();
                var relX = e.clientX - rect.left;
                var relY = e.clientY - rect.top;

                var moveX = ((rect.width / 2 - relX) / (rect.width / 2)) * 15;
                var moveY = ((rect.height / 2 - relY) / (rect.height / 2)) * 15;

                jQuery(image).css({
                    transform: `translate3d(${moveX}px, ${moveY}px, 0) scale(1.1)`,
                });
            });
        });

        jQuery('body').on('mouseleave', '.dtlms-classlist-item-wrapper', function() {
            var image = jQuery(this).find('.dtlms-classlist-thumb img')[0];

            jQuery(this).off('mousemove');

            jQuery(image).css({
                transform: 'translate3d(0, 0, 0) scale(1)',
                transition: 'transform 0.2s ease-out',
            });
        });
    },

    dtClassesDetailAnimation: function() {

        jQuery('body').on('mouseenter', '.dtlms-classlist-item-wrapper', function() {

            var $imageContainer = jQuery(this).find('.dtlms-classlist-thumb-inner');
            $imageContainer.css({
                transform: 'translate3d(0, 0, 0) scale(1.1)',
                transition: 'transform 0.15s ease-out'
            });

            $imageContainer.on('mousemove', function(e) {
                var rect = this.getBoundingClientRect();
                var relX = e.clientX - rect.left;
                var relY = e.clientY - rect.top;

                var moveX = ((rect.width / 2 - relX) / (rect.width / 2)) * 15;
                var moveY = ((rect.height / 2 - relY) / (rect.height / 2)) * 15;

                jQuery(this).css({
                    transform: `translate3d(${moveX}px, ${moveY}px, 0) scale(1.1)`,
                });
            });
        });

        jQuery('body').on('mouseleave', '.dtlms-classlist-item-wrapper', function() {

            var $imageContainer = jQuery(this).find('.dtlms-classlist-thumb-inner');
            $imageContainer.off('mousemove');

            $imageContainer.css({
                transform: 'translate3d(0, 0, 0) scale(1)',
                transition: 'transform 0.2s ease-out'
            });
        });
    },


};

jQuery(document).ready(function() {

    "use strict";

    if (!lmscommonobject.elementorPreviewMode) {
        dtLMSClassFrontend.dtInit();
    }

});

(function($) {

    "use strict";

    var dtLMSClassFrontendJs = function($scope, $) {
        dtLMSClassFrontend.dtInit();
    };

    $(window).on('elementor/frontend/init', function() {
        if (lmscommonobject.elementorPreviewMode) {
            elementorFrontend.hooks.addAction('frontend/element_ready/dtlms-widget-default-classes-listing.default', dtLMSClassFrontendJs);
        }
    });

})(jQuery);