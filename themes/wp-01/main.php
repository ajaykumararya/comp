<body
    class="home wp-singular page-template page-template-elementor_header_footer page page-id-7 page-parent wp-custom-logo wp-theme-education theme-education woocommerce-no-js  elementor-default elementor-template-full-width elementor-kit-675 elementor-page elementor-page-7">
    <!-- Page Preloader -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div id="object"></div>
            </div>
        </div>
    </div>
    <!-- Page Preloader Ends /-->
    <!-- Main Container -->
    <div class="main-container">

        <?php

        function get_menu($items, $class = '', $liClass = '', $linkClass = 'nav-link', $boxID = '', $attr = '')
        {
            $html = "<ul class=\"" . $class . "\" id=\"" . $boxID . "\" $attr>";
            foreach ($items as $key => $value) {
                $activeCss = ((defined('CURRENT_PAGE_ID') && constant('CURRENT_PAGE_ID') == $value['id']) or $value['isActive']) ? 'active' : ''; //getActiveMenu($value['page_id'],'active');
                $link = $value['link'];
                $iconWithTExt = $value['label'];

                $html .= '<li class="' . $activeCss . '"><a href="' . $link . '" ' . $value['target'] . '>' . $iconWithTExt . '</a>';
                if (array_key_exists('child', $value)) {
                    // $html .= '<div class="dropdown-menu">';
                    $html .= get_menu($value['child'], 'child-nav menu vertical', '', '');
                    // $html .= '</div>';
                }
                $html .= "</li>";
            }
            $html .= "</ul>";
            return $html;
        }

        switch (ES('website_header_index', 1)) {
            case '1':
                ?>
                <!-- Top Bar Starts -->
                <div class="topBar">
                    <div class="row">

                        <div class="large-4 medium-12 small-12 columns left-side">
                            <p><strong>Questions?</strong> <i class="fas fa-phone-alt"></i> {number}</p>
                        </div><!-- Left Column Ends /-->

                        <div class="large-8 medium-12 small-12 columns right-side">

                            <ul class="menu">
                                <li><i class="far fa-envelope"></i> {email}</li>
                                <li><a href="{facebook}"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="{twitter}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{youtube}"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="{instagram}"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="{linkedin}"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div><!-- Right column Ends /-->

                    </div><!-- Row ends /-->
                </div>
                <!-- Top bar Ends /-->

                <!-- Header Starts -->

                <div class="sticky-container" data-sticky-container>
                    <div class="header sticky" style="width:100%;" data-sticky data-options="marginTop:0;">

                        <div class="row">

                            <div class="large-4 medium-6 small-12 columns">
                                <div class="logo">
                                    <a href="{base_url}" class="custom-logo-link" rel="home" aria-current="page">
                                        <img fetchpriority="high" width="790" height="117" src="{base_url}upload/{logo}"
                                            class="custom-logo" alt="{title}" /></a>
                                </div><!-- logo /-->
                            </div><!-- left Ends /-->

                            <div class="large-8 medium-6 small-12 columns nav-wrap">
                                <!-- navigation Code STarts here.. -->
                                <div class="top-bar yespadd">
                                    <div class="top-bar-title">
                                        <span data-responsive-toggle="responsive-menu" data-hide-for="large">
                                            <a data-toggle><span class="menu-icon dark float-left"></span></a>
                                        </span>
                                    </div>

                                    <nav id="responsive-menu" class="menu-main-menu-container">
                                        <?php
                                        echo get_menu($menus, 'menu vertical large-horizontal float-right', 'single-sub parent-nav', '', '', 'data-responsive-menu="accordion large-dropdown"');
                                        ?>
                                    </nav>
                                </div><!-- top-bar Ends -->
                                <!-- Navigation Code Ends here -->

                            </div><!-- right Ends /-->

                        </div><!-- Row Ends /-->
                    </div>
                    <!-- Header Ends /-->
                </div><!-- Sticky Container /-->
                <?php
                break;
            case '2':
                ?>
                <div class="topBar">
                    <div class="row">

                        <div class="large-6 medium-12 small-12 columns left-side">
                            <div class="menu-footer-menu-container">

                                <ul id="menu-footer-menu" class="menu">
                                    <?php
                                    $data_index = 'topbarlinks';

                                    $fields = $this->SiteModel->get_setting($data_index, '', true);
                                    if ($fields) {
                                        foreach ($fields as $value) {
                                            $my_index = $value->title;
                                            $value = $value->link;
                                            echo '<li id="menu-item-408"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-page-ancestor menu-item-408">
                                                    <a href="' . $value . '">' . $my_index . '</a>
                                                </li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div><!-- Left Column Ends /-->

                        <div class="large-6 medium-12 small-12 columns right-side">

                            <ul class="menu">
                                <li><i class="far fa-envelope"></i> {email}</li>
                                <li><a href="{facebook}"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="{twitter}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{youtube}"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="{instagram}"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="{linkedin}"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div><!-- Right column Ends /-->

                    </div><!-- Row ends /-->
                </div>
                <div class="sticky-container" data-sticky-container="" style="height: 154px;">
                    <div class="sticky is-anchored is-at-top"
                        style="width: 100%; max-width: 1424.67px; margin-top: 0px; bottom: auto; top: 0px;"
                        data-sticky="dkwt30-sticky" data-options="marginTop:0;" data-resize="5ohwos-sticky"
                        data-events="resize">
                        <div class="header header-new">
                            <div class="row">

                                <div class="large-4 medium-6 small-12 columns">
                                    <div class="logo">
                                        <a href="{base_url}" class="custom-logo-link" rel="home" aria-current="page">
                                            <img fetchpriority="high" width="790" height="117" src="{base_url}upload/{logo}"
                                                class="custom-logo" alt="{title}" /></a>
                                    </div><!-- logo /-->
                                </div><!-- left Ends /-->

                                <div class="large-8 medium-6 small-12 columns text-right">

                                    <p><i class="fas fa-phone-alt"></i> {number}</p>
                                </div><!-- Left Column Ends /-->

                            </div><!-- Row Ends /-->
                        </div>
                        <!-- Header Ends /-->


                        <!-- Navigation Wrapper -->
                        <div class="navigation-style-two">
                            <div class="row nav-wrap">
                                <!-- navigation Code STarts here.. -->
                                <div class="top-bar yespadd">
                                    <div class="top-bar-title">
                                        <span data-responsive-toggle="responsive-menu" data-hide-for="large"
                                            style="display: none;">
                                            <a data-toggle=""><span class="menu-icon dark float-left"></span></a>
                                        </span>
                                    </div>

                                    <nav id="responsive-menu" class="menu-main-menu-container">
                                        <?php
                                        //single-sub parent-nav
                                        echo get_menu($menus, 'menu vertical large-horizontal', 'single-sub parent-nav', '', '', 'data-responsive-menu="accordion large-dropdown"');

                                        ?>
                                    </nav>
                                </div><!-- top-bar Ends -->
                                <!-- Navigation Code Ends here -->

                            </div><!-- right Ends /-->
                        </div>
                        <!-- Navigation Wrapper Ends /-->
                    </div><!-- Header /-->
                </div>
                <?php
                break;
        }
        ?>

        <!-- <div class='module'>Works as spacer</div> -->
        <div data-elementor-type="wp-page" data-elementor-id="7" class="elementor elementor-7">


            {output}

        </div>
        <?php
        $section_type = 'quick_assistance';
        $hideShowField = $section_type . '_hide_or_show';
        $hideShowFieldValue = ES($hideShowField, 'hide');
        if ($hideShowFieldValue == 'show') {
            $icon = $section_type . '_icon';
            $iconValue = ES($icon);
            $ext = $section_type . '_text';

            $btn = $section_type . '_button_title';
            $btnValue = ES($btn, '');
            $btnLink = $section_type . '_button_link';
            $btnLinkValue = ES($btnLink, '');

            ?>
            <!-- Call to Action box -->
            <div class="call-to-action">
                <div class="row">
                    <div class="large-10 medium-12 small-12 columns">
                        <h2><i class="<?= $iconValue ?>"></i>
                            <?= filter_title(ES($ext)) ?>
                        </h2>
                    </div>
                    <div class="large-2 medium-12 small-12 columns text-right">
                        <?php
                        if ($btnLinkValue) {
                            ?>
                            <a href="<?= $btnLinkValue ?>" class="button secondary"><?= $btnValue ?></a>
                            <?php
                        }
                        ?>
                    </div>
                </div><!-- row /-->
            </div>
            <!-- Call to Action End /-->
            <?php
        }
        ?>

        <!-- Footer -->
        <div class="footer">

            <div class="footerTop">

                <div class="row">

                    <div class="large-3 medium-6 small-12 columns">
                        <div id="text-2" class="footer-widget">
                            <h2>{footer_note_title}</h2>
                            <div class="tx-div"></div>
                            <div class="textwidget">
                                <p><?= ES('footer_note_description') ?></p>
                            </div>
                        </div>
                    </div><!-- Widget Ends /-->

                    <div class="large-3 medium-6 small-12 columns">
                        <div id="nav_menu-3" class="footer-widget">
                            <h2><?= ES('footer_first_section', 'Quick Links') ?></h2>
                            <div class="tx-div"></div>
                            <div class="menu-quick-links-container">
                                <ul id="menu-quick-links" class="menu">
                                    <?php
                                    $fields = $this->SiteModel->get_setting('footer_first_section_links', '', true);
                                    if ($fields) {
                                        foreach ($fields as $value) {
                                            $my_index = $value->title;
                                            $value = $value->link;
                                            echo '<li id="menu-item-415"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-415">
                                        <a href="' . $value . '">' . $my_index . '</a>
                                    </li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div><!-- Widget Ends /-->

                    <div class="large-3 medium-6 small-12 columns">
                        <div id="wc_time_table-2" class="footer-widget">
                            <h2><?= ES('footer_second_section', 'Office Hours') ?></h2>
                            <div class="tx-div"></div>
                            <ul class="vertical office-hours">
                                <?php
                                $fields = $this->SiteModel->get_setting('footer_second_section_links', '', true);
                                if ($fields) {
                                    foreach ($fields as $value) {
                                        $my_index = $value->title;
                                        echo '<li>' . $my_index . '</li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div><!-- Widget Ends /-->

                    <div class="large-3 medium-6 small-12 columns">
                        <div id="wc_contact_widget-3" class="footer-widget">
                            <ul class="address">
                                <li><i class='fas fa-home'></i>
                                    <h4>Address</h4>
                                    <p>{address}</p>
                                </li>
                                <li><i class='fas fa-mobile-alt'></i>
                                    <h4>Phone</h4>
                                    <p>{number}</p>
                                </li>
                                <li><i class='far fa-envelope'></i>
                                    <h4>Email</h4>
                                    <p>{email}
                                    </p>
                                </li>
                            </ul>
                            <hr>
                            <div class='socialicons'>Social:
                                <a href="{facebook}"><i class="fab fa-facebook"></i></a>
                                <a href="{twitter}"><i class="fab fa-twitter"></i></a>
                                <a href="{youtube}"><i class="fab fa-youtube"></i></a>
                                <a href="{instagram}"><i class="fab fa-instagram"></i></a>
                                <a href="{linkedin}"><i class="fab fa-linkedin"></i></a>


                            </div>
                        </div>
                    </div><!-- Widget Ends /-->

                </div><!-- Row Ends /-->

            </div><!-- footerTop Ends here.. -->
            <div class="footerbottom">

                <div class="row">

                    <div class="medium-12 small-12 columns left-side">

                        <div class="copyrightinfo"><?= date('Y') ?> &copy;

                            {title} All Rights Reserved. Desgined by {copyright}</div>
                    </div><!-- left side /-->

                    <div class="medium-6 small-12 columns hide-for-small-only right-side" style="display: none;">
                        <div class="menu-footer-menu-container">
                            <ul id="menu-footer-menu" class="menu">
                                <li id="menu-item-408"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-7 current_page_item menu-item-408">
                                    <a href="index.html" aria-current="page">Home</a>
                                </li>
                                <li id="menu-item-410"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-410"><a
                                        href="events-2/index.html">Join Our Events</a></li>
                                <li id="menu-item-241"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-241"><a
                                        href="about-us/index.html">About Us</a></li>
                                <li id="menu-item-526"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-526"><a
                                        href="blog/index.html">Blog</a></li>
                                <li id="menu-item-527"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-527"><a
                                        href="courses-page/index.html">Courses</a></li>
                            </ul>
                        </div>
                    </div><!-- Right Side /-->
                </div><!-- Row /-->

            </div><!-- footer Bottom /-->
        </div>
        <!-- Footer Ends here /-->

    </div>
    <!-- Main Container /-->

    <div id="content"></div>

    <a href="#top" id="top" class="animated fadeInUp start-anim">
        <i class="fas fa-angle-double-up"></i>
    </a>


    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700%2C400&amp;display=swap" rel="stylesheet"
        property="stylesheet" media="all" type="text/css">

    <script type="4d6ba70d119531b625672e3b-text/javascript">
        (function () {
            var c = document.body.className;
            c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
            document.body.className = c;
        })();
    </script>
    <script type="4d6ba70d119531b625672e3b-text/javascript">
        if(typeof revslider_showDoubleJqueryError === "undefined") {function revslider_showDoubleJqueryError(sliderID) {console.log("You have some jquery.js library include that comes after the Slider Revolution files js inclusion.");console.log("To fix this, you can:");console.log("1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on");console.log("2. Find the double jQuery.js inclusion and remove it");return "Double Included jQuery Library";}}
</script>
    <link rel='stylesheet' id='wc-blocks-style-css'
        href='{theme_url}assets/wp-content/plugins/woocommerce/assets/client/blocks/wc-blocks3a56.css?ver=wc-9.8.1'
        type='text/css' media='all' />
    <link rel='stylesheet' id='widget-image-css'
        href='{theme_url}assets/wp-content/plugins/elementor/assets/css/widget-image.min87cc.css?ver=3.28.3'
        type='text/css' media='all' />
    <link rel='stylesheet' id='widget-image-gallery-css'
        href='{theme_url}assets/wp-content/plugins/elementor/assets/css/widget-image-gallery.min87cc.css?ver=3.28.3'
        type='text/css' media='all' />
    <link rel='stylesheet' id='swiper-css'
        href='{theme_url}assets/wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min94a4.css?ver=8.4.5'
        type='text/css' media='all' />
    <link rel='stylesheet' id='e-swiper-css'
        href='{theme_url}assets/wp-content/plugins/elementor/assets/css/conditionals/e-swiper.min87cc.css?ver=3.28.3'
        type='text/css' media='all' />
    <link rel='stylesheet' id='widget-image-carousel-css'
        href='{theme_url}assets/wp-content/plugins/elementor/assets/css/widget-image-carousel.min87cc.css?ver=3.28.3'
        type='text/css' media='all' />
    <link rel='stylesheet' id='rs-plugin-settings-css'
        href='{theme_url}assets/wp-content/plugins/revslider/sr6/assets/css/rs61f81.css?ver=6.7.32' type='text/css'
        media='all' />
    <style id='rs-plugin-settings-inline-css' type='text/css'>
        .rev_slider,
        .rev_slider_wrapper {
            overflow: hidden !important
        }

        .rev_slider .slotholder:after {
            width: 100%;
            height: 100%;
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            pointer-events: none;
            background: rgba(0, 0, 0, 0.3)
        }

        #rev_slider_1_1_wrapper .uranus.tparrows {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0)
        }

        #rev_slider_1_1_wrapper .uranus.tparrows:before {
            width: 60px;
            height: 60px;
            line-height: 60px;
            font-size: 60px;
            transition: all 0.3s;
            -webkit-transition: all 0.3s
        }

        #rev_slider_1_1_wrapper .uranus.tparrows.rs-touchhover:before {
            opacity: 0.75
        }

        #rev_slider_1_1_wrapper .hermes.tp-bullets {}

        #rev_slider_1_1_wrapper .hermes .tp-bullet {
            overflow: hidden;
            border-radius: 50%;
            width: 12px;
            height: 12px;
            background-color: rgba(0, 0, 0, 0);
            box-shadow: inset 0 0 0 2px #ffffff;
            -webkit-transition: background 0.3s ease;
            transition: background 0.3s ease;
            position: absolute
        }

        #rev_slider_1_1_wrapper .hermes .tp-bullet.rs-touchhover {
            background-color: rgba(0, 0, 0, 0.21)
        }

        #rev_slider_1_1_wrapper .hermes .tp-bullet:after {
            content: ' ';
            position: absolute;
            bottom: 0;
            height: 0;
            left: 0;
            width: 100%;
            background-color: #ffffff;
            box-shadow: 0 0 1px #ffffff;
            -webkit-transition: height 0.3s ease;
            transition: height 0.3s ease
        }

        #rev_slider_1_1_wrapper .hermes .tp-bullet.selected:after {
            height: 100%
        }
    </style>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-includes//js/dist/hooks.min4fdd.js?ver=4d63a3d491d11ffd8ac6"
        id="wp-hooks-js"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-includes//js/dist/i18n.minc33c.js?ver=5e580eb46a90c2b997e6" id="wp-i18n-js"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript" id="wp-i18n-js-after">
