
<?php
$array = [
    'student_admission_fees' => 'Student Admission Fee(s)',
    'exam_fee' => 'Student Exam Fee',
    'student_marksheet_fees' => 'Student Marksheet Fee',
    'student_certificate_fees' => 'Student Certificate Fee'
];
?>

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 mb-4">
        <div class="timeline ">
            <!--begin::Timeline item-->
            <div class="timeline-item align-items-center mb-8">
        

                <!--begin::Symbol-->
                <div class="symbol symbol-60px me-4">
                    <span class="symbol-label bg-light-primary border">
                        <i class="ki-duotone ki-credit-cart text-primary fs-2hx"><span
                                class="path1"></span><span class="path2"></span><span class="path3"></span><span
                                class="path4"></span><span class="path5"></span></i>
                    </span>
                </div>
                <!--end::Symbol-->

                <!--begin::Timeline content-->
                <div class="timeline-content m-0">
                    <!--begin::Title-->
                    <span class="fs-6 text-gray-800 fw-bold d-block"><?=$array[$type]?></span>
                    <!--end::Title-->

                    <!--begin::Badge-->
                    <span class="badge badge-light-success fw-bold my-2 fs-1">
                    
                    <span data-kt-countup="true" data-kt-countup-value="{fee}"
                    data-kt-countup-prefix=' ₹ '>0</span>
                    </span>
                    <!--end::Badge-->
                </div>
                <!--end::Timeline content-->

                <!--begin::Time-->
               
              
                <!--end::Title-->
            </div>
            <!--end::Timeline item-->
        </div>
    </div>
</div>