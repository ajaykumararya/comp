var dtLMSFrontendUtils = {

    dtLMSInitializeDonutChart: function() {

        jQuery('.dtlms-donutchart').each(function() {
            var $this = jQuery(this);
            var $bgColor = ($this.data('bgcolor') !== undefined) ? $this.data('bgcolor') : '#5D18D6';
            var $fgColor = ($this.data('fgcolor') !== undefined) ? $this.data('fgcolor') : '#000000';
            var $size = ($this.data('size') !== undefined) ? $this.data('size') : '100';

            $this.donutchart({
                'size': $size,
                'fgColor': $fgColor,
                'bgColor': $bgColor,
                'donutwidth': 5
            });
            $this.donutchart('animate');
        });

    },

    dtLMSEnableCourseCurriculumContentScroll: function() {

        if (jQuery('.dtlms-curriculum-content-holder').length) {

            var currentWidth = window.innerWidth || document.documentElement.clientWidth;

            if (currentWidth > 1199) {

                jQuery('.dtlms-curriculum-content-holder').height(5000);

                setTimeout(function() {

                    var windowHeight = jQuery(window.top).height();
                    var height = parseInt((parseInt(windowHeight, 10) - parseInt(184, 10)), 10);

                    jQuery('.dtlms-curriculum-content-holder').height(height);

                    dtLMSCommonUtils.dtLMSNiceScroll('.dtlms-curriculum-content-holder');

                }, 400);

            }

        }

    },

    dtLMSEnableCourseCurriculumDetailsScroll: function() {

        if (jQuery('.dtlms-curriculum-detailed-links').length) {

            var currentWidth = window.innerWidth || document.documentElement.clientWidth;

            if (currentWidth > 1199) {

                jQuery('.dtlms-curriculum-detailed-links').height(5000);

                setTimeout(function() {

                    var windowHeight = jQuery(window.top).height();
                    var height = parseInt((parseInt(windowHeight, 10) - parseInt(184, 10)), 10);

                    jQuery('.dtlms-curriculum-detailed-links').height(height);

                    dtLMSCommonUtils.dtLMSNiceScroll('.dtlms-curriculum-detailed-links');

                }, 400);

            }

        }

    },

    dtLMSEnableCourseCurriculumResponsiveScroll: function() {

        if (jQuery('.dtlms-course-curriculum-popup-container').length) {

            var currentWidth = window.innerWidth || document.documentElement.clientWidth;

            if (currentWidth <= 1199) {

                jQuery('.dtlms-course-curriculum-popup-container').height(5000);

                setTimeout(function() {

                    var windowHeight = jQuery(window.top).height();
                    var height = parseInt((parseInt(windowHeight, 10) - parseInt(184, 10)), 10);

                    jQuery('.dtlms-course-curriculum-popup-container').height(height);

                    dtLMSCommonUtils.dtLMSNiceScroll('.dtlms-course-curriculum-popup-container');

                }, 400);

            }

        }

    },

    dtLMSToggleItems: function() {

        if (jQuery('.dtlms-toggle').length) {

            jQuery('.dtlms-toggle').toggleClick(function() {
                jQuery(this).removeClass('active');
            }, function() {
                jQuery(this).addClass('active');
            });

            jQuery('.dtlms-toggle').on('click', function() {
                jQuery(this).next('.dtlms-toggle-content').slideToggle();
            });

        }

    },

    dtLMSProgressBar: function(inview) {

        if (inview) {

            jQuery('.dtlms-progressbar').each(function() {

                jQuery(this).one('inview', function(event, visible) {
                    if (visible == true) {
                        var progressBar = jQuery(this),
                            progressValue = progressBar.find('.dtlms-bar').attr('data-value');

                        if (!progressBar.hasClass('animated')) {
                            progressBar.addClass('animated');
                            progressBar.find('.dtlms-bar').animate({
                                width: progressValue + "%"
                            }, 600, function() {
                                progressBar.find('.dtlms-bar-text').fadeIn(400);
                            });
                        }
                    }
                });

            });

        } else {

            jQuery('.dtlms-progressbar').each(function() {

                var progressBar = jQuery(this),
                    progressValue = progressBar.find('.dtlms-bar').attr('data-value');

                if (!progressBar.hasClass('animated')) {
                    progressBar.addClass('animated');
                    progressBar.find('.dtlms-bar').animate({
                        width: progressValue + "%"
                    }, 600, function() {
                        progressBar.find('.dtlms-bar-text').fadeIn(400);
                    });
                }

            });

        }

    },

    dtLMSCountDownTimer: function(itemId) {

        if (itemId.find('.dtlms-countdown-holder').length) {

            itemId.find('.dtlms-countdown-holder').downCount({
                date: itemId.find('.dtlms-countdown-holder').attr('data-date'),
                offset: itemId.find('.dtlms-countdown-holder').attr('data-offset')
            }, function() {
                var curriculum_id = itemId.find('.dtlms-countdown-holder').attr('data-curriculumid');
                var parent_curriculum_id = itemId.find('.dtlms-countdown-holder').attr('data-parentcurriculumid');
                jQuery('.dtlms-curriculum-meta-title a[data-curriculumid=' + curriculum_id + '][data-parentcurriculumid=' + parent_curriculum_id + ']').trigger('click');
                return false;
            });

        }

    },

    dtLMSCoursesListingIsotope: function() {

        jQuery('.dtlms-apply-isotope .dtlms-courses-listing-items').each(function() {

            jQuery(this).isotope({
                itemSelector: '.dtlms-column',
                percentPosition: true,
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });

        });

        jQuery('.dtlms-apply-isotope .dtlms-courses-listing-isotope-filter').each(function() {

            var isotope_filter = jQuery(this);

            isotope_filter.find('a').on('click', function() {

                isotope_filter.find('a').removeClass('active-sort');
                var selector = jQuery(this).attr('data-filter');
                jQuery(this).addClass('active-sort');

                jQuery(this).parents('.dtlms-apply-isotope').find('.dtlms-courses-listing-items').isotope({
                    filter: selector,
                    masonry: {},
                    animationEngine: 'jquery'
                });

                return false;

            });

        });

    },

    dtLMSPackagesListingIsotope: function() {

        jQuery('.dtlms-apply-isotope .dtlms-packages-listing-items').each(function() {
            jQuery(this).isotope({
                itemSelector: '.dtlms-column',
                percentPosition: true,
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });
        });

    },

    dtLMSTabScroll: function() {

        if (jQuery('.dtlms-course-detail .dtlms-tabs-horizontal').length) {
            jQuery('.dtlms-course-detail .dtlms-tabs-horizontal').scrollTabs({

                click_callback: function(e) {
                    dtLMSCommonUtils.dtLMSContentTabs();
                }


            });
        }
        if (jQuery('.dtlms-class-detail .dtlms-tabs-horizontal').length) {
            jQuery('.dtlms-class-detail .dtlms-tabs-horizontal').scrollTabs({

                click_callback: function(e) {
                    dtLMSCommonUtils.dtLMSContentTabs();
                }


            });
        }

        setTimeout(function() {
            jQuery('.dtlms-tabs-horizontal .scroll_tab_first.current').trigger('click');
        }, 800);

    },

};

