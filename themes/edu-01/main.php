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
    <div id="loading">
        <div class="element">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </div>
    </div>

    <!-- ==============================================
    ** Header **
    =================================================== -->
    <header>
        <!-- Start Header top Bar -->
        <div class="header-top">
            <div class="container clearfix">
                <ul class="follow-us hidden-xs">
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
                <div class="right-block clearfix">
                    <ul class="top-nav hidden-xs">
                        <li><a href="register.html">Register</a></li>
                        <li><a href="apply-online.html">Apply Online</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="faq1.html">FAQs</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Header top Bar -->
        <!-- Start Header Middle -->
        <div class="container header-middle">
            <div class="row"> <span class="col-xs-6 col-sm-3"><a href="index-2.html"><img src="images/logo.png"
                            class="img-responsive" alt=""></a></span>
                <div class="col-xs-6 col-sm-3"></div>
                <div class="col-xs-6 col-sm-9">
                    <div class="contact clearfix">
                        <ul class="hidden-xs">
                            <li> <span>Email</span> <a href="mailto:{email}">{email}</a> </li>
                            <li> <span>Call Us</span> {number} </li>
                        </ul>
                        <a href="login.html" class="login">Student Login <span class="icon-more-icon"></span></a>
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
    ** About **
    =================================================== -->
    <section class="intro-sec padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-push-6 left-block">
                    <h2>Edumart Online <span>educational Portal</span></h2>
                    <p>Building on Edumart Group’s rich experience with online MBA at Edumart University Online!
                        Designing and delivering both graduate and post-graduate programs across a variety of
                        disciplines, Edumart University Online, offering online MBA has worked upon the knowledge-base
                        created by our highly qualified faculties, our research, publishing and training experience, to
                        create online MBA programs that offer a rich learning experience.</p>
                    <div class="know-more-wrapper">
                        <a href="about.html" class="know-more">
                            <span class="icon-more-icon"></span>Read More
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-sm-pull-6">
                    <div class="video-block">
                        <a href="https://www.youtube.com/watch?v=i11RXCJVEnw" class="play-outer video">
                            <figure><img src="images/green-play-btn.png" alt=""></figure>
                            <span>Play to know About us</span>
                        </a>
                        <div id="thumbnail_container"> <img src="images/about-video2.jpg" id="thumbnail"
                                class="img-responsive" alt=""> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
    ** Popular Cources **
    =================================================== -->
    <section class="popular-cources padding-lg">
        <div class="container">
            <div class="title-row clearfix">
                <h3>Popular Courses</h3>
                <a href="#" class="view-courses">
                    <span class="icon-more-icon"></span>View all Popular Courses
                </a>
            </div>
            <ul class="row courses-list">
                <li class="col-sm-6 col-md-3">
                    <div class="inner">
                        <figure><img src="images/popular-courses-img1.jpg" alt=""></figure>
                        <div class="cnt-block">
                            <div class="duration">
                                <span class="year">2 Year</span>
                                <span class="txt">Courses</span>
                            </div>
                            <h4>Edumart Online MBA General</h4>
                            <p>A comprehensive study of modern business...</p>
                        </div>
                    </div>
                </li>
                <li class="col-sm-6 col-md-3">
                    <div class="inner">
                        <figure><img src="images/popular-courses-img2.jpg" alt=""></figure>
                        <div class="cnt-block">
                            <div class="duration">
                                <span class="year">2 Year</span>
                                <span class="txt">Courses</span>
                            </div>
                            <h4>Edumart Online MBA Operations</h4>
                            <p>A comprehensive study of modern business...</p>
                        </div>
                    </div>
                </li>
                <li class="col-sm-6 col-md-3">
                    <div class="inner">
                        <figure><img src="images/popular-courses-img3.jpg" alt=""></figure>
                        <div class="cnt-block">
                            <div class="duration">
                                <span class="year">2 Year</span>
                                <span class="txt">Courses</span>
                            </div>
                            <h4>Edumart Online MBA Merketing</h4>
                            <p>A comprehensive study of modern business...</p>
                        </div>
                    </div>
                </li>
                <li class="col-sm-6 col-md-3">
                    <div class="inner">
                        <figure><img src="images/popular-courses-img4.jpg" alt=""></figure>
                        <div class="cnt-block">
                            <div class="duration">
                                <span class="year">2 Year</span>
                                <span class="txt">Courses</span>
                            </div>
                            <h4>Edumart Online MBA Human Resource</h4>
                            <p>A comprehensive study of modern business...</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- ==============================================
    ** What Makes Different **
    =================================================== -->
    <section class="wt-makes-different">
        <div class="bg-image" style="background-image:url(images/make-different-img.jpg)"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-5 left">
                    <div class="q-mark">?</div>
                    <h2>Whats Makes Us Different ?</h2>
                    <a href="#" class="read-more">
                        <span class="icon-more-icon"></span>Read More
                    </a>
                </div>
                <div class="col-sm-7">
                    <div class="right">
                        <ul class="row makes-different-list">
                            <li class="col-xs-6 col-sm-6">
                                <div class="inner">
                                    <img src="images/make-different-ico1.png" alt="">
                                    <h3>Malleable Study Time</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard </p>
                                </div>
                            </li>
                            <li class="col-xs-6 col-sm-6">
                                <div class="inner">
                                    <img src="images/make-different-ico2.png" alt="">
                                    <h3>Malleable Study Time</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard </p>
                                </div>
                            </li>
                            <li class="col-xs-6 col-sm-6">
                                <div class="inner">
                                    <img src="images/make-different-ico3.png" alt="">
                                    <h3>Easy to Access</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard </p>
                                </div>
                            </li>
                            <li class="col-xs-6 col-sm-6">
                                <div class="inner">
                                    <img src="images/make-different-ico4.png" alt="">
                                    <h3>Study on the go</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
    ** How Study **
    =================================================== -->
    <section class="how-study how-study2 padding-lg">
        <div class="container">
            <h2> <span>There are many ways to learn</span> How do you want to study?</h2>
            <ul class="row">
                <li class="col-sm-4">
                    <div class="overly">
                        <div class="cnt-block">
                            <h3>Self-paced distance
                                learning</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing...</p>
                        </div>
                        <a href="#" class="more"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    </div>
                    <figure><img src="images/how-study-img1.jpg" class="img-responsive" alt=""></figure>
                </li>
                <li class="col-sm-4">
                    <div class="overly">
                        <div class="cnt-block">
                            <h3>Study on
                                campus</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing...</p>
                        </div>
                        <a href="#" class="more"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    </div>
                    <figure><img src="images/how-study-img2.jpg" class="img-responsive" alt=""></figure>
                </li>
                <li class="col-sm-4">
                    <div class="overly">
                        <div class="cnt-block">
                            <h3> Our Learning
                                Partners </h3>
                            <p>Lorem Ipsum is simply dummy text of the printing...</p>
                        </div>
                        <a href="#" class="more"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    </div>
                    <figure><img src="images/how-study-img3.jpg" class="img-responsive" alt=""></figure>
                </li>
            </ul>
        </div>
    </section>

    <!-- ==============================================
    ** Why Choose **
    =================================================== -->
    <section class="why-choose why-choose2 padding-lg">
        <div class="container">
            <h2><span>The Numbers Say it All</span>Why Choose Us</h2>
            <ul class="our-strength">
                <li>
                    <div class="icon"><span class="icon-certification-icon"> </span></div>
                    <span class="counter">36</span>
                    <div class="title">Certified Courses</div>
                </li>
                <li>
                    <div class="icon"><span class="icon-student-icon"></span></div>
                    <span class="counter">258,658</span>
                    <div class="title">Students Enrolled </div>
                </li>
                <li>
                    <div class="icon"><span class="icon-book-icon"></span></div>
                    <div class="couter-outer"><span class="counter">95</span><span>%</span></div>
                    <div class="title">Passing to Universities</div>
                </li>
                <li>
                    <div class="icon"><span class="icon-parents-icon"></span></div>
                    <div class="couter-outer"><span class="counter">100</span><span>%</span></div>
                    <div class="title">Satisfied Parents</div>
                </li>
            </ul>
        </div>
    </section>

    <!-- ==============================================
    ** News & Events **
    =================================================== -->
    <section class="news-events news-events2 padding-lg">
        <div class="container">
            <h2><span>There are many ways to learn</span>News and events</h2>
            <ul class="row cs-style-3">
                <li class="col-sm-4">
                    <div class="inner">
                        <figure> <img src="images/new-event-img1.jpg" class="img-responsive">
                            <figcaption>
                                <div class="cnt-block"> <a href="news.html" class="plus-icon">+</a>
                                    <h3>We have added new features to Dream Palace</h3>
                                    <div class="bottom-block clearfix">
                                        <div class="date">
                                            <div class="icon"><span class="icon-calander-icon"></span></div>
                                            <span>14 Feb</span> 2017
                                        </div>
                                        <div class="comment">
                                            <div class="icon"><span class="icon-chat-icon"></span></div>
                                            <span>24</span> comments
                                        </div>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </li>
                <li class="col-sm-4">
                    <div class="inner">
                        <figure> <img src="images/new-event-img2.jpg" class="img-responsive">
                            <figcaption>
                                <div class="cnt-block"> <a href="news.html" class="plus-icon">+</a>
                                    <h3>We have added new features to Dream Palace</h3>
                                    <div class="bottom-block clearfix">
                                        <div class="date">
                                            <div class="icon"><span class="icon-calander-icon"></span></div>
                                            <span>14 Feb</span> 2017
                                        </div>
                                        <div class="comment">
                                            <div class="icon"><span class="icon-chat-icon"></span></div>
                                            <span>24</span> comments
                                        </div>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </li>
                <li class="col-sm-4">
                    <div class="inner">
                        <figure> <img src="images/new-event-img3.jpg" class="img-responsive">
                            <figcaption>
                                <div class="cnt-block"> <a href="news.html" class="plus-icon">+</a>
                                    <h3>We have added new features to Dream Palace</h3>
                                    <div class="bottom-block clearfix">
                                        <div class="date">
                                            <div class="icon"><span class="icon-calander-icon"></span></div>
                                            <span>14 Feb</span> 2017
                                        </div>
                                        <div class="comment">
                                            <div class="icon"><span class="icon-chat-icon"></span></div>
                                            <span>24</span> comments
                                        </div>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </li>
            </ul>
            <div class="know-more-wrapper"> <a href="news.html" class="know-more">More Post <span
                        class="icon-more-icon"></span></a> </div>
        </div>
    </section>

    <!-- ==============================================
    ** Campus Tour **
    =================================================== -->
    <section class="campus-tour campus-tour2 padding-lg">
        <div class="container">
            <h2><span>Our campus have a lot to offer for our students</span>Take a Campus Tour</h2>
        </div>
        <ul class="gallery clearfix">
            <li>
                <div class="overlay">
                    <h3>Lorem ipsum</h3>
                    <p>Lorem ipsum</p>
                    <a class="galleryItem" href="images/tour-lg1.jpg"><span class="icon-enlarge-icon"></span></a> <a
                        href="gallery.html" class="more"><span class="icon-gallery-more-arrow"></span></a>
                </div>
                <figure><img src="images/tour1.jpg" class="img-responsive" alt=""></figure>
            </li>
            <li>
                <div class="overlay">
                    <h3>Lorem ipsum</h3>
                    <p>Lorem ipsum</p>
                    <a class="galleryItem" href="images/tour-lg2.jpg"><span class="icon-enlarge-icon"></span></a> <a
                        href="gallery.html" class="more"><span class="icon-gallery-more-arrow"></span></a>
                </div>
                <figure><img src="images/tour2.jpg" class="img-responsive" alt=""></figure>
            </li>
            <li>
                <div class="overlay">
                    <h3>Lorem ipsum</h3>
                    <p>Lorem ipsum</p>
                    <a class="galleryItem" href="images/tour-lg3.jpg"><span class="icon-enlarge-icon"></span></a> <a
                        href="gallery.html" class="more"><span class="icon-gallery-more-arrow"></span></a>
                </div>
                <figure><img src="images/tour3.jpg" class="img-responsive" alt=""></figure>
            </li>
            <li>
                <div class="overlay">
                    <h3>Lorem ipsum</h3>
                    <p>Lorem ipsum</p>
                    <a class="galleryItem" href="images/tour-lg4.jpg"><span class="icon-enlarge-icon"></span></a> <a
                        href="gallery.html" class="more"><span class="icon-gallery-more-arrow"></span></a>
                </div>
                <figure><img src="images/tour4.jpg" class="img-responsive" alt=""></figure>
            </li>
            <li>
                <div class="overlay">
                    <h3>Lorem ipsum</h3>
                    <p>Lorem ipsum</p>
                    <a class="galleryItem" href="images/tour-lg5.jpg"><span class="icon-enlarge-icon"></span></a> <a
                        href="gallery.html" class="more"><span class="icon-gallery-more-arrow"></span></a>
                </div>
                <figure><img src="images/tour5.jpg" class="img-responsive" alt=""></figure>
            </li>
            <li>
                <div class="overlay">
                    <h3>Lorem ipsum</h3>
                    <p>Lorem ipsum</p>
                    <a class="galleryItem" href="images/tour-lg6.jpg"><span class="icon-enlarge-icon"></span></a> <a
                        href="gallery.html" class="more"><span class="icon-gallery-more-arrow"></span></a>
                </div>
                <figure><img src="images/tour6.jpg" class="img-responsive" alt=""></figure>
            </li>
            <li>
                <div class="overlay">
                    <h3>Lorem ipsum</h3>
                    <p>Lorem ipsum</p>
                    <a class="galleryItem" href="images/tour-lg7.jpg"><span class="icon-enlarge-icon"></span></a> <a
                        href="gallery.html" class="more"><span class="icon-gallery-more-arrow"></span></a>
                </div>
                <figure><img src="images/tour7.jpg" class="img-responsive" alt=""></figure>
            </li>
            <li>
                <div class="overlay">
                    <h3>Lorem ipsum</h3>
                    <p>Lorem ipsum</p>
                    <a class="galleryItem" href="images/tour-lg8.jpg"><span class="icon-enlarge-icon"></span></a> <a
                        href="gallery.html" class="more"><span class="icon-gallery-more-arrow"></span></a>
                </div>
                <figure><img src="images/tour8.jpg" class="img-responsive" alt=""></figure>
            </li>
            <li>
                <div class="overlay">
                    <h3>Lorem ipsum</h3>
                    <p>Lorem ipsum</p>
                    <a class="galleryItem" href="images/tour-lg9.jpg"><span class="icon-enlarge-icon"></span></a> <a
                        href="gallery.html" class="more"><span class="icon-gallery-more-arrow"></span></a>
                </div>
                <figure><img src="images/tour9.jpg" class="img-responsive" alt=""></figure>
            </li>
            <li>
                <div class="overlay">
                    <h3>Lorem ipsum</h3>
                    <p>Lorem ipsum</p>
                    <a class="galleryItem" href="images/tour-lg10.jpg"><span class="icon-enlarge-icon"></span></a> <a
                        href="gallery.html" class="more"><span class="icon-gallery-more-arrow"></span></a>
                </div>
                <figure><img src="images/tour10.jpg" class="img-responsive" alt=""></figure>
            </li>
        </ul>
    </section>

    <!-- ==============================================
    ** Testimonials **
    =================================================== -->
    <section class="testimonial testimonial2 padding-lg">
        <div class="container">
            <div class="wrapper">
                <h2>Alumini Testimonials</h2>
                <ul class="testimonial-slide">
                    <li>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley...<a href="#">Read more</a></p>
                        <span>Thomas, <span>London</span></span>
                    </li>
                    <li>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley...<a href="#">Read more</a></p>
                        <span>Thomas, <span>London</span></span>
                    </li>
                    <li>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley...<a href="#">Read more</a></p>
                        <span>Thomas, <span>London</span></span>
                    </li>
                </ul>
                <div id="bx-pager"> <a data-slide-index="0" href="#"><img src="images/testimonial-thumb1.jpg"
                            class="img-circle" alt="" /></a> <a data-slide-index="1" href="#"><img
                            src="images/testimonial-thumb2.jpg" class="img-circle" alt="" /></a> <a data-slide-index="2"
                        href="#"><img src="images/testimonial-thumb3.jpg" class="img-circle" alt="" /></a> </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
    ** Brands **
    =================================================== -->
    <section class="logos logos2">
        <div class="container">
            <ul class="owl-carousel clearfix">
                <li><a href="#"><img src="images/logo1.jpg" class="img-responsive" alt=""></a></li>
                <li><a href="#"><img src="images/logo2.jpg" class="img-responsive" alt=""></a></li>
                <li><a href="#"><img src="images/logo3.jpg" class="img-responsive" alt=""></a></li>
                <li><a href="#"><img src="images/logo4.jpg" class="img-responsive" alt=""></a></li>
                <li><a href="#"><img src="images/logo5.jpg" class="img-responsive" alt=""></a></li>
                <li><a href="#"><img src="images/logo6.jpg" class="img-responsive" alt=""></a></li>
            </ul>
        </div>
    </section>

    <!-- ==============================================
    ** Footer **
    =================================================== -->
    <footer class="footer footer2">
        <!-- Start Footer Top -->
        <div class="container">
            <div class="row row1">
                <div class="col-sm-9 clearfix">
                    <div class="foot-nav">
                        <h3>About US</h3>
                        <ul>
                            <li><a href="#">Edumart Group of Institutions</a></li>
                            <li><a href="#">Our Institutes and Universities</a></li>
                            <li><a href="#">Management Team</a></li>
                            <li><a href="#">Approval and Recognition</a></li>
                            <li><a href="#">Evaluation & Assessments</a></li>
                        </ul>
                    </div>
                    <div class="foot-nav">
                        <h3>Courses</h3>
                        <ul>
                            <li><a href="#">2 Year Online MBA General</a></li>
                            <li><a href="#">Certificate in HRM</a></li>
                            <li><a href="#">Certificate in Marketing</a></li>
                            <li><a href="#">Certificate in Finance</a></li>
                            <li><a href="#">Corporate Programs</a></li>
                        </ul>
                    </div>
                    <div class="foot-nav">
                        <h3>Why Edumart</h3>
                        <ul>
                            <li><a href="#">Introduction</a></li>
                            <li><a href="#">Learn Everywhere</a></li>
                            <li><a href="#">Modern Curriculum</a></li>
                            <li><a href="#">Placement Assistance</a></li>
                            <li><a href="#">Eligibility</a></li>
                        </ul>
                    </div>
                    <div class="foot-nav">
                        <h3>Learning Experience</h3>
                        <ul>
                            <li><a href="#">Course Preparations</a></li>
                            <li><a href="#">Guided lessons</a></li>
                            <li><a href="#">Interactive Practice</a></li>
                            <li><a href="#">Virtual Classroom</a></li>
                            <li><a href="#">Peer Learning</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="footer-logo hidden-xs"><a href="index-2.html"><img src="images/footer-logo2.png"
                                class="img-responsive" alt=""></a></div>
                    <p>© 2020 <span>Edumart</span>. All rights reserved</p>
                    <ul class="terms clearfix">
                        <li><a href="terms.html">TERMS OF USE</a></li>
                        <li><a href="privacy.html">PRIVACY POLICY</a></li>
                        <li><a href="#">SITEMAP</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <!-- Start Footer Bottom -->
        <div class="bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="connect-us">
                            <h3>Connect with Us</h3>
                            <ul class="follow-us clearfix">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="subscribe">
                            <h3>Subscribe with Us</h3>
                            <!-- Begin MailChimp Signup Form -->
                            <div id="mc_embed_signup">
                                <form
                                    action="http://protechtheme.us16.list-manage.com/subscribe/post?u=cd5f66d2922f9e808f57e7d42&amp;id=ec6767feee"
                                    method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                    class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll">
                                        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL"
                                            placeholder="enter your email address" required>
                                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                            <input type="text" name="b_cd5f66d2922f9e808f57e7d42_ec6767feee"
                                                tabindex="-1" value="">
                                        </div>
                                        <div class="clear">
                                            <input type="submit" value="Subscribe" name="subscribe"
                                                id="mc-embedded-subscribe" class="button">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--End mc_embed_signup-->
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="instagram">
                            <h3>@INSTAGRAM</h3>
                            <ul class="clearfix">
                                <li><a href="#">
                                        <figure><img src="images/insta-img1.jpg" class="img-responsive" alt=""></figure>
                                    </a></li>
                                <li><a href="#">
                                        <figure><img src="images/insta-img2.jpg" class="img-responsive" alt=""></figure>
                                    </a></li>
                                <li><a href="#">
                                        <figure><img src="images/insta-img3.jpg" class="img-responsive" alt=""></figure>
                                    </a></li>
                                <li><a href="#">
                                        <figure><img src="images/insta-img4.jpg" class="img-responsive" alt=""></figure>
                                    </a></li>
                                <li><a href="#">
                                        <figure><img src="images/insta-img5.jpg" class="img-responsive" alt=""></figure>
                                    </a></li>
                                <li><a href="#">
                                        <figure><img src="images/insta-img6.jpg" class="img-responsive" alt=""></figure>
                                    </a></li>
                            </ul>
                        </div>
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