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
                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2" data-kt-countup="true"
                        data-kt-countup-value="<?= $this->student_model->get_switch('all', [
                            'without_admission_status' => true,
                            'admission_status' => 1
                        ])->num_rows() ?>">
                        0
                    </span>
                    <!--end::Number-->

                    <!--begin::Follower-->
                    <div class="m-0">
                        <span class="fw-semibold fs-6 text-gray-500">
                            Active Student(s) </span>

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
                        <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2" data-kt-countup="true"
                            data-kt-countup-value="<?= $this->center_model->get_center()->num_rows() ?>">
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
                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2" data-kt-countup="true"
                        data-kt-countup-value="<?= $this->SiteModel->ttl_courses() ?>">
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

<div class="row mt-3">
    <?php
    if($this->center_model->isCenter()){
    ?>
    <div class="col-md-6">
        <div class="card card-flush h-md-100 border-primary border-dashed border-3 shadow">
            <!--begin::Body-->
            <div class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0"
                style="background-position: 100% 50%; background-image:url('https://aadesignpaintingpolish.in/assets/metro-theme/assets/media/stock/900x600/42.png')">
                <!--begin::Wrapper-->
                <div class="mb-10">
                    <!--begin::Title-->
                    <div class="fs-2hx fw-bold text-gray-800 text-center mb-13">
                        <span class="me-2">
                            Certificate
                            <br>
                            <?php
                            if ($isValid = ($center_data['valid_upto'] && $center_data['certificate_issue_date'])):
                                if(strtotime($center_data['valid_upto']) >= time()){
                                ?>
                                <span class="position-relative d-inline-block text-primary">
                                    <a href="#" data-id="<?=$center_data['id']?>" data-type="center_certificate" class="click-to-view-link text-primary opacity-75-hover">
                                        <i class="fa fa-eye fs-2hx text-primary"></i> View</a>
                                    <!--begin::Separator-->
                                    <span
                                        class="position-absolute opacity-15 bottom-0 start-0 border-4 border-primary border-bottom w-100"></span>
                                    <!--end::Separator-->
                                </span>
                                <?php
                                }
                                else
                                    echo '<span class="text-danger">Expired</span>';
                                
                            endif;
                            ?>
                        </span>
                    </div>
                    <!--end::Title-->
                    <?php
                    if ($isValid):
                        ?>
                        <!--begin::Action-->
                        <div class="text-center">
                            <span>
                                Issued on <strong><?=date('d F Y',strtotime($center_data['certificate_issue_date']))?></strong></span>
                        </div>
                        <!--begin::Action-->
                        <!--begin::Action-->
                        <div class="text-center">
                            <span>
                                Expired on <strong><?=date('d F Y',strtotime($center_data['valid_upto']))?></strong> </span>
                        </div>
                        <!--begin::Action-->
                        <?php
                    endif;
                    ?>
                </div>
                <!--begin::Wrapper-->
                <!--begin::Illustration-->
                <img class="mx-auto h-150px h-lg-200px  theme-light-show"
                    src="https://aadesignpaintingpolish.in/assets/metro-theme/assets/media/illustrations/misc/upgrade.svg"
                    alt="">
                <img class="mx-auto h-150px h-lg-200px  theme-dark-show"
                    src="https://aadesignpaintingpolish.in/assets/metro-theme/assets/media/illustrations/misc/upgrade-dark.svg"
                    alt="">
                <!--end::Illustration-->
            </div>
            <!--end::Body-->
        </div>
    </div>
    <?php
    }
    ?>
</div>