var dtLMSFrontend = {

    dtInit: function() {

        var isMobile = (navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i)) || (navigator.userAgent.match(/Blackberry/i)) || (navigator.userAgent.match(/Windows Phone/i)) ? true : false;
        var currentWidth = window.innerWidth || document.documentElement.clientWidth;

        dtLMSFrontend.dtLMS(isMobile, currentWidth);
        dtLMSFrontend.dtCurriculum();
        dtLMSFrontend.dtCourses();
        dtLMSFrontend.dtCoursesListing();
        dtLMSFrontend.dtLessons();
        dtLMSFrontend.dtPackagesListing();
        dtLMSFrontend.dtImageAnimation();
        dtLMSFrontend.dtInstructorImageAnimation();
        dtLMSFrontend.dtCourseCateImageAnimation();
        dtLMSFrontend.dtCourseDetailImageAnimation();

    },

    dtLMS: function(isMobile, currentWidth) {

        // For mega menu fullwidth issue fix
        if (jQuery('body').hasClass('single-dtlms_courses')) {
            setTimeout(function() {
                jQuery(window).trigger('resize');
            }, 800);
        }

        dtLMSFrontendUtils.dtLMSToggleItems();
        dtLMSFrontendUtils.dtLMSCountDownTimer(jQuery('.dtlms-class-dynamic-section-holder, .dtlms-course-dynamic-section-holder'));
        dtLMSFrontendUtils.dtLMSTabScroll();

        // Tabs
        dtLMSCommonUtils.dtLMSContentTabs();

        jQuery(window).on('resize', function() {
            dtLMSFrontendUtils.dtLMSEnableCourseCurriculumContentScroll();
            dtLMSFrontendUtils.dtLMSEnableCourseCurriculumDetailsScroll();
            dtLMSFrontendUtils.dtLMSEnableCourseCurriculumResponsiveScroll();

            dtLMSFrontendUtils.dtLMSCoursesListingIsotope();
            dtLMSFrontendUtils.dtLMSPackagesListingIsotope();
        });

        dtLMSFrontendUtils.dtLMSProgressBar(false);

    },

    dtCurriculum: function() {

        jQuery('body').delegate('.dtlms-curriculum-list li:not(.locked) .dtlms-curriculum-meta-title a', 'click', function(e) {

            if (jQuery('#dtlms-course-curriculum-popup').hasClass('dtlms-curriculum-quiz-lock')) {
                if (confirm(lmsfrontendobject.onRefreshCurriculum)) {
                    jQuery('#dtlms-complete-quiz').trigger('click');
                    return false;
                } else {
                    return false;
                }
            }

            var this_item = jQuery(this),
                parent_item = this_item.parents('.dtlms-curriculum-details, .dtlms-tabs-horizontal-content, .dtlms-class-course-curriculum-holder, .dtlms-course-curriculum-popup-container'),
                course_id = this_item.attr('data-courseid'),
                parent_curriculum_id = this_item.attr('data-parentcurriculumid'),
                curriculum_id = this_item.attr('data-curriculumid');

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: {
                    action: 'dtlms_generate_curriculum_page_contents',
                    course_id: course_id,
                    parent_curriculum_id: parent_curriculum_id,
                    curriculum_id: curriculum_id,
                },
                beforeSend: function() {
                    dtLMSCommonUtils.dtLMSAjaxBeforeSend(parent_item);
                },
                error: function(xhr, status, error) {},
                success: function(response) {

                    jQuery('body').find('#dtlms-course-curriculum-popup').remove();
                    jQuery('body').append(response);

                    jQuery('#dtlms-course-curriculum-popup .dtlms-curriculum-list li').removeClass('active');
                    jQuery('#dtlms-course-curriculum-popup .dtlms-curriculum-list li a[data-curriculumid="' + curriculum_id + '"][ data-parentcurriculumid="' + parent_curriculum_id + '"]').parents('li').addClass('active');

                    jQuery('body, html').css('overflow', 'hidden');
                    dtLMSFrontendUtils.dtLMSToggleItems();
                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumContentScroll();
                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumDetailsScroll();
                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumResponsiveScroll();

                    if (jQuery('#dtlms-course-curriculum-popup').find('.dtlms-countdown-holder').length) {
                        dtLMSFrontendUtils.dtLMSCountDownTimer(jQuery('#dtlms-course-curriculum-popup').find('.dtlms-curriculum-content-holder'));
                    }

                },
                complete: function() {
                    dtLMSCommonUtils.dtLMSAjaxAfterSend(parent_item);
                }
            });

            e.preventDefault();

        });

        jQuery('body').delegate('.dtlms-refresh-course-curriculum', 'click', function(e) {

            if (jQuery('#dtlms-course-curriculum-popup').hasClass('dtlms-curriculum-quiz-lock')) {
                if (confirm(lmsfrontendobject.onRefreshCurriculum)) {
                    jQuery('#dtlms-complete-quiz').trigger('click');
                    return false;
                } else {
                    return false;
                }
            }

            if (jQuery('.dtlms-curriculum-list li.active li.active .dtlms-curriculum-meta-title a').length) {
                jQuery('.dtlms-curriculum-list li.active li.active .dtlms-curriculum-meta-title a:first').trigger('click');
            } else {
                jQuery('.dtlms-curriculum-list li.active .dtlms-curriculum-meta-title a:first').trigger('click');
            }

            e.preventDefault();

        });

        jQuery('body').delegate('.dtlms-close-course-curriculum-popup', 'click', function(e) {

            if (jQuery('#dtlms-course-curriculum-popup').hasClass('dtlms-curriculum-quiz-lock')) {
                if (confirm(lmsfrontendobject.onRefreshCurriculum)) {
                    jQuery('#dtlms-complete-quiz').trigger('click');
                    return false;
                } else {
                    return false;
                }
            }

            jQuery('body, html').css('overflow', '');
            jQuery('#dtlms-course-curriculum-popup').remove();

            location.reload();

            e.preventDefault();

        });

    },

    dtCourses: function() {

        jQuery('.dtlms-class-toggle-switch').toggleClick(function() {
            jQuery(this).addClass('active');
        }, function() {
            jQuery(this).removeClass('active');
        });
        jQuery('.dtlms-class-toggle-switch').on('click', function() {
            jQuery(this).parents('.dtlms-class-toggle-frame').find('.dtlms-class-toggle-content').slideToggle();
        });


        jQuery('.ratings span').mouseenter(function(e) {
            if (!jQuery(this).parents('.ratings').hasClass('rated')) {
                jQuery('.ratings span').removeClass('zmdi zmdi-star-outline');
                jQuery(this).prevAll('span').andSelf().addClass('zmdi zmdi-star-outline');
                jQuery(this).nextAll('span').addClass('zmdi zmdi-star-outline');
            } else {
                setTimeout(function() {
                    jQuery('.ratings').removeClass('rated');
                }, 100);
            }
            e.preventDefault();
        }).mouseleave(function(e) {
            if (!jQuery(this).parents('.ratings').hasClass('rated')) {
                jQuery('.ratings span').removeClass('zmdi zmdi-star-outline');
                jQuery(this).prevAll('span').andSelf().addClass('zmdi zmdi-star-outline');
                jQuery(this).nextAll('span').addClass('zmdi zmdi-star-outline');
            } else {
                setTimeout(function() {
                    jQuery('.ratings').removeClass('rated');
                }, 100);
            }
            e.preventDefault();
        });

        jQuery('.ratings span').on('click', function(e) {
            if (!jQuery(this).parents('.ratings').hasClass('rated')) {
                jQuery('.ratings span').removeClass('zmdi zmdi-star');
                jQuery(this).prevAll('span').andSelf().addClass('zmdi zmdi-star');
                jQuery(this).parents('.ratings-holder').find('#lms_rating').val(parseInt(jQuery(this).attr('data-value'), 10));
                jQuery(this).parents('.ratings').addClass('rated');
                var filledStars = jQuery('.ratings span.zmdi-star').length;
                jQuery('#lms_rating').val(filledStars);
            }
            e.preventDefault();
        });


        dtLMSCommonUtils.dtLMSNiceScroll('.dtlms-students-enrolled-list');

        jQuery('body').delegate('.dtlms-start-course-button', 'click', function(e) {

            var this_item = jQuery(this),
                startcourse_nonce = this_item.attr('data-start-course-nonce'),
                course_id = this_item.attr('data-courseid'),
                user_id = this_item.attr('data-userid'),
                author_id = this_item.attr('data-authorid');

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: {
                    action: 'dtlms_start_course_initialize',
                    startcourse_nonce: startcourse_nonce,
                    course_id: course_id,
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

        jQuery('body').delegate('.dtlms-submit-course-button', 'click', function(e) {

            e.preventDefault();

            var this_item = jQuery(this),
                submitcourse_nonce = this_item.attr('data-submit-course-nonce'),
                course_id = this_item.attr('data-courseid'),
                user_id = this_item.attr('data-userid'),
                author_id = this_item.attr('data-authorid'),
                total_curriculumcount = this_item.attr('data-totalcurriculumcount'),
                submitted_curriculum_count = this_item.attr('data-submittedcurriculumcount');

            if (total_curriculumcount != submitted_curriculum_count) {
                alert(lmsfrontendobject.submitCourse);
                return false;
            }

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: {
                    action: 'dtlms_submit_course_initialize',
                    submitcourse_nonce: submitcourse_nonce,
                    course_id: course_id,
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

    },

    dtCoursesListing: function() {

        jQuery('body').delegate('.coursefilter-orderby:not(.dtlms-without-ajax-load), .coursefilter-category:not(.dtlms-without-ajax-load), .coursefilter-instructor:not(.dtlms-without-ajax-load), .coursefilter-cost:not(.dtlms-without-ajax-load), .coursefilter-date:not(.dtlms-without-ajax-load)', 'change', function() {

            var this_item = jQuery(this).parents('.dtlms-courses-listing-holder');
            var offset = 0;
            var current_page = 1;

            // list course ajax call
            dtlmsListCourses(offset, current_page, this_item);

        });

        jQuery(".dtlms-courses-cost-filter").on('click', 'li', function() {
            jQuery(".dtlms-courses-cost-filter li.active").removeClass("active");
            jQuery(this).addClass("active");
        });
        jQuery(".dtlms-courses-category-filter").on('click', 'li', function() {
            jQuery(".dtlms-courses-category-filter li.active").removeClass("active");
            jQuery(this).addClass("active");
        });

        jQuery('.dtlms-courses-search-text:not(.dtlms-without-ajax-load)').on('input', function() {

            var this_item = jQuery(this).parents('.dtlms-courses-listing-holder');
            var offset = 0;
            var current_page = 1;

            // list course ajax call
            setTimeout(function() {
                dtlmsListCourses(offset, current_page, this_item);
            }, 1600);

        });

        jQuery('body').delegate('.dtlms-courses-display-type:not(.dtlms-without-ajax-load)', 'click', function(e) {

            jQuery('.dtlms-courses-display-type').removeClass('active');
            jQuery(this).addClass('active');
            var list_type = jQuery(this).attr('data-displaytype');
            jQuery(this).parents('.dtlms-courses-listing-holder').find('.dtlms-courses-listing-containers').removeClass('list grid');
            jQuery(this).parents('.dtlms-courses-listing-holder').find('.dtlms-courses-listing-containers').addClass(list_type);
            jQuery(this).trigger('change');

            var this_item = jQuery(this).parents('.dtlms-courses-listing-holder');
            var offset = 0;
            var current_page = 1;

            // list course ajax call
            dtlmsListCourses(offset, current_page, this_item);

            e.preventDefault();

        });

        jQuery('body').delegate('.dtlms-courses-listing-containers .dtlms-pagination a', 'click', function(e) {

            var this_item = jQuery(this).parents('.dtlms-courses-listing-holder');

            if (jQuery(this).parent().hasClass('prev-post')) {
                current_page = parseInt(jQuery(this).attr('data-currentpage'), 10) - 1;
            } else if (jQuery(this).parent().hasClass('next-post')) {
                current_page = parseInt(jQuery(this).attr('data-currentpage'), 10) + 1;
            } else {
                current_page = jQuery(this).text();
            }

            var post_per_page = jQuery(this).parents('.dtlms-courses-listing-holder').attr('data-postperpage');

            if (current_page == 1) {
                var offset = 0;
            } else if (current_page > 1) {
                var offset = ((current_page - 1) * post_per_page);
            }

            // list course ajax call
            dtlmsListCourses(offset, current_page, this_item);

            e.preventDefault();

        });

        function dtlmsListCourses(offset, current_page, this_item) {

            // gathering all default values
            var search_text = this_item.find('.dtlms-courses-search-text').val();

            var display_type = this_item.find('.dtlms-courses-display-type.active').attr('data-displaytype');

            var order_by = this_item.find('.coursefilter-orderby').val();

            var category = this_item.find('.coursefilter-category:checked').map(function() {
                return this.value;
            }).get();

            var instructor = this_item.find('.coursefilter-instructor:checked').map(function() {
                return this.value;
            }).get();

            var cost_type = this_item.find('.coursefilter-cost:checked').map(function() {
                return this.value;
            }).get();

            var start_date = this_item.find('.coursefilter-date').val();


            var post_per_page = this_item.attr('data-postperpage');
            var columns = this_item.attr('data-columns');
            var enable_carousel = this_item.attr('data-enablecarousel');
            var show_author_details = this_item.attr('data-showauthordetails');
            var disable_filters = this_item.attr('data-disablefilters');

            var apply_isotope = this_item.attr('data-applyisotope');
            var enable_category_isotope_filter = this_item.attr('data-enablecategoryisotopefilter');

            var default_filter = this_item.attr('data-defaultfilter');
            var default_display_type = this_item.attr('data-defaultdisplaytype');
            var course_item_ids = this_item.attr('data-courseitemids');
            var course_category_ids = this_item.attr('data-coursecategoryids');
            var instructor_ids = this_item.attr('data-instructorids');
            var enable_fullwidth = this_item.attr('data-enablefullwidth');
            var type = this_item.attr('data-type');
            var show_description = this_item.attr('data-showdescription');
            var excerpt_length = this_item.attr('data-excerpt_length');
            var show_pagination = this_item.attr('data-show-pagination');
            var dclass = this_item.attr('data-class');

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: {
                    action: 'dtlms_generate_courses_listing',
                    display_type: display_type,
                    order_by: order_by,
                    category: category,
                    instructor: instructor,
                    cost_type: cost_type,
                    start_date: start_date,
                    post_per_page: post_per_page,
                    columns: columns,
                    offset: offset,
                    current_page: current_page,
                    search_text: search_text,
                    enable_carousel: enable_carousel,
                    show_author_details: show_author_details,
                    disable_filters: disable_filters,
                    apply_isotope: apply_isotope,
                    enable_category_isotope_filter: enable_category_isotope_filter,
                    default_filter: default_filter,
                    default_display_type: default_display_type,
                    course_item_ids: course_item_ids,
                    course_category_ids: course_category_ids,
                    instructor_ids: instructor_ids,
                    enable_fullwidth: enable_fullwidth,
                    type: type,
                    show_description: show_description,
                    show_pagination: show_pagination,
                    excerpt_length: excerpt_length,
                    class: dclass,
                },
                beforeSend: function() {
                    dtLMSCommonUtils.dtLMSAjaxBeforeSend(this_item);
                },
                error: function(xhr, status, error) {
                    this_item.find('.dtlms-courses-listing-containers').html('Something went wrong!');
                },
                success: function(response) {
                    this_item.find('.dtlms-courses-listing-containers').html(response);
                    if (enable_carousel == 'true') {
                        dtlmsCoursesSwiper(this_item);
                    } else {
                        dtLMSFrontendUtils.dtLMSCoursesListingIsotope();
                        setTimeout(function() {
                            jQuery(window).trigger('resize');
                        }, 3000);
                    }
                },
                complete: function() {
                    dtLMSCommonUtils.dtLMSAjaxAfterSend(this_item);
                }
            });

        }

        jQuery('.dtlms-courses-listing-holder:not(.dtlms-without-ajax-load)').each(function() {
            if (jQuery(this).length) {
                dtlmsListCourses(0, 1, jQuery(this));
            }
        });



        // Courses listing carousel

        function dtlmsCoursesSwiper(this_item) {
            this_item.find('.dtlms-courses-swiper-listing').each(function() {

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
                    var breakpoint_slides_3 = 2;
                    var breakpoint_slides_4 = 1;
                } else if (slidesperview == 3) {
                    var breakpoint_slides_1 = 3;
                    var breakpoint_slides_2 = 2;
                    var breakpoint_slides_3 = 2;
                    var breakpoint_slides_4 = 1;
                } else if (slidesperview >= 4) {
                    var breakpoint_slides_1 = 4;
                    var breakpoint_slides_2 = 2;
                    var breakpoint_slides_3 = 2;
                    var breakpoint_slides_4 = 1;
                }

                // Generate swiper
                const courseswiperOptions = {

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
                        768: {
                            slidesPerView: breakpoint_slides_3,
                        },
                        320: {
                            slidesPerView: breakpoint_slides_4,
                        }
                    },

                }
                var arrowpagination = ($swiperItem.attr('data-carouselarrowpagination') == 'true') ? true : false;

                if (arrowpagination) {

                    courseswiperOptions.navigation = {
                        prevEl: '.dtlms-swiper-arrow-prev-' + moduleid,
                        nextEl: '.dtlms-swiper-arrow-next-' + moduleid
                    };
                }

                const swiperGallery = new Swiper('.dtlms-courses-listing-' + moduleid, courseswiperOptions);

            });

        }

    },

    dtLessons: function() {

        jQuery('body').delegate('.dtlms-lesson-complete-button', 'click', function(e) {

            var this_item = jQuery(this),
                complete_nonce = this_item.attr('data-complete-nonce'),
                course_id = this_item.attr('data-courseid'),
                lesson_id = this_item.attr('data-lessonid'),
                user_id = this_item.attr('data-userid'),
                author_id = this_item.attr('data-authorid'),
                parent_curriculum_id = this_item.attr('data-parentcurriculumid'),
                next_curriculum_id = this_item.attr('data-nextcurriculumid'),
                enable_next_curriculum = this_item.attr('data-enablenextcurriculum');

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: {
                    action: 'dtlms_complete_the_lesson',
                    complete_nonce: complete_nonce,
                    course_id: course_id,
                    lesson_id: lesson_id,
                    user_id: user_id,
                    author_id: author_id,
                    parent_curriculum_id: parent_curriculum_id,
                    next_curriculum_id: next_curriculum_id,
                },
                beforeSend: function() {
                    this_item.prepend('<span><i class="fas fa-spinner fa-spin"></i></span>');
                },
                success: function(response) {

                    jQuery('.dtlms-completed').removeClass('hidden');
                    this_item.addClass('hidden');
                    if (parent_curriculum_id > 0) {
                        jQuery('ul.dtlms-curriculum-list li a[data-curriculumid="' + lesson_id + '"][ data-parentcurriculumid="' + parent_curriculum_id + '"]').append('<span class="dtlms-completed"><span class="fas fa-check"></span></span>');
                    } else {
                        jQuery('ul.dtlms-curriculum-list li a[data-curriculumid="' + lesson_id + '"][ data-parentcurriculumid="-1"]').append('<span class="dtlms-completed"><span class="fas fa-check"></span></span>');
                    }

                    // Enable next curriculum item
                    if (enable_next_curriculum == 'true') {
                        if (next_curriculum_id > 0) {
                            jQuery('ul.dtlms-curriculum-list li a[data-curriculumid="' + next_curriculum_id + '"]').parents('li').removeClass('locked').addClass('unlocked');
                        }
                    }

                },
                complete: function() {
                    this_item.find('span').remove();
                }
            });

            e.preventDefault();

        });

    },

    dtPackagesListing: function() {

        jQuery('body').delegate('.dtlms-packages-listing-containers .dtlms-pagination a', 'click', function(e) {

            var this_item = jQuery(this).parents('.dtlms-packages-listing-holder');

            if (jQuery(this).parent().hasClass('prev-post')) {
                current_page = parseInt(jQuery(this).attr('data-currentpage'), 10) - 1;
            } else if (jQuery(this).parent().hasClass('next-post')) {
                current_page = parseInt(jQuery(this).attr('data-currentpage'), 10) + 1;
            } else {
                current_page = jQuery(this).text();
            }

            var post_per_page = jQuery(this).parents('.dtlms-packages-listing-holder').attr('data-postperpage');

            if (current_page == 1) {
                var offset = 0;
            } else if (current_page > 1) {
                var offset = ((current_page - 1) * post_per_page);
            }

            // list package ajax call
            dtlmsListPackages(offset, current_page, this_item);

            e.preventDefault();

        });


        function dtlmsListPackages(offset, current_page, this_item) {

            var post_per_page = this_item.attr('data-postperpage');
            var columns = this_item.attr('data-columns');
            var apply_isotope = this_item.attr('data-applyisotope');
            var display_type = this_item.attr('data-displaytype');
            var type = this_item.attr('data-type');
            var package_item_ids = this_item.attr('data-packageitemids');

            var enable_carousel = this_item.attr('data-enablecarousel');

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: {
                    action: 'dtlms_generate_packages_listing',
                    offset: offset,
                    current_page: current_page,
                    post_per_page: post_per_page,
                    columns: columns,
                    apply_isotope: apply_isotope,
                    display_type: display_type,
                    type: type,
                    package_item_ids: package_item_ids,
                    enable_carousel: enable_carousel,
                },
                beforeSend: function() {
                    dtLMSCommonUtils.dtLMSAjaxBeforeSend(this_item);
                },
                error: function(xhr, status, error) {
                    this_item.find('.dtlms-packages-listing-containers').html('Something went wrong!');
                },
                success: function(response) {
                    this_item.find('.dtlms-packages-listing-containers').html(response);
                    if (enable_carousel == 'true') {
                        dtlmsPackagesSwiper(this_item);
                    } else {
                        dtLMSFrontendUtils.dtLMSPackagesListingIsotope();
                        setTimeout(function() {
                            jQuery('.dtlms-apply-isotope .dtlms-packages-listing-items').isotope('layout');
                        }, 600);
                    }
                },
                complete: function() {
                    dtLMSCommonUtils.dtLMSAjaxAfterSend(this_item);
                }
            });

        }

        jQuery('.dtlms-packages-listing-holder').each(function() {
            if (jQuery(this).length) {
                dtlmsListPackages(0, 1, jQuery(this));
            }
        });

        // Packages listing carousel
        function dtlmsPackagesSwiper(this_item) {

            this_item.find('.dtlms-packages-swiper-listing').each(function() {

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
                const packageswiperOptions = {

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

                    pagination: pagination_class,
                    paginationType: pagination_type,

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

                    packageswiperOptions.navigation = {
                        prevEl: '.dtlms-swiper-arrow-prev-' + moduleid,
                        nextEl: '.dtlms-swiper-arrow-next-' + moduleid
                    };

                }

                const packageswiperGallery = new Swiper('.dtlms-packages-listing-' + moduleid, packageswiperOptions);
            });

        }

    },

    dtImageAnimation: function() {

        jQuery('body').on('mouseenter', '.dtlms-courselist-item-wrapper', function() {
            var image = jQuery(this).find('.dtlms-courselist-thumb-img img')[0];

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

        jQuery('body').on('mouseleave', '.dtlms-courselist-item-wrapper', function() {
            var image = jQuery(this).find('.dtlms-courselist-thumb-img img')[0];

            jQuery(this).off('mousemove');

            jQuery(image).css({
                transform: 'translate3d(0, 0, 0) scale(1)',
                transition: 'transform 0.2s ease-out',
            });
        });

    },

    dtInstructorImageAnimation: function() {

        jQuery('body').on('mouseenter', '.dtlms-instructor-item', function() {
            var image = jQuery(this).find('.dtlms-instructor-profile-image img')[0];

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

        jQuery('body').on('mouseleave', '.dtlms-instructor-item', function() {
            var image = jQuery(this).find('.dtlms-instructor-profile-image img')[0];

            jQuery(this).off('mousemove');

            jQuery(image).css({
                transform: 'translate3d(0, 0, 0) scale(1)',
                transition: 'transform 0.2s ease-out',
            });
        });
    },

    dtCourseCateImageAnimation: function() {
        jQuery('body').on('mouseenter', '.dtlms-course-category-animate-img', function() {
            var image = jQuery(this).find('.dtlms-course-category-image img')[0];

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

        jQuery('body').on('mouseleave', '.dtlms-course-category-animate-img', function() {
            var image = jQuery(this).find('.dtlms-course-category-image img')[0];

            jQuery(this).off('mousemove');

            jQuery(image).css({
                transform: 'translate3d(0, 0, 0) scale(1)',
                transition: 'transform 0.2s ease-out',
            });
        });

    },

    dtCourseDetailImageAnimation: function() {

        jQuery('body').on('mouseenter', '.dtlms-courselist-item-wrapper', function() {

            var $imageContainer = jQuery(this).find('.dtlms-courselist-thumb-inner');
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

        jQuery('body').on('mouseleave', '.dtlms-courselist-item-wrapper', function() {

            var $imageContainer = jQuery(this).find('.dtlms-courselist-thumb-inner');
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
        dtLMSFrontend.dtInit();
    }

    if (jQuery('.dtlms-onsite-map-container').length) {
        initClassLocationMap();
    }

});

function ClassLocationMap() {
    if (typeof initClassLocationMap === 'function') {
        initClassLocationMap();
    }
}


(function($) {

    "use strict";

    var dtLMSFrontendJs = function($scope, $) {
        dtLMSFrontend.dtInit();
    };

    $(window).on('elementor/frontend/init', function() {
        if (lmscommonobject.elementorPreviewMode) {
            elementorFrontend.hooks.addAction('frontend/element_ready/dtlms-widget-default-courses-listing.default', dtLMSFrontendJs);
            elementorFrontend.hooks.addAction('frontend/element_ready/dtlms-widget-default-packages-listing.default', dtLMSFrontendJs);
        }
    });

})(jQuery);