/* <![CDATA[ */
wp.i18n.setLocaleData( { 'text direction\u0004ltr': [ 'ltr' ] } );
/* ]]> */
</script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-content/plugins/contact-form-7/includes/swv/js/indexfc7a.js?ver=6.0.6"
        id="swv-js"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript" id="contact-form-7-js-before">
/* <![CDATA[ */
var wpcf7 = {
    "api": {
        "root": "https:\/\/www.webfulcreations.com\/themes\/education\/wp-json\/",
        "namespace": "contact-form-7\/v1"
    }
};
/* ]]> */
</script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-content/plugins/contact-form-7/includes/js/indexfc7a.js?ver=6.0.6"
        id="contact-form-7-js"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-content/plugins/revslider/sr6/assets/js/rbtools.min0c0c.js?ver=6.7.29" defer async
        id="tp-tools-js"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-content/plugins/revslider/sr6/assets/js/rs6.min1f81.js?ver=6.7.32" defer async
        id="revmin-js"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-content/themes/education/assets/js/foundation.mincce7.js?ver=4.0.0"
        id="foundation-js-js"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-content/themes/education/assets/js/owl.carousel.mincce7.js?ver=4.0.0"
        id="owl-carousel-js-js"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-content/themes/education/assets/js/lightbox.mincce7.js?ver=4.0.0"
        id="lightbox-js-js"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-content/themes/education/assets/js/webfulcce7.js?ver=4.0.0"
        id="wc-main-js-js"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript" id="ajax_script-js-extra">
