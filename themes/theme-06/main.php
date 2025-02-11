
<body>
    <style type="text/css">
        .annocement {
            display: flex;
        }

        .annocement span {
            color: white;
            font-weight: bold;
            background: #f4a024;
            padding: 12px 20px;
            text-transform: uppercase;
        }
    </style>
    <section class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="row">

                            <div class="col-lg-7 col-md-7 text-left">
                                <!-- <ul>
                                        <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;(+91) 9289456781 | (+91) 9289456781</a></li>
                                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;info@sikkimskilluniversity.com</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;Opening: 09:00am - 4:00pm</a></li>
                                    </ul> -->
                                <div class="annocement">
                                    <span>Announcement</span>
                                    <marquee behavior="scroll" direction="left" id="" scrollamount="5"
                                        class="top-marquee" onmouseover="this.stop();" onmouseout="this.start();">
                                        Admissions Open: 2025-26 : B.Com | B.Sc| BCA | B.Tech | D.Pharm | B.Pharm | LLB
                                        | Diploma | MBA | MCA | MA</marquee>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <ul>
                                    <li><a href="#" style="color:white;margin-right: 10px;">Call us : +91 9599123451</a>
                                    </li>
                                    <li><a href="#" class="top-btn"><i
                                                class="fa fa-lock" aria-hidden="true"></i>&nbsp;&nbsp;Student Login</a>
                                    </li>
                                    <li style=""><a href="#" class="top-btn"><span><i class="fa fa-forumbee"
                                                    aria-hidden="true"></i>&nbsp;&nbsp;Apply Now</span></a></li>
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
                    <a class="" href="index.html">
                        <img src="<?=logo()?>" alt="{title}"
                            class="navbar-brand img-responsive">
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

    <style type="text/css">
        .phdForm {
            background: rgba(0, 0, 0, 0.6) !important;
        }

        .phdForm .modal-body {
            background-color: #fef9dc;
        }

        .phdForm .modal-dialog {
            background: white !important;
            border-radius: 20px !important;
        }

        .phdForm .modal-content {
            border-radius: 0px !important;
            box-shadow: 1px 1px 10px 2px #6c6c6f !important;
            border: 10px solid #0b2f55;
        }

        .phdForm h2 {

            margin-top: 7px !important;
            margin-bottom: 20px !important;

            /* text-transform: uppercase!important; */
            text-align: center !important;

        }

        .phdForm h2 span {
            position: relative;
            color: #0b2f55 !important;
            font-weight: bold !important;
            letter-spacing: 1px !important;
            font-size: 22px !important;
        }

        .phdForm h2 span:before {
            background-color: #0b2f55;
            position: absolute;
            bottom: -5px;
            left: 0px;
            width: 50%;
            height: 2px;
            content: "";
            display: inline-block;
        }

        .phdForm h2 span:after {
            background-color: #f4a024;
            position: absolute;
            bottom: -5px;
            right: 0px;
            width: 51%;
            height: 2px;
            content: "";
            display: inline-block;
        }

        .phdForm .form-control {
            border-radius: 0px !important;
        }

        .btn-phdform {
            font-weight: bold !important;
            padding: 4px 8px !important;
            border: 1px solid #f4a024 !important;
            background-color: #0b2f55 !important;
            color: #f4a024 !important;
            width: 100%;
        }

        #myModalPhdForm .btn-close {
            position: absolute;
            right: -40px;
            top: -30px;
            border: 2px solid;
            border-radius: 50%;
            padding: 3px 6px;
            color: white;
            /* background: transparent; */
            opacity: inherit;
            border-color: white;
        }

        .phdForm .modal-dialog {
            margin-top: 50px !important;
        }
    </style>
    <div class="phdForm modal fade" id="myModalPhdForm" tabindex="-1" role="dialog"
        aria-labelledby="myModalPhdFormLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"><!-- &times; -->X</span></button>
                    <h2><span>For Ph.D Admission</span></h2>
                    <!-- <hr style="border-top: 1px solid #cac7c7;"> -->
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="text" name="name" class="form-control phd_name formCon"
                                                placeholder="Enter Fullname" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="email" name="email" class="form-control phd_email formCon"
                                                placeholder="Enter Email Id" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="number" name="mobile" class="form-control phd_mobile formCon"
                                                placeholder="Phone Number" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="button" name="enquform"
                                                class="btn btn-primary btn-phdform">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="course-finder">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <h3 class="text-center main-heading-text-per">SSU Academic Programs Suited For You</h3>
                        <div class="form box-border box-shadow">
                            <form action="https://ssu.ac.in/program_finder.php" method="">
                                <div class="row">
                                    <div class="col-lg-10 col-md-10">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <select class="form-control" name="programme" id="pf_programme">
                                                        <option value="">Select Course_type*</option>
                                                        <option value="Under Graduate">Under Graduate</option>
                                                        <option value="Post Graduate">Post Graduate</option>
                                                        <option value="PG Diploma">PG Diploma</option>
                                                        <option value="Diploma">Diploma</option>
                                                        <option value="Certificate">Certificate</option>
                                                        <option value="Integrated">Integrated</option>
                                                        <option value="Research">Research</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <select class="form-control" name="faculty" id="pf_department">
                                                        <option>--Select Faculty--</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <select class="form-control" name="course" id="pf_course">
                                                        <option>--Select Course--</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="text-center">
                                            <button class="btn btn-search btn-danger">Search Courses</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wtpbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <h3 class="main-heading-text-per">Welcome to<br> Sikkim Skill University</h3>
                                <p style="text-align: center; ">*Setting The Stage For Tomorrow's Workplace In Today's
                                    Classroom*</p>
                                <p>The Sikkim Skill University was formed and incorporated by the Sikkim legislature
                                    through its official gazette and is recognised by the UGC Act 1956 under clause
                                    2(f). The Sikkim Skill University is a futuristic model for young India that focuses
                                    on developing trends and skills. With substantial cooperation from the government,
                                    industry, and academia, technology-enabled learning has shifted the focus to
                                    skills-led education.</p>
                                <p>Sikkim Skill University (SSU) focuses on academic, vocational, professional,
                                    technical, and life skill areas to allow skill inculcation and societal enrichment
                                    f....</p> <button class="btn wtpbs-btn"><a href="aboutab44.html?DID=About%20SSU"
                                        style="color: white;text-decoration: none;">Know more</a></button>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="row right-side">
                                    <div class="col-lg-6 col-md-6 col-xs-6">
                                        <div class="content">
                                            <div class="single-box">
                                                <img src="adminpanel/_image/upload-images/icon/1643968311.png"
                                                    alt="Academic Programs">
                                                <h5>Academic Programs</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-6">
                                        <div class="content">
                                            <div class="single-box">
                                                <img src="adminpanel/_image/upload-images/icon/1643968403.png"
                                                    alt="Library / e-Library">
                                                <h5>Library / e-Library</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-6">
                                        <div class="content">
                                            <div class="single-box">
                                                <img src="adminpanel/_image/upload-images/icon/1643968434.png"
                                                    alt="Scholarship">
                                                <h5>Scholarship</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-6">
                                        <div class="content">
                                            <div class="single-box">
                                                <img src="adminpanel/_image/upload-images/icon/1643968689.png"
                                                    alt="On Job Training">
                                                <h5>On Job Training</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="academic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="box">
                        <h3 class="text-center main-heading-text-per"><span class="heading">Our Academic <span
                                    class="head1">Programs</span></span></h3>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="slider-box">
                                    <div class="tslider">
                                        <div class="responsive">
                                            <div class="slide-marquee">
                                                <div class="content-box">
                                                    <img src="adminpanel/_image/upload-images/faculty/1643975675.png"
                                                        class="img-responsive" alt="FACULTY OF MANAGEMENT AND COMMERCE">
                                                    <div class="heading text-center" id="request_call">
                                                        <h4><a href="#">Faculty of Management and Commerce</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide-marquee">
                                                <div class="content-box">
                                                    <img src="adminpanel/_image/upload-images/faculty/1643975752.png"
                                                        class="img-responsive"
                                                        alt="FACULTY OF HUMANITIES AND SOCIAL SCIENCES">
                                                    <div class="heading text-center" id="request_call">
                                                        <h4><a href="#">Faculty of Humanities and Social Sciences</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide-marquee">
                                                <div class="content-box">
                                                    <img src="adminpanel/_image/upload-images/faculty/1643975787.png"
                                                        class="img-responsive"
                                                        alt="FACULTY OF COMPUTING AND INFORMATION TECHNOLOGY">
                                                    <div class="heading text-center" id="request_call">
                                                        <h4><a href="#">Faculty of Computing and Information
                                                                Technology</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide-marquee">
                                                <div class="content-box">
                                                    <img src="adminpanel/_image/upload-images/faculty/1643975849.png"
                                                        class="img-responsive" alt="FACULTY OF SCIENCE">
                                                    <div class="heading text-center" id="request_call">
                                                        <h4><a href="#">Faculty of Science</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide-marquee">
                                                <div class="content-box">
                                                    <img src="adminpanel/_image/upload-images/faculty/1643975895.png"
                                                        class="img-responsive" alt="FACULTY OF JURIDICAL SCIENCES">
                                                    <div class="heading text-center" id="request_call">
                                                        <h4><a href="#">Faculty of Juridical Sciences</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide-marquee">
                                                <div class="content-box">
                                                    <img src="adminpanel/_image/upload-images/faculty/1643975942.png"
                                                        class="img-responsive"
                                                        alt="FACULTY OF EDUCATION AND PHYSICAL EDUCATION">
                                                    <div class="heading text-center" id="request_call">
                                                        <h4><a href="#">Faculty of Education and Physical Education</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide-marquee">
                                                <div class="content-box">
                                                    <img src="adminpanel/_image/upload-images/faculty/1643975964.png"
                                                        class="img-responsive" alt="FACULTY OF PROFESSIONAL STUDIES">
                                                    <div class="heading text-center" id="request_call">
                                                        <h4><a href="#">Faculty of Professional Studies</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide-marquee">
                                                <div class="content-box">
                                                    <img src="adminpanel/_image/upload-images/faculty/1643975987.png"
                                                        class="img-responsive" alt="FACULTY OF ENGINEERING">
                                                    <div class="heading text-center" id="request_call">
                                                        <h4><a href="#">Faculty of Engineering</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide-marquee">
                                                <div class="content-box">
                                                    <img src="adminpanel/_image/upload-images/faculty/1643976015.png"
                                                        class="img-responsive"
                                                        alt="FACULTY OF AGRICULTURAL SCIENCES & ALLIED INDUSTRIES">
                                                    <div class="heading text-center" id="request_call">
                                                        <h4><a href="#">Faculty of Agricultural Sciences & Allied
                                                                Industries</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide-marquee">
                                                <div class="content-box">
                                                    <img src="adminpanel/_image/upload-images/faculty/1643976034.png"
                                                        class="img-responsive" alt="FACULTY OF YOGA">
                                                    <div class="heading text-center" id="request_call">
                                                        <h4><a href="#">Faculty of Yoga</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide-marquee">
                                                <div class="content-box">
                                                    <img src="adminpanel/_image/upload-images/faculty/1643976056.png"
                                                        class="img-responsive"
                                                        alt="FACULTY OF ANIMATION , DESIGN AND PERFORMANCE">
                                                    <div class="heading text-center" id="request_call">
                                                        <h4><a href="#">Faculty of Animation, Design and Performance</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide-marquee">
                                                <div class="content-box">
                                                    <img src="adminpanel/_image/upload-images/faculty/1643976102.png"
                                                        class="img-responsive" alt="FACULTY OF NURSING">
                                                    <div class="heading text-center" id="request_call">
                                                        <h4><a href="#">Faculty of Nursing</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide-marquee">
                                                <div class="content-box">
                                                    <img src="adminpanel/_image/upload-images/faculty/1643978686.png"
                                                        class="img-responsive"
                                                        alt="FACULTY OF PHARMACEUTICAL SCIENCES AND PARAMEDICAL SCIENCES">
                                                    <div class="heading text-center" id="request_call">
                                                        <h4><a href="#">Faculty of Pharmaceutical Sciences and
                                                                Paramedical Sciences</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide-marquee">
                                                <div class="content-box">
                                                    <img src="adminpanel/_image/upload-images/faculty/1643982957.png"
                                                        class="img-responsive" alt="FACULTY OF RESEARCH">
                                                    <div class="heading text-center" id="request_call">
                                                        <h4><a href="#">Faculty of Research</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <img src="~lib/image/abc.PNG" class="img-responsive"> -->
                </div>
            </div>
        </div>
    </section>
    <section class="advantages" id="">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="box box-form">
                        <p>Sikkim Skill University</p>
                        <h5>Talk To Our Expert</h5>
                        <form class="" action="#" method="post" autocomplete="off">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user-o"
                                                    aria-hidden="true"></i></div>
                                            <input type="text" name="name" class="form-control name_an"
                                                placeholder="Enter Full Name *" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-envelope-o"
                                                    aria-hidden="true"></i></div>
                                            <input type="email" name="email" class="form-control email_an"
                                                placeholder="Enter Email Address *" autocomplete="off">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-phone"
                                                    aria-hidden="true"></i></div>
                                            <input type="text" name="mobile" class="form-control mobile_an"
                                                placeholder="Enter Mobile Number" autocomplete="off">
                                        </div>

                                    </div>
                                </div>
                                <!-- <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                                <input type="text" name="state" class="form-control state_an" placeholder="Enter State Name *">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                                <input type="text" name="city" class="form-control city_an" placeholder="Enter City Name *">
                                            </div>
                                        </div>
                                    </div> -->
                                <!-- <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-university" aria-hidden="true"></i></div>
                                                <input type="text" name="program" class="form-control program_an" placeholder="Enter Faculty Name *">
                                            </div>
                                        </div>
                                    </div> -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i>
                                            </div>
                                            <input type="text" name="course" class="form-control course_an"
                                                placeholder="Enter Course Name *">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-commenting-o"
                                                    aria-hidden="true"></i></div>
                                            <input type="text" name="msg" class="form-control msg_an"
                                                placeholder="Enter Your Message *">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-lg-12">
                                    <div class="form-group text-center">
                                        <button class="btn apply_now" name="submit" type="button">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="box box-right-side">
                        <p>Sikkim Skill University</p>
                        <h5>Our Advantages</h5>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">

                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                            href="#collapse1" aria-expanded="true" aria-controls="collapseOne"
                                            class="rotateout">
                                            Culturally-Diverse University </a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in" role="tabpanel"
                                    aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <p>Sikkim Skill University’s student population is very diverse with students
                                            from across Sikkim and around the world. This gives you the chance to learn
                                            from your instructors in class as well as from your peers. Plus, you’ll
                                            naturally develop a global/multicultural perspective.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">

                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                            href="#collapse2" aria-expanded="true" aria-controls="collapseOne"
                                            class="rotateout">
                                            Focus On Long-Term Career Success </a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse " role="tabpanel"
                                    aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <p>Sikkim Skill University programs are designed to meet the needs of the local
                                            industries with current technology and skillsets, portfolio preparation and
                                            industry networking as a focus. Our Career Services team provides support to
                                            students with portfolio development, resume writing and interview skills,
                                            industry events, and job placement.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">

                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                            href="#collapse3" aria-expanded="true" aria-controls="collapseOne"
                                            class="rotateout">
                                            Highly Qualified & Experienced Faculty </a>
                                    </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse " role="tabpanel"
                                    aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <p>With a large number of dedicated, highly qualified and experienced teaching
                                            staff, we maintain an optimal teacher-student ratio and provide special care
                                            for each student. Out teachers go the extra mile to ensure you dont miss out
                                            on your chance to meet the highest standards in school, admissions and other
                                            competitive exams.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">

                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                            href="#collapse4" aria-expanded="true" aria-controls="collapseOne"
                                            class="rotateout">
                                            Comprehensive Study Material </a>
                                    </h4>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse " role="tabpanel"
                                    aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <p>Our most comprehensive range of study materials is curated by subject matter
                                            experts who will give you an in-depth understanding of all important topics
                                            across different disciplines to keep you one step ahead.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">

                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                            href="#collapse5" aria-expanded="true" aria-controls="collapseOne"
                                            class="rotateout">
                                            Integrated Teaching </a>
                                    </h4>
                                </div>
                                <div id="collapse5" class="panel-collapse collapse " role="tabpanel"
                                    aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <p>Our comprehensive approach to teaching will not only allow you to shine in
                                            school/regulatory exams but also ensure you pass competitive exams like
                                            NEET, JEE, NTSE, JEE, Olympiads and more.<br></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <img src="~lib/image/abc1.PNG" class="img-responsive"> -->
    </section>
    <style type="text/css">
        #marq-ne .marq-ul li {
            padding: 8px 0;
        }

        #marq-ne .marq-ul li a {
            font-family: system-ui;
            font-size: 15px;
            color: #0b2f55;
        }

        #marq-ne .marq-ul li a i {
            color: #f4a024;
        }
    </style>
    <section class="news_events">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="box">
                        <h3 class="text-center main-heading-text-per"><span>News and Events</span></h3>
                        <!-- <p class="text-center">Fusce id sem at ligula laoreet hendrerit venenatis sed purus. Ut pellentesque maximus lacus, nec pharetra augue.</p> -->
                        <div class="box_ne">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="content">
                                        <h4>Facebook</h4>
                                        <div class="content-box box-shadow box-border">
                                            <!-- <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FAsian-International-University-101270442137209%2F%3Fref%3Dpages_you_manage&tabs=timeline&width=310&height=285&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="310" height="285" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe> -->
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="content">
                                        <h4>Twitter</h4>
                                        <div class="content-box box-shadow box-border">
                                            <!-- <a class="twitter-timeline" data-width="310" data-height="285" href="https://twitter.com/AsianInternati5?ref_src=twsrc%5Etfw">Tweets by AsianInternational</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> -->
                                            <a class="twitter-timeline" data-width="310" data-height="285"
                                                href="https://twitter.com/SikkimSkill?ref_src=twsrc%5Etfw">Tweets by
                                                SikkimSkill</a>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="content">
                                        <h4>Notification</h4>
                                        <div class="content-box box-shadow box-border">
                                            <marquee direction="up" onmouseover="this.stop();"
                                                onmouseout="this.start();" scrollamount="5" style="height: 284px;"
                                                id='marq-ne'>
                                                <ul class="marq-ul">
                                                    <li><a
                                                            href="{theme_url}assets/image/pdf/PhD%20Notification%20for%20Academic%20Session%202023.pdf"><i
                                                                class="fa fa-angle-double-right"
                                                                aria-hidden="true"></i>&nbsp;Admission in Ph.D.
                                                            Program.</a></li>
                                                    <li><a
                                                            href="{theme_url}assets/image/pdf/Notification%20Regarding%20Exam%20Form.pdf"><i
                                                                class="fa fa-angle-double-right"
                                                                aria-hidden="true"></i>&nbsp;Notice! Semester End
                                                            Examination.</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-double-right"
                                                                aria-hidden="true"></i>&nbsp;Admission open for
                                                            2025-2026 Batch.</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-double-right"
                                                                aria-hidden="true"></i>&nbsp;Admission open for P.hD
                                                            Programme.</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-double-right"
                                                                aria-hidden="true"></i>&nbsp;SSU Prospectus.</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-double-right"
                                                                aria-hidden="true"></i>&nbsp;Massive open online
                                                            courses.</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-double-right"
                                                                aria-hidden="true"></i>&nbsp;SSU introduces digital
                                                            paperless examination system.</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-double-right"
                                                                aria-hidden="true"></i>&nbsp;PhD Entrance test and
                                                            Guidelines.</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-double-right"
                                                                aria-hidden="true"></i>&nbsp;List of Documents to be
                                                            attached along with admission form. Click here to view.</a>
                                                    </li>
                                                    <li><a href="#"><i class="fa fa-angle-double-right"
                                                                aria-hidden="true"></i>&nbsp;Online Registration is open
                                                            for the Twenty Days Online Crash Courses in Personality
                                                            Development and Communication Skills, CoralDraw, MS-Office,
                                                            and Online GST Form Filling.</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-double-right"
                                                                aria-hidden="true"></i>&nbsp;Online Registration is open
                                                            for the One Year/Six Months Diploma/Certificate Courses for
                                                            the Academic Session 2025-26.</a></li>
                                                </ul>
                                            </marquee>
                                            <!-- <div class="ne-content">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-xs-4">
                                                            <div class="date-box">
                                                                <span class="span1"></span>
                                                                <span class="span2"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-xs-8 col-right">
                                                            <div class="news-event-content">
                                                                <h6></h6>
                                                                                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <img src="~lib/image/abc3.PNG" class="img-responsive"> -->
    </section>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                autoPlay: 5000, //Set AutoPlay to 5 seconds

                items: 6,
                itemsDesktop: [1199, 5],
                itemsDesktopSmall: [979, 4],
                itemsTablet: [768, 3],
                itemsTabletSmall: false,
                itemsMobile: [479, 2],
            });
        });
    </script>
    <style type="text/css">
        .owl-controls.clickable,
        .owl-pagination {
            display: none;
        }
    </style>
    <section class="university-logo">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="box">
                        <div id="owl-demo">
                            <div class="item">
                                <div class="text-center" style="display: flow-root">
                                    <div class="circle-logo">
                                        <img src="adminpanel/_image/upload-images/approval/1643993474.png"
                                            class="img-responsive" alt="ASSOCIATION OF INDIAN UNIVERSITY"
                                            style="width: 200px;height: 125px;">
                                    </div>
                                    <h6>ASSOCIATION OF INDIAN UNIVERSITY</h6>
                                </div>
                            </div>
                            <div class="item">
                                <div class="text-center" style="display: flow-root">
                                    <div class="circle-logo">
                                        <img src="adminpanel/_image/upload-images/approval/1643993568.png"
                                            class="img-responsive" alt="PHARMACY COUNCIL OF INDIA"
                                            style="width: 200px;height: 125px;">
                                    </div>
                                    <h6>PHARMACY COUNCIL OF INDIA</h6>
                                </div>
                            </div>
                            <div class="item">
                                <div class="text-center" style="display: flow-root">
                                    <div class="circle-logo">
                                        <img src="adminpanel/_image/upload-images/approval/1643993607.png"
                                            class="img-responsive" alt="NATIONAL COUNCIL FOR TEACHER EDUCATION"
                                            style="width: 200px;height: 125px;">
                                    </div>
                                    <h6>NATIONAL COUNCIL FOR TEACHER EDUCATION</h6>
                                </div>
                            </div>
                            <div class="item">
                                <div class="text-center" style="display: flow-root">
                                    <div class="circle-logo">
                                        <img src="adminpanel/_image/upload-images/approval/1643993658.png"
                                            class="img-responsive" alt="UNIVERSITY GRANT COMMISSION"
                                            style="width: 200px;height: 125px;">
                                    </div>
                                    <h6>UNIVERSITY GRANT COMMISSION</h6>
                                </div>
                            </div>
                            <div class="item">
                                <div class="text-center" style="display: flow-root">
                                    <div class="circle-logo">
                                        <img src="adminpanel/_image/upload-images/approval/1643993690.png"
                                            class="img-responsive" alt="BAR COUNCIL OF INDIA"
                                            style="width: 200px;height: 125px;">
                                    </div>
                                    <h6>BAR COUNCIL OF INDIA</h6>
                                </div>
                            </div>
                            <div class="item">
                                <div class="text-center" style="display: flow-root">
                                    <div class="circle-logo">
                                        <img src="adminpanel/_image/upload-images/approval/1650886655.png"
                                            class="img-responsive" alt="WORLD EDUCATION SERVICES"
                                            style="width: 200px;height: 125px;">
                                    </div>
                                    <h6>WORLD EDUCATION SERVICES</h6>
                                </div>
                            </div>
                            <div class="item">
                                <div class="text-center" style="display: flow-root">
                                    <div class="circle-logo">
                                        <img src="adminpanel/_image/upload-images/approval/1650886672.png"
                                            class="img-responsive" alt="ICES" style="width: 200px;height: 125px;">
                                    </div>
                                    <h6>ICES</h6>
                                </div>
                            </div>
                            <div class="item">
                                <div class="text-center" style="display: flow-root">
                                    <div class="circle-logo">
                                        <img src="adminpanel/_image/upload-images/approval/1650886686.png"
                                            class="img-responsive" alt="IQAS" style="width: 200px;height: 125px;">
                                    </div>
                                    <h6>IQAS</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="company">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="box">
                        <h3 class="text-center main-heading-text-per">Placement and Recruitment</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-6">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-xs-12">
                                        <div class="company-logo box-shadow box-border">
                                            <img src="adminpanel/_image/upload-images/companies/1643994728.png"
                                                class="img-responsive" alt="hul">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-xs-12">
                                        <div class="company-logo box-shadow box-border">
                                            <img src="adminpanel/_image/upload-images/companies/1643994740.png"
                                                class="img-responsive" alt="icici">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-xs-12">
                                        <div class="company-logo box-shadow box-border">
                                            <img src="adminpanel/_image/upload-images/companies/1643994754.png"
                                                class="img-responsive" alt="mercer">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-xs-12">
                                        <div class="company-logo box-shadow box-border">
                                            <img src="adminpanel/_image/upload-images/companies/1643994764.png"
                                                class="img-responsive" alt="abott">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-6">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-xs-12">
                                        <div class="company-logo box-shadow box-border">
                                            <img src="adminpanel/_image/upload-images/companies/1643994764.png"
                                                class="img-responsive" alt="abott">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-xs-12">
                                        <div class="company-logo box-shadow box-border">
                                            <img src="adminpanel/_image/upload-images/companies/1643994785.png"
                                                class="img-responsive" alt="hilti">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-xs-12">
                                        <div class="company-logo box-shadow box-border">
                                            <img src="adminpanel/_image/upload-images/companies/1643994797.png"
                                                class="img-responsive" alt="hul">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-xs-12">
                                        <div class="company-logo box-shadow box-border">
                                            <img src="adminpanel/_image/upload-images/companies/1643994967.png"
                                                class="img-responsive" alt="hindustan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="footer-one">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="content">
                                    <!-- <h5 class="">Top Courses</h5> -->
                                    <h5 class="">SSU Online</h5>
                                    <ul class="sub-content border-left">
                                        <!-- <li><a href=""></a></li> -->
                                        <li><a href="#">Online Result</a></li>
                                        <li><a href="downloads.html">Downloads</a></li>
                                        <!-- <li><a href="gallery.php">Gallery</a></li> -->
                                        <!-- <li><a href="contactus.php">Contact Us</a></li> -->
                                        <li><a href="student_enquiry.html">Student Enquiry</a></li>
                                        <li><a href="feedback.html">Feedback Form</a></li>
                                        <li><a href="e-book.html">E-Books</a></li>
                                        <li><a href="press_release.html">Press Release</a></li>
                                        <li><a href="public_notice.html">Public Notice</a></li>
                                        <li><a href="holiday_list.html">List of Holidays</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="content">
                                    <h5 class="">Help & Support</h5>
                                    <ul class="sub-content border-left">
                                        <li><a href="live_help.html">24X7 Live help</a></li>
                                        <li><a href="faq.html">FAQs</a></li>
                                        <li><a href="right_to_inform.html">RTI Officer</a></li>
                                        <li><a href="https://103.174.103.65/training_partner.php">Training Partner</a>
                                        </li>
                                        <li><a href="https://103.174.103.65/apppanel">APP Login</a></li>
                                        <li><a href="https://103.174.103.65/">ERP Login</a></li>
                                        <li><a
                                                href="https://docs.google.com/forms/d/e/1FAIpQLSexI-TiuAhdeSROO8AGFExAk1t7Drb6pyvdaY9cmIDRCsGN0g/viewform?pli=1">Fee
                                                Confirmation</a></li>
                                        <li><a
                                                href="https://docs.google.com/forms/d/1WL7cAtmrEaAhDlcOZ4zGNr53I2K-vpVhstOpc1qXzgk/viewform?edit_requested=true">Help</a>
                                        </li>
                                        <li><a href="https://103.174.103.65/itppanel">ITP Login</a></li>
                                        <li><a href="https://scprcollege.com/">SCPR</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="content">
                                    <h5 class="">Important Links</h5>
                                    <ul class="sub-content">
                                        <li><a
                                                href="https://www.ugc.ac.in/privateuniversitylist.aspx?id=QvffocHJzD+4E0ZGOqfiqQ==&amp;Unitype=So1CNBLvrigKjpQTxHMrAQ==">UGC</a>
                                        </li>
                                        <li><a href="https://www.barcouncilofindia.org/">BCI</a></li>
                                        <li><a href="https://www.aicte-india.org/">AICTE</a></li>
                                        <li><a href="https://www.ayush.gov.in/">AYUSH</a></li>
                                        <li><a href="https://www.pci.nic.in/">PCI</a></li>
                                        <li><a href="https://www.ccimindia.org.in/">CCIM</a></li>
                                        <li><a href="https://www.ncte.gov.in/">NCTE</a></li>
                                        <li><a href="https://www.indiannursingcouncil.org/">INC</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style type="text/css">
                        .footer-two .content .footer-logo {
                            margin-bottom: 10px;
                            width: 250px;
                        }

                        .footer-two .content p {
                            font-size: 12px;
                            display: flex;
                        }

                        .footer-two .content p span i {
                            background: #f4a024;
                            /* padding: 3px 4px; */
                            border-radius: 50%;
                            height: 20px;
                            width: 20px;
                            line-height: 1.5;
                            text-align: center;
                        }

                        .footer-two .content .quick-contacts {
                            font-size: 16px;
                            font-weight: bold;
                        }

                        .footer-two .content .footer-form {
                            padding: 0 30px;
                        }

                        .footer-two .content .footer-form .form-group {
                            margin-bottom: 5px;
                        }

                        .footer-two .content .footer-form .form-control {
                            border-radius: 8px;
                            color: white;
                            border-color: white;
                            background: transparent;
                        }

                        .footer-two .content .footer-form .form-control.fc {
                            height: 25px;
                        }

                        .footer-two .content .footer-form .form-control::-webkit-input-placeholder {
                            /* Edge */
                            color: white !important;
                        }

                        .footer-two .content .footer-form .form-control:-ms-input-placeholder {
                            /* Internet Explorer 10-11 */
                            color: white !important;
                        }

                        .footer-two .content .footer-form .form-control::placeholder {
                            color: white !important;
                        }

                        .footer-two .content .footer-form .btn {
                            border-radius: 8px;
                            background: #f4a024;
                            padding: 1px 15px;
                            width: 100%;
                            font-weight: bold;
                        }

                        .footer .footer-two {
                            border-bottom: 2px dashed white;
                        }

                        .footer-two .content h5 {
                            font-size: 16px;
                            font-weight: bold;
                            text-transform: uppercase;
                        }

                        .footer-three {
                            margin-bottom: 30px;
                        }

                        .footer-three .content h5 {
                            font-size: 16px;
                            font-weight: bold;
                            text-transform: uppercase;
                        }

                        .footer-three .footer-icon {
                            font-size: 12px;
                            margin: 0 5px;
                        }

                        .footer-three .footer-icon img {
                            height: 30px;
                            vertical-align: baseline;
                        }

                        .footer .footer-three .content {
                            padding: 10px;
                            /*text-align: center;*/
                        }

                        .footer .footer-three .content.social {
                            text-align: center;
                        }

                        @media screen and (max-width: 767px) {
                            .footer .footer-three .content.social {
                                text-align: left;
                            }
                        }

                        .footer .footer-three .content .subscribe .form-control {
                            border-radius: 0;
                        }

                        .footer .footer-three .content .subscribe .input-group-addon {
                            border-radius: 0;
                            background: #f4a024;
                            border-color: orange;
                        }

                        .footer .footer-two .address {
                            margin-top: 25px;
                        }

                        .footer .footer-two .address p {
                            font-size: 14px;
                            font-family: system-ui;
                        }

                        .footer-two .gallery {
                            background-color: #0b2f55;
                        }

                        .footer-two .gallery .image .img-responsive {
                            box-shadow: 0px 0.5px 5px 0.5px #e7e4e4;
                        }
                    </style>
                    <div class="footer-two footer-one">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="content">
                                    <div class="footer-logo">
                                        <img src="{theme_url}assets/image/footer-logo.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="address">
                                        <p><span><i class="fa fa-map-marker"></i>&nbsp;:&nbsp;</span>Namthang , Namthang
                                            Bazar P.O Namthang<br> Dist- South Sikkim , Sikkim- 737132 ( India )</p>
                                        <p><span><i class="fa fa-phone"></i>&nbsp;:&nbsp;</span>+91 9599123451</p>
                                        <p><span><i
                                                    class="fa fa-envelope-o"></i>&nbsp;:&nbsp;</span>info@sikkimskilluniversity.ac.in
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="content text-center">
                                    <h5 class="text-center">Leave a Comment</h5>
                                    <form class="footer-form" action="#" method="post" autocomplete="off">
                                        <div class="form-group"><input type="text" name="name" placeholder="Name :"
                                                class="form-control fc name_fc" autocomplete="off"></div>
                                        <div class="form-group"><input type="email" name="email"
                                                placeholder="Email ID :" class="form-control fc email_fc"
                                                autocomplete="off"></div>
                                        <div class="form-group"><input type="number" name="phone"
                                                placeholder="Mobile No. :" class="form-control fc mobile_fc"
                                                autocomplete="off"></div>
                                        <div class="form-group"><textarea class="form-control msg_fc" name="msg"
                                                rows="3" placeholder="Message :" autocomplete="off"></textarea></div>
                                        <div class="form-group text-center"><button class="btn lacmnt" name="lacmnt"
                                                type="button">Submit</button></div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-lg-offset-1">
                                <div class="content">
                                    <h5 class="">New Courses</h5>
                                    <ul class="sub-content">
                                        <li><a href="bba.html">BBA</a></li>
                                        <li><a href="mba.html">MBA</a></li>
                                        <li><a href="bca.html">BCA</a></li>
                                        <li><a href="mca.html">MCA</a></li>
                                        <li><a href="btech.html">B.Tech</a></li>
                                        <li><a href="mtech.html">M.Tech</a></li>
                                        <li><a href="diploma.html">Diploma</a></li>
                                        <li><a href="dpharma.html">D.Pharma</a></li>
                                        <li><a href="bed.html">B.Ed</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- <div class="col-lg-3 col-md-4 col-lg-offset-1">
                                    <div class="content">
                                        <h5 class="text-center">Gallery</h5>
                                        <div class="gallery">
                                            <img src="~lib/image/gallery_img.PNG" alt="" class="img-responsive">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3 gallery-col">
                                                    <div class="image">
                                                        <img src="~lib/image/gallery/1.jpg" class="img-responsive">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3 gallery-col">
                                                    <div class="image">
                                                        <img src="~lib/image/gallery/2.jpg" class="img-responsive">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3 gallery-col">
                                                    <div class="image">
                                                        <img src="~lib/image/gallery/3.jpg" class="img-responsive">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3 gallery-col">
                                                    <div class="image">
                                                        <img src="~lib/image/gallery/4.jpg" class="img-responsive">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3 gallery-col">
                                                    <div class="image">
                                                        <img src="~lib/image/gallery/5.jpg" class="img-responsive">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3 gallery-col">
                                                    <div class="image">
                                                        <img src="~lib/image/gallery/6.jpg" class="img-responsive">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3 gallery-col">
                                                    <div class="image">
                                                        <img src="~lib/image/gallery/7.jpg" class="img-responsive">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3 gallery-col">
                                                    <div class="image">
                                                        <img src="~lib/image/gallery/8.jpg" class="img-responsive">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3 gallery-col">
                                                    <div class="image">
                                                        <img src="~lib/image/gallery/9.jpg" class="img-responsive">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3 gallery-col">
                                                    <div class="image">
                                                        <img src="~lib/image/gallery/10.jpg" class="img-responsive">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3 gallery-col">
                                                    <div class="image">
                                                        <img src="~lib/image/gallery/11.jpg" class="img-responsive">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3 gallery-col">
                                                    <div class="image">
                                                        <img src="~lib/image/gallery/12.jpg" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                        </div>
                    </div>
                    <div class="footer-three">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="content">
                                    <h5>Call Us Now</h5>
                                    <ul>
                                        <li>+91-9599123451</li>
                                        <li>+91-9289456781</li>
                                        <!-- <li>+91-9289456782</li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="content social">
                                    <h5 class="">Connect with us</h5>
                                    <a href="https://www.facebook.com/" class="footer-icon"><img
                                            src="adminpanel/_image/upload-images/icon/1644000258.png" class="social_img"
                                            alt="Facebook"></a>
                                    <a href="https://twitter.com/" class="footer-icon"><img
                                            src="adminpanel/_image/upload-images/icon/1644000465.png" class="social_img"
                                            alt="Twitter"></a>
                                    <a href="https://www.instagram.com/" class="footer-icon"><img
                                            src="adminpanel/_image/upload-images/icon/1644000539.png" class="social_img"
                                            alt="Instagram"></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="content">
                                    <h5>Subscribe Us</h5>
                                    <form class="subscribe" method="post" action="#">
                                        <div class="input-group">
                                            <input type="email" class="form-control sub_email" placeholder="Email ID"
                                                name="sub_email">
                                            <span class="input-group-addon" id="basic-addon1"><button
                                                    class="subscribe_btn" style="background: none;border:none;"
                                                    type="button"> Subscribe</button></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="social-icon">
                            <div class="row">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="text-center">
                                        <div class="icon-box">
                                            <span class="connect">Contact with us :</span>
                                                                                        <a href=""><img src="adminpanel/~image/upload-images/icon/" class="social_img" alt="">&nbsp;</a>
                                                                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                </div>
            </div>
        </div>
    </section>
    <section class="copyright_link">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <p>Copyright &copy; Sikkim Skill University, Sikkim </p>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="pull-right">
                        <ul class="nav-links content">
                            <li><a href="about093b.html?DID=contact_us">Contact Us</a></li>
                            <li><a href="about6adf.html?DID=Terms%20of%20Service">Terms of Service</a></li>
                            <li><a href="abouta645.html?DID=Privacy%20Policy">Privacy Policy</a></li>
                            <li><a href="about8c45.html?DID=Refund%20Policy">Refund Policy</a></li>
                            <li><a href="about376b.html?DID=Disclaimer">Disclaimer</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="whatsapp">
            <a href="https://wa.me/919289456781" target="_blank"> <img src="{theme_url}assets/image/whatsapp%20(1).png" width="60px;"
                    height="60px;" alt="Whatsapp Message"></a>
            <span class="tooltiptext">Whatsapp Message</span>
        </div>
    </div>
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