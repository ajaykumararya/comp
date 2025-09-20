<?php
if ($isPrimary) {
    $sliders = $this->SiteModel->slider();
    if ($sliders->num_rows()) {
        ?>
        <style>
            .banner-bg {
                display: block;
                height: 600px
            }

            .banner-bg img {
                height: 100%;
            }

            .banner-bg-mobile {
                display: none;
            }

            @media only screen and (max-width: 767px) {
                .banner-bg {
                    display: none;
                }

                .banner-bg-mobile {
                    display: block;
                }

                .banner-bg-mobile img {
                    height: 203px;
                    width: 100%;
                }

                .banner_content_wrap .carousel-item {
                    padding: 0px 0;
                }
            }
        </style>
        <section class="banner_section p-0 full_screen">
            <div id="carouselExampleFade" class="banner_content_wrap carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $i = 1;
                    foreach ($sliders->result() as $slider) {
                        $active = $i == 1 ? 'active' : '';
                        ?>
                        <div class="carousel-item <?= $active ?>  background_bg overlay_bg_40 background_bg_image<?= $i++ ?>">
                            <span class="banner-bg"><img src="{base_url}upload/<?= $slider->image ?>" width="100%"></span>
                            <span class="banner-bg-mobile"><img src="{base_url}upload/<?= $slider->image ?>" width="100%"></span>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="carousel-nav carousel_style1">
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                            <i class="ion-chevron-left"></i>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                            <i class="ion-chevron-right"></i>
                        </a>
                    </div>
                </div>
        </section>
        <?php
    }
    if ($this->SiteModel->get_setting('slider_icons') == 'on') {
        echo '<section class="clearfix res-1199-mt-0 position-relative z-1">
                <div class="row bg-img1 no-gutters ttm-bgcolor-white box-shadow2">';
        for ($i = 1; $i <= 5; $i++) {
            $title = $this->SiteModel->get_setting('slider_title_' . $i);
            $value = $this->SiteModel->get_setting('slider_value_' . $i, '#');
            $icon = $this->SiteModel->get_setting('slider_icon_' . $i);
            echo '<div class="offer">
                    <a href="'.$value.'">
                        <h4><i class="'.$icon.'" aria-hidden="true"></i> '.$title.' </h4>
                    </a>
                </div>';
        }
        echo '</div>
            </section>';
    }
} else {

    ?>
    <section class="ttm-row styleservices-section ttm-bgcolor-skincolor res-991-pb-100 clearfix">
        <div class="container">
            <!-- section title -->
            <div class="row section-title with-desc clearfix">
                <div class="col-md-12 p-0 ml-15">
                    <div class="title-header overflow-hidden">
                        <h5 class="ttm-textcolor-skincolor">{title}</h5>
                        <h1 class="title ttm-textcolor-white">{page_name}</h1>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div
                        class="title-desc ttm-textcolor-white border-left pl-30 pr-30 pt-10 pb-10 mt-30 res-767-p-0 res-767-mt-0 res-767-b-0">
                        Helping you achieve your dreams by nurturing the international Beauty Artist in You</div>
                </div> -->
                <!-- section title end -->
            </div>
        </div>
    </section>
    <?php

}
?>
<div class="site-main">{content}</div>