<?php
if ($isPrimary) {
    $sliders = $this->SiteModel->get_contents('revosultion_slider');
    if ($sliders->num_rows()) {
        // pre($sliders->result());
        ?>
        <!-- Revolution Slider 5.x SCRIPTS -->
        <script src="{theme_url}assets/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
        <script src="{theme_url}assets/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

        <!-- Section: home -->
        <section id="home">
            <div class="container-fluid p-0">

                <!-- START REVOLUTION SLIDER 5.0.7 -->
                <div id="rev_slider_home_wrapper" class="rev_slider_wrapper" data-alias="news-gallery34"
                    style="margin:0px auto; background-color:#ffffff; padding:0px; margin-top:0px; margin-bottom:0px;">
                    <!-- START REVOLUTION SLIDER 5.0.7 fullwidth mode -->
                    <div id="rev_slider_home" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
                        <ul>
                            <?php
                            $i = 1;
                            foreach ($sliders->result() as $slider) {
                                ?>

                                <!-- SLIDE 1 -->
                                <li data-index="rs-<?= $i ?>" data-transition="fade" data-slotamount="default" data-easein="default"
                                    data-easeout="default" data-masterspeed="default"
                                    data-thumb="{base_url}upload/<?= $slider->field1 ?>" data-rotate="0" data-fstransition="fade"
                                    data-saveperformance="off" data-title="Web Show" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="{base_url}upload/<?= $slider->field1 ?>" alt="" data-bgposition="center center"
                                        data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg"
                                        data-no-retina>
                                    <!-- LAYERS -->
                                    <!-- LAYER NR. 1 -->
                                    <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0 bg-theme-colored-transparent-4"
                                        id="slide-1-layer-1" data-x="['center','center','center','center']"
                                        data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                        data-voffset="['0','0','0','0']" data-width="full" data-height="full"
                                        data-whitespace="normal" data-transform_idle="o:1;"
                                        data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;"
                                        data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                        data-start="500" data-basealign="slide" data-responsive_offset="on"
                                        style="z-index: 5;background-color:rgba(0, 0, 0, 0.35);border-color:rgba(0, 0, 0, 1.00);">
                                    </div>
                                    <!-- LAYER NR. 2 -->
                                    <div class="tp-caption tp-resizeme rs-parallaxlevel-0 text-white text-uppercase font-roboto-slab font-weight-700"
                                        id="slide-<?= $i ?>-layer-2" data-x="['center','center','center','center']"
                                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                                        data-voffset="['195','195','160','170']" data-fontsize="['58','48','42','36']"
                                        data-lineheight="['70','60','50','45']" data-fontweight="['800','700','700','700']"
                                        data-textalign="['center','center','center','center']"
                                        data-width="['700','650','600','420']" data-height="none" data-whitespace="normal"
                                        data-transform_idle="o:1;"
                                        data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                                        data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
                                        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:0;y:0;s:inherit;e:inherit;"
                                        data-start="600" data-splitin="none" data-splitout="none" data-responsive_offset="on"
                                        style="z-index: 5; white-space: nowrap; font-weight:700;">
                                        <!-- Best <span
                                            class="text-theme-colored2">Online</span> Course -->
                                        <?php
                                        echo filter_title($slider->field2);
                                        ?>
                                    </div>
                                    <!-- LAYER NR. 3 -->
                                    <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0" id="slide-<?= $i ?>-layer-3"
                                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                        data-y="['top','top','top','top']" data-voffset="['275','260','220','220']"
                                        data-fontsize="['16','16',18',16']" data-lineheight="['24','24','24','24']"
                                        data-fontweight="['400','400','400','400']"
                                        data-textalign="['center','center','center','center']"
                                        data-width="['800','650','600','460']" data-height="none" data-whitespace="nowrap"
                                        data-transform_idle="o:1;"
                                        data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                                        data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
                                        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:0;y:0;s:inherit;e:inherit;"
                                        data-start="700" data-splitin="none" data-splitout="none" data-responsive_offset="on"
                                        style="z-index: 5; white-space: nowrap;">
                                        <?= $slider->field3 ?>
                                    </div>
                                    <!-- LAYER NR. 4 -->
                                    <?php
                                    if (!empty($slider->field4)) {
                                        ?>
                                        <div class="tp-caption rs-parallaxlevel-0" id="slide-<?= $i ?>-layer-4"
                                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                            data-y="['top','top','top','top']" data-voffset="['350','330','290','290']"
                                            data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;"
                                            data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                                            data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                                            data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" data-mask_in="x:0px;y:0px;"
                                            data-mask_out="x:0;y:0;" data-start="800" data-splitin="none" data-splitout="none"
                                            data-responsive_offset="on" data-responsive="off"
                                            style="z-index: 5; white-space: nowrap; letter-spacing:1px;">
                                            <a class="btn btn-theme-colored2 btn-lg btn-flat text-white font-weight-600 pl-30 pr-30 mr-15"
                                                href="<?= $slider->field5 ?>"><?= $slider->field4 ?></a>

                                        </div>
                                        <?php
                                    }
                                    ?>
                                </li>

                                <?php
                                $i++;
                            }
                            ?>
                        </ul>
                        <div class="tp-bannertimer tp-bottom" style="height: 5px; background-color: rgba(255, 255, 255, 0.2);">
                        </div>
                    </div>
                </div>

                <!-- END REVOLUTION SLIDER -->
                <script data-cfasync="false" src="{theme_url}assets/js/email-decode.min.js"></script>
                <script type="text/javascript">
                    var tpj = jQuery;
                    var revapi34;
                    tpj(document).ready(function () {
                        if (tpj("#rev_slider_home").revolution == undefined) {
                            revslider_showDoubleJqueryError("#rev_slider_home");
                        } else {
                            revapi34 = tpj("#rev_slider_home").show().revolution({
                                sliderType: "standard",
                                jsFileLocation: "{theme_url}js/revolution-slider/js/",
                                sliderLayout: "fullwidth",
                                dottedOverlay: "none",
                                delay: 5000,
                                navigation: {
                                    keyboardNavigation: "on",
                                    keyboard_direction: "horizontal",
                                    mouseScrollNavigation: "off",
                                    onHoverStop: "on",
                                    touch: {
                                        touchenabled: "on",
                                        swipe_threshold: 75,
                                        swipe_min_touches: 1,
                                        swipe_direction: "horizontal",
                                        drag_block_vertical: false
                                    }
                                    ,
                                    arrows: {
                                        style: "zeus",
                                        enable: true,
                                        hide_onmobile: true,
                                        hide_under: 600,
                                        hide_onleave: true,
                                        hide_delay: 200,
                                        hide_delay_mobile: 1200,
                                        tmp: '<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
                                        left: {
                                            h_align: "left",
                                            v_align: "center",
                                            h_offset: 30,
                                            v_offset: 0
                                        },
                                        right: {
                                            h_align: "right",
                                            v_align: "center",
                                            h_offset: 30,
                                            v_offset: 0
                                        }
                                    },
                                    bullets: {
                                        enable: true,
                                        hide_onmobile: true,
                                        hide_under: 600,
                                        style: "metis",
                                        hide_onleave: true,
                                        hide_delay: 200,
                                        hide_delay_mobile: 1200,
                                        direction: "horizontal",
                                        h_align: "center",
                                        v_align: "bottom",
                                        h_offset: 0,
                                        v_offset: 30,
                                        space: 5,
                                        tmp: '<span class="tp-bullet-img-wrap"><span class="tp-bullet-image"></span></span>'
                                    }
                                },
                                viewPort: {
                                    enable: true,
                                    outof: "pause",
                                    visible_area: "80%"
                                },
                                responsiveLevels: [1240, 1024, 778, 480],
                                gridwidth: [1240, 1024, 778, 480],
                                gridheight: [600, 550, 500, 450],
                                lazyType: "none",
                                parallax: {
                                    type: "scroll",
                                    origo: "enterpoint",
                                    speed: 400,
                                    levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
                                },
                                shadow: 0,
                                spinner: "off",
                                stopLoop: "off",
                                stopAfterLoops: -1,
                                stopAtSlide: -1,
                                shuffle: "off",
                                autoHeight: "off",
                                hideThumbsOnMobile: "off",
                                hideSliderAtLimit: 0,
                                hideCaptionAtLimit: 0,
                                hideAllCaptionAtLilmit: 0,
                                debugMode: false,
                                fallbacks: {
                                    simplifyAll: "off",
                                    nextSlideOnWindowFocus: "off",
                                    disableFocusListener: false,
                                }
                            });
                        }
                    }); /*ready*/
                </script>
                <!-- END REVOLUTION SLIDER -->

            </div>
        </section>


        <script type="text/javascript"
            src="{theme_url}assets/js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
        <script type="text/javascript"
            src="{theme_url}assets/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
        <script type="text/javascript"
            src="{theme_url}assets/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script type="text/javascript"
            src="{theme_url}assets/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript"
            src="{theme_url}assets/js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
        <script type="text/javascript"
            src="{theme_url}assets/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript"
            src="{theme_url}assets/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
        <script type="text/javascript"
            src="{theme_url}assets/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript"
            src="{theme_url}assets/js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>

        <?php
    }
} else {
    ?>
    <section class="inner-header bg-lighter">
        <div class="container pt-20 pb-20">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-8 text-left flip xs-text-center">
                        <h2 class="title">{page_name}</h2>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb text-right sm-text-center text-black mt-10">
                            <li><a href="#">Home</a></li>
                            <?php
                            if ($breadcrumb) {
                                $count = count($breadcrumb);
                                foreach ($breadcrumb as $index => $item) {
                                    $class = ($index === $count - 1) ? ' class="active text-theme-colored"' : '';
                                    $item = ($index === $count - 1) ? $item : "<a href='#'>{$item}</a>";

                                    echo "<li{$class}>{$item}</li>";
                                }
                            }
                            ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>

{content}