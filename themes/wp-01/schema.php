<?php
if ($isPrimary) {
    $sliders = $this->SiteModel->get_contents('revosultion_slider');
    if ($sliders->num_rows()) {
        ?>
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-c91172d elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="c91172d" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5c7e39f4"
                    data-id="5c7e39f4" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-1233bce8 elementor-widget elementor-widget-slider_revolution"
                            data-id="1233bce8" data-element_type="widget" data-widget_type="slider_revolution.default">
                            <div class="elementor-widget-container">

                                <div class="wp-block-themepunch-revslider">
                                    <!-- START Home 1 REVOLUTION SLIDER 6.7.32 -->
                                    <p class="rs-p-wp-fix"></p>
                                    <rs-module-wrap id="rev_slider_1_1_wrapper" data-source="gallery"
                                        style="visibility:hidden;background:transparent;padding:0;">

                                        <rs-module id="rev_slider_1_1" style="" data-version="6.7.32">

                                            <rs-slides style="overflow: hidden; position: absolute;">
                                                <?php
                                                $i = 1;
                                                foreach ($sliders->result() as $slider) {
                                                    ?>
                                                    <rs-slide style="position: absolute;" data-key="rs-1" data-title="Slide"
                                                        data-thumb="{base_url}upload/<?= $slider->field1 ?>" data-anim="f:nodelay;"
                                                        data-filter="b:2;" data-in="o:0;sx:1.5;sy:1.2;m:true;col:6;"
                                                        data-mediafilter="gingham">
                                                        <img decoding="async"
                                                            src="{theme_url}assets/wp-content/plugins/revslider/sr6/assets/assets/dummy.png"
                                                            alt="" title="Home Page" class="rev-slidebg tp-rs-img rs-lazyload"
                                                            data-lazyload="{base_url}upload/<?= $slider->field1 ?>" data-no-retina>

                                                        <rs-layer id="slider-1-slide-1-layer-1" data-type="text"
                                                            data-color="rgba(255,255,255,1)"
                                                            data-xy="x:c;y:m;yo:-70px,-70px,-70px,-100px;"
                                                            data-text="w:normal;s:60,60,40,20;l:70,70,50,30;fw:700;a:center;"
                                                            data-dim="w:720px,640,480px,300px;" data-rsp_o="off" data-rsp_bd="off"
                                                            data-frame_0="y:20px;sX:0.9;sY:0.9;tp:600;"
                                                            data-frame_1="tp:600;e:power4.out;st:500;sp:1000;sR:500;"
                                                            data-frame_999="o:0;tp:600;e:nothing;st:w;sR:7500;"
                                                            style="z-index:5;font-family:'Open Sans';letter-spacing:10px;">
                                                            <?php
                                                            echo ($slider->field2);
                                                            ?>
                                                        </rs-layer>
                                                        <rs-layer id="slider-1-slide-1-layer-2" data-type="text"
                                                            data-color="rgba(255,255,255,1)" data-xy="x:c;y:m;yo:44px,57px,39px,0;"
                                                            data-text="w:normal;s:17,17,17,15;l:26,26,26,24;a:center;"
                                                            data-dim="w:720px,480px,480px,300px;" data-rsp_o="off" data-rsp_bd="off"
                                                            data-frame_0="y:10px;sX:0.9;sY:0.9;tp:600;"
                                                            data-frame_1="tp:600;e:power4.out;st:700;sp:1000;sR:700;"
                                                            data-frame_999="o:0;tp:600;e:nothing;st:w;sR:7300;"
                                                            style="z-index:6;font-family:'Open Sans';">
                                                            <?= $slider->field3 ?>
                                                        </rs-layer>
                                                        <?php
                                                        if (!empty($slider->field4)) {
                                                            ?>
                                                            <a href="<?= $slider->field5 ?>">
                                                                <rs-layer id="slider-1-slide-1-layer-4" class="rev-btn"
                                                                    data-type="button" data-color="rgba(0,0,0,1)"
                                                                    data-xy="x:c;y:m;yo:133px,159px,141px,102px;"
                                                                    data-text="s:15;l:40;fw:700;" data-rsp_o="off" data-rsp_bd="off"
                                                                    data-padding="r:30;l:30;"
                                                                    data-frame_0="y:20px;sX:0.9;sY:0.9;tp:600;"
                                                                    data-frame_1="tp:600;e:power4.out;st:900;sp:1000;sR:900;"
                                                                    data-frame_999="o:0;tp:600;e:nothing;st:w;sR:7100;"
                                                                    data-frame_hover="c:#000;bgc:#eee;boc:#000;bor:0px,0px,0px,0px;bos:solid;oX:50;oY:50;sp:0;"
                                                                    style="z-index:7;background-color:rgba(255,255,255,1);font-family:'Open Sans';cursor:pointer;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">
                                                                    <?= $slider->field4 ?>
                                                                </rs-layer>
                                                            </a>
                                                            <?php
                                                        }
                                                        ?>
                                                    </rs-slide>
                                                    <?php
                                                }
                                                ?>

                                            </rs-slides>
                                        </rs-module>

                                        <script type="4d6ba70d119531b625672e3b-text/javascript">
                                                                setREVStartSize({c: 'rev_slider_1_1',rl:[1240,1024,778,480],el:[],gw:[1200,1024,778,480],gh:[800,768,960,720],type:'standard',justify:'',layout:'fullscreen',offsetContainer:'',offset:'60px',mh:"0"});if (window.RS_MODULES!==undefined && window.RS_MODULES.modules!==undefined && window.RS_MODULES.modules["revslider11"]!==undefined) {window.RS_MODULES.modules["revslider11"].once = false;window.revapi1 = undefined;if (window.RS_MODULES.checkMinimal!==undefined) window.RS_MODULES.checkMinimal()}
                                                            </script>
                                    </rs-module-wrap>
                                    <!-- END REVOLUTION SLIDER -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
} else {
    ?>
    <div class="title-section module">
        <div class="row">

            <div class="small-12 columns">
                <h1>{page_name}</h1>
            </div><!-- Top Row /-->


            <div class="small-12 columns">
                <ul class="breadcrumbs">
                    <li class="item-home"><a class="bread-link bread-home" href="{base_url}" title="Home">Home</a></li>
                    <?php
                    if ($breadcrumb) {
                        $count = count($breadcrumb);
                        foreach ($breadcrumb as $index => $item) {
                            $class = ($index === $count - 1) ? ' class="item-current item-156"' : ' class="bread-link bread-home"';
                            $item = ($index === $count - 1) ? "<strong class=`bread-current bread-156`>$item</strong>" : "<a href='#'>{$item}</a>";

                            echo "<li{$class}>{$item}</li>";
                        }
                    }
                    ?>
                </ul>
            </div><!-- Bottom Row /-->

        </div><!-- Row /-->
    </div>
    <?php
}
?>

{content}