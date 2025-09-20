<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>
        <?= $this->ki_theme->get_title() ?> - Admin Panel
    </title>
    <meta charset="utf-8" />
    <meta name="description" content="
            The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, 
            Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. 
            Grab your copy now and get life-time updates for free.
        " />
    <meta name="keywords" content="
            metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, 
            Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, 
            free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, 
            bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon
        " />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Admin Panel" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Metronic by Keenthemes" />
    <link rel="canonical" href="<?= base_url() ?>/metronic8" />
    <link rel="shortcut icon" href="{base_url}assets/media/logos/favicon.ico" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{base_url}assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{base_url}assets/plugins/custom/vis-timeline/vis-timeline.bundle.css" rel="stylesheet"
        type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{base_url}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{base_url}assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css" />
    <!--end::Global Stylesheets Bundle-->
    <link rel="stylesheet" href="{base_url}assets/icon-picker/dist/iconpicker-1.5.0.css">
    <script src="{base_url}assets/icon-picker/dist/iconpicker-1.5.0.js"></script>
    <link rel="stylesheet" href="{base_url}assets/custom/custom.css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <link href="{base_url}/assets/animation.css" rel="stylesheet" type="text/css" />
    <script src="{base_url}assets/plugins/global/plugins.bundle.js"></script>
    <script src="{base_url}assets/js/scripts.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="https://mark-freq32.c9.io/mark3/js/jquery.ui.touch-punch.min.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{base_url}assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="{base_url}assets/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>
    <script src="{base_url}assets/lib/5/index.js"></script>
    <script src="{base_url}assets/lib/5/xy.js"></script>
    <script src="{base_url}assets/lib/5/percent.js"></script>
    <script src="{base_url}assets/lib/5/radar.js"></script>
    <script src="{base_url}assets/lib/5/themes/Animated.js"></script>
    <!--end::Vendors Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.js.iife.js"></script>
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{base_url}assets/js/widgets.bundle.js"></script>
    <script src="{base_url}assets/js/custom/widgets.js"></script>
    <script src="{base_url}assets/custom/jquery.nestable.js"></script>
    <style>
        .file-btn input {
            display: none;
        }

        .pulse-ring {
            height: 37px !important;
            width: 37px !important
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type="number"] {
            -moz-appearance: textfield;
        }

        tr .eye-btn {
            display: none;
        }

        .click-to-copy {
            user-select: none;
            cursor: pointer;
        }

        tr:hover .eye-btn {
            display: inline-block;
        }

        .card-image {
            background-position: 100% 50%;
            background-repeat: no-repeat;
            background-image:url('{base_url}assets/media/stock/900x600/42.png')
        }

        .table-container {
            overflow: scroll;
        }

        .table-container table th,
        .table-container table td {
            white-space: nowrap;
            padding: 10px 20px;
            font-family: Arial;
        }

        .table-container table tr th:first-child,
        .table-container table td:first-child {
            position: sticky;
            width: 100px;
            left: 0;
            z-index: 10;
        }

        .table-container table tr th:first-child {
            z-index: 11;
        }

        .table-container table tr th {
            position: sticky;
            top: 0;
            z-index: 9;
        }

        .hide {
            display: none;
        }

        .custom_setting_input {
            font-size: 21px;
            background: transparent;
            border: 0;
            outline: 0;
            width: 100%;
        }

        .br-none {
            border-radius: 0px !important
        }

        [data-bs-theme=dark] #datatables_buttons_info {
            background-color: var(--bs-scrollbar-color)
        }


        #IconPreview {
            color: black !important;
        }

        [data-bs-theme=dark] #IconPreview {
            color: white !important;
        }

        #file-list {
            display: flex;
            flex-wrap: wrap;
        }

        div:where(.swal2-container) {
            z-index: 99999 !important;
        }
    </style>
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" class="page-loading" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default"
    <?= sidebar_toggle('data-kt-app-sidebar-minimize="on"') ?>
    uri-segs='<?= json_encode($this->uri->segment_array()) ?>'>
    <?php
    if (CHECK_PERMISSION('WALLET_SYSTEM_COURSE_WISE')) {
        echo '<input type="hidden" id="wallet_system_course_wise">';
    }
    ?>
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }            
    </script>
    <!--end::Theme mode setup on page load-->

    <!--begin::Page loading(append to body)-->
    <div class="page-loader flex-column bg-dark bg-opacity-25">
        <span class="spinner-border text-primary" role="status"></span>
        <span class="text-gray-800 fs-6 fw-semibold mt-5">Loading...</span>
    </div>
    <!--end::Page loading-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header " data-kt-sticky="true"
                data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize"
                data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">
                <!--begin::Header container-->
                <div class="app-container  container-fluid d-flex align-items-stretch justify-content-between border-bottom-dashed border-bottom border-gray-300"
                    id="kt_app_header_container">
                    <!--begin::Sidebar mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px"
                            id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                    </div>
                    <!--end::Sidebar mobile toggle-->
                    <!--begin::Mobile logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="{base_url}admin" class="text-capitalize text-warning fs-1 fw-bold">
                            <!-- <img alt="Logo" src="{base_url}assets/media/logos/default-small.svg" class="h-30px" /> -->
                            <?php
                            // echo ucfirst($this->session->userdata('admin_type'));
                            if ($this->center_model->isCenter()) {
                                echo $center_data['institute_name'] . ' ' . label('ID ' . $center_data['center_number'], 'info fs-4');
                                echo label('Valid Upto : '.$center_data['valid_upto'],'primary fs-4');
                                echo "\t";
                                echo $center_data['status'] ? label('Active','success fs-4') : label('In-Active','danger fs-4');
                            }
                            ?>
                        </a>
                    </div>
                    <!--end::Mobile logo-->
                    <!--begin::Header wrapper-->
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1"
                        id="kt_app_header_wrapper">
                        <!--begin::Menu wrapper-->
                        <div class="
        app-header-menu 
        app-header-mobile-drawer 
        align-items-stretch
    " data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                            data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
                            data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                            data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                            data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                        </div>
                        <!--end::Menu wrapper-->
                        <!--begin::Navbar-->
                        <div class="app-navbar flex-shrink-0">

                            <?php
                            if ($this->center_model->isCenter() && (CHECK_PERMISSION('WALLET_SYSTEM') or CHECK_PERMISSION('WALLET_SYSTEM_COURSE_WISE'))) {
                                ?>
                                <!--begin::Wallet-->
                                <div class="app-navbar-item ms-1 ms-md-4 text-center ">
                                    <!--begin::Menu wrapper-->
                                    <label class="border border-primary border-dotted p-2 fs-2"
                                        style="border-radius:10px;min-width:200px">
                                        <span data-kt-countup="true" data-kt-countup-value="<?= $center_data['wallet'] ?>"
                                            data-kt-countup-prefix='{inr}'>0</span>

                                        <!-- <button class="btn btn-primary p-1 btn-sm">&nbsp;<i class="fa fa-plus"></i></button> -->
                                        <a href="{base_url}admin/wallet-load" class="btn btn-primary p-1 btn-sm"
                                            title="History">&nbsp;<i class="fa fa-plus"></i></a>

                                        <small class="d-flex" style="font-size:12px;    justify-content: center;">My
                                            Wallet</small>
                                    </label>
                                    <!--end::Menu wrapper-->
                                </div>
                                <!--end::Wallet-->

                                <?php
                            }
                            if ($this->center_model->isAdmin()) {
                                ?>

                                <!--begin::Chat-->
                                <div class="app-navbar-item ms-1 ms-md-4">
                                    <!--begin::Menu wrapper-->
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-trigger="hover"
                                        data-bs-dismiss-="click" data-bs-original-title="Filemanager"
                                        class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px position-relative"
                                        id="filemanager_button">
                                        <i class="ki-outline ki-folder fs-2"> </i>
                                        <span
                                            class="bullet bullet-dot bg-danger h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink">
                                        </span>
                                    </button>
                                    <!--end::Menu wrapper-->
                                </div>
                                <!--end::Chat-->
                                <?php
                            }
                            ?>
                            <!--begin::Chat-->
                            <div class="app-navbar-item ms-1 ms-md-4">
                                <!--begin::Menu wrapper-->
                                <a href="{base_url}" target="_blank"
                                    class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px position-relative"
                                    id="kt_drawer_chat_toggle">
                                    <i class="ki-outline ki-exit-right-corner fs-2"> </i>
                                    <span
                                        class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink">
                                    </span>
                                </a>
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::Chat-->
                            <!--begin::Theme mode-->
                            <div class="app-navbar-item ms-1 ms-md-4">
                                <!--begin::Menu toggle-->
                                <a href="#"
                                    class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px"
                                    data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    <i class="ki-duotone ki-night-day theme-light-show fs-1"><span
                                            class="path1"></span><span class="path2"></span><span
                                            class="path3"></span><span class="path4"></span><span
                                            class="path5"></span><span class="path6"></span><span
                                            class="path7"></span><span class="path8"></span><span
                                            class="path9"></span><span class="path10"></span></i> <i
                                        class="ki-duotone ki-moon theme-dark-show fs-1"><span class="path1"></span><span
                                            class="path2"></span></i></a>
                                <!--begin::Menu toggle-->
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                    data-kt-menu="true" data-kt-element="theme-mode-menu">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                            data-kt-value="light">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="ki-duotone ki-night-day fs-2"><span class="path1"></span><span
                                                        class="path2"></span><span class="path3"></span><span
                                                        class="path4"></span><span class="path5"></span><span
                                                        class="path6"></span><span class="path7"></span><span
                                                        class="path8"></span><span class="path9"></span><span
                                                        class="path10"></span></i> </span>
                                            <span class="menu-title">
                                                Light
                                            </span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                            data-kt-value="dark">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="ki-duotone ki-moon fs-2"><span class="path1"></span><span
                                                        class="path2"></span></i> </span>
                                            <span class="menu-title">
                                                Dark
                                            </span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                            data-kt-value="system">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="ki-duotone ki-screen fs-2"><span class="path1"></span><span
                                                        class="path2"></span><span class="path3"></span><span
                                                        class="path4"></span></i> </span>
                                            <span class="menu-title">
                                                System
                                            </span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Theme mode-->
                            <!--begin::User menu-->
                            <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="cursor-pointer symbol symbol-35px"
                                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    <img src="{profile_image}" class="rounded-3 owner-image" alt="user" />
                                    <?php
                                    if ($this->center_model->isCenter() && table_exists('manual_notifications')) {

                                        $notificationCount = $this->ki_theme->count_manual_notification([
                                            'receiver_id' => $this->center_model->loginId(),
                                            'receiver_user' => 'center'
                                        ]);
                                        if ($notificationCount)
                                            echo '<span class="badge badge-info animation-blink position-absolute translate-middle top-0 start-100">' . $notificationCount . '</span>';
                                    }

                                    ?>

                                </div>
                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo" src="{profile_image}" class="owner-image" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5">
                                                    {owner_name} <span
                                                        class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{owner_type}</span>
                                                </div>
                                                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                                    {owner_email} </a>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <!--end::Menu separator-->
                                    <div class="separator my-2"></div>

                                    <?php
                                    if ($this->center_model->isCenter()) {
                                        ?>
                                        <div class="menu-item px-5" align="center">
                                             <?= label('ID '.$center_data['center_number'],'info fs-4')?>
                                        </div>
                                        <div class="separator my-2"></div>

                                        <?php
                                    }
                                    ?>
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="{base_url}admin/profile" class="menu-link px-5">
                                            My Profile
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <?php
                                    if ($this->center_model->isCenter() && table_exists('manual_notifications')) {
                                        ?>
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="{base_url}center/notification" class="menu-link px-5">
                                                <span class="menu-title position-relative">
                                                    Notification
                                                    <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                                                        <?= badge($notificationCount, 'info') ?>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                        <?php
                                    }
                                    ?>
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5 set-sound-setting"
                                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                        data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                        <span class="menu-link px-5 ">
                                            <span class="menu-title position-relative">
                                                Sound
                                                <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                                                    <i
                                                        class="ki-duotone ki-cross-square sound-no fs-2 bg-danger text-black">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <i
                                                        class="ki-duotone ki-check-square bg-success text-black fs-2 sound-yes"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="{base_url}admin/change-password" class="menu-link px-5">
                                            Change Password
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="{base_url}admin/sign-out" class="menu-link px-5">
                                            Sign Out
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu-->
                            <!--begin::Header menu toggle-->
                            <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
                                <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px"
                                    id="kt_app_header_menu_toggle">
                                    <i class="ki-duotone ki-element-4 fs-1"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </div>
                            </div>
                            <!--end::Header menu toggle-->
                            <!--begin::Aside toggle-->
                            <!--end::Header menu toggle-->
                        </div>
                        <!--end::Navbar-->
                    </div>
                    <!--end::Header wrapper-->
                </div>
                <!--end::Header container-->
                <?php
                if ($this->ki_theme->isDiwali() && isDemo())
                    require FCPATH . 'diwali.php';
                ?>
            </div>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
                <!--begin::Sidebar-->
                <div id="kt_app_sidebar" class="app-sidebar  flex-column " data-kt-drawer="true"
                    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                    <!--begin::Logo-->
                    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">

                        <div class="d-flex">
                            <!--begin::User info-->
                            <!--begin::Menu wrapper-->
                            <div class="cursor-pointer symbol symbol-35px">
                                <img src="{profile_image}" class="rounded-3 owner-image" alt="user" />


                            </div>
                            <a href="{base_url}admin/profile" style="line-height:1"
                                class="text-white text-hover-primary fs-4 fw-bold ms-3 app-sidebar-minimize-d-none profile-title">
                                {owner_name} <span
                                    class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{owner_type}</span>
                            </a>
                            <!--end::User account menu-->
                        </div>



                        <!--begin::Logo image-->
                        <!-- <a href="{base_url}admin" class="fs-1"> -->
                        <?php
                        // echo isset($_COOKIE["sidebar_minimize_state"]) && $_COOKIE["sidebar_minimize_state"] === "on";
                        // echo ucfirst($this->session->userdata('admin_type')) . ' Panel';
                        ?>
                        <!-- <img alt="Logo" src="{base_url}assets/media/logos/default-dark.svg"
                                class="h-25px app-sidebar-logo-default" />
                            <img alt="Logo" src="{base_url}assets/media/logos/default-small.svg"
                                class="h-20px app-sidebar-logo-minimize" /> -->
                        <!-- </a> -->
                        <!--end::Logo image-->
                        <!--begin::Sidebar toggle-->
                        <!--begin::Minimized sidebar setup: -->
                        <?php
                        // $attrs = $class ;
                        // if (isset($_COOKIE["sidebar_minimize_state"]) && $_COOKIE["sidebar_minimize_state"] === "on") { 
                        //     // 1. "src/js/layout/sidebar.js" adds "sidebar_minimize_state" cookie value to save the sidebar minimize state.
                        //     // 2. Set data-kt-app-sidebar-minimize="on" attribute for body tag.
                        //     // 3. Set data-kt-toggle-state="active" attribute to the toggle element with "kt_app_sidebar_toggle" id.
                        //     // 4. Add "active" class to to sidebar toggle element with "kt_app_sidebar_toggle" id.
                        // }
                        ?>
                        <div id="kt_app_sidebar_toggle"
                            class="app-sidebar-toggle <?= sidebar_toggle('active') ?> btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate "
                            data-kt-toggle="<?= sidebar_toggle('active', 'true') ?>" data-kt-toggle-state="active"
                            data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
                            <i class="ki-duotone ki-black-left-line fs-3 rotate-180"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Sidebar toggle-->
                    </div>
                    <!--end::Logo-->
                    <!--begin::sidebar menu-->
                    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                        <!--begin::Menu wrapper-->
                        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
                            <!--begin::Scroll wrapper-->
                            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
                                data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                                data-kt-scroll-save-state="true">
                                <!--begin::Menu-->
                                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6"
                                    id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                                    {menu_item}
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Scroll wrapper-->
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::sidebar menu-->
                    <!--begin::Footer-->
                    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">

                        <?php
                        if ($this->center_model->isAdmin() or $this->session->userdata('temp_login')) {

                            ?>
                            <div class="d-flex flex-column flex-center flex-column-fluid">
                                <?php
                                if ($this->session->userdata('temp_login')) {
                                    echo '<a href="' . base_url('admin/switch-back') . '" class="btn btn-sm btn-light btn-active-light-primary me-2"><i class="fa fa-arrow-left"></i> Switch Back</a>';
                                } else {
                                    ?>
                                    <a href="#"
                                        class="btn btn-sm btn-flex btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary app-sidebar-minimize-d-none fw-bold"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="left-start">
                                        <i class="ki-duotone ki-entrance-left fs-6 text-primary me-1"><span
                                                class="path1"></span><span class="path2"></span></i>
                                        Login as centre
                                    </a>
                                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                                        id="kt_menu_66ed51d91ec62"
                                        style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-107.333px, 81.3333px, 0px);"
                                        data-popper-placement="left-start" data-select2-id="select2-data-kt_menu_66ed51d91ec62">
                                        <!--begin::Header-->
                                        <div class="px-7 py-5">
                                            <div class="fs-5 text-gray-900 fw-bold">Login As Centre</div>
                                        </div>
                                        <!--end::Header-->

                                        <!--begin::Menu separator-->
                                        <div class="separator border-gray-200"></div>
                                        <!--end::Menu separator-->


                                        <!--begin::Form-->
                                        <div class="px-7 py-5" data-select2-id="select2-data-123-unff">
                                            <form action="" method="POST" class="">
                                                <input type="hidden" name="status" value="temp_login">
                                                <select data-control="select2" required data-placeholder="Select Centre"
                                                    name="temp_center_id" class="form-control" autocomplete="off">
                                                    <option></option>
                                                    <?php
                                                    $centers = $this->center_model->get_center();
                                                    if ($centers->num_rows()) {
                                                        foreach ($centers->result() as $rowc) {
                                                            echo '<option value="' . $rowc->id . '">' . $rowc->institute_name . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <!--begin::Actions-->
                                                <div class="d-flex justify-content-end mt-5">
                                                    <button type="reset"
                                                        class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                        data-kt-menu-dismiss="true">Reset</button>

                                                    <button type="submit" class="btn btn-sm btn-primary"
                                                        data-kt-menu-dismiss="true">Login</button>
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                        </div>

                                    </div>

                                    <?php
                                }
                                echo '  </div>';
                        } else {
                            ?>
                                <a href="<?= base_url() ?>" target="_blank"
                                    class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
                                    title="Click for view Website.">
                                    <span class="btn-label">
                                        <?= $this->ki_theme->with_icon('screen', 4)->html() ?> <span class="fs-2">View
                                            Website</span>
                                    </span>
                                    <i class="ki-duotone ki-document btn-icon fs-2 m-0"><span class="path1"></span><span
                                            class="path2"></span></i> </a>

                                <?php
                        }
                        ?>

                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Sidebar-->
                    <!--begin::Main-->
                    <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                        <!--begin::Content wrapper-->
                        <div class="d-flex flex-column flex-column-fluid">
                            <?php
                            echo $this->ki_theme->get_breadcrumb();
                            ?>
                            <!--begin::Content-->
                            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                                <!--begin::Content container-->
                                <div id="kt_app_content_container" class="app-container  container-xxl ">
                                    {wallet_message}
                                    {page_output}
                                </div>
                                <!--end::Content container-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Content wrapper-->
                        <!--begin::Footer-->
                        <div id="kt_app_footer" class="app-footer ">
                            <!--begin::Footer container-->
                            <div
                                class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                                <!--begin::Copyright-->
                                <div class="text-dark order-2 order-md-1">
                                    <!-- <span class="text-muted fw-semibold me-1">2024&copy;</span>
                                    <a href="" target="_blank" class="text-gray-800 text-hover-primary">Arya</a> -->
                                </div>
                                <!--end::Copyright-->
                            </div>
                            <!--end::Footer container-->
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end:::Main-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::App-->
        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i>
        </div>
        <!--end::Scrolltop-->
        <button id="kt_app_layout_builder_toggle"
            class="btn btn-sm btn-flex btn-light-primary app-layout-builder-toggle lh-1 py-4"
            data-bs-custom-class="tooltip-inverse" data-bs-toggle="tooltip" data-bs-placement="left"
            data-bs-dismiss="click" data-bs-trigger="hover" data-bs-original-title="Arya CMS" data-kt-initialized="1">
            <i class="ki-solid ki-setting-4 fs-4 me-1"></i> Customize
        </button>
        <div id="kt_app_layout_builder" class="bg-body drawer drawer-end" data-kt-drawer="true"
            data-kt-drawer-name="app-settings" data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
            data-kt-drawer-width="{default:'300px', 'lg': '380px'}" data-kt-drawer-direction="end"
            data-kt-drawer-toggle="#kt_app_layout_builder_toggle" data-kt-drawer-close="#kt_app_layout_builder_close"
            style="width: 380px !important;">

            <!--begin::Card-->
            <div class="card border-0 shadow-none rounded-0 w-100">
                <!--begin::Card header-->
                <div class="card-header bgi-position-y-bottom bgi-position-x-end bgi-size-cover bgi-no-repeat rounded-0 border-0 py-4"
                    id="kt_app_layout_builder_header"
                    style="background-image:url('{base_url}assets/media/misc/layout/customizer-header-bg.jpg')">

                    <!--begin::Card title-->
                    <h3 class="card-title fs-3 fw-bold text-white flex-column m-0">Arya CMS<small
                            class="text-white opacity-50 fs-7 fw-semibold pt-1">
                            Get your product deeply customized
                        </small>
                    </h3>
                    <!--end::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-sm btn-icon btn-color-white p-0 w-20px h-20px rounded-1"
                            id="kt_app_layout_builder_close">
                            <i class="ki-solid ki-cross-square fs-2"></i> </button>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body position-relative" id="kt_app_layout_builder_body">
                    <!--begin::Content-->
                    <div id="kt_app_settings_content" class="position-relative scroll-y me-n5 pe-5"
                        data-kt-scroll="true" data-kt-scroll-height="auto"
                        data-kt-scroll-wrappers="#kt_app_layout_builder_body"
                        data-kt-scroll-dependencies="#kt_app_layout_builder_header, #kt_app_layout_builder_footer"
                        data-kt-scroll-offset="5px" style="height: 392px;">
                        <!--begin::Card body-->
                        <div class="card-body p-0">

                            <div class="mb-3">
                                <!--begin::Form group-->
                                <div class="form-group d-flex flex-stack">
                                    <!--begin::Heading-->
                                    <div class="d-flex flex-column">
                                        <h4 class="fw-bold text-gray-900">Animation Mode</h4>
                                        <div class="fs-7 fw-semibold text-muted">
                                            Enjoy with customize Animation
                                        </div>
                                    </div>
                                    <!--end::Heading-->

                                    <!--begin::Option-->
                                    <div class="d-flex justify-content-end">
                                        <div class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input animation-enabler" type="checkbox"
                                                value="" />
                                        </div>
                                    </div>
                                    <!--end::Option-->
                                </div>
                                <!--end::Form group-->
                                <div class="separator separator-dashed my-5"></div>
                                <div class="form-group d-flex flex-stack d-none">
                                    <label for="" class="form-label">Pick a Color</label>
                                    <input type="color" id="animation-color" class="animation-color-input">
                                </div>
                            </div>
                            <div class="mt-5">
                                <div class="form-group d-flex flex-stack">
                                    <!--begin::Heading-->
                                    <div class="d-flex flex-column">
                                        <h4 class="fw-bold text-gray-900">Font Family</h4>
                                        <div class="fs-7 fw-semibold text-muted current-font-family">

                                        </div>
                                    </div>
                                    <!--end::Heading-->

                                    <!--begin::Option-->
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-sm btn-primary" type="button"
                                            id="changeFont">Change</button>
                                    </div>
                                    <!--end::Option-->

                                </div>
                            </div>


                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Card body-->

            </div>
            <!--end::Card-->
        </div>
        <!--begin::View component-->
        <div id="kt_drawer_view_details_box" data-kt-drawer="true" data-kt-drawer-activate="true"
            data-kt-drawer-toggle="#kt_drawer_example_advanced_button"
            data-kt-drawer-close="#kt_drawer_example_advanced_close" data-kt-drawer-name="docs"
            data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}"
            data-kt-drawer-direction="start">
            <div class="card rounded-0 w-100">
                <!--begin::Card header-->
                <div class="card-header pe-5">
                    <!--begin::Title-->
                    <div class="card-title">
                        <!--begin::User-->
                        <div class="d-flex justify-content-center flex-column me-3">
                            <strong class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 lh-1 title">Example
                                Advanced</strong>
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_example_advanced_close">
                            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body hover-scroll-overlay-y">
                </div>
                <!--end::Card body-->
            </div>
        </div>
        <div class="modal fade" tabindex="-1" id="mymodal">
            <form class="modal-dialog  modal-dialog-centered  modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title title">Modal title</h3>
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <div class="modal-body body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                            class="btn btn-outline hover-rotate-end btn-outline-dashed btn-outline-danger"
                            data-bs-dismiss="modal">Close</button>
                        {update_button}
                    </div>
                </div>
            </form>
        </div>
        <!--begin::Drawer-->
        <div id="kt_drawer_example_advanced" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true"
            data-kt-drawer-permanent="true" data-kt-drawer-toggle="#kt_drawer_example_advanced_button"
            data-kt-drawer-close="#kt_drawer_example_advanced_close" data-kt-drawer-name="set_in_page"
            data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}"
            data-kt-drawer-direction="end" <?= $this->ki_theme->drawer_main_div_attr() ?>>
            <!--begin::Card-->
            <div class="card rounded-0 w-100">
                <!--begin::Card header-->
                <div class="card-header pe-5">
                    <!--begin::Title-->
                    <div class="card-title">
                        <!--begin::User-->
                        <div class="d-flex justify-content-center flex-column me-3">
                            <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 lh-1">Example
                                Advanced</a>
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-light-danger" id="kt_drawer_example_advanced_close">
                            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body hover-scroll-overlay-y">
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Drawer-->
        <!--end::View component-->
        <?php
        if (isDemo()) {
            ?>

            <!--begin::Toast-->
            <div class="position-fixed p-3" style="z-index:9999;top: 68px;">
                <div id="demoWarning" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class="ki-duotone ki-abstract-19 fs-1 text-danger me-3"><span class="path1"></span><span
                                class="path2"></span></i>
                        <strong class="me-auto fs-4 text-danger">HYPER PRP WEBTECH</strong>
                        <small class="text-capitalize"><?= timeAgo('2024-09-19') ?></small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body text-dark fs-5">
                        This is a demo panel, you can not update some function in it .
                    </div>
                </div>
            </div>
            <!--end::Toast-->
            <?php
        }
        if ($this->ki_theme->isDiwali() or isDemo()) {
            ?>
            <div>
                <div class="bomb-rocket"></div>
                <div class="bomb-rocket"></div>
                <div class="bomb-rocket"></div>
                <div class="bomb-rocket"></div>
                <div class="bomb-rocket"></div>
                <div class="bomb-rocket"></div>
                <div class="bomb-rocket"></div>
                <div class="bomb-rocket"></div>
                <div class="bomb-rocket"></div>
                <div class="bomb-rocket"></div>
                <div class="bomb-rocket"></div>
                <div class="bomb-rocket"></div>
                <div class="bomb-rocket"></div>
                <div class="bomb-rocket"></div>
                <div class="bomb-rocket"></div>
                <div class="normal-rocket"></div>
                <div class="normal-rocket"></div>
                <div class="normal-rocket"></div>
                <div class="normal-rocket"></div>
                <div class="normal-rocket"></div>
                <div class="normal-rocket"></div>
                <div class="normal-rocket"></div>
                <div class="normal-rocket"></div>
                <div class="normal-rocket"></div>
                <div class="normal-rocket"></div>
                <div class="normal-rocket"></div>
                <div class="normal-rocket"></div>
                <div class="normal-rocket"></div>
                <div class="normal-rocket"></div>
                <div class="normal-rocket"></div>
            </div>
            <?php
        }
        ?>
