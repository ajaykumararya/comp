<div class="row">
    <div class="col-sm-6 col-xl-2 mb-xl-10">

        <!--begin::Card widget 2-->
        <div class=" h-lg-100 shadow {card_class}">
            <!--begin::Body-->
            <div class="card-body card-image d-flex justify-content-between align-items-start flex-column">
                <!--begin::Icon-->
                <div class="m-0">
                    <i class="ki-duotone ki-people fs-2hx text-gray-600">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                    </i>

                </div>
                <!--end::Icon-->

                <!--begin::Section-->
                <div class="d-flex flex-column my-7">
                    <!--begin::Number-->
                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2"
                    data-kt-countup="true" data-kt-countup-value="<?= $this->student_model->get_switch('all',[
                            'without_admission_status' => true
                        ])->num_rows() ?>"
                    >
                        0
                    </span>
                    <!--end::Number-->

                    <!--begin::Follower-->
                    <div class="m-0">
                        <span class="fw-semibold fs-6 text-gray-500">
                            Student(s) </span>

                    </div>
                    <!--end::Follower-->
                </div>
                <!--end::Section-->

            </div>
            <!--end::Body-->
        </div>
        <!--end::Card widget 2-->


    </div>
    <?php
    if ($this->center_model->isAdmin()) {
        ?>
        <div class="col-sm-6 col-xl-2 mb-xl-10">

            <!--begin::Card widget 2-->
            <div class=" h-lg-100 shadow {card_class}">
                <!--begin::Body-->
                <div class="card-body card-image d-flex justify-content-between align-items-start flex-column">
                    <!--begin::Icon-->
                    <div class="m-0">
                        <i class="ki-duotone ki-people fs-2hx text-gray-600">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                        </i>

                    </div>
                    <!--end::Icon-->

                    <!--begin::Section-->
                    <div class="d-flex flex-column my-7">
                        <!--begin::Number-->
                        <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2"
                        data-kt-countup="true" data-kt-countup-value="<?= $this->center_model->get_center()->num_rows() ?>"
                        >
                            0
                        </span>
                        <!--end::Number-->

                        <!--begin::Follower-->
                        <div class="m-0">
                            <span class="fw-semibold fs-6 text-gray-500">
                                Center(s) </span>

                        </div>
                        <!--end::Follower-->
                    </div>
                    <!--end::Section-->

                </div>
                <!--end::Body-->
            </div>
            <!--end::Card widget 2-->


        </div>
        <?php
    }
    // ttl_courses
    ?>
    <div class="col-sm-6 col-xl-2 mb-xl-10">

<!--begin::Card widget 2-->
<div class=" h-lg-100 shadow {card_class}">
    <!--begin::Body-->
    <div class="card-body card-image d-flex justify-content-between align-items-start flex-column">
        <!--begin::Icon-->
        <div class="m-0">
            <i class="ki-duotone ki-book fs-2hx text-gray-600">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
                <span class="path5"></span>
            </i>

        </div>
        <!--end::Icon-->

        <!--begin::Section-->
        <div class="d-flex flex-column my-7">
            <!--begin::Number-->
            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2"
            data-kt-countup="true" data-kt-countup-value="<?= $this->SiteModel->ttl_courses() ?>"
            >
                0
            </span>
            <!--end::Number-->

            <!--begin::Follower-->
            <div class="m-0">
                <span class="fw-semibold fs-6 text-gray-500">
                    Course(s) </span>

            </div>
            <!--end::Follower-->
        </div>
        <!--end::Section-->

    </div>
    <!--end::Body-->
</div>
<!--end::Card widget 2-->


</div>
</div>