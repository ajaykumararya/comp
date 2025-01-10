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
    function saveEnquiry() {
        check = true;
        if ($('#e_name').val() == "") {
            check = false;
            $('#e_name').addClass('error');
            $('#e_name').focus();
        } else {
            $('#e_name').removeClass('error');

        }

        if ($('#e_email').val() == "") {
            check = false;
            $('#e_email').addClass('error');
            $('#e_email').focus();
        } else {
            $('#e_email').removeClass('error');

        }

        if ($('#e_mobile').val() == "") {
            check = false;
            $('#e_mobile').addClass('error');
            $('#e_mobile').focus();
        } else {
            $('#e_mobile').removeClass('error');

        }

        if ($('#e_category').val() == "") {
            check = false;
            $('#e_category').addClass('error');
            $('#e_category').focus();
        } else {
            $('#e_category').removeClass('error');

        }

        if ($('#e_qualification').val() == "") {
            check = false;
            $('#e_qualification').addClass('error');
            $('#e_qualification').focus();
        } else {
            $('#e_qualification').removeClass('error');

        }

        if ($('#e_gender').val() == "") {
            check = false;
            $('#e_gender').addClass('error');
            $('#e_gender').focus();
        } else {
            $('#e_gender').removeClass('error');

        }

        if ($('#e_district').val() == "") {
            check = false;
            $('#e_district').addClass('error');
            $('#e_district').focus();
        } else {
            $('#e_district').removeClass('error');

        }

        if ($('#e_state').val() == "") {
            check = false;
            $('#e_state').addClass('error');
            $('#e_state').focus();
        } else {
            $('#e_state').removeClass('error');

        }

        if (check) {
            $('#preloader').css('display', 'block');
            $.ajax({
                url: "http://cpisd.in/rgs_form/saveEnquiry.php",
                type: "POST",
                dataType: 'json',
                data: $("#enq_form").serialize(),
                success: function (response) {
                    $('#preloader').css('display', 'none');
                    if (response.status == true) {
                        alert(response.message);
                        setTimeout(function () {
                            window.location.reload()
                        }, 1500);
                    } else {
                        alert(response.message);
                        return false;
                    }
                }
            });
        }
    }
</script>


