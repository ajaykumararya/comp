<?php
$exams = $this->exam_model->list_setting_courses();
$courses = $this->exam_model->get_course();
// pre($exams);
?>
<div class="row">
    <div class="col-md-12">
        <form action="" class="add-course-setting-form">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add Course Setting</h3>
                </div>
                <div class="card-body">
                    <div class="row p-0">
                        <div class="col-md-12">
                            <div class="alert alert-warning d-flex align-items-start p-5 mb-10">

                                <i class="ki-duotone ki-information fs-2hx text-warning me-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>

                                <div>
                                    <h4 class="mb-3">📌 Type Selection Guide</h4>

                                    <div class="mb-4">
                                        <strong>1. Duration Wise</strong><br>
                                        यदि आप यह विकल्प चुनते हैं, तो प्रत्येक <strong>कोर्स की अवधि
                                            (Duration)</strong> के अनुसार परीक्षा बनाई जाएगी।<br>
                                        <em>उदाहरण:</em> अगर कोर्स 2 वर्षों का है, तो सिर्फ <strong>2 Exams</strong>
                                        बनाए जाएंगे — हर वर्ष के लिए एक-एक।
                                    </div>

                                    <div>
                                        <strong>2. Duration with Subjects Wise</strong><br>
                                        इस विकल्प में परीक्षा की गणना <strong>Duration × Subjects</strong> के अनुसार
                                        होगी।<br>
                                        <em>उदाहरण:</em> अगर कोर्स 2 वर्षों का है और:<br>
                                        • Year 1 में 5 subjects हैं → 5 exams<br>
                                        • Year 2 में 4 subjects हैं → 4 exams<br>
                                        तो कुल <strong>9 Exams</strong> तैयार होंगे — हर विषय के लिए एक परीक्षा, हर वर्ष
                                        के अनुसार।
                                    </div>

                                    <div class="mt-5 text-dark">
                                        🧠 कृपया उपयुक्त विकल्प का सावधानीपूर्वक चयन करें, क्योंकि इसी के आधार पर परीक्षा का प्रारूप निर्धारित होगा। एक बार सेटिंग निर्धारित करने के बाद यदि परीक्षा बना ली जाती है, तो उस सेटिंग में न तो परिवर्तन किया जा सकेगा और न ही उसे हटाया जा सकेगा।
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 form-group">
                            <label for="" class="form-label required">Course</label>
                            <select class="form-control " data-placeholder="Select A Course" data-control="select2"
                                id="course" name="course_id" required>
                                <option value=""></option>
                                <?php
                                if ($courses->num_rows()) {
                                    foreach ($courses->result() as $courseRow) {
                                        if (!isset($exams[$courseRow->id]))
                                            echo '<option value="' . $courseRow->id . '">' . $courseRow->course_name . ' (' . humnize_duration($courseRow->duration, $courseRow->duration_type) . ')</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="" class="form-label required">Type</label>
                            <select class="form-control " data-placeholder="Select A Type" data-control="select2"
                                name="type" required>
                                <option value=""></option>
                                <option value="duration_wise">Duration Wise</option>
                                <option value="duration_subject_wise">Duration with Subjects Wise </option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12 mt-4">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Course Setting</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($exams)) {
                                $i = 1;
                                foreach ($exams as $course_id => $exam) {
                                    echo '<tr>
                                            <td>' . $i++ . '.</td>
                                            <td>' . $exam['course_name'] . ' ' . $exam['course_duration'] . '</td>
                                            <td>' . $exam['type_text'] . '</td>
                                            <td>' . $exam['button'] . '</td>
                                        </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).on('submit', '.add-course-setting-form', function (e) {
        e.preventDefault();
        $.AryaAjax({
            url: 'course-setting',
            data: new FormData(this),
            success_message: 'Setting Updated Successfully..',
            page_reload: true
        }).then((r) => showResponseError(r));
    })
    $(document).on('click', '.delete-exam-course-setting', function (e) {
        e.preventDefault();
        var token = $(this).data('token');
        SwalWarning('Confirmation!', 'Are you sure remove this setting...', true, 'Yes, Delete it').then((res) => {
            if (res.isConfirmed) {
                $.AryaAjax({
                    url : 'delete-course-setting',
                    data : {token},
                    success_message : 'Course Setting Deleted Successfully..',
                    page_reload : true
                }).then((r) => showResponseError(r));
            }
        });

    })
</script>