<!-- Divider: Reservation Form -->
<section id="reservation" class="parallax layer-overlay overlay-theme-colored-9"
    data-bg-img="{base_url}upload/{reservation_page_bg_image}" data-parallax-ratio="0.4">
    <div class="container">
        <div class="row">
            <div class="col-md-8 sm-text-center">
                <h3 class="text-white mt-30 mb-0"><?=ES('reservation_page_subtitle')?></h3>
                <h2 class="text-theme-colored2 font-54 mt-0"><?=ES('reservation_page_title')?></h2>
                <p class="text-gray-darkgray font-15 pr-90 pr-sm-0 mb-sm-60">
                    <?=ES('reservation_page_description')?></p>
                <div class="row mt-30 sm-text-center">
                    <?php

                    $our_counters = [
                        'first_counter' => 'Happy Students',
                        'secound_counter' => 'Approved Courses',
                        'third_counter' => 'Certified Teachers',
                        'forth_counter' => 'Graduate Students',
                    ];
                    foreach ($our_counters as $index => $counter) {
                        $title = $this->SiteModel->get_setting($index . '_text', $counter);
                        $value = $this->SiteModel->get_setting($index . '_value');
                        $icon = $this->SiteModel->get_setting($index . '_icon');
                        preg_match_all('/\d+/', $value, $matches);

                        $numbers = $matches[0];
                        $counter = '';
                        $plus_sign = $value;
                        if ($numbers) {
                            $counter = $numbers[0];
                            $plus_sign = str_replace($counter, '', $plus_sign);
                        }
                        echo '
                            <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                                <div class="funfact">
                                    <i class="' . $icon . ' mb-20 text-theme-colored2"></i>
                                    <h2 
                                        class="text-white font-38 font-weight-400 mt-0 mb-15">
                                        <span data-animation-duration="2000" class="animate-number " data-value="' . $counter . '">0</span>
                                        <span>' . $plus_sign . '</span>
                                    </h2>
                                    <h5 class="text-white text-uppercase">' . $title . '</h5>
                                </div>
                            </div>   
                            ';
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-30 mt-0 bg-dark-transparent-2">
                    <h3 class="title-pattern mt-0"><span class="text-white">Request <span
                                class="text-theme-colored2">Information</span></span></h3>
                    <!-- Appilication Form Start-->
                    <form class="reservation-form mt-20" id="reservation_form" method="post" action=""
                        novalidate="novalidate">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group mb-20">
                                    <input placeholder="Enter Name" id="reservation_name" name="name" required=""
                                        class="form-control" aria-required="true" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-20">
                                    <input placeholder="Email" id="reservation_email" name="email" class="form-control"
                                        required="" aria-required="true" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-20">
                                    <input placeholder="Phone" id="reservation_phone" name="mobile" class="form-control"
                                        required="" aria-required="true" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mb-20">
                                    <input required="required" placeholder="Course Name" class="form-control"
                                        name="course_name" type="text" id="course_name" />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea placeholder="Enter Message" rows="3" class="form-control required"
                                        name="message" id="form_message" aria-required="true"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mb-0 mt-10">
                                    <button type="submit"
                                        class="btn btn-colored btn-theme-colored2 text-white btn-lg btn-block"
                                        data-loading-text="Please wait...">Submit Request</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Application Form End-->
                    <!-- Application Form Validation Start-->
                    <script type="text/javascript">
                        $("#reservation_form").validate({
                            submitHandler: function (form) {
                                var form_btn = $(form).find('button[type="submit"]');
                                var form_result_div = '#form-result';
                                $(form_result_div).remove();
                                form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                                var form_btn_old_msg = form_btn.html();
                                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                                $.AryaAjax({
                                    url: 'website/contact-us-action',
                                    data: new FormData(form),
                                    success_message: 'Thank you for contact with us.',
                                    // page_reload: true
                                }).then((e) => {
                                    // log(e);
                                    if (e.status == 'true') {
                                        $(form).find('.form-control').val('');
                                    }
                                    form_btn.prop('disabled', false).html(form_btn_old_msg);
                                    $(form_result_div).html('Thank you for contact with us.').fadeIn('slow');
                                    setTimeout(function () { $(form_result_div).fadeOut('slow') }, 6000);
                                });
                            }
                        });
                    </script>
                    <!-- Application Form Validation Start -->
                </div>
            </div>
        </div>
    </div>
</section>