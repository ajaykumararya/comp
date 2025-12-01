var dtLMSCommonUtils = {

    dtLMSCheckboxSwitch: function() {

        jQuery('.dtlms-checkbox-switch:not(.disabled)').each(function() {
            jQuery(this).on('click', function(e) {

                var $ele = '#' + jQuery(this).attr("data-for");
                jQuery(this).toggleClass('checkbox-switch-off checkbox-switch-on');

                if (jQuery(this).hasClass('dtlms-update-revoke-user-submission')) {
                    jQuery('.dtlms-revoke-user-submission').toggleClass('disabled');
                }

                if (jQuery(this).hasClass('items-topay-commission')) {
                    var total_commission_topay = jQuery('.total-commission-topay').val();
                    var course_commission_topay = jQuery('.course-commission-topay').val();
                    var class_commission_topay = jQuery('.class-commission-topay').val();
                    var amounttopay = jQuery(this).attr('data-amounttopay');
                    var class_amounttopay = course_amounttopay = 0;
                    if (jQuery(this).hasClass('class-item')) {
                        var item_id = jQuery(this).attr('data-classid');
                        var selected_commission_items = jQuery(this).parents('.dtlms-paycommission-container').find('.dtlms-commission-markaspaid').attr('data-selectedclasses');
                        class_amounttopay = jQuery(this).attr('data-amounttopay');
                    } else {
                        var item_id = jQuery(this).attr('data-courseid');
                        var selected_commission_items = jQuery(this).parents('.dtlms-paycommission-container').find('.dtlms-commission-markaspaid').attr('data-selectedcourses');
                        course_amounttopay = jQuery(this).attr('data-amounttopay');
                    }
                    var commission_details = jQuery(this).attr('data-commissiondetails');
                    var overall_commission_details = jQuery(this).parents('.dtlms-paycommission-container').find('.dtlms-commission-markaspaid').attr('data-overallcommissiondetails');
                }

                if (jQuery(this).hasClass('checkbox-switch-on')) {
                    jQuery($ele).prop("checked", true);
                    if (jQuery(this).hasClass('items-topay-commission')) {
                        total_commission_topay = parseFloat(total_commission_topay) + parseFloat(amounttopay);
                        if (jQuery(this).hasClass('class-item')) {
                            class_commission_topay = parseFloat(class_commission_topay) + parseFloat(class_amounttopay);
                        } else {
                            course_commission_topay = parseFloat(course_commission_topay) + parseFloat(course_amounttopay);
                        }
                        selected_commission_items = selected_commission_items + ',' + item_id;
                        overall_commission_details = overall_commission_details + ',' + commission_details;
                    }
                } else {
                    jQuery($ele).removeAttr("checked");
                    if (jQuery(this).hasClass('items-topay-commission')) {
                        total_commission_topay = parseFloat(total_commission_topay) - parseFloat(amounttopay);
                        if (jQuery(this).hasClass('class-item')) {
                            class_commission_topay = parseFloat(class_commission_topay) - parseFloat(class_amounttopay);
                        } else {
                            course_commission_topay = parseFloat(course_commission_topay) - parseFloat(course_amounttopay);
                        }
                        selected_commission_items = selected_commission_items.replace(',' + item_id, '');
                        overall_commission_details = overall_commission_details.replace(',' + commission_details, '');
                    }
                }

                if (jQuery(this).hasClass('items-topay-commission')) {
                    class_commission_topay = parseFloat(class_commission_topay);
                    jQuery('.class-commission-topay').val(class_commission_topay);
                    course_commission_topay = parseFloat(course_commission_topay);
                    jQuery('.course-commission-topay').val(course_commission_topay);

                    total_commission_topay = parseFloat(total_commission_topay);
                    jQuery('.total-commission-topay').val(total_commission_topay);
                    jQuery('.other-amounts').attr('data-totalcommissions', total_commission_topay);
                    jQuery('#dtlmsPaypalForm').find('.amount').val(total_commission_topay);
                    if (jQuery(this).hasClass('class-item')) {
                        jQuery(this).parents('.dtlms-paycommission-container').find('.dtlms-commission-markaspaid').attr('data-selectedclasses', selected_commission_items);
                    } else {
                        jQuery(this).parents('.dtlms-paycommission-container').find('.dtlms-commission-markaspaid').attr('data-selectedcourses', selected_commission_items);
                    }
                    jQuery(this).parents('.dtlms-paycommission-container').find('.dtlms-commission-markaspaid').attr('data-overallcommissiondetails', overall_commission_details);
                }

                e.preventDefault();

            });
        });

    },

    dtLMSNiceScroll: function(itemclass) {

        if (jQuery(itemclass).length) {

            var primarColor = lmsfrontendobject.primarColor;

            jQuery(itemclass).niceScroll({
                cursorwidth: 4,
                cursoropacitymin: 0.4,
                cursorcolor: primarColor,
                cursorborder: 'none',
                cursorborderradius: 2,
                autohidemode: 'leave'
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

    dtLMSExpandCourseResultPopupDetails: function() {

        jQuery('body').delegate('.dtlms-expand-course-result-main-details', 'click', function(e) {

            if (!jQuery(this).hasClass('active')) {
                jQuery(this).addClass('active');
                jQuery(this).parents('#dtlms-course-result-popup').find('.dtlms-course-result-popup-container').addClass('active');
                jQuery(this).parents('#dtlms-course-result-popup').find('.dtlms-course-results-main-detail-wrapper').addClass('active');
            } else {
                jQuery(this).removeClass('active');
                jQuery(this).parents('#dtlms-course-result-popup').find('.dtlms-course-result-popup-container').removeClass('active');
                jQuery(this).parents('#dtlms-course-result-popup').find('.dtlms-course-results-main-detail-wrapper').removeClass('active');
            }

            e.preventDefault();

        });

    },

    dtLMSAjaxPagination: function() {

        jQuery('body').delegate('.dtlms-pagination a', 'click', function(e) {

            var this_item = jQuery(this);

            if (jQuery(this).parent().hasClass('prev-post')) {
                current_page = parseInt(jQuery(this).attr('data-currentpage'), 10) - 1;
            } else if (jQuery(this).parent().hasClass('next-post')) {
                current_page = parseInt(jQuery(this).attr('data-currentpage'), 10) + 1;
            } else {
                current_page = jQuery(this).text();
            }

            var post_per_page = jQuery(this).parents('.dtlms-pagination').attr('data-postperpage');

            if (current_page == 1) {
                var offset = 0;
            } else if (current_page > 1) {
                var offset = ((current_page - 1) * post_per_page);
            }

            var function_call = jQuery(this).parents('.dtlms-pagination').attr('data-functioncall');
            var output_div = jQuery(this).parents('.dtlms-pagination').attr('data-outputdiv');

            var instructor_id = jQuery(this).parents('.dtlms-pagination').attr('data-instructorid');
            var course_id = jQuery(this).parents('.dtlms-pagination').attr('data-courseid');
            var class_id = jQuery(this).parents('.dtlms-pagination').attr('data-classid');
            var student_id = jQuery(this).parents('.dtlms-pagination').attr('data-studentid');
            var user_id = jQuery(this).parents('.dtlms-pagination').attr('data-userid');
            var commission_content = jQuery(this).parents('.dtlms-pagination').attr('data-commissioncontent');


            // ajax call
            jQuery.ajax({
                type: "POST",
                url: lmscommonobject.ajaxurl,
                data: {
                    action: function_call,
                    ajax_call: true,
                    current_page: current_page,
                    offset: offset,
                    post_per_page: post_per_page,
                    function_call: function_call,
                    output_div: output_div,
                    instructor_id: instructor_id,
                    course_id: course_id,
                    class_id: class_id,
                    student_id: student_id,
                    user_id: user_id,
                    commission_content: commission_content,
                },
                success: function(response) {
                    this_item.parents('.' + output_div).html(response);
                    dtLMSCommonUtils.dtLMSCheckboxSwitch();
                },
            });

            e.preventDefault();

        });

    },

    dtLMSAjaxBeforeSend: function(this_item) {

        if (this_item != undefined) {
            if (!this_item.find('#dtlms-ajax-load-image').hasClass('first')) {
                this_item.find('#dtlms-ajax-load-image').show();
            } else {
                this_item.find('#dtlms-ajax-load-image').removeClass('first');
            }
        } else {
            if (!jQuery('#dtlms-ajax-load-image').hasClass('first')) {
                jQuery('#dtlms-ajax-load-image').show();
            } else {
                jQuery('#dtlms-ajax-load-image').removeClass('first');
            }
        }

    },

    dtLMSAjaxAfterSend: function(this_item) {

        if (this_item != undefined) {
            this_item.find('#dtlms-ajax-load-image').hide();
        } else {
            jQuery('#dtlms-ajax-load-image').hide();
        }

    },

    dtLMSEnableResultPopupScroll: function() {

        if (jQuery('.dtlms-course-result-popup-container').length) {

            var currentWidth = window.innerWidth || document.documentElement.clientWidth;

            if (currentWidth > 1199) {

                jQuery('.dtlms-course-result-popup-container').height(5000);

                setTimeout(function() {

                    var windowHeight = jQuery(window.top).height();
                    var height = parseInt((parseInt(windowHeight, 10) - parseInt(213, 10)), 10);

                    jQuery('.dtlms-course-result-popup-container').height(height);

                    dtLMSCommonUtils.dtLMSNiceScroll('.dtlms-course-result-popup-container');

                }, 400);

            }

        }

    },

    dtLMSEnableResultPopupResponsiveScroll: function() {

        if (jQuery('.dtlms-course-result-popup-container').length) {

            var currentWidth = window.innerWidth || document.documentElement.clientWidth;

            if (currentWidth <= 1199) {

                jQuery('.dtlms-course-result-popup-container').height(5000);

                setTimeout(function() {

                    var windowHeight = jQuery(window.top).height();
                    var height = parseInt((parseInt(windowHeight, 10) - parseInt(165, 10)), 10);

                    jQuery('.dtlms-course-result-popup-container').height(height);

                    dtLMSCommonUtils.dtLMSNiceScroll('.dtlms-course-result-popup-container');

                }, 1000);

            }

        }

    },

    dtLMSContentTabs: function() {

        if (jQuery('ul.dtlms-tabs-horizontal').length > 0) {
            jQuery('ul.dtlms-tabs-horizontal').each(function() {
                jQuery(this).dtLMSTabs('> .dtlms-tabs-horizontal-content', {
                    effect: 'fade'
                });
            });
        }

        if (jQuery('ul.dtlms-tabs-vertical').length > 0) {
            jQuery('ul.dtlms-tabs-vertical').each(function() {
                jQuery(this).dtLMSTabs('> .dtlms-tabs-vertical-content', {
                    effect: 'fade',
                });
            });
        }

    }

};

var dtLMSCommon = {

    dtInit: function() {
        dtLMSCommon.dtDefault();
        dtLMSCommon.dtStatistics();
        dtLMSCommon.dtDashboard();
    },

    dtDefault: function() {

        dtLMSCommonUtils.dtLMSExpandCourseResultPopupDetails();

        // Start Date
        jQuery('.dtlms-datepicker').each(function() {
            if (jQuery(this).hasClass('dtlms-paycom-startdate') || jQuery(this).hasClass('date-on-certificate')) {
                jQuery('.dtlms-datepicker').datepicker();
            } else {
                jQuery('.dtlms-datepicker').datepicker({
                    minDate: '0d'
                });
            }
        });

        // Pagination
        dtLMSCommonUtils.dtLMSAjaxPagination();

        // Chosen jQuery
        if (jQuery('.dtlms-chosen-select').length) {
            jQuery('.dtlms-chosen-select').chosen({
                no_results_text: lmscommonobject.noResult,
            });
        }

        // Caluculate popup height on resize
        jQuery(window).on('resize', function() {
            dtLMSCommonUtils.dtLMSEnableResultPopupScroll();
            dtLMSCommonUtils.dtLMSEnableResultPopupResponsiveScroll();
        });

    },

    dtStatistics: function() {

        jQuery('body').delegate('.dtlms-commissions-overview-chart-options a', 'click', function(e) {

            var this_item = jQuery(this),
                overviewchartoption = this_item.attr('data-overviewchartoption'),
                charttitle = this_item.attr('data-charttitle'),
                instructorearnings = this_item.parents('.dtlms-commissions-overview-chart-options').attr('data-instructorearnings'),
                contentfilter = this_item.parents('.dtlms-commissions-overview-chart-options').attr('data-contentfilter'),
                charttype = this_item.parents('.dtlms-commissions-overview-chart-options').attr('data-charttype'),
                timelinefilter = this_item.parents('.dtlms-commissions-overview-chart-options').attr('data-timelinefilter'),
                includecoursecommission = this_item.parents('.dtlms-commissions-overview-chart-options').attr('data-includecoursecommission'),
                includeclasscommission = this_item.parents('.dtlms-commissions-overview-chart-options').attr('data-includeclasscommission'),
                includeothercommission = this_item.parents('.dtlms-commissions-overview-chart-options').attr('data-includeothercommission'),
                includetotalcommission = this_item.parents('.dtlms-commissions-overview-chart-options').attr('data-includetotalcommission'),
                instructorid = this_item.parents('.dtlms-commissions-overview-chart-options').attr('data-instructorid');


            jQuery.ajax({
                type: "POST",
                url: lmscommonobject.ajaxurl,
                data: {
                    action: 'dtlms_generate_commissions_overview_chart',
                    overviewchartoption: overviewchartoption,
                    charttitle: charttitle,
                    instructorearnings: instructorearnings,
                    contentfilter: contentfilter,
                    charttype: charttype,
                    timelinefilter: timelinefilter,
                    includecoursecommission: includecoursecommission,
                    includeclasscommission: includeclasscommission,
                    includeothercommission: includeothercommission,
                    includetotalcommission: includetotalcommission,
                    instructorid: instructorid,
                },
                beforeSend: function() {
                    dtLMSCommonUtils.dtLMSAjaxBeforeSend(this_item.parents('.dtlms-chart-holder'));
                },
                success: function(response) {
                    this_item.parents('.dtlms-chart-holder').find('.dtlms-overview-chart-container').html(response);
                    this_item.parents('.dtlms-commissions-overview-chart-options').find('a').removeClass('active');
                    this_item.addClass('active');
                },
                complete: function() {
                    dtLMSCommonUtils.dtLMSAjaxAfterSend(this_item.parents('.dtlms-chart-holder'));
                }
            });

            e.preventDefault();

        });

        jQuery('body').delegate('.dtlms-commissions-overview-instructor-filter', 'change', function(e) {

            var this_item = jQuery(this),
                instructor_id = this_item.val();

            jQuery(this).parents('.dtlms-chart-holder').find('.dtlms-commissions-overview-chart-options').attr('data-instructorid', instructor_id);
            jQuery(this).parents('.dtlms-chart-holder').find('.dtlms-commissions-overview-chart-options a:first').trigger('click');

            e.preventDefault();

        });

        jQuery('.dtlms-commissions-overview-chart-options').each(function() {
            jQuery(this).find('a:first').trigger('click');
        });


        //Purchases chart
        jQuery('body').delegate('.dtlms-purchases-overview-chart-options a', 'click', function(e) {

            var this_item = jQuery(this),
                includeclasspurchases = this_item.parents('.dtlms-purchases-overview-chart-options').attr('data-includeclasspurchases'),
                includecoursepurchases = this_item.parents('.dtlms-purchases-overview-chart-options').attr('data-includecoursepurchases'),
                includepackagepurchases = this_item.parents('.dtlms-purchases-overview-chart-options').attr('data-includepackagepurchases'),
                includedata = this_item.parents('.dtlms-purchases-overview-chart-options').attr('data-includedata'),
                charttitle = this_item.parents('.dtlms-purchases-overview-chart-options').attr('data-charttitle'),
                firstcolor = this_item.parents('.dtlms-purchases-overview-chart-options').attr('data-firstcolor'),
                secondcolor = this_item.parents('.dtlms-purchases-overview-chart-options').attr('data-secondcolor'),
                thirdcolor = this_item.parents('.dtlms-purchases-overview-chart-options').attr('data-thirdcolor'),
                overviewchartoption = this_item.attr('data-overviewchartoption'),
                instructorid = this_item.attr('data-instructorid');

            jQuery.ajax({
                type: "POST",
                url: lmscommonobject.ajaxurl,
                data: {
                    action: 'dtlms_generate_purchases_overview_chart',
                    includeclasspurchases: includeclasspurchases,
                    includecoursepurchases: includecoursepurchases,
                    includepackagepurchases: includepackagepurchases,
                    includedata: includedata,
                    charttitle: charttitle,
                    firstcolor: firstcolor,
                    secondcolor: secondcolor,
                    thirdcolor: thirdcolor,
                    overviewchartoption: overviewchartoption,
                    instructorid: instructorid,
                },
                beforeSend: function() {
                    dtLMSCommonUtils.dtLMSAjaxBeforeSend(this_item.parents('.dtlms-chart-container'));
                },
                success: function(response) {
                    this_item.parents('.dtlms-chart-container').find('.dtlms-overview-chart-container').html(response);
                    this_item.parents('.dtlms-purchases-overview-chart-options').find('a').removeClass('active');
                    this_item.addClass('active');
                },
                complete: function() {
                    dtLMSCommonUtils.dtLMSAjaxAfterSend(this_item.parents('.dtlms-chart-container'));
                }
            });

            e.preventDefault();

        });

        jQuery('body').delegate('.dtlms-purchases-overview-instructor-filter', 'change', function(e) {

            var this_item = jQuery(this),
                instructor_id = this_item.val();

            jQuery(this).parents('.dtlms-chart-container').find('.dtlms-purchases-overview-chart-options a').attr('data-instructorid', instructor_id);
            jQuery(this).parents('.dtlms-chart-container').find('.dtlms-purchases-overview-chart-options a:first').trigger('click');

            e.preventDefault();

        });

        jQuery('.dtlms-purchases-overview-chart-options').each(function(e) {
            jQuery(this).find('a:first').trigger('click');
        });

    },

    dtDashboard: function() {

        jQuery('body').delegate('.dtlms-view-course-result', 'click', function(e) {

            var this_item = jQuery(this),
                course_id = this_item.attr('data-courseid'),
                user_id = this_item.attr('data-userid'),
                parent_item = this_item.parents('.dtlms-course-result-overview');

            jQuery.ajax({
                type: "POST",
                url: lmscommonobject.ajaxurl,
                data: {
                    action: 'dtlms_generate_course_result',
                    course_id: course_id,
                    user_id: user_id,
                },
                beforeSend: function() {
                    dtLMSCommonUtils.dtLMSAjaxBeforeSend(parent_item);
                },
                success: function(response) {

                    if (this_item.hasClass('dtlms-dashboard')) {
                        jQuery('body').addClass('single single-dtlms');
                    }

                    jQuery('body').find('#dtlms-course-result-popup').remove();
                    jQuery('body').append(response);
                    jQuery('body,html').css('overflow', 'hidden');

                    dtLMSCommonUtils.dtLMSProgressBar(false);

                    var parent_curriculum_id = jQuery('.dtlms-view-curriculum-details:first').attr('data-parentcurriculumid');
                    var curriculum_id = jQuery('.dtlms-view-curriculum-details:first').attr('data-curriculumid');
                    var row_class = '.dtlms-item-' + parent_curriculum_id + '-' + curriculum_id;
                    jQuery('.dtlms-view-curriculum-details:first').trigger('click');
                    jQuery('.dtlms-curriculum-items').removeClass('active');
                    jQuery(row_class).addClass('active');

                    // Curriculum Pagination
                    dtLMSCommonUtils.dtLMSAjaxPagination();

                    dtLMSCommonUtils.dtLMSEnableResultPopupScroll();
                    dtLMSCommonUtils.dtLMSEnableResultPopupResponsiveScroll();

                },
                complete: function() {
                    dtLMSCommonUtils.dtLMSAjaxAfterSend(parent_item);
                }
            });

            e.preventDefault();

        });

        jQuery('body').delegate('.dtlms-close-course-result-popup', 'click', function(e) {

            jQuery('body,html').css('overflow', '');
            jQuery('#dtlms-course-result-popup').remove();

            e.preventDefault();

        });

        jQuery('body').delegate('.dtlms-refresh-course-result', 'click', function(e) {

            var course_id = jQuery(this).attr('data-courseid'),
                user_id = jQuery(this).attr('data-userid')

            jQuery('.dtlms-view-course-result[data-courseid="' + course_id + '"][data-userid="' + user_id + '"]').trigger('click');
            dtLMSCommonUtils.dtLMSAjaxPagination();

            dtLMSCommonUtils.dtLMSEnableResultPopupScroll();
            dtLMSCommonUtils.dtLMSEnableResultPopupResponsiveScroll();

            e.preventDefault();

        });

        jQuery('body').delegate('.dtlms-view-curriculum-details', 'click', function(e) {

            var parent_item = jQuery(this).parents('#dtlms-class-result-popup, .dtlms-course-result-popup-container'),
                parent_curriculum_id = jQuery(this).attr('data-parentcurriculumid'),
                curriculum_id = jQuery(this).attr('data-curriculumid'),
                curriculum_grade_id = jQuery(this).attr('data-curriculumgradeid');

            jQuery.ajax({
                type: "POST",
                url: lmscommonobject.ajaxurl,
                data: {
                    action: 'dtlms_view_curriculum_details',
                    curriculum_id: curriculum_id,
                    curriculum_grade_id: curriculum_grade_id,
                },
                beforeSend: function() {
                    dtLMSCommonUtils.dtLMSAjaxBeforeSend(parent_item);
                },
                error: function(xhr, status, error) {
                    //jQuery('body').html('Something went wrong!');
                },
                success: function(response) {

                    jQuery('body').find('.dtlms-view-curriculum-details-holder').html('');
                    jQuery('body').find('.dtlms-view-curriculum-details-holder').append(response);

                    dtLMSCommonUtils.dtLMSProgressBar(false);

                    var row_class = '.dtlms-item-' + parent_curriculum_id + '-' + curriculum_id;
                    jQuery('.dtlms-curriculum-items').removeClass('active');
                    jQuery(row_class).addClass('active');


                    dtLMSCommonUtils.dtLMSEnableResultPopupScroll();
                    dtLMSCommonUtils.dtLMSEnableResultPopupResponsiveScroll();

                },
                complete: function() {
                    dtLMSCommonUtils.dtLMSAjaxAfterSend(parent_item);
                }
            });

            e.preventDefault();

        });
        jQuery('body').delegate('.dtlms-courses-search-text', 'keyup', function(e) {
            var this_item = jQuery(this),
                search_val = this_item.val();
            if (search_val == "") {
                jQuery('.dtms_search_results').addClass('empty-search');
                jQuery('.dtms_search_results').hide();
            } else {
                jQuery('.dtms_search_results').removeClass('empty-search');
                jQuery('.dtms_search_results').show();
                jQuery.ajax({
                    type: "POST",
                    url: lmscommonobject.ajaxurl,
                    data: {
                        action: 'dtlms_search_data_fetch',
                        search_val: search_val,
                        ajax_call: true,
                        function_call: 'dtlms_search_data_fetch',
                    },
                    success: function(data) {
                        if (data.length > 0) {
                            jQuery('.dtms_search_results').addClass('active');
                            jQuery('.dtms_search_results').html(data);
                        }
                    }
                });
            }
        });
        jQuery('body').delegate('.dtlms-statistics-courses-instructor', 'change', function(e) {

            var this_item = jQuery(this),
                instructor_id = this_item.val();

            jQuery.ajax({
                type: "POST",
                url: lmscommonobject.ajaxurl,
                data: {
                    action: 'dtlms_load_instructorwise_courses',
                    instructor_id: instructor_id,
                    ajax_call: true,
                    function_call: 'dtlms_load_instructorwise_courses',
                    output_div: 'dtlms-instructor-courses-container',
                },
                beforeSend: function() {
                    dtLMSCommonUtils.dtLMSAjaxBeforeSend(this_item.parents('.dtlms-statistics-container'));
                },
                success: function(response) {
                    this_item.parents('.dtlms-statistics-container').find('.dtlms-instructor-courses-container').html(response);
                },
                complete: function() {
                    dtLMSCommonUtils.dtLMSAjaxAfterSend(this_item.parents('.dtlms-statistics-container'));
                }
            });

            e.preventDefault();

        });

        jQuery('.dtlms-statistics-courses-instructor').trigger('change');


        jQuery('body').delegate('.dtlms-statistics-commission-instructor', 'change', function(e) {

            var this_item = jQuery(this),
                instructor_id = this_item.val(),
                commission_content = this_item.attr('data-commissioncontent');

            jQuery.ajax({
                type: "POST",
                url: lmscommonobject.ajaxurl,
                data: {
                    action: 'dtlms_load_instructorwise_commissions',
                    instructor_id: instructor_id,
                    commission_content: commission_content,
                    ajax_call: true,
                    function_call: 'dtlms_load_instructorwise_commissions',
                    output_div: 'dtlms-instructor-commissions-container'
                },
                beforeSend: function() {
                    dtLMSCommonUtils.dtLMSAjaxBeforeSend(this_item.parents('.dtlms-statistics-container'));
                },
                success: function(response) {
                    this_item.parents('.dtlms-statistics-container').find('.dtlms-instructor-commissions-container').html(response);
                },
                complete: function() {
                    dtLMSCommonUtils.dtLMSAjaxAfterSend(this_item.parents('.dtlms-statistics-container'));
                }
            });

            e.preventDefault();

        });

        jQuery('.dtlms-statistics-commission-instructor').trigger('change');

    }

};

jQuery(document).ready(function() {

    "use strict";

    if (!lmscommonobject.elementorPreviewMode) {
        dtLMSCommon.dtInit();
    }

});

(function($) {

    "use strict";

    var dtLMSCommonJs = function($scope, $) {
        dtLMSCommon.dtInit();
    };

    $(window).on('elementor/frontend/init', function() {
        if (lmscommonobject.elementorPreviewMode) {
            elementorFrontend.hooks.addAction('frontend/element_ready/dtlms-widget-dashboard-total-items-chart.default', dtLMSCommonJs);
            elementorFrontend.hooks.addAction('frontend/element_ready/dtlms-widget-dashboard-purchases-overview-chart.default', dtLMSCommonJs);
            elementorFrontend.hooks.addAction('frontend/element_ready/dtlms-widget-dashboard-instructor-commission-earnings.default', dtLMSCommonJs);
            elementorFrontend.hooks.addAction('frontend/element_ready/dtlms-widget-dashboard-instructor-commissions.default', dtLMSCommonJs);
            elementorFrontend.hooks.addAction('frontend/element_ready/dtlms-widget-dashboard-instructor-courses.default', dtLMSCommonJs);
        }
    });

})(jQuery);