/* <![CDATA[ */
var ajax_obj = {"ajax_url":"https:\/\/www.webfulcreations.com\/themes\/education\/wp-admin\/admin-ajax.php"};
/* ]]> */
</script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-content/themes/education/assets/js/ajax_scripts3e78.js?ver=6.8"
        id="ajax_script-js"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-content/plugins/woocommerce/assets/js/sourcebuster/sourcebuster.min94cf.js?ver=9.8.1"
        id="sourcebuster-js-js"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript" id="wc-order-attribution-js-extra">
/* <![CDATA[ */
var wc_order_attribution = {"params":{"lifetime":1.0000000000000000818030539140313095458623138256371021270751953125e-5,"session":30,"base64":false,"ajaxurl":"https:\/\/www.webfulcreations.com\/themes\/education\/wp-admin\/admin-ajax.php","prefix":"wc_order_attribution_","allowTracking":true},"fields":{"source_type":"current.typ","referrer":"current_add.rf","utm_campaign":"current.cmp","utm_source":"current.src","utm_medium":"current.mdm","utm_content":"current.cnt","utm_id":"current.id","utm_term":"current.trm","utm_source_platform":"current.plt","utm_creative_format":"current.fmt","utm_marketing_tactic":"current.tct","session_entry":"current_add.ep","session_start_time":"current_add.fd","session_pages":"session.pgs","session_count":"udata.vst","user_agent":"udata.uag"}};
/* ]]> */
</script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-content/plugins/woocommerce/assets/js/frontend/order-attribution.min94cf.js?ver=9.8.1"
        id="wc-order-attribution-js"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-includes//js/comment-reply.min3e78.js?ver=6.8" id="comment-reply-js" async="async"
        data-wp-strategy="async"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-content/plugins/elementor/assets/lib/swiper/v8/swiper.min94a4.js?ver=8.4.5"
        id="swiper-js"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-content/plugins/elementor/assets/js/webpack.runtime.min87cc.js?ver=3.28.3"
        id="elementor-webpack-runtime-js"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-content/plugins/elementor/assets/js/frontend-modules.min87cc.js?ver=3.28.3"
        id="elementor-frontend-modules-js"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-includes//js/jquery/ui/core.minb37e.js?ver=1.13.3" id="jquery-ui-core-js"></script>
    <script type="4d6ba70d119531b625672e3b-text/javascript" id="elementor-frontend-js-before">
