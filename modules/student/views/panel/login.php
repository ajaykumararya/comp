<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Student Login - {meta_title}</title>
    <meta charset="utf-8" />
    <meta name="description" content="Student Login - {meta_title}" />
    <meta name="keywords" content="Student Login - {meta_title}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Student Login - {meta_title}" />
    <meta property="og:url" content="{current_url}" />
    <meta property="og:site_name" content="{meta_title}" />
    <link rel="canonical" href="{current_url}" />
    <link rel="shortcut icon" href="{base_url}assets/media/logos/favicon.ico" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->

    {basic_header_link}
    <script src="{base_url}assets/project.js"></script>

    <style>
        .title {
            max-width: 400px;
            margin: auto;
            text-align: center;
            font-family: "Poppins", sans-serif;
        }

        .title h3 {
            font-weight: bold;
        }

        .title p {
            font-size: 12px;
            color: #118a44;
        }

        .title p.msg {
            color: initial;
            text-align: initial;
            font-weight: bold;
        }

        .otp-input-fields {
            margin: auto;
            background-color: white;
            box-shadow: 0px 0px 8px 0px #02025044;
            max-width: 400px;
            width: auto;
            display: flex;
            justify-content: center;
            gap: 10px;
            padding: 40px;
        }

        .otp-input-fields input {
            height: 40px;
            width: 40px;
            border-radius: 4px;
            border: 1px solid #2f8f1f;
            text-align: center;
            outline: none;
            font-size: 16px;
        }

        .otp-input-fields input::-webkit-outer-spin-button,
        .otp-input-fields input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .otp-input-fields input[type=number] {
            -moz-appearance: textfield;
        }

        .otp-input-fields input:focus {
            border-width: 2px;
            border-color: darken(#2f8f1f, 5%);
            font-size: 20px;
        }

        .result {
            max-width: 400px;
            margin: auto;
            padding: 24px;
            text-align: center;
        }

        .result p {
            font-size: 24px;
            font-family: 'Antonio', sans-serif;
            opacity: 1;
            transition: color 0.5s ease;
        }

        .result p._ok {
            color: green;
        }

        .result p._notok {
            color: red;
            border-radius: 3px;
        }
    </style>
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{base_url}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{base_url}assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="auth-bg bgi-size-cover bgi-attachment-fixed bgi-position-center">
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

    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page bg image-->
        <style>
            body {
                background-image: url('{base_url}assets/media/auth/bg10.jpg');
            }

            [data-bs-theme="dark"] body {
                background-image: url('{base_url}assets/media/auth/bg10-dark.jpg');
            }
        </style>
        <!--end::Page bg image-->

        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <!--begin::Image-->
                    <a href="{base_url}">
                        <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                            src="<?= logo() ?>" alt="" />
                        <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                            src="<?= logo() ?>" alt="" />
                        <!--end::Image-->
                    </a>
                    <!--begin::Title-->
                    <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">
                        <?=ES('login_title',ES('title'))?>
                    </h1>
                    <!--end::Title-->

                </div>
                <!--end::Content-->
            </div>
            <!--begin::Aside-->

            <!--begin::Body-->
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <!--begin::Wrapper-->
                <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                    <!--begin::Content-->
                    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">

                            <!--begin::Form-->
                            <form class="form w-100 student-login-form" novalidate="novalidate" id="kt_sign_in_form"
                                data-kt-redirect-url="" action="#">
                                <!--begin::Heading-->
                                <div class="text-center mb-11">
                                    <!--begin::Title-->
                                    <h1 class="text-gray-900 fw-bolder mb-3">
                                        Sign In
                                    </h1>
                                    <!--end::Title-->

                                    <!--begin::Subtitle-->
                                    <div class="text-gray-500 fw-semibold fs-6">
                                        Your Student Panel
                                    </div>
                                    <!--end::Subtitle--->
                                </div>
                                <!--begin::Heading-->



                                <div class="form-group d-grid mb-1">
                                    <label for="" class="form-label mt-2 required">Roll Number</label>
                                    <input value="<?=isDemo() ? 'SC240001' : ''?>" type="text" name="roll_no" placeholder="Enter Roll No." class="form-control">
                                </div>
                                <div class="form-group d-grid mb-8">
                                    <label for="" class="form-label required mt-3">Password</label>
                                    <input value="<?=isDemo() ? 'TE1999' : ''?>" type="text" name="password" placeholder="Enter Password"
                                        class="form-control">
                                </div>
                                <div class="form-group d-grid">
                                    <p><i class="fa fa-bell text-dark"></i> If the password has not been created or
                                        changed, then
                                        enter 2 letters of your name and the year of your date of birth. <br>Password
                                        Example : <code> AJ1998</code> </p>
                                </div>
                                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                    <div></div>
                                    <?php
                                    if (CHECK_PERMISSION('SMS')) {
                                        ?>
                                        <!--begin::Link-->
                                        <a href="javascript:;" class="link-primary generate-new-password-link">
                                            Forgot Password ?
                                        </a>
                                        <!--end::Link-->
                                        <?PHP
                                    }
                                    ?>
                                </div>

                                <!--begin::Submit button-->
                                <div class="d-grid mb-10">
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">

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
                                if (CHECK_PERMISSION('SMS') && CHECK_PERMISSION('LOGIN_WITH_OTP')) {
                                    ?>
                                    <div class="text-gray-500 text-center fw-semibold fs-6">
                                        Login With OTP?

                                        <a href="javascript:;" class="link-primary login-with-otp">
                                            Sign In
                                        </a>
                                    </div>
                                    <?php
                                }
                                if(isDemo()){
                                    echo '<table class="table table-striped table-bordered bg-danger">
                                                <tr>
                                                    <th colspan="2">Demo Login Details</th>
                                                </tr>
                                                <tr>
                                                    <th>Roll No.</th><td>SC240001</td>
                                                </tr>
                                                
                                                <tr>
                                                    <th>Password</th><td>TE1999</td>
                                                </tr>
                                            </table>';
                                }
                                ?>

                            </form>
                            <!--end::Form-->

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
    <!--end::Main-->

    <div class="modal fade" tabindex="-1" id="mymodal">
        <form class="modal-dialog  modal-dialog-centered  modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title title">Modal title</h3>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline hover-rotate-end btn-outline-dashed btn-outline-danger"
                        data-bs-dismiss="modal">Close</button>
                    {update_button}
                </div>
            </div>
        </form>
    </div>

</body>
<!--end::Body-->

</html>