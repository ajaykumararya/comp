<section id="counter" class="sec_padd">
    <div class="container">
        <div class="text-center">
            <h1>{get_in_touch_title}</h1>
            <div class="mt-separator_center"><img src="{theme_url}assets/images/title.webp" alt="graduation.webp">
            </div>
        </div>
        <div class="container">

            <div class="row no-gutters" style="box-shadow: 5px 10px 10px 0 black;
    border-radius: 14px;
    border: 1px solid black;">
                <div class="col-md-6 animation animated fadeInLeft" style="padding:20px" data-animation="fadeInLeft"
                    data-animation-delay="0.02s" style="animation-delay: 0.02s; opacity: 1;">
                    <div class="login-box">
                        <h2>ENQUIRE NOW</h2>
                        <form id="submitGETINTOUCH">
                            <input type="hidden" name="type" value="get_in_touch">

                            <div class="user-box">
                                <input required="required" id="first-name" name="name" type="text">
                                <label for="">Enter Name</label>
                            </div>
                            <div class="user-box">
                                <input required="required" id="email" name="email" type="email">
                                <label for="">Enter Email</label>
                            </div>
                            <div class="user-box">
                                <input required="required" id="phone" name="mobile" type="tel">
                                <label for="">Mobile</label>
                            </div>
                            <div class="user-box">
                                <input required id="subject" name="subject" type="text">
                                <label for="">Subject</label>
                            </div>
                            <div class="user-box">
                                <textarea required="required" id="description" name="message" rows="3"></textarea>
                                <label for="">Message</label>
                            </div>
                            <div class="col-lg-12 btn-wrapper btn-wrapper2">
                                <button type="submit" title="Submit Your Message!" class="btn btn-default"
                                    id="submitButton" name="submit" value="Submit">
                                    <span>Submit</span>
                                </button>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div id="alert-msg" class="alert-msg text-center"></div>
                            </div>

                            
                        </form>
                    </div>
                </div>
                <div class="col-md-6 animation animated fadeInRight" data-animation="fadeInRight"
                    data-animation-delay="0.4s" style="animation-delay: 0.4s; opacity: 1;height:100%">
                    <div class="contact_map map_radius_rtrb overflow-hidden h-100">
                        <iframe src="{google_map_url}" allowfullscreen=""></iframe>


                    </div>
                </div>
            </div>
        </div>
</section>

<style>
    .contact_map iframe {
        height: 600px;
        width: 100%;
        display: block;
    }

    iframe {
        border: 0;
    }

    .map_radius_rtrb {
        border-radius: 0 10px 10px 0;
    }

    .h-100 {
        height: 100% !important;
    }

    .overflow-hidden {
        overflow: hidden !important;
    }
</style>