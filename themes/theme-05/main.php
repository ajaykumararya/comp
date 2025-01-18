<!-- Less Files -->
<!-- <link rel="stylesheet/less" href="{theme_url}assets/css/skins/skin.html" type="text/css" /> -->
<script src="{theme_url}assets/css/skins/less-1.7.0.min.js" type="text/javascript"></script>


<!-- Head Libs -->
<script src="{theme_url}assets/js/modernizr.js"></script>
<!-- <script src="{theme_url}assets/js/jquery.min.js"></script> -->
<script src="{theme_url}assets/js/app.js"></script>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="{theme_url}assets/js/jQuery-html5shiv/src/html5shiv.js"></script>
      <script src="{theme_url}assets/js/jQuery-Respond/dest/respond.min.js"></script>
    <![endif]-->



<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        // Show the Modal on load
        //$("#popupcphome").modal("show");
        //$("#Enquiry").modal("show");
        $("#minority_students").modal("show");
        // Hide the Modal
        $("#myBtn").click(function () {
            $("#myModalp").modal("hide");
        });

        // Show the Modal on load
        $("#notify").modal("show");

        // Hide the Modal
        $("#myBtn").click(function () {
            $("#dialog").modal("hide");
        });

        // Tool tips
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>


<body>

    <div class="preloader" id="preloader" style="display: none">
        <div class="preloader-inner">
            <div class="loader"> <img src="{theme_url}assets/loader.gif" alt="loader" class="img_loader"> </div>
        </div>
    </div>



    <nav class="navbar " role="navigation" style='margin-bottom: 0px;background:var(--secondary-color)'>
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand navbar-brand-centered">
                    <i class="fa fa-envelope text-danger"></i> <a href="mailto:{email}"><strong>{email}</strong></a>
                </div>
            </div>
            <div class="navbar-collapse collapse" id="navbar-brand-centered" style="height: 1px;">

                <ul class="nav navbar-nav navbar-right top-header-pd" style="margin:7.5px -4px">
                    <?php
                    $fields = $this->SiteModel->get_setting('top_btn_links', [], true);
                    if ($fields) {
                        foreach ($fields as $value) {
                            $my_index = $value->title;
                            $value = $value->link;
                            echo '<li><a href="' . $value . '"  class="text-white"><strong>' . $my_index . '</strong></a></li>';
                        }
                    }

                    ?>

                </ul>
            </div>

        </div><!-- /.container-fluid -->
    </nav>
    <!-- End Topbar blog -->
    <div style="background-color: #fff;">
        <div class="container">
            <div class="row">
                <div id="header" class="clearfix" style="padding: 15px 0px;">
                    <div class="col-md-3">
                        <a href="">
                            <center>
                                <img style="height:89px;width:283px" src="{base_url}upload/{logo}" alt="{title}"
                                    class="img-responsive" />
                            </center>
                        </a>
                    </div>
                    <?php
                    $logoData = [];
                    for ($i = 1; $i <= 3; $i++) {
                        $name = 'header_logo_' . $i;
                        $file = ES($name, '');
                        $logoData[] = $file;
                    }

                    $fressLogoData = sortEmptyLast($logoData);
                    // pre($fressLogoData);
                    foreach ($fressLogoData as $logo) {
                        $isExist = file_exists(('upload/' . $logo));
                        // echo $logo;
                        echo '<div class="col-md-1"><center>';

                        echo '
                                ' . img(base_url('upload/' . $logo), false, [
                                'class' => 'img-responsive img_size'
                            ]) . '
                            ';


                        echo '</center></div>';
                    }

                    ?>
                    <div class="col-md-6">
                        <div class="row- header-top text-right">
                            <?php
                            $fields = $this->SiteModel->get_setting('header_hightlight_btn_links', [], true);
                            if ($fields) {
                                foreach ($fields as $value) {
                                    $my_index = $value->title;
                                    $value = $value->link;
                                    echo '<a href="' . $value . '" style="margin-left:3px" class="btn btn-primary btn-sm" style="margin-bottom:5px;">' . $my_index . '</a>';
                                }
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <nav class="navbar navbar-default" role="navigation">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#navCollapse">
                                    <span class="sr-only">Toggle navigation</span> <i class="fa fa-bars"></i>
                                </button>
                            </div>
                            <div class="navigation collapse navbar-collapse" id="navCollapse">
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
                                            $ex = $class == 'dropdown-menu' ? '' : 'nav-item';
                                            $ex1 = $class == 'dropdown-menu' ? 'dropdown-item' : 'nav-link dropdown-toggle';
                                            $html .= '<li class="' . $activeCss . ' ' . $ex . ' dropdown"><a href="#" ' . $value['target'] . ' class="menu-css ' . $linkClass . ' ' . $ex1 . '" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $iconWithTExt . '</a>';
                                        } else
                                            $html .= '<li class="' . $activeCss . '"><a href="' . $link . '" ' . $value['target'] . ' class="menu-css ' . $linkClass . '">' . $iconWithTExt . '</a>';
                                        if (array_key_exists('child', $value)) {
                                            // $html .= '<div class="dropdown-menu">';
                                            $html .= get_menu($value['child'], 'dropdown-menu normalmenu', '', '');
                                            // $html .= '</div>';
                                        }
                                        $html .= "</li>";
                                    }
                                    $html .= "</ul>";
                                    return $html;
                                }
                                echo get_menu($menus, 'nav navbar-nav nav-main');
                                ?>
                            </div>
                        </nav>
                    </div>

                </div>
            </div>
            <!-- <div id="styleSwitcher" class="hidden-sm hidden-xs">
     <a href="#" data-toggle="modal" data-target="#Car" id="ShowCP" class="open-btn">
          <i style="color:#fff;" class="fa fa-car"></i>
     </a>
  </div> -->
            <div class="clearfix">
            </div>
        </div>
    </div>

    {output}
    <!-- Modal 3 -->
    <div id="popupcp2016" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: var(--primary-color); color: #fff;">
                    <a href="#" class="fancybox-item fancybox-close" data-dismiss="modal"></a>
                    <h2 class="modal-title">
                        <strong>Enquiry Form</strong>
                    </h2>

                </div>
                <div class="modal-body">
                    <form id="submitGETINTOUCH">
                        <div class="form-group">
                            <label>Are You a</label>
                            <select class="form-control" name="subject" id="areYouA">
                                <option value="">Select Are you a</option>
                                <option value="Training Center">
                                    Training Center</option>
                                <option value="Student">
                                    Student
                                </option>
                                <option value="Employer">Employer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Full Name</label>
                            <input class="form-control" type="text" placeholder="Full Name" name="name" id="fullName" />
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input class="form-control" type="text" placeholder="97XXXXXXXX" name="mobile"
                                id="mobileNumber" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" placeholder="example@<?= $_SERVER['HTTP_HOST'] ?>"
                                name="email" id="email" />
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input class="form-control" type="text" placeholder="State" name="state" id="state" />
                        </div>
                        <div class="form-group">
                            <label>District</label>
                            <input class="form-control" type="text" placeholder="District" name="city" id="district" />
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" id="message" name="message"></textarea>

                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">Submit</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal 3 -->

    <div class="float-sm">
        <div class="fl-fl float-fb">
            <i class="fab fa fa-facebook"></i>
            <a href="{facebook}" target="_blank"> Like us!</a>
        </div>
        <div class="fl-fl float-tw">
            <i class="fa fab fa-twitter"></i>
            <a href="{twitter}" target="_blank">Follow us!</a>
        </div>
        <div class="fl-fl float-gp">
            <i class="fa fab fa-youtube"></i>
            <a href="{youtube}" target="_blank">Recommend us!</a>
        </div>
        <div class="fl-fl float-link">
            <i class="fa fab fa-linkedin"></i>
            <a href="{linkedin}" target="_blank">Follow us!</a>
        </div>
        <div class="fl-fl float-ig">
            <i class="fa fab fa-instagram"></i>
            <a href="{instagram}" target="_blank">Follow us!</a>
        </div>
        <div class="fl-fl float-pn">
            <i class="fab fa fa-wpforms"></i>
            <a href="#" data-target="#popupcp2016" data-toggle="modal" target="_blank">Enquiry Now!</a>
        </div>
    </div>
    <!-- Floating Social Media bar Ends -->

    <style>
        .text {
            margin: 0 60px;
        }

        .twitter {
            font: normal normal 10px Arial;
            text-align: center;
            color: #998578;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .twitter {
            color: #72898b;
            text-decoration: none;
            display: block;
            padding: 14px;
            -webkit-transition: all .25s ease;
            -moz-transition: all .25s ease;
            -ms-transition: all .25s ease;
            -o-transition: all .25s ease;
            transition: all .25s ease;
        }

        .twitter:hover {
            color: #FF7D6D;
            text-decoration: none;
        }

        /* Floating Social Media Bar Style Starts Here */

        .fl-fl {
            background: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: 3px;
            width: 195px;
            position: fixed;
            right: -150px;
            z-index: 990;
            font: normal normal 10px Arial;
            -webkit-transition: all .25s ease;
            -moz-transition: all .25s ease;
            -ms-transition: all .25s ease;
            -o-transition: all .25s ease;
            transition: all .25s ease;
        }

        .float-sm .fa {
            font-size: 20px;
            color: #fff;
            padding: 10px 0;
            width: 40px;
            margin-left: 8px;
        }

        .fl-fl:hover {
            right: 0;
        }

        .fl-fl a {
            color: #fff !important;
            text-decoration: none;
            text-align: center;
            line-height: 43px !important;
            vertical-align: top !important;
        }

        .float-fb {
            top: 160px;
        }

        .float-tw {
            top: 215px;
        }

        .float-gp {
            top: 270px;
        }

        .float-link {
            top: 325px;
        }

        .float-ig {
            top: 380px;
        }

        .float-pn {
            top: 435px;
        }

        /* Floating Social Media Bar Style Ends Here */
    </style>
    <!--
    ============================================
    CONTACT INFORMATION
    ============================================= -->
    <div class="footer-divider">
        <div class="container">
            <a href="#">CONTACT INFO</a>
        </div>
    </div>

    <!--
    ============================================
    FOOTER
    ============================================= -->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="footer-widget">
                        <!-- <h3 style="color:black;">
                            <strong class="flex"> <img src="{theme_url}assets/img/icon/whatsapp.png"
                                    style="margin-left: 4px;" alt="" class="img-responsive" />
                                +91-<?= remove_91($whatsapp_number) ?></strong> <br>
                            <strong class="flex"> <i class="fa fa-phone-square"></i> +91-{number} </strong>
                        </h3> -->
                        <img style="height: 72px;width: 225px;" src="{base_url}upload/{logo}" alt="{title}"
                            class="img-responsive" />
                        <p class="margin-tp-30"><strong><?= ES('footer_note_title', '') ?></strong></p>
                        <p style="text-align:justify; margin-right:5px; font-size:11px;">
                            <?= ES('footer_note_description') ?>
                        </p>
                        <?php
                        if (isset($footer_note_button_link) && $footer_note_button_link) {
                            echo '<a href="' . $footer_note_button_link . '" class="text-white">' . $footer_note_button_text . '</a>';
                        }
                        ?>
                        <!-- <p style="margin-top:20px;">
                            <a href="https://www.facebook.com/careerpointskills" target="_blank"><img
                                    src="../careerpoint.ac.in/old/images/new_img/facebook.html" alt="IIT" width="22"
                                    height="22" style="margin:5px;" /></a>
                            <a href="https://twitter.com/careerpointltd" target="_blank"><img
                                    src="../careerpoint.ac.in/old/images/new_img/twitter.html" alt="IIT" width="22"
                                    height="22" style="margin:5px;" /></a>
                            <a href="https://www.youtube.com/channel/UC_YsgFYUTWiXozTyGsEGLsw" target="_blank"><img
                                    src="../careerpoint.ac.in/old/images/new_img/youtube.html" alt="IIT" width="22"
                                    height="22" style="margin:5px;" /></a>
                        </p> -->
                    </div>


                </div>

                <div class="col-sm-3">
                    <div class="footer-widget contact-details1">
                        <div class="media-body">
                            <h4 class="media-heading1"><?= ES('footer_first_text', '') ?></h4>
                        </div>
                        <ul class="media-list">
                            <?php
                            foreach ($this->ki_theme->config('footer_first_links') as $linkRow) {
                                echo '<li><a href="' . $linkRow->link . '"><i class="fa fa-angle-double-right text-danger"></i> ' . $linkRow->title . '</a></li>';
                            }
                            ?>
                        </ul>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="footer-widget contact-details1">
                        <div class="media-body">
                            <h4 class="media-heading1 margin-tp-10"><?= ES('footer_second_text', '') ?></h4>
                        </div>
                        <ul class="media-list">
                            <?php
                            foreach ($this->ki_theme->config('footer_second_links') as $linkRow) {
                                echo '<li><a href="' . $linkRow->link . '"><i class="fa fa-angle-double-right text-danger"></i> ' . $linkRow->title . '</a></li>';
                            }
                            ?>
                        </ul>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="footer-widget contact-details">
                        <ul class="media-list">
                            <li class="media">
                                <a class="pull-left" href="javascript:;">
                                    <i class="icon-location"></i>
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"> Address :</h4>
                                    <p>{address}</p>
                                </div>
                            </li>

                            <li class="media">
                                <a class="pull-left" href="javascript:;">
                                    <i class="icon-phone"></i>
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">Phone Number</h4>
                                    <p>+91-{number}</p>
                                </div>
                            </li>
                            <li class="media">
                                <a class="pull-left" href="javascript:;">
                                    <i class="icon-paper-plane"></i>
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">Email Address</h4>
                                    <p>Mail : <a href="mailto:{email}" style="color:black;">{email}</a></p>

                                </div>

                            </li>

                        </ul>

                    </div>

                </div>
            </div>
    </footer>

    <!--
    ============================================
    PRIVACY SECTION
    ============================================= -->
    <!-- <div class="footer-privacy">
        <div class="container">
            <div class="row">
                <ul class="d_inline_ul">
                    <li><a href="terms-conditions.html">Terms & Conditions</a></li>
                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                    <li><a href="refund-policy.html">Refund policy</a></li>
                </ul>
            </div>
        </div>
    </div> -->


    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="copyright">
                    Copyright &copy {YEAR} {title} {copyright}
                </div>
            </div>
        </div>

    </div>



    <!-- javascript
    ================================================== -->
    <!-- These are all the javascript files -->

    <!-- <script src="{theme_url}assets/js/jquery-1.11.1.min.js"></script> -->

    <script src="{theme_url}assets/js/bootstrap.min.js"></script>

    <!-- Libs -->

    <script src="{theme_url}assets/js/jQuery-nivoSlider/jquery.nivo.slider.pack.js"></script>

    <script src="{theme_url}assets/js/jQuery-bxSlider/jquery.bxslider.min.js"></script>

    <script src="{theme_url}assets/js/jQuery-isotope/jquery.isotope.min.js"></script>

    <script src="{theme_url}assets/js/jQuery-OwlCarousel2/dist/owl.carousel.mind233d233.js?2.0.0"></script>

    <script src="{theme_url}assets/js/jQuery-Knob/js/jquery.knob.js"></script>

    <script src="{theme_url}assets/js/jQuery-Cookie/jquery.cookie.js"></script>

    <script src="{theme_url}assets/js/jQuery-easing/jquery.easing.1.3.min.js"></script>

    <script src="{theme_url}assets/js/jQuery-infiniteScroll/jquery.infinitescroll.min.js"></script>

    <script src="{theme_url}assets/js/jQuery-infiniteScroll/behaviors/manual-trigger.js"></script>

    <script src="{theme_url}assets/js/jQuery-fancyBox/source/jquery.fancybox.pack.js"></script>

    <script src="{theme_url}assets/js/jQuery-FitText/jquery.fittext.js"></script>

    <script src="{theme_url}assets/js/jQuery-retina/retina.min.js"></script>

    <script src="{theme_url}assets/js/jQuery-mediaElement/build/mediaelement-and-player.min.js"></script>

    <!-- <script src="{theme_url}assets/vendor/jQuery-autoComplete/jquery.autocomplete.min.js"></script> -->

    <!-- <script src="{theme_url}assets/vendor/jQuery-autoComplete/currency-autocomplete.js"></script> -->

    <!-- Theme Initializer -->

    <script src="{theme_url}assets/js/theme.js"></script>

    <script src="{theme_url}assets/js/plugins.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
    <script>
        // Initialize Fancybox (optional; Fancybox auto-binds with the attribute `data-fancybox`)
        Fancybox.bind("[data-fancybox]", {
            // Customize options here (optional)
            Thumbs: {
                autoStart: true, // Display thumbnails on open
            },
            Toolbar: {
                display: ["close"], // Display close button
            }
        });
    </script>
    <!--<script src="{theme_url}assets/js/wow.min.js"></script>-->
    <script>



        $(document).ready(function () {
            $("#cpisd_popup").modal('show');
            // $("#popupimg").modal('show');
        })


        $(document).ready(function () {
            $("#popupimg").modal('show');
            // $("#popupimg").modal('show');
        })
    </script>
</body>