<!--begin::Navbar-->
<div class="card mb-5 mb-xl-10">
    <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap">

            <!--begin::Info-->
            <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <!--begin::User-->
                    <div class="d-flex flex-column">
                        <!--begin::Name-->
                        <div class="d-flex align-items-center mb-2">
                            <a href="#"
                                class="text-gray-900 text-hover-primary fs-2 fw-bold me-1 student-name">{institute_name}</a>
                            <a href="#" class="student-status "><i
                                    class="ki-outline ki-verify fs-1 text-primary"></i></a>

                        </div>
                        <!--end::Name-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                            <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                <i class="ki-outline ki-profile-circle fs-4 me-1"></i> Center
                            </a>
                            <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                <i class="ki-outline ki-geolocation fs-4 me-1"></i> &nbsp; <spn class="student-address">
                                    {center_full_address}</spn>
                            </a>
                            <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                                <i class="ki-outline ki-sms fs-4"></i> &nbsp;<span class="student-email">{email}</span>
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
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center flex-wrap">
                                    <?= $this->ki_theme->keen_icon('people', 5, 1, 'outline text-success') ?>
                                    <div class="fs-2 fw-bold" data-kt-countup="true"
                                        data-kt-countup-value="{ttl_student}">0</div>
                                </div>
                                <!--end::Number-->
                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-500 align-items-center flex-wrap w-100">
                                    Student(s)
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center flex-wrap">
                                    <?= $this->ki_theme->keen_icon('book', 5, 1, 'outline text-success') ?>
                                    <div class="fs-2 fw-bold me-5" data-kt-countup="true"
                                        data-kt-countup-value="{ttl_course}">0</div>
                                </div>
                                <!--end::Number-->
                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-500 align-items-center flex-wrap w-100">
                                    Course(s)
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
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
                            <div class="border border-danger border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-2 fw-bold student-dob">{valid_upto} </div>
                                </div>
                                <!--end::Number-->
                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-danger">Valid Upto</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
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
<!--end::Navbar-->
<!--begin::details View-->
<?php
// echo $student_id;
if (file_exists(__DIR__ . '/panel/' . $tab . EXT)) {
    echo $this->parser->parse('center/panel/' . $tab, $center_details, true);
}
?>
<!--end::details View-->