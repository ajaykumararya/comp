<section class="small_pb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="text-center animation animated fadeInUp" data-animation="fadeInUp"
                    data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                    <div class="heading_s1 text-center">
                        <h2 class="main-heading center-heading">{get_in_touch_title}</h2>
                    </div>

                    <div class="small_divider"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="box_shadow1 radius_all_10">
                    <div class="row no-gutters">
                        <div class="col-md-6 animation animated fadeInLeft" data-animation="fadeInLeft"
                            data-animation-delay="0.02s" style="animation-delay: 0.02s; opacity: 1;">
                            <div class="padding_eight_all">
                                <div class="field_form">
                                    <form method="post" id="submitGETINTOUCH">
                                        <input type="hidden" name="type" value="get_in_touch">
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <input required="required" placeholder="Enter Name" id="first-name"
                                                    class="form-control" required name="name" type="text">
                                            </div>
                                            <div class="form-group col-12">
                                                <input required="required" placeholder="Enter Email" id="email"
                                                    class="form-control" required name="email" type="email">
                                            </div>
                                            <div class="form-group col-12">
                                                <input required="required" placeholder="Enter Phone No." id="phone"
                                                    class="form-control" required name="mobile" type="tel">
                                            </div>
                                            <div class="form-group col-12">
                                                <input placeholder="Enter Subject" id="subject" class="form-control"
                                                    name="subject" required type="text">
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <textarea required="required" placeholder="Message" id="description"
                                                    class="form-control" name="message" rows="3"></textarea>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" title="Submit Your Message!"
                                                    class="btn btn-default" id="submitButton" name="submit"
                                                    value="Submit">
                                                    Submit
                                                </button>
                                            </div>
                                            <div class="col-lg-12 text-center">
                                                <div id="alert-msg" class="alert-msg text-center"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 animation animated fadeInRight" data-animation="fadeInRight"
                            data-animation-delay="0.4s" style="animation-delay: 0.4s; opacity: 1;">
                            <div class="contact_map map_radius_rtrb overflow-hidden h-100">
                                <iframe
                                    src="{google_map_url}"
                                    allowfullscreen=""></iframe>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="small_pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="text-center animation animated fadeInUp" data-animation="fadeInUp"
                    data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                    <div class="heading_s1 text-center">
                        <h2 class="main-heading center-heading">Contact Information</h2>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="overlay_bg_danger_90 icon_box text-center text_white radius_all_10 background_bg animation animated fadeInUp"
                    data-img-src="{theme_url}assets/images/address_img.jpg" data-animation="fadeInUp" data-animation-delay="0.02s"
                    style="background-image: url(&quot;{theme_url}assets/images/address_img.jpg&quot;); background-position: center center; background-size: cover; animation-delay: 0.02s; opacity: 1;">
                    <div class="box_icon mb-3">
                        <img src="{theme_url}assets/images/map_icon.png" alt="map_icon">
                    </div>
                    <div class="intro_desc">
                        <h5>Head Office</h5>
                        <p>{address}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="overlay_bg_light_green_90 icon_box text-center text_white radius_all_10 background_bg animation animated fadeInUp"
                    data-img-src="{theme_url}assets/images/call_img.jpg" data-animation="fadeInUp" data-animation-delay="0.03s"
                    style="background-image: url(&quot;{theme_url}assets/images/call_img.jpg&quot;); background-position: center center; background-size: cover; animation-delay: 0.03s; opacity: 1;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box_icon mb-3">
                                <img src="{theme_url}assets/images/phone_icon.png" alt="phone_icon">
                            </div>
                            <div class="intro_desc">
                                <h5>Call Us</h5>
                                <p>{number}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="box_icon mb-3">
                                <img src="{theme_url}assets/images/email_icon.png" alt="email_icon">
                            </div>
                            <div class="intro_desc">
                                <h5>Email</h5>
                                <p>{email}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>