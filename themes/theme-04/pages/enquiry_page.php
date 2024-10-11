<style>
    @media only screen and (min-width: 1024px) {
        .pc-pen{
            padding-bottom: 208px;
        }
    }
</style>
<section class="ttm-row bg-img10 contact-section res-767-p-15 clearfix">
    <div class="container-fluid" id="enquiry">
        <div class="row">
            <div class="col-md-7 pt-110 res-991-pt-50 res-767-pt-0 pc-pen">
                <div class="contact-form ttm-bgcolor-white spacing-2 box-shadow position-relative z-2 res-767-m-0">
                    <div class="section-title with-desc clearfix">
                        <div class="title-header">
                            <h2 class="title">{enquiry_form_title}</h2>
                        </div>
                        <div class="title-desc">{enquiry_form_description}</div>
                    </div>
                    <form id="submitGETINTOUCH" method="POST">
                        <input type="hidden" name="type" value="get_in_touch">

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="name" id="name" name="name" class="form-control"
                                        placeholder="Your Name..." required="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Your Email Address...">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input name="mobile" id="phone" type="tel" maxlength="10" minlength="10"
                                        placeholder="Your phone number" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input required id="subject" placeholder="Your Subject" name="subject" type="text"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <textarea required="required" placeholder="Your Message" class="form-control"
                                        id="description" name="message" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div id="alert-msg" class="alert-msg text-center"></div>
                            </div>
                            <div class="col-md-4 text-center">
                                <button value="submit" type="submit"
                                    class="ttm-btn ttm-btn-color-skincolor ttm-btn-style-fill"
                                    style="line-height: 36px; width: 100%;">
                                    SUBMIT NOW
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5 res-767-pt-15">
                <img src="{assets}{enquiry_form_image}" class="img-fluid h-100" alt="{title} Image">
            </div>
        </div>
    </div>
</section>