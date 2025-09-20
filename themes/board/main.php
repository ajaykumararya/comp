<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

<style>
    *,body{
        font-family: "Raleway", serif;
    font-optical-sizing: auto;
    font-style: normal;
    }
    /* Basic menu styling */
    .menu {
        list-style: none;
        padding: 0;
        margin: 0;
        position: relative;
    }

    .menu-item {
        position: relative;
        padding: 10px 15px;
        cursor: pointer;
    }

    /* Dropdown menu styling */
    .dropdown-menu {
        list-style: none;
        padding: 0;
        margin: 0;
        position: absolute;
        /* top: 0; */
        /* left: 100%; Position the submenu to the right of its parent */
        display: none;
        /* Hide the submenu by default */
        background-color: rgb(11, 15, 52);
        border: 1px solid #ccc;
        z-index: 1000;
        /* Ensure it appears above other elements */
    }

    /* Show dropdown menu on hover */
    .menu-item:hover>.dropdown-menu {
        display: block;
    }

    /* Adjust nested dropdown positions */
    .dropdown-menu .dropdown-menu {
        left: 100%;
        /* Further right for deeper levels */
        top: 0;
    }

    /* Dropdown item styling */
    .dropdown-item {
        padding: 10px 15px;
        color: white;
        cursor: pointer;
        white-space: nowrap;
        /* Prevent text wrapping */
    }

    .dropdown-item:hover {
        background-color: transparent;
        /* Highlight on hover */
        color: var(--bs-navbar-active-color)
    }

    .dropdown-item.dropdown-toggle::after {
        content: "\f054";
        /* Font Awesome Unicode for right arrow */
        font-family: "Font Awesome 5 Free";
        /* Use the relevant font family */
        font-weight: 900;
        position: absolute;
        top: 50%;
        right: 5px;
        transform: translateY(-50%);
        pointer-events: none;
        border: 0
    }
</style>