<body>

    <div class="preloader" id="preloader" style="display: none">
        <div class="preloader-inner">
            <div class="loader"> <img src="{theme_url}assets/loader.gif" alt="loader" class="img_loader"> </div>
        </div>
    </div>



    <nav class="navbar navbar-default" role="navigation" style='margin-bottom: 0px;'>
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

        </div><!-- /.container-fluid -->
    </nav>
    <!-- End Topbar blog -->
    <div style="background-color: #fff;">
        <div class="container">
            <div class="row">
                <div id="header" class="clearfix" style="padding: 15px 0px;">
                    <div class="col-md-2">
                        <a href="index.html">
                            <center>
                                <img style="height:89px" src="{base_url}upload/{logo}" alt="{title}"
                                    class="img-responsive" />
                            </center>
                        </a>
                    </div>
                    <div class="col-md-1">
                        <center><img src="asset/images/NSDC-logo-2022-12.png" alt="NSDC"
                                class="img-responsive img_size" /></center>
                    </div>
                    <div class="col-md-1">
                        <center><img src="asset/images/skill-india-header-logo.jpg" alt="Skill India"
                                class="img-responsive" /></center>
                    </div>
                    <div class="col-md-1">
                        <center><img src="asset/images/telecom-sector-logo.png" alt="telecom sector"
                                class="img-responsive" /></center>
                    </div>
                    <div class="col-md-7">
                        <div class="row- header-top text-right">
                            <a href="application_form/index.html" class="btn btn-danger btn-sm"
                                style="margin-bottom:5px;">Partner With Us</a>
                            <a href="#" data-toggle="modal" data-target="#popupcp2016" class="btn btn-danger btn-sm"
                                style="margin-bottom:5px;">Get a Call</a>

                            <a href="http://www.cpisd.in/training-partner/registration-form"
                                class="btn btn-danger btn-sm" style="margin-bottom:5px;">Student Registration
                            </a>

                            <a href="training-partner/login.html" class="btn btn-danger btn-sm"
                                style="margin-bottom:5px;"> Franchise Panel </a>
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
                                        $activeCss = $value['isActive'] ? 'active' : ''; //getActiveMenu($value['page_id'],'active');
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
                                <ul class="nav navbar-nav nav-main" style="display:none">
                                    <li><a href="">Home</a></li>
                                    <li><a href="about/about.html">About Us</a></li>

                                    <li class="dropdown">
                                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">Our Programs</a>
                                        <ul class="dropdown-menu normalmenu">
                                            <li><a href="http://www.cpisd.in/collaboration/pmkvy.asp"><i
                                                        class="fa fa-file-text"></i> PMKVY</a></li>
                                            <li><a href="http://www.cpisd.in/collaboration/nsdc.asp"><i
                                                        class="fa fa-file-text"></i> NSDC</a></li>
                                            <li><a href="http://www.cpisd.in/collaboration/rsldc.asp"><i
                                                        class="fa fa-file-text"></i> RSLDC</a></li>
                                            <li><a href="http://www.cpisd.in/collaboration/ddu-gky.asp"><i
                                                        class="fa fa-file-text"></i> DDU-GKY</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">Business
                                            Associate</a>
                                        <ul class="dropdown-menu normalmenu">
                                            <li><a href="franchise/franchise.html">Centre Requirment</a>
                                            </li>
                                            <li><a href="http://www.cpisd.in/franchise/our-training-partners.asp">PMKVY
                                                    Training Partners</a></li>
                                            <li><a href="http://www.cpisd.in/franchise/nsdc-centres.aspx">NSDC Training
                                                    Partners</a></li>
                                            <li><a href="http://www.cpisd.in/franchise/nsdc-regional-partners.asp">NSDC
                                                    Regional Partners</a></li>
                                            <li><a href="http://www.cpisd.in/franchise/documents.asp">Business Associate
                                                    Documents</a></li>
                                            <li><a href="nsdc/courses.html">Course Curriculum</a></li>
                                            <!-- <li><a href="http://cpisd.in/nsdc/study-material.asp">Course Curriculum</a></li> -->
                                            <!--<li><a href="http://www.cpisd.in/franchise/medical-record-data-management.asp">Medical Record Data Management</a></li>-->
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">News-Media</a>
                                        <ul class="dropdown-menu normalmenu">

                                            <li><a href="gallery/news.html">News</a></li>
                                            <li><a href="gallery/testimonial.html">Testimonial</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="gallery/placement.html">Placement</a></li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" href="#"
                                            data-toggle="dropdown"><strong>DDU-GKY</strong></a>
                                        <ul class="dropdown-menu normalmenu">
                                            <li><a href="http://www.cpisd.in/collaboration/ddu-gky.asp"><i
                                                        class="fa fa-file-text"></i> About DDU-GKY</a></li>
                                            <li><a href="#"><i class="fa fa-file-text"></i> Our Centres</a></li>
                                            <li><a href="#"><i class="fa fa-file-text"></i> Courses</a></li>
                                            <li><a href="#"><i class="fa fa-file-text"></i> Placement</a></li>
                                            <li><a href="gallery/photo-gallery.html"><i
                                                        class="fa fa-file-text"></i>Photo Gallery</a></li>
                                            <li><a href="#"><i class="fa fa-file-text"></i> Conatct Us</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="http://www.cpisd.in/student/nsdc.aspx">NSDC Student Detail</a></li>
                                    <li><a href="gallery/photo-gallery.html">Photo Gallery</a></li>
                                    <li><a href="contact/contact.html">Contact Us</a></li>
                                </ul>
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
                        <h3 style="color:#fff;">
                            <strong class="flex"> <img src="{theme_url}assets/img/icon/whatsapp.png"
                                    style="margin-left: 4px;" alt="" class="img-responsive" />
                                +91-<?=remove_91($whatsapp_number)?></strong> <br>
                            <strong class="flex"> <i class="fa fa-phone-square"></i> +91-{number} </strong>
                        </h3>
                        <p class="margin-tp-30"><strong>CAREER POINT LTD -</strong> <br /><em><strong>Providing Quality
                                    Education Since 1993</strong></em> </p>
                        <p style="text-align:justify; margin-right:5px; font-size:11px;">Career Point Institute of Skill
                            Development was setup to fulfill the growing need in India for skilled manpower across
                            sectors
                            and narrow the existing gap between the demand and supply of employment.</p>
                        <p style="margin-top:20px;">
                            <a href="https://www.facebook.com/careerpointskills" target="_blank"><img
                                    src="../careerpoint.ac.in/old/images/new_img/facebook.html" alt="IIT" width="22"
                                    height="22" style="margin:5px;" /></a>
                            <a href="https://twitter.com/careerpointltd" target="_blank"><img
                                    src="../careerpoint.ac.in/old/images/new_img/twitter.html" alt="IIT" width="22"
                                    height="22" style="margin:5px;" /></a>
                            <a href="https://www.youtube.com/channel/UC_YsgFYUTWiXozTyGsEGLsw" target="_blank"><img
                                    src="../careerpoint.ac.in/old/images/new_img/youtube.html" alt="IIT" width="22"
                                    height="22" style="margin:5px;" /></a>
                        </p>
                    </div>


                </div>

                <div class="col-sm-3">
                    <div class="footer-widget contact-details1">
                        <div class="media-body">
                            <h4 class="media-heading1"> Our Collaboration</h4>
                        </div>
                        <ul class="media-list">
                            <li><a href="http://www.cpisd.in/collaboration/pmkvy.asp"><i
                                        class="fa fa-angle-double-right text-danger"></i> PMKVY</a></li>
                            <li><a href="http://www.cpisd.in/collaboration/nsdc.asp"><i
                                        class="fa fa-angle-double-right text-danger"></i> NSDC</a></li>
                            <li><a href="http://www.cpisd.in/collaboration/rsldc.asp"><i
                                        class="fa fa-angle-double-right text-danger"></i> RSLDC</a></li>
                            <li><a href="http://www.cpisd.in/collaboration/ddu-gky.asp"><i
                                        class="fa fa-angle-double-right text-danger"></i> DDU-GKY</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="footer-widget contact-details1">
                        <div class="media-body">
                            <h4 class="media-heading1 margin-tp-10">Franchise</h4>
                        </div>
                        <ul class="media-list">
                            <li><a href="franchise/franchise.html"><i class="fa fa-angle-double-right text-danger"></i>
                                    Set Up Requirment</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#popupcp2016"><i
                                        class="fa fa-angle-double-right text-danger"></i> Franchisee Enquiry Form</a>
                            </li>
                            <li><a href="http://www.cpisd.in/franchise/nsdc-centres.aspx"><i
                                        class="fa fa-angle-double-right text-danger"></i> Our Training Partners</a></li>
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
                                    <p>Mail : <a href="mailto:{email}" style="color:#FFFFFF;">{email}</a></p>

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
                    Copyright &copy {YEAR} {title}. All Right Reserved
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

    <script src="{theme_url}assets/vendor/jQuery-autoComplete/jquery.autocomplete.min.js"></script>

    <script src="{theme_url}assets/vendor/jQuery-autoComplete/currency-autocomplete.js"></script>

    <!-- Theme Initializer -->

    <script src="{theme_url}assets/js/theme.js"></script>

    <script src="{theme_url}assets/js/plugins.js"></script>

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
        $(document).on('click', '#sendEnquiry', function () {
            $.ajax({
                type: "POST",
                url: "https://cpisd.in/enquiry",
                dataType: 'json',
                data: $("#enquiryForm").serialize(),
                error: function (response) {
                    // console.log(response);
                    $('.has-error').removeClass('has-error');
                    $(".help-block").remove();
                    var erroJson = JSON.parse(response.responseText);
                    for (var err in erroJson) {
                        for (var errstr of erroJson[err])
                            $("#" + err + "").parent('.form-group').addClass('has-error');
                        $("#" + err + "").after(
                            "<div class='help-block'>" +
                            errstr + "</div>");
                    }
                },
                success: function (response) {
                    if (response.status) {
                        $('.has-error').removeClass('has-error');
                        $(".help-block").remove();
                        $("#popupcp2016").modal('hide');
                        $("#enquiryForm").trigger('reset');
                        window.alert(response.message);
                    } else {
                        $('.has-error').removeClass('has-error');
                        $(".help-block").remove();
                        $("#popupcp2016").modal('hide');
                        $("#enquiryForm").trigger('reset');
                        window.alert(response.message);
                    }


                }
            });
        });
        $(document).on('click', '#submitEnquiry', function () {
            $.ajax({
                type: "POST",
                url: "https://cpisd.in/student-enquiry",
                dataType: 'json',
                data: $("#studentEnquiry").serialize(),
                error: function (response) {
                    // console.log(response);
                    $('.has-error').removeClass('has-error');
                    $(".help-block").remove();
                    var erroJson = JSON.parse(response.responseText);
                    for (var err in erroJson) {
                        for (var errstr of erroJson[err])
                            $("#" + err + "").parent('.form-group').addClass('has-error');
                        $("#" + err + "").after(
                            "<div class='help-block'>" +
                            errstr + "</div>");
                    }
                },
                success: function (response) {
                    if (response.status) {
                        $('.has-error').removeClass('has-error');
                        $(".help-block").remove();
                        $("#Enquiry").modal('hide');
                        $("#studentEnquiry").trigger('reset');
                        window.alert(response.message);
                    } else {
                        $('.has-error').removeClass('has-error');
                        $(".help-block").remove();
                        $("#Enquiry").modal('hide');
                        $("#studentEnquiry").trigger('reset');
                        window.alert(response.message);
                    }


                }
            });
        });
    </script>
</body>