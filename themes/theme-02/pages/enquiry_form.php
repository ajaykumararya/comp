<!-- START SECTION REGISTER -->
<section class="pb-0 background_bg bg_blue_dark" data-img-src="https://www.rgycsm.org/assets/images/pattern_bg.png">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-6 col-md-7">
                <div class="register_form radius_all_10 text_white padding_eight_all animation"
                    data-animation="fadeInLeft" data-animation-delay="0.02s">
                    <div class="heading_s1 heading_light">
                        <h2>
                            <?= $this->SiteModel->get_setting('enquiry_form_title', 'Get A Free Online <span>Courses</span>') ?>
                        </h2>
                    </div>
                    <form method="post" name="enq" class="pt-md-2 form_transparent">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input required="required" id="name" placeholder="Enter Name *" class="form-control" name="name"
                                    type="text" />
                            </div>
                            <div class="form-group col-sm-6">
                                <input required="required" id="email" placeholder="Enter Email *" class="form-control" name="email"
                                    type="email" />
                            </div>
                            <div class="form-group col-sm-6">
                                <input required="required" name="" placeholder="Enter Phone No *" class="form-control"
                                    name="mobile" type="tel" id="mobile" />
                            </div>
                            <div class="form-group col-sm-6">
                                <input required="required" placeholder="Course Name" class="form-control" name="phone"
                                    type="text" id="course_name" />
                            </div>
                            <div class="form-group col-sm-12">
                                <textarea required="required" placeholder="Message *" class="form-control"
                                    name="message" id="message" rows="4"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" title="Submit Your Message!" class="btn btn-default" name="submit"
                                    value="Submit" onclick="return validation()">
                                    Submit Now
                                </button>
                            </div>
                            <div class="col-sm-12">
                                <div id="alert-msg" class="alert-msg text-center"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="large_divider"></div>
            </div>
            <div class="col-lg-6 col-md-5">
                <div class="text-center animation" data-animation="fadeInRight" data-animation-delay="0.03s">
                    <?php
                    $image = $this->SiteModel->get_setting('enquiry_form_image');
                    $myImage = '{theme_url}assets/images/girl_img.png';
                    if ($image) {
                        $myImage = base_url('upload/' . $image);
                    }
                    echo '<img src="' . $myImage . '" alt="girl_img" />';
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION REGISTER -->