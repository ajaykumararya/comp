

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

<body>
    
    <!--page start-->
    <div class="page">


        <!--header start-->
        <header id="masthead" class="header ttm-header-style-01">

            <!-- ttm-header-wrap -->
            <div class="ttm-header-wrap">
                <!-- ttm-stickable-header-w -->
                <div id="ttm-stickable-header-w" class="ttm-stickable-header-w clearfix">
                    <!-- ttm-topbar-wrapper -->
                    <div class="ttm-topbar-wrapper ttm-textcolor-white clearfix">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="ttm-topbar-content">
                                        <div class="topbar-right text-right">
                                            <ul class="top-contact text-left">
                                                <li><i class="fa fa-phone ttm-textcolor-skincolor"></i><a
                                                        href="tel:+91{number}">+91 {number}</a></li>
                                                <li><i class="fa fa-envelope-o ttm-textcolor-skincolor"></i><a
                                                        href="mailto:{email}">{email}</a>
                                                </li>
                                            </ul>
                                            <!-- <div class="header-btn">
                                                <a class="font-weight-600" style="margin-left: 2px;"
                                                    href="workshop-form/index.html" target="_blank">Workshop
                                                    Registration</a>
                                            </div>
                                            <div class="header-btn">
                                                <a class="font-weight-600" href="model-form/index.html"
                                                    target="_blank">Model Registration</a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- ttm-topbar-wrapper end -->

                    <div id="site-header-menu" class="site-header-menu">
                        <div class="site-header-menu-inner ttm-stickable-header">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <!--site-navigation -->
                                        <div id="site-navigation" class="site-navigation d-flex flex-row">
                                            <div class="site-branding mr-auto">
                                                <!-- site-branding -->
                                                <a class="home-link" href="{base_url}" title="{title}"
                                                    rel="home">
                                                    <img id="logo-img" class="img-center lazyload" src="{assets}{logo}"
                                                        alt="logo" style="width:105px">
                                                </a>
                                                <!-- site-branding end -->
                                            </div>
                                            <div class="ttm-menu-toggle">
                                                <input type="checkbox" id="menu-toggle-form" />
                                                <label for="menu-toggle-form" class="ttm-menu-toggle-block">
                                                    <span class="toggle-block toggle-blocks-1"></span>
                                                    <span class="toggle-block toggle-blocks-2"></span>
                                                    <span class="toggle-block toggle-blocks-3"></span>
                                                </label>
                                            </div>
                                            <nav id="menu" class="menu">
                                            <?php
                                            $pageCount = 0;
                                            function get_menu($items, $class = '', $liClass = '', $linkClass = '', $boxID = '', $attr = '')
                                            {
                                                $html = "<ul class=\"" . $class . "\" id=\"" . $boxID . "\" $attr>";
                                                foreach ($items as $key => $value) {
                                                    $activeCss = $value['isActive'] ? 'active' : ''; //getActiveMenu($value['page_id'],'active');
                                                    $link = $value['link'];
                                                    $iconWithTExt = $value['label'];
                                                    if (array_key_exists('child', $value)) {
                                                        $html .= '<li class="' . $activeCss . ' dropdown"><a href="#" ' . $value['target'] . ' class="menu-css ' . $linkClass . ' " id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $iconWithTExt . '</a>';
                                                    } else
                                                        $html .= '<li class="' . $activeCss . '"><a href="' . $link . '" ' . $value['target'] . ' class="menu-css ' . $linkClass . '">' . $iconWithTExt . '</a>';
                                                    if (array_key_exists('child', $value)) {
                                                        // $html .= '<div class="dropdown-menu">';
                                                        $html .= get_menu($value['child'], '', '', '');
                                                        // $html .= '</div>';
                                                    }
                                                    $html .= "</li>";
                                                }
                                                $html .= "</ul>";
                                                return $html;
                                            }
                                            echo get_menu($menus, 'dropdown');
                                            ?>
                                                 
                                            </nav>
                                        </div><!-- site-navigation end-->
                                        <marquee class="lbaama" behavior="scroll" scrollamount="5" direction="left">
                                            <p><strong>{header_marquee}</strong></p>
                                        </marquee>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- ttm-stickable-header-w end-->
            </div><!--ttm-header-wrap end -->

        </header>
        <!--header end-->

        <!-- <div class="row">
            <video width="100%" autoplay="" loop="" muted="">
                <source src="ADETE-MA%27AM.mp4" type="video/mp4">
                <source src="ADETE-MA%27AM.mp4" type="video/ogg">
            </video>
        </div> -->
        <!-- END homebanner -->

        {output}
        <!-- <section class="clearfix res-1199-mt-0 position-relative z-1">
            <div class="row bg-img1 no-gutters ttm-bgcolor-white box-shadow2">

                <div class="offer">
                    <a href="#enquiry">
                        <h4><i class="fa fa-address-book" aria-hidden="true"></i> Book A Visit </h4>
                    </a>
                </div>

                <div class="offer">
                    <a href="#enquiry">
                        <h4><i class="fa fa-hourglass-start" aria-hidden="true"></i> Campus tour </h4>
                    </a>
                </div>

                <div class="offer">
                    <a href="33-reasons.html">
                        <h4><i class="fa fa-quora" aria-hidden="true"></i>33 Reasons</h4>
                    </a>
                </div>

                <div class="offer">
                    <a href="#enquiry">
                        <h4><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Offers</h4>
                    </a>
                </div>

                <div class="offer">
                    <a href="#enquiry">
                        <h4><i class="fa fa-wpforms" aria-hidden="true"></i> Request A Catalog</h4>
                    </a>
                </div>

            </div>
        </section> -->

        


        <!-- <div class="ttm">
            <div class="bg-img1 part position-relative z-2 res-767-m-0">
                <div class="container">
                    <div class="row par-add pt-30">
                        <div class="col-md-6 col-sm-6">
                            <img src="{theme_url}assets/images/client/logo4.png">
                            <h5>7 Acorn Business Park
                                Commercial Gate,<br> Nottingham
                                Nottinghamshire NG18 1EX United Kingdom.</h5>
                        </div>
                        <div class="col-md-6 col-sm-6 text-right">
                            <img src="{theme_url}assets/images/client/logo5.png">
                            <h5>1 Top Farm Court, Top Street, Bawtry,<br> Doncaster DN10 6TF United Kingdom.</h5>
                        </div>
                    </div>
                </div>
                <style>
                    .part h5 {
                        font-weight: 600;
                        padding-top: 30px;
                        line-height: 32px;
                        padding-bottom: 10px;
                    }
                </style>
            </div>
        </div> -->

        <!--footer start-->
        <footer class="footer widget-footer clearfix">
            <div class="second-footer ttm-textcolor-white">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 widget-area">
                            <div class="widget widget_text clearfix">
                                <h3>About Us</h3>
                                <div class="textwidget widget-text">
                                    <p class="pb-10 res-767-p-0">{footer_about_us}</p>
                                    <!-- <a class="ttm-color-skincolor" title="">Sites Map</a>
                                    <a class="ttm-textcolor-skincolor" href="privacy-policy.html">Privacy Policy</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 widget-area">
                            <div class="widget widget_text clearfix">
                                <h3 class="widget-title"></h3>
                                <div class="row">
                                    <div class="col-md-5 no-padding">
                                        
                                        <ul>
                                        <?php
                                        foreach ($this->ki_theme->config('footer_first_links') as $linkRow) {
                                            echo '<li><a href="' . $linkRow->link . '">' . $linkRow->title . '</a></li>';
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 no-padding">
                                        <ul>
                                        <?php
                                        foreach ($this->ki_theme->config('footer_second_links') as $linkRow) {
                                            echo '<li><a href="' . $linkRow->link . '">' . $linkRow->title . '</a></li>';
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                    <div class="col-md-3 no-padding">
                                        <ul>
                                        <?php
                                        foreach ($this->ki_theme->config('footer_third_links') as $linkRow) {
                                            echo '<li><a href="' . $linkRow->link . '">' . $linkRow->title . '</a></li>';
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                            <div class="widget flicker_widget clearfix">
                                <h3 class="widget-title">Get In Touch</h3>
                                <div class="textwidget widget-text">
                                    <div class="featured-icon-box icon-align-before-content icon-ver_align-top style3">
                                        <div class="featured-icon">
                                            <div
                                                class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-sm">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                        </div>
                                        <div class="featured-content">
                                            <div class="featured-desc">
                                                <p>{address}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="featured-icon-box icon-align-before-content icon-ver_align-top style3">
                                        <div class="featured-icon">
                                            <div
                                                class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-sm">
                                                <i class="fa fa-envelope-o"></i>
                                            </div>
                                        </div>
                                        <div class="featured-content">
                                            <div class="featured-desc">
                                                <p><a
                                                        href="mailto:{email}">{email}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="featured-icon-box icon-align-before-content icon-ver_align-top style3">
                                        <div class="featured-icon">
                                            <div
                                                class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-sm">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                        </div>
                                        <div class="featured-content">
                                            <div class="featured-desc">
                                                <p>{number}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer-text">
                <div class="container">
                    <div class="row copyright">
                        <div class="col-md-9">
                            <div class="ttm-textcolor-white">
                                <span>Copyright &copy;&nbsp;<a class="ttm-textcolor-skincolor" href="{base_url}">{title}</a> All rights reserved.</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex flex-row align-items-center justify-content-end social-icons">
                                <ul class="social-icons list-inline">
                                    <li><a href="#" class=" tooltip-top" data-tooltip="Phone"><i
                                                class="fa fa-phone"></i></a>
                                    </li>
                                    <li><a href="#" class=" tooltip-top" data-tooltip="Whatsapp"><i
                                                class="fab fa-whatsapp"></i></a>
                                    </li>
                                    <li><a href="https://www.instagram.com/londonbeautyacademy_official"
                                            class=" tooltip-top" data-tooltip="Instagram"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                    <li><a href="https://www.facebook.com/mylondonbeautyacademy" class=" tooltip-top"
                                            data-tooltip="Facebook"><i class="fab fa-facebook"></i></a>
                                    </li>
                                    <li><a href="#" class=" tooltip-top" data-tooltip="Youtube"><i
                                                class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--footer end-->

        <!--back-to-top start-->
        <a id="totop" href="index-2.html#top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!--back-to-top end-->

    </div><!-- page end -->

    <div class="left-bar">
        <ul>
            <li><a href="https://api.whatsapp.com/send?phone=9999223332&amp;text=&amp;source=&amp;data="
                    target="blank"><i class="fab fa-whatsapp"></i><span>Whatsapp</span></a></li>
            <li><a href="tel:+919999223332"><i class="fa fa-phone"></i><span> +919999223332</span></a></li>
            <li><a href="https://www.instagram.com/londonbeautyacademy_official/" target="blank"><i
                        class="fab fa-instagram"></i><span>Instagram</span></a></li>
            <li><a href="https://www.facebook.com/londonbeautyacademydelhincr" target="blank"><i
                        class="fab fa-facebook-f"></i><span>Facebook</span></a></li>
            <li><a href="https://www.youtube.com/@LondonBeautyacademybyAMA" target="blank"><i
                        class="fab fa-youtube"></i><span>Youtube</span></a></li>
        </ul>
    </div>
<!-- Javascript -->

<!-- <script src="{theme_url}assets/js/jquery.min.js"></script> -->
<script src="{theme_url}assets/js/tether.min.js"></script>
<script src="{theme_url}assets/js/bootstrap.min.js"></script>
<script src="{theme_url}assets/js/jquery.easing.js"></script>    
<script src="{theme_url}assets/js/jquery-waypoints.js"></script>    
<script src="{theme_url}assets/js/jquery-validate.js"></script> 
<script src="{theme_url}assets/js/owl.carousel.js"></script>
<script src="{theme_url}assets/js/jquery.prettyPhoto.js"></script>
<script src="{theme_url}assets/js/numinate.min69596959.js?ver=4.9.3"></script>
<script src="{theme_url}assets/js/lazysizes.min.js"></script>
<script src="{theme_url}assets/js/main.js"></script>

<!-- Revolution Slider -->
<!-- <script src="{theme_url}assets/revolution/revolution.tools.min.js"></script>
<script src="{theme_url}assets/revolution/js/rs6.min.js"></script> 
<script src="{theme_url}assets/revolution/js/slider.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" type="text/css" media="screen" />
<script>
$(document).ready(function() {
  $(".gallery a").fancybox();
});
</script>

<script>
// function submitForm(event) {
//     event.preventDefault();

//     document.getElementById("submitBtn").disabled = true;
//     let error = validateForm();

//     if (!error) {
//         callAPI();
//     } else {
//         document.getElementById("submitBtn").disabled = false;
//     }
// }

// console.log(document.getElementById("courses").value)

// function validateForm() {
//     var inputName = document.getElementById("name").value;
//     var inputEmail = document.getElementById("email").value;
//     let emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
//     var inputphone = document.getElementById("phone").value;
//     let numberRegex = /^[\d\n\r]*$/;
//     var inputCourses = document.getElementById("courses").value;
//     var inputLocation =  document.getElementById("location").value;
//     var error = false;

//     if (inputName.length < 1) {
//         document.getElementById('regex-error-name').style.display = "block";
//         error = true
//     } 
    
//     if (!emailRegex.test(inputEmail)) {
//         document.getElementById('regex-error-email').style.display = "block";
//         error = true
//     } 

//     if (!numberRegex.test(inputphone) || inputphone.length < 10) {
//         document.getElementById('regex-error-phone').style.display = "block";
//         error = true
//     } 

//     if (inputCourses.length == 0) {
//         document.getElementById('regex-error-course').style.display = "block";
//         error = true
//     } 
    
//     if (inputLocation.length == 0) {
//         document.getElementById('regex-error-location').style.display = "block";
//         error = true
//     } 
    
    
//     return error;
// }

// async function callAPI() {
//     var inputName = document.getElementById("name").value;
//     var inputEmail = document.getElementById("email").value;
//     var inputphone = document.getElementById("phone").value;
//     var inputCourses = document.getElementById("courses").value;
//     var inputLocation =  document.getElementById("location").value;



//     const requestOptions = {
//         method: 'POST',
//         headers: { 'Content-Type': 'application/json' },
//         body: JSON.stringify(
//             {
//                 "projectKey": "VW50aXRsZSBQcm9qZWN0MTY4NzUwNTk3NzY2OA==",
//                 "audienceId": "AMA_"+new Date().valueOf(),
//                 "name": inputName,
//                 "email": inputEmail,
//                 "mobile": inputphone,
//                 "paramList": [
//                     {
//                         "paramKey": "course_you_are_interest",
//                         "paramValue": inputCourses
//                     },
//                     {
//                         "paramKey": "your_location",
//                         "paramValue": inputLocation
//                     },
//                     {
//                         "paramKey": "websitename",
//                         "paramValue": "LBA MW"
//                     }
                    
//                 ]
//             })
//     };

//     try {
//         const response = await fetch('https://register.cronberry.com/api/campaign/register-audience-data', requestOptions);
//         await response.json();
//         // Construct the API URL and prepare the data to be sent
//         if (response) {
//             window.location = "thank-you.html";
//         }
//         document.getElementById("submitBtn").disabled = false;
//     } catch (err) {
//         console.log("error", err)
//     }
// }
    
</script>
<!-- Javascript end-->

</body>

</html>