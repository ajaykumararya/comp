<?php
if (PATH == 'zcc' && isset($student_docs) && $student_docs) {
    $docs = json_decode($student_docs, true);
    if (sizeof($docs)) {
        $r = $this->ki_theme->project_config('upload_ducuments');
        $Events = array_flip($r);
        $data = [];
        foreach ($docs as $key => $link) {
            if (!array_key_exists($key, $r))
                $key = ($key == '') ? 'family_id_document' : @$Events[$key];
            $data[$key] = $link;
        }
        // pre($data);
        $this->db->update('students', ['upload_docs' => json_encode($data)], ['id' => $student_id]);
    }
}
$profile_url = base_url('student-details/') . $this->token->encode([
    'student_id' => $student_id
]);
$remaining_fee = 0;
if (!CHECK_PERMISSION('CO_ORDINATE_SYSTEM')) {
    $remaining_fee = $this->student_model->remaining_course_fees([
        'student_id' => $student_id,
        'center_id' => $institute_id,
        'course_id' => $course_id
    ]);
}

        switch($admission_status_value){
            case 0:
                echo alert('This account is on pending list.','warning');
            break;
            case 2:
                echo alert('This account is on cancel list.','danger');
            break;
        }
?>
<!--begin::Navbar-->
<div class="overflow-hidden  position-relative card-rounded">
    <?php
    if ($this->center_model->isAdminOrCenter()) {
        ?>
        <!--begin::Ribbon-->
        <div class="ribbon ribbon-triangle ribbon-top-end border-primary">
            <!--begin::Ribbon icon-->
            <div class="ribbon-icon mt-n5 me-n6 cursor-pointer" data-kt-menu-trigger="click"
                data-kt-menu-placement="bottom-end">
                <i class="bi bi-search fs-2 text-white"></i>
            </div>
            <!--end::Ribbon icon-->
            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px border border-1 border-primary"
                data-kt-menu="true" id="kt_menu_66bb6ef30759d" style=""
                data-select2-id="select2-data-kt_menu_66bb6ef30759d">
                <!--begin::Header-->
                <div class="px-7 py-5">
                    <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                </div>
                <!--end::Header-->

                <!--begin::Menu separator-->
                <div class="separator border-primary"></div>
                <!--end::Menu separator-->


                <!--begin::Form-->
                <div class="px-7 py-5" data-select2-id="select2-data-120-tpsc">
                    <div class="mb-10">
                        <!--begin::Label-->
                        <label class="form-label fw-semibold">Select Sudent:</label>
                        <!--end::Label-->

                        <!--begin::Options-->
                        <div class="d-flex">
                            <select name="student_id" data-control="select2" data-placeholder="Select Student"
                                class="form-select first m-h-100px get-std-id" data-allow-clear="true">
                                <option></option>
                            </select>
                        </div>
                        <div class="d-flex">
                            <ol class="mt-3" type="l">
                                <li>{rollno_text}</li>
                                <li>Name</li>
                                <li>Mobile</li>
                            </ol>
                        </div>
                        <div class="d-flex message"></div>
                        <!--end::Options-->
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="form-check form-check-custom form-check-solid me-2">
                            <input class="form-check-input" type="checkbox" value="1" id="openNEwTab" />
                            <label class="form-check-label text-dark" for="openNEwTab">
                                Open New Tab
                            </label>
                        </div>
                        <button type="button" class="btn btn-sm btn-primary search">Apply</button>
                    </div>
                </div>
                <!--end::Form-->
            </div>
        </div>
        <!--end::Ribbon-->
        <?php
    }
    ?>
    <div class="card mb-5 mb-xl-10">
        <div class="card-body pt-9 pb-0">
            <!--begin::Details-->
            <div class="d-flex flex-wrap flex-sm-nowrap">
                <!--begin: Pic-->
                <div class="me-7 mb-4 " align="center">
                    <input type="hidden" id="student_id" value="{student_id}">
                    <?php
                    $file_exists = file_exists('upload/' . $image);
                    ?>
                    <style>
                        .image-input-empty {
                            background-image: url('{base_url}assets/media/svg/avatars/blank.svg') !important;
                            background-size: 100% 100% !important
                        }

                        [data-bs-theme="dark"] .image-input-empty {
                            background-image: url('{base_url}assets/media/svg/avatars/blank-dark.svg') !important;
                        }
                    </style>
                    <!--begin::Image input-->
                    <div class="image-input image-input-<?= $file_exists ? 'placeholder' : 'empty' ?>"
                        data-kt-image-input="true" style="
                    <?php
                    if ($file_exists) {
                        echo 'background-image:url(' . base_url('upload/' . $image) . ')!important;
                        background-size:100% 100%!important';
                    }
                    ?>
                    ">
                        <!--begin::Image preview wrapper-->
                        <div class="image-input-wrapper w-125px h-125px"></div>
                        <!--end::Image preview wrapper-->
                        <?php
                        if ($this->center_model->isAdminOrCenter()) {
                            ?>
                            <!--begin::Edit button-->
                            <label
                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                title="Change avatar">
                                <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span
                                        class="path2"></span></i>

                                <!--begin::Inputs-->
                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit button-->



                            <!--begin::Cancel button-->
                            <span
                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                title="Cancel avatar">
                                <i class="ki-outline ki-cross fs-3"></i>
                            </span>
                            <!--end::Cancel button-->

                            <!--begin::Remove button-->
                            <span
                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                title="Remove avatar">
                                <i class="ki-outline ki-cross fs-3"></i>
                            </span>
                            <!--end::Remove button-->
                            <?php
                        }
                        ?>
                    </div>
                    <!--end::Image input-->
                </div>
                <!--end::Pic-->
                <!--begin::Info-->
                <div class="flex-grow-1">
                    <!--begin::Title-->
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <!--begin::User-->
                        <div class="d-flex flex-column">
                            <!--begin::Name-->
                            <div class="d-flex align-items-center mb-2">
                                <a href="<?= $profile_url ?>" target="_blank" data-bs-custom-class="tooltip-inverse"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    data-bs-original-title="View Profile Details"
                                    class="text-gray-900 text-hover-primary fs-2 fw-bold me-1 student-name">{student_name}</a>
                                <a href="<?= $profile_url ?>" target="_blank" data-bs-custom-class="tooltip-inverse"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    data-bs-original-title="View Profile Details"
                                    class="student-status <?= ($student_profile_status) ? '' : 'd-none' ?>"><i
                                        class="ki-outline ki-verify fs-1 text-primary"></i></a>
                                <a href="<?= $profile_url ?>" target="_blank" data-bs-custom-class="tooltip-inverse"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    data-bs-original-title="View Profile Details"><i
                                        class="ki-outline ki-eye fs-1 text-success"></i></a>
                            </div>
                            <!--end::Name-->
                            <!--begin::Info-->
                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                <a href="#"
                                    class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                    <i class="ki-outline ki-profile-circle fs-4 me-1"></i> Student
                                </a>
                                <a href="#"
                                    class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                    <i class="ki-outline ki-geolocation fs-4 me-1"></i> &nbsp; <spn
                                        class="student-address">
                                        {address}</spn>
                                </a>
                                <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                                    <i class="ki-outline ki-sms fs-4"></i> &nbsp;<span
                                        class="student-email">{email}</span>
                                </a>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Title-->
                    <!--begin::Stats-->
                    <div class="d-flex flex-wrap flex-stack">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column flex-grow-1 pe-8">
                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap">
                                <!--begin::Stat-->
                                <div
                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-2 mb-3">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center flex-wrap">
                                        <div class="fs-2 fw-bold me-5" id="roll_no">{roll_no}</div>
                                        <button class="btn btn-icon btn-sm btn-light" data-bs-toggle="tooltip"
                                            data-bs-trigger="hover" data-bs-original-title="Copy"
                                            data-bs-custom-class="tooltip-inverse" data-clipboard-target="#roll_no">
                                            <i class="ki-duotone ki-copy fs-2 text-muted"></i>
                                        </button>
                                    </div>
                                    <!--end::Number-->
                                    <!--begin::Label-->
                                    <div class="fw-semibold fs-6 text-gray-500 align-items-center flex-wrap w-100">
                                        {rollno_text}
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Stat-->
                                <!--begin::Stat-->
                                <div
                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-2 mb-3">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">
                                        <div class="fs-2 fw-bold student-dob">{dob} </div>
                                    </div>
                                    <!--end::Number-->
                                    <!--begin::Label-->
                                    <div class="fw-semibold fs-6 text-gray-500">Date of Birth</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Stat-->

                                <!--begin::Stat-->
                                <div
                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-2 mb-3">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">
                                        <div class="fs-2 fw-bold text-capitalize student-gender">{gender} </div>
                                    </div>
                                    <!--end::Number-->
                                    <!--begin::Label-->
                                    <div class="fw-semibold fs-6 text-gray-500">Gender</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Stat-->
                                <?php
                                if (CHECK_PERMISSION('REFERRAL_ADMISSION')) {
                                    ?>
                                    <!--begin::Stat-->
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-2 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center flex-wrap">
                                            <?= $this->ki_theme->keen_icon('people', 5, 1, 'outline text-success') ?>
                                            <div class="fs-2 fw-bold me-5" data-kt-countup="true"
                                                data-kt-countup-value="<?= $this->student_model->coupon_by($student_id)->num_rows() ?>">
                                                0</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-semibold fs-6 text-gray-500 align-items-center flex-wrap w-100">
                                            Students Referred By
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <?php
                                }

                                if (!CHECK_PERMISSION('CO_ORDINATE_SYSTEM')) {
                                    ?>
                                    <!--begin::Stat-->
                                    <div class="border border-danger border-dashed rounded min-w-125px py-3 px-4 me-2 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center flex-wrap">
                                            <?= $this->ki_theme->keen_icon('bank', 5, 1, 'outline text-danger') ?>
                                            <div class="fs-2 fw-bold me-5 text-danger" data-kt-countup="true"
                                                data-kt-countup-value="<?= $remaining_fee ?>">
                                                0</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-semibold fs-6 text-danger align-items-center flex-wrap w-100">
                                            Remaining Course Fee
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <?php
                                }

                                if (CHECK_PERMISSION('CUSTOM_STUDENT_FEE')) {
                                    ?>
                                    <!--begin::Stat-->
                                    <div
                                        class="border border-success border-dashed rounded min-w-125px py-3 px-4 me-2 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center flex-wrap">
                                            <?= $this->ki_theme->keen_icon('bank', 5, 1, 'outline text-success') ?>
                                            <div class="fs-2 fw-bold me-5" data-kt-countup="true"
                                                data-kt-countup-value="<?= $custom_fee ?>">
                                                0</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-semibold fs-6 text-success align-items-center flex-wrap w-100">
                                            Total Course Fee
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <?php
                                }
                                ?>


                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Progress-->
                        <div class="d-none d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                            <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                <span class="fw-semibold fs-6 text-gray-500">Profile Compleation</span>
                                <span class="fw-bold fs-6">50%</span>
                            </div>
                            <div class="h-5px mx-3 w-100 bg-light mb-3">
                                <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;"
                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <!--end::Progress-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Info-->
            </div>
            <!--end::Details-->
            <!--begin::Navs-->
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                <!--begin::Nav item-->
                <?php
                foreach ($tabs as $type => $data) {
                    $active = $type == $tab ? 'active' : '';
                    $icon = '';
                    $link = $current_link;
                    if (isset($data['url']) and $data['url'])
                        $link = "$current_link/{$data['url']}";
                    if (isset($data['icon'])) {
                        list($class, $path) = $data['icon'];
                        $icon = $this->ki_theme->keen_icon($class, $path);
                    }
                    ?>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 <?= $active ?>" href="<?= $link ?>">
                            <?= $icon ?>
                            <?= str_replace('Account', '', $data['title']) ?>
                        </a>
                    </li>
                    <!--end::Nav item-->
                    <?php
                }
                ?>
            </ul>
            <!--begin::Navs-->
        </div>
    </div>
</div>

<!--end::Navbar-->
<!--begin::details View-->
<?php
$this->ki_theme->check_it_referral_stduent($student_id);
// echo $student_id;
if (file_exists(__DIR__ . '/panel/' . $tab . EXT)) {
    echo $this->parser->parse('student/panel/' . $tab, $student_details, true);
}
?>
<!--end::details View-->