var dtLMSAssignmentFrontend = {

    dtInit: function() {

        jQuery('body').delegate('#dtlms-upload-assignment', 'click', function() {

            var this_item = jQuery(this),
                uploadassignment_nonce = this_item.attr('data-uploadassignment-nonce'),
                course_id = this_item.attr('data-courseid'),
                user_id = this_item.attr('data-userid'),
                lesson_id = this_item.attr('data-lessonid'),
                quiz_id = this_item.attr('data-quizid'),
                assignment_id = this_item.attr('data-assignmentid'),
                author_id = this_item.attr('data-authorid'),
                assignment_grade_id = this_item.attr('data-assignmentgradeid'),
                parent_curriculum_id = this_item.attr('data-parentcurriculumid');

            jQuery.ajax({
                type: 'POST',
                url: lmsfrontendobject.ajaxurl,
                data: {
                    action: 'dtlms_upload_assignment',
                    uploadassignment_nonce: uploadassignment_nonce,
                    course_id: course_id,
                    user_id: user_id,
                    lesson_id: lesson_id,
                    quiz_id: quiz_id,
                    assignment_id: assignment_id,
                    author_id: author_id,
                    assignment_grade_id: assignment_grade_id,
                    parent_curriculum_id: parent_curriculum_id,
                },
                beforeSend: function() {
                    dtLMSCommonUtils.dtLMSAjaxBeforeSend(undefined);
                },
                error: function(xhr, status, error) {
                    jQuery('.dtlms-curriculum-content-holder').html('Something went wrong!');
                    jQuery('.dtlms-upload-assignment-holder').sortable({
                        placeholder: 'sortable-placeholder'
                    });
                },
                success: function(response) {
                    jQuery('.dtlms-curriculum-content-holder').html(response);
                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumContentScroll();
                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumDetailsScroll();
                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumResponsiveScroll();
                },
                complete: function() {
                    dtLMSCommonUtils.dtLMSAjaxAfterSend(undefined);
                }
            });

        });

        jQuery('body').delegate('.dtlms-add-upload-assignment-field', 'click', function() {

            var clone = jQuery("#dtlms-upload-assignment-section-to-clone").clone();
            clone.attr('class', 'dtlms-upload-assignment').removeAttr('id').removeClass('hidden');
            clone.find('input').attr('class', 'assignment-attachment').attr('name', 'assignment-attachment[]');
            clone.appendTo('.dtlms-upload-assignment-holder');

            jQuery('.dtlms-upload-assignment-holder').sortable({
                placeholder: 'sortable-placeholder'
            });

            dtLMSFrontendUtils.dtLMSEnableCourseCurriculumContentScroll();
            dtLMSFrontendUtils.dtLMSEnableCourseCurriculumDetailsScroll();
            dtLMSFrontendUtils.dtLMSEnableCourseCurriculumResponsiveScroll();

        });

        jQuery('body').delegate('span.dtlms-remove-upload-assignment-field', 'click', function(e) {

            jQuery(this).parents('.dtlms-upload-assignment').remove();
            e.preventDefault();

        });

        if (jQuery('.dtlms-upload-assignment-holder').length) {
            jQuery('.dtlms-upload-assignment-holder').sortable({
                placeholder: 'sortable-placeholder'
            });
        }


        jQuery('body').delegate('.dtlms-submit-assignment', 'click', function() {

            var assignment_attachment = jQuery('input[name^=assignment-attachment]').map(function(idx, elem) {
                if (this.value != '') {
                    return this.value;
                }
            }).get();

            if ((jQuery('.assignment-textarea').length && jQuery('.assignment-textarea').val() == '') || (jQuery('.assignment-attachment').length && assignment_attachment.length === 0)) {
                alert(lmsassignmentobject.assignmentNotification);
                return;
            }

            var this_item = jQuery(this),
                submitassignment_nonce = this_item.attr('data-submitassignment-nonce'),
                course_id = this_item.attr('data-courseid'),
                user_id = this_item.attr('data-userid'),
                lesson_id = this_item.attr('data-lessonid'),
                quiz_id = this_item.attr('data-quizid'),
                assignment_id = this_item.attr('data-assignmentid'),
                author_id = this_item.attr('data-authorid'),
                parent_curriculum_id = this_item.attr('data-parentcurriculumid'),
                next_curriculum_id = this_item.attr('data-nextcurriculumid'),
                enable_next_curriculum = this_item.attr('data-enablenextcurriculum');

            var form = jQuery('.formAssignment')[0];
            var data = new FormData(form);
            data.append('action', 'dtlms_submit_assignment');
            data.append('submitassignment_nonce', submitassignment_nonce);
            data.append('course_id', course_id);
            data.append('user_id', user_id);
            data.append('lesson_id', lesson_id);
            data.append('quiz_id', quiz_id);
            data.append('assignment_id', assignment_id);
            data.append('author_id', author_id);
            data.append('parent_curriculum_id', parent_curriculum_id);
            data.append('next_curriculum_id', next_curriculum_id);

            jQuery.ajax({
                type: 'POST',
                url: lmsfrontendobject.ajaxurl,
                enctype: 'multipart/form-data',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    this_item.prepend('<span><i class="fas fa-spinner fa-spin"></i></span>');
                },
                success: function(response) {
                    if (response == 'error') {
                        jQuery('body').find('.dtlms-assignment-errors').removeClass('hidden');
                    } else {
                        jQuery('body').find('#dtlms-course-curriculum-popup').remove();
                        jQuery('body').append(response);
                    }

                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumContentScroll();
                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumDetailsScroll();
                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumResponsiveScroll();

                    // Enable next curriculum item
                    if (enable_next_curriculum == 'true') {
                        if (next_curriculum_id > 0) {
                            if (parent_curriculum_id > 0) {
                                jQuery('ul.dtlms-curriculum-list li a[data-curriculumid="' + next_curriculum_id + '"][ data-parentcurriculumid="' + parent_curriculum_id + '"]').parents('li').removeClass('locked').addClass('unlocked');
                            } else {
                                jQuery('ul.dtlms-curriculum-list li a[data-curriculumid="' + next_curriculum_id + '"][ data-parentcurriculumid="-1"]').parents('li').removeClass('locked').addClass('unlocked');
                            }
                        }
                    }

                },
                complete: function() {
                    this_item.find('span').remove();
                }
            });

        });

        jQuery('body').delegate('.dtlms-view-assignment', 'click', function() {

            var this_item = jQuery(this),
                assignment_grade_id = this_item.attr('data-assignmentgradeid'),
                assignment_id = this_item.attr('data-assignmentid');

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: {
                    action: 'dtlms_view_assignment',
                    assignment_grade_id: assignment_grade_id,
                    assignment_id: assignment_id,
                },
                beforeSend: function() {
                    this_item.prepend('<span><i class="fas fa-spinner fa-spin"></i></span>');
                },
                success: function(response) {
                    jQuery('.dtlms-curriculum-content-holder').html(response);
                },
                complete: function() {
                    this_item.find('span').remove();
                }
            });

        });

    },

};

jQuery(document).ready(function() {

    "use strict";

    dtLMSAssignmentFrontend.dtInit();

});