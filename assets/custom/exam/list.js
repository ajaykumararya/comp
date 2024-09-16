document.addEventListener('DOMContentLoaded', function (r) {
    const exam_table = $('#list-exams');
    var count = 1;
    var rowData = [];
    exam_table.DataTable({
        dom: small_dom,
        ajax: {
            url: ajax_url + 'exam/list',
            // success : function(data){
            //     log(data);
            // },
            error: function (a, v, c) {
                console.log(a.responseText);
            }
        },
        columns: [
            { 'data': null },
            { 'data': 'exam_title' },
            { 'data': 'course_name' },
            { 'data': null },
            { 'data': null },
            { 'data': 'exam_status' },
            { 'data': null }
        ],
        columnDefs: [
            {
                targets: 0,
                render: function (data, type, row, meta) {
                    return `${meta.row + 1}.`;
                }
            },
            {
                targets: 2,
                render: function (data, type, row) {
                    var badgeClass = duration_badge(row.duration_type, duration_colors);//) ? duration_colors[row.duration_type] : 'danger';
                    return `${row.course_name} <lable class="badge badge-${badgeClass}"> ${course_duration_humnize_without_ordinal(row.duration, row.duration_type)}</lable>`;//row.duration+ ` </>`;
                }
            },
            {
                targets: 3,
                orderable: false,
                render: function (data, type, row) {
                    if (row.schedule_status == 1 && row.schedule) {
                        var sc = row.schedule;
                        var fillterSc = sc.split(' - ');
                        return `
                            <lable class="badge badge-dark">Form : ${fillterSc[0]}</lable>
                            <label class="badge badge-dark mt-1">To : ${fillterSc[1]}</label>
                        `;
                    }
                    else
                        return `<label class="badge badge-danger">No Schedule</label>`;
                }
            },
            {
                targets: 4,
                orderable: false,
                render: function (data, type, row) {
                    if (row.timer_status == 1 && row.timer != null)
                        return `${hourConvert(row.timer)}`;
                    else
                        return `<label class="badge badge-danger">No Timer</label>`;
                }
            },
            {
                targets: 5,
                orderable: false,
                render: function (data, type, row) {
                    return `<div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                <input class="form-check-input my-status" type="checkbox" value="${row.exam_id}" ${(data == 1) ? 'checked' : ''}  id="kt_flexSwitchCustomDefault_1_1"/>
                            </div>`;
                }
            },
            {
                targets: -1,
                orderable: false,
                render: function (data, type, row) {
                    return `
                        <div class="btn-group">
                        <button class="btn btn-info questions-list our-question-list"><i class="fa fa-list"></i> Questions</button>
                        <button class="btn btn-primary edit-form-btn" data-id="${row.exam_id}"><i class="fa fa-edit"></i> Edit</button>
                        ${deleteBtnRender(1, row.exam_id)}
                        </div>
                    `;
                }
            }
        ]
    }).on('draw', function (e) {
        ki_modal.find('.modal-dialog').addClass('modal-lg');
        exam_table.EditAjax('exam/edit-form', 'Exam', 'lg');
        handleDeleteRows('exam/delete').then((e) => exam_table.DataTable().ajax.reload());
        exam_table.find('.my-status').on('change', function () {
            // log($(this).is(':checked'));
            $.AryaAjax({
                url: 'exam/update-status',
                data: {
                    id: $(this).val(),
                    status: $(this).is(':checked') ? 1 : 0
                },
            }).then((e) => {
                toastr.success('Exam Status Update Successfully..');
            });
        });
        exam_table.find('.our-question-list').on('click', function () {
            rowData = exam_table.DataTable().row($(this).closest('tr')).data();
            render_data(rowData);
        })
    });
    function render_data(rowData) {
        $.AryaAjax({
            url: 'exam/list-questions',
            data: rowData
        }).then((e) => {
            var drawerEl = document.querySelector("#kt_drawer_view_details_box");
            KTDrawer.getInstance(drawerEl, { overlay: true }).hide();
            drawerEl.setAttribute('data-kt-drawer-width', "{default:'300px', 'md': '900px'}");
            var footer = `<div class="card-footer">
                            <button class="btn btn-primary"><i class="fa fa-plus"></i> Add Question</button>
                        </div>`;
            var main = mydrawer(`${rowData.exam_title}'s Questions list`);
            if (e.status) {
                main.find('.card-body').removeClass('d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0');
            }
            else {
                main.find('.card-body').addClass('d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0');
            }
            main.find('.card-body').html(e.html).find('.edit,.delete').on('click', function (e) {
                // if($(this).hasClass())
                e.preventDefault();
                var quesData = ($(this).closest('table').data('param'));
                // log(quesData);
                if ($(this).hasClass('edit')) {
                    ki_modal.attr('data-bs-backdrop', "static");
                    ki_modal.find('.modal-dialog').addClass('modal-lg');
                    ki_modal.find('.modal-footer').prepend(`<button class="btn btn-outline hover-rotate-end btn-outline-dashed btn-outline-warning add-answer" type="button"><i class="fa fa-plus"></i> Add Choices</button>                    
                `);
                    $.each(quesData.answers, function (i, v) {
                        $.extend(v, {
                            answer_id: i
                        });
                        my_template('template', v).then((re) => {
                            $('.answer-area').append(re);
                        });
                    })
                    myModel('<i class="fa fa-edit"></i> Edit Question', `
                                <input type="hidden" name="question_id" value="${quesData.ques_id}">
                                <div class="form-group">
                                    <lable class="form-label required">Enter Question</lable>
                                    <textarea class="form-control" placeholder="Enter Question" name="question">${quesData.question}</textarea>
                                </div>
                                <div class="answer-area mt-4" data-kt-buttons="true">
                                </div>
                            `, false).then((res) => {
                        res.form.on('submit', function (e) {
                            e.preventDefault();
                            save_question_answer(this);
                        })
                    });
                }
                else {
                    SwalWarning('Confirmation!',
                        `Are you sure you want delete <b class="text-success">${quesData.question}</b> Question.`, true, 'Ok, Delete It.').then((e) => {
                            if (e.isConfirmed) {
                                // alert('OK');
                                $.AryaAjax({
                                    url: 'exam/delete-question',
                                    data: { ques_id: quesData.ques_id },
                                }).then((res) => {
                                    if (res.status) {
                                        toastr.success('Question Deleted Successfully..');
                                        ki_modal.modal('hide');
                                        render_data(rowData);
                                    }
                                    else
                                        toastr.error('Something went wrong please try again.');
                                });
                            }
                        })
                }
            });
            main.find('.card').addClass('card-image').append(footer).find('button').on('click', function () {
                ki_modal.attr('data-bs-backdrop', "static");
                ki_modal.find('.modal-dialog').addClass('modal-lg');
                ki_modal.find('.modal-footer').prepend(`<button class="btn btn-outline hover-rotate-end btn-outline-dashed btn-outline-warning add-answer" type="button"><i class="fa fa-plus"></i> Add Choices</button>                    
                `);
                myModel('Add A New Question', `
                    <div class="form-group">
                        <lable class="form-label required">Enter Question</lable>
                        <textarea class="form-control" placeholder="Enter Question" name="question"></textarea>
                    </div>
                    <div class="answer-area mt-4" data-kt-buttons="true">
                    </div>
                `, false).then((e) => {
                    e.form.on('submit', function (e) {
                        e.preventDefault();
                        save_question_answer(this);
                    })
                });
            });
            ki_modal.on('hidden.bs.modal', function () {
                ki_modal.find('form').off('submit');
                ki_modal.find('.modal-footer').find('.add-answer').remove();
                ki_modal.find('.modal-dialog').removeClass('modal-lg');
            })
        });
    }
    function save_question_answer(form){
        var SendData = new FormData(form);
        var data = [];
        var ans = $(form).find('.ans');
        $(form).find('.is-right').each(function (i) {
            data.push({
                answer: $(ans[i]).val(),
                is_right: $(this).is(':checked') ? 1 : 0
            });
        });
        if (ans.length < 2) {
            SwalWarning('Enter Atleast Two and more answers.');
            return false;
        }
        if ($(form).find('.is-right:checked').length == 0) {
            SwalWarning('Choose A Right Answer.');
            return false;
        }
        SendData.append('exam_id', rowData.exam_id);
        SendData.append('answer_list', JSON.stringify(data));
        $.AryaAjax({
            url: 'exam/manage-question-with-answers',
            data: SendData,
            success_message: `Question Added Successfully in <b>${rowData.exam_title}</b>`
        }).then((res) => {
            showResponseError(res);
            // log(res);
            if (res.status) {
                ki_modal.modal('hide');
                render_data(rowData);
            }
        });
    }
    $(document).on('change', '.is-right', function () {
        ki_modal.find('.parent-ans').removeClass('active');
        $(this).closest('.parent-ans').addClass('active');
    })
    $(document).on('click','.edit-ans',function(){
        var box = $(this).closest('label');
        var old_answer = $(box).find('.ans').val();
        var answer = prompt("Enter your Choice:",old_answer);
        answer = answer.trim();
        if (answer !== null && answer !== "") {
            var list = $('.answer-area .ans');
            var i = 0;
            list.each(function () {
                if (answer == ($(this).val()) && i == 0) {
                    i = 1;
                    toastr.error(`<b>'${answer}' Answer is already exists.</b>`)
                    return;
                }
            })
            if (i == 0) {
                box.find('.ans').val(answer);
                box.find('.ans-title').text(answer);
                toastr.success('Answer Updated.. Now save Form.');
            }
        }
    })
    $(document).on('click', '.delete-ans', function () {
        var box = $(this).closest('label'),
            ans_id = $(this).siblings('.ans_id').val();
        SwalWarning('Confirmation!', 'Are you sure you want to delete this Answer.', true, 'Remove').then((e) => {
            if (e.isConfirmed) {
                if (ans_id) {
                    $.AryaAjax({
                        url: 'exam/remove-answer',
                        data: { id : ans_id },
                    }).then((res) => {
                        if (res.status) {
                            toastr.success('Answer Deleted Successfully..');
                            box.remove();
                            render_data(rowData);
                        }
                    });
                }
                else {
                    toastr.success('Answer Removed Successfully..');
                    box.remove();
                }
            }
        });
    })
    $(document).on('click', '.add-answer', function () {
        var answer = prompt("Enter your Choice:");
        answer = answer.trim();
        if (answer !== null && answer !== "") {
            var list = $('.answer-area .ans');
            var i = 0;
            list.each(function () {
                if (answer == ($(this).val()) && i == 0) {
                    i = 1;
                    toastr.error(`<b>'${answer}' Answer is already exists.</b>`)
                    return;
                }
            })
            if (i == 0) {
                my_template('template', {
                    answer: answer,
                    parent_class: '',
                    is_chcked: '',
                    answer_id: ''
                }).then((e) => {
                    $('.answer-area').append(e);
                });
            }
        }
    })
})
