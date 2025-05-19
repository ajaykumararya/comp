<!-- CSS -->
<link href="{theme_url}assets/css/reset.css" rel="stylesheet">
<link href="{theme_url}assets/css/fonts.css" rel="stylesheet">
<link href="{theme_url}assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="{theme_url}assets/assets/select2/css/select2.min.css" rel="stylesheet">
<link href="{theme_url}assets/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="{theme_url}assets/assets/magnific-popup/css/magnific-popup.css" rel="stylesheet">
<link href="{theme_url}assets/assets/iconmoon/css/iconmoon.css" rel="stylesheet">
<link href="{theme_url}assets/assets/owl-carousel/css/owl.carousel.min.css" rel="stylesheet">
<link href="{theme_url}assets/css/animate.css" rel="stylesheet">
<link href="{theme_url}assets/css/custom.css" rel="stylesheet">


<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

</head>

<body>

    <!-- ==============================================
    ** Preloader **
    =================================================== -->
    <!-- <div id="loading">
        <div class="element">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </div>
    </div> -->

    <!-- ==============================================
    ** Header **
    =================================================== -->
    <header>
        <!-- Start Header top Bar -->
        <div class="header-top">
            <div class="container clearfix">
                <ul class="follow-us hidden-xs">
                    <li><a href="{facebook}"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="{twitter}"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{youtube}"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="{instagram}"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="{linkedin}"><i class="fab fa-linkedin"></i></a></li>
                </ul>
                <div class="right-block clearfix">
                    <ul class="top-nav hidden-xs">
                        <?php
                        $data_index = 'topbarlinks';
                        $fields = $this->SiteModel->get_setting($data_index, '', true);
                        if ($fields) {
                            foreach ($fields as $value) {
                                $my_index = $value->title;
                                $value = $value->link;
                                echo '<li><a href="' . $value . '">' . $my_index . '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Header top Bar -->
        <!-- Start Header Middle -->
        <div class="container header-middle">
            <div class="row">
                <div class="col-xs-6 col-sm-4">
                    <a href="{base_url}">
                        <img src="{base_url}upload/{logo}" class="img-responsive" alt="">
                    </a>
                </div>
                <!-- <div class="col-xs-6 col-sm-3"></div> -->
                <div class="col-xs-6 col-sm-8">
                    <div class="contact clearfix">
                        <ul class="hidden-xs">
                            <li> <span>Email</span> <a href="mailto:{email}">{email}</a> </li>
                            <li> <span>Call Us</span> {number} </li>
                        </ul>
                        <?php
                        if ($headerBtnLink = ES('header_button_link', false)):
                            ?>
                            <a href="<?= $headerBtnLink ?>" class="login"><?= ES('header_button_title') ?> <span
                                    class="icon-more-icon"></span></a>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
        <!-- Start Navigation -->
        <nav class="navbar navbar-inverse">
            <div class="">
                <div class="navbar-header">
                    <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar">
                    <?php
                    $pageCount = 0;

                    function get_menu($items, $class = '', $liClass = '', $linkClass = 'dropdown-toggle nav-link', $boxID = '')
                    {
                        $html = "<ul class=\"" . $class . "\" id=\"" . $boxID . "\">";
                        foreach ($items as $key => $value) {
                            $activeCss = $value['isActive'] ? 'active' : ''; //getActiveMenu($value['page_id'],'active');
                            $link = $value['link'];

                            $iconWithTExt = $value['label'];

                            if (array_key_exists('child', $value))
                                $html .= '<li class="' . $activeCss . ' dropdown"><a href="#" ' . $value['target'] . ' class="menu-css ' . $linkClass . '" data-toggle="dropdown">' . $iconWithTExt . ' <i class="fa fa-angle-down"
                                    aria-hidden="true"></i></a>';
                            else
                                $html .= '<li class="' . $activeCss . '"><a href="' . $link . '" ' . $value['target'] . ' class="menu-css dropdown-item nav-link nav_item">' . $iconWithTExt . '</a>';

                            if (array_key_exists('child', $value)) {

                                $html .= get_menu($value['child'], 'dropdown-menu', '', '');

                            }

                            $html .= "</li>";
                        }
                        $html .= "</ul>";
                        return $html;
                    }
                    echo get_menu($menus, 'nav navbar-nav');
                    ?>
                </div>
            </div>
        </nav>
        <!-- End Navigation -->
    </header>

    {output}



    <!-- ==============================================
    ** Footer **
    =================================================== -->
    <footer class="footer footer2">
        <!-- Start Footer Top -->
        <div class="container">
            <div class="row row1">
                <div class="col-sm-9 clearfix">
                    <?php
                    $footer_sections = $this->ki_theme->config('footer_sections');
                    if ($footer_sections) {
                        foreach ($footer_sections as $index => $title) {
                            $myTitle = $this->SiteModel->get_setting($index . '_text', $title);
                            echo '<div class="foot-nav">
                                    <h3>' . $myTitle . '</h3>
                                    <ul>';
                            $fields = $this->SiteModel->get_setting($index . '_links', '', true);
                            if ($fields) {
                                foreach ($fields as $value) {
                                    $my_index = $this->ki_theme->parse_string($value->title);
                                    $value = $value->link;
                                    echo "<li><a href='$value'>$my_index</a></li>";
                                }
                            }
                            echo '</ul>
                            </div>';
                        }
                    }
                    ?>
                </div>
                <div class="col-sm-3">
                    <div class="footer-logo hidden-xs">
                        <a href="{base_url}"><img src="{base_url}upload/{logo}" class="img-responsive" alt=""></a>
                    </div>
                    {footer_about_us}
                    <!-- <ul class="terms clearfix">
                        <li><a href="terms.html">TERMS OF USE</a></li>
                        <li><a href="privacy.html">PRIVACY POLICY</a></li>
                        <li><a href="#">SITEMAP</a></li>
                    </ul> -->
                    <div class="connect-us">
                        <h3>Connect with Us</h3>
                        <ul class="follow-us clearfix">
                            <!-- <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li> -->
                            <li><a href="{facebook}"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="{twitter}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{youtube}"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="{instagram}"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{linkedin}"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <!-- Start Footer Bottom -->
        <div class="bottom" style="padding:12px 0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class=""> {title} © {copyright}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>

    <!-- Scroll to top -->
    <a href="#" class="scroll-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>

    <!-- Optional JavaScript -->
    <!-- <script src="js/jquery.min.js"></script> -->
    <script src="{theme_url}assets/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="{theme_url}assets/assets/select2/js/select2.min.js"></script>
    <script src="{theme_url}assets/assets/matchHeight/js/matchHeight-min.js"></script>
    <script src="{theme_url}assets/assets/bxslider/js/bxslider.min.js"></script>
    <script src="{theme_url}assets/assets/waypoints/js/waypoints.min.js"></script>
    <script src="{theme_url}assets/assets/counterup/js/counterup.min.js"></script>
    <script src="{theme_url}assets/assets/magnific-popup/js/magnific-popup.min.js"></script>
    <script src="{theme_url}assets/assets/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="{theme_url}assets/js/modernizr.custom.js"></script>
    <script src="{theme_url}assets/js/custom.js"></script>

</body>

</html>