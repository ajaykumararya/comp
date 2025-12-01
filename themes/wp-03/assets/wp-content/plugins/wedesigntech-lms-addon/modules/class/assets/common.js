var dtLMSClassCommonUtils = {

    dtLMSExpandClassResultPopupDetails: function() {

        jQuery('body').delegate('.dtlms-expand-class-result-main-details', 'click', function(e) {

            if (!jQuery(this).hasClass('active')) {
                jQuery(this).addClass('active');
                jQuery(this).parents('#dtlms-class-result-popup').find('.dtlms-class-result-popup-container').addClass('active');
                jQuery(this).parents('#dtlms-class-result-popup').find('.dtlms-class-results-main-detail-wrapper').addClass('active');
            } else {
                jQuery(this).removeClass('active');
                jQuery(this).parents('#dtlms-class-result-popup').find('.dtlms-class-result-popup-container').removeClass('active');
                jQuery(this).parents('#dtlms-class-result-popup').find('.dtlms-class-results-main-detail-wrapper').removeClass('active');
            }

            e.preventDefault();

        });

    },

};

var dtLMSClassCommon = {

    dtInit: function() {

        dtLMSClassCommonUtils.dtLMSExpandClassResultPopupDetails();

        jQuery('body').delegate('.dtlms-view-class-result', 'click', function(e) {

            var this_item = jQuery(this),
                class_id = this_item.attr('data-classid'),
                user_id = this_item.attr('data-userid');

            jQuery.ajax({
                type: "POST",
                url: lmscommonobject.ajaxurl,
                data: {
                    action: 'dtlms_generate_class_result',
                    class_id: class_id,
                    user_id: user_id,
                },
                beforeSend: function() {
                    dtLMSCommonUtils.dtLMSAjaxBeforeSend(undefined);
                },
                success: function(response) {

                    if (this_item.hasClass('dtlms-dashboard')) {
                        jQuery('body').addClass('single single-dtlms');
                    }

                    jQuery('body').find('#dtlms-class-result-popup').remove();
                    jQuery('body').append(response);
                    jQuery('body, html').css('overflow', 'hidden');


                    dtLMSCommonUtils.dtLMSProgressBar(false);

                    jQuery('.dtlms-view-class-curriculum-details:first').trigger('click');

                },
                complete: function() {
                    dtLMSCommonUtils.dtLMSAjaxAfterSend(undefined);
                }
            });

            e.preventDefault();

        });

        jQuery('body').delegate('.dtlms-close-class-result-popup', 'click', function(e) {

            jQuery('body, html').css('overflow', '');
            jQuery('#dtlms-class-result-popup').remove();

            e.preventDefault();

        });

        jQuery('body').delegate('.dtlms-refresh-class-result', 'click', function(e) {

            var class_id = jQuery(this).attr('data-classid'),
                user_id = jQuery(this).attr('data-userid')

            jQuery('.dtlms-view-class-result[data-classid="' + class_id + '"][data-userid="' + user_id + '"]').trigger('click');

            dtLMSCommonUtils.dtLMSEnableResultPopupScroll();
            dtLMSCommonUtils.dtLMSEnableResultPopupResponsiveScroll();

            e.preventDefault();

        });

        jQuery('body').delegate('.dtlms-view-class-curriculum-details', 'click', function(e) {

            var this_item = jQuery(this),
                course_id = this_item.attr('data-courseid'),
                user_id = this_item.attr('data-userid'),
                parent_item = this_item.parents('.dtlms-class-result-popup-container');

            jQuery.ajax({
                type: "POST",
                url: lmscommonobject.ajaxurl,
                data: {
                    action: 'dtlms_view_class_curriculum_details',
                    course_id: course_id,
                    user_id: user_id,
                },
                beforeSend: function() {
                    dtLMSCommonUtils.dtLMSAjaxBeforeSend(parent_item);
                },
                error: function(xhr, status, error) {},
                success: function(response) {

                    jQuery('body').find('#dtlms-class-result-popup .dtlms-view-class-curriculum-details-holder').html(response);
                    jQuery('.dtlms-view-curriculum-details:first').trigger('click');

                    dtLMSCommonUtils.dtLMSProgressBar(false);

                    dtLMSCommonUtils.dtLMSEnableResultPopupScroll();
                    dtLMSCommonUtils.dtLMSEnableResultPopupResponsiveScroll();

                    jQuery('.dtlms-class-curriculum-table tr').removeClass('active');
                    this_item.parents('tr').addClass('active');

                },
                complete: function() {
                    dtLMSCommonUtils.dtLMSAjaxAfterSend(parent_item);
                }
            });

            e.preventDefault();

        });

        jQuery('body').delegate('.dtlms-statistics-classes-instructor', 'change', function(e) {

            var this_item = jQuery(this),
                instructor_id = this_item.val();

            jQuery.ajax({
                type: "POST",
                url: lmscommonobject.ajaxurl,
                data: {
                    action: 'dtlms_load_instructorwise_classes',
                    instructor_id: instructor_id,
                    ajax_call: true,
                    function_call: 'dtlms_load_instructorwise_classes',
                    output_div: 'dtlms-instructor-classes-container',
                },
                beforeSend: function() {
                    dtLMSCommonUtils.dtLMSAjaxBeforeSend(this_item.parents('.dtlms-statistics-container'));
                },
                success: function(response) {
                    this_item.parents('.dtlms-statistics-container').find('.dtlms-instructor-classes-container').html(response);
                },
                complete: function() {
                    dtLMSCommonUtils.dtLMSAjaxAfterSend(this_item.parents('.dtlms-statistics-container'));
                }
            });

            e.preventDefault();

        });

        jQuery('.dtlms-statistics-classes-instructor').trigger('change');

    }

};

jQuery(document).ready(function() {

    "use strict";

    if (!lmscommonobject.elementorPreviewMode) {
        dtLMSClassCommon.dtInit();
    }

});

(function($) {

    "use strict";

    var dtLMSClassCommonJs = function($scope, $) {
        dtLMSClassCommon.dtInit();
    };

    $(window).on('elementor/frontend/init', function() {
        if (lmscommonobject.elementorPreviewMode) {
            elementorFrontend.hooks.addAction('frontend/element_ready/dtlms-widget-dashboard-class-details.default', dtLMSClassCommonJs);
        }
    });

})(jQuery);