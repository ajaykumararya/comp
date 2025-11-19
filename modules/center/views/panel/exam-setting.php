<?php
$this->load->model('exam/exam_model2');
$ttlExams = $this->exam_model2->get_exam_papers([
    'center_id' => $this->center_model->isCenter() ? $this->center_model->loginId() : base64_decode($center_id)
])->num_rows();
?>
<div class="row">
    <div class="col-md-12">
        <form action="" class="add-course-setting-form">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Update Exam Setting</h3>
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
                                        🧠 कृपया उपयुक्त विकल्प का सावधानीपूर्वक चयन करें, क्योंकि इसी के आधार पर
                                        परीक्षा का प्रारूप निर्धारित होगा। एक बार सेटिंग निर्धारित करने के बाद यदि
                                        परीक्षा बना ली जाती है, तो उस सेटिंग में न तो परिवर्तन किया जा सकेगा और न ही उसे
                                        हटाया जा सकेगा।
                                    </div>
                                </div>
                            </div>
                            <?php
                            if($ttlExams){
                                echo '<div class="alert alert-danger">💡 वर्तमान में इस केंद्र के लिए कुल <strong>' . $ttlExams . '</strong> परीक्षा(एं) बनाई गई हैं। इसलिए, आप केवल उसी प्रकार का चयन कर सकते हैं जो मौजूदा सेटिंग के अनुरूप हो।</div>';
                            }
                            ?>
                        </div>
                        <div class="col-md-6">
                            <!--begin::Option-->
                            <input type="radio" class="btn-check track-form-data" name="a" value="1"
                                id="form_duration_wise" <?=$exam_2_type == '1' ? 'checked' : ''?> />
                            <label
                                class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-5 <?=($ttlExams && $ttlExams) == '2' ? 'disabled' : ''?>"
                                for="form_duration_wise">
                                <i class="ki-duotone ki-book fs-3x me-4 change-form-data-icon"><span
                                        class="path1"></span><span class="path2"></span></i>

                                <span class="d-block fw-semibold text-start">
                                    <span class="text-dark fw-bold d-block fs-4">Duration Wise</span>
                                </span>
                            </label>
                            <!--end::Option-->
                        </div>
                        <div class="col-md-6">
                            <!--begin::Option-->
                            <input type="radio" class="btn-check track-form-data" name="a" value="2"
                                id="form_duration_subject_wise" <?=$exam_2_type == '2' ? 'checked' : ''?> />
                            <label
                                class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-5 <?=($ttlExams && $exam_2_type) == '1' ? 'disabled' : ''?>"
                                for="form_duration_subject_wise">
                                <i class="ki-duotone ki-book fs-3x me-4 change-form-data-icon"><span
                                        class="path1"></span><span class="path2"></span></i>
                                <span class="d-block fw-semibold text-start">
                                    <span class="text-dark fw-bold d-block fs-4">Duration with Subjects Wise
                                    </span>
                                </span>
                            </label>
                            <!--end::Option-->
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>


<script>
$(document).ready(function() {
    $('.add-course-setting-form .track-form-data').on('change', function(e) {
        e.preventDefault();
        var selectedValue = $(this).val();
        $.AryaAjax({
            url: '{base_url}exam/ajax/update_exam_setting',
            type: 'POST',
            data: {
                'setting_type': selectedValue,
                default: '<?=$ttlExams?>',
                token : `<?=$this->token->encode([
                    'center_id' => $this->center_model->isCenter() ? $this->center_model->loginId() : base64_decode($center_id)
                ])?>`
            }
        }).then(function(response) {
            console.log(response);
            if (response.status) {
                location.reload();
            } else {
                alert(response.message);
            }
        });

        /*
        var formData = {};
        $('.add-course-setting-form .track-form-data').each(function() {
            var name = $(this).attr('name');
            var value = $(this).is(':checked') ? $(this).val() : null;
            if (value !== null) {
                formData[name] = value;
            }
        });
        console.log(formData);
        // Send the formData via AJAX
        // $.ajax({
        //     url: '{site_url}exam/center_exam_setting/update_exam_setting/{center_id}',
        //     type: 'POST',
        //     data: formData,
        //     success: function(response) {
        //         // Handle success response
        //         location.reload();
        //     },
        //     error: function(xhr, status, error) {
        //         // Handle error response
        //         alert('An error occurred while saving the settings. Please try again.');
        //     }
        // });
        */
    });
});
</script>