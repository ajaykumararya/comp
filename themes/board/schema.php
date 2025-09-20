<?php
if ($isPrimary) {
    $sliders = $this->SiteModel->slider();
    if ($sliders->num_rows()) {
        ?>
        <style>
            @media (min-width: 1024px) {
                .slick-slide img {
                    height: 477px !important;
                }
            }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
        }


        .carousel {
            position: relative;
        }

        .carousel img {
            width: 100%;
            /* border-radius: 10px; */
        }

        .slick-dots {
            bottom: 10px!important;
        }
        .slick-dotted.slick-slider{
            margin-bottom:0!important
        }
        /* .slick-prev, .slick-next {
            z-index: 1;
            color: #000;
        } */
    </style>
        <section class="clearfix bannerWrap os-animation" data-os-animation="fadeIn" data-os-animation-delay=".5s">
            <div id="homeBanner" class="carousel slide carousel-fade" data-ride="carousel">
                <?php
                // $i = 0;
                // echo '<ol class="carousel-indicators">';
                // foreach ($sliders->result() as $slider) {
                //     $active = !$i ? 'class="active"' : '';
                //     echo '<li data-target="#homeBanner" data-slide-to="' . $i++ . '" ' . $active . '></li>';
                // }
                // echo '</ol>';
                ?>
                <!-- <div class="carousel-inner"> -->
                    <?php
                    $i = 1;
                    foreach ($sliders->result() as $slider) {
                        $active = $i == 1 ? 'active' : '';
                        $i++;
                        ?>
                        <div>
                            <img class="d-block w-100" src="{base_url}upload/<?= $slider->image ?>" alt="First slide">
                      </div>
                        <?php
                    }
                    ?>
                <!-- </div> -->
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#homeBanner').slick({
                dots: true, // Enable navigation dots
                arrows: false, // Enable previous/next arrows
                infinite: true, // Loop through slides
                speed: 500, // Transition speed
                slidesToShow: 1, // Show one slide at a time
                slidesToScroll: 1, // Scroll one slide at a time
                autoplay: true, // Enable auto-play
                autoplaySpeed: 3000, // Auto-play speed in milliseconds
            });
        });
    </script>
        <?php
    }
}
?>