</body>

<!--end::Body-->
<!--begin::Javascript-->
<script>
    var base_url = "<?= base_url() ?>",
        module_name = "<?=$this->ki_theme->get_ajax_module()?>",
        ajax_url = base_url + module_name + 'ajax/';
    const login_type = '<?= $this->center_model->login_type() ?>';
    const isDemo = Boolean(<?= isDemo() ?>);
    const all_templates = '';
    const wallet_system = Boolean(`<?= CHECK_PERMISSION('WALLET_SYSTEM') or CHECK_PERMISSION('WALLET_SYSTEM_COURSE_WISE') ?>`);
    const wallet_balance = <?= $this->ki_theme->wallet_balance() ?? 0 ?>;
    var DeletePermissionForCenter = true;
    const ADMISSION_WITH_COURSE_CATEGORY = <?= CHECK_PERMISSION('ADMISSION_WITH_COURSE_CATEGORY') ? 1 : 0 ?>;
    // console.log(content_css);
    // Default vars of this project
    <?php
    if (CHECK_PERMISSION('CENTRE_ONLY_ADD_STUDENT') && OnlyForCentre()) {
        ?>
        // DeletePermissionForCenter = false;
        <?php
    }
    foreach ($this->ki_theme->default_vars() as $var => $var_value) {
        ?>const <?= $var ?> = `<?= $var_value ?>`;
        <?php
    }
    if ($this->center_model->isCenter() && CHECK_PERMISSION('WALLET_SYSTEM')) {
        $get = $this->ki_theme->center_fix_fees();
        foreach ($get as $key => $amount) {
            echo 'const ' . strtoupper($key) . ' = ' . $amount . ";\n\t";
        }
    }
    ?>   
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"
    integrity="sha512-6JR4bbn8rCKvrkdoTJd/VFyXAN4CE9XMtgykPWgKiHjou56YDJxWsi90hAeMTYxNwUnKSQu9JPc3SQUg+aGCHw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    .tox-promotion {
        display: none !important;
    }
</style>
<script src="{base_url}assets/custom/custom.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->
{js_file}
<?php
/*
if (isDemo()) {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () { if (!localStorage.getItem('registeredUser')) { myModel('Your Profile', `<div class="form-group mb-4"><label class="form-label required">Enter Your Name</label><input type="text" name="name" class="form-control" placeholder="Enter Your Name" required></div><div class="form-group"><label class="form-label required">Enter Mobile</label><input type="text" name="mobile" class="form-control" placeholder="Enter Your Mobile" required></div>`, `register`).then(() => { localStorage.setItem('registeredUser', true); ki_modal.hide(); }) } });
    </script>
    <?php
}*/
?>
<!-- Admin Panel -->

</html>