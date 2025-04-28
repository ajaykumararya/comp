<!-- ==============================================
    ** Contact Us **
    =================================================== -->
<section class="form-wrapper padding-lg">
    <div class="container">
        <form name="contact-form" id="submitGETINTOUCH">
            <div class="row input-row">
                <div class="col-sm-6">
                    <input name="name" type="text" placeholder="Name" required>
                </div>
                <div class="col-sm-6">
                    <input name="mobile" type="text" placeholder="Mobile" required>
                </div>
            </div>
            <div class="row input-row">
                <div class="col-sm-6">
                    <input name="email" type="email" placeholder="Email" required>
                </div>
                <div class="col-sm-6">
                    <input name="message" type="text" placeholder="Message" required>
                </div>
            </div>
            <div class="row" style="margin-top:8px">
                <div class="col-sm-12">
                    <button class="btn">Apply Now <span class="icon-more-icon"></span></button>
                    <div class="msg"></div>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- ==============================================
    ** Google Map **
    =================================================== -->
<section class="google-map">
    <div id="map"><iframe src="<?= ES('google_map_url') ?>" style="border:none;"></iframe></div>
    <div class="container">
        <div class="contact-detail">
            <div class="address">
                <div class="inner">
                    <h3>{title}</h3>
                    <p>{address}</p>
                </div>
                <div class="inner">
                    <h3>{number}</h3>
                </div>
                <div class="inner"> <a href="mailto:{email}">{email}</a> </div>
            </div>
            <div class="contact-bottom">
                <ul class="follow-us clearfix">
                    <li><a href="{facebook}"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="{twitter}"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{youtube}"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="{instagram}"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="{linkedin}"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>