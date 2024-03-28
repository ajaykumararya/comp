<?php
$facebook = $this->ki_theme->config('facebook');
$instagram = $this->ki_theme->config('instagram');
$twitter = $this->ki_theme->config('twitter');
$linkedin = $this->ki_theme->config('linkedin');
$youtube = $this->ki_theme->config('youtube');
$whatsapp_no = $this->ki_theme->config('whatsapp_no');
?>
<body>
    <style>h1 > span{color : #b93538}</style>
    <link rel="stylesheet" type="text/css" href="{theme_url}assets/css/contact-us.css">
    <!---------------------Navbar section start----------------------->
    <nav role="navigation" class="navbar navbar-expand-lg navbar-light primary-navigation">
        <div class="container-fluid position-relative">
            <div>
                <a class="navbar-brand" href="{base_url}"><img
                        src="{base_url}<?= UPLOAD . $this->ki_theme->config('logo') ?>" style="width:150px" class="moblogo" alt=""></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="custome_menu collapse navbar-collapse" id="navbarSupportedContent">
                <nav class="ml-auto">
                    <?php
                    $pageCount = 0;
                    function get_menu($items, $class = '', $liClass = '', $linkClass = 'nav-link', $boxID = '')
                    {
                        global $pageCount;
                        $html = '';
                        $dropClass = $pageCount ? 'Sidedropdown-bg' : 'dropdown-bg';
                        foreach ($items as $key => $value) {
                            $activeCss = $value['isActive'] ? 'active' : ''; //getActiveMenu($value['page_id'],'active');
                            $link = $value['link'];
                            $iconWithTExt = $value['label'];
                            if (array_key_exists('child', $value)) {
                                $iconWithTExt .= $pageCount ? '<i class="fas fa-chevron-right pl-1"></i>' : '<i class="fas fa-chevron-down pl-1"></i>';
                                $pageCount = 1;
                            }
                            if (array_key_exists('child', $value))
                                $html .= '<li class="' . $activeCss . '"><a href="#" ' . $value['target'] . ' class="menu-css ' . $linkClass . ' ">' . $iconWithTExt . '</a>';
                            else
                                $html .= '<li class="' . $activeCss . '"><a href="' . $link . '" ' . $value['target'] . ' class="menu-css dropdown-item nav-link nav_item">' . $iconWithTExt . '</a>';
                            if (array_key_exists('child', $value)) {
                                $html .= '<menu class="' . $dropClass . '">';
                                $html .= get_menu($value['child'], '', '');
                                $html .= '</menu>';
                            }
                            $html .= "</li>";
                        }
                        $pageCount = 0;
                        return $html;
                    }
                    echo '<menu class="navbar-nav">';
                    echo get_menu($menus, 'navbar-nav');
                    echo '<div class="call-now-button">
                    <div>
                        <a href="tel:{number}" title="Call Now">
                            <p class="call-text"> {number} </p>
                            <div class="quick-alo-ph-circle active"></div>
                            <div class="quick-alo-ph-circle-fill active"></div>
                            <div class="quick-alo-phone-img-circle shake"></div>
                        </a>
                    </div>
                </div>';
                    echo '</menu>';
                    ?>
                </nav>
            </div>
        </div>
    </nav>
    <!---------------------Navbar section End----------------------->
    <!--------------------------Call to action button--------------->
    <nav class="social">
        <ul>
            <li><a href="https://wa.me/{whatsapp_number}" target="_blank"><i class="fab fa-whatsapp"></i>whatsapp </a></li>
            <li><a href="tel:+91{number}"> <i class="fas fa-phone-alt"></i>Call Now</a></li>
            <li><a href="mailto:{email}"> <i class="fas fa-envelope-open-text"></i>Message Us</a></li>
        </ul>
    </nav>
    <!--------------------------Call to action button--------------->
    {output}
    <!--------------------------Call to action button--------------->
    <nav class="social">
        <ul>
            <li><a href="https://wa.me/{whatsapp_number}" target="_blank"><i class="fab fa-whatsapp"></i>whatsapp </a></li>
            <li><a href="tel:+91{number}"> <i class="fas fa-phone-alt"></i>Call Now</a></li>
            <li><a href="mailto:{email}"> <i class="fas fa-envelope-open-text"></i>Message Us</a></li>
        </ul>
    </nav>
    <!--------------------------Call to action button--------------->
    <!---------------------contact info section end------------------------------->
    <!--------------------------Mobile Call to action button--------------->
    <div class="container-fluid Mob-CallToaction">
        <div class="row">
            <div class="col-md-4">
                <div class="Mob-whatsapp">
                    <a href="https://wa.me/{whatsapp_number}" target="_blank" class=""><i class="fab fa-whatsapp pr-2"
                            aria-hidden="true"></i><span>Whatsapp</span></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="Mob-callBtn">
                    <a href="tel:+91{number}" class=""><i class="fa fa-phone-alt pr-2"></i><span>Call</span></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="Mob-MailBtn">
                    <a href="mailto:{email}" class=""><i
                            class="fa fa-envelope pr-2"></i><span>Enqui
ry</span></a>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------Mobile Call to action button--------------->
    <!----------------------------------------Footer section start------------------------------------->
    <section id="footer" class="footer_bg" style="background:#fee900">
        <div class="container">
            <div class="row">
                <div class="col-md-3 ">
                    <a href="{base_url}"><img src="{base_url}<?= UPLOAD . $this->ki_theme->config('logo') ?>"
                            class="Mob3Log"  style="width:150px"  alt=""></a>
                    <div class="social-buttons">
                        <?php
                        if ($whatsapp_no) {
                            ?>
                        <a href="https://wa.me/<?= $whatspp_no ?>" target="_blank"
                            class="social-button social-button--whatsapp" aria-label="whatsapp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <?php
                        }
                        if ($facebook) {
                            ?>
                        <a href="<?=$facebook?>" target="_blank"
                            class="social-button social-button--facebook" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <?php
                        }
                        if ($instagram) {
                            ?>
                        <a href="<?=$instagram?>" target="_blank"
                            class="social-button social-button--instagram" aria-label="instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <?php
                        }
                        if ($linkedin) {
                            ?>
                        <a href="<?=$linkedin?>" target="_blank"
                            class="social-button social-button--linkedin" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                $footer_sections = $this->ki_theme->config('footer_sections');
                if ($footer_sections) {
                    foreach ($footer_sections as $index => $title) {
                        $myTitle = $this->SiteModel->get_setting($index . '_text', $title);
                        echo '<div class="col-md-3 Mob_align1">
                                <h4>'.$myTitle.'</h4>
                                <ul>';
                        $fields = $this->SiteModel->get_setting($index.'_links', '', true);
                        if ($fields) {
                            foreach ($fields as $value) {
                                $my_index = $value->title;
                                $value = $value->link;
                                echo "<li><a href='$value'><span>$my_index</span></a></li>";
                            }
                        }
                        echo '</ul></div>';
                    }
                }
                ?>
                <!-- <div class="col-md-3 Mob_align1">
                    <h4>OUR COURSES</h4>
                    <ul>
                        <li><a href="computer-courses.html"><span>Computer Courses</span> </a></li>
                        <li><a href="hardware-courses.html"><span>Hardware Courses</span></a> </li>
                        <li><a href="cosmetology-courses.html"><span>Cosmetology Courses</span> </a></li>
                        <li><a href="medical-courses.html"><span>Medical Courses</span> </a></li>
                        <li><a href="technical-courses.html"><span>Technical Courses</span></a> </li>
                        <li><a href="nursery-courses.html"><span>Nursery Courses</span> </a></li>
                    </ul>
                </div>
                <div class="col-md-3 Mob_align2">
                    <h4>QUICK LINKS</h4>
                    <ul>
                        <li><a href="about-us.html"><span>About us</span> </a></li>
                        <li><a href="computer-courses.html"><span>Our Courses</span> </a></li>
                        <li><a href="webapp/home/exam_login.html"><span>Online Exam</span></a> </li>
                        <li><a href="certificate-verify.html"><span>Certificate Verify</span></a> </li>
                        <li><a href="webapp/franchise/login.html"><span>Franchise Login</span></a> </li>
                </ul>
            </div> -->
            <div class="col-md-3 ">
                <h4>GET IN TOUCH</h4>
                <ul>
                    <li class="padd-left"><span>{title}</span> <br>
                        {address}
                    </li>
                    <li>
                        <a href="mailto:{email}">
                            <span>{email}</span></a>
                    </li>
                    <li>
                        <a href="tel:+91{number}"><span>{number}
                            </span></a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
        <section class="foot_bottombg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p> Copyright &#64;
                            <script>document.write(new Date().getFullYear())</script> all right reserved designed by
                            <img src="https://niedc.co.in/theme/second.gif" style="height:23px"><a
                                href="https://hyperprowebtech.com/" target="_blank" rel="noopener noreferrer"> Hyper Pro
                                Webtech .</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!----------------------------------------Footer section end------------------------------------->
    <!-- <script src="{theme_url}assets/js/jquery-3.5.1.min.js"></script> -->
    <script src="{theme_url}assets/js/script.js"></script>
    <script src="{theme_url}assets/js/bootstrap.min.js"></script>
    <script src="{theme_url}assets/js/popper.min.js"></script>
    <script src="{theme_url}assets/slick/slick.min.js"></script>
    <script src="{theme_url}assets/js/aos.js"></script>
    <script src="{theme_url}assets/toastr/toastr.min.js"></script>
    <script>
        AOS.init({
            duration: 1300,
            easing: 'ease'
        });
    </script>
    <script type="text/javascript" language="javascript" class="init">
        $(function () {
            var sessionMessage = '';
            var sessionErrorMessage = '';
            var sessionWarningMessage = '';
            toastr.options = {
                closeButton: true,
                debug: false,
                progressBar: false,
                positionClass: "toast-top-right",
                onclick: null,
            };
            if (sessionMessage != '')
                toastr.success(sessionMessage, '', toastr.options);
            if (sessionErrorMessage != '')
                toastr.error(sessionErrorMessage, '', toastr.options);
            if (sessionWarningMessage != '')
                toastr.warning(sessionWarningMessage, '', toastr.options);
        });
    </script>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"
    integrity="sha512-Z5heTz36xTemt1TbtbfXtTq5lMfYnOkXM2/eWcTTiLU01+Sw4ku1i7vScDc8fWhrP2abz9GQzgKH5NGBLoYlAw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" type="text/css" href="{theme_url}assets/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="{theme_url}assets/slick/slick-theme.css" />
<script src="{theme_url}assets/js/input_common.js"></script>
<script>
    function validation() {
        var name = $("#name").val();
        var state = $("#state").val();
        var city = $("#city").val();
        var mobile = $("#mobile").val();
        var mobile_pattern = /^((\+91?)|\+)?[7-9][0-9]{9}$/;
        var email = $("#email").val();
        var area = $("#area").val();
        if (name == "") {
            $("#name").css('border', '1px solid red');
            setTimeout(() => { $("#name").css('border', 'none'); }, 2000);
            $("#name").focus();
            return false;
        }
        if (mobile == "") {
            $("#mobile").css('border', '1px solid red');
            setTimeout(() => { $("#mobile").css('border', 'none'); }, 2000);
            $("#mobile").focus();
            return false;
        } else if (!mobile_pattern.test(mobile)) {
            toastr.error("Invalid mobile.");
            return false;
        }
        if (email == "") {
            $("#email").css('border', '1px solid red');
            setTimeout(() => { $("#email").css('border', 'none'); }, 2000);
            $("#email").focus();
            return false;
        }
        if (state == "") {
            $("#state").css('border', '1px solid red');
            setTimeout(() => { $("#state").css('border', 'none'); }, 2000);
            $("#state").focus();
            return false;
        }
        if (city == "") {
            $("#city").css('border', '1px solid red');
            setTimeout(() => { $("#city").css('border', 'none'); }, 2000);
            $("#city").focus();
            return false;
        }
        if (area == "") {
            $("#area").css('border', '1px solid red');
            setTimeout(() => { $("#area").css('border', 'none'); }, 2000);
            $("#area").focus();
            return false;
        }
        var data = "name=" + name + "&mobile=" + mobile + "&email=" + email + "&state=" + state + "&city=" + city + "&area=" + area;
        $.AryaAjax({
            url : 'website/contact-us-action',
            data : data,
            success_message : 'Thank you for contact with us.'
        }).then( (e) => {
            $("#name").val("");
                $("#mobile").val("");
                $("#email").val("");
                $("#state").val("");
                $("#city").val("");
                $("#area").val("");
        });
        // $.ajax({
        //     'url': '<?=base_url('site/contact-us-action')?>',
        //     'type': 'POST',
        //     'data': data,
        //     'success': function (data) {
        //         toastr.success("Thank you for contact with us.");
        //         $("#name").val("");
        //         $("#mobile").val("");
        //         $("#email").val("");
        //         $("#state").val("");
        //         $("#city").val("");
        //         $("#area").val("");
        //     }
        // });
    }
    $('.courses_slider').slick({
        arrows: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 2,
        responsive: [
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 700,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
</script>
<script>
    $(document).ready(function () {
        $('.counter-value').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 3500,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });
</script>
</body>
</html>