<div class="container-fluid home-tile">{content}</div>
<?php
/*
 <!-- Main landing page image -->
    <div class="container-fluid home-tile border-bottom border-warning border-4">
        <div class="row">
            <div class="col-12 position-relative py-5 px-2 overflow-hidden">
                <div id="landing-image-container">
                    <img src="assets/images/nceb-pre.svg" data-src="./assets/images/home-img.png"
                        alt="NCEB 100% free franchise">
                </div>

                <div class="row">
                    <div class="col-md-5 offset-md-1 px-5" style="z-index:1">
                        <span class="h1 text-secondary">Welcome to <span class="text-primary">NCEB</span></span>

                        <div class="card border-0 shadow-sm bg-white bg-opacity-75 mb-1 ms-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <span class="h6 m-0 me-2 text-primary"><i class="nxr-star-fill notop"></i></span>
                                    <div class="vr border border-warning border-2 opacity-75 me-2"></div>
                                    <h6 class="card-title m-0">Recognized by MCA.</h6>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm bg-white bg-opacity-75 mb-1 ms-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <span class="h6  m-0 me-2 text-primary"><i class="nxr-star-fill notop"></i></span>
                                    <div class="vr border border-warning border-2 opacity-75 me-2"></div>
                                    <h6 class="card-title m-0">Government job valid certificate.</h6>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm bg-white bg-opacity-75 mb-1 ms-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <span class="h6  m-0 me-2 text-primary"><i class="nxr-star-fill notop"></i></span>
                                    <div class="vr border border-warning border-2 opacity-75 me-2"></div>
                                    <h6 class="card-title m-0">An ISO 9001:2015 certified company.</h6>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm bg-white bg-opacity-75 mb-1 ms-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <span class="h6  m-0 me-2 text-primary"><i class="nxr-star-fill notop"></i></span>
                                    <div class="vr border border-warning border-2 opacity-75 me-2"></div>
                                    <h6 class="card-title m-0">Registered by Ministry of Corporate Affairs.</h6>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm bg-white bg-opacity-75 mb-1 ms-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <span class="h6 m-0 me-2 text-primary"><i class="nxr-star-fill notop"></i></span>
                                    <div class="vr border border-warning border-2 opacity-75 me-2"></div>
                                    <h6 class="card-title m-0">Authorization by Quality Research Organization.</h6>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="text-center">
                            <a href="register-with-nceb.html"
                                class="shadow-lg btn btn-warning btn-lg rounded-5 fw-bold">FREE REGISTER <span
                                    class="idvd">|</span> <i class="nxr-rocket-takeoff text-secondary"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <!-- Verification, News & Stats Section-->
    <div class="container">
        <div class="row g-3">
            <div class="col-md-4 d-flex flex-column justify-content-between">
                <div class="card bg-white shadow-sm border-0 rounded-0 w-100">
                    <div class="card-body p-4">
                        <form method="GET" action="https://www.nceb.in/verify-nceb.php">
                            <input type="hidden" name="type">
                            <input type="hidden" name="srchome">
                            <h6 class="nceb-heading-primary">CENTER VERIFICATION</h6>
                            <div class="input-group">
                                <input name="center_id" type="text" class="form-control" placeholder="Enter Center ID"
                                    aria-label="Enter Center ID" aria-describedby="cv-button">
                                <button class="btn btn-primary" type="submit" id="cv-button">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card bg-white shadow-sm border-0 rounded-0 w-100">
                    <div class="card-body p-4">
                        <form method="GET" action="https://www.nceb.in/verify-nceb.php">
                            <input type="hidden" name="type">
                            <input type="hidden" name="srchome">
                            <h6 class="nceb-heading-primary">STUDENT VERIFICATION</h6>
                            <div class="input-group">
                                <input name="student_id" type="text" class="form-control" placeholder="Enter Student ID"
                                    aria-label="Enter Student ID" aria-describedby="sv-button">

                                <button class="btn btn-primary" type="submit" id="sv-button">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card bg-white shadow-sm border-0 rounded-0 w-100">
                    <div class="card-body p-4">
                        <form method="GET" action="https://www.nceb.in/verify-nceb.php">
                            <input type="hidden" name="type">
                            <input type="hidden" name="srchome">
                            <h6 class="nceb-heading-primary">CERTIFICATE VERIFICATION</h6>
                            <div class="input-group">
                                <input name="cert_no" type="text" class="form-control"
                                    placeholder="Enter Certificate No." aria-label="Enter Certificate No."
                                    aria-describedby="crv-button" readonly>
                                <button class="btn btn-primary" type="submit" id="crv-button"
                                    disabled="disabled">SUBMIT</button>
                            </div>
                            <small class="text-danger">This feature is unavailable at this moment, please use <b>STUDENT
                                    VERIFICATION</b> to verify certificate.</small>
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-md-4 d-flex flex-fill">
                <div class="card bg-white shadow-sm border-0 rounded-0 w-100 overflow-hidden" id="news-card">
                    <div class="card-header bg-secondary text-white rounded-0 p-3">
                        <h6 class="nceb-heading-warning m-0 p-0">Latest News</h6>
                    </div>
                    <div class="card-body">
                        <ul id="news-container" class="list-unstyled overflow-hidden">
                            <li>You can earn up to 40% by taking the distributorship of NCEB all the centers</li>
                            <li>All of you centers should be relaxed, updates will keep coming from time to time,
                                updates will also come in such a way that it is better for you.</li>
                            <li>The central ID will be deactivated if the central panel is not logged in time to time.
                            </li>
                            <li>The final result of the top center list will come on the last date of the year.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex flex-fill" id="counter">
                <div class="card bg-white shadow-sm border-0 rounded-0 w-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="stat-icon py-2 px-3">
                                <span class="display-3 m-0 p-0"><i class="nxr-classroom"></i></span>
                            </div>
                            <div class="stat-data text-center p-2">
                                <h6 class="nceb-heading-primary">Our Centers</h6>
                                <h2><span class="counter-value" data-target="1452" data-speed="300">0</span>+</h2>
                            </div>
                        </div>
                        <hr class="opacity-25">
                        <div class="d-flex justify-content-between">
                            <div class="stat-icon py-2 px-3">
                                <span class="display-3 m-0 p-0"><i class="nxr-students"></i></span>
                            </div>
                            <div class="stat-data text-center p-2">
                                <h6 class="nceb-heading-primary">Happy Students</h6>
                                <h2><span class="counter-value" data-target="8095" data-speed="800">0</span>+</h2>
                            </div>
                        </div>
                        <hr class="opacity-25">
                        <div class="d-flex justify-content-between">
                            <div class="stat-icon py-2 px-3">
                                <span class="display-3 m-0 p-0"><i class="nxr-visitors"></i></span>
                            </div>
                            <div class="stat-data text-center p-2">
                                <h6 class="nceb-heading-primary">Visitor Count</h6>
                                <h2><span class="counter-value" data-target="1695496" data-speed="900">0</span>+</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <!-- Join NCEB 3D Section -->
    <div class="container-fluid grid3d-bg">
        <div class="row">
            <div class="col-12 text-center">
                <br>
                <br>
                <span class="display-1 text-white text-3d"><b>JOIN NCEB IN SINGLE STEP</b></span>
                <br>
                <a href="register-with-nceb.html" class="btn btn-warning btn-lg w-50"><b>APPLY FOR FRANCHISE</b></a>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>

    <br>
    <!-- Recently Joined Center Section -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card bg-white border-0 rounded-0 w-100 h-100 p-3">
                    <h4 class="nceb-heading-primary">Recently Joined Centers</h4>
                    <hr class="w-25" style="height:10px;">

                    <div class="glider-contain multiple">
                        <div class="glider" id="recentCenters">

                            <div class="p-2">
                                <div class="card bg-white shadow-sm border-0 w-100">
                                    <div class="card-header bg-secondary text-white text-center">
                                        NCEBc2403133
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="position-relative">
                                            <img src="assets/images/vnc.png" data-src="./assets/images/vnc.png"
                                                class="center_vnc" alt="NCEB badge for NCEBc2403133">
                                            <img src="assets/images/nceb-pre.svg"
                                                data-src="center_images/3133-129586chp.png"
                                                class="center_head_img rounded-circle img-fluid w-100 border border-5 border-secondary"
                                                alt="nceb center head image of NCEBc2403133">
                                        </div>
                                        <div class="center_head_name"><b>POOJA MEHRA</b></div>
                                    </div>
                                    <div class="card-footer bg-primary text-white text-center">
                                        Uttarakhand
                                    </div>
                                </div>
                            </div>

                            <div class="p-2">
                                <div class="card bg-white shadow-sm border-0 w-100">
                                    <div class="card-header bg-secondary text-white text-center">
                                        NCEBc2403132
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="position-relative">
                                            <img src="assets/images/vnc.png" data-src="./assets/images/vnc.png"
                                                class="center_vnc" alt="NCEB badge for NCEBc2403132">
                                            <img src="assets/images/nceb-pre.svg"
                                                data-src="center_images/3132-825345chp.png"
                                                class="center_head_img rounded-circle img-fluid w-100 border border-5 border-secondary"
                                                alt="nceb center head image of NCEBc2403132">
                                        </div>
                                        <div class="center_head_name"><b>SUDHIR KUMAR</b></div>
                                    </div>
                                    <div class="card-footer bg-primary text-white text-center">
                                        Uttar Pradesh
                                    </div>
                                </div>
                            </div>

                            <div class="p-2">
                                <div class="card bg-white shadow-sm border-0 w-100">
                                    <div class="card-header bg-secondary text-white text-center">
                                        NCEBc2403130
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="position-relative">
                                            <img src="assets/images/vnc.png" data-src="./assets/images/vnc.png"
                                                class="center_vnc" alt="NCEB badge for NCEBc2403130">
                                            <img src="assets/images/nceb-pre.svg" data-src="center_images/59706chp.png"
                                                class="center_head_img rounded-circle img-fluid w-100 border border-5 border-secondary"
                                                alt="nceb center head image of NCEBc2403130">
                                        </div>
                                        <div class="center_head_name"><b>NAZRUL ISLAM </b></div>
                                    </div>
                                    <div class="card-footer bg-primary text-white text-center">
                                        West Bengal
                                    </div>
                                </div>
                            </div>

                            <div class="p-2">
                                <div class="card bg-white shadow-sm border-0 w-100">
                                    <div class="card-header bg-secondary text-white text-center">
                                        NCEBc2403126
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="position-relative">
                                            <img src="assets/images/vnc.png" data-src="./assets/images/vnc.png"
                                                class="center_vnc" alt="NCEB badge for NCEBc2403126">
                                            <img src="assets/images/nceb-pre.svg" data-src="center_images/18405chp.png"
                                                class="center_head_img rounded-circle img-fluid w-100 border border-5 border-secondary"
                                                alt="nceb center head image of NCEBc2403126">
                                        </div>
                                        <div class="center_head_name"><b>DEEPA</b></div>
                                    </div>
                                    <div class="card-footer bg-primary text-white text-center">
                                        Jharkhand
                                    </div>
                                </div>
                            </div>

                            <div class="p-2">
                                <div class="card bg-white shadow-sm border-0 w-100">
                                    <div class="card-header bg-secondary text-white text-center">
                                        NCEBc2403125
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="position-relative">
                                            <img src="assets/images/vnc.png" data-src="./assets/images/vnc.png"
                                                class="center_vnc" alt="NCEB badge for NCEBc2403125">
                                            <img src="assets/images/nceb-pre.svg" data-src="center_images/59504chp.png"
                                                class="center_head_img rounded-circle img-fluid w-100 border border-5 border-secondary"
                                                alt="nceb center head image of NCEBc2403125">
                                        </div>
                                        <div class="center_head_name"><b>VAIBHAV AHIRE</b></div>
                                    </div>
                                    <div class="card-footer bg-primary text-white text-center">
                                        Maharashtra
                                    </div>
                                </div>
                            </div>

                            <div class="p-2">
                                <div class="card bg-white shadow-sm border-0 w-100">
                                    <div class="card-header bg-secondary text-white text-center">
                                        NCEBc2403122
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="position-relative">
                                            <img src="assets/images/vnc.png" data-src="./assets/images/vnc.png"
                                                class="center_vnc" alt="NCEB badge for NCEBc2403122">
                                            <img src="assets/images/nceb-pre.svg" data-src="center_images/23690chp.png"
                                                class="center_head_img rounded-circle img-fluid w-100 border border-5 border-secondary"
                                                alt="nceb center head image of NCEBc2403122">
                                        </div>
                                        <div class="center_head_name"><b>ALBERT LAL</b></div>
                                    </div>
                                    <div class="card-footer bg-primary text-white text-center">
                                        Delhi
                                    </div>
                                </div>
                            </div>

                            <div class="p-2">
                                <div class="card bg-white shadow-sm border-0 w-100">
                                    <div class="card-header bg-secondary text-white text-center">
                                        NCEBc2403119
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="position-relative">
                                            <img src="assets/images/vnc.png" data-src="./assets/images/vnc.png"
                                                class="center_vnc" alt="NCEB badge for NCEBc2403119">
                                            <img src="assets/images/nceb-pre.svg" data-src="center_images/86232chp.png"
                                                class="center_head_img rounded-circle img-fluid w-100 border border-5 border-secondary"
                                                alt="nceb center head image of NCEBc2403119">
                                        </div>
                                        <div class="center_head_name"><b>HARI DUTT KAPILA</b></div>
                                    </div>
                                    <div class="card-footer bg-primary text-white text-center">
                                        Himachal Pradesh
                                    </div>
                                </div>
                            </div>

                            <div class="p-2">
                                <div class="card bg-white shadow-sm border-0 w-100">
                                    <div class="card-header bg-secondary text-white text-center">
                                        NCEBc2403118
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="position-relative">
                                            <img src="assets/images/vnc.png" data-src="./assets/images/vnc.png"
                                                class="center_vnc" alt="NCEB badge for NCEBc2403118">
                                            <img src="assets/images/nceb-pre.svg" data-src="center_images/76921chp.png"
                                                class="center_head_img rounded-circle img-fluid w-100 border border-5 border-secondary"
                                                alt="nceb center head image of NCEBc2403118">
                                        </div>
                                        <div class="center_head_name"><b>FEROOZ AHMAD HAJAM</b></div>
                                    </div>
                                    <div class="card-footer bg-primary text-white text-center">
                                        Jammu and Kashmir
                                    </div>
                                </div>
                            </div>

                            <div class="p-2">
                                <div class="card bg-white shadow-sm border-0 w-100">
                                    <div class="card-header bg-secondary text-white text-center">
                                        NCEBc2403116
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="position-relative">
                                            <img src="assets/images/vnc.png" data-src="./assets/images/vnc.png"
                                                class="center_vnc" alt="NCEB badge for NCEBc2403116">
                                            <img src="assets/images/nceb-pre.svg" data-src="center_images/27391chp.png"
                                                class="center_head_img rounded-circle img-fluid w-100 border border-5 border-secondary"
                                                alt="nceb center head image of NCEBc2403116">
                                        </div>
                                        <div class="center_head_name"><b>PRAKASH KUSHWAHA</b></div>
                                    </div>
                                    <div class="card-footer bg-primary text-white text-center">
                                        Madhya Pradesh
                                    </div>
                                </div>
                            </div>

                            <div class="p-2">
                                <div class="card bg-white shadow-sm border-0 w-100">
                                    <div class="card-header bg-secondary text-white text-center">
                                        NCEBc2403114
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="position-relative">
                                            <img src="assets/images/vnc.png" data-src="./assets/images/vnc.png"
                                                class="center_vnc" alt="NCEB badge for NCEBc2403114">
                                            <img src="assets/images/nceb-pre.svg" data-src="center_images/65160chp.png"
                                                class="center_head_img rounded-circle img-fluid w-100 border border-5 border-secondary"
                                                alt="nceb center head image of NCEBc2403114">
                                        </div>
                                        <div class="center_head_name"><b>ROZY SAMUEL</b></div>
                                    </div>
                                    <div class="card-footer bg-primary text-white text-center">
                                        Delhi
                                    </div>
                                </div>
                            </div>

                            <div class="p-2">
                                <div class="card bg-white shadow-sm border-0 w-100">
                                    <div class="card-header bg-secondary text-white text-center">
                                        NCEBc2403113
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="position-relative">
                                            <img src="assets/images/vnc.png" data-src="./assets/images/vnc.png"
                                                class="center_vnc" alt="NCEB badge for NCEBc2403113">
                                            <img src="assets/images/nceb-pre.svg" data-src="center_images/88242chp.png"
                                                class="center_head_img rounded-circle img-fluid w-100 border border-5 border-secondary"
                                                alt="nceb center head image of NCEBc2403113">
                                        </div>
                                        <div class="center_head_name"><b>NEERAJ</b></div>
                                    </div>
                                    <div class="card-footer bg-primary text-white text-center">
                                        Haryana
                                    </div>
                                </div>
                            </div>

                            <div class="p-2">
                                <div class="card bg-white shadow-sm border-0 w-100">
                                    <div class="card-header bg-secondary text-white text-center">
                                        NCEBc2403112
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="position-relative">
                                            <img src="assets/images/vnc.png" data-src="./assets/images/vnc.png"
                                                class="center_vnc" alt="NCEB badge for NCEBc2403112">
                                            <img src="assets/images/nceb-pre.svg" data-src="center_images/33693chp.png"
                                                class="center_head_img rounded-circle img-fluid w-100 border border-5 border-secondary"
                                                alt="nceb center head image of NCEBc2403112">
                                        </div>
                                        <div class="center_head_name"><b>MAJJARIB KHAN</b></div>
                                    </div>
                                    <div class="card-footer bg-primary text-white text-center">
                                        Jammu and Kashmir
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

    <br>
    <!-- Free Test Section -->
    <div class="container-fluid bg-warning text-black">
        <div class="row">
            <div class="col-12">
                <br>
                <br>
                <div class="d-flex justify-content-center">
                    <div class="me-5 align-self-center">
                        <img src="assets/images/test.svg" alt="NCEB free test preparation">
                    </div>

                    <div class="div">
                        <span class="h1"><b>FREE TEST PREPARATION</b></span><br>
                        <a href="nceb-free-test.html" class="btn btn-light btn-lg rounded-0"><b>TAKE FREE TEST <span
                                    class="idvd">|</span> <i class="nxr-rocket-takeoff text-danger"></i></b></a>
                    </div>

                </div>
                <br>
                <br>
            </div>
        </div>
    </div>

    <br>
    <!-- About & Testimonials -->
    <div class="container">
        <div class="row g-3">
            <div class="col-md-7 d-flex flex-fill">
                <div class="card bg-white shadow-sm border-0 rounded-0 w-100">
                    <div class="card-body">
                        <div class="row g-0">
                            <div class="col-md-4 align-self-center">
                                <h4 class="nceb-heading-primary">About NCEB</h4>
                                <hr class="w-50">
                                <div class="p-2">
                                    <img class="card-3d img-fluid" alt="NCEB logo" title="NCEB final Logo"
                                        src="assets/images/main-logo.png">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <p class="text-justify">National Computer Education Board is successfully running many
                                    centres all over India which focuses on success of the candidate with the updated
                                    Technology and fertility in India and therefore National Computer Education Board is
                                    successfully running many centres all over India and its franchises. National
                                    Computer Education Board build teaching environment that response to future
                                    challenges to provide quality education in both theoretical and applied courses of
                                    computer education and to train students to effective apply research based
                                    education. National Computer Education Board is staying one step ahead in providing
                                    the latest information in technology education make the institutions student
                                    friendly and deliver services to the society the mission of providing best quality.
                                </p>
                                <a href="about-nceb.html" class="btn btn-secondary">Read more...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 bg-white particles-bg">
                <div class="p-2 bg-white">
                    <h4 class="m-0 p-0 nceb-heading-primary">Testimonials</h4>
                </div>
                <hr>

                <div class="glider-contain">
                    <div class="glider" id="testimonials">

                        <div class="p-2">
                            <div class="d-flex justify-content-center">
                                <div class="card bg-white shadow-lg border-0 w-75">
                                    <div class="card-body text-center">
                                        <img src="assets/images/nceb-pre.svg" data-src="./uploads/15688PHOTO1.jpg"
                                            class="rounded-circle img-fluid w-50 d-inline" width="50px"
                                            alt="NCEB centerhead testomonial 1"><br>
                                        <small>NCEB provides computer education franchise absolutely free and it has
                                            good moto
                                            of computer skill development in India .NCEB has best customer support with
                                            fastest
                                            response.I can proudly say I am Part of NCEB.</small>
                                    </div>
                                    <div class="card-footer bg-secondary text-white text-center">
                                        <small>STAR COMPUTER (NCEBc190282)</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-2">
                            <div class="d-flex justify-content-center">
                                <div class="card bg-white shadow-lg border-0 w-75">
                                    <div class="card-body text-center">
                                        <img src="assets/images/nceb-pre.svg" data-src="./uploads/27537rp.jpg"
                                            class="rounded-circle img-fluid w-50 d-inline" width="50px"
                                            alt="NCEB centerhead testomonial 2"><br>
                                        <small>NCEB has the best user interface, easy examination process, attractive
                                            certificate design and one of the best customer support team.</small>
                                    </div>
                                    <div class="card-footer bg-secondary text-white text-center">
                                        <small>INFOTECH OF COMPUTER SCIENCE (NCEBc2001347)</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-2">
                            <div class="d-flex justify-content-center">
                                <div class="card bg-white shadow-lg border-0 w-75">
                                    <div class="card-body text-center">
                                        <img src="assets/images/nceb-pre.svg"
                                            data-src="./uploads/93318WhatsApp Image 2019-09-14 at 11.48.37 AM.jpeg"
                                            class="rounded-circle img-fluid w-50 d-inline" width="50px"
                                            alt="NCEB centerhead testomonial 3"><br>
                                        <small>NCEB is one of the best Computer Education Franchise.After getting
                                            associated with Nceb Franchise our organization has got a brand recognition
                                            I would like them to keep supporting us like this.</small>
                                    </div>
                                    <div class="card-footer bg-secondary text-white text-center">
                                        <small>NCEB GHATSILA (NCEBc190156)</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-2">
                            <div class="d-flex justify-content-center">
                                <div class="card bg-white shadow border-0 w-75">
                                    <div class="card-body text-center">
                                        <img src="assets/images/nceb-pre.svg"
                                            data-src="./uploads/15245passport sizggge.jpg"
                                            class="rounded-circle img-fluid w-50 d-inline" width="50px"
                                            alt="NCEB centerhead testomonial 4"><br>
                                        <small>NCEB has the fast technical and customer support, easy to use dashboard
                                            and fast and on time certificate generation .</small>
                                    </div>
                                    <div class="card-footer bg-secondary text-white text-center">
                                        <small>SSG GROUP OF EDUCATION (NCEBc2001373)</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-2">
                            <div class="d-flex justify-content-center">
                                <div class="card bg-white shadow border-0 w-75">
                                    <div class="card-body text-center">
                                        <img src="assets/images/nceb-pre.svg" data-src="./uploads/6348190428.jpg"
                                            class="rounded-circle img-fluid w-50 d-inline" width="50px"
                                            alt="NCEB centerhead testomonial 5"><br>
                                        <small>NCEB is the best organisation to provide computer franchise also has
                                            online verification for center, student and certificate. Best part about
                                            NCEB is customer support & easy dashboard.</small>
                                    </div>
                                    <div class="card-footer bg-secondary text-white text-center">
                                        <small>INFINITY COMPUTER EDUCATION CENTER (NCEBc190428)</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-2">
                            <div class="d-flex justify-content-center">
                                <div class="card bg-white shadow border-0 w-75">
                                    <div class="card-body text-center">
                                        <img src="assets/images/nceb-pre.svg"
                                            data-src="./uploads/69691WhatsApp Image 2022-10-27 at 2.0.jpg"
                                            class="rounded-circle img-fluid w-50 d-inline" width="50px"
                                            alt="NCEB centerhead testomonial 6"><br>
                                        <small>The feature i love about NCEB is Practice test where students can prepare
                                            themselves, easy to conduct examination and professional customer
                                            support.</small>
                                    </div>
                                    <div class="card-footer bg-secondary text-white text-center">
                                        <small>JUPITER COMPUTER WORLD (NCEBc2202696)</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <br>
    <!-- Distrubuter Section -->
    <div class="container-fluid bg-primary text-white">
        <div class="row">
            <div class="col-12">
                <br>
                <br>
                <div class="d-flex justify-content-center">
                    <div class="me-5 align-self-center">
                        <img src="assets/images/income.png" widtg="100px" alt="NCEB Distributer program">
                    </div>

                    <div class="div">
                        <span class="h1"><b>JOIN OUR DISTRIBUTOR PROGRAM</b></span><br>
                        <button class="btn btn-warning btn-lg rounded-0 d-none d-lg-block"><b>EARN UPTO 40% OF CENTER'S
                                BUSINESS</b></button>

                        <button class="btn btn-warning btn-sm rounded-0 d-block d-lg-none"><b>EARN UPTO
                                40% OF CENTER'S
                                BUSINESS</b></button>
                        <h4 class="mt-2"><b>Call : <a class="text-decoration-none text-white"
                                    href="tel:+917351556786">7351556786</a></b></h4>
                    </div>

                </div>
                <br>
                <br>
            </div>
        </div>
    </div>
    <br>
    <br>

    <!-- Salient Features Section -->
    <div class="container bg-white shadow-sm">
        <div class="row g-4">
            <div class="col-12">
                <h4 class="nceb-heading-primary">Salient Features of <span class="text-primary">NCEB</span></h4>
                <hr>
            </div>
            <div class="col-12 col-md-3 offset-md-1">
                <ul class="list-group list-group-flush mt-md-3 wow slideInLeft text-dark text-center"
                    style="visibility: visible; animation-name: slideInLeft;">
                    <li class="list-group-item">Recognized By MCA.</li>
                    <li class="list-group-item">Regd. By Ministry Of Corporate Affairs.</li>
                    <li class="list-group-item">Registered By Public Trust.</li>
                    <li class="list-group-item">Authorization By Quality Research Organization.</li>
                    <li class="list-group-item">Regd with niti Aayog.</li>
                    <li class="list-group-item">An ISO 9001:2015 Certified NCEB Computer Education Board.</li>
                    <li class="list-group-item">Online Certificate Verification .</li>

                </ul>

            </div>
            <div class="col-12 col-md-4 text-center">
                <img class="w-80" alt="NCEB Features" title="NCEB Features" src="assets/images/nceb-pre.svg"
                    data-src="assets/images/TreeFeat.png">
                <br>
            </div>
            <div class="col-12 col-md-3">
                <ul class="list-group list-group-flush mt-md-3 text-dark text-center"
                    style="visibility: visible; animation-name: slideInRight;">
                    <li class="list-group-item">100% Free Of Computer Institute Franchise.</li>
                    <li class="list-group-item">No Renewal Fee.</li>
                    <li class="list-group-item">No Other Investment.</li>
                    <li class="list-group-item">Govt. Project Will be Delivered Form Institute Time to Time.</li>
                    <li class="list-group-item">Online Center Verification.</li>
                    <li class="list-group-item">Online Student Verification.</li>
                    <li class="list-group-item">Valid Certificate in Govt. In Private Firms &amp; Company's.</li>
                </ul>
            </div>
            <br>
        </div>

    </div>
    <br>

    <!-- NCEB WORD CLOUD -->
    <div class="container-fluid gayab">
        <div class="row">
            <div class="col-12 text-justify word-cloud">
                <!--<span class="display-3">NCEB Word Cloud</span><br/>
                <hr class="bbpx4">-->
                <p class="h6 text-danger">free computer institute franchise all over India Computer Institute Franchise
                    Absolutely Free</p>
                <p class="h2 text-primary">free computer education franchise</p>
                <span class="h1 text-success">Take franchise absolutely free from NCEB</span>
                <span class="h1 text-info">computer course franchise</span>
                <p class="h5 text-secondry">computer education franchise</p>
                <p class="h4 text-warning">computer education franchise in india</p>
                <p class="h5 text-primary">free computer institute franchise</p>
                <span class="h2 text-info">free computer franchise</span>
                <span class="h1 text-danger">franchising</span>
                <span class="h4 text-primary">computer center franchise</span>
                <span class="h1 text-warning">free computer education franchise</span>
                <span class="h3 text-info">computer institute franchise absolutely free</span>
                <span class="h6 text-danger">franchising</span>
                <span class="h1 text-secondry">computer center franchise</span>
                <span class="h1 text-warning">franchise opportunity in India</span>
                <span class="h2 text-primary">the best franchise in India</span>
                <span class="h1 text-info">Top franchise in India</span>
                <span class="h6 text-danger">open computer centre</span>
                <span class="h3 text-primary">best computer education franchise</span>
                <span class="h6 text-success">Computer course franchise</span>
                <span class="h1 text-info">computer training franchise</span>
                <span class="h3 text-primary">govt.computer education franchise</span>
                <span class="h4 text-danger">govt project for computer education</span>
                <span class="h1 text-primary">free government computer courses franchise</span>
                <span class="h6 text-warning">computer institute franchise absolutely free</span>
                <span class="h3 text-info">computer training institute franchise</span>
                <span class="h4 text-success">computer center franchise in india</span>
                <span class="h1 text-primary">nceb</span>
                <span class="h2 text-warning">skill development franchise</span>
                <span class="h4 text-danger">best computer franchise</span>
                <span class="h5 text-info">success computer education skill development</span>
                <span class="h2 text-danger">franchise opportunities in computer education</span>
                <span class="h3 text-success">computer institute franchise</span>
                <span class="h4 text-success">computer franchise</span>
                <span class="h5 text-success">computer free franchise</span>
                <span class="h5 text-success">govt project franchise</span>
                <span class="h5 text-success">free govt project franchise</span>
                <span class="h5 text-success">government project franchise</span>
                <span class="h5 text-success">free government project franchise</span>
                <p>NCEB absolutely free franchise in india
                    free best computer center franchise in uttarakhand
                    free best computer center franchise in up
                    free best computer center franchise in bihar
                    free best computer center franchise in karnataka
                    free best computer center franchise in telangana
                    free best computer center franchise in tamil nadu
                    free best computer center franchise in West Bengal
                    free best computer center franchise in Jammu and Kashmir
                    free best computer center franchise in Odisha</p>
            </div>
        </div>
    </div>


    */
?>