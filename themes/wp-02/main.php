<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>


<style>
    body,
    li {
        font-family: Inter, Helvetica, sans-serif !important;
    }

    .page-title {
        background-color: white;
    }

    .row {
        /* justify-content:space-around!important; */
    }

    .studiare-navigation ul.menu>li>a i,
    .studiare-navigation .menu>ul>li>a i {
        margin-left: 0px !important;
    }

    a {

        text-decoration: none;
    }

    .studiare-navigation ul.menu a,
    .studiare-navigation .menu a {
        color: #464749 !important;
        text-decoration: none;
        -webkit-transition: all .3s ease;
        transition: all .3s ease;
    }

    .studiare-navigation ul.menu a:hover,
    .studiare-navigation .menu a:hover {
        color: #0056b3 !important;
    }
</style>

<body
    class="home wp-singular page-template-default page page-id-17 wp-theme-studiare theme-studiare woocommerce-no-js wpb-js-composer js-comp-ver-8.1 vc_responsive">
    <div class="off-canvas-navigation">

        <div class="off-canvas-main">
            <nav class="menu-main-menu-container">
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
                echo get_menu($menus, 'mobile-menu', 'nav-item', 'nav-link', 'menu-main-menu', '');
                ?>
            </nav>
        </div>
    </div>

    <div class="wrap">
        <div class="top-bar top-bar-color-light">
            <div class="container">
                <div class="row">
                    <div class="top-bar-col">
                        <ul class="top-bar-contact-info">
                            <li><a href="tel:{number}"><i class="material-icons">phone</i> {number}</a>
                            </li>
                            <li><a href="mailto:{email}"><i class="material-icons">email</i>
                                    {email}</a></li>
                        </ul>
                    </div>
                    <div class="top-bar-col top-bar-right">
                        <div class="top-bar-links">
                            <div class="top-bar-secondary-menu">
                                <nav class="menu-top-menu-container">
                                    <ul id="menu-top-menu" class="top-menu">
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
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <header class="site-header">
            <div class="container">
                <div class="site-header-inner">
                    <div class="navigation-left" style="justify-content: space-between;">
                        <div class="site-logo">
                            <div class="studiare-logo-wrap">
                                <a href="index.html" class="studiare-logo studiare-main-logo" rel="home">
                                    <img src="{base_url}assets/file/{logo}" style="width:102px" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="site-navigation studiare-navigation" role="navigation">
                            <?php
                            function get_menu1($items, $ulClass = 'menu', $liClass = 'menu-item', $linkClass = '', $boxID = '', $attr = '')
                            {
                                $html = "<ul class=\"$ulClass\" id=\"$boxID\" $attr>";

                                foreach ($items as $value) {
                                    // Active class check
                                    $activeCss = ((defined('CURRENT_PAGE_ID') && constant('CURRENT_PAGE_ID') == $value['id']) || !empty($value['isActive']))
                                        ? ' current-menu-item current_page_item'
                                        : '';

                                    // Agar child hai to uska class add karein
                                    $hasChild = (array_key_exists('child', $value) && !empty($value['child']));
                                    $hasChildClass = $hasChild ? ' menu-item-has-children' : '';

                                    // Final li class
                                    $liFullClass = trim("$liClass menu-item-type-custom menu-item-object-custom $hasChildClass $activeCss");

                                    // Link text
                                    $linkText = $value['label'];
                                    $linkHref = $value['link'];
                                    $linkTarget = !empty($value['target']) ? ' target="' . $value['target'] . '"' : '';

                                    // Agar child hai to arrow icon add karein
                                    if ($hasChild) {
                                        $linkText .= ' <i class="fa fa-angle-down"></i>';
                                    }

                                    // LI + A start
                                    $html .= "<li class=\"$liFullClass\"><a href=\"$linkHref\" $linkTarget>$linkText</a>";

                                    // Child menu
                                    if ($hasChild) {
                                        $html .= get_menu1($value['child'], 'sub-menu', 'menu-item', $linkClass, '', '');
                                    }

                                    // Close li
                                    $html .= "</li>";
                                }

                                $html .= "</ul>";
                                return $html;
                            }




                            // Example call
                            echo get_menu1($menus, 'menu', 'menu-item', '', 'menu-main-menu-1', '');
                            ?>

                        </div>
                    </div>
                    <!-- <div class="header-button-link">
                        <a href="#" class=" btn btn-filled"><i class="material-icons">perm_identity</i> Get Started</a>
                    </div>  -->


                    <a href="#" class="mobile-nav-toggle"> <span class="the-icon"></span> </a>
                </div>
            </div>
        </header>
        <!-- <div class="search-capture-click"></div> -->

        {output}


        <footer id="footer" class="site-footer footer-color-light">
            <div class="container">
                <div class="footer-widgets footer-three-col">
                    <div class="footer-widgets-inner">
                        <div class="footer-widget-col">
                            <div id="block-14" class="widget widget_block widget_media_image">

                            </div>
                            <div id="block-15" class="widget widget_block widget_text">
                                <p>We named our theme Studiare because to us,<br>the best brands are simple ones. Brands
                                    thrive<br>on their ability to be understood.</p>
                            </div>
                            <div id="contacts-3" class="widget widget_contacts">
                                <ul>
                                    <li>
                                        <div class="contact-info-icon"><i class="material-icons">location_on</i></div>
                                        <div class="contact-info-value">127 Elizabeth Street, NY New York</div>
                                    </li>
                                    <li>
                                        <div class="contact-info-icon"><i class="material-icons">phone_android</i></div>
                                        <div class="contact-info-value">+55-11-3097-0508</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-widget-col">
                            <div id="nav_menu-2" class="widget widget_nav_menu">
                                <h5 class="widget-title">Quick Links</h5>
                                <div class="menu-footer-menu-container">
                                    <ul id="menu-footer-menu" class="menu">
                                        <li id="menu-item-381"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-381">
                                            <a href="contact/index.html">Contact</a>
                                        </li>
                                        <li id="menu-item-382"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-382">
                                            <a href="pricing-packages/index.html">Pricing Packages</a>
                                        </li>
                                        <li id="menu-item-383"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-383">
                                            <a href="about-us/index.html">About Us</a>
                                        </li>
                                        <li id="menu-item-384"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-384">
                                            <a href="courses/index.html">Courses</a>
                                        </li>
                                        <li id="menu-item-385"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-385">
                                            <a href="news/index.html">News</a>
                                        </li>
                                        <li id="menu-item-386"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-17 current_page_item menu-item-386">
                                            <a href="index.html" aria-current="page">Home</a>
                                        </li>
                                        <li id="menu-item-387"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-387">
                                            <a href="sample-page/index.html">Sample Page</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="footer-widget-col">
                            <div id="mc4wp_form_widget-2" class="widget widget_mc4wp_form_widget">
                                <h5 class="widget-title">Newsletter</h5>

                                <!-- Mailchimp for WordPress v4.10.5 - https://wordpress.org/plugins/mailchimp-for-wp/ -->
                                <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-380" method="post" data-id="380"
                                    data-name="Newsletter">
                                    <div class="mc4wp-form-fields">
                                        <p>Don’t miss anything, sign up now and keep informed about our company.</p>
                                        <div class="newsletter-form"> <input class="form-control" type="email"
                                                name="EMAIL" placeholder="Enter Your E-mail" required=""> <input
                                                type="submit" value="Subscribe" /></div>
                                    </div><label style="display: none !important;">Leave this field empty if you're
                                        human: <input type="text" name="_mc4wp_honeypot" value="" tabindex="-1"
                                            autocomplete="off" /></label><input type="hidden" name="_mc4wp_timestamp"
                                        value="1756545767" /><input type="hidden" name="_mc4wp_form_id"
                                        value="380" /><input type="hidden" name="_mc4wp_form_element_id"
                                        value="mc4wp-form-1" />
                                    <div class="mc4wp-response"></div>
                                </form><!-- / Mailchimp for WordPress Plugin -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright copyrights-layout-default">
                <div class="container">
                    <div class="copyright-inner">
                        <div class="copyright-cell">
                            <div class="site-info">&copy; 2025 Studiare. All rights reserved</div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div> <!-- end .wrap -->

    <a id="back-to-top" class="back-to-top"> <i class="material-icons">keyboard_arrow_up</i></a>



</body>
<script>
    $(document).ready(function () {
        $('.mobile-nav-toggle,.off-canvas-overlay').click(function (e) {
            e.preventDefault();
            $('body').toggleClass('off-canvas-open');
        })
        $(document).on("click", '.playVideo', function (e) {
            e.preventDefault();
            var videoId = $(this).data('id');
            if (videoId) {
                var iframe = `
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1"
                            frameborder="0"
                            allow="autoplay; encrypted-media"
                            allowfullscreen></iframe>
                    </div>
                `;
            }
            else
                var iframe = '<h3 class="text-center">No Video Link Found</h3>';
            $.confirm({
                title: false,
                content: iframe,
                boxWidth: "80%",
                useBootstrap: false,
                backgroundDismiss: true,  
                buttons: false,             
                onOpenBefore: function () {
                    this.$el.find('.jconfirm-box').css({
                        "background": "transparent",
                        "box-shadow": "none",
                        "border": "none",
                        "padding": "0"
                    });
                }
            });
        });
    })
</script>