<body class="position-relative">
    <script>
        document.body.onload = function () {
            var preloader = document.getElementById("loader");
            if (!preloader.classList.contains("done")) {
                preloader.classList.add("done");
            }
        };
    </script>
    <div class="loader-body" id="loader">
        <div class="loader"></div>
    </div>
    <!-- Top Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-secondary text-end text-bold text-white py-1">
                <span class="px-3 m-2"><i class="nxr-telephone"></i> : <a class="text-decoration-none text-white"
                        href="tel:{number}">{number}</a>
                    <small class="fw-bold text-warning"><?=ES('header_open_timing')?></small>
                </span>
            </div>
        </div>
    </div>

    <!-- Logo Section -->
    <div class="bg-white">
        <div class="container">
            <div class="row py-4">
                <div class="col-10 col-lg-9">
                    <div class=" d-flex justify-content-evenly align-items-center text-center">
                        <div class="mx-2">
                            <img src="{base_url}upload/{logo}" class="" alt="{title}" style="height: 133px;">
                        </div>
                        <div class="mx-2">
                            <h4 class="nceb-title m-0 p-0 hindi tricolor" style="color:#0b0f34">
                                <?= ES('page_hindi_title') ?>
                            </h4>
                            <h4 class="nceb-title m-0 p-0 mt-1">
                                <?= board_text(ES('page_title_description')) ?><br>
                                <?= ES('page_title_sub_description') ?>
                                <!-- <span class="text-primary">N</span>ATIONAL <span
                                    class="text-primary">C</span>OMPUTER <span
                                    class="text-primary">E</span>DUCATION<br><span class="text-primary">B</span>OARD
                                SKILL DEVELOPMENT</h4> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-end align-self-center d-none d-lg-block">
                    <?php
                    $header_first_button_title = ES('header_first_button_title');
                    if ($header_first_button_title) {
                        $header_first_button_link = ES('header_first_button_link');
                        $header_first_button_class = ES('header_first_button_class','success');
                        ?>
                        <a href="<?=$header_first_button_link?>" class="btn btn-<?=$header_first_button_class?> rounded-0 mb-1"><i
                                class="nxr-fingerprint"></i> <span class="idvd">|</span> <b><?=$header_first_button_title?></b></a><br>
                        <?php
                    }
                    $header_second_button_title = ES('header_second_button_title');
                    if ($header_second_button_title) {
                        $header_second_button_link = ES('header_second_button_link');
                        $header_second_button_class = ES('header_second_button_class','success');
                        ?>
                        <a href="<?=$header_second_button_link?>" class="btn btn-<?=$header_second_button_class?> rounded-0 mb-1"><i
                                class="nxr-fingerprint"></i> <span class="idvd">|</span> <b><?=$header_second_button_title?></b></a><br>
                        <?php
                    }
                    ?>
                </div>

                <div class="col-2 d-flex justify-content-end align-items-center d-lg-none">
                    <button class="navbar-toggler collapsed d-flex flex-column justify-content-around" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon top-bar"></span>
                        <span class="toggler-icon middle-bar"></span>
                        <span class="toggler-icon bottom-bar"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Section -->
    <nav class="navbar navbar-dark bg-secondary navbar-expand-lg py-0">
        <div class="container-fluid">
            <div class="collapse navbar-collapse text-end" id="navbarSupportedContent">
                <?php
                function get_menu($items, $class = '', $liClass = '', $linkClass = 'nav-link', $boxID = '', $attr = '')
                {
                    $html = "<ul class=\"" . $class . "\" id=\"" . $boxID . "\" $attr>";
                    foreach ($items as $key => $value) {
                        $activeCss = $value['isActive'] ? 'active' : ''; //getActiveMenu($value['page_id'],'active');
                        $link = $value['link'];
                        $iconWithTExt = $value['label'];
                        if (array_key_exists('child', $value)) {
                            $ex = $class == 'dropdown-menu' ? '' : 'nav-item';
                            $ex1 = $class == 'dropdown-menu' ? 'dropdown-item dropdown-toggle' : 'nav-link dropdown-toggle';
                            $html .= '<li class="' . $activeCss . ' ' . $ex . ' dropdown"><a href="#" ' . $value['target'] . ' class="menu-css ' . $linkClass . ' ' . $activeCss . ' ' . $ex1 . '" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $iconWithTExt . '</a>';
                        } else
                            $html .= '<li class="' . $activeCss . '"><a href="' . $link . '" ' . $value['target'] . ' class="menu-css ' . $linkClass . ' ' . $activeCss . '">' . $iconWithTExt . '</a>';
                        if (array_key_exists('child', $value)) {
                            // $html .= '<div class="dropdown-menu">';
                            $html .= get_menu($value['child'], 'dropdown-menu', '', 'dropdown-item');
                            // $html .= '</div>';
                        }
                        $html .= "</li>";
                    }
                    $html .= "</ul>";
                    return $html;
                }
                echo get_menu($menus, 'navbar-nav mx-auto mb-2 mb-lg-0');
                ?>

                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gayab">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index-2.html"><span>HOME</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="register-with-nceb.html"><span>CENTER
                                REGISTRATION</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="nceb-center-list.html"><span>OUR
                                CENTERS</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="nceb-course-list.html"><span>COURSES</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="why-nceb.html"><span>WHY NCEB</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="nceb-gallery.html"><span>GALLERY</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="about-nceb.html"><span>ABOUT US</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="contact-nceb.html"><span>CONTACT US</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="top-nceb-centers.html"><span>TOP
                                CENTERS</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="awards.html"><span>2023 Awards <small
                                    class="badge rounded-pill text-bg-warning">NEW</small></span></a>
                    </li>

                    <li class="nav-item d-block d-lg-none mt-1">
                        <a href="https://www.nceb.in/dashboard/" class="btn btn-warning rounded-0"><i
                                class="nxr-fingerprint"></i> <span class="idvd">|</span> <b>CENTER LOGIN</b></a>
                    </li>

                    <li class="nav-item d-block d-lg-none mt-2">

                        <a href="https://www.nceb.in/dashboard/" class="btn btn-primary rounded-0"><i
                                class="nxr-fingerprint"></i> <span class="idvd">|</span> <b>STUDENT LOGIN</b></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    {output}
    <br>
    <div class="container-fluid bg-secondary text-white">
        <div class="row g-4">
            <div class="col-md-5 ps-5 pt-2">
                <h6 class="nceb-heading-warning"> <?= $this->ki_theme->parse_string(@$footer_note_title) ?></h6>
                <p class="text-justify">{footer_note_description}</p>
                <!-- <a href="why-nceb.html" class="text-white">Read more...</a> -->
                <?php
                if (isset($footer_note_button_link) && $footer_note_button_link) {
                    echo '<a href="' . $footer_note_button_link . '" class="text-white">' . $footer_note_button_text . '</a>';
                }
                ?>
            </div>

            <div class="col-md-3 ps-5 pt-2 footer-section-border-top">
                <?php
                $myTitle = $this->SiteModel->get_setting('footer_first_text', $title);
                echo '
                        <h6 class="nceb-heading-warning">' . $myTitle . '</h6>
                        <ul class="list-unstyled">';
                $fields = $this->SiteModel->get_setting('footer_first_links', '', true);
                if ($fields) {
                    foreach ($fields as $value) {
                        $my_index = $value->title;
                        $value = $value->link;
                        echo "<li class='py-1'><a href='$value' class='text-decoration-none text-white'>$my_index</a></li>";
                    }
                }
                echo '</ul>';

                ?>
            </div>

            <div class="col-md-4 ps-5 pe-5 pt-2 footer-section-border-top">
                <!-- <p>Enter your phone number to get call from us</p>
                <div class="row">
                    <div class="col-8">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="callme-input"><i class="nxr-telephone notop"></i></span>
                            <input type="text" pattern="\d*" maxlength="10" class="form-control" id="callMeInput"
                                placeholder="+91...." aria-label="Call me input" aria-describedby="callme-input">
                        </div>
                        <small id="callMeError"></small>
                    </div>
                    <div class="col-4 px-0">
                        <button type="button" id="callMeBtn" class="btn btn-warning" disabled><b>CALL ME</b></button>
                    </div>
                </div>
                <hr> -->
                <h6 class="nceb-heading-warning">Follow us</h6>
                <?php
                if ($facebook) {
                    ?>
                    <a href="<?= $facebook ?>" target="_blank"
                        class="text-white p-2 text-decoration-none social-button social-button--facebook"
                        aria-label="Facebook">
                        <i class="fab fa-facebook-f h3"></i>
                    </a>
                    <?php
                }
                if ($instagram) {
                    ?>
                    <a href="<?= $instagram ?>" target="_blank"
                        class="text-white p-2 text-decoration-none social-button social-button--instagram"
                        aria-label="instagram">
                        <i class="fab fa-instagram h3"></i>
                    </a>
                    <?php
                }
                if ($linkedin) {
                    ?>
                    <a href="<?= $linkedin ?>" target="_blank"
                        class="text-white p-2 text-decoration-none social-button social-button--linkedin"
                        aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in h3"></i>
                    </a>
                    <?php
                }
                ?>
                <!-- <a href="https://www.facebook.com/nce.board/" target="_blank"
                    class="text-white p-2 text-decoration-none"><i class="h3 nxr-facebook"></i></a>
                <a href="https://twitter.com/NcebSkill" target="_blank" class="text-white p-2 text-decoration-none"><i
                        class="h3 nxr-twitter"></i></a>
                <a href="https://www.youtube.com/channel/UCmpAHKyqO96trwNOUerTEMQ" target="_blank"
                    class="text-white p-2 text-decoration-none"><i class="h3 nxr-youtube"></i></a> -->
            </div>

            <div class="col-12 bg-primary text-white text-center border-top border-2 border-white">
                <br>
                &copy; {YEAR} :: {title}<br>
                <!-- <div class="py-3">
                        <a class="text-white" href="tc-nceb.html">Terms &amp; Conditions </a> | <a class="text-white"
                            href="sitemap-nceb.html">Sitemap</a> | <a class="text-white" href="pp-nceb.html">Privacy
                            Policy</a> | <a class="text-white" href="cr-nceb.html">Cancellation &amp; Refund Policy</a>
                    </div> -->
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content confetti-bg bg-transparent border-0">
                <div class="modal-header bg-secondary text-center border-0">
                    <h1 class="modal-title fs-5 text-warning" id="successModalLabel">OUR TOP 10 CENTERS OF 2023</h1>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                        aria-label="Close"><b>X</b></button>
                </div>
                <div class="modal-body text-center">
                    <img src="assets/images/nceb-pre.svg" data-src="./images/tc2023.png"
                        class="img-fluid position-relative zi-1">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="subjectsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="smTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="smTitle"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group list-group-flush" id="subjectList"></ul>
                </div>
            </div>
        </div>
    </div>
    <div class="toast-container position-fixed bottom-0 start-50 translate-middle-x gayab" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div id="cookieToast" class="toast">
            <div class="d-flex align-items-center text-bg-light p-1 border-2 shadow">
                <div class="toast-body">
                    Heyy, This site uses cookies. Read our <a href="pp-nceb.html"
                        class="text-warning fw-bold text-decoration-none">Privacy Policy</a>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php
    // if(isset($isPrimary) && $isPrimary)
    echo '<script src="{theme_url}assets/js/nxr-home.min.js"></script>';
    // else
    // echo '<script src="{theme_url}assets/js/bootstrap.bundle.min.js"></script>';
    ?>
    <script>
        // var successModal = new bootstrap.Modal(document.getElementById('successModal'));

        // successModal.show();
        $('.dropdown-toggle').on('click', function (params) {
            params.preventDefault();
        })
        $('.dropdown').mouseover(function () {
            // alert(1);
            $(this).find('ul').first().show();
        }).mouseleave(function () {
            // alert(3);
            $(this).find('ul').first().hide();
        })
    </script>
</body>

</html>