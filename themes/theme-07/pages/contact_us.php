<!-- Divider: Contact -->
<section class="divider">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="line-bottom mt-0 mb-30">Interested in discussing?</h3>

                <!-- Contact Form -->
                <form id="contact_form" class="" action="" method="post">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Name <small>*</small></label>
                                <input name="name" class="form-control" type="text" placeholder="Enter Name"
                                    required="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email <small>*</small></label>
                                <input name="email" class="form-control required email" type="email"
                                    placeholder="Enter Email">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Course <small>*</small></label>
                                <input name="course_name" class="form-control required" type="text"
                                    placeholder="Enter Subject">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="mobile" class="form-control" type="text" placeholder="Enter Phone">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" class="form-control required" rows="5"
                            placeholder="Enter Message"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5"
                            data-loading-text="Please wait...">Send your message</button>
                        <button type="reset" class="btn btn-default btn-flat btn-theme-colored">Reset</button>
                    </div>
                </form>

                <!-- Contact Form Validation-->
                <script type="text/javascript">
                    $("#contact_form").validate({
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
                            }).then((data) => {
                                if (data.status == 'true') {
                                    $(form).find('.form-control').val('');
                                }
                                form_btn.prop('disabled', false).html(form_btn_old_msg);
                                $(form_result_div).html(data.message).fadeIn('slow');
                                setTimeout(function () { $(form_result_div).fadeOut('slow') }, 6000);
                            });
                            //   $(form).ajaxSubmit({
                            //     dataType:  'json',
                            //     success: function(data) {
                            //       if( data.status == 'true' ) {
                            //         $(form).find('.form-control').val('');
                            //       }
                            //       form_btn.prop('disabled', false).html(form_btn_old_msg);
                            //       $(form_result_div).html(data.message).fadeIn('slow');
                            //       setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                            //     }
                            //   });
                        }
                    });
                </script>
            </div>
            <div class="col-md-6">
                <h3 class="line-bottom mt-0"><?= ES($type . '_page_title') ?></h3>
                <p><?= ES($type . '_page_description') ?></p>
                <ul class="styled-icons icon-dark icon-sm icon-circled mb-20">
                    <li><a href="{facebook}" data-bg-color="#3B5998"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="{twitter}" data-bg-color="#02B0E8"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{instagram}" data-bg-color="#833AB4"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="{youtube}" data-bg-color="#FF0000"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="{linkedin}" data-bg-color="#0077B5"><i class="fab fa-linkedin"></i></a></li>
                </ul>

                <div class="icon-box media mb-15"> <a class="media-left pull-left flip mr-20" href="#"> <i
                            class="pe-7s-map-2 text-theme-colored"></i></a>
                    <div class="media-body">
                        <h5 class="mt-0">Our Office Location</h5>
                        <p>{address}</p>
                    </div>
                </div>
                <div class="icon-box media mb-15"> <a class="media-left pull-left flip mr-15" href="tel:{number}"> <i
                            class="pe-7s-call text-theme-colored"></i></a>
                    <div class="media-body">
                        <h5 class="mt-0">Contact Number</h5>
                        <p><a href="tel:{number}">{number}</a></p>
                    </div>
                </div>
                <div class="icon-box media mb-15"> <a class="media-left pull-left flip mr-15" href="mailto:{email}"> <i
                            class="pe-7s-mail text-theme-colored"></i></a>
                    <div class="media-body">
                        <h5 class="mt-0">Email Address</h5>
                        <p><a href="mailto:{email}"><span>{email}</span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Divider: Google Map -->
<section>
    <div class="container-fluid pt-0 pb-0">
        <div class="row">

            <!-- Google Map HTML Codes -->
            <iframe src="{google_map_url}" style="height: 500px;" allowfullscreen=""></iframe>

        </div>
    </div>
</section>