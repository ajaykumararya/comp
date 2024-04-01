<style>
        .galleryWrap {
            display: -webkit-flex;
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .galleryWrap .fancybox2 {
            width: 25%;
            position: relative;
            border: 1px solid #888888;
        }

        .galleryWrap .fancybox2 .overlay {
            position: absolute;
            overflow: hidden;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(247, 147, 29, .8);
            opacity: 0;
            -webkit-transform: scale(0);
            -ms-transform: scale(0);
            transform: scale(0);
            -webkit-transition: all .4s ease-in-out;
            -o-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
            text-align: center;
        }

        .galleryWrap .fancybox2 .overlay .fa {
            display: block;
            text-align: center;
            text-transform: uppercase;
            color: #fff;
            position: absolute;
            width: 100%;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            font-size: 16px;
        }

        .galleryWrap .fancybox2 .overlay::after {
            content: "";
            position: absolute;
            border: 1px solid #fff;
            left: 10px;
            right: 10px;
            top: 10px;
            bottom: 10px;
        }

        .galleryWrap .fancybox2:hover>.overlay {
            opacity: 1;
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
        }

        .btn-default {
            float: right;
        }
    </style>
    <script>
        jQuery(document).ready(function () {
            jQuery(".video-iframe").fitVids();
            jQuery('.gallerySlider1').bxSlider({
                auto: true,
                pager: false,
                controls: true,
                adaptiveHeight: true,
                nextText: '&rarr;',
                prevText: '&larr;'
            });
        });
    </script>
    <section class="clearfix bannerWrap os-animation" data-os-animation="fadeIn" data-os-animation-delay=".5s">
        <div id="homeBanner" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#homeBanner" data-slide-to="0"></li>
                <li data-target="#homeBanner" data-slide-to="1"></li>
                <li data-target="#homeBanner" data-slide-to="2"></li>
                <!--<li data-target="#homeBanner" data-slide-to="1"></li>-->
                <li data-target="#homeBanner" data-slide-to="3" class="active"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{base_url}upload/wGy2wEUJm6.jpg" alt="First slide" width="1120"
                        height="396">
                </div>
                <div class="carousel-item ">
                    <img class="d-block w-100" src="uploads/135286.jpg" alt="First slide" width="1120" height="396">
                </div>
                <div class="carousel-item ">
                    <img class="d-block w-100" src="uploads/303613.jpg" alt="First slide" width="1120" height="396">
                </div>
                <div class="carousel-item ">
                    <a href="https://www.mygov.in/campaigns/agniveer/?target=webview&amp;type=campaign&amp;nid=0"
                        target="_blank">
                        <img class="d-block w-100" src="uploads/agnipath.jpg" alt="First slide"
                            style="width:1120px; height:477px;">
                    </a>
                </div>
            </div>
    </section>
    <section class="clearfix spacer dark-bg os-animation latestnews-wrap" data-os-animation="fadeIn"
        data-os-animation-delay=".5s">
        <div class="container">
            <div class="clearfix latestnewsInner">
                <span class="title"><span>Latest Updates</span></span>
                <marquee>
                    *<span>II WBSU FORM FILL IN OF UG SEMESTER-II EXAMINATION (NEP SYSTEM) 2023-24 WILL COMMENCE FROM
                        19/03/2024 TO 27/03/2024 II UNIVERSITY REGISTRATION NUMBER OF 1ST SEMESTER FOR SESSION 2023-24
                        WILL BE AVAILABLE/DISPLAY AT NOTICE BOARD OF OUR COLLEGE WEBSITE II ALL SEMESTER MARK SHEETS &
                        DEGREE CERTIFICATE UP TO YEAR 2020 WILL BE DISTRIBUTED ON & FROM 21/03/2024 AT 12 NOON TO 04.00
                        PM (MONDAY TO FRIDAY) & 11.30 A.M TO 01.30 PM (ONLY SATURDAY) II</span>&nbsp;&nbsp;
                    <!--Invigilation duties for <span>B.A. / B.Sc. Part-III Examination – 2018</span>-->
                </marquee>
            </div>
        </div>
    </section>
    <section class="clearfix spacer gray-bg os-animation content-area" data-os-animation="fadeIn"
        data-os-animation-delay=".5s">
        <div class="container">
            <div class="clearfix row">
                <div class="col-md-6 col-lg-3">
                    <!--<div class="imgBox">
                        <span class="borderBox"></span>
                        <img src="https://www.vivekanandacollegemmg.edu.in//{theme_url}assets/images/swami-ji.jpg" alt="" width="1200" height="1600">
                    </div>-->
                    <div class="clearfix box">
                        <h2 class="title">Our Certificate</h2>
                        <div class="clearfix boxInner">
                            <div class="clearfix gallerySlider gallerySlider1">
                                <a data-fancybox="gallery" href="images/IMG.jpg"
                                    data-thumbnail="https://www.vivekanandacollegemmg.edu.in/images/IMG.jpg"
                                    class="galpic fancybox" data-caption="Certificate">
                                    <img src="images/IMG.jpg" style="height: 210px;" alt="" width="300" height="">
                                    <div class="galpic-hover d-flex align-items-center justify-content-center"><i
                                            class="fa fa-search"></i></div>
                                </a>
                                <a data-fancybox="gallery" href="images/IMG_0001.jpg"
                                    data-thumbnail="https://www.vivekanandacollegemmg.edu.in/images/IMG_0001.jpg"
                                    class="galpic fancybox" data-caption="Certificate">
                                    <img src="images/IMG_0001.jpg" style="height: 210px;" alt="" width="300" height="">
                                    <div class="galpic-hover d-flex align-items-center justify-content-center"><i
                                            class="fa fa-search"></i></div>
                                </a>
                                <a data-fancybox="gallery" href="images/IMG_0002.jpg"
                                    data-thumbnail="https://www.vivekanandacollegemmg.edu.in/images/IMG_0002.jpg"
                                    class="galpic fancybox" data-caption="Certificate">
                                    <img src="images/IMG_0002.jpg" style="height: 210px;" alt="" width="300" height="">
                                    <div class="galpic-hover d-flex align-items-center justify-content-center"><i
                                            class="fa fa-search"></i></div>
                                </a>
                                <a data-fancybox="gallery" href="images/IMG_0003.jpg"
                                    data-thumbnail="https://www.vivekanandacollegemmg.edu.in/images/IMG_0003.jpg"
                                    class="galpic fancybox" data-caption="Certificate">
                                    <img src="images/IMG_0003.jpg" style="height: 210px;" alt="" width="300" height="">
                                    <div class="galpic-hover d-flex align-items-center justify-content-center"><i
                                            class="fa fa-search"></i></div>
                                </a>
                                <a data-fancybox="gallery" href="images/IMG_0004.jpg"
                                    data-thumbnail="https://www.vivekanandacollegemmg.edu.in/images/IMG_0004.jpg"
                                    class="galpic fancybox" data-caption="Certificate">
                                    <img src="images/IMG_0004.jpg" style="height: 210px;" alt="" width="300" height="">
                                    <div class="galpic-hover d-flex align-items-center justify-content-center"><i
                                            class="fa fa-search"></i></div>
                                </a>
                                <a data-fancybox="gallery" href="images/IMG_0005.jpg"
                                    data-thumbnail="https://www.vivekanandacollegemmg.edu.in/images/IMG_0005.jpg"
                                    class="galpic fancybox" data-caption="Certificate">
                                    <img src="images/IMG_0005.jpg" style="height: 210px;" alt="" width="300" height="">
                                    <div class="galpic-hover d-flex align-items-center justify-content-center"><i
                                            class="fa fa-search"></i></div>
                                </a>
                                <a data-fancybox="gallery" href="images/IMG_0006.jpg"
                                    data-thumbnail="https://www.vivekanandacollegemmg.edu.in/images/IMG_0006.jpg"
                                    class="galpic fancybox" data-caption="Certificate">
                                    <img src="images/IMG_0006.jpg" style="height: 210px;" alt="" width="300" height="">
                                    <div class="galpic-hover d-flex align-items-center justify-content-center"><i
                                            class="fa fa-search"></i></div>
                                </a>
                                <a data-fancybox="gallery" href="images/iso-2020.jpg"
                                    data-thumbnail="https://www.vivekanandacollegemmg.edu.in/images/iso-2020.jpg"
                                    class="galpic fancybox" data-caption="Certificate">
                                    <img src="images/iso-2020.jpg" style="height: 210px;" alt="" width="300" height="">
                                    <div class="galpic-hover d-flex align-items-center justify-content-center"><i
                                            class="fa fa-search"></i></div>
                                </a>
                                <a data-fancybox="gallery" href="images/iso-2021.jpg"
                                    data-thumbnail="https://www.vivekanandacollegemmg.edu.in/images/iso-2021.jpg"
                                    class="galpic fancybox" data-caption="Certificate">
                                    <img src="images/iso-2021.jpg" style="height: 210px;" alt="" width="300" height="">
                                    <div class="galpic-hover d-flex align-items-center justify-content-center"><i
                                            class="fa fa-search"></i></div>
                                </a>
                                <a data-fancybox="gallery" href="images/registration.jpg"
                                    data-thumbnail="https://www.vivekanandacollegemmg.edu.in/images/registration.jpeg"
                                    class="galpic fancybox" data-caption="Certificate">
                                    <img src="images/registration.jpg" style="height: 210px;" alt="" width="300"
                                        height="">
                                    <div class="galpic-hover d-flex align-items-center justify-content-center"><i
                                            class="fa fa-search"></i></div>
                                </a>
                            </div>
                            <!--<a href="" class="btn btn-green">View All</a>-->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="clearfix title-wrap">
                        <h1 class="pageTitle">About Our College</h1>
                        <div class="clearfix entry">
                            <p style="text-align: justify;">Vivekananda College, Madhyamgram was established in 1986. It
                                is named Vivekananda College to pay our homage to Swami Vivekananda, the great patriot
                                and social reformer, and eternal embodiment of the soul of India and a great inspiring
                                force behind the making of modern India. Our College is a co-educational general degree
                                college affiliated to the West Bengal State University. </p>
                            <p>It is situated in a calm and quiet atmosphere and is far from markets, stations, cinema
                                halls and other disturbing factors. At the same time it is within the locality where all
                                modern amenities are available.</p>
                            <a href="site/about_us/college-profile.html" class="btn btn-default"><span><span
                                        class="hvr-bounce-to-bottom">Read More</span></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="clearfix principal-Desk-wrap">
                        <div class="clearfix principal-Desk">
                            <figure class="imageBox">
                                <a href="#"><img src="{theme_url}assets/images/prinipal.png" alt="" width="150"
                                        height="150"></a>
                            </figure>
                            <div class="textBox">
                                <h4 class="title">Dr. Chandan Kumar Chakraborty</h4>
                                <h6 class="desig">Principal, Vivekananda College, Madhyamgram </h6>
                                <p>Vivekananda College MADHYAMGRAM is a thirty year old institution of higher learning
                                    formerly affiliated to the University of Calcutta since inception in 1986...</p>
                                <a href="site/administration/principal-desk.html" class="link">Read More <i
                                        class="fa fa-angle-double-right "></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="clearfix spacer gray-bg os-animation" data-os-animation="fadeIn" data-os-animation-delay=".5s">
        <div class="container">
            <div class="clearfix row">
                <div class="col-lg-8">
                    <div class="clearfix title-wrap">
                        <h2 class="secTitle">Our Featured Events</h2>
                    </div>
                    <div class="clearfix galleryWrap">
                        <a class="fancybox2" href="site/gallery_list/1.html" title="">
                            <img src="uploads/2833gal1.jpg" alt="" width="199" height="132" />
                            <span class="overlay">
                                <p style="margin-top:50px;">Event One</p>
                            </span>
                        </a>
                        <a class="fancybox2" href="site/gallery_list/2.html" title="">
                            <img src="uploads/22404gal2.jpg" alt="" width="199" height="132" />
                            <span class="overlay">
                                <p style="margin-top:50px;">Event Two</p>
                            </span>
                        </a>
                        <a class="fancybox2" href="site/gallery_list/3.html" title="">
                            <img src="uploads/30534gal3.jpg" alt="" width="199" height="132" />
                            <span class="overlay">
                                <p style="margin-top:50px;">Event Three</p>
                            </span>
                        </a>
                        <a class="fancybox2" href="site/gallery_list/4.html" title="">
                            <img src="uploads/11117gal4.jpg" alt="" width="199" height="132" />
                            <span class="overlay">
                                <p style="margin-top:50px;">Event Four</p>
                            </span>
                        </a>
                        <a class="fancybox2" href="site/gallery_list/5.html" title="">
                            <img src="uploads/23159gal5.jpg" alt="" width="199" height="132" />
                            <span class="overlay">
                                <p style="margin-top:50px;">Event Five</p>
                            </span>
                        </a>
                        <a class="fancybox2" href="site/gallery_list/6.html" title="">
                            <img src="uploads/25506gal5.jpg" alt="" width="199" height="132" />
                            <span class="overlay">
                                <p style="margin-top:50px;">Event Six</p>
                            </span>
                        </a>
                        <a class="fancybox2" href="site/gallery_list/7.html" title="">
                            <img src="uploads/30436gal6.jpg" alt="" width="199" height="132" />
                            <span class="overlay">
                                <p style="margin-top:50px;">Event Seven</p>
                            </span>
                        </a>
                        <a class="fancybox2" href="site/gallery_list/8.html" title="">
                            <img src="uploads/30771gal7.jpg" alt="" width="199" height="132" />
                            <span class="overlay">
                                <p style="margin-top:50px;">Event Eight</p>
                            </span>
                        </a>
                        <a class="fancybox2" href="site/gallery_list/9.html" title="">
                            <img src="uploads/19719gal8.jpg" alt="" width="199" height="132" />
                            <span class="overlay">
                                <p style="margin-top:50px;">Event Nine</p>
                            </span>
                        </a>
                        <a class="fancybox2" href="site/gallery_list/10.html" title="">
                            <img src="uploads/26608gal9.jpg" alt="" width="199" height="132" />
                            <span class="overlay">
                                <p style="margin-top:50px;">Event Ten</p>
                            </span>
                        </a>
                        <a class="fancybox2" href="site/gallery_list/11.html" title="">
                            <img src="uploads/29804gal10.jpg" alt="" width="199" height="132" />
                            <span class="overlay">
                                <p style="margin-top:50px;">Event Eleven</p>
                            </span>
                        </a>
                        <a class="fancybox2" href="site/gallery_list/12.html" title="">
                            <img src="uploads/10805gal11.jpg" alt="" width="199" height="132" />
                            <span class="overlay">
                                <p style="margin-top:50px;">Event Twelve</p>
                            </span>
                        </a>
                    </div>
                    <div class="clearfix text-right">
                        <a href="site/view_all_event.html" class="btn btn-default"><span><span
                                    class="hvr-bounce-to-right">View All Events</span></span></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="title-wrap">
                        <h1 class="pageTitle">Notice <span>Board</span></h1>
                    </div>
                    <div class="clearfix newsBox-wrap" id="newsSlider">
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>19</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/1242822725(NEP_-SYSTEM)SEMESTER-I%2c_2023-24_EXAM_FORM_FILL_UP_NOTICE.pdf"
                                        target="_blank">WBSU UG SEMESTER - I (NEP SYSTEM) FINAL EXAMINATION FORM FILL UP
                                        NOTICE 2023-24</a></h5>
                                <!--<h5><a href="">WBSU UG SEMESTER - I (NEP SYSTEM) FINAL EXAMINATION FORM FILL UP NOTICE 2023-24</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>15</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/1382635666UG_FINAL_REGISTRATION_LIST_2023.pdf"
                                        target="_blank">UNIVERSITY REGISTRATION NO. LIST FOR UG COURSES OF 2023-24</a>
                                </h5>
                                <!--<h5><a href="">UNIVERSITY REGISTRATION NO. LIST FOR UG COURSES OF 2023-24</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>07</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/1428247858ROUTINE_(B_Sc)_%2c_SEM_-_II%2cIV%2cVI.pdf"
                                        target="_blank">ROUTINE (B.Sc) , SEM - II,IV,VI</a></h5>
                                <!--<h5><a href="">ROUTINE (B.Sc) , SEM - II,IV,VI</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>07</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/458615006ROUTINE_(B_A)_%2c_SEM_-_II%2cIV%2cVI.pdf"
                                        target="_blank">ROUTINE (B.A) , SEM - II,IV,VI</a></h5>
                                <!--<h5><a href="">ROUTINE (B.A) , SEM - II,IV,VI</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>06</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/418956089NOTICE_FOR_CLASS_START.pdf" target="_blank">NOTICE FOR
                                        CLASS START</a></h5>
                                <!--<h5><a href="">NOTICE FOR CLASS START</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>06</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/1874612677FEES_RETURN.pdf" target="_blank">Notice for Refund
                                        Admission fees of session 2023-24</a></h5>
                                <!--<h5><a href="">Notice for Refund Admission fees of session 2023-24</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/2120318595VC-Walk-in-interview.pdf" target="_blank">WALK IN
                                        INTERVIEW FOR RECRUITMENT OF CONTRACTUAL NON TEACHING STAFF</a></h5>
                                <!--<h5><a href="">WALK IN INTERVIEW FOR RECRUITMENT OF CONTRACTUAL NON TEACHING STAFF</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>16</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/940551044Monthly_fees_for_B_A_B_Sc_1st_Sem_0001.pdf"
                                        target="_blank">03 MONTHS MONTHLY FEES OF B.A/B.SC 1ST SEMESTER 2023-24</a></h5>
                                <!--<h5><a href="">03 MONTHS MONTHLY FEES OF B.A/B.SC 1ST SEMESTER 2023-24</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>06</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/4827472753RD_SEM_GEO_PRACTICAL.pdf" target="_blank">3RD SEMESTER
                                        GEOGRAPHY PRACTICAL EXAM NOTICE 2023-24</a></h5>
                                <!--<h5><a href="">3RD SEMESTER GEOGRAPHY PRACTICAL EXAM NOTICE 2023-24</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>06</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/13390601663RD_SEM_PG_EDU_ROUTINE_23.pdf" target="_blank">1ST & 3RD
                                        SEMESTER PG EXAMINATION ROUTINE DEPT. OF EDUCATION 2023-2024</a></h5>
                                <!--<h5><a href="">1ST & 3RD SEMESTER PG EXAMINATION ROUTINE DEPT. OF EDUCATION  2023-2024</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>12</span>
                                    Jan -
                                    2024
                                </div>
                                <h5><a href="uploads/1415088488exam_Notice.pdf" target="_blank">1ST SEMESTER INTERNAL
                                        ASSESSMENT EXAMINATION NOTICE OF BENGALI 2023-24</a></h5>
                                <!--<h5><a href="">1ST SEMESTER INTERNAL ASSESSMENT EXAMINATION NOTICE OF BENGALI 2023-24</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>06</span>
                                    Jan -
                                    2024
                                </div>
                                <h5><a href="uploads/1653883552INTERNAL_EXAMINATION_2023-24.pdf" target="_blank">1ST
                                        SEMESTER INTERNAL EXAMINATION NOTICE & SCHEDULE OF 2023-24</a></h5>
                                <!--<h5><a href="">1ST SEMESTER INTERNAL EXAMINATION NOTICE & SCHEDULE OF 2023-24</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>06</span>
                                    Jan -
                                    2024
                                </div>
                                <h5><a href="uploads/636503824MP_SCHOLARSHIP.pdf" target="_blank">APPLICATION FORM FOR
                                        MP SCHOLARSHIP </a></h5>
                                <!--<h5><a href="">APPLICATION FORM FOR MP SCHOLARSHIP </a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/534758018Exam-Fees-UG-Semester-V_2023-24.pdf" target="_blank">WBSU
                                        FORM FILL UP NOTICE OF UG SEMESTER - V FINAL EXAMINATION 2023-24</a></h5>
                                <!--<h5><a href="">WBSU FORM FILL UP NOTICE OF UG SEMESTER - V FINAL EXAMINATION 2023-24</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/461752616Exam-Fees-UG-Semester-III_2023-24.pdf"
                                        target="_blank">WBSU FORM FILL UP NOTICE OF UG SEMESTER - III FINAL EXAMINATION
                                        2023-24</a></h5>
                                <!--<h5><a href="">WBSU FORM FILL UP NOTICE OF UG SEMESTER - III FINAL EXAMINATION 2023-24</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>06</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/868667485INTERNAL_EXAMINATION_NOTICE_2023-24.pdf"
                                        target="_blank">B.A /B.SC INTERNAL EXAMINATION NOTICE FOR 3RD & 5TH SEMESTER
                                        2023-24</a></h5>
                                <!--<h5><a href="">B.A /B.SC INTERNAL EXAMINATION NOTICE FOR 3RD & 5TH SEMESTER 2023-24</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>22</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/993635665ADMISSION_NOTICE_FOR_2023-24_3RD_5TH_SEM.pdf"
                                        target="_blank">ADMISSION NOTICE FOR 3RD & 5TH SEMESTER (CBCS) FOR THE SESSION
                                        2023-24</a></h5>
                                <!--<h5><a href="">ADMISSION NOTICE FOR 3RD & 5TH SEMESTER (CBCS) FOR THE SESSION 2023-24</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>17</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/170616804PG_REGISTRATION_VERIFICATION_2023.pdf"
                                        target="_blank">SCHEDULE OF PG REGISTRATION VERIFICATION NOTICE FOR SESSION
                                        2023-2024</a></h5>
                                <!--<h5><a href="">SCHEDULE OF PG REGISTRATION VERIFICATION NOTICE FOR SESSION 2023-2024</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>16</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/1621984784Submission_Documents_of_Final_UG_Registration_Form_2023-2024.pdf"
                                        target="_blank">SUBMISSION NECESSARY DOCUMENTS FOR UG FINAL REGISTRATION FORM
                                        2023-2024</a></h5>
                                <!--<h5><a href="">SUBMISSION NECESSARY DOCUMENTS FOR UG FINAL REGISTRATION FORM 2023-2024</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>16</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/1148631415UG_REGISTRATION_VERIFICATION_NOTICE_2023-24.pdf"
                                        target="_blank">UG ONLINE REGISTRATION VERIFICATION NOTICE OF IST SEMESTER
                                        (2023-2024)</a></h5>
                                <!--<h5><a href="">UG ONLINE REGISTRATION VERIFICATION NOTICE OF IST SEMESTER (2023-2024)</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>13</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/147597260RE-OPEN_ONLINE_UG_ADMISSION_NOTICE_2023-24.pdf"
                                        target="_blank">RE-OPEN UG ONLINE ADMISSION NOTICE 2023-2024</a></h5>
                                <!--<h5><a href="">RE-OPEN UG ONLINE ADMISSION NOTICE 2023-2024</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>08</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/651025631MARK_SHEET_DISTRIBUTION.pdf" target="_blank">MARK SHEET
                                        DISTRIBUTION NOTICE OF B.A/B.SC SEMESTER- VI EXAMINATION, 2023</a></h5>
                                <!--<h5><a href="">MARK SHEET DISTRIBUTION NOTICE OF B.A/B.SC SEMESTER- VI EXAMINATION, 2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>31</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/1350742402B_A_B_Sc_SEM-II_AECC_-_MIL_PAPER_EXAMINATION_2023.pdf"
                                        target="_blank">NOTICE REGARDING B.A/B.SC 2ND SEMESTER AECC - MIL EXAMINATION
                                        2023</a></h5>
                                <!--<h5><a href="">NOTICE REGARDING B.A/B.SC 2ND SEMESTER AECC - MIL EXAMINATION 2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>31</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/930686879PG_ONLINE_ADMISSION_NOTICE_2023-24.pdf" target="_blank">PG
                                        ONLINE ADMISSION NOTICE 2023 - 2024</a></h5>
                                <!--<h5><a href="">PG ONLINE ADMISSION NOTICE 2023 - 2024</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>30</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/1914771922Notification_for_UG_Registration_2023-24.pdf"
                                        target="_blank">NOTIFICATION & SCHEDULE OF UG ONLINE WBSU REGISTRATION FOR THE
                                        SESSION 2023-2024</a></h5>
                                <!--<h5><a href="">NOTIFICATION & SCHEDULE OF UG ONLINE WBSU REGISTRATION FOR THE SESSION 2023-2024</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>24</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/1631399961Notice_regarding_Re-opening_of_Form_fill-in_portal_of_Semester-II_IV%2c2023.pdf"
                                        target="_blank">RE-OPENING EXAM FORM FILL IN UP PORTAL OF SEMESTER -II &
                                        SEMESTER -IV , 2023</a></h5>
                                <!--<h5><a href="">RE-OPENING EXAM FORM FILL IN UP PORTAL OF SEMESTER -II & SEMESTER -IV , 2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>18</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/453746066Subject_Change_Notice_for_3_Years_Multidisciplinary_Course_of_2023-24.pdf"
                                        target="_blank">SUBJECT CHANGE NOTICE FOR 3 YEARS MULTIDISCIPLINARY COURSE OF
                                        ACADEMIC SESSION 2023-2024</a></h5>
                                <!--<h5><a href="">SUBJECT CHANGE NOTICE FOR 3 YEARS MULTIDISCIPLINARY COURSE OF ACADEMIC SESSION 2023-2024</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>16</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/472295316ODD_SEMESTER_ROUTINE_FOR_SCIENCE_2023-24.pdf"
                                        target="_blank">ODD SEMESTER CLASS ROUTINE OF SCIENCE STREAM 2023-2024</a></h5>
                                <!--<h5><a href="">ODD SEMESTER CLASS ROUTINE OF SCIENCE STREAM 2023-2024</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>16</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/1663709556B_A_1st_SEM_ARTS_ROUTINE_2023-24.pdf" target="_blank">B.A
                                        1ST SEMESTER CLASS ROUTINE (UG COURSES) OF 2023-2024</a></h5>
                                <!--<h5><a href="">B.A 1ST SEMESTER CLASS ROUTINE (UG COURSES) OF 2023-2024</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>27</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/8953144711st_Sem_Class_Start_Notice_2023.pdf" target="_blank">Class
                                        Start notice for 1st semester 2023-24</a></h5>
                                <!--<h5><a href="">Class Start notice for 1st semester 2023-24</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>27</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/13322148492nd_Phase_Online_Admission_2023-24.pdf"
                                        target="_blank">2ND PHASE ONLINE APPLICATION FOR UG PROGRAMME 2023-24</a></h5>
                                <!--<h5><a href="">2ND PHASE ONLINE APPLICATION FOR UG PROGRAMME 2023-24</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>27</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/12351065922nd_Phase_Online_Admission_2023-24.pdf"
                                        target="_blank">2ND PHASE ONLINE APPLICATION FOR UG PROGRAMME 2023-24</a></h5>
                                <!--<h5><a href="">2ND PHASE ONLINE APPLICATION FOR UG PROGRAMME 2023-24</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>24</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/332648589IMG_0001.pdf" target="_blank">GEOGRAPHY (GENERAL)
                                        PRACTICAL EXAMINATION NOTICE OF 6TH SEMESTER 2022-23</a></h5>
                                <!--<h5><a href="">GEOGRAPHY (GENERAL) PRACTICAL EXAMINATION NOTICE OF 6TH SEMESTER 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>04</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/1694265506Semester-VI_EXAM_FORM_FILL_UP%2c_2023.pdf"
                                        target="_blank">WBSU FORM FILL UP NOTICE OF SEMESTER - VI FINAL EXAMINATION
                                        2022-23</a></h5>
                                <!--<h5><a href="">WBSU FORM FILL UP NOTICE OF SEMESTER - VI FINAL EXAMINATION 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>28</span>
                                    Jun -
                                    2024
                                </div>
                                <h5><a href="uploads/1126495472UG_ONLINE_ADMISSION_NOTICE_2023-24.pdf"
                                        target="_blank">UG ONLINE ADMISSION NOTICE FOR THE SESSION 2023-2024</a></h5>
                                <!--<h5><a href="">UG ONLINE ADMISSION NOTICE FOR THE SESSION 2023-2024</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>28</span>
                                    Apr -
                                    2024
                                </div>
                                <h5><a href="uploads/1844669446EVEN_SEM_PG_FEES_NOTICE.pdf" target="_blank">M.A/M.SC
                                        EVEN SEMESTER MONTHLY FEES RELATED NOTICE OF SESSION 2022-23</a></h5>
                                <!--<h5><a href="">M.A/M.SC EVEN SEMESTER MONTHLY FEES RELATED NOTICE OF SESSION 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>28</span>
                                    Apr -
                                    2024
                                </div>
                                <h5><a href="uploads/662008874EVEN_SEM_UG_FEES_NOTICE.pdf" target="_blank">B.A/B.SC EVEN
                                        SEMESTER MONTHLY FEES RELATED NOTICE OF SESSION 2022-23</a></h5>
                                <!--<h5><a href="">B.A/B.SC EVEN SEMESTER MONTHLY FEES RELATED NOTICE OF SESSION 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>06</span>
                                    Apr -
                                    2024
                                </div>
                                <h5><a href="uploads/13988368081st_Sem_Pactical_Exam_Schedule_2023.pdf"
                                        target="_blank">1st SEMESTER CHEMISTRY PRACTICAL EXAM SCHEDULE 2022-23</a></h5>
                                <!--<h5><a href="">1st SEMESTER CHEMISTRY PRACTICAL EXAM SCHEDULE 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>20</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1726397427fees_return_0001.pdf" target="_blank">Notice for Refund
                                        Admission fees of session 2022-23</a></h5>
                                <!--<h5><a href="">Notice for Refund Admission fees of session 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>18</span>
                                    Jan -
                                    2024
                                </div>
                                <h5><a href="uploads/7074551443RD_SEMESTER_CHEMISTRY_PRACTICAL_NOTICE.pdf"
                                        target="_blank">3RD SEMESTER CHEMISTRY PRACTICAL EXAM (GENERAL) NOTICE 2023</a>
                                </h5>
                                <!--<h5><a href="">3RD SEMESTER CHEMISTRY PRACTICAL EXAM (GENERAL) NOTICE 2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>13</span>
                                    Jan -
                                    2024
                                </div>
                                <h5><a href="uploads/20138517603RD_SEM_GEOGRAPHY_PRACTICAL_EXAM_NOTICE.pdf"
                                        target="_blank">3RD SEMESTER GEOGRAPHY PRACTICAL EXAM (GENERAL) NOTICE 2023</a>
                                </h5>
                                <!--<h5><a href="">3RD SEMESTER GEOGRAPHY PRACTICAL EXAM (GENERAL) NOTICE 2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Jan -
                                    2024
                                </div>
                                <h5><a href="uploads/2078871217Notice_for_Extension_of_Form_Fill-in__without_fine__of_Semester-V__2022-23.pdf"
                                        target="_blank">EXTENSION DATE OF FORM FILL UP SEMESTER -V EXAMINATION
                                        2022-23</a></h5>
                                <!--<h5><a href="">EXTENSION DATE OF FORM FILL UP SEMESTER -V EXAMINATION 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Jan -
                                    2024
                                </div>
                                <h5><a href="uploads/253349367INTERNAL_EXAMINATION_B_Sc_(HONS_GEN)_JANUARY_2023.pdf"
                                        target="_blank">INTERNAL EXAMINATION B.Sc (HONS & GEN) JANUARY 2023</a></h5>
                                <!--<h5><a href="">INTERNAL EXAMINATION B.Sc (HONS & GEN) JANUARY 2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>27</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/1104283116Monthly_fees_for_B_A_B_Sc_1st_semester_session_2022-2023.pdf"
                                        target="_blank">MONTHLY FEES NOTICE OF 1ST SEMESTER OF SESSION 2022-2023</a>
                                </h5>
                                <!--<h5><a href="">MONTHLY FEES NOTICE OF 1ST SEMESTER OF SESSION 2022-2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>22</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/1893975990Routine_of__Semester-III__2022-23.pdf"
                                        target="_blank">FINAL EXAMINATION ROUTINE OF 3RD SEMESTER 2022-23</a></h5>
                                <!--<h5><a href="">FINAL EXAMINATION ROUTINE OF 3RD SEMESTER 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>20</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/1889696698Notice_for_Extension_of_Form_Fill-in__with_late_fine__of_semester-III__2022-23.pdf"
                                        target="_blank">EXTENSION DATE OF FORM FILL UP SEMESTER -III EXAMINATION
                                        2022-23</a></h5>
                                <!--<h5><a href="">EXTENSION DATE OF FORM FILL UP SEMESTER -III EXAMINATION 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>12</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/203945697Exam-Fees-UG-Semester-V_2022-23.pdf"
                                        target="_blank">EXAMINATION FORM FILL UP SCHEDULE OF UG 5TH SEMESTER (CBCS
                                        SYSTEM ) OF SESSION 2022-23</a></h5>
                                <!--<h5><a href="">EXAMINATION FORM FILL UP SCHEDULE OF UG 5TH SEMESTER (CBCS SYSTEM ) OF SESSION 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>05</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/1034646664Exam-Fees-UG-Semester-III_2022-23.pdf"
                                        target="_blank">EXAMINATION FORM FILL UP SCHEDULE OF UG 3RD SEMESTER (CBCS
                                        SYSTEM ) OF SESSION 2022-23</a></h5>
                                <!--<h5><a href="">EXAMINATION FORM FILL UP SCHEDULE OF UG 3RD SEMESTER (CBCS SYSTEM ) OF SESSION 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>05</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/680601418ONLINE_QUIZ_COMPETITION_12-12-22.pdf"
                                        target="_blank">ONLINE QUIZ COMPETITION on 12-12-2022</a></h5>
                                <!--<h5><a href="">ONLINE QUIZ COMPETITION on 12-12-2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>01</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/305611501-12-22%2c_435_PM_Microsoft_Lens.pdf"
                                        target="_blank">NOTICE regarding Educational Tour (Excursion) of Dept. of
                                        Education, U.G Semester-III (Hons.) students</a></h5>
                                <!--<h5><a href="">NOTICE regarding Educational Tour (Excursion) of Dept. of Education, U.G  Semester-III (Hons.) students</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>29</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/180002114Gender_Sesitisation_Prevention_of_Sexual_Harassment_at_Work_Place.pdf"
                                        target="_blank">SEMINAR on "Gender Sesitisation & Prevention of Sexual
                                        Harassment at Work Place" on 12/12/2022</a></h5>
                                <!--<h5><a href="">SEMINAR on "Gender Sesitisation & Prevention of Sexual Harassment at Work Place" on 12/12/2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>26</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/1361806753Scheduled_of_Internal_Examination.pdf"
                                        target="_blank">Scheduled of Internal Examination, B.Sc (Hons. & Gen), December
                                        2022</a></h5>
                                <!--<h5><a href="">Scheduled of Internal Examination, B.Sc (Hons. & Gen), December 2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>28</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/170037674Celebration_Constitution_Week.pdf"
                                        target="_blank">Celebration "Constitution Week" on 30/11/2022</a></h5>
                                <!--<h5><a href="">Celebration "Constitution Week" on 30/11/2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>22</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/288637873Inter_College_Kabaddi_Womens_Championship%2c_WBSU%2c_2022-23.pdf"
                                        target="_blank">Inter College Kabaddi Womens Championship, WBSU, 2022-23</a>
                                </h5>
                                <!--<h5><a href="">Inter College Kabaddi Womens Championship, WBSU, 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>21</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/1341376127UG_PG_REGISTRATION_NOTICE_2022-23.pdf"
                                        target="_blank">LAST CHANCE FOR ONLINE UG & PG REGISTRATION DATE EXTENSION
                                        NOTICE 2022-23</a></h5>
                                <!--<h5><a href="">LAST CHANCE FOR ONLINE UG & PG REGISTRATION DATE EXTENSION NOTICE 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>18</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/4784795484TH_PHASE_PG_ADMISSION_2022-23.pdf" target="_blank">4th
                                        PHASE PG ADMISSION NOTICE 2022-2023</a></h5>
                                <!--<h5><a href="">4th PHASE PG ADMISSION NOTICE 2022-2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>12</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/7262856113RD_MERIT_LIST_PG_IN_GEOGRAPHY_2022-2023.pdf"
                                        target="_blank">3RD MERIT LIST OF PG IN GEOGRAPHY</a></h5>
                                <!--<h5><a href="">3RD MERIT LIST OF PG IN GEOGRAPHY</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>12</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/851420123RD_SEM_PG_ADMISSION_NOTICE_2022-23.pdf"
                                        target="_blank">3RD SEMESTER PG ADMISSION NOTICE 2022-2023</a></h5>
                                <!--<h5><a href="">3RD SEMESTER PG ADMISSION NOTICE 2022-2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>12</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/1696475130PG_REGISTRATION_VERIFICATION_NOTICE_2022-23.pdf"
                                        target="_blank">SCHEDULE OF PG REGISTRATION VERIFICATION FOR SESSION
                                        2022-2023</a></h5>
                                <!--<h5><a href="">SCHEDULE OF PG REGISTRATION VERIFICATION FOR SESSION 2022-2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>11</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/4508831533RD_PHASE_PG_ADMISSION_NOTICE_2022-23.pdf"
                                        target="_blank">3RD PHASE PG ADMISSION NOTICE 2022-2023</a></h5>
                                <!--<h5><a href="">3RD PHASE PG ADMISSION NOTICE 2022-2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>29</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/1328338230NOTICE_FOR_EXTENSION_DATE_OF_UG-_PG_REGISTRATION_2022-23.pdf"
                                        target="_blank">NOTICE FOR EXTENSION DATE OF UG & PG REGISTRATION 2022-2023</a>
                                </h5>
                                <!--<h5><a href="">NOTICE FOR EXTENSION DATE OF UG & PG REGISTRATION 2022-2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>29</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/2109799927PG_VERIFICATION_ADMISSION_NOTICE.pdf" target="_blank">2ND
                                        PHASE PG VERIFICATION & ADMISSION NOTICE OF PG IN GEOGRAPHY (2022-2023)</a></h5>
                                <!--<h5><a href="">2ND PHASE PG VERIFICATION & ADMISSION NOTICE OF PG IN GEOGRAPHY (2022-2023)</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>28</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/450620710MODIFIED_PUJA_HOLIDAY_NOTICE.pdf" target="_blank">NOTICE
                                        FOR DURGA PUJA HOLIDAY</a></h5>
                                <!--<h5><a href="">NOTICE FOR DURGA PUJA HOLIDAY</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>21</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/8524042952nd_PHASE_PG_ADMISSION_NOTICE_2022-23.pdf"
                                        target="_blank">2ND PHASE PG ADMISSION NOTICE 2022-2023</a></h5>
                                <!--<h5><a href="">2ND PHASE PG ADMISSION NOTICE 2022-2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>26</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/13533163822nd_Merit_List_Of_PG_In_Geography.pdf"
                                        target="_blank">2ND MERIT LIST OF M.SC IN GEOGRAPHY 2022-2023</a></h5>
                                <!--<h5><a href="">2ND MERIT LIST OF M.SC IN GEOGRAPHY 2022-2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>20</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/255438132REGISTRATION_VERIFY_NOTICE.pdf" target="_blank">UG ONLINE
                                        REGISTRATION VERIFICATION OF IST SEMESTER (2022-2023)</a></h5>
                                <!--<h5><a href="">UG ONLINE REGISTRATION VERIFICATION OF IST SEMESTER (2022-2023)</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>26</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/9890319603rd_5th_Sem_Admission_Notice_2022.pdf"
                                        target="_blank">ADMISSION NOTICE FOR 3RD & 5TH SEMESTER (CBCS) FOR THE SESSION
                                        2022-23</a></h5>
                                <!--<h5><a href="">ADMISSION NOTICE FOR 3RD & 5TH SEMESTER (CBCS) FOR THE SESSION 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>20</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/11374841421ST_MERIT_LIST_PG_IN_GEOGRAPHY.pdf" target="_blank">1ST
                                        MERIT LIST OF M.SC IN GEOGRAPHY 2022-2023</a></h5>
                                <!--<h5><a href="">1ST MERIT LIST OF M.SC IN GEOGRAPHY 2022-2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>16</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/2111660814Routine_2022-23_Science_OddSem.pdf" target="_blank">CLASS
                                        ROUTINE (B.SC HONS. & GENERAL) OF ODD SEMESTER FOR THE ACADEMIC SESSION
                                        2022-23</a></h5>
                                <!--<h5><a href="">CLASS ROUTINE (B.SC HONS. & GENERAL) OF ODD SEMESTER FOR THE ACADEMIC SESSION 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>16</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/2055661152Notice_for_Form_fill-in_of_94_nos__RW_Candidates.pdf"
                                        target="_blank">NOTICE FOR FORM FILL UP FOR RW CANDIDATES OF SEM -V & SEM -VI
                                        EXAMINATION ,2022</a></h5>
                                <!--<h5><a href="">NOTICE FOR FORM FILL UP FOR RW CANDIDATES OF SEM -V & SEM -VI EXAMINATION ,2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>15</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/625466212PG_Verification_Notice_in_Geography_2022-23.pdf"
                                        target="_blank">PG VERIFICATION & ADMISSION NOTICE OF PG IN GEOGRAPHY
                                        (2022-23)</a></h5>
                                <!--<h5><a href="">PG VERIFICATION & ADMISSION NOTICE OF PG IN GEOGRAPHY (2022-23)</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>13</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/302460102education_list.pdf" target="_blank">PROVISIONAL MERIT LIST
                                        OF M.A IN EDUCATION IN SESSION 2022-23</a></h5>
                                <!--<h5><a href="">PROVISIONAL MERIT LIST OF M.A IN EDUCATION IN SESSION 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>13</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/728518965bengali_list.pdf" target="_blank">PROVISIONAL MERIT LIST
                                        OF M.A IN BENGALI IN SESSION 2022-23</a></h5>
                                <!--<h5><a href="">PROVISIONAL MERIT LIST OF M.A IN BENGALI IN SESSION 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>13</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/806035489geography_list_(1).pdf" target="_blank">PROVISIONAL MERIT
                                        LIST OF M.SC IN GEOGRAPHY IN SESSION 2022-23</a></h5>
                                <!--<h5><a href="">PROVISIONAL MERIT LIST OF M.SC IN GEOGRAPHY IN SESSION 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>13</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/1816938674fINAL_Routine_of_Odd_Sem_2022-23.pdf"
                                        target="_blank">CLASS ROUTINE (B.A ARTS) OF ODD SEMESTER FOR THE ACADEMIC
                                        SESSION 2022-23</a></h5>
                                <!--<h5><a href="">CLASS ROUTINE (B.A ARTS) OF ODD SEMESTER FOR THE ACADEMIC SESSION 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>13</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/3315050CLASS_START_NOTICE_OF_1ST_SEMESTER_2022-23.pdf"
                                        target="_blank">UG CLASS START NOTICE OF 1ST SEMESTER FOR SESSION 2022-23 </a>
                                </h5>
                                <!--<h5><a href="">UG CLASS START NOTICE OF 1ST SEMESTER FOR SESSION 2022-23 </a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>12</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/13019013722ND_PHASE_ONLINE_APPLICATION_OF_UG_COURSES_2022.pdf"
                                        target="_blank">2ND PHASE ONLINE APPLICATION FOR UG PROGRAMME 2022</a></h5>
                                <!--<h5><a href="">2ND PHASE ONLINE APPLICATION FOR UG PROGRAMME 2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>30</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/191945855PG_ADMISSION_2022-2023.pdf" target="_blank">P.G ADMISSION
                                        2022-2023</a></h5>
                                <!--<h5><a href="">P.G ADMISSION 2022-2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>29</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/2111006026Notice_for_Admission_Verification_College_ID_Card_29-08-2022.pdf"
                                        target="_blank">Notice for Admission Verification & College ID Card format
                                        29-08-2022</a></h5>
                                <!--<h5><a href="">Notice for Admission Verification & College ID Card format  29-08-2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>29</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/1162638050Notice_for_Reopenning_of_Admission_Portal.pdf"
                                        target="_blank">Notice for Re-openning of Admission Portal</a></h5>
                                <!--<h5><a href="">Notice for Re-openning of Admission Portal</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/1329598287Notice_Admission_3rd_Merit_List.pdf" target="_blank">3rd
                                        Merit List Notice 2022-2023</a></h5>
                                <!--<h5><a href="">3rd Merit List Notice 2022-2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>20</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/1716051110UG-PG-Registration-Schedule_2022-23.pdf"
                                        target="_blank">NOTIFICATION & SCHEDULE OF UG ONLINE REGISTRATION FOR THE
                                        SESSION 2022-23</a></h5>
                                <!--<h5><a href="">NOTIFICATION & SCHEDULE OF UG ONLINE REGISTRATION FOR THE SESSION 2022-23</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/916616289AECC2-1.pdf" target="_blank">ENGLISH MIL EXAMINATION
                                        QUESTION PAPER 2022</a></h5>
                                <!--<h5><a href="">ENGLISH MIL EXAMINATION QUESTION PAPER 2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>15</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/1793594768UG_ONLINE_ADMISSION_NOTICE_2022-23.pdf"
                                        target="_blank">UG ONLINE ADMISSION NOTICE 2022-2023</a></h5>
                                <!--<h5><a href="">UG ONLINE ADMISSION NOTICE 2022-2023</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>18</span>
                                    Jun -
                                    2024
                                </div>
                                <h5><a href="uploads/1757763342Exam-Fees-UG-Semester-VI-2022.pdf"
                                        target="_blank">B.A/B.SC 6TH SEMESTER EXAM FEES WBSU FINAL EXAMINATION 2022</a>
                                </h5>
                                <!--<h5><a href="">B.A/B.SC 6TH SEMESTER EXAM FEES WBSU FINAL EXAMINATION 2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>18</span>
                                    Jun -
                                    2024
                                </div>
                                <h5><a href="uploads/1318103719Exam-Fees-UG-Semester-IV-2022.pdf"
                                        target="_blank">B.A/B.SC 4TH SEMESTER EXAM FEES WBSU FINAL EXAMINATION 2022</a>
                                </h5>
                                <!--<h5><a href="">B.A/B.SC 4TH SEMESTER EXAM FEES WBSU FINAL EXAMINATION 2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>18</span>
                                    Jun -
                                    2024
                                </div>
                                <h5><a href="uploads/2039524072Exam-Fees-UG-Semester-II_2022.pdf"
                                        target="_blank">B.A/B.SC 2ND SEMESTER EXAM FEES WBSU FINAL EXAMINATION 2022</a>
                                </h5>
                                <!--<h5><a href="">B.A/B.SC 2ND SEMESTER EXAM FEES WBSU FINAL EXAMINATION 2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>10</span>
                                    Jun -
                                    2024
                                </div>
                                <h5><a href="uploads/1200084550Special_lecture_Geography_Department.pdf"
                                        target="_blank">Special lecture Organized by Geography Department</a></h5>
                                <!--<h5><a href="">Special lecture Organized by Geography Department</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>07</span>
                                    Jun -
                                    2024
                                </div>
                                <h5><a href="uploads/841785390Special_lecture_on_Feminism.pdf" target="_blank">Special
                                        lecture on Feminism</a></h5>
                                <!--<h5><a href="">Special lecture on Feminism</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    May -
                                    2024
                                </div>
                                <h5><a href="uploads/412098887INTERNAL_EXAM_SCHEDULE_OF_COMP_SC_(ECVEN_SEM)_2022.pdf"
                                        target="_blank">INTERNAL EXAMINATION SCHEDULE OF EVEN SEMESTER(2, 4 & 6 SEM) IN
                                        DEPARTMENT OF COMPUTER SCIENCE,2022</a></h5>
                                <!--<h5><a href="">INTERNAL EXAMINATION SCHEDULE OF EVEN SEMESTER(2, 4 & 6 SEM) IN DEPARTMENT OF COMPUTER SCIENCE,2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    May -
                                    2024
                                </div>
                                <h5><a href="uploads/1768443670Internal_assignment_2022_SEM-II_Hons_.pdf"
                                        target="_blank">INTERNAL EXAMINATION SCHEDULE & ASSIGNMENT OF SEMESTER -II
                                        (EDUCATION HONS.),2022</a></h5>
                                <!--<h5><a href="">INTERNAL EXAMINATION SCHEDULE & ASSIGNMENT OF SEMESTER -II (EDUCATION HONS.),2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    May -
                                    2024
                                </div>
                                <h5><a href="uploads/1325236139Internal_assignment_2022_SEM-II_General.pdf"
                                        target="_blank">INTERNAL EXAMINATION SCHEDULE & ASSIGNMENT OF SEMESTER -II
                                        (EDUCATION GENERAL),2022</a></h5>
                                <!--<h5><a href="">INTERNAL EXAMINATION SCHEDULE & ASSIGNMENT OF SEMESTER -II (EDUCATION GENERAL),2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    May -
                                    2024
                                </div>
                                <h5><a href="uploads/925085324Internal_assignment_2022_SEM-IV_General.pdf"
                                        target="_blank">INTERNAL EXAMINATION SCHEDULE & ASSIGNMENT OF SEMESTER -IV
                                        (EDUCATION GENERAL),2022</a></h5>
                                <!--<h5><a href="">INTERNAL EXAMINATION SCHEDULE & ASSIGNMENT OF SEMESTER -IV (EDUCATION GENERAL),2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    May -
                                    2024
                                </div>
                                <h5><a href="uploads/1143633848Internal_assignment_2022_SEM-IV_Hons_.pdf"
                                        target="_blank">INTERNAL EXAMINATION SCHEDULE & ASSIGNMENT OF SEMESTER -IV
                                        (EDUCATION HONS.),2022</a></h5>
                                <!--<h5><a href="">INTERNAL EXAMINATION SCHEDULE & ASSIGNMENT OF SEMESTER -IV (EDUCATION HONS.),2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    May -
                                    2024
                                </div>
                                <h5><a href="uploads/1662582543Internal_assignment_2022_SEM-VI__GE.pdf"
                                        target="_blank">INTERNAL EXAMINATION SCHEDULE & ASSIGNMENT OF SEMESTER -VI
                                        (EDUCATION - GE),2022</a></h5>
                                <!--<h5><a href="">INTERNAL EXAMINATION SCHEDULE & ASSIGNMENT OF SEMESTER -VI (EDUCATION - GE),2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    May -
                                    2024
                                </div>
                                <h5><a href="uploads/1859041505Internal_assignment_2022SEM-VI__DSE.pdf"
                                        target="_blank">INTERNAL EXAMINATION SCHEDULE & ASSIGNMENT OF SEMESTER -VI
                                        (EDUCATION - DSC),2022</a></h5>
                                <!--<h5><a href="">INTERNAL EXAMINATION SCHEDULE & ASSIGNMENT OF SEMESTER -VI (EDUCATION - DSC),2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    May -
                                    2024
                                </div>
                                <h5><a href="uploads/502878325Internal_assignment_2022_SEM-VI_Hons_.pdf"
                                        target="_blank">INTERNAL EXAMINATION SCHEDULE & ASSIGNMENT OF SEMESTER -VI
                                        (EDUCATION HONS.),2022</a></h5>
                                <!--<h5><a href="">INTERNAL EXAMINATION SCHEDULE & ASSIGNMENT OF SEMESTER -VI (EDUCATION HONS.),2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>13</span>
                                    May -
                                    2024
                                </div>
                                <h5><a href="uploads/1112621088NOTICE_REGARDING_OFFLINE_CLASSES.pdf"
                                        target="_blank">NOTICE REGARDING OFFLINE CLASSES</a></h5>
                                <!--<h5><a href="">NOTICE REGARDING OFFLINE CLASSES</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>29</span>
                                    Apr -
                                    2024
                                </div>
                                <h5><a href="uploads/1726503860PG_2ND_SEM_ADMISSION_NOTICE_2021-22.pdf"
                                        target="_blank">PG 2ND SEM ADMISSION NOTICE 2021-22</a></h5>
                                <!--<h5><a href="">PG 2ND SEM ADMISSION NOTICE 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>29</span>
                                    Apr -
                                    2024
                                </div>
                                <h5><a href="uploads/1101058740PG_4TH_SEM_EDUCATION_ADMISSION_NOTICE_2021-22.pdf"
                                        target="_blank">PG 4TH SEM EDUCATION ADMISSION NOTICE 2021-22</a></h5>
                                <!--<h5><a href="">PG 4TH SEM EDUCATION ADMISSION NOTICE 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>29</span>
                                    Apr -
                                    2024
                                </div>
                                <h5><a href="uploads/1808708610PG_4TH_SEM_BENGALI_GEOGRAPHY_ADMISSION_NOTICE_2021-22.pdf"
                                        target="_blank">PG 4TH SEM BENGALI & GEOGRAPHY ADMISSION NOTICE 2021-22</a></h5>
                                <!--<h5><a href="">PG 4TH SEM BENGALI & GEOGRAPHY ADMISSION NOTICE 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>13</span>
                                    Apr -
                                    2024
                                </div>
                                <h5><a href="uploads/189858837Emailing_Holiday_Notice.pdf" target="_blank">HOLIDAY
                                        NOTICE</a></h5>
                                <!--<h5><a href="">HOLIDAY NOTICE</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Apr -
                                    2024
                                </div>
                                <h5><a href="uploads/951403984Emailing_Refund_Admission_Fee_Notice.pdf" target="_blank">
                                        Notice for Refund admission fee of session 2021-22</a></h5>
                                <!--<h5><a href=""> Notice for Refund admission fee of session 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>06</span>
                                    Apr -
                                    2024
                                </div>
                                <h5><a href="uploads/2123400467ADMISSION_MONTHLY_FEES_NOTICE_OF_2ND_%2c_4TH_6TH_SEMESTER.pdf"
                                        target="_blank">ADMISSION & MONTHLY FEES NOTICE OF 2ND , 4TH & 6TH SEMESTER OF
                                        SESSION 2021-2022</a></h5>
                                <!--<h5><a href="">ADMISSION & MONTHLY FEES NOTICE OF 2ND , 4TH & 6TH SEMESTER OF SESSION 2021-2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>22</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/718978327Class_Start_Notice_2nd_Sem.pdf" target="_blank">CLASS
                                        OPENING NOTICE OF 2022</a></h5>
                                <!--<h5><a href="">CLASS OPENING NOTICE OF  2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>01</span>
                                    Jan -
                                    2024
                                </div>
                                <h5><a href="uploads/524460592Confirmation_letter_of_SACT_20220321_0001.pdf"
                                        target="_blank">Approval of engagement of State Aided College Teacher(s),
                                        Category-I and Category-II</a></h5>
                                <!--<h5><a href="">Approval of engagement of State Aided College Teacher(s), Category-I and Category-II</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/493593888ENVS.pdf" target="_blank">NOTICE FOR 1ST SEMESTER FINAL
                                        EXAMINATION 2022 REGARDING ENVIRONMENTAL SCIENCE EXAM.</a></h5>
                                <!--<h5><a href="">NOTICE FOR 1ST SEMESTER FINAL EXAMINATION 2022 REGARDING ENVIRONMENTAL SCIENCE EXAM.</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>28</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1892302721UG_CBCS_Sem-I_Form_fill_in_date_extention.pdf"
                                        target="_blank">UG CBCS FORM FILL UP DATE EXTENSION NOTICE OF 1ST SEMESTER FINAL
                                        EXAMINATION OF 2021-22</a></h5>
                                <!--<h5><a href="">UG CBCS FORM FILL UP DATE EXTENSION NOTICE OF 1ST SEMESTER FINAL EXAMINATION OF 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1522794711SEM-I_GENERAL_EXAM_2022.pdf" target="_blank">E-MAIL
                                        CREATE FOR ANSWER SCRIPT SUBMISSION OF 1ST SEMESTER EDUCATION (GENERAL) FINAL
                                        EXAMINATION 2022</a></h5>
                                <!--<h5><a href="">E-MAIL CREATE FOR ANSWER SCRIPT SUBMISSION OF 1ST SEMESTER EDUCATION (GENERAL) FINAL EXAMINATION 2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1106590818EXAM-2022_HONNOURS_SEM-_I.pdf" target="_blank">E-MAIL
                                        CREATE FOR ANSWER SCRIPT SUBMISSION OF 1ST SEMESTER EDUCATION (HONOURS) FINAL
                                        EXAMINATION 2022</a></h5>
                                <!--<h5><a href="">E-MAIL CREATE FOR ANSWER SCRIPT SUBMISSION OF  1ST SEMESTER EDUCATION (HONOURS) FINAL EXAMINATION 2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>19</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/731704515BA_ROUTINE.pdf" target="_blank">B.A CLASS ROUTINE OF EVEN
                                        SEMESTER 2022</a></h5>
                                <!--<h5><a href="">B.A CLASS ROUTINE OF EVEN SEMESTER 2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>19</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1879599856ROUTINE.pdf" target="_blank">B.SC CLASS ROUTINE OF EVEN
                                        SEMESTER 2022</a></h5>
                                <!--<h5><a href="">B.SC CLASS ROUTINE OF EVEN SEMESTER 2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>19</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1745111417CLASS_NOTICE_20220219_0001.pdf" target="_blank">CLASS
                                        OPENING NOTICE OF EVEN SEMESTER, 2022</a></h5>
                                <!--<h5><a href="">CLASS OPENING NOTICE OF EVEN SEMESTER, 2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>08</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1090012639Exam-Fees-CBCS_UG_Semester-I_2021-22.pdf"
                                        target="_blank">EXAMINATION FORM FILL UP SCHEDULE OF UG 1ST SEMESTER (CBCS
                                        SYSTEM ) OF SESSION 2021-22</a></h5>
                                <!--<h5><a href="">EXAMINATION FORM FILL UP SCHEDULE OF UG  1ST SEMESTER (CBCS SYSTEM ) OF SESSION 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>04</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/705856440Practical_examination_schedule__1_.pdf"
                                        target="_blank">3RD & 5TH SEMESTER ONLINE PRACTICAL EXAM SCHEDULE IN DEPARTMENT
                                        OF GEOGRAPHY , 2022</a></h5>
                                <!--<h5><a href="">3RD & 5TH SEMESTER ONLINE PRACTICAL EXAM SCHEDULE IN DEPARTMENT OF GEOGRAPHY , 2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>04</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1129662905PRACTICAL_EXAM_SCHEDULE.pdf" target="_blank">3RD & 5TH
                                        SEMESTER ONLINE PRACTICAL EXAM SCHEDULE IN DEPARTMENT OF EDUCATION , 2022</a>
                                </h5>
                                <!--<h5><a href="">3RD & 5TH SEMESTER ONLINE PRACTICAL EXAM SCHEDULE IN DEPARTMENT OF EDUCATION , 2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>31</span>
                                    Jan -
                                    2024
                                </div>
                                <h5><a href="uploads/71838309511T.pdf" target="_blank">3RD SEMESTER QUESTION PAPER OF
                                        M.SC IN GEOGRAPHY OF SESSION 2021-2022</a></h5>
                                <!--<h5><a href="">3RD SEMESTER QUESTION PAPER OF M.SC IN GEOGRAPHY OF SESSION 2021-2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>18</span>
                                    Jan -
                                    2024
                                </div>
                                <h5><a href="uploads/401450503New_email_ID.pdf" target="_blank">E-MAIL CREATE OF
                                        DEPARTMENT OF EDUCATION FOR ANSWER SCRIPT SUBMISSION OF I/III/V SEMESTER FINAL
                                        EXAMINATION 2021-22</a></h5>
                                <!--<h5><a href="">E-MAIL CREATE OF DEPARTMENT OF EDUCATION FOR ANSWER SCRIPT SUBMISSION OF I/III/V SEMESTER FINAL EXAMINATION 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    Jan -
                                    2024
                                </div>
                                <h5><a href="uploads/754663664Notice_for_Extension_of_Form_Fill-in_of_semester-III___V__2022.pdf"
                                        target="_blank">NOTICE FOR EXTENSION OF FORM FILL UP IN SEMESTER -III & SEMESTER
                                        -V FINAL EXAMINATION, 2022</a></h5>
                                <!--<h5><a href="">NOTICE FOR EXTENSION OF FORM FILL UP IN SEMESTER -III & SEMESTER -V FINAL EXAMINATION, 2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    Jan -
                                    2024
                                </div>
                                <h5><a href="uploads/906042286NOTICE_FOR_ADMIT_CORRECTION.pdf" target="_blank">NOTICE
                                        FOR ADMIT CORRECTION OF SEMESTER -III & V FINAL EXAMINATION 2022</a></h5>
                                <!--<h5><a href="">NOTICE FOR ADMIT CORRECTION OF SEMESTER -III & V FINAL EXAMINATION 2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    Jan -
                                    2024
                                </div>
                                <h5><a href="uploads/603699166Examination_Guidelines_2021-22.pdf"
                                        target="_blank">EXAMINATION GUIDELINES FOR UG FINAL EXAMINATION (CBCS) OF
                                        SEMESTER III & SEMESTER V, 2021-2022</a></h5>
                                <!--<h5><a href="">EXAMINATION GUIDELINES FOR UG  FINAL EXAMINATION (CBCS) OF SEMESTER III & SEMESTER V, 2021-2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    Jan -
                                    2024
                                </div>
                                <h5><a href="uploads/1517882500Routine_of_semester_-V__2022.pdf" target="_blank">ROUTINE
                                        OF SEMESTER - V FINAL EXAMINATION 2022</a></h5>
                                <!--<h5><a href="">ROUTINE OF SEMESTER - V FINAL EXAMINATION 2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    Jan -
                                    2024
                                </div>
                                <h5><a href="uploads/488574820Routine_of_semester_-III__2022.pdf"
                                        target="_blank">ROUTINE OF SEMESTER - III FINAL EXAMINATION 2022</a></h5>
                                <!--<h5><a href="">ROUTINE OF SEMESTER - III FINAL EXAMINATION 2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>22</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/755477739Document_(28).pdf" target="_blank">Notice for Internal
                                        Examination Bengali</a></h5>
                                <!--<h5><a href="">Notice for Internal Examination Bengali</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>22</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/1324150157Document_(4).pdf" target="_blank">Notice for Internal
                                        Examination Bengali</a></h5>
                                <!--<h5><a href="">Notice for Internal Examination Bengali</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>16</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/296733125Exam-Fees-UG-Semester-V_2022.pdf" target="_blank">B.A/B.SC
                                        5TH SEMESTER UG FINAL EXAMINATION NOTICE 2021-22</a></h5>
                                <!--<h5><a href="">B.A/B.SC 5TH SEMESTER UG FINAL EXAMINATION NOTICE 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>16</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/240528453Exam-Fees-UG-Semester-III_2022.pdf"
                                        target="_blank">B.A/B.SC 3RD SEMESTER UG FINAL EXAMINATION NOTICE 2021-22</a>
                                </h5>
                                <!--<h5><a href="">B.A/B.SC 3RD SEMESTER UG FINAL EXAMINATION NOTICE 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>18</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/423947579EDUCATION.pdf" target="_blank">DEPARTMENT OF EDUCATION
                                    </a></h5>
                                <!--<h5><a href="">DEPARTMENT OF EDUCATION </a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>06</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/1133795337Kaagaz_20211206_083758917563.pdf" target="_blank">CLASS
                                        SUSPENDED NOTICE OF UG (BOTH HONS. & GENERAL) IN TODAY [06/12/2021] </a></h5>
                                <!--<h5><a href="">CLASS SUSPENDED NOTICE OF UG (BOTH HONS. & GENERAL) IN TODAY [06/12/2021] </a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>05</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/568488834SCHEDULE_OF_INTERNALODD2021.pdf" target="_blank">INTERNAL
                                        ASSESSMENT EXAM SCHEDULE OF DEPARTMENT OF COMPUTER SCIENCE (CC/DSC/GE ) IN
                                        1ST,3rd & 5TH SEMESTER,2021</a></h5>
                                <!--<h5><a href="">INTERNAL ASSESSMENT EXAM SCHEDULE OF DEPARTMENT OF COMPUTER SCIENCE (CC/DSC/GE ) IN 1ST,3rd & 5TH SEMESTER,2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/780331524Add_On_Course_in_Comp_Sc.pdf" target="_blank">ADD ON
                                        COURSE NOTICE OF DEPARTMENT IN COMPUTER SCIENCE</a></h5>
                                <!--<h5><a href="">ADD ON COURSE NOTICE OF DEPARTMENT IN COMPUTER SCIENCE</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/732300434Add_on_Course_in_Dept__of_Geography.pdf"
                                        target="_blank">ADD ON COURSE NOTICE OF DEPARTMENT IN GEOGRAPHY</a></h5>
                                <!--<h5><a href="">ADD ON COURSE NOTICE OF DEPARTMENT IN GEOGRAPHY</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/901095569INTERNAL_EXAM_5TH_SEM_HONS_%2cDECEMBER_2021.pdf"
                                        target="_blank">INTERNAL ASSESSMENT EXAM SCHEDULE OF GEOGRAPHY DEPT. (GEOGRAPHY
                                        - HONS.) IN 5TH SEMESTER, 2021-2022</a></h5>
                                <!--<h5><a href="">INTERNAL ASSESSMENT EXAM SCHEDULE OF GEOGRAPHY DEPT. (GEOGRAPHY - HONS.) IN 5TH SEMESTER, 2021-2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/1620646950INTERNAL_EXAM_5TH_SEM_GEN%2c_DECEMBER_2021.pdf"
                                        target="_blank">INTERNAL ASSESSMENT EXAM SCHEDULE OF GEOGRAPHY DEPT. (GEOGRAPHY
                                        - DSC/GE ) IN 5TH SEMESTER, 2021-2022</a></h5>
                                <!--<h5><a href="">INTERNAL ASSESSMENT EXAM SCHEDULE OF GEOGRAPHY DEPT. (GEOGRAPHY - DSC/GE ) IN 5TH SEMESTER, 2021-2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/1002626719INTERNAL_EXAM_3RD_SEM_HONS_%2cDECEMBER_2021.pdf"
                                        target="_blank">INTERNAL ASSESSMENT EXAM SCHEDULE OF GEOGRAPHY DEPT. (GEOGRAPHY
                                        - HONS. ) IN 3RD SEMESTER,2021-2022</a></h5>
                                <!--<h5><a href="">INTERNAL ASSESSMENT EXAM SCHEDULE OF GEOGRAPHY DEPT. (GEOGRAPHY - HONS. ) IN 3RD SEMESTER,2021-2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/314394281INTERNAL_EXAM_3RD_SEM_GEN%2c_DECEMBER_2021.pdf"
                                        target="_blank">INTERNAL ASSESSMENT EXAM SCHEDULE OF GEOGRAPHY DEPT. (GEOGRAPHY
                                        - DSC/GE ) IN 3RD SEMESTER,2021-2022</a></h5>
                                <!--<h5><a href="">INTERNAL ASSESSMENT EXAM SCHEDULE OF GEOGRAPHY DEPT. (GEOGRAPHY - DSC/GE ) IN 3RD SEMESTER,2021-2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/93143725INTERNAL_EXAM_1ST_SEM_GEN%2cDECEMBER_2021.pdf"
                                        target="_blank">INTERNAL ASSESSMENT EXAM SCHEDULE OF GEOGRAPHY DEPT. (GEOGRAPHY
                                        - DSC/GE ) IN 1ST SEMESTER,2021-2022</a></h5>
                                <!--<h5><a href="">INTERNAL ASSESSMENT EXAM SCHEDULE OF GEOGRAPHY DEPT. (GEOGRAPHY - DSC/GE ) IN 1ST SEMESTER,2021-2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/1785529997INTERNAL_EXAM_1ST_SEM_HONS%2cDECEMBER_2021.pdf"
                                        target="_blank">INTERNAL ASSESSMENT EXAM SCHEDULE OF GEOGRAPHY DEPT. IN
                                        GEOGRAPHY (HONS.) 1ST SEMESTER, (2021-22)</a></h5>
                                <!--<h5><a href="">INTERNAL ASSESSMENT EXAM SCHEDULE OF GEOGRAPHY DEPT. IN GEOGRAPHY (HONS.) 1ST SEMESTER, (2021-22)</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/1462113250ADMISSION_NOTICE_ODD_SEM_20211203_0001.pdf"
                                        target="_blank">ADMISSION NOTICE OF 3RD & 5TH SEMESTER (CBCS SYSTEM) & MONTHLY
                                        FEES OF 1ST SEMESTER, 2021-2022</a></h5>
                                <!--<h5><a href="">ADMISSION NOTICE OF 3RD & 5TH SEMESTER (CBCS SYSTEM) & MONTHLY FEES OF 1ST SEMESTER, 2021-2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/282842228notice_add_on_course.pdf" target="_blank">ADD-ON courses
                                        of B.A/B.Sc both Hons and General</a></h5>
                                <!--<h5><a href="">ADD-ON courses of B.A/B.Sc both Hons and General</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/1183329470CLASSES_SUSPEND_NOTICE_20211202_0001.pdf"
                                        target="_blank">NOTICE OF SUSPEND OF CLASSES ON 04.12.2021 AFTER 1.00 PM</a>
                                </h5>
                                <!--<h5><a href="">NOTICE OF SUSPEND OF CLASSES ON 04.12.2021 AFTER 1.00 PM</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/458924381IMG_20211123_0002.pdf" target="_blank">New NAAC Awareness
                                        conference on 27th November 2021</a></h5>
                                <!--<h5><a href="">New NAAC Awareness conference on 27th November 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/1836001873IMG_20211123_0001.pdf" target="_blank">CLASS SUSPEND
                                        NOTICE</a></h5>
                                <!--<h5><a href="">CLASS SUSPEND NOTICE</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>15</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/615778365BSC_CLASS_ROUTINE_2021.pdf" target="_blank">FINAL CLASS
                                        ROUTINE OF B.SC (CC/GE/DSC) IN ODD SEMESTER 2021-22</a></h5>
                                <!--<h5><a href="">FINAL CLASS ROUTINE OF B.SC (CC/GE/DSC) IN ODD SEMESTER 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>15</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/1079244499BA_FINAL_CLASS_ROUTINE_2021.pdf" target="_blank">FINAL
                                        CLASS ROUTINE OF B.A (CC/GE/DSC) IN ODD SEMESTER 2021-22</a></h5>
                                <!--<h5><a href="">FINAL CLASS ROUTINE OF B.A (CC/GE/DSC) IN ODD SEMESTER 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>11</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/301937522Kaagaz_20211111_161528646496.pdf" target="_blank">NOTICE
                                        OF OPENING CLASSES of ODD SEMESTER 2021</a></h5>
                                <!--<h5><a href="">NOTICE OF OPENING CLASSES of ODD SEMESTER 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/2057218222PG_Registration_Notice.pdf" target="_blank">PG
                                        REGISTRATION VERIFICATION NOTICE OF SESSION 2021-22</a></h5>
                                <!--<h5><a href="">PG REGISTRATION VERIFICATION NOTICE OF SESSION 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>08</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/418883382REGISTRATION_SCHEDULE_NOTICE.pdf" target="_blank">FINAL
                                        REGISTRATION VERIFICATION SCHEDULE NOTICE OF UG B.A/B.SC (HONS. & GENERAL) OF
                                        SESSION 2021-2022</a></h5>
                                <!--<h5><a href="">FINAL REGISTRATION VERIFICATION SCHEDULE NOTICE OF UG B.A/B.SC (HONS. & GENERAL) OF SESSION 2021-2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>05</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/1198643298holiday_notice_20211005_0001.pdf" target="_blank">HOLIDAY
                                        NOTICE</a></h5>
                                <!--<h5><a href="">HOLIDAY NOTICE</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>05</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/1634478695online_form_fillup.pdf" target="_blank">UG ONLINE FORM
                                        FILL UP</a></h5>
                                <!--<h5><a href="">UG ONLINE FORM FILL UP</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>01</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/1522492572Holiday_Notice_20211001_0001.pdf" target="_blank">HOLIDAY
                                        NOTICE</a></h5>
                                <!--<h5><a href="">HOLIDAY NOTICE</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>30</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/1204644388VACCINATION_DATA.pdf" target="_blank">NOTICE FOR
                                        VACCINATION</a></h5>
                                <!--<h5><a href="">NOTICE FOR VACCINATION</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>29</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/1047335379VERIFICATION_OF_GENERAL_STUDENTS.pdf"
                                        target="_blank">NOTICE FOR ADMISSION VERIFICATION OF B.A / B.SC ALL GENERAL
                                        SUBJECTS 2021-2022</a></h5>
                                <!--<h5><a href="">NOTICE FOR ADMISSION VERIFICATION OF B.A / B.SC  ALL GENERAL SUBJECTS 2021-2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>29</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/222517398VERIFICATION_OF_HONOURS_STUDENTS.pdf"
                                        target="_blank">NOTICE FOR ADMISSION VERIFICATION OF B.A / B.SC ALL HONOURS
                                        SUBJECTS 2021-2022</a></h5>
                                <!--<h5><a href="">NOTICE FOR ADMISSION VERIFICATION OF B.A / B.SC  ALL HONOURS SUBJECTS 2021-2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>29</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/1880744858Notice_for_Online_Classes.pdf" target="_blank">Notice for
                                        Online Classes</a></h5>
                                <!--<h5><a href="">Notice for Online Classes</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>28</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/857897506English_(Hons_).pdf" target="_blank">RE-OPENING UNDER
                                        GRADUATE ONLINE APPLICATION PORTAL FOR ENGLISH (HONS.) 2021-22</a></h5>
                                <!--<h5><a href="">RE-OPENING UNDER GRADUATE ONLINE APPLICATION PORTAL FOR ENGLISH (HONS.) 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>27</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/1660825348pg_application.pdf" target="_blank">RE-OPENING POST
                                        GRADUATE ONLINE APPLICATION PORTAL OF MA IN BENGALI 2021-22</a></h5>
                                <!--<h5><a href="">RE-OPENING POST GRADUATE ONLINE APPLICATION PORTAL OF MA IN BENGALI  2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>24</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/621615173FINAL_2ND_SELECTION_MERIT_LIST_GEOGRAPHY.pdf"
                                        target="_blank">2ND MERIT LIST PUBLISHED PG IN GEOGRAPHY, 2021</a></h5>
                                <!--<h5><a href="">2ND MERIT LIST PUBLISHED PG IN GEOGRAPHY, 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>24</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/19644470782ND_SELECTION_MERIT_LIST_EDUCATION.pdf"
                                        target="_blank">2ND MERIT LIST PUBLISHED PG IN EDUCATION, 2021</a></h5>
                                <!--<h5><a href="">2ND MERIT LIST PUBLISHED PG IN EDUCATION, 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/272570194IMG_20210923_0001.pdf" target="_blank">Re-opening UG
                                        On-line form Fillup Portal 2021</a></h5>
                                <!--<h5><a href="">Re-opening UG On-line form Fillup Portal 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>21</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/592607629class_notice.pdf" target="_blank">B.A/B.Sc (Hons &
                                        General) Classes notice of 3rd Semester & 5th Semester, 2021</a></h5>
                                <!--<h5><a href="">B.A/B.Sc (Hons & General) Classes notice of 3rd Semester & 5th Semester, 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>20</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/12281035081ST_SELECTION_MERIT_LIST_GEOGRAPHY.pdf"
                                        target="_blank">1ST MERIT LIST PUBLISHED PG IN GEOGRAPHY 2021-22</a></h5>
                                <!--<h5><a href="">1ST MERIT LIST PUBLISHED PG IN GEOGRAPHY 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>20</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/14009554131ST_SELECTION_MERIT_LIST_EDUCATION.pdf"
                                        target="_blank">1ST MERIT LIST PUBLISHED PG IN EDUCATION 2021-22</a></h5>
                                <!--<h5><a href="">1ST MERIT LIST PUBLISHED PG IN EDUCATION 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>20</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/17629490831ST_SELECTION_MERIT_LIST_BENGALI.pdf" target="_blank">1ST
                                        MERIT LIST PUBLISHED PG IN BENGALI 2021-22</a></h5>
                                <!--<h5><a href="">1ST MERIT LIST PUBLISHED PG IN BENGALI 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>16</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/1415930048UG-PG_Registration_Schedule_2021-22.pdf"
                                        target="_blank">WBSU UG & PG REGISTRATION SCHEDULE NOTICE 2021-22</a></h5>
                                <!--<h5><a href="">WBSU UG & PG REGISTRATION SCHEDULE NOTICE 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>16</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/1370452362IMG_20210916_0001.pdf" target="_blank">PG ADMISSION
                                        NOTICE 2021-22</a></h5>
                                <!--<h5><a href="">PG ADMISSION NOTICE 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>16</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/1738259147UG_ADMISSION_NOTICE_repeat.pdf" target="_blank">LAST
                                        CHANCE FOR UG ADMISSION NOTICE OF HONOURS COURSES 2021</a></h5>
                                <!--<h5><a href="">LAST CHANCE FOR UG ADMISSION NOTICE OF HONOURS COURSES 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>15</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/469504047IMG_20210915_0002.pdf" target="_blank">ADMISSION
                                        NOTICE</a></h5>
                                <!--<h5><a href="">ADMISSION NOTICE</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/1172457278IMG_20210915_0001.pdf" target="_blank">Re-constitute The
                                        Governing Body of Teaching Staff Including librarian , Election Notice 2021</a>
                                </h5>
                                <!--<h5><a href="">Re-constitute The Governing Body  of Teaching Staff Including librarian , Election Notice 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/227670627NOTICE_OF_NTS_GB_20210915_0001.pdf"
                                        target="_blank">Re-constitute The Governing Body of Non-Teaching Staff, Election
                                        Notice 2021</a></h5>
                                <!--<h5><a href="">Re-constitute The Governing Body of Non-Teaching Staff, Election Notice 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>06</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/602695473PG_Notice.pdf" target="_blank">INFORMATION REGARDING PG
                                        ONLINE ADMISSION 2021-22</a></h5>
                                <!--<h5><a href="">INFORMATION REGARDING PG ONLINE ADMISSION 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>06</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/454110028admission_notice.pdf" target="_blank">ADMISSION NOTICE</a>
                                </h5>
                                <!--<h5><a href="">ADMISSION NOTICE</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>31</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/255137470PG_ADMISSION_NOTICE_2021-22.pdf" target="_blank">PG
                                        ADMISSION NOTICE 2021 -22</a></h5>
                                <!--<h5><a href="">PG ADMISSION NOTICE 2021 -22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>22</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/61483983REVISED_SCHEDULE_UG_ADMISSION_NOTICE_2021.pdf"
                                        target="_blank">REVISED SCHEDULE OF U.G ADMISSION 2021-2022</a></h5>
                                <!--<h5><a href="">REVISED SCHEDULE OF U.G ADMISSION 2021-2022</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>21</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a
                                        href="site/single_notice/extention-of-date-for-application-of-ug-admission-notice-for-the-session-2021-22.html">EXTENTION
                                        OF DATE FOR APPLICATION OF UG ADMISSION NOTICE FOR THE SESSION 2021-22</a></h5>
                                <!--<h5><a href="">EXTENTION OF DATE FOR APPLICATION OF UG ADMISSION NOTICE FOR THE SESSION 2021-22</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>10</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/1468660125GUIDELINES__FOR_SEMESTER-VI_2021.pdf"
                                        target="_blank">Guidelines for CBCS Exam of Semester - VI, 2021 </a></h5>
                                <!--<h5><a href="">Guidelines for CBCS Exam of Semester - VI, 2021 </a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/1365294500Departmental_Emails.pdf" target="_blank">Departmental
                                        Emails</a></h5>
                                <!--<h5><a href="">Departmental Emails</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>10</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/1293016046Notice_for_Extension_of_Form_Fill-in_of_semester-II___IV__2021.pdf"
                                        target="_blank">Notice of the Extension of Form fill up of Semester- II &
                                        Semester-IV,2021</a></h5>
                                <!--<h5><a href="">Notice of the Extension of Form fill up of Semester- II & Semester-IV,2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>29</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/1987367079IMPORTANT_NOTICE_20210729_0001.pdf"
                                        target="_blank">IMPORTANT NOTICE REGARDING FEES REDUCE</a></h5>
                                <!--<h5><a href="">IMPORTANT NOTICE REGARDING FEES REDUCE</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>27</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/683402558Exam-Fees-UG-Semester-VI-2021.pdf" target="_blank">WBSU
                                        Exam-Fees-UG-Semester-VI_2021</a></h5>
                                <!--<h5><a href="">WBSU Exam-Fees-UG-Semester-VI_2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>27</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/357487158Exam-Fees-UG-Semester-IV-2021.pdf" target="_blank">WBSU
                                        Exam-Fees-UG-Semester-IV_2021</a></h5>
                                <!--<h5><a href="">WBSU Exam-Fees-UG-Semester-IV_2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>27</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/1999026343Exam-Fees-UG-Semester-II_2021.pdf" target="_blank">WBSU
                                        Exam-Fees-UG-Semester-II_2021</a></h5>
                                <!--<h5><a href="">WBSU Exam-Fees-UG-Semester-II_2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>26</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/884255566FEES_NOTICE_EVEN_SEMESTER_web.pdf" target="_blank">REVISED
                                        FEES COLLECTION NOTICE OF EVEN SEMESTER (2ND/4TH/ 6TH) 2021</a></h5>
                                <!--<h5><a href="">REVISED FEES COLLECTION NOTICE OF EVEN SEMESTER (2ND/4TH/ 6TH) 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/1503641398Dates_of_Part_1__2__3_backlog_practical_and_sem_2__4__6_practical_viva_dates.pdf"
                                        target="_blank">FINAL PRACTICAL EXAM SCHEDULE OF PART II & PART III
                                        SUPPLEMENTARY EXAM AND DATES FOR SEM 2, 4, 6 ONLINE VIVA FOR GEOGRAPHY
                                        DEPARTMENT</a></h5>
                                <!--<h5><a href="">FINAL PRACTICAL EXAM SCHEDULE OF PART II & PART III SUPPLEMENTARY EXAM AND DATES FOR  SEM 2, 4, 6 ONLINE VIVA FOR GEOGRAPHY DEPARTMENT</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/1340342199FEES_NOTICE_EVEN_SEMESTER_web.pdf" target="_blank">FEES
                                        COLLECTION NOTICE OF EVEN SEMESTER (2ND/4TH/ 6TH) 2021</a></h5>
                                <!--<h5><a href="">FEES COLLECTION NOTICE OF EVEN SEMESTER (2ND/4TH/ 6TH) 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/1006283251UG_ADMISSION_NOTICE_2021.pdf" target="_blank">ADMISSION
                                        NOTICE 2021</a></h5>
                                <!--<h5><a href="">ADMISSION NOTICE 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>12</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/711924673schedule_for_practical_comp_sc.pdf"
                                        target="_blank">PRACTICAL EXAM SCHEDULE OF COMPUTER SCIENCE DEPT., 2021</a></h5>
                                <!--<h5><a href="">PRACTICAL EXAM SCHEDULE OF COMPUTER SCIENCE DEPT., 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/20116662382201_ENGLCOR02T_L__4.pdf"
                                        target="_blank">2201_ENGLCOR02T_L_ 4</a></h5>
                                <!--<h5><a href="">2201_ENGLCOR02T_L_ 4</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/17908196802131_PHIHGEC02T_PHIGCOR02T_L_2.pdf"
                                        target="_blank">2131_PHIHGEC02T_PHIGCOR02T_L_2</a></h5>
                                <!--<h5><a href="">2131_PHIHGEC02T_PHIGCOR02T_L_2</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/15152805752122_HISHGEC02T_HISGCOR02T_L_2.pdf"
                                        target="_blank">2122_HISHGEC02T_HISGCOR02T_L_2</a></h5>
                                <!--<h5><a href="">2122_HISHGEC02T_HISGCOR02T_L_2</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/14037441502120_GEOHGEC02T_GEOGCOR02T_L_3.pdf"
                                        target="_blank">2120_GEOHGEC02T_GEOGCOR02T_L_3</a></h5>
                                <!--<h5><a href="">2120_GEOHGEC02T_GEOGCOR02T_L_3</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/10307744922113_ENGHGEC02T_ENGGCOR02T_L_1.pdf"
                                        target="_blank">2113_ENGHGEC02T_ENGGCOR02T_L_1</a></h5>
                                <!--<h5><a href="">2113_ENGHGEC02T_ENGGCOR02T_L_1</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/4580458622104_BNGHGEC02T_BNGGCOR02T_L_2.pdf"
                                        target="_blank">2104_BNGHGEC02T_BNGGCOR02T_L_2</a></h5>
                                <!--<h5><a href="">2104_BNGHGEC02T_BNGGCOR02T_L_2</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/18966252622069_HISACOR04T_L_2.pdf"
                                        target="_blank">2069_HISACOR04T_L_2</a></h5>
                                <!--<h5><a href="">2069_HISACOR04T_L_2</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/655211042067_GEOACOR04T_L_2.pdf"
                                        target="_blank">2067_GEOACOR04T_L_2</a></h5>
                                <!--<h5><a href="">2067_GEOACOR04T_L_2</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/3463611262064_ENGACOR04T_L_2.pdf"
                                        target="_blank">2064_ENGACOR04T_L_2</a></h5>
                                <!--<h5><a href="">2064_ENGACOR04T_L_2</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/1695701292062_EDCACOR04T_L_2.pdf"
                                        target="_blank">2062_EDCACOR04T_L_2</a></h5>
                                <!--<h5><a href="">2062_EDCACOR04T_L_2</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/4187824762057_BNGACOR04T_L_1.pdf"
                                        target="_blank">2057_BNGACOR04T_L_1</a></h5>
                                <!--<h5><a href="">2057_BNGACOR04T_L_1</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/14303260502029_PLSACOR03T_L_2.pdf"
                                        target="_blank">2029_PLSACOR03T_L_2</a></h5>
                                <!--<h5><a href="">2029_PLSACOR03T_L_2</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/14978415562026_PHIACOR03T_L_2.pdf"
                                        target="_blank">2026_PHIACOR03T_L_2</a></h5>
                                <!--<h5><a href="">2026_PHIACOR03T_L_2</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/6402199832019_HISACOR03T_L_2.pdf"
                                        target="_blank">2019_HISACOR03T_L_2</a></h5>
                                <!--<h5><a href="">2019_HISACOR03T_L_2</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/9978473812017_GEOACOR03T_L_2.pdf"
                                        target="_blank">2017_GEOACOR03T_L_2</a></h5>
                                <!--<h5><a href="">2017_GEOACOR03T_L_2</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/18171355542014_ENGACOR03T_L_2.pdf"
                                        target="_blank">2014_ENGACOR03T_L_2</a></h5>
                                <!--<h5><a href="">2014_ENGACOR03T_L_2</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>08</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/17917999Anindita_Education.pdf" target="_blank">2ND SEMESTER
                                        INTERNAL ASSESSMENT QUESTION PAPER OF EDUCATION (DSE/GE)</a></h5>
                                <!--<h5><a href="">2ND SEMESTER INTERNAL ASSESSMENT QUESTION PAPER OF EDUCATION (DSE/GE)</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>05</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/582510912Guidelines_for_Supplementary_Exam_2021.pdf"
                                        target="_blank">Guidelines for Supplementary Exam of Semester -I to V, 2021</a>
                                </h5>
                                <!--<h5><a href="">Guidelines for Supplementary Exam of Semester -I to V, 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>05</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/1094119253099_PLSA-VII.pdf" target="_blank">PART-III POLSCIENCE
                                        QUESTION PAPER, 2021</a></h5>
                                <!--<h5><a href="">PART-III POLSCIENCE QUESTION PAPER, 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>05</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/12435721103088_PHIA-VII.pdf" target="_blank">PART-III PHILOSOPHY
                                        QUESTION PAPER,2021</a></h5>
                                <!--<h5><a href="">PART-III PHILOSOPHY QUESTION PAPER,2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>05</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/1921379553068_HISA-VII.pdf" target="_blank">PART-III HISTORY
                                        QUESTION PAPER, 2021</a></h5>
                                <!--<h5><a href="">PART-III HISTORY QUESTION PAPER, 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>05</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/19249244093046_EDCA-VII.pdf" target="_blank">PART-III EDUCATION
                                        QUESTION PAPER, 2021</a></h5>
                                <!--<h5><a href="">PART-III EDUCATION QUESTION PAPER, 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>05</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/1651064411625461537670_3022_BNGA-VII.pdf" target="_blank">PART-III
                                        BENGALI QUESTION PAPER, 2021</a></h5>
                                <!--<h5><a href="">PART-III BENGALI QUESTION PAPER, 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/396525897WBSU_SUPPLE_ROUTINE__CBCS__SEMESTER-I_II_III_IV___V__2021.pdf"
                                        target="_blank">WBSU SUPPLEMENTARY EXAMINATION SCHEDULE OF SEMESTER I TO
                                        SEMESTER V (CBCS), 2021</a></h5>
                                <!--<h5><a href="">WBSU SUPPLEMENTARY EXAMINATION SCHEDULE OF SEMESTER I TO SEMESTER V (CBCS), 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/18452708971083_PHIA-I.pdf" target="_blank">PART-I PHILOSOPHY
                                        QUESTION PAPER 2021</a></h5>
                                <!--<h5><a href="">PART-I PHILOSOPHY QUESTION PAPER 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/4911553711092_PLSA-I.pdf" target="_blank">PART-I POL SCIENCE
                                        QUESTION PAPER 2021</a></h5>
                                <!--<h5><a href="">PART-I POL SCIENCE QUESTION PAPER 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/17406793101054_GEOA-I.pdf" target="_blank">PART-I GEOGRAPHY
                                        QUESTION PAPER 2021</a></h5>
                                <!--<h5><a href="">PART-I GEOGRAPHY QUESTION PAPER 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/14852097561039_EDCA-I.pdf" target="_blank">PART-I EDUCATION
                                        QUESTION PAPER 2021</a></h5>
                                <!--<h5><a href="">PART-I EDUCATION QUESTION PAPER 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/8596799331060_HISA-I.pdf" target="_blank">PART-I HISTORY QUESTION
                                        PAPER 2021</a></h5>
                                <!--<h5><a href="">PART-I HISTORY QUESTION PAPER 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/2260792791017_BNGA-I.pdf" target="_blank">PART-I BENGALI QUESTION
                                        PAPER 2021</a></h5>
                                <!--<h5><a href="">PART-I BENGALI QUESTION PAPER 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/9919827653086_PHIA-V.pdf" target="_blank">PART-III PHILOSOPHY
                                        QUESTION PAPER 2021</a></h5>
                                <!--<h5><a href="">PART-III PHILOSOPHY QUESTION PAPER 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/9267419863050_ENGA-V.pdf" target="_blank">PART-III ENGLISH QUESTION
                                        PAPER 2021</a></h5>
                                <!--<h5><a href="">PART-III ENGLISH QUESTION PAPER 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/2210150273097_PLSA-V.pdf" target="_blank">PART-III POL.SC QUESTION
                                        PAPER 2021</a></h5>
                                <!--<h5><a href="">PART-III POL.SC QUESTION PAPER 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/710648843060_GEOA-V.pdf" target="_blank">PART-III GEOGRAPHY
                                        QUESTION PAPER 2021</a></h5>
                                <!--<h5><a href="">PART-III GEOGRAPHY QUESTION PAPER 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/13409513363066_HISA-V.pdf" target="_blank">PART-III HISTORY
                                        QUESTION PAPER 2021</a></h5>
                                <!--<h5><a href="">PART-III HISTORY QUESTION PAPER 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/11248835083044_EDCA-V.pdf" target="_blank">PART-III EDUCATION
                                        QUESTION PAPER 2021</a></h5>
                                <!--<h5><a href="">PART-III EDUCATION QUESTION PAPER 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/3337044983020_BNGA-V.pdf" target="_blank">PART-III BENGALI QUESTION
                                        PAPER 2021</a></h5>
                                <!--<h5><a href="">PART-III BENGALI QUESTION PAPER 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>30</span>
                                    Jun -
                                    2024
                                </div>
                                <h5><a href="uploads/50086039SCHEDULE_FOR_INTERNAL_COMP.pdf" target="_blank">INTERNAL
                                        EXAM SCHEDULE OF COMPUTER SCIENCE DEPT. IN EVEN SEMESTER,2021</a></h5>
                                <!--<h5><a href="">INTERNAL EXAM SCHEDULE OF COMPUTER SCIENCE DEPT. IN EVEN SEMESTER,2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>29</span>
                                    Jun -
                                    2024
                                </div>
                                <h5><a href="uploads/2017943396General_Guidline_for_PART-III_I_Exam_2021.pdf"
                                        target="_blank">General Guideline for PART-III & I Exam 2021 (Old Syllabus)</a>
                                </h5>
                                <!--<h5><a href="">General Guideline for PART-III  & I  Exam  2021 (Old Syllabus)</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>22</span>
                                    Jun -
                                    2024
                                </div>
                                <h5><a href="uploads/2061952595EDCA_notice.pdf" target="_blank">NOTICE OF THE
                                        SUPPLEMENTARY EXAM, 2021 IN EDUCATION DEPARTMENT</a></h5>
                                <!--<h5><a href="">NOTICE OF THE SUPPLEMENTARY EXAM, 2021 IN EDUCATION DEPARTMENT</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>18</span>
                                    Jun -
                                    2024
                                </div>
                                <h5><a href="uploads/644775654INTERNAL_ASSESSMENT_SCHEDULE_OF_GEO.pdf"
                                        target="_blank">INTERNAL ASSESSMENT EXAM SCHEDULE OF GEOGRAPHY DEPT. IN EVEN
                                        SEMESTER,2021</a></h5>
                                <!--<h5><a href="">INTERNAL ASSESSMENT EXAM SCHEDULE OF GEOGRAPHY DEPT. IN EVEN SEMESTER,2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>04</span>
                                    Jun -
                                    2024
                                </div>
                                <h5><a href="uploads/1613350241WBSU_Notice_CBCS_SEM-II__IV___VI_Exam__2021.pdf"
                                        target="_blank">WBSU EXAMINATION NOTICE OF SEMESTER II,IV & VI (CBCS), 2021</a>
                                </h5>
                                <!--<h5><a href="">WBSU  EXAMINATION NOTICE OF SEMESTER II,IV & VI (CBCS), 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Jun -
                                    2024
                                </div>
                                <h5><a href="uploads/387383194Notice_for_Supplementary_Examination_2021_revised.pdf"
                                        target="_blank">WBSU SUPPLEMENTARY EXAMINATION NOTICE OF SEMESTER I TO SEMESTER
                                        V (CBCS), 2021</a></h5>
                                <!--<h5><a href="">WBSU SUPPLEMENTARY EXAMINATION NOTICE OF SEMESTER I TO SEMESTER V (CBCS), 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>22</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/306218148URGENT_NOTICE_.pdf" target="_blank">RE-OPENING OF FORM
                                        FILL UP PORTAL BA / B.Sc</a></h5>
                                <!--<h5><a href="">RE-OPENING OF FORM FILL UP PORTAL BA /  B.Sc</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>19</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/764256086Routine_of_Semester_I.pdf" target="_blank">FINAL
                                        EXAMINATION ROUTINE OF SEMESTER -I EXAMINATION , 2021</a></h5>
                                <!--<h5><a href="">FINAL EXAMINATION ROUTINE OF SEMESTER -I EXAMINATION , 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>18</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/5426435023232_PHSHGEC03T_PHSGCOR03T_L_3.pdf"
                                        target="_blank">3232_PHSHGEC03T_PHSGCOR03T_L_3</a></h5>
                                <!--<h5><a href="">3232_PHSHGEC03T_PHSGCOR03T_L_3</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>17</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/512872827Reopen_Sem-I_form.pdf" target="_blank">RE-OPENING 1ST
                                        SEMESTER FINAL EXAMINATION FORM FILL UP 2021</a></h5>
                                <!--<h5><a href="">RE-OPENING 1ST SEMESTER FINAL EXAMINATION  FORM FILL UP 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>15</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/2122097664NOTICE_20210315_0001.pdf" target="_blank">RE,GISTRATION
                                        NOTICE</a></h5>
                                <!--<h5><a href="">RE,GISTRATION NOTICE</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>15</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/3520287673014_ENGACOR05T_L_1.pdf"
                                        target="_blank">3014_ENGACOR05T_L_1 2021</a></h5>
                                <!--<h5><a href="">3014_ENGACOR05T_L_1 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>15</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/914421153012_EDCACOR05T_L_2.pdf"
                                        target="_blank">3012_EDCACOR05T_L_2 2021</a></h5>
                                <!--<h5><a href="">3012_EDCACOR05T_L_2 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>15</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/15154432123010_CMSACOR05T_L_2.pdf"
                                        target="_blank">3010_CMSACOR05T_L_2</a></h5>
                                <!--<h5><a href="">3010_CMSACOR05T_L_2</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>15</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/16149122413009_CEMACOR05T_L_3.pdf"
                                        target="_blank">3009_CEMACOR05T_L_3</a></h5>
                                <!--<h5><a href="">3009_CEMACOR05T_L_3</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>15</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/15332215343007_BNGACOR05T_L_3.pdf"
                                        target="_blank">3007_BNGACOR05T_L_3 2021</a></h5>
                                <!--<h5><a href="">3007_BNGACOR05T_L_3 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>12</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/259972872GENERAL_GUIDELINES_FOR_SEM-III___V_2021_(1).pdf"
                                        target="_blank">GENERAL GUIDELINES OF EXAM OF SEMESTER-III & SEMESTER-V
                                        ,2021</a></h5>
                                <!--<h5><a href="">GENERAL GUIDELINES OF EXAM OF SEMESTER-III & SEMESTER-V ,2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>13</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/10395715753304_ENGMCOR01T_L_2_(MIL).pdf" target="_blank">3RD
                                        SEMESTER ALTERNATIVE QUESTION PAPER (MIL) OF ENGM 2021</a></h5>
                                <!--<h5><a href="">3RD SEMESTER ALTERNATIVE QUESTION PAPER (MIL) OF ENGM 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>13</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/6099938643301_BNGLCOR01T_L_1_(MIL).pdf" target="_blank">3RD
                                        SEMESTER ALTERNATIVE QUESTION PAPER (MIL) OF BNGM 2021</a></h5>
                                <!--<h5><a href="">3RD SEMESTER ALTERNATIVE QUESTION PAPER (MIL)  OF BNGM 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>11</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/786444475INTERNAL_ASSESSMENT_-_2021.pdf" target="_blank">INTERNAL
                                        ASSESSMENT , SEM -I , EDUCATION GENERAL (DSC/GE)</a></h5>
                                <!--<h5><a href="">INTERNAL ASSESSMENT , SEM -I , EDUCATION GENERAL (DSC/GE)</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>10</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/787325918NOTICE_FOR_FINAL_EXAM_Education_Dept.pdf"
                                        target="_blank">FINAL EXAMINATION NOTICE OF SEMESTER-III & SEMESTER-V</a></h5>
                                <!--<h5><a href="">FINAL EXAMINATION NOTICE OF SEMESTER-III & SEMESTER-V</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>05</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/1607039886Re-Opening_of_the_Form_fill-in_of_Sem-III___V_2021.pdf"
                                        target="_blank">REOPENING OF THE EXAMINATION FORM FILL UP OF SEMESTER-III &
                                        SEMESTER-V, 2021</a></h5>
                                <!--<h5><a href="">REOPENING OF THE EXAMINATION FORM FILL UP OF SEMESTER-III & SEMESTER-V, 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>24</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1250919531Sem-III_V_Form_Fill-in_Extension_of_Date.pdf"
                                        target="_blank">DATE OF EXTENSION NOTICE REGARDING FINAL EXAM FORM FILL UP OF
                                        SEMESTER-III & SEMESTER-V 2020-21</a></h5>
                                <!--<h5><a href="">DATE OF EXTENSION NOTICE REGARDING FINAL EXAM FORM FILL UP OF SEMESTER-III & SEMESTER-V 2020-21</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>27</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/491335275Semester_I_Fee_Structure_2020-21.pdf"
                                        target="_blank">SEMESTER -I FINAL EXAMINATION FEES STRUCTURE 2020-21</a></h5>
                                <!--<h5><a href="">SEMESTER -I FINAL EXAMINATION FEES STRUCTURE 2020-21</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>27</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/896713576Routine_of_Semester_V.pdf" target="_blank">ROUTINE OF
                                        B.A/B.SC SEMESTER-V FINAL EXAMINATION (CBCS SYSTEM) 2020-21</a></h5>
                                <!--<h5><a href="">ROUTINE OF B.A/B.SC SEMESTER-V FINAL EXAMINATION (CBCS SYSTEM) 2020-21</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>27</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1159361108Routine_of_Semester_III.pdf" target="_blank">ROUTINE OF
                                        B.A/B.SC SEMESTER-III FINAL EXAMINATION (CBCS SYSTEM) 2020-21</a></h5>
                                <!--<h5><a href="">ROUTINE OF B.A/B.SC SEMESTER-III FINAL EXAMINATION (CBCS SYSTEM) 2020-21</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>27</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/771598301Routine_of_Semester_I.pdf" target="_blank">ROUTINE OF
                                        B.A/B.SC SEMESTER-I FINAL EXAMINATION(CBCS SYSTEM) 2020-21</a></h5>
                                <!--<h5><a href="">ROUTINE OF B.A/B.SC SEMESTER-I FINAL EXAMINATION(CBCS SYSTEM) 2020-21</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1696099669SCHEDULE_FOR_INTERNAL_EXAM_1ST_SEM_HONS_(1).pdf"
                                        target="_blank">1ST SEMESTER INTERNAL ASSESSMENT EXAM NOTICE OF GEOGRAPHY
                                        (HONS.)</a></h5>
                                <!--<h5><a href="">1ST SEMESTER INTERNAL ASSESSMENT EXAM NOTICE OF GEOGRAPHY (HONS.)</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/608816851SCHEDULE_FOR_INTERNAL_EXAM_1ST_SEM_GEN.pdf"
                                        target="_blank">1ST SEMESTER INTERNAL ASSESSMENT EXAM NOTICE OF GEOGRAPHY
                                        (GENERAL)</a></h5>
                                <!--<h5><a href="">1ST SEMESTER INTERNAL ASSESSMENT EXAM NOTICE OF GEOGRAPHY (GENERAL)</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>18</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1264373536Document_(4)_(1).pdf" target="_blank">BENGALI INTERNAL
                                        ASSESSMENT QUESTION PAPER 2021</a></h5>
                                <!--<h5><a href="">BENGALI INTERNAL ASSESSMENT QUESTION PAPER 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>18</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1074476442New_Doc_02-17-2021_22_24_46.pdf" target="_blank">BENGALI
                                        INTERNAL ASSESSMENT QUESTION PAPER 2021</a></h5>
                                <!--<h5><a href="">BENGALI INTERNAL ASSESSMENT QUESTION PAPER 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>13</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1138779790Exam-Fees-UG-Semester-V_2021.pdf"
                                        target="_blank">B.A/B.SC WBSU EXAM FEES OF SEMESTER -V (UG)FORM FILL UP NOTICE
                                        2021</a></h5>
                                <!--<h5><a href="">B.A/B.SC WBSU EXAM FEES OF SEMESTER -V (UG)FORM FILL UP NOTICE 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>13</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1963914090Exam-Fees-UG-Semester-III_2021.pdf"
                                        target="_blank">B.A/B.SC WBSU EXAM FEES OF SEMESTER -III (UG)FORM FILL UP NOTICE
                                        2021</a></h5>
                                <!--<h5><a href="">B.A/B.SC WBSU EXAM FEES OF SEMESTER -III (UG)FORM FILL UP NOTICE 2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/620787645notice_20210212_0001.pdf" target="_blank">INTERNAL
                                        ASSE,SSMENTT NOTICE OF EDUCATTON DEPARTMENT</a></h5>
                                <!--<h5><a href="">INTERNAL ASSE,SSMENTT NOTICE OF EDUCATTON DEPARTMENT</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>10</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1705562243InternalAssessmentQuestionsGeneral-1.pdf"
                                        target="_blank">INTERNAL ASSESSMENT QUESTION PAPER OF ENGLISH (GENERAL) FOR 3RD
                                        SEMESTER & 5TH SEMESTER ,2020-21</a></h5>
                                <!--<h5><a href="">INTERNAL ASSESSMENT QUESTION PAPER OF ENGLISH (GENERAL) FOR 3RD SEMESTER & 5TH SEMESTER ,2020-21</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>10</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/912942407InternalAssessmentQuestionsHons-1.pdf"
                                        target="_blank">INTERNAL ASSESSMENT QUESTION PAPER OF ENGLISH (HONS.) FOR 3RD
                                        SEMESTER & 5TH SEMESTER ,2020-21</a></h5>
                                <!--<h5><a href="">INTERNAL ASSESSMENT QUESTION PAPER OF ENGLISH (HONS.) FOR 3RD SEMESTER & 5TH SEMESTER ,2020-21</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>11</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1708143688CC-6.pdf" target="_blank">QUESTION PAPER CC-6</a></h5>
                                <!--<h5><a href="">QUESTION PAPER CC-6</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>11</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/1043956007CC-5.pdf" target="_blank">QUESTION PAPER CC-5</a></h5>
                                <!--<h5><a href="">QUESTION PAPER CC-5</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/659848280ROUTINE_OF_BA_HONS_GENERAL_BENGALI_3RD_5TH_SEM_20210209_0001.pdf"
                                        target="_blank">ROUTINE OF BA HONS & GENERAL BENGALI 3RD & 5TH SEM</a></h5>
                                <!--<h5><a href="">ROUTINE OF BA HONS & GENERAL BENGALI 3RD & 5TH SEM</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Feb -
                                    2024
                                </div>
                                <h5><a href="uploads/646953226PROJECT_NOTICE_FOR_3RD_SEM_BOTH_HONOURS_GENERAL_20210209_0001.pdf"
                                        target="_blank">PROJECT NOTICE FOR 3RD SEM BOTH HONOURS & GENERAL</a></h5>
                                <!--<h5><a href="">PROJECT NOTICE FOR 3RD SEM BOTH HONOURS & GENERAL</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>22</span>
                                    Jan -
                                    2024
                                </div>
                                <h5><a href="uploads/1331985056SCHEDULE_FOR_INTERNAL_EXAM_GEO_III_V.pdf"
                                        target="_blank">INTERNAL EXAMINATION SCHEDULE NOTICE OF SEMESTER - III & V IN
                                        GEOGRAPHY (CC, DSC & GE) </a></h5>
                                <!--<h5><a href="">INTERNAL EXAMINATION SCHEDULE NOTICE OF SEMESTER - III & V IN GEOGRAPHY (CC, DSC & GE) </a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>27</span>
                                    Jan -
                                    2024
                                </div>
                                <h5><a href="uploads/176729443URGENT_NOTICE2_TO_6_TH_SEM_ADMISSION.pdf"
                                        target="_blank">URGENT NOTICE2 TO 6 TH SEM ADMISSION</a></h5>
                                <!--<h5><a href="">URGENT NOTICE2 TO 6 TH SEM ADMISSION</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>31</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/1653192185TIME_TABLE_20-21_FINAL2.pdf" target="_blank">ARTS ROUTINE
                                        2020-2021</a></h5>
                                <!--<h5><a href="">ARTS ROUTINE 2020-2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>31</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/2019092429MASTER_ROUTINE_OF_SCIENCE2020.pdf"
                                        target="_blank">SCIENCE ROUTINE 2020-2021</a></h5>
                                <!--<h5><a href="">SCIENCE ROUTINE 2020-2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>31</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/509872223NOTICE.pdf" target="_blank">IMPORTANT NOTICE</a></h5>
                                <!--<h5><a href="">IMPORTANT NOTICE</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>30</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/239914301MIL_Examination.pdf" target="_blank">English/ MIL: Second
                                        Semester 2020</a></h5>
                                <!--<h5><a href="">English/ MIL: Second Semester 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>30</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/664737361AECC_-_MIL_-_BENGALI.pdf"
                                        target="_blank">AECC-MIL-BENGALI</a></h5>
                                <!--<h5><a href="">AECC-MIL-BENGALI</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>15</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/427395954DEPARTMENTAL_EMAIL_ID_SEM_II_IV.pdf"
                                        target="_blank">BENGALI SEM II & IV DEPARTMENTAL EMAIL ID</a></h5>
                                <!--<h5><a href="">BENGALI SEM II & IV DEPARTMENTAL EMAIL ID</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/48265874pg_online_reg_2020-21.pdf" target="_blank">UNIVERSITY POST
                                        GRADUATE ONLINE REGISTRATION 2020-2021</a></h5>
                                <!--<h5><a href="">UNIVERSITY POST GRADUATE ONLINE REGISTRATION 2020-2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>11</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/1002036719notice.pdf" target="_blank">ANSWER SCRIPT SUBMISSION OF
                                        SEM -II & SEM-IV EXAM ,2020 DEPARTMENT OF EDUCATION , GEOGRAPHY & HISTORY
                                        (DEPARTMENTAL EMAIL ID)</a></h5>
                                <!--<h5><a href="">ANSWER SCRIPT SUBMISSION OF SEM -II & SEM-IV EXAM ,2020 DEPARTMENT OF EDUCATION , GEOGRAPHY & HISTORY (DEPARTMENTAL EMAIL ID)</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>12</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/1639019304Guideline_for_CBCS_Sem-II___Sem-IV_Exam_2020.pdf"
                                        target="_blank">GUIDELINES OF B.A/B.SC UG SEMESTER-II & SEMESTER -IV (CBCS)
                                        EXAMINATION 2020</a></h5>
                                <!--<h5><a href="">GUIDELINES OF B.A/B.SC UG SEMESTER-II & SEMESTER -IV (CBCS) EXAMINATION 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>11</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/2027399416Sem-II___sem-IV_Form_fill-in_Notice.pdf"
                                        target="_blank">LAST TIME OF EXAMINATION FORM FILL UP OF UG B.A/B.SC SEMESTER
                                        -II & SEMESTER-IV EXAMINATION, 2020</a></h5>
                                <!--<h5><a href="">LAST TIME OF EXAMINATION FORM FILL UP OF UG B.A/B.SC SEMESTER -II & SEMESTER-IV EXAMINATION, 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/1431988990NOTICE.pdf" target="_blank">ADMISSION Verification F'OR
                                        REGISTRATION WBSU 2O2O-21</a></h5>
                                <!--<h5><a href="">ADMISSION Verification F'OR REGISTRATION WBSU 2O2O-21</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>07</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/798949533WBSU_ROUTINE__CBCS_SEM-II___IV_2020.pdf"
                                        target="_blank">B.A/B.SC WBSU SEMESTER -II & SEMESTER-IV (CBCS SYSTEM)
                                        EXAMINATION SCHEDULE 2020</a></h5>
                                <!--<h5><a href="">B.A/B.SC WBSU SEMESTER -II & SEMESTER-IV (CBCS SYSTEM) EXAMINATION SCHEDULE 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>04</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/2064164507EDUCATION_DEPARTMENT_NOTICE.pdf"
                                        target="_blank">EDUCATION DEPARTMENT NOTICE FOR SUBMISSION OF LAB NOTE BOOK</a>
                                </h5>
                                <!--<h5><a href="">EDUCATION DEPARTMENT NOTICE FOR SUBMISSION OF LAB NOTE BOOK</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>04</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/198347292UG_Online_Registration__2020_extended.pdf"
                                        target="_blank">UG B.A/B.SC (HONS & GENERAL) REGISTRATION EXTENSION DATE &
                                        VERIFICATION NOTICE 2020-2021</a></h5>
                                <!--<h5><a href="">UG B.A/B.SC (HONS & GENERAL) REGISTRATION EXTENSION DATE & VERIFICATION NOTICE 2020-2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/790286685student_list_education.pdf" target="_blank">2ND MERIT LIST
                                        OF M.A IN EDUCATION 2020</a></h5>
                                <!--<h5><a href="">2ND MERIT LIST OF M.A IN EDUCATION 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/2101942689student_list_bengali_PG.pdf" target="_blank">2ND MERIT
                                        LIST OF M.A IN BENGALI</a></h5>
                                <!--<h5><a href="">2ND MERIT LIST OF M.A IN BENGALI</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/16930509992nd_Merit_List_geography.pdf" target="_blank">2ND MERIT
                                        LIST OF PG IN GEOGRAPHY 2020-21</a></h5>
                                <!--<h5><a href="">2ND MERIT LIST OF PG IN GEOGRAPHY 2020-21</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/660321750Sem-II_IV_Form_Fill-in-_Extension_of_Date_(1).pdf"
                                        target="_blank">Sem-II & IV Form Fill-in- Extension of Date </a></h5>
                                <!--<h5><a href="">Sem-II & IV Form Fill-in- Extension of Date </a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/1545152096SEM-II_MIL_English_Communication_2020.pdf"
                                        target="_blank">WBSU SEMESTER -II ENGLISH MIL COMMUNICATION EXAMINATION NOTICE,
                                        2020</a></h5>
                                <!--<h5><a href="">WBSU SEMESTER -II ENGLISH MIL COMMUNICATION EXAMINATION NOTICE, 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/506764521Notice_Geo_pract__sem_2_sem_4_2020_-_Copy.pdf"
                                        target="_blank">GEOGRAPHY PRACTICAL EXAM NOTICE FOR SEM-II & SEM-IV,2020</a>
                                </h5>
                                <!--<h5><a href="">GEOGRAPHY PRACTICAL EXAM NOTICE FOR SEM-II & SEM-IV,2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/2034768515Part-I_Notice_for_Compulsory_Bengali___English_2020.pdf"
                                        target="_blank">PART- I EXAMINATION NOTICE FOR COMPULSORY BENGALI & ENGLISH
                                        2020</a></h5>
                                <!--<h5><a href="">PART- I EXAMINATION NOTICE FOR COMPULSORY BENGALI & ENGLISH 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/767328478WBSU_Notice_CBCS_SEM-II___SEM-IV_l_Exam__2020.pdf"
                                        target="_blank">WBSU EXAM NOTICE CBCS SEMESTER -II & SEMESTER-IV, 2020</a></h5>
                                <!--<h5><a href="">WBSU EXAM NOTICE CBCS SEMESTER -II & SEMESTER-IV, 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/963877081092_PLSA-I_L_3.pdf" target="_blank">B.A. Honours Part-I
                                        Examination, 2020 PAPER-PLSA-I</a></h5>
                                <!--<h5><a href="">B.A. Honours Part-I Examination, 2020 PAPER-PLSA-I</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/2772101921086_PHSA-I_L_2.pdf" target="_blank">B.A. Honours Part-I
                                        Examination, 2020 PAPER-PHSA-I</a></h5>
                                <!--<h5><a href="">B.A. Honours Part-I Examination, 2020 PAPER-PHSA-I</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/17767154381083_PHIA-I_L_2.pdf" target="_blank">B.A. Honours Part-I
                                        Examination, 2020 PAPER-PHIA-I</a></h5>
                                <!--<h5><a href="">B.A. Honours Part-I Examination, 2020 PAPER-PHIA-I</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Dec -
                                    2024
                                </div>
                                <h5><a href="uploads/14354905071076_MTMA-I_L_3.pdf" target="_blank">B.A. Honours Part-I
                                        Examination, 2020 PAPER-MTMA-I</a></h5>
                                <!--<h5><a href="">B.A. Honours Part-I Examination, 2020 PAPER-MTMA-I</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>28</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/2131313339NOTICE_PART-I_GUIDELINES_(ENGLISH).pdf"
                                        target="_blank">GUIDELINES OF B.A/B.SC UG PART-I (HONS & GEN)EXAMINATION
                                        2020</a></h5>
                                <!--<h5><a href="">GUIDELINES OF B.A/B.SC UG PART-I (HONS & GEN)EXAMINATION 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>28</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/2081489742HOLIDAY_NOTICE_30_11_2020.pdf" target="_blank">HOLIDAY
                                        NOTICE GURU NANAK BIRTHDAY </a></h5>
                                <!--<h5><a href="">HOLIDAY NOTICE GURU NANAK BIRTHDAY </a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>26</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/480924807PG_NOTICE_20201126_0001.pdf" target="_blank">PG ADMISSION
                                        DATE EXTENSION NOTICE 2020 </a></h5>
                                <!--<h5><a href="">PG ADMISSION DATE EXTENSION NOTICE 2020  </a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/1881286720Geography_OBC-B.pdf" target="_blank">PG 1ST MERIT LIST OF
                                        GEOGRAPHY (CATEGORY - OBC-B) 2020</a></h5>
                                <!--<h5><a href="">PG 1ST MERIT LIST OF GEOGRAPHY (CATEGORY - OBC-B) 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/185922719Geography_OBC-A.pdf" target="_blank">PG 1ST MERIT LIST OF
                                        GEOGRAPHY (CATEGORY - OBC-A) 2020</a></h5>
                                <!--<h5><a href="">PG 1ST MERIT LIST OF GEOGRAPHY (CATEGORY - OBC-A) 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/1998929316Geography_SC.pdf" target="_blank">PG 1ST MERIT LIST OF
                                        GEOGRAPHY (CATEGORY - SC) 2020</a></h5>
                                <!--<h5><a href="">PG 1ST MERIT LIST OF GEOGRAPHY (CATEGORY - SC) 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/1256252579Geography_UR.pdf" target="_blank">PG 1ST MERIT LIST OF
                                        GEOGRAPHY (CATEGORY - GENERAL) 2020</a></h5>
                                <!--<h5><a href="">PG 1ST MERIT LIST OF GEOGRAPHY (CATEGORY - GENERAL) 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/649068734Education_OBC-B.pdf" target="_blank">PG 1ST MERIT LIST OF
                                        EDUCATION (CATEGORY - OBC-B) 2020</a></h5>
                                <!--<h5><a href="">PG 1ST MERIT LIST OF EDUCATION (CATEGORY - OBC-B) 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/1870186778Education_OBC-A.pdf" target="_blank">PG 1ST MERIT LIST OF
                                        EDUCATION (CATEGORY - OBC-A) 2020</a></h5>
                                <!--<h5><a href="">PG 1ST MERIT LIST OF EDUCATION (CATEGORY - OBC-A) 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/2057136908Education_SC.pdf" target="_blank">PG 1ST MERIT LIST OF
                                        EDUCATION (CATEGORY - SC) 2020</a></h5>
                                <!--<h5><a href="">PG 1ST MERIT LIST OF EDUCATION (CATEGORY - SC) 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/1964737052Education_UR.pdf" target="_blank">PG 1ST MERIT LIST OF
                                        EDUCATION (CATEGORY - GENERAL) 2020</a></h5>
                                <!--<h5><a href="">PG 1ST MERIT LIST OF EDUCATION (CATEGORY - GENERAL) 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/879837551Bengali_UR.pdf" target="_blank">PG 1ST MERIT LIST OF
                                        BENGALI 2020</a></h5>
                                <!--<h5><a href="">PG 1ST MERIT LIST OF BENGALI 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/2111148024U_G_BENGALI_2ND_SEMESTER_4TH_SEMESTER_INTERNAL_EXAMINATION_2020.pdf"
                                        target="_blank">U.G BENGALI 2ND SEMESTER & 4TH SEMESTER INTERNAL EXAMINATION
                                        2020</a></h5>
                                <!--<h5><a href="">U.G BENGALI 2ND SEMESTER & 4TH SEMESTER INTERNAL EXAMINATION 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/1568781595NOTICE_FOR_PG_1ST_SEMESTER_ADMISSION_2020.pdf"
                                        target="_blank">NOTICE FOR POST GRADUATE COURSES 1ST SEMESTER ADMISSION 2020</a>
                                </h5>
                                <!--<h5><a href="">NOTICE FOR POST GRADUATE COURSES 1ST SEMESTER ADMISSION 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/1758103646INTERNAL_ASSESSMENT_NOTICE_20201123_0001.pdf"
                                        target="_blank">INTERNAL ASSESSMENT NOTICE REGARDING OF 2ND SEMESTER & 4TH
                                        SEMESTER 2020 </a></h5>
                                <!--<h5><a href="">INTERNAL ASSESSMENT NOTICE REGARDING OF 2ND SEMESTER & 4TH SEMESTER 2020 </a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>18</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/1303052689GEOGRAPHY_INTERNAL_ASSESSMENT%2cSEM_II_AND_SEM_IV_UG.pdf"
                                        target="_blank">B.SC GEOGRAPHY SEMESTER - II & SEMESTER -IV (HONS. & GENERAL)
                                        INTERNAL ASSESSMENT EXAM SCHEDULE 2020</a></h5>
                                <!--<h5><a href="">B.SC GEOGRAPHY SEMESTER - II & SEMESTER -IV (HONS. & GENERAL) INTERNAL ASSESSMENT EXAM SCHEDULE 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>20</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/1217975120INTERNAL_NOTICE_20201121_0001.pdf"
                                        target="_blank">INTERNAL ASSESSMENT NOTICE FOR SEMESTER -II & SEMESTER
                                        -IV,2020</a></h5>
                                <!--<h5><a href="">INTERNAL ASSESSMENT NOTICE FOR SEMESTER -II & SEMESTER -IV,2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>17</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/644937939pg_inf_20201121_0001.pdf" target="_blank">PG ADMISSION
                                        NOTICE & INFORMATION 2020-2021</a></h5>
                                <!--<h5><a href="">PG ADMISSION NOTICE & INFORMATION 2020-2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>20</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/156329743WBSU_ROUTINE__PART-I-%2c2020.pdf" target="_blank">B.A/B.SC
                                        FINAL PART- I EXAMINATION ROUTINE 2020</a></h5>
                                <!--<h5><a href="">B.A/B.SC FINAL PART- I EXAMINATION ROUTINE 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>19</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/222087523Exam-Fees-UG-Semester-II_2020.pdf"
                                        target="_blank">B.A/B.SC 2ND SEMESTER EXAM FEES WBSU FINAL EXAMINATION 2020</a>
                                </h5>
                                <!--<h5><a href="">B.A/B.SC 2ND SEMESTER EXAM FEES  WBSU FINAL EXAMINATION 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>18</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/263353796NOTICE.pdf" target="_blank">IMPORTANT NOTICE</a></h5>
                                <!--<h5><a href="">IMPORTANT NOTICE</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>18</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/1411244048All_Principals_%2c_Sem-_II_IV.pdf"
                                        target="_blank">IMPORTANT NOTICE</a></h5>
                                <!--<h5><a href="">IMPORTANT NOTICE</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>15</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/1161015928WBSU_CBCS_Semester_II_IV_Tentative_Schedule_2020.pdf"
                                        target="_blank">WBSU CBCS Semester II & IV Tentative Schedule 2020</a></h5>
                                <!--<h5><a href="">WBSU CBCS Semester II & IV Tentative Schedule 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>12</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/2043645556Part-I_Form_Fill_2020_in_2nd_time.pdf"
                                        target="_blank">B.A/B.SC PART- I (HONS. & GENERAL) 2ND TIME FINAL EXAMINATION
                                        FORM FILL UP 2020</a></h5>
                                <!--<h5><a href="">B.A/B.SC PART- I (HONS. & GENERAL) 2ND TIME FINAL EXAMINATION FORM FILL UP 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>10</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/429320888PART_-II_Casual_PRACTICAL_EXAM_2020.pdf"
                                        target="_blank">B.A/B.SC PART - II GEOGRAPHY HONS. (CASUAL) FINAL PRACTICAL
                                        EXAMINATION SCHEDULE, 2020</a></h5>
                                <!--<h5><a href="">B.A/B.SC PART - II GEOGRAPHY HONS. (CASUAL) FINAL PRACTICAL EXAMINATION SCHEDULE, 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>09</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/13186322771st_year_Registration_Date_Extend_2020.pdf"
                                        target="_blank">DATE EXTENSION OF 1ST YEAR UG B.A/ B.SC REGISTRATION 2020-21</a>
                                </h5>
                                <!--<h5><a href="">DATE EXTENSION  OF 1ST YEAR UG B.A/ B.SC REGISTRATION 2020-21</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>06</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/4986272Registration_Notice.pdf" target="_blank">1ST YEAR U.G
                                        COURSES REGISTRATION RELATED NOTICE FOR THE SESSION 2020-2021</a></h5>
                                <!--<h5><a href="">1ST YEAR U.G COURSES REGISTRATION RELATED NOTICE FOR THE SESSION 2020-2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>01</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/1271020348PG_admission_notice_2020-21_(1).pdf" target="_blank">PG
                                        ADMISSION NOTICE 2020-2021</a></h5>
                                <!--<h5><a href="">PG ADMISSION NOTICE 2020-2021</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>01</span>
                                    Nov -
                                    2024
                                </div>
                                <h5><a href="uploads/662175817UG_Admission_guidelines(1)_01-Nov-2020_21-10-31(1).pdf"
                                        target="_blank">IMPORTANT ADMISSION NOTICE</a></h5>
                                <!--<h5><a href="">IMPORTANT ADMISSION NOTICE</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>30</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/480103388WBSU__PART-II-ROUTINE__2020_.pdf"
                                        target="_blank">PART__II__Examination__ROUTINE__2020</a></h5>
                                <!--<h5><a href="">PART__II__Examination__ROUTINE__2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>30</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/518164441Part-II_Practical_Examination_Notice.pdf"
                                        target="_blank">Part-II_Practical_Examination_Notice 2020</a></h5>
                                <!--<h5><a href="">Part-II_Practical_Examination_Notice 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>30</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/100138697Guidelines__Bengali__Part-II_Examination.pdf"
                                        target="_blank">EXAMINATION GUIDELINE IN BENGALI OF B.A / B.SC PART - II (BOTH
                                        HONOURS & GENERAL) 2020 </a></h5>
                                <!--<h5><a href="">EXAMINATION GUIDELINE IN BENGALI OF B.A / B.SC PART - II (BOTH HONOURS & GENERAL) 2020 </a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>30</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/2085723729Guidelines__English_____Part-II_Examination.pdf"
                                        target="_blank">EXAMINATION GUIDELINE IN ENGLISH OF B.A / B.SC PART - II (BOTH
                                        HONOURS & GENERAL) 2020 </a></h5>
                                <!--<h5><a href="">EXAMINATION GUIDELINE IN ENGLISH OF B.A / B.SC PART - II (BOTH HONOURS & GENERAL) 2020 </a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>29</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/22227621Casual_Exam_Notice.pdf" target="_blank">PART-II (Honours &
                                        General) Casual Examinations , 2020 Notice</a></h5>
                                <!--<h5><a href="">PART-II (Honours & General) Casual Examinations , 2020 Notice</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>16</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/824183760WBSU_Notice_UG_Part-II_Exam%2c_2020_16_10_2020.pdf"
                                        target="_blank">WBSU Notice UG Part-II Exam, 2020 16.10.2020</a></h5>
                                <!--<h5><a href="">WBSU Notice UG Part-II Exam, 2020 16.10.2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>16</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/2069341068Part-I_Fees_Structure_2020.pdf" target="_blank">Part-I
                                        Fees Structure 2020</a></h5>
                                <!--<h5><a href="">Part-I Fees  Structure 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/1715677495WBSU__PART-II-ROUTINE__2020_.pdf" target="_blank">B.A./
                                        B.Sc Part-II (Hons. & Gen) Final Examination schedule, 2020</a></h5>
                                <!--<h5><a href="">B.A./ B.Sc Part-II (Hons. & Gen) Final Examination schedule, 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/1494305648NOTICE_FOR_PUJA_HOLIDAY.pdf" target="_blank">NOTICE FOR
                                        PUJA HOLIDAY</a></h5>
                                <!--<h5><a href="">NOTICE FOR PUJA HOLIDAY</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>13</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/1679174346ADMISSION_NOTICE_B_A_B_Sc_SEM-III.pdf"
                                        target="_blank">ADMISSION NOTICE B.A B.Sc SEM-III</a></h5>
                                <!--<h5><a href="">ADMISSION NOTICE B.A B.Sc SEM-III</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>13</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/1249418230Notice_for_exam__Part-II_2020.pdf"
                                        target="_blank">Notice_for_exam._Part-II_2020</a></h5>
                                <!--<h5><a href="">Notice_for_exam._Part-II_2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>08</span>
                                    Oct -
                                    2024
                                </div>
                                <h5><a href="uploads/1432911083NOTICE_20201009_0001.pdf" target="_blank">3RD PHASE UG
                                        ADMISSION NOTICE 2020</a></h5>
                                <!--<h5><a href="">3RD PHASE UG ADMISSION NOTICE 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>24</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/915547931B_A_B_SC_EXAMINATION_2020_REVISED.pdf"
                                        target="_blank">SCHEDULE OF PART - III B.A , B.SC (HONS. & GENERAL) EXAMINATION
                                        , 2020 (REVISED)</a></h5>
                                <!--<h5><a href="">SCHEDULE OF PART - III B.A , B.SC (HONS. & GENERAL) EXAMINATION , 2020 (REVISED)</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>22</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/1203009613NOTICE_PART_-III_GUIDELINES_(BENGALI).pdf"
                                        target="_blank">EXAMINATION GUIDELINE IN BENGALI OF B.A / B.SC PART - III (BOTH
                                        HONOURS & GENERAL) 2020 </a></h5>
                                <!--<h5><a href="">EXAMINATION GUIDELINE IN BENGALI OF B.A / B.SC PART - III (BOTH HONOURS & GENERAL) 2020 </a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>22</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/338784117NOTICE_PART-III_GUIDELINES_(ENGLISH).pdf"
                                        target="_blank">EXAMINATION GUIDELINE IN ENGLISH OF B.A / B.SC PART - III (BOTH
                                        HONOURS & GENERAL) 2020 </a></h5>
                                <!--<h5><a href="">EXAMINATION GUIDELINE IN ENGLISH OF B.A / B.SC PART - III (BOTH HONOURS & GENERAL) 2020 </a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>22</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/1803739825Part-III_Honours_General_%2c_2020(3).pdf"
                                        target="_blank">SCHEDULE OF PART - III B.A , B.SC (HONS. & GENERAL) EXAMINATION
                                        , 2020</a></h5>
                                <!--<h5><a href="">SCHEDULE OF PART - III B.A , B.SC (HONS. & GENERAL) EXAMINATION , 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>15</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/1048774899Registration_Notice_20200915_0001.pdf"
                                        target="_blank">1ST YEAR REGISTRATION NOTICE</a></h5>
                                <!--<h5><a href="">1ST YEAR REGISTRATION NOTICE</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>15</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/1589549686Notice_20200915_0001.pdf" target="_blank">Inviting new
                                        applications from</a></h5>
                                <!--<h5><a href="">Inviting new applications from</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>15</span>
                                    Sep -
                                    2024
                                </div>
                                <h5><a href="uploads/2137284637Registration_Notice_20200915_0001.pdf"
                                        target="_blank">RE,GISTRATION NOTICE,</a></h5>
                                <!--<h5><a href="">RE,GISTRATION NOTICE,</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>30</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/457937740Library_Webinar.pdf" target="_blank">One Day National
                                        Webinar On “Impact of Social Media in Academic Libraries ”</a></h5>
                                <!--<h5><a href="">One Day National Webinar On  “Impact of Social Media in Academic Libraries ”</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>25</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/1380744937webinar_comp_and_Phys.pdf" target="_blank">One Day
                                        National Webinar On “Importance of Image Processing and HIGGS BOSON in Academic
                                        Field”</a></h5>
                                <!--<h5><a href="">One Day National Webinar On  “Importance of Image Processing and HIGGS  BOSON in Academic Field”</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>25</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/1967091976webinar_English.pdf" target="_blank">SPECIAL LECTURES ON
                                        ROBERT BROWNING AND ANDREW MARVELL</a></h5>
                                <!--<h5><a href="">SPECIAL LECTURES ON ROBERT BROWNING AND ANDREW  MARVELL</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>19</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/241150738online_class_notice_20200819_0001.pdf"
                                        target="_blank">online class notice</a></h5>
                                <!--<h5><a href="">online class notice</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>14</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/2063085321Notice_for_fees.pdf" target="_blank">Online Processing
                                        Fee</a></h5>
                                <!--<h5><a href="">Online Processing Fee</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>01</span>
                                    Aug -
                                    2024
                                </div>
                                <h5><a href="uploads/1204782587UG-ADMISSION-NOTICE2020.pdf" target="_blank">ADMISSION
                                        NOTICE 2020</a></h5>
                                <!--<h5><a href="">ADMISSION NOTICE 2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>02</span>
                                    Apr -
                                    2024
                                </div>
                                <h5><a href="uploads/1020359582Notice.pdf" target="_blank">Notice</a></h5>
                                <!--<h5><a href="">Notice</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>19</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/1324071486IMG.pdf" target="_blank">Classes Suspended to ensure
                                        safety and in the interest of Public Health </a></h5>
                                <!--<h5><a href="">Classes Suspended to ensure safety and in the interest of Public Health </a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>16</span>
                                    Mar -
                                    2024
                                </div>
                                <h5><a href="uploads/1645399152IMG.pdf" target="_blank">All the Classes & Internal
                                        Examination & Post Graduate Course will be suspended</a></h5>
                                <!--<h5><a href="">All the Classes & Internal Examination & Post Graduate Course will be suspended</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/45107874Class_notice.pdf" target="_blank">B.A/B.Sc (Both Hons. and
                                        General) 3rd Sem and 3rd year Classes will be held on and from 25.07.2019 </a>
                                </h5>
                                <!--<h5><a href="">B.A/B.Sc (Both Hons. and General) 3rd Sem and 3rd year Classes will be held on and from 25.07.2019 </a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>23</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/868264509Security_Advertisment.pdf" target="_blank">Advertisement
                                        for Recruitment of Guard from private agency </a></h5>
                                <!--<h5><a href="">Advertisement for Recruitment of Guard from private agency </a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>20</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/703755715Admission_Notice_2.pdf" target="_blank">5TH PHASE
                                        ADMISSION NOTICE 2019</a></h5>
                                <!--<h5><a href="">5TH PHASE ADMISSION NOTICE 2019</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>20</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="site/single_notice/ug-admission-notice-2019.html">UG ADMISSION NOTICE
                                        2019</a></h5>
                                <!--<h5><a href="">UG ADMISSION NOTICE 2019</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>10</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/367747908Admission_Notice_2.docx" target="_blank">Admission Notice
                                        of B.A / B.Sc (both Honours & General) 2019-20</a></h5>
                                <!--<h5><a href="">Admission Notice of B.A / B.Sc (both Honours & General) 2019-20</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/1780702411B_Sc_routine_2019-20.pdf" target="_blank">Routine Of B.Sc
                                        I - Sem (Both Hons.. & General) 2019-20.</a></h5>
                                <!--<h5><a href="">Routine Of B.Sc I - Sem (Both Hons.. & General)  2019-20.</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>03</span>
                                    Jul -
                                    2024
                                </div>
                                <h5><a href="uploads/683412872Routine.pdf" target="_blank">Routine Of B.A I - Sem (Both
                                        Hons.. & General) 2019-20.</a></h5>
                                <!--<h5><a href="">Routine Of B.A I - Sem (Both Hons.. & General)  2019-20.</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>28</span>
                                    Jun -
                                    2024
                                </div>
                                <h5><a href="uploads/501621635VERIFICATION_NOTICE-converted.pdf"
                                        target="_blank">VERIFICATION NOTICE</a></h5>
                                <!--<h5><a href="">VERIFICATION NOTICE</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>25</span>
                                    Jun -
                                    2024
                                </div>
                                <h5><a href="uploads/361585530Admission_Notice_2-converted.pdf"
                                        target="_blank">ADMISSION NOTICE 2</a></h5>
                                <!--<h5><a href="">ADMISSION NOTICE 2</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>19</span>
                                    Jun -
                                    2024
                                </div>
                                <h5><a href="uploads/1175814280ADMISSION_NOTICE_date_2019.pdf" target="_blank">2ND MERIT
                                        LIST 2019</a></h5>
                                <!--<h5><a href="">2ND MERIT LIST 2019</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>31</span>
                                    May -
                                    2024
                                </div>
                                <h5><a href="uploads/1892646432Add_P_G_for_VC.pdf" target="_blank">ADMISSION FOR MASTER
                                        OF SCIENCE (M.SC) IN GEOGRAPHY AND MASTER OF ARTS IN BENGALI AND EDUCATION FOR
                                        THE SESSION 2019-2020</a></h5>
                                <!--<h5><a href="">ADMISSION FOR MASTER OF SCIENCE (M.SC) IN GEOGRAPHY AND MASTER OF ARTS IN BENGALI AND EDUCATION FOR THE SESSION 2019-2020</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>30</span>
                                    May -
                                    2024
                                </div>
                                <h5><a href="uploads/526669174IMG.pdf" target="_blank">PG Admission Notice, 2019</a>
                                </h5>
                                <!--<h5><a href="">PG Admission Notice, 2019</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>24</span>
                                    May -
                                    2024
                                </div>
                                <h5><a href="uploads/1379926008UG_ADMISSION_NOTICE_2019.pdf" target="_blank">UG
                                        ADMISSION NOTICE 2019</a></h5>
                                <!--<h5><a href="">UG ADMISSION NOTICE 2019</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                        <div class="newsBox">
                            <div class="newsContent">
                                <div class="date">
                                    <span>24</span>
                                    Apr -
                                    2024
                                </div>
                                <h5><a href="uploads/753222124NOTICE2.pdf" target="_blank">NOTICE FOR 2ND SEMESTER
                                        INTERNAL EXAMINATION 2019</a></h5>
                                <!--<h5><a href="">NOTICE FOR 2ND SEMESTER INTERNAL EXAMINATION 2019</a></h5>-->
                                <!--<p></p>-->
                            </div>
                        </div>
                    </div>
                    <div class="clearfix text-right">
                        <a href="site/notice.html" class="btn btn-default"><span><span class="hvr-bounce-to-right">View
                                    All</span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="clearfix spacer facility-section gray-bg os-animation" data-os-animation="fadeIn"
        data-os-animation-delay=".5s">
        <div class="container">
            <div class="clearfix title-wrap text-center">
                <h2 class="secTitle">Our Facilities</h2>
            </div>
            <div class="clearfix row">
                <div class="col-md-6 col-xl-4">
                    <div class="clearfix serviceBox">
                        <a href="#" class="icon">
                            <i class="fa fa-flask"></i>
                        </a>
                        <h3><a href="#">College Infrastructure</a></h3>
                        <p>The college has well maintained digital library, A.C. Smart Class Room with A.C. Lab
                            facilities and OPAC system and INFLIBNET library resource... <a
                                href="site/about_us/infrastructure.html" title="" class="link"
                                style="color:#f7931d;">Read More...</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="clearfix serviceBox">
                        <a href="#" class="icon">
                            <i class="fa fa-users"></i>
                        </a>
                        <h3><a href="#">Remedial Coaching </a></h3>
                        <p>The College provides Remedial Coaching for SC/ST/OBC (Non-creamy layer) & Minorities students
                            of the College under the financial assistance of University Grants Commission. <a
                                href="site/course/remedial-coaching.html" title="" class="link"
                                style="color:#f7931d;">Read More...</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="clearfix serviceBox">
                        <a href="#" class="icon">
                            <i class="fa fa-envira"></i>
                        </a>
                        <h3><a href="#">Counselling Cell</a></h3>
                        <p>College has constituted a Counselling Cell for counselling the students and arrange future
                            placement of the students on behalf of the college. <a
                                href="site/student/counselling-cell.html" title="" class="link"
                                style="color:#f7931d;">Read More...</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="clearfix serviceBox">
                        <a href="#" class="icon">
                            <i class="fa fa-book"></i>
                        </a>
                        <h3><a href="#">Central Library</a></h3>
                        <p>The library of Vivekananda College has emerged to its prominence by introducing modern
                            amenities students, teachers & scholars. It boasts of digitization, Wi-fi zone and Inflibnet
                            & Bar coded system. <a href="site/library/about-library.html" title="" class="link"
                                style="color:#f7931d;">Read More...</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="clearfix serviceBox">
                        <a href="#" class="icon">
                            <i class="fa fa-laptop"></i>
                        </a>
                        <h3><a href="#">Computer Training</a></h3>
                        <p> Vivekananda College in collaboration with Webel Technology Ltd. (Govt. of West Bengal
                            Undertaking) has introduced Computer Literacy and Training Programme for the College
                            students. It is called a Career Oriented Certified Computer Course.<a
                                href="site/course/computer-training.html" title="" class="link"
                                style="color:#f7931d;">Read More...</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="clearfix serviceBox">
                        <a href="#" class="icon">
                            <i class="fa fa-graduation-cap"></i>
                        </a>
                        <h3><a href="#">Coaching Classes</a></h3>
                        <p>'The College provides Coaching Classes for Entry in services for SC/ST/OBC (Non-creamy layer)
                            & Minorities students of the College. The well being and development of the SC/ST/OBC
                            (Non-creamy layer) & Minorities are important indicators of the strength and success of a
                            democratic society.<a href="site/course/coaching-classes.html" title="" class="link"
                                style="color:#f7931d;">Read More...</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="clearfix spacer courseBox-section os-animation pb-0" data-os-animation="fadeIn"
        data-os-animation-delay=".5s">
        <div class="container">
            <div class="clearfix title-wrap text-center">
                <h2 class="secTitle">Our Popular Courses</h2>
            </div>
        </div>
        <div class="clearfix courseBox-wrap" id="courseBox-carousel">
            <!--  <div class="courseBox">
                <a href="#">
                    <img src="/{theme_url}assets/images/bengali.jpg" width="500" height="500">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <h3>Bengali</h3>
                    </div>
                </a>
            </div>
            <div class="courseBox">
                <a href="#">
                    <img src="/{theme_url}assets/images/english.jpg" width="500" height="500">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <h3>English</h3>
                    </div>
                </a>
            </div>
            <div class="courseBox">
                <a href="#">
                    <img src="/{theme_url}assets/images/science.jpg" width="500" height="500">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <h3>Science</h3>
                    </div>
                </a>
            </div>
            <div class="courseBox">
                <a href="#">
                    <img src="/{theme_url}assets/images/computer.jpg" width="500" height="500">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <h3>Computer Science</h3>
                    </div>
                </a>
            </div>
            <div class="courseBox">
                <a href="#">
                    <img src="/{theme_url}assets/images/bengali.jpg" width="500" height="500">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <h3>Bengali</h3>
                    </div>
                </a>
            </div>
            <div class="courseBox">
                <a href="#">
                    <img src="/{theme_url}assets/images/english.jpg" width="500" height="500">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <h3>English</h3>
                    </div>
                </a>
            </div>
            <div class="courseBox">
                <a href="#">
                    <img src="/{theme_url}assets/images/science.jpg" width="500" height="500">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <h3>Science</h3>
                    </div>
                </a>
            </div>
            <div class="courseBox">
                <a href="#">
                    <img src="/{theme_url}assets/images/computer.jpg" width="500" height="500">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <h3>Computer Science</h3>
                    </div>
                </a>
            </div>-->
        </div>
    </section>
    <section class="clearfix gray-bg os-animation usefullinks-wrap text-center" data-os-animation="fadeIn"
        data-os-animation-delay=".5s">
        <div class="clearfix spacer overlay-bg">
            <div class="container">
                <div class="clearfix title-wrap">
                    <h2 class="secTitle">Useful Links</h2>
                </div>
                <div class="clearfix">
                    <ul class="usefullinks">
                        <li>
                            <a href="http://www.naac.gov.in/" target="_blank">
                                <img src="{theme_url}assets/images/naac-logo.png" width="165" height="147">
                                <span>National Assessment and Accreditation Council (NAAC)</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.ugc.ac.in/" target="_blank">
                                <img src="{theme_url}assets/images/ugc-logo.png" width="165" height="147">
                                <span>University Grants Commission (UGC)</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.wbsche.ac.in/" target="_blank">
                                <img src="{theme_url}assets/images/Wes-Bengal-State-Council-of-Higher-Education.png"
                                    width="165" height="147">
                                <span>West Bengal State Council of Higher Education (WBSCHE)</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://wbcsc.org.in/wbcsc/" target="_blank">
                                <img src="{theme_url}assets/images/cscimg.png" width="165" height="147">
                                <span>The West Bengal College Service Commission (WBCSC)</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.wbsuexams.net/" target="_blank">
                                <img src="{theme_url}assets/images/wbsu-logo.png" width="165" height="147">
                                <span>West Bengal State University (WBSU)</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://wbhed.gov.in/" target="_blank">
                                <img src="{theme_url}assets/images/wbhed.png" width="165" height="147">
                                <span>Government of West Bengal, Dept. of Higher Education, Science And Technology And
                                    Biotechnology (WBHED)</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://ndl.iitkgp.ac.in/" target="_blank">
                                <img src="{theme_url}assets/images/national-digital-library.png" width="165"
                                    height="147">
                                <span>National Digital library of India (NDLI)</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mhrd.gov.in/" target="_blank">
                                <img src="{theme_url}assets/images/Ministry-of-Human-Resource-Development.png"
                                    width="165" height="147">
                                <span>Ministry of Human Resource Development (MHRD)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>