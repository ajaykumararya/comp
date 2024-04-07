<style type="text/css">
    .gray-bg,
    .card,
    .form-control {
        background: #e8e8e8 url('{theme_url}assets/images/bg-acn.jpg') repeat 0 0 !important;
    }
    .card {
        box-shadow: 0 0 23px 0 gray;
    }
    .card .card {
        box-shadow: 0 0 0 0 transparent !important;
        background: transparent !important;
    }
    .dark-bg {
        background: #e8e8e8 url('{theme_url}assets/images/leafs_dark.png') repeat 0 0;
    }
    .liHead {
        background: #6c757dfa;
        padding: 5px;
    }
    .liHead>a {
        color: #fff !important;
    }
    ul li .liHead:hover>a {
        background: none !important;
    }
    ul li .liHead:hover {
        background: #6c757dfa !important;
    }
    .main-heading {
        margin-top: 45px !important
    }
    form {
        padding: 0 !important;
    }
    body{
        font-family: 'BarlowCondensed'!important;
    }
</style>
<body>
    <header id="header" class="header">
        <div class="clearfix topBar">
            <div class="container">
                <div class="clearfix row">
                    <div class="col-md-4 logoWrap">
                        <a href="#" class="logo"><img src="{base_url}upload/{logo}" alt="" width="421" height="92"></a>
                    </div>
                    <div class="col-md-8 topBar-right">
                        <div class="clearfix">
                            <ul class="topLinks">
                            <?php
                            $header_sections = $this->ki_theme->config('header_sections');
                            if ($header_sections) {
                                foreach ($header_sections as $index => $title) {
                                    // $myTitle = $this->SiteModel->get_setting($index . '_text', $title);
                                    $fields = $this->SiteModel->get_setting($index . '_links', '', true);
                                    if ($fields) {
                                        foreach ($fields as $value) {
                                            $my_index = $this->ki_theme->parse_string($value->title);
                                            $value = $value->link;
                                            echo "<li><a href='$value' target='_blank'><span>$my_index</span></a></li>";
                                        }
                                    }
                                }
                            }
                            ?>
                            </ul>
                        </div>
                        <div class="clearfix conInfo">
                            <a href="tel:{number}" class="mr-0 mr-xl-3">
                                <i class="fa fa-phone mr-xl-2"></i>
                                <span class="d-none d-xl-inline-block"> {number}</span>
                            </a>
                            <a href="mailto:{email}" class="mr-xl-3"><i class="fa fa-envelope mr-xl-2"></i> <span
                                    class="d-none d-xl-inline-block">{email}</span></a>
                            <a href="{facebook}" class="" target="_blank"><i class="fa fab fa-facebook"></i></a>
                            <a href="{twitter}" class="" target="_blank"><i class="fa fab fa-twitter"></i></a>
                            <a href="{youtube}" class=""><i class="fa fab fa-youtube"></i></a>
                            <a href="{instagram}" class=""><i class="fa fab fa-instagram"></i></a>
                            <a href="{linkedin}" class=""><i class="fa fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header><!-- /header -->
    <nav class="clearfix navbar navbar-expand-lg sticky-top">
        <div class="containerx">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-navicon"></span> Navigation
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                $pageCount = 0;
                function get_menu($items, $class = '', $liClass = '', $linkClass = 'nav-link', $boxID = '', $attr = '')
                {
                    $html = "<ul class=\"" . $class . "\" id=\"" . $boxID . "\" $attr>";
                    foreach ($items as $key => $value) {
                        $activeCss = $value['isActive'] ? 'active' : ''; //getActiveMenu($value['page_id'],'active');
                        $link = $value['link'];
                        $iconWithTExt = $value['label'];
                        if (array_key_exists('child', $value)) {
                            $ex = $class == 'dropdown-menu' ? '' : 'nav-item';
                            $ex1 = $class == 'dropdown-menu' ? 'dropdown-item' : 'nav-link dropdown-toggle';
                            $html .= '<li class="' . $activeCss . ' ' . $ex . ' dropdown"><a href="#" ' . $value['target'] . ' class="menu-css ' . $linkClass . ' ' . $ex1 . '" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $iconWithTExt . '</a>';
                        } else
                            $html .= '<li class="' . $activeCss . '"><a href="' . $link . '" ' . $value['target'] . ' class="menu-css ' . $linkClass . '">' . $iconWithTExt . '</a>';
                        if (array_key_exists('child', $value)) {
                            // $html .= '<div class="dropdown-menu">';
                            $html .= get_menu($value['child'], 'dropdown-menu', '', 'dropdown-item');
                            // $html .= '</div>';
                        }
                        $html .= "</li>";
                    }
                    $html .= "</ul>";
                    return $html;
                }
                echo get_menu($menus, 'navbar-nav mr-auto topnav');
                ?>
            </div>
        </div>
    </nav>
    {output}
    <footer class="footer clearfix spacer">
        <div class="container">
            <div class="clearfix row">
                
                    <?php
                    $footer_sections = $this->ki_theme->config('footer_sections');
                    if ($footer_sections) {
                        foreach ($footer_sections as $index => $title) {
                            $myTitle = $this->SiteModel->get_setting($index . '_text', $title);
                            echo '<div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="clearfix footCol">
                                    <h4 class="title">'.$myTitle.'</h4>
                                    <div class=" txtBox useful-links">
                                    <ul>';
                            $fields = $this->SiteModel->get_setting($index . '_links', '', true);
                            if ($fields) {
                                foreach ($fields as $value) {
                                    $my_index = $this->ki_theme->parse_string($value->title);
                                    $value = $value->link;
                                    echo "<li><a href='$value'>$my_index</a></li>";
                                }
                            }
                            echo '</ul></div></div>
                            </div>';
                        }
                    }
                    ?>
                        <!-- <h4 class="title">Sitemap</h4>
                        <div class="clearfix txtBox useful-links">
                            <ul class="">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Administration</a></li>
                                <li><a href="#">Academics</a></li>
                                <li><a href="#">Admission</a></li>
                                <li><a href="#">Activity</a></li>
                                <li><a href="#">Students</a></li>
                                <li><a href="#">IQAC</a></li>
                                <li><a href="#">Research & Publications</a></li>
                                <li><a href="#">RTI</a></li>
                            </ul>
                        </div> -->
                    <!-- </div>
                </div> -->
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="clearfix footCol">
                        <h4 class="title">Quote</h4>
                        <div class="clearfix txtBox quoteBox-wrap" id="quote-carousel">
                            <div class="quotebox">
                                <p class="quote">The highest education is that which dose not merely give us information
                                    but makes our life in harmony with all existence.</p>
                                <div class="author">
                                    <div class="prflPic">
                                        <img src="{theme_url}assets/images/Sarvepalli-Radhakrishnan.jpg" alt=""
                                            width="300" height="300">
                                    </div>
                                    <span>Sarvepalli Radhakrishnan</span>
                                </div>
                            </div>
                            <div class="quotebox">
                                <p class="quote">Be the change you want to see in the World</p>
                                <div class="author">
                                    <div class="prflPic">
                                        <img src="{theme_url}assets/images/gandhi.jpg" alt="" width="300" height="300">
                                    </div>
                                    <span>Mahatma Gandhi</span>
                                </div>
                            </div>
                            <div class="quotebox">
                                <p class="quote">When we think we learn we cease to know.</p>
                                <div class="author">
                                    <div class="prflPic">
                                        <img src="{theme_url}assets/images/tagore.jpg" alt="" width="300" height="300">
                                    </div>
                                    <span>Tagore</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 col-xl-5">
                    <div class="clearfix footCol">
                        <h4 class="title">Contact us</h4>
                        <div class="clearfix txtBox useful-links">
                            <p>{address} </p>
                            <p>{number} </p>
                            <p>{email} </p>
                            <iframe
                                src="<?=ES('google_map_url')?>"
                                width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix copyright text-center">
                <p>Copyright © {title} {YEAR}.
                    {copyright}
                </p>
            </div>
        </div>
        <style type="text/css">
            .footer {
                background: url('{theme_url}assets/images/leafs_dark.png') repeat 0 0;
                color: #efefef;
                padding-bottom: 30px;
                font-weight: 300;
            }
            .footer .useful-links ul li {
                width: 50%;
                background: url('{theme_url}assets/images/links-arrow-light.png') no-repeat 0 9px;
                padding: 0 0 0 20px;
            }
        </style>
    </footer>
    <!-- <script src="{theme_url}assets/js/jquery.min.js"></script> -->
    <!-- Bootstrap core JavaScript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script>window.jQuery || document.write('<script src="{theme_url}assets/bootstrap/js/vendor/jquery-slim.min.html"><\/script>')</script>
    <!-- <script type="text/javascript" src="{theme_url}assets/bootstrap/js/vendor/popper.min.html"></script> -->
    <script type="text/javascript" src="{theme_url}assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="{theme_url}assets/js/waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
        integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css"
        integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fitvids/1.2.0/jquery.fitvids.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-simplyscroll/2.1.1/jquery.simplyscroll.min.js"></script>
    <script type="text/javascript" src="{theme_url}assets/js/jQuerySimpleCounter.js"></script>
    <script type="text/javascript" src="{theme_url}assets/js/main.js"></script>
    <script src="{theme_url}assets/site/js/main.js"></script>
    <script src="{theme_url}assets/site/js/jquery.bxslider.js"></script>
    <script type="text/javascript">
        jQuery('#visitor-count').jQuerySimpleCounter({
            end: 552236,
            duration: 4000
        });
    </script>
</body>
</html>