/* <![CDATA[ */
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close","a11yCarouselPrevSlideMessage":"Previous slide","a11yCarouselNextSlideMessage":"Next slide","a11yCarouselFirstSlideMessage":"This is the first slide","a11yCarouselLastSlideMessage":"This is the last slide","a11yCarouselPaginationBulletMessage":"Go to slide"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile Portrait","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Landscape","value":880,"default_value":880,"direction":"max","is_enabled":false},"tablet":{"label":"Tablet Portrait","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Landscape","value":1200,"default_value":1200,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1366,"default_value":1366,"direction":"max","is_enabled":false},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":false}},"hasCustomBreakpoints":false},"version":"3.28.3","is_static":false,"experimentalFeatures":{"additional_custom_breakpoints":true,"e_local_google_fonts":true,"editor_v2":true,"home_screen":true},"urls":{"assets":"https:\/\/www.webfulcreations.com\/themes\/education\/wp-content\/plugins\/elementor\/assets\/","ajaxurl":"https:\/\/www.webfulcreations.com\/themes\/education\/wp-admin\/admin-ajax.php","uploadUrl":"https:\/\/www.webfulcreations.com\/themes\/education\/wp-content\/uploads\/sites\/2"},"nonces":{"floatingButtonsClickTracking":"c9f56adb31"},"swiperClass":"swiper","settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_tablet"],"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":7,"title":"Education%20Theme%20%E2%80%93%20Beautiful%20WordPress%20Theme%20For%20Educational%20Institutes%2C%20Academies%2C%20Schools","excerpt":"","featuredImage":false}};
/* ]]> */
</script>
    <script type="4d6ba70d119531b625672e3b-text/javascript"
        src="{theme_url}assets/wp-content/plugins/elementor/assets/js/frontend.min87cc.js?ver=3.28.3"
        id="elementor-frontend-js"></script>
    <script id="rs-initialisation-scripts" type="4d6ba70d119531b625672e3b-text/javascript">
        var	tpj = jQuery;

        var	revapi1;

        if(window.RS_MODULES === undefined) window.RS_MODULES = {};
        if(RS_MODULES.modules === undefined) RS_MODULES.modules = {};
        RS_MODULES.modules["revslider11"] = {once: RS_MODULES.modules["revslider11"]!==undefined ? RS_MODULES.modules["revslider11"].once : undefined, init:function() {
            window.revapi1 = window.revapi1===undefined || window.revapi1===null || window.revapi1.length===0  ? document.getElementById("rev_slider_1_1") : window.revapi1;
            if(window.revapi1 === null || window.revapi1 === undefined || window.revapi1.length==0) { window.revapi1initTry = window.revapi1initTry ===undefined ? 0 : window.revapi1initTry+1; if (window.revapi1initTry<20) requestAnimationFrame(function() {RS_MODULES.modules["revslider11"].init()}); return;}
            window.revapi1 = jQuery(window.revapi1);
            if(window.revapi1.revolution==undefined){ revslider_showDoubleJqueryError("rev_slider_1_1"); return;}
            revapi1.revolutionInit({
                    revapi:"revapi1",
                    sliderLayout:"fullscreen",
                    visibilityLevels:"1240,1024,778,480",
                    gridwidth:"1200,1024,778,480",
                    gridheight:"800,768,960,720",
                    lazyType:"smart",
                    perspectiveType:"local",
                    responsiveLevels:"1240,1024,778,480",
                    fullScreenOffset:"60px",
                    progressBar: {
                        color:"rgba(255,255,255,0.25)",
                        vertical:"top",
                        size:8
                        },
                    navigation: {
                        mouseScrollNavigation:false,
                        onHoverStop:false,
                        touch: {
                            touchenabled:true
                        },
                        arrows: {
                            enable:true,
                            style:"uranus",
                            hide_onmobile:true,
                            hide_under:767,
                            left: {

                            },
                            right: {

                            }
                        },
                        bullets: {
                            enable:true,
                            tmp:"",
                            style:"hermes"
                        }
                    },
                    fanim: {
                        in:{"o":0},
                        out:{"a":false},
                        speed:300
                    },
                    viewPort: {
                        global:true,
                        globalDist:"-200px",
                        enable:false,
                        visible_area:"20%"
                    },
                    fallbacks: {
                        allowHTML5AutoPlayOnAndroid:true
                    },
            });
            
        }} // End of RevInitScript

        if (window.RS_MODULES.checkMinimal!==undefined) { window.RS_MODULES.checkMinimal();};
    </script>
    <script src="{theme_url}assets/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="4d6ba70d119531b625672e3b-|49" defer></script>
</body>

</html>