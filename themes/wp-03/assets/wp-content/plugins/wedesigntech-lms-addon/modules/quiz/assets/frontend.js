var dtLMSQuizFrontend = {

    dtInit: function() {

        function start_timer() {

            var $quiztime = parseInt(jQuery('.dtlms-quiz-timer').attr('data-time'));
            var $quiztimer = jQuery('.dtlms-quiz-timer').find('.dtlms-timer');
            var $this = jQuery('.dtlms-quiz-timer');

            var $timercolors = {};
            $fgcolor = lmsquizfrontendobject.quizTimerForegroundColor;
            $bgcolor = lmsquizfrontendobject.quizTimerBackgroundColor;

            $quiztimer.timer({
                'timer': $quiztime,
                'width': 160,
                'height': 160,
                'fgColor': $fgcolor,
                'bgColor': $bgcolor
            });

            var prevval = '';

            $quiztimer.on('change', function() {
                var $countdown = $this.find('.dtlms-countdown');
                var val = parseInt($quiztimer.attr('data-timer'));

                if (val > 0) {
                    val--;
                    $quiztimer.attr('data-timer', val);
                    var $text = '';
                    if (val > 60) {
                        $text = Math.floor(val / 60) + ':' + ((parseInt(val % 60) < 10) ? '0' + parseInt(val % 60) : parseInt(val % 60)) + '';
                    } else {
                        $text = '00:' + ((val < 10) ? '0' + val : val);
                    }
                    $countdown.html($text);
                } else {
                    $countdown.html(lmsquizfrontendobject.quizTimeout);
                    jQuery('#dtlms-complete-quiz').trigger('click');
                    $quiztimer.off();
                }

            });
        }

        jQuery('body').delegate("#dtlms-start-quiz", 'click', function() {

            var this_item = jQuery(this),
                startquiz_nonce = this_item.attr('data-startquiz-nonce'),
                course_id = this_item.attr('data-courseid'),
                user_id = this_item.attr('data-userid'),
                lesson_id = this_item.attr('data-lessonid'),
                quiz_id = this_item.attr('data-quizid'),
                assignment_id = this_item.attr('data-assignmentid'),
                author_id = this_item.attr('data-authorid'),
                parent_curriculum_id = this_item.attr('data-parentcurriculumid');

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: {
                    action: 'dtlms_start_quiz',
                    startquiz_nonce: startquiz_nonce,
                    course_id: course_id,
                    user_id: user_id,
                    lesson_id: lesson_id,
                    quiz_id: quiz_id,
                    assignment_id: assignment_id,
                    author_id: author_id,
                    parent_curriculum_id: parent_curriculum_id,
                },
                beforeSend: function() {
                    this_item.prepend('<span><i class="fas fa-spinner fa-spin"></i></span>');
                },
                error: function(xhr, status, error) {
                    jQuery('.dtlms-curriculum-content-holder').html('Something went wrong!');
                },
                success: function(response) {

                    jQuery('.dtlms-curriculum-content-holder').html(response);
                    jQuery(window).on('beforeunload', function() {
                        return lmsquizfrontendobject.onRefresh;
                    });

                    jQuery(window).on('unload', function() {
                        jQuery('#dtlms-complete-quiz').trigger('click');
                    });
                    start_timer();

                    jQuery('#dtlms-course-curriculum-popup').addClass('dtlms-curriculum-quiz-lock');

                    jQuery('.dtlms-quiz-questions ul li img').on('click', function(e) {

                        if (!jQuery(this).parents('ul').hasClass('disabled')) {

                            jQuery(this).parents('.dtlms-quiz-questions').find('li').removeClass('selected');
                            jQuery(this).parents('.dtlms-quiz-questions').find('.multichoice-image').removeAttr('checked');
                            jQuery(this).parents('li').addClass('selected');
                            jQuery(this).next('input').prop('checked', true);

                        }
                        e.preventDefault();

                    });

                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumContentScroll();
                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumDetailsScroll();
                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumResponsiveScroll();

                },
                complete: function() {
                    this_item.find('span').remove();
                }
            });

        });

        jQuery('body').delegate("#dtlms-submit-question", 'click', function() {

            var this_item = jQuery(this),
                course_id = this_item.attr('data-courseid'),
                user_id = this_item.attr('data-userid'),
                lesson_id = this_item.attr('data-lessonid'),
                quiz_id = this_item.attr('data-quizid'),
                assignment_id = this_item.attr('data-assignmentid'),
                author_id = this_item.attr('data-authorid'),

                current_question_num = jQuery('#dtlms-current-question-number').val(),
                current_question_id = jQuery('.dtlms-question:visible').find('#dtlms-current-question-id').val(),
                total_questions = jQuery('#dtlms-total-questions').val();

            var form = jQuery('.formQuiz')[0];
            var data = new FormData(form);
            data.append('action', 'dtlms_show_answers_with_explanation');
            data.append('course_id', course_id);
            data.append('user_id', user_id);
            data.append('lesson_id', lesson_id);
            data.append('quiz_id', quiz_id);
            data.append('assignment_id', assignment_id);
            data.append('author_id', author_id);
            data.append('question_id', current_question_id);

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    dtLMSCommonUtils.dtLMSAjaxBeforeSend(undefined);
                },
                error: function(xhr, status, error) {
                    jQuery('.dtlms-curriculum-content-holder').html('Something went wrong!');
                },
                success: function(response) {

                    if (jQuery.trim(response) == 'passed') {

                        if (parseInt(current_question_num, 10) == parseInt(total_questions, 10)) {
                            jQuery('#dtlms-complete-quiz').trigger('click');
                            return;
                        }

                        jQuery('.dtlms-question-' + current_question_num).slideUp();
                        next_question_num = parseInt(current_question_num, 10) + 1;
                        jQuery('#dtlms-current-question-number').val(next_question_num);

                        if (parseInt(next_question_num, 10) <= parseInt(total_questions, 10)) {
                            jQuery('.dtlms-question-' + next_question_num).slideDown();
                        }
                        if (parseInt(next_question_num, 10) >= parseInt(total_questions, 10)) {
                            jQuery('#dtlms-submit-question').removeClass('hidden');
                            jQuery('#dtlms-next-question').addClass('hidden');
                        }

                        jQuery('.dtlms-question-counter-container .dtlms-current-question').html(next_question_num);

                    } else {

                        jQuery('.dtlms-question-' + current_question_num).find('input,textarea').attr('readonly', 'readonly').next('label').css('pointer-events', 'none').prev('img').css('pointer-events', 'none');
                        jQuery('.dtlms-question-' + current_question_num).find('input,textarea').prev('img').css('pointer-events', 'none');

                        jQuery('#dtlms-answer-holder').html(response);

                        if (parseInt(current_question_num, 10) >= parseInt(total_questions, 10)) {
                            jQuery('#dtlms-submit-question').addClass('hidden');
                            jQuery('#dtlms-next-question').addClass('hidden');
                            jQuery('#dtlms-complete-quiz').removeClass('hidden');
                        } else {
                            jQuery('#dtlms-submit-question').addClass('hidden');
                            jQuery('#dtlms-next-question').removeClass('hidden');
                        }

                    }

                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumContentScroll();
                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumDetailsScroll();
                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumResponsiveScroll();

                },
                complete: function() {
                    dtLMSCommonUtils.dtLMSAjaxAfterSend(undefined);
                }
            });

        });

        jQuery('body').delegate("#dtlms-next-question", 'click', function() {

            var this_item = jQuery(this),
                course_id = this_item.attr('data-courseid'),
                quiz_id = this_item.attr('data-quizid'),
                user_id = this_item.attr('data-userid'),
                author_id = this_item.attr('data-authorid'),

                current_question_num = jQuery('#dtlms-current-question-number').val(),
                current_question_id = jQuery('#dtlms-current-question-id').val(),
                total_questions = jQuery('#dtlms-total-questions').val(),
                correctanswer_and_answerexplanation = jQuery('#dtlms-correctanswer-and-answerexplanation').val();

            jQuery('.dtlms-question-' + current_question_num).slideUp();
            next_question_num = parseInt(current_question_num, 10) + 1;
            jQuery('#dtlms-current-question-number').val(next_question_num);
            if (parseInt(next_question_num, 10) <= parseInt(total_questions, 10)) {
                jQuery('.dtlms-question-' + next_question_num).slideDown();
            }

            if (correctanswer_and_answerexplanation == 'true') {
                jQuery('#dtlms-submit-question').removeClass('hidden');
                jQuery('#dtlms-next-question').addClass('hidden');
            } else if (parseInt(next_question_num, 10) >= parseInt(total_questions, 10)) {
                jQuery('#dtlms-next-question').addClass('hidden');
                jQuery('#dtlms-complete-quiz').removeClass('hidden');
            }

            jQuery(window).trigger('resize');

            jQuery('#dtlms-answer-holder').html('');

            setTimeout(function() {

                jQuery.scrollTo('.dtlms-questions-list', 800, {
                    offset: {
                        top: -250
                    }
                });
                jQuery('.dtlms-question-counter-container .dtlms-current-question').html(next_question_num);

            }, 800);

        });

        jQuery('body').delegate("#dtlms-complete-quiz", 'click', function() {

            jQuery(window).off("beforeunload");
            jQuery(window).off("unload");

            var this_item = jQuery(this),
                course_id = this_item.attr('data-courseid'),
                user_id = this_item.attr('data-userid'),
                lesson_id = this_item.attr('data-lessonid'),
                quiz_id = this_item.attr('data-quizid'),
                assignment_id = this_item.attr('data-assignmentid'),
                author_id = this_item.attr('data-authorid'),
                markasgraded = this_item.attr('data-markasgraded'),
                parent_curriculum_id = this_item.attr('data-parentcurriculumid'),
                timings = jQuery('.dtlms-quiz-timer .dtlms-timer').attr('data-timer'),
                next_curriculum_id = this_item.attr('data-nextcurriculumid'),
                enable_next_curriculum = this_item.attr('data-enablenextcurriculum');

            var form = jQuery('.formQuiz')[0];
            var data = new FormData(form);
            data.append('action', 'dtlms_ajax_validate_quiz');
            data.append('course_id', course_id);
            data.append('user_id', user_id);
            data.append('lesson_id', lesson_id);
            data.append('quiz_id', quiz_id);
            data.append('assignment_id', assignment_id);
            data.append('author_id', author_id);
            data.append('parent_curriculum_id', parent_curriculum_id);
            data.append('next_curriculum_id', next_curriculum_id);
            data.append('timings', timings);

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    this_item.prepend('<span><i class="fas fa-spinner fa-spin"></i></span>');
                },
                error: function(xhr, status, error) {
                    jQuery('.dtlms-curriculum-content-holder').html('Something went wrong!');
                },
                success: function(response) {

                    jQuery('.dtlms-curriculum-content-holder').html(response);

                    if (markasgraded == 'true') {
                        if (parent_curriculum_id > 0) {
                            jQuery('ul.dtlms-curriculum-list li a[data-curriculumid="' + quiz_id + '"][ data-parentcurriculumid="' + parent_curriculum_id + '"]').append('<span class="dtlms-completed"><span class="fas fa-check"></span></span>');
                        } else {
                            jQuery('ul.dtlms-curriculum-list li a[data-curriculumid="' + quiz_id + '"][ data-parentcurriculumid="-1"]').append('<span class="dtlms-completed"><span class="fas fa-check"></span></span>');
                        }
                    }

                    jQuery('#dtlms-course-curriculum-popup').removeClass('dtlms-curriculum-quiz-lock');

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

                    dtLMSFrontendUtils.dtLMSProgressBar(false);

                    jQuery(window).trigger('resize');

                    setTimeout(function() {

                        jQuery.scrollTo('.dtlms-curriculum-content-holder', 800, {
                            offset: {
                                top: -250
                            }
                        });

                    }, 800);


                },
                complete: function() {
                    this_item.find('span').remove();
                }
            });

        });

        jQuery('body').delegate('.dtlms-view-quiz-result', 'click', function(e) {

            var this_item = jQuery(this),
                quiz_id = this_item.attr('data-quizid'),
                grade_id = this_item.attr('data-gradeid');

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: {
                    action: 'dtlms_view_quiz_results',
                    quiz_id: quiz_id,
                    grade_id: grade_id,
                },
                beforeSend: function() {
                    this_item.prepend('<span><i class="fas fa-spinner fa-spin"></i></span>');
                },
                success: function(response) {
                    jQuery('.dtlms-curriculum-content-holder').html(response);
                    dtLMSFrontendUtils.dtLMSInitializeDonutChart();
                    dtLMSFrontendUtils.dtLMSProgressBar(false);
                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumContentScroll();
                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumDetailsScroll();
                    dtLMSFrontendUtils.dtLMSEnableCourseCurriculumResponsiveScroll();
                },
                complete: function() {
                    this_item.find('span').remove();
                }
            });

            e.preventDefault();

        });

    }

};

jQuery(document).ready(function() {

    "use strict";

    dtLMSQuizFrontend.dtInit();

});