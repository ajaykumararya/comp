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