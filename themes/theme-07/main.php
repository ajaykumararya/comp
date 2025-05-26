<!-- external javascripts -->

<script src="{theme_url}assets/js/jquery-ui.min.js"></script>
<script src="{theme_url}assets/js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="{theme_url}assets/js/jquery-plugin-collection.js"></script>
<style>
    .cart-count{
        position: ABSOLUTE;
        border: 1px solid var(--primary-color);
        top: -14px;
        line-height: 1;
        padding: 4px;
        border-radius: 50%;
        font-size: 16px;
        left: 25px;
        min-width: 25px;
        text-align: center;
        font-weight: 900;
    }
</style>

<body class="">
    <div id="wrapper" class="clearfix">
        <!-- preloader -->
        <div id="preloader">
            <div id="spinner">
                <img alt="" src="{theme_url}/assets/5.gif">
            </div>
            <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
        </div>

        <!-- Header -->
        <header id="header" class="header">
            <div class="header-top bg-theme-colored2 sm-text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="widget text-white">
                                <ul class="list-inline xs-text-center text-white">
                                    <li class="m-0 pl-10 pr-10"> <a href="#" class="text-white"><i
                                                class="fa fa-phone text-white"></i> {number}</a> </li>
                                    <li class="m-0 pl-10 pr-10">
                                        <a href="#" class="text-white"><i class="fa fa-envelope-o text-white mr-5"></i>
                                            <span>{email}</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 pr-0">
                            <div class="widget">
                                <ul class="styled-icons icon-sm pull-right flip sm-pull-none sm-text-center mt-5">
                                    <li><a href="{facebook}"><i class="fab fa-facebook text-white"></i></a></li>
                                    <li><a href="{twitter}"><i class="fab fa-twitter text-white"></i></a></li>
                                    <li><a href="{youtube}"><i class="fab fa-youtube text-white"></i></a></li>
                                    <li><a href="{instagram}"><i class="fab fa-instagram text-white"></i></a></li>
                                    <li><a href="{linkedin}"><i class="fab fa-linkedin text-white"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <ul class="list-inline sm-pull-none sm-text-center text-right text-white mb-sm-20 mt-10">
                                <?php
                                if(CHECK_PERMISSION("EBOOK")){
                                    if($this->session->has_userdata("ebook_login")){
                                        echo '<li class="m-0 pl-10">
                                                <a href="{base_url}ebook/my-account" class="text-white"><i class="fa fa-home"></i> My Account</a>                                        
                                              </li>';  
                                    }
                                    else{
                                    echo '<li class="m-0 pl-10"> 
                                            <a href="#" data-toggle="modal" data-target="#loginModel" class="text-white">
                                                <i class="far fa-user mr-5 text-white"></i>
                                            Login</a> 
                                    </li>
                                    <li class="m-0 pl-10"> 
                                        <a href="#" class="text-white"  data-toggle="modal" data-target="#registerModel">
                                            <i class="fas fa-user-plus mr-5 text-white"></i>
                                        Register</a> 
                                    </li>';
                                    }
                                }
                                else{
                                    $data = $this->SiteModel->get_contents('our-header-button');
                                    if ($data->num_rows()):
                                        $index = 1;
                                        foreach ($data->result() as $row):
                                            echo '<li class="m-0 pl-10"> 
                                                        <a href="' . $row->field3 . '" class="text-white">
                                                            <i class="' . $row->field1 . ' mr-5 text-white"></i>
                                                        ' . $row->field2 . '</a> 
                                                </li>';
                                        endforeach;
                                    endif;
                                }
                                ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle p-0 bg-lightest xs-text-center">
                <div class="container pt-20 pb-20">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <a class="menuzord-brand pull-left flip sm-pull-center mb-15" href="{base_url}"><img
                                    src="<?= logo() ?>" alt=""></a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8">
                            <div class="row">
                                <?php
                                $our_counters = [
                                    'first_header' => 'Call us for more details',
                                    'secound_header' => 'Call us for more details',
                                    'third_header' => 'Company Location',
                                ];
                                foreach ($our_counters as $index => $counter) {
                                    $title = $this->SiteModel->get_setting($index . '_text', $counter);
                                    $value = $this->SiteModel->get_setting($index . '_value');
                                    $icon = $this->SiteModel->get_setting($index . '_icon');
                                    ?>
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="widget no-border sm-text-center mt-10 mb-10 m-0">
                                            <i
                                                class="<?= $icon ?> text-theme-colored2 font-48 mt-0 mr-15 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i>
                                            <a href="#" class="font-12 text-gray text-uppercase"><?= $title ?></a>
                                            <h5 class="font-13 text-black m-0"> <?= $value ?></h5>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-nav">
                <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
                    <div class="container">
                        <nav id="menuzord" class="menuzord default menuzord-responsive">
                            <?php
                            $pageCount = 0;
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
                                        $html .= get_menu($value['child'], 'dropdown', '', '');
                                        // $html .= '</div>';
                                    }
                                    $html .= "</li>";
                                }
                                $html .= "</ul>";
                                return $html;
                            }
                            // echo uri_string();
                            // pre($menus);
                            echo get_menu($menus, 'menuzord-menu');
                            echo '<div class="pull-right sm-pull-none mb-sm-15" style="position:relative">
                            
                            <a href="javascript:void()" data-target="#popupcp2016" data-toggle="modal" class="cart-btn">
                                <i class="fab fa-wpforms"></i>
                            </a>
                            
                            ';
                            if (CHECK_PERMISSION('EBOOK')) {
                                $this->load->library('ebook/ebook_cart');
                                ?>
                                <a href="{current_url}?ebook=cart" class="cart-btn" style="position:relative;">
                                    <i class="fa fa-shopping-cart"></i>
                                    <p class="cart-count"><?=$this->ebook_cart->count()?></p>
                                </a>

                                <?php
                            } else if (($rightButtonText = ES('menu_right_button_title', 0))) {
                                ?>
                                    
                                        <a class="btn btn-colored btn-theme-colored2 mt-15 mt-sm-10 pt-10 pb-10 ajaxload-popup"
                                            href="<?= ES('menu_right_button_link', '#') ?>"><?= $rightButtonText ?></a>
                                    
                                <?php
                            }
                            ?>
