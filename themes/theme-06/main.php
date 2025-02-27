<body>
    <style type="text/css">
        .annocement {
            display: flex;
        }

        #student-details {
            margin-top: 241px !important
        }

        .annocement span {
            color: white;
            font-weight: bold;
            background: var(--secondary-color);
            padding: 12px 20px;
            text-transform: uppercase;
        }

        body,
        li,
        .title {
            font-family: 'Cambay', sans-serif !important;
        }

        .btn-primary {
            color: #fff;
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
        }
    </style>
    <section class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="row">

                            <div class="col-lg-7 col-md-7 text-left">
                                <div class="annocement">
                                    <span><?= ES('header_marquee_title', 'ANNOUNCEMENT') ?></span>
                                    <marquee behavior="scroll" direction="left" id="" scrollamount="5"
                                        class="top-marquee" onmouseover="this.stop();" onmouseout="this.start();">
                                        <?= ES('header_marquee', '') ?>
                                    </marquee>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <ul>
                                    <?php
                                    $data = $this->SiteModel->get_contents('our-header-button');
                                    if ($data->num_rows()):
                                        $index = 1;
                                        foreach ($data->result() as $row):

                                            $html = '<i class="' . $row->field1 . '" aria-hidden="true"></i> &nbsp;&nbsp;' . $row->field2;

                                            echo '<li><a href="' . $row->field3 . '" ' . ($row->field4 == 'button' ? ' class="top-btn"' : 'style="color:white;margin-right: 10px;"') . '>' . $html . '</a></li>';
                                        endforeach;
                                    endif;
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="main-header">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="" href="{base_url}">
                        <img src="<?= logo() ?>" alt="{title}" class="navbar-brand img-responsive">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <?php
                    $pageCount = 0;
                    function get_menu($items, $class = '', $liClass = '', $linkClass = 'nav-link', $boxID = '', $attr = '')
                    {
                        $html = "<ul class=\"" . $class . "\" id=\"" . $boxID . "\" $attr>";
                        foreach ($items as $key => $value) {
                            $activeCss = $value['isActive'] ? 'active-menu' : ''; //getActiveMenu($value['page_id'],'active');
                            $link = $value['link'];
                            $iconWithTExt = $value['label'];
                            if (array_key_exists('child', $value)) {
                                $ex = $class == 'aiu-tab-dropdown' ? '' : ' hover-aiu-tab';
                                $ex1 = $class == 'aiu-tab-dropdown' ? 'dropdown-item' : 'nav-link dropdown-toggle';
                                $html .= '<li class="' . $activeCss . ' ' . $ex . '"><a href="#" ' . $value['target'] . ' class="menu-css ' . $linkClass . ' ' . $ex1 . '" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $iconWithTExt . '</a>';
                            } else
                                $html .= '<li class="' . $activeCss . ' hover-aiu-tab"><a href="' . $link . '" ' . $value['target'] . ' class="menu-css ' . $linkClass . '">' . $iconWithTExt . '</a>';
                            if (array_key_exists('child', $value)) {
                                // $html .= '<div class="dropdown-menu">';
                                $html .= get_menu($value['child'], 'aiu-tab-dropdown', '', '');
                                // $html .= '</div>';
                            }
                            $html .= "</li>";
                        }
                        $html .= "</ul>";
                        return $html;
                    }
                    echo get_menu($menus, 'nav navbar-nav');
                    ?>


                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </section>
    <!-- <section class="request_call_link">
            <a href="#request_call">Request a call Back</a>
        </section> -->

    {output}
    <!-- <button type="button" class="btn btn-phd-form" data-toggle="modal" data-target="#myModalPhdForm"><span>Ph.D
            Admission</span></button> -->
    <!-- <button type="button" class="btn btn-toll-free" >Toll Free No. : 18001204883</button> -->
    <!-- <a type="button" class="btn admission-open" href="apply_now_admission.php"> --><!-- <i class="fa fa-phone box-shadow" aria-hidden="true"></i>&nbsp; --><!-- <span>Admission Open 2022-23</span></a> -->


    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <style type="text/css">
                        .footer-two .content .footer-logo {
                            margin-bottom: 24px;
                            width: 250px;
                        }

                        .footer-two .content p {
                            font-size: 12px;
                            display: flex;
                        }

                        .footer-two .content p span i {
                            background: var(--secondary-color);
                            /* padding: 3px 4px; */
                            border-radius: 50%;
                            height: 20px;
                            width: 20px;
                            line-height: 1.5;
                            text-align: center;
                        }
                    </style>
                    <div class="footer-two footer-one" style="margin-bottom:14px">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <div class="content">
                                    <div class="footer-logo">
                                        <img src="<?= logo() ?>" alt="" class="img-responsive">
                                    </div>
                                    <div class="address">
                                        <p><span><i class="fa fa-map-marker"></i></span> &nbsp;:&nbsp;&nbsp;{address}
                                        </p>
                                        <p><span><i class="fa fa-phone"></i></span>&nbsp;:&nbsp;&nbsp;{number}</p>
                                        <p><span><i class="fa fa-envelope-o"></i></span>&nbsp;:&nbsp;&nbsp; {email}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $footer_sections = $this->ki_theme->config('footer_sections');
                            if ($footer_sections) {
                                foreach ($footer_sections as $index => $title) {
                                    $myTitle = $this->SiteModel->get_setting($index . '_text', $title);
                                    echo '<div class="col-lg-3 col-md-3">
                                            <div class="content">
                                                <h5 class="title">' . $myTitle . '</h5>
                                                <ul class="sub-content border-left">';
                                    $fields = $this->SiteModel->get_setting($index . '_links', '', true);
                                    if ($fields) {
                                        foreach ($fields as $value) {
                                            $my_index = $this->ki_theme->parse_string($value->title);
                                            $value = $value->link;
                                            echo "<li><a href='$value'>$my_index</a></li>";
                                        }
                                    }
                                    echo '</ul></div>
                                        </div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="copyright_link" style="border-top:none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <p>Copyright &copy; {title} {copyright} </p>
                </div>
                <!-- <div class="col-lg-7 col-md-7">
                    <div class="pull-right">
                        <ul class="nav-links content">
                            <li><a href="about093b.html?DID=contact_us">Contact Us</a></li>
                            <li><a href="about6adf.html?DID=Terms%20of%20Service">Terms of Service</a></li>
                            <li><a href="abouta645.html?DID=Privacy%20Policy">Privacy Policy</a></li>
                            <li><a href="about8c45.html?DID=Refund%20Policy">Refund Policy</a></li>
                            <li><a href="about376b.html?DID=Disclaimer">Disclaimer</a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- <script src="~lib/js/jquery.js"></script> -->
    <script src="{theme_url}assets/js/bootstrap.min.js"></script>
    <!-- <script src="~lib/fontawesome/svg-with-js/js/fontawesome-all.js"></script> -->
    <script type="text/javascript" src="{theme_url}assets/js/slick.js"></script>
    <script type="text/javascript" src="{theme_url}assets/js/auto-vertical-slider.js"></script>
    <script type="text/javascript" src="{theme_url}assets/js/fixed.js"></script>

    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script> -->
    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
    <script type="text/javascript" src="{theme_url}assets/slick/slick.min.js"></script>
    <script src="{theme_url}assets/javascript.js"></script>
    <!-- <script src="admission.js"></script> -->
    <script type="text/javascript" src="{theme_url}assets/js/owl.carousel.min.js"></script>
</body>


</html>
<div class="thankyou-modal">
    <div class="modal fade" id="thank-gen2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"><!-- &times; -->X</span></button>
                    <img src="{theme_url}assets/image/thankyou.jpg" class="img-responsive">
                    <!-- Thank you. We will contact you as soon as possible. If you need any assistance feel free to contact us on +91 9289456781, +91 9289456782.. -->
                </div>
            </div>
        </div>
    </div>
</div>