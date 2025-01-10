<?php
if ($isPrimary) {
    $sliders = $this->SiteModel->slider();

    ?>
    <style>
        /* Set a fixed height for the NivoSlider container */
        .nivoSlider {
            height: 380px !important;
            /* Adjust as needed */
            position: relative;
            overflow: hidden;
        }

        /* Ensure images fill the container properly */
        .nivoSlider img {
            width: 100%;
            /* Make images responsive */
            height: 100%;
            /* Maintain the fixed height */
            object-fit: cover;
            /* Ensures the images cover the container without distortion */
            object-position: center;
            /* Center the image */
        }
    </style>
    <div class="container  margin-tp-20">
        <div class="row">
            <?php
            if ($sliders->num_rows()) {
                ?>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="nivo-slider" style="background-color: #fff;">
                        <div class="slider-content">
                            <div id="slider" class="nivoSlider">
                                <?php
                                foreach ($sliders->result() as $slider)
                                    echo '<img src="{base_url}upload/' . $slider->image . '" alt="{title}">';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>


            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="panel with-nav-tabs panel-primary">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1primary" data-toggle="tab" class="text-center"><strong>Latest
                                        News</strong></a></li>

                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1primary">
                                <div class="widget-body1 latest-post">
                                    <div class="scroll" style="overflow: auto; height: 292px; margin-right: -15px;">
                                        <ul>

                                            <li><a href="http://www.cpisd.in/download/Public-Notice.pdf"
                                                    target="_blank"><span class="text-danger"><strong>Public
                                                            Notice</strong>
                                                    </span> <img src="{theme_url}assets/images/New_icons_43.gif"></a>
                                            </li>
                                            <li><a href="https://www.youtube.com/channel/UC_YsgFYUTWiXozTyGsEGLsw"
                                                    target="_blank"><span class="text-danger"><strong>Subscribe our
                                                            Youtube Channel</strong> </span></a></li>
                                            <li><a href="https://www.youtube.com/embed/Lo9-NWGRVKc?rel=0"
                                                    target="_blank"><span class="text-danger"><strong>Get NSDC approved
                                                            training center with in 7 days</strong> </span> <img
                                                        src="{theme_url}assets/images/New_icons_43.gif"></a></li>
                                            <li><a href="http://www.cpisd.in/download/telecom-sector-skill-council-membership.pdf"
                                                    target="_blank">Associated With Telecom Sector Skill Council</a>
                                                <img src="{theme_url}assets/images/New_icons_43.gif">
                                            </li>
                                            <li><a href="#" data-toggle="modal" data-target="#popupimg">Franchise
                                                    Promotional Scheme</a> <img
                                                    src="{theme_url}assets/images/New_icons_43.gif"></li>
                                            <li><a href="download/general-notice.pdf" target="_blank"><span
                                                        class="text-danger"><strong>General
                                                            Notice</strong> </span> <img
                                                        src="{theme_url}assets/images/New_icons_43.gif"></a></li>

                                            <li><a href="nsdc/NSDC-Skills-Certification.html" target="_blank"><span
                                                        class="text-danger"><strong>Admission
                                                            Open</strong></span> <span class="text-black">for Health
                                                        Care Courses</span></a> <img
                                                    src="{theme_url}assets/images/New_icons_43.gif"></li>
                                            <li><a href="#" data-toggle="modal" data-target="#popupcp2016"><span
                                                        class="text-black"><strong>NSDC Franchise</strong></span> for
                                                    Business Opportunities </a> <img
                                                    src="{theme_url}assets/images/New_icons_43.gif"></li>
                                            <li><a href="http://www.cpisd.in/download/PMKVY-candidates-conveyance.pdf"
                                                    target="_blank"><span class="text-danger"><strong>PMKVY Students
                                                            Reward Amount</strong> </span></a> <img
                                                    src="{theme_url}assets/images/New_icons_43.gif"></li>
                                            <li><a href="franchise/franchise.html" target="_blank"><span
                                                        class="text-black"><strong>PMKVY Franchise</strong></span> for
                                                    Business Opportunities</a> <img
                                                    src="{theme_url}assets/images/New_icons_43.gif"></li>


                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <?php
}
?>

{content}
<!-- <br> -->