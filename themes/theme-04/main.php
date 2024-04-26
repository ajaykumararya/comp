<script type="text/javascript" src="{theme_url}wslider/engine1/jquery.js"></script>
<style type="text/css">
    .welcome {
        position: fixed;
        top: 10%;
        left: 20%;
        z-index: 1000;
    }

    .welcome .close {
        position: absolute;
        top: -5px;
        right: 100px;
        width: 70px;
        height: 50px;
        line-height: 50px;
        padding: 1px;
        background: url('adm/files/close.png') no-repeat center;
        z-index: 1001;
        opacity: 1
    }

    .demoTest {
        position: fixed;
        z-index: 5000;
        right: 0px;
        top: 330px;
        width: 45px;
        height: 170px;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        background: #0066CC;
        color: #000000;
        background-image: url(free.png);
        background-position: center;
        background-repeat: no-repeat;
        background-size: 24px 168px;
        -moz-transition: background 0.4s;
        -ms-transition: background 0.4s;
        -o-transition: background 0.4s;
        transition: background 0.4s;
    }

    .demoTest:hover {
        background: #67B3FE;
        background-image: url(free.png);
        background-position: center;
        background-repeat: no-repeat;
        background-size: 24px 160px;
    }

    .demoTest1 {
        position: fixed;
        z-index: 5000;
        right: 0px;
        top: 150px;
        width: 45px;
        height: 170px;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        background: #0066CC;
        color: #000000;
        background-image: url(free1.png);
        background-position: center;
        background-repeat: no-repeat;
        background-size: 24px 168px;
        -moz-transition: background 0.4s;
        -ms-transition: background 0.4s;
        -o-transition: background 0.4s;
        transition: background 0.4s;
    }

    .demoTest1:hover {
        background: #67B3FE;
        background-image: url(free1.png);
        background-position: center;
        background-repeat: no-repeat;
        background-size: 24px 160px;
    }
</style>
<style>
    .popupBox {
        display: none;
        position: fixed;
        top: 30%;
        left: 40%;
        margin-top: -9em;
        /*set to a negative number 1/2 of your height*/
        margin-left: -15em;
        width: 30em;
        height: 36em;
        color: #000000;
        border: 5px solid #4E93A2;
        -moz-border-radius: 8px;
        -webkit-border-radius: 8px;
        background-color: #FFFFFF;
        z-index: 1000;
    }

    .popupContent {
        display: none;
        font-family: Arial, Helvetica, sans-serif;
        color: #4E93A2;
        margin-top: 30px;
        margin-left: 30px;
        margin-right: 30px;
    }

    .deleteMeetingButton {
        clear: both;
        cursor: pointer;
        width: 100px;
        height: 30px;
        border-radius: 4px;
        background-color: #5CD2D2;
        border: none;
        text-align: center;
        line-height: 10px;
        color: #FFFFFF;
        font-size: 11px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
    }

    /* added code below */
    .deleteMeetingClose {
        font-size: 1.5em;
        cursor: pointer;
        position: absolute;
        right: 10px;
        top: 5px;
    }
