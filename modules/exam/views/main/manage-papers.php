<?php
$setting = '<code>Centre Profile > Exam Setting</code>';

?>
<style>
    .exam-form .select2-container--bootstrap5 .select2-selection--single .select2-selection__rendered,
    .exam-form .custom_setting_input {
        color: white !important;
        font-size: 16px !important;
    }
</style>
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">Add Paper</h3>
            </div>
            <div class="card-body">
                <?php
                if ($pageCondition = (isset($indata['center_id']) && isset($indata['course_id']) && isset($indata['session_id']))) {
                    $center_id = $indata['center_id'];
                    $course_id = $indata['course_id'];
                    $session_id = $indata['session_id'];
                    // echo $session_id;
                    $course = $this->exam_model2->get_course($course_id)->row();
                    $center = $this->center_model->get_center($center_id)->row();
                    $examType = $center->exam_2_type;
                    ?>
                    <div class="alert alert-success d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Selected Centre/Franchise:</strong><?= $center->name ?>     <?= $center->center_number ?>
                            <br>
                            <strong>Selected Course:</strong> <?= $course->course_name; ?> <br>
                            <strong>Selected Session:</strong>
                            <?= $this->SiteModel->get_session($session_id)->row()->title; ?>
                            <br>
                            <strong>Course Duration:</strong>
                            <?= humnize_duration($course->duration, $course->duration_type, true); ?>
                        </div>

                        <a href="{base_url}exam/main/manage-papers" class="btn btn-sm btn-xs btn-info"><i
                                class="fa fa-edit"></i>&nbsp;Edit
                            Selected Details</a>
                    </div>
                    <?php
                    try {

                        $data = [
                            'center_id' => $center_id,
                            'course_id' => $course_id,
                            'session_id' => $session_id,
                            'duration' => $course->duration,
                            'duration_type' => $course->duration_type,
                            'exam_type' => $examType
                        ];
                        // echo $examType;
                        if ($examType == '0')
                            throw new Exception('This Centre/Franchise exam setting is not configured. Please set it first from ' . $setting);
                        $postTitle = $examType == '1' ? ' Paper' : ' Subjects papers ';
                        if (in_array($course->duration_type, ['year', 'semester'])) {
                            for ($i = 1; $i <= $course->duration; $i++) {
                                $data['current_duration'] = $i;
                                $data['hidden_fields'] = form_hidden($data);
                                $condition = (isset($indata['selected_duration']) && $indata['selected_duration'] == $i)
                                    ? true : $i == 1;
                                $active = $condition ? 'show' : '';
                                $show = $condition ? 'show' : '';
                                ?>
                                <div class="accordion" id="kt_accordion_<?= $i ?>">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header d-flex justify-content-between <?= $active ?>"
                                            id="kt_accordion_<?= $i ?>_header_1">
                                            <button class="accordion-button fs-4 fw-semibold" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#kt_accordion_<?= $i ?>_body_1" aria-expanded="true"
                                                aria-controls="kt_accordion_<?= $i ?>_body_1">
                                                <?= humnize_duration_with_ordinal($i, $course->duration_type) ?>                 <?= $postTitle ?>
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_<?= $i ?>_body_1" class="accordion-collapse collapse <?= $show ?> p-0"
                                            aria-labelledby="kt_accordion_<?= $i ?>_header_1" data-bs-parent="#kt_accordion_<?= $i ?>">
                                            <div class="accordion-body p-0">
                                                <?= $this->parser->parse('main/template/add-duration-exam', $data, true) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        } else {
                            $data['current_duration'] = $i = $course->duration;
                            $data['hidden_fields'] = form_hidden($data);
                            $data['card_header'] = '<div class="card-header"><h3 class="card-title">' . humnize_duration($i, $course->duration_type, true) . $postTitle . '</h3></div>';
                            echo $this->parser->parse('main/template/add-duration-exam', $data, true);
                        }

                    } catch (Exception $e) {
                        echo alert($e->getMessage(), 'warning');
                    }

                } else {
                    ?>
                    <form method="post" name="check">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-warning d-flex align-items-start p-5 mb-10">

                                    <i class="ki-duotone ki-information fs-2hx text-warning me-4">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>

                                    <div>

                                        <div>
                                            <strong>Notice : </strong><br>
                                            अगर आपको यहाँ पर फ्रैंचाइज़/सेंटर नहीं दिख रहा है तो इसका मतलब है कि उनके लिए
                                            कोई
                                            कोर्स
                                            सेटिंग उपलब्ध नहीं है। कृपया पहले कोर्स सेटिंग जोड़ें। <?= $setting ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $this->db->where('exam_2_type!=', '0');
                            $center_id = 0;
                            $boxClass = '';
                            if ($this->center_model->isCenter()) {
                                $center_id = $this->center_model->loginId();
                                $this->db->where('id', $center_id);
                                $boxClass = 'd-none';
                            }
                            $list = $this->center_model->get_center(0, 'center');

                            if (!$list->num_rows()) {
                                echo alert('No Centers found with valid exam type setting. Please add course settings first.' . $setting, 'warning');
                            }

                            ?>
                            <div class="form-group mb-4 col-md-4 <?= $boxClass ?>">
                                <label class="form-label required">Select Centre/Franchise</label>

                                <select class="form-select" name="center_id" data-control="select2"
                                    data-placeholder="Select Centre/Franchise"
                                    data-allow-clear="<?= $this->center_model->isAdmin() ?>">
                                    <option></option>
                                    <?php
                                    // $list = $this->db->where('type', 'center')->get('centers')->result();
                                
                                    foreach ($list->result() as $row) {
                                        $selected = $center_id == $row->id ? 'selected' : '';
                                        echo '<option value="' . $row->id . '" ' . $selected . ' data-kt-rich-content-subcontent="' . $row->institute_name . '"
                                    data-kt-rich-content-icon="' . $row->image . '">' . $row->name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="" class="form-label required">Select Course</label>
                                <select name="course_id" data-control="select2" class="form-select fetch-duration"
                                    data-placeholder="Select Course">
                                    <option value=""></option>

                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="" class="form-label required">Select Session</label>
                                <select name="session_id" data-control="select2" class="form-select"
                                    data-placeholder="Select Session" onchange="document.check.submit();">
                                    <option value=""></option>
                                    <?php
                                    $sessions = $this->SiteModel->get_session();
                                    if ($sessions->num_rows()) {
                                        foreach ($sessions->result() as $session) {
                                            echo '<option value="' . $session->id . '">' . $session->title . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                }
                ?>
        </div>
    </div>
    <?php
    if (!$pageCondition) {
        ?>
        <div class="col-md-12">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-list"></i> List Total Exam(s)</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Centre/Franchise</th>
                                    <th>Course</th>
                                    <th>Session</th>
                                    <th>Duration</th>
                                    <th>Info</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $where = $this->center_model->isCenter() ? ['center_id' => $this->center_model->loginId()] : [];
                                $exams = $this->exam_model2->get_exam_papers($where);
                                if ($exams->num_rows()) {
                                    $i = 0;
                                    foreach ($exams->result() as $exam) {
                                        $i++;

                                        $center = $this->center_model->get_center($exam->center_id)->row();
                                        $course = $this->exam_model2->get_course($exam->course_id)->row();
                                        $session = $this->SiteModel->get_session($exam->session_id)->row();
                                        $examType = $center->exam_2_type;
                                        $token = $this->token->encode([
                                            'exam_id' => $exam->id,
                                            'exam_type' => $examType,
                                            'center_id' => $exam->center_id,
                                            'session_id' => $exam->session_id,
                                            'course_id' => $exam->course_id,
                                            'selected_duration' => $exam->duration
                                        ]);
                                        echo '<tr data-exam-id="' . $exam->id . '" data-type="' . $examType . '">
                                        <td>' . $i . '.</td>
                                        <td>' . $center->name . ' (' . $center->center_number . ')
                                            <br>' . label($center->institute_name) . '
                                        </td>
                                        <td>' . $course->course_name . '</td>
                                        <td>' . label($session->title, 'success') . '</td>
                                        <td>' . humnize_duration_with_ordinal($exam->duration, $exam->duration_type) . '</td>
                                        <td>';
                                        if ($examType == '1') {
                                            echo label('Start Time : ' . date('d M Y H:i A', strtotime($exam->start_time)))
                                                . label('End Time : ' . date('d M Y H:i A', strtotime($exam->end_time)));
                                        } elseif ($examType == '2') {
                                            $ttlSubjects = $this->exam_model2->get_exam_subjects(['paper_id' => $exam->id]);
                                            echo label($ttlSubjects->num_rows() . ' Subjects Papers');
                                        }

                                        echo '</td><td>
                                            <div class="btn-group">
                                                <a href="' . base_url('exam/main/manage-papers/' . $token) . '" class="btn btn-sm btn-xs btn-primary edit-exam-paper"><i class="fa fa-eye"></i></a>
                                                <button class="btn btn-sm btn-xs btn-danger delete-exam-paper"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="6" class="text-center">No Exams found.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                $('.edit-exam-paper').on('click', function () {
                    var row = $(this).closest('tr');
                    var exam_id = row.data('exam-id');
                    var exam_type = row.data('type');
                    $.AryaAjax({
                        url: '{base_url}exam/ajax/view-exam-paper-details',
                        data: {
                            exam_id: exam_id,
                            exam_type: exam_type
                        },
                    }).then(function (res) {
                        log(res)
                        // if (res.status) {
                        //     const box = mydrawer('Exam Paper Details', 'lg');
                        //     box.find('.body').html(res.html);
                        // }
                    }).catch(function (a) {
                        console.log(a);
                    });
                });
                $('.delete-exam-paper').on('click', function () {
                    var row = $(this).closest('tr');
                    var message = row.data('type') == '2' ?
                        'Are you sure you want to delete this exam paper along with all its associated subject exams? This action cannot be undone.' :
                        'Are you sure you want to delete this exam paper? This action cannot be undone.';
                    SwalWarning(message, true, 'Yes Delete It')
                        .then((result) => {
                            if (result.isConfirmed) {
                                // Perform deletion operation here
                                $.AryaAjax({
                                    url: '{base_url}exam/ajax/delete-exam-paper',
                                    data: {
                                        exam_id: row.data('exam-id')
                                    },
                                    success_message: 'Exam paper deleted successfully.',
                                    page_reload: true
                                }).then((res) => {
                                    showResponseError(res);
                                });
                            }
                        });
                });
            });
        </script>
        <?php
    }
    ?>
</div>

<script>

    document.addEventListener("DOMContentLoaded", function () {

        $('form').each(function () {
            let form = $(this);
            const institue_box = form.find('select[name="center_id"]');
            const ContBox = form.find('.cantainer-box');
            const course_box = form.find('select[name="course_id"]');

            institue_box.change(function () {
                var center_id = $(this).val();
                course_box.html('');
                ContBox.html('');

                $.AryaAjax({
                    url: '{base_url}ajax/student/genrate-a-new-rollno-with-center-courses',
                    data: { center_id },
                    dataType: 'json'
                }).then(function (res) {
                    if (res.status) {
                        var options = '<option value=""></option>';
                        if (res.courses.length) {
                            $.each(res.courses, function (index, course) {
                                options += `
                                <option value="${course.course_id}" 
                                    data-duration="${course.duration}"
                                    data-durationType="${course.duration_type}"
                                    data-kt-rich-content-subcontent="${course.duration} ${course.duration_type}">
                                    ${course.course_name}
                                </option>`;
                            });
                        }
                        course_box.html(options).select2({
                            placeholder: "Select a Course",
                            templateSelection: optionFormatSecond,
                            templateResult: optionFormatSecond,
                        });
                    } else {
                        SwalWarning('This Center have not Courses, Please Assign it.');
                    }
                }).catch(function (a) {
                    console.log(a);
                });
            }).select2({
                placeholder: "Select a Center",
                templateSelection: optionFormatSecond,
                templateResult: optionFormatSecond,
            });

            form.on('change', '[name="session_id"], [name="duration"], [name="course_id"], [name="duration_type"]', function () {
                ContBox.html('');
                var center_id = institue_box.val();
                var course_id = course_box.val();
                var session_id = form.find('[name="session_id"]').val();
                var duration = form.find('[name="duration"]').val();
                var duration_type = form.find('[name="duration_type"]').val();

                if (center_id && course_id && session_id && duration && duration_type) {
                    $.AryaAjax({
                        url: '{base_url}exam/ajax/get-paper-list-by-filters',
                        data: {
                            center_id,
                            course_id,
                            session_id,
                            duration,
                            duration_type
                        },
                    }).then(function (res) {
                        ContBox.html(res);
                        refreshSelect2Options(form); // course/paper load ke baad topics refresh
                    }).catch(function (a) {
                        console.log(a);
                    });
                }
            });

            if (typeof login_type !== "undefined" && login_type === 'center') {
                institue_box.trigger("change");
            }

            form.on('input', '.input-marks', function () {
                var ttl_question = 0;
                form.find('.input-marks').each(function () {
                    var val = parseInt($(this).val());
                    if (!isNaN(val)) ttl_question += val;
                });
                form.find('.ttl_question').text(ttl_question);
            });

            function refreshSelect2Options(formSelector) {
                var selected = [];

                formSelector.find('.topic').each(function () {
                    var val = $(this).val();
                    if (val) selected.push(...val);
                });

                formSelector.find('.topic').each(function () {
                    var current = $(this).val();
                    $(this).find('option').each(function () {
                        $(this).prop('disabled', false);
                        if (selected.includes($(this).val()) && (!current || !current.includes($(this).val()))) {
                            $(this).prop('disabled', true);
                        }
                    });
                });

                formSelector.find('.topic').each(function () {
                    $(this).select2();
                });
            }

            form.find('.topic').on('change', function () {
                refreshSelect2Options(form);
            });

            refreshSelect2Options(form);

            form.on('submit', function (e) {
                e.preventDefault();

                $.AryaAjax({
                    url: '{base_url}exam/ajax/save-exam',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success_message: 'Paper Added Successfully..',
                    page_reload: true
                }).then((res) => {
                    showResponseError(res);
                });
            });
        });
    });

</script>