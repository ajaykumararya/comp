<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>Admin Login</title>
    <meta charset="utf-8" />
    <meta name="description" content="Login Form of <?=ES('title')?>" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?=ES('title')?>" />
    <meta property="og:url" content="{base_url}" />
    <meta property="og:site_name" content="<?=ES('title')?>" />
    <meta property="og:image:url" content="<?=logo()?>" />
    <link rel="canonical" href="{base_url}" />
    <link rel="shortcut icon" href="<?= logo() ?>" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->



    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{base_url}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{base_url}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{base_url}/assets/animation.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
    <style>
       
    .login-page {
        margin: auto;
        padding: 1rem !important;
    }
    @media (min-width: 768px) {
        .login-page-c1{
            padding: 10px 0px 10px 0px;
        } 
    }
    .login-page-c1 {
        padding: 0px 40px 0px 40px !important;
        border: 2px solid #144438;
    }
    .form-control, .btn-primary {
        border-radius: 2.475rem !important;
    }
    .btn-primary{
        background-color: #efefef !important;
        color: #144438 !important;
    }
    .btn:hover {
        background-color: #144438 !important;
        color: #fff !important;
    }
    .input-group-icon .input-group-addon {
    position: relative;
    margin-top:12px;
    border: 0 none;
    width: 0;
    z-index: 11;
    }
    .input-group-icon {
        width: 100%;
        table-layout: fixed;
    }
    .input-group i {
        padding-left:12px;
    }
    .form-control{
        background: #fff !important;
    }
    </style>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
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


    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>
            <?php
            $light = getLightBack(); //base_url('assets/media/auth/bg10.jpg');
            $dark = getDarkBack(); //base_url('assets/media/auth/bg10-dark.jpg');
            ?>
            body {
                background-image: url('<?=$light?>');
            }

            [data-bs-theme="dark"] body {
                background-image: url('<?=$dark?>');
            }
        </style>
        <!--end::Page bg image-->

        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid" style="background: #00231a !important;">
            <!--begin::Aside-->
            <!--<div class="d-flex flex-lg-row-fluid">
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    
                    <a href="{base_url}">
                        <img class="mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="<?= logo() ?>" alt="" />
                    </a>

                    <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">
                        <?= ES('login_title', ES('title')) ?>
                    </h1>
                    
                </div>
            </div>-->
            <!--begin::Aside-->

            <!--begin::Body-->
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end login-page">
                <!--begin::Wrapper-->
                <div class="card bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10 login-page-c1" style="background: #144438 !important;">
                    <!--begin::Content-->
                    <div class="d-flex flex-center flex-column align-items-stretch w-md-400px" style="margin-bottom: -50px;margin-top: 15px;">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">

                        <a href="{base_url}">
                        <img class="mx-auto mw-100" style="padding-bottom:20px; width:150px;" src="https://www.iisdit.org/upload/icon-white.png" alt="" />
                        </a>

                        <h2 class="fw-bold text-center mb-7" style="color:#fff;">
                        <?= ES('login_title', ES('title')) ?>
                        </h2>

                            <!--begin::Form-->
                            <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"
                                data-kt-redirect-url="{current_url}" action="{base_url}ajax/admin-login" style="width:120% !important;">
                                <!--begin::Heading-->
                                <div class="text-center mb-11">
                                    <!--begin::Title-->
                                    <!--<h2 class="text-dark fw-bolder mb-3 m-auto">
                                        Sign In
                                    </h2>-->
                                    <!--end::Title-->

                                    <!--begin::Subtitle-->
                                    <div class="text-gray-500 fw-semibold fs-6">
                                        Sign to Admin/Center Panel
                                    </div>
                                    <!--end::Subtitle--->
                                </div>
                                <!--begin::Heading-->

                                <!--begin::Input group--->
                                <div class="fv-row mb-8 input-group input-group-icon">
                                    <!--begin::Email-->
                                    <span class="input-group-addon ">
                                            <span class="icon icon-group">
                                                <i class="far fa-user" style="color:#144438;"></i>
                                            </span>
                                        </span>
                                    <input type="text" placeholder="Email" name="email" autocomplete="off"
                                        class="form-control bg-transparent" style="padding-left: 30px;"/>
                                     </span>
                                    <!--end::Email-->
                                </div>

                                <!--end::Input group--->
                                <div class="fv-row mb-3 input-group input-group-icon">
                                    <!--begin::Password-->
                                    <span class="input-group-addon ">
                                            <span class="icon icon-group">
                                                <i class="fas fa-unlock-alt" style="color:#144438;"></i>
                                            </span>
                                        </span>
                                    <input type="password" placeholder="Password" name="password" autocomplete="off"
                                        class="form-control bg-transparent" style="padding-left: 30px;"/>
                                    </span>
                                    <!--end::Password-->
                                </div>
                                <!--end::Input group--->

                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                    <div></div>

                                    <!--begin::Link-->
                                    <!-- <a href="reset-password.html" class="link-primary">
                                        Forgot Password ?
                                    </a> -->
                                    <!--end::Link-->
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Submit button-->
                                <div class="d-grid mb-10">
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <i class="fas fa-sign-in-alt" style="color:#144438;"></i>
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">
                                            Sign In</span>
                                        <!--end::Indicator label-->

                                        <!--begin::Indicator progress-->
                                        <span class="indicator-progress">
                                            Please wait... <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                        <!--end::Indicator progress--> </button>
                                </div>
                                <!--end::Submit button-->
                                <?php
                                if(isDemo()):
                                ?>
                                <div class="separator separator-content my-14">
                                    <span class="w-125px text-gray-500 fw-semibold fs-7">Login As</span>
                                </div>
                                <div class="d-flex">

                                    <button type="button" data-type="admin"
                                        class="demoLogin btn btn-light-warning fw-bolder w-50 me-2"> Admin
                                        Login</button>
                                    <button type="button" data-type="center"
                                        class="demoLogin btn btn-light-danger fw-bolder w-50"> Centre login</button>
                                </div>
                                <a href="{base_url}student" class="mt-3 btn btn-light-info text-white fw-bolder w-100">Student Login</a>

                                <?php
                                endif;
                                ?>
                            </form>
                            <!--end::Form-->

                            <div style="color:#fff; font-size: 14px; font-family: 'Signika', sans-serif; font-weight: 700; text-align: center;">
                                    <p>© 2024 International Institute of Skills Development and IT Training</p>
                                </div>

                        </div>
                        <!--end::Wrapper-->

                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    <script>
        var base_url = "{base_url}",
            ajax_url = base_url + 'ajax', f;        
    </script>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{base_url}/assets/plugins/global/plugins.bundle.js"></script>
    <script src="{base_url}/assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{base_url}/assets/js/custom/authentication/sign-in/general.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    <script>
        <?php
        if (isDemo()) {
            ?>
            var login = {
                admin: {
                    email: 'admin@gmail.com',
                    password: 'admin',
                },
                center: {
                    email: 'centre@gmail.com',
                    password: 'admin',
                }
            };
            $('.demoLogin').on('click', function () {
                var type = $(this).data('type');
                var email = login[type].email;
                // alert(email);
                var password = login[type].password;
                $('[name="email"]').val(email);
                $('[name="password"]').val(password);
            })

            <?php
        }
        ?>
        if (f = localStorage.getItem('fontFamily')) { $('body').css("font-family", f) }
        if (localStorage.getItem('cardAnimation')) { $('.card').addClass('card-animation').css('--animation-bg', localStorage.getItem('card-animation-bg') || 'teal'); }
    </script>
</body>
<!--end::Body-->

</html>