</style>
<script>
    $(document).ready(function () {
        /*
        $('.deleteMeeting').click(function () {
            $('#overlay').fadeIn('slow');
            $('#popupBox').fadeIn('slow');
            $('#popupContent').fadeIn('slow');
        });
        */
        $('#b0').click(function () {
            $('.deleteMeetingClose').trigger('click');
            $('.popupBox').width('32em');
            $('.popupBox').height('28em');
            $('#popupBox0').fadeIn('slow');
            $('#popupContent0').fadeIn('slow');
        });
        $('#b1').click(function () {
            $('.deleteMeetingClose').trigger('click');
            $('.popupBox').width('20em');
            $('.popupBox').height('26em');
            $('#popupBox1').fadeIn('slow');
            $('#popupContent1').fadeIn('slow');
        });
        $('#b2').click(function () {
            $('.deleteMeetingClose').trigger('click');
            $('.popupBox').width('20em');
            $('.popupBox').height('26em');
            $('#popupBox2').fadeIn('slow');
            $('#popupContent2').fadeIn('slow');
        });
        $('#b3').click(function () {
            $('.deleteMeetingClose').trigger('click');
            $('.popupBox').width('20em');
            $('.popupBox').height('26em');
            $('#popupBox3').fadeIn('slow');
            $('#popupContent3').fadeIn('slow');
        });
        $('#b4').click(function () {
            $('.deleteMeetingClose').trigger('click');
            $('.popupBox').width('26em');
            $('.popupBox').height('16em');
            $('#popupBox4').fadeIn('slow');
            $('#popupContent4').fadeIn('slow');
        });
        $('#b5').click(function () {
            $('.deleteMeetingClose').trigger('click');
            $('.popupBox').width('26em');
            $('.popupBox').height('16em');
            $('#popupBox5').fadeIn('slow');
            $('#popupContent5').fadeIn('slow');
        });
        $('#b6').click(function () {
            $('.deleteMeetingClose').trigger('click');
            $('.popupBox').width('22em');
            $('.popupBox').height('26em');
            $('#popupBox6').fadeIn('slow');
            $('#popupContent6').fadeIn('slow');
        });
        $('#b7').click(function () {
            $('.deleteMeetingClose').trigger('click');
            $('.popupBox').width('18em');
            $('.popupBox').height('30em');
            $('#popupBox7').fadeIn('slow');
            $('#popupContent7').fadeIn('slow');
        });
        // added .deleteMeetingClose into the selectors
        $('.deleteMeetingClose').click(function () {
            $('#overlay').fadeOut('slow');
            $('.popupBox').fadeOut('slow');
            $('.popupContent').fadeOut('slow');
        });
    });
</script>
</head>