</div>

                        </nav>
                    </div>
                </div>
        </header>

        <!-- Start main-content -->
        <div class="main-content">
            {output}
        </div>


        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="loginModel" tabindex="-1" role="dialog" aria-labelledby="loginModel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="loginModel">User Login</h4>
                </div>
                <div class="modal-body">
                    <form action="" id="ebook_userogin">
                        <div class="form-group">
                            <label for="username">Mobile</label>
                            <input type="text" name="mobile" placeholder="Enter Mobile" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Password</label>
                            <input type="text" name="password" placeholder="Enter Password" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" onclick="$('#ebook_userogin').submit()" class="btn btn-dark btn-flat">Login</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="registerModel" tabindex="-1" role="dialog" aria-labelledby="loginModel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="loginModel">User Registeration</h4>
                </div>
                <div class="modal-body">
                   <form action="" id="ebook_userregisteration">
                        <div class="form-group">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" placeholder="Enter Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Mobile</label>
                            <input type="number" name="mobile" placeholder="Enter Mobile" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password" placeholder="Enter Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" placeholder="Enter Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Address</label>
                            <textarea name="address" placeholder="Enter Address" class="form-control"></textarea>
                        </div>
                   </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-dark btn-flat" onclick="$('#ebook_userregisteration').submit()">Register Now</button>
                </div>
                </div>
            </div>
        </div>




        <!-- Footer -->
        <footer id="footer" class="footer" data-bg-color="#212331">
            <div class="container pt-70 pb-40">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            <img class="mt-5 mb-20" alt="" src="<?= logo() ?>">
                            <!-- <p>203, Envato Labs, Behind Alis Steet, Melbourne, Australia.</p> -->
                            <ul class="list-inline mt-5">
                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored2 mr-5"></i> <a
                                        class="text-gray" href="#">{number}</a> </li>
                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored2 mr-5"></i>
                                    <a class="text-gray" href="#"><span>{email}</span></a>
                                </li>
                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored2 mr-5"></i> <a
                                        class="text-gray domain" href="#">
                                        <script>
                                            $(document).ready(function () {
                                                let domain = window.location.hostname;
                                                if (!domain.startsWith("www.")) {
                                                    domain = "www." + domain;
                                                }
                                                $('a.domain').text(domain);
                                            });
                                        </script>
                                    </a> </li>
                            </ul>
                            <ul class="styled-icons icon-sm icon-bordered icon-circled clearfix mt-10">
                                <li><a href="{facebook}"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="{twitter}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{youtube}"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="{instagram}"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="{linkedin}"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    $footer_sections = $this->ki_theme->config('footer_sections');
                    if ($footer_sections) {
                        foreach ($footer_sections as $index => $title) {
                            $myTitle = $this->SiteModel->get_setting($index . '_text', $title);
                            echo '<div class="col-sm-3 col-md-3">
                                    <div class="widget dark">
                                        <h4 class="widget-title line-bottom-theme-colored-2">' . $myTitle . '</h4>
                                        <ul class="angle-double-right list-border">';
                            $fields = $this->SiteModel->get_setting($index . '_links', '', true);
                            if ($fields) {
                                foreach ($fields as $value) {
                                    $my_index = $this->ki_theme->parse_string($value->title);
                                    $value = $value->link;
                                    echo "<li><a href='$value'>$my_index</a></li>";
                                }
                            }
                            echo '</ul></div>
                                </div>';
                        }
                    }
                    ?>
                    
                </div>
            </div>
            <div class="footer-bottom" data-bg-color="#2b2d3b">
                <div class="container pt-20 pb-20">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="font-12 text-black-777 m-0 sm-text-center">
                                Copyright &copy; {title} {copyright}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>


        <!-- Modal 3 -->
        <div id="popupcp2016" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: var(--primary-color); color: #fff;">
                        <a href="#" class="fancybox-item fancybox-close" data-dismiss="modal"></a>
                        <h2 class="modal-title">
                            <strong>Enquiry Form</strong>
                        </h2>

                    </div>
                    <div class="modal-body">
                        <form id="submitGETINTOUCH">
                            <div class="form-group">
                                <label>Are You a</label>
                                <select class="form-control" name="subject" id="areYouA" required>
                                    <option value="">Select Are you a</option>
                                    <option value="Training Center">
                                        Training Center</option>
                                    <option value="Student">
                                        Student
                                    </option>
                                    <option value="Employer">Employer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control" required type="text" placeholder="Full Name" name="name" id="fullName" />
                            </div>
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input class="form-control" required type="text" placeholder="97XXXXXXXX" name="mobile"
                                    id="mobileNumber" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" required type="email" placeholder="example@gsidc.org.in"
                                    name="email" id="email" />
                            </div>
                            <div class="form-group">
                                <label>State</label>
                                <input class="form-control" required type="text" placeholder="State" name="state" id="state" />
                            </div>
                            <div class="form-group">
                                <label>District</label>
                                <input class="form-control" required type="text" placeholder="District" name="city" id="district" />
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" required id="message" name="message"></textarea>

                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit">Submit</button>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal 3 -->
    </div>
    <!-- end wrapper -->

    <!-- Footer Scripts -->
    <!-- JS | Custom script for all pages -->
    <script src="{theme_url}assets/js/custom.js"></script>
    <script>
        $(document).ready(function () {
            $("li.active").parents('li').addClass("active");
        });
    </script>
</body>

</html>