<body class="full-intro background--dark">
    <font-family: Verdana, sans-serif;>
        <font colour="#DAA520"></font>
        <a href="scEnquiry.html" class="demoTest" alt=""></a>
        <a href="candidate/index.html" class="demoTest1" alt=""></a>
        <!--loader-->
        <div id="preloader">
            <div class="sk-circle">
                <div class="sk-circle1 sk-child"></div>
                <div class="sk-circle2 sk-child"></div>
                <div class="sk-circle3 sk-child"></div>
                <div class="sk-circle4 sk-child"></div>
                <div class="sk-circle5 sk-child"></div>
                <div class="sk-circle6 sk-child"></div>
                <div class="sk-circle7 sk-child"></div>
                <div class="sk-circle8 sk-child"></div>
                <div class="sk-circle9 sk-child"></div>
                <div class="sk-circle10 sk-child"></div>
                <div class="sk-circle11 sk-child"></div>
                <div class="sk-circle12 sk-child"></div>
            </div>
        </div>
        <!--loader-->
        <!-- Site Wrapper -->
        <div class="wrapper">
            <!-- All India Computer Saksharta Mission -->
            <script type="text/javascript">
                (function () {
                    var options = {
                        whatsapp: "+91 9667555300 ", // WhatsApp number
                        call_to_action: "May i Help you..!!!", // Call to action
                        position: "left", // Position may be 'right' or 'left'
                    };
                    var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
                    var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
                    s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
                    var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
                })();
            </script>
            <!-- HEADER -->
            <!--Start Top bar area -->
            <section class="top-bar-area">
                <div class="container">
                    <div class="clearfix">
                        <div class="right">
                            <p>
                            <div id="google_translate_element"></div>
                            <script type="text/javascript">
                                function googleTranslateElementInit() {
                                    new google.translate.TranslateElement({
                                        pageLanguage: 'en',
                                        includedLanguages: 'hi,gu,bn,ur,ta,te',
                                        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                                    }, 'google_translate_element');
                                }
                            </script>
                            <script type="text/javascript"
                                src="../translate.google.com/translate_a/elementa0d8.js?cb=googleTranslateElementInit"></script>
                            <div class="Right">
                                <i class="phone-office.svg"><img src="{theme_url}image/linkage/phone-office.svg"></i>
                                Help Line :-
                                0744-2392007</b>
                                <div class="pull-right">
                                    <a href="http://skills.aicsm.com/" class="_blank" alt="">
                                        <button class="btn btn-primary" type="button">Skills Website</button></a>
                                    <a href="https://aicsm.online/public/" class="_blank" alt="">
                                        <button class="btn btn-primary" type="button">E-Learn</button></a>
                                    <a href="adm/index.html"><button class="btn btn-primary" type="button" alt="">Center
                                            Login</button></a>
                                    <a href="adm/index.html"> <button class="btn btn-danger" type="button"
                                            alt="">Officer
                                            Login</button></a>
                                    <a href="candidate/index.html"><button class="btn btn-success" alt="">
                                            Student Login</button></a>
                                    <a href="SrchByFrmNoOutSide.html"><button class="btn btn-info" alt="">
                                            Student Verification</button></a>
                                    </p>
                                </div>
                            </div>
                        </div>
            </section>
            <!--End Top bar area -->
            <!--Start header area-->
            <header class="header-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="logo">
                                <a href="index.html" target="_blank" alt="">
                                    <img src="{theme_url}img/aicsmlogo2.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="logo" align="center">
                                <a href="index.html" targe="_blank" alt="">
                                    <img src="{theme_url}img/AICSM%20TEXT.jpg" alt="">
                                </a>
                                <br>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-10 col-xs-10">
                            <div class="logo" align="center">
                                <a href="index.html" alt="">
                                    <img src="{theme_url}img/aicsmlogo1.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--End header area-->
            <!--Start mainmenu area-->
            <section class="mainmenu-area">
                <div class="container">
                    <div class="mainmenu-bg">
                        <div class="row">
                            <div class="col-md-12 col-sm-8 col-xs-8">
                                <!--Start mainmenu-->
                                <nav class="main-menu">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                            data-target=".navbar-collapse">
                                            <span class="icon-bar"></span><span class="icon-bar"></span><span
                                                class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <div class="navbar-collapse collapse clearfix">
                                        <?php
                                        $pageCount = 0;
                                        // $ismobile = false;
                                        function get_menu($items, $class = '', $liClass = '', $linkClass = 'dropdown-toggle nav-link', $boxID = '')
                                        {


                                            // global $ismobile;
                                            $html = "<ul class=\"" . $class . "\" id=\"" . $boxID . "\">";



                                            foreach ($items as $key => $value) {
                                                $activeCss = $value['isActive'] ? 'active' : ''; //getActiveMenu($value['page_id'],'active');
                                                $link = $value['link'];

                                                $iconWithTExt = $value['label'];

                                                if (array_key_exists('child', $value))

                                                    $html .= '<li class="' . $activeCss . ' "><a href="#!" ' . $value['target'] . ' class="menu-css ' . $linkClass . '" data-toggle="dropdown"><font color="#FDFDFD">' . $iconWithTExt . '</font></a>' . ($liClass == 'isMobile' ? '<span class="submenu-button"></span>' : '');
                                                else

                                                    $html .= '<li class="' . $activeCss . '"><a href="' . $link . '" ' . $value['target'] . ' class="menu-css dropdown-item nav-link nav_item">' . $iconWithTExt . '</a>';



                                                if (array_key_exists('child', $value)) {
                                                    // $html .= '<div class="dropdown-menu">';
                                                    $html .= get_menu($value['child'], 'sub-nav', '', '');
                                                    // $html .= '</div>';
                                                }

                                                $html .= "</li>";

                                            }

                                            $html .= "</ul>";



                                            return $html;



                                        }
                                        echo get_menu($menus, 'navigation clearfix');
                                        // $ismobile = true;
                                        echo get_menu($menus, 'mobile-menu clearfix', 'isMobile');
                                        ?>
                                        <!-- ==============================
                                        =========Mobile Navigation==========
                                        ==================================== -->

                                    </div>
                            </div>
                        </div>
                    </div>
            </section>
            <div class="clearfix"></div>
            <!-- End Intro Section -->
            <div>
                <div class="row">
                    {output}
                </div>


                <!-- Client Logos Section -->
                <!-- End Client Logos Section -->
                <!-- FOOTER -->
                <footer class="footer pt-80 pt-xs-60">
                    <div class="container">
                        <!--Footer Info -->
                        <div class="row footer-info mb-60">
                            <div class="col-md-3 col-sm-4 col-xs-12 mb-sm-30">
                                <h4 class="mb-30">
                                    <font color="#653a88;">CONTACT Us</font>
                                </h4>
                                <address>
                                    <i class="fa fa-angle-double-right"></i></i>
                                    <font color="#653a88;">
                                        Head Office : 96 - II Floor Kalawati Paliwal Market, Gumanpura, Kota,
                                        Rajasthan.(India)
                                    </font>
                                </address>
                                <ul class="link-small">
                                    <li>
                                        <a><i class="fa fa-angle-double-right"></i>
                                            <font color="#653a88;"><a href="mailto:rjits@aicsm.com">rjits@aicsm.com
                                            </font>
                                        </a>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-angle-double-right"></i>
                                            <font color="#653a88;">+91-744 -2392007</font>
                                        </a>
                                    </li>
                                    <a
                                        href="https://api.whatsapp.com/send/?phone=919667555300&amp;text&amp;app_absent=0">
                                        <i class="fa fa-whatsapp">
                                            <font color="#653a88;"></span>9667555300</font>
                                        </i> </a>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 mb-sm-30">
                                <h4 class="mb-30">Quick Links</h4>
                                <ul class="link blog-link">
                                    <li>
                                        <a href="aicsmIntro.html"><i class="arrow-circle-right-duotone.svg"
                                                style="color: #653a88;" alt=""><img
                                                    src="{theme_url}image/linkage/arrow-circle-right-duotone.svg"></i>
                                            AICSM
                                            Introduction</a>
                                    </li>
                                    <li>
                                        <a href="how-to-get-center-frenchise.html"><i
                                                class="arrow-circle-right-duotone.svg" style="color: #653a88;"
                                                alt=""><img
                                                    src="{theme_url}image/linkage/arrow-circle-right-duotone.svg"></i>
                                            How to
                                            get Affiliation </a>
                                    </li>
                                    <li>
                                        <a href="SrchByFrmNoOutSide.html"><i class="arrow-circle-right-duotone.svg"
                                                style="color: #653a88;" alt=""><img
                                                    src="{theme_url}image/linkage/arrow-circle-right-duotone.svg"></i>
                                            Student
                                            Verification</a>
                                    </li>
                                    <li>
                                        <a href="Insurance.html"><i class="arrow-circle-right-duotone.svg"
                                                style="color: #653a88;" alt=""><img
                                                    src="{theme_url}image/linkage/arrow-circle-right-duotone.svg"></i>
                                            Insurance </a>
                                    </li>
                                    <li>
                                        <a href="Career.html"><i class="arrow-circle-right-duotone.svg"
                                                style="color: #653a88;" alt=""><img
                                                    src="{theme_url}image/linkage/arrow-circle-right-duotone.svg"></i>
                                            Career
                                        </a>
                                    </li>
                                    <li>
                                        <a href="CustomerEnquiry.html"><i class="arrow-circle-right-duotone.svg"
                                                style="color: #653a88;" alt=""><img
                                                    src="{theme_url}image/linkage/arrow-circle-right-duotone.svg"></i>
                                            Aicsm
                                            Trusted Brand Since-1999 </a>
                                    </li>
                                    <li>
                                        <a href="WhyAicsm.html"><i class="arrow-circle-right-duotone.svg"
                                                style="color: #653a88;" alt=""><img
                                                    src="{theme_url}image/linkage/arrow-circle-right-duotone.svg"></i>
                                            Why
                                            Aicsm Best Franchise</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 mb-sm-30">
                                <h4 class="mb-30">Courses</h4>
                                <ul class="link blog-link">
                                    <li>
                                        <a href="CerifiedCourse.html"
                                            alt="best Computer Franchise,Computer Course, Indias no. 1 franchise,Govt Authorized certification,best computer education ,Govt Authorized Computer Courses,all india saksharta mission,all india computer saksharta mission certificate,aicsm logo,aicsm courses,computer saksharta mission franchise,computer saksharta,computer course by government of india,sarkari computer centre,free computer training centre,computer institute registration form,computer institute registration,govt registere,Contact For- Computer Education Franchise-9667555300,computer education franchisee,Govt Job Oriented certificate,helpfull For govt job,Job me sahayak,Saksharta mission IT course,Saksharta mission IT progrme,best computer education in india,govt affiliation for computer institute, govt computer courses,online computer courses india omputer education Franchisee call 9667555300aicsm,best computer franchise,best computer education, Indias no. 1 franchise,Govt Authorized certification,best computer education ,Govt Authorized Computer Courses,all india saksharta mission,all india computer saksharta mission certificate,aicsm logo,aicsm courses,computer saksharta mission franchise,computer saksharta,computer course by government of india,sarkari computer centre,free computer training centre,computer institute registration form,computer institute registration,govt registere,Contact For- Computer Education Franchise-9667555300,computer education franchisee,Govt Job Oriented certificate,helpfull For govt job,Job me sahayak,Saksharta mission IT course,Saksharta mission IT progrme,best computer education in india,govt affiliation for computer institute, govt computer courses,online computer courses india,trusted Skill Education,no1 Franchise brand,Why Aicsm Best,Boost the skills,NSDC training center franchise, skill development campaign, large scale across the country, purpose is to provide training also employment,Skill development ,huge role in getting the youth to stand on their feet. NSDC franchise, computer center franchise, AICSM – All India Computer Saksharta Mission,Become NSDC Authorized Training Center,Government Recognize Computer institute,Valid certification in Government sector Boost the skills,NSDC training center franchise, skill development campaign, large scale across the country, purpose is to provide training also employment,Skill development ,huge role in getting the youth to stand on their feet.no1 Franchise,trusted Skill Education,no1 Franchise brand,Why Aicsm Best,Boost the skills,NSDC training center franchise, skill development campaign, large scale across the country, purpose is to provide training also employment,Skill development ,huge role in getting job"><i
                                                class="arrow-circle-right-duotone.svg"><img
                                                    src="{theme_url}image/linkage/arrow-circle-right-duotone.svg"></i>Certified
                                            Courses</i></a>
                                    </li>
                                    <li>
                                        <a href="DiplomaCourse.html" alt=""><i
                                                class="arrow-circle-right-duotone.svg"><img
                                                    src="{theme_url}image/linkage/arrow-circle-right-duotone.svg"></i>
                                            Diploma
                                            Courses</a>
                                    </li>
                                    <li>
                                        <a href="PgdcaCourse.html" alt=""><i class="arrow-circle-right-duotone.svg"><img
                                                    src="{theme_url}image/linkage/arrow-circle-right-duotone.svg"></i>
                                            PG
                                            Diploma Courses</i></a>
                                    </li>
                                    <li>
                                        <a href="AdvanceDiploma.html" alt=""><i
                                                class="arrow-circle-right-duotone.svg"><img
                                                    src="{theme_url}image/linkage/arrow-circle-right-duotone.svg"></i>
                                            Advance
                                            Diploma</i></a>
                                    </li>
                                    <li>
                                        <a href="https://nsdcindia.org/nos-listing/21" alt=""><i
                                                class="arrow-circle-right-duotone.svg"><img
                                                    src="{theme_url}image/linkage/arrow-circle-right-duotone.svg"></i></i>
                                            Medical</a>
                                    </li>
                                    <li>
                                        <a href="https://yoga.in/" alt=""><i class="arrow-circle-right-duotone.svg"><img
                                                    src="{theme_url}image/linkage/arrow-circle-right-duotone.svg"></i></i>Yoga</a>
                                    </li>
                                    <li>
                                        <a href="AllCourse.html" alt=""><i class="arrow-circle-right-duotone.svg"><img
                                                    src="{theme_url}image/linkage/arrow-circle-right-duotone.svg"></i>
                                            All
                                            Course's</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 mt-sm-30 mt-xs-30">
                                <div class="icons-hover-black">
                                    <a href="https://web.facebook.com/allindiacomputer/"><i
                                            class="fa-brands fa-facebook"><img
                                                src="{theme_url}image/linkage/facebook-round-icon.svg"></i></a>
                                    <a href="https://twitter.com/AICSM2"> <i class="fa fa-twitter"><img
                                                src="{theme_url}image/linkage/twitter-round-icon.svg"></i> </a>
                                    <a href="https://www.youtube.com/channel/UCiuOUJpSb5bczYeeZKERwtg"> <i
                                            class="fa fa-youtube"><img
                                                src="{theme_url}image/linkage/youtube-round-icon.svg"></i> </a>
                                    <a href="https://www.linkedin.com/feed/?trk=onboarding-landing"> <i
                                            class="fa fa-linkedin"><img
                                                src="{theme_url}image/linkage/linkedin-round-icon.svg"></i> </a>
                                    <a href="https://www.instagram.com/aicsm_99/"> <i class="fa fa-instagram"><img
                                                src="{theme_url}image/linkage/instagram-round-icon.svg"></i> </a>
                                    <a
                                        href="https://api.whatsapp.com/send/?phone=919667555300&amp;text&amp;app_absent=0">
                                        <i class="fa fa-whatsapp"><img
                                                src="{theme_url}image/linkage/whatsapp-round-icon.svg"></i> </a>
                                </div>
                                <div class="newsletter">
                                    Feel Free to contact us, any of the mail ids: rjits@aicsm.com ,
                                    director@aicsm.com
                                    <br> Or call Mobile No : 91-96675-55300, 96675-35700, 96672-22800, 96672-22700
                                    <br> <br>
                                    <a href="TermsCondition.html">
                                        <font color="#0072B5">Terms & Condition</font>
                                    </a>
                                    <font color="#0072B5"> |
                                    </font> <a href="Disclaimer.html">
                                        <font color="#0072B5">Disclaimer </font>
                                    </a>
                                    <br>
                                    <a href="PrivacyPolicy.html">
                                        <font color="#0072B5">Privacy Policy </font>
                                    </a>
                                    <font color="#0072B5"> </font> <a href="refundpollicy.html">
                                        <font color="#0072B5">Refund Policy </font>
                                    </a>
                                    <br>
                                    <a href="https://rss.app/feeds/F4h1ZUn6hqzMFPjd.xml">
                                        <font color="#0072B5">RSS Feed</font>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Footer Info -->
                    </div>
                    <!-- Copyright Bar -->
                    <div class="copyright">
                        <div class="container">
                            <p>
                                <font color="#FDAC53">© 1999 <a>
                                        <font color="#FDAC53">ALL INDIA COMPUTER SAKSHARTA MISSION</font>
                                    </a>
                                    <font color="#FFFAFA"> All Rights Reserved</font>
                            </p>
                        </div>
                    </div>
                    <!-- End Copyright Bar -->
                </footer>
                <!-- END FOOTER -->
            </div>
            <!-- Site Wraper End -->
            <script>
                $(document).ready(function () {
                    $('.close').click(function () {
                        $(".welcome").hide()
                    });
                    $('.welcome').click(function () {
                        $(".welcome").hide();
                    });
                });
                $(document).ready(function () {
                    $("button").click(function () {
                        $(".newupdates").hide()
                    });
                });
                $(document).ready(function () {
                    $("button").click(function () {
                        $(".frm").show()
                    });
                });
            </script>
            <!-- masonry,isotope Effect Js -->
            <!-- <script src="{theme_url}assets/js/jquery-1.12.4.min.js" type="text/javascript"></script> -->
            <script src="{theme_url}assets/js/imagesloaded.pkgd.min.js" type="text/javascript"></script>
            <script src="{theme_url}assets/js/isotope.pkgd.min.js" type="text/javascript"></script>
            <script src="{theme_url}assets/js/masonry.pkgd.min.js" type="text/javascript"></script>
            <script src="{theme_url}assets/js/jquery.appear.js" type="text/javascript"></script>
            <!-- bootstrap Js -->
            <script src="{theme_url}assets/js/bootstrap.min.js" type="text/javascript"></script>
            <!-- carousel Js -->
            <script src="{theme_url}assets/js/plugin/owl.carousel.js" type="text/javascript"></script>
            <!-- fancybox Js -->
            <script src="{theme_url}assets/js/jquery.mousewheel-3.0.6.pack.js" type="text/javascript"></script>
            <script src="{theme_url}assets/js/jquery.fancybox.pack.js" type="text/javascript"></script>
            <!-- carousel Js -->
            <script src="{theme_url}assets/js/jquery.parallax-1.1.3.js" type="text/javascript"></script>
            <!-- carousel Js -->
            <script src="{theme_url}assets/js/mediaelement-and-player.min.js" type="text/javascript"></script>
            <!-- Form Js -->
            <script src="{theme_url}assets/js/mail.js" type="text/javascript"></script>
            <!-- revolution Js -->
            <script type="text/javascript"
                src="{theme_url}assets/rs-slider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
            <script type="text/javascript"
                src="{theme_url}assets/rs-slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
            <script type="text/javascript" src="{theme_url}assets/js/revolution-custom.js"></script>
            <!-- Height Js -->
            <script src="{theme_url}assets/js/jquery.matchHeight-min.js" type="text/javascript"></script>
            <!-- custom Js -->
            <script src="{theme_url}assets/js/custom.js" type="text/javascript"></script>
</body>

</html>