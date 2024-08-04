<?php
if (in_array(PATH, ['haptronworld'])) {
    ?>
    <link rel="stylesheet" href="{base_url}assets/float-icons.css">
    <style>
        #button-contact-vr img{
            border : 0 !important
        }
    </style>
    <div id="button-contact-vr" class="" style="right:0">
        <div id="gom-all-in-one"><!-- v3 -->
            <!-- whatsapp -->
            <div id="whatsapp-vr" class="button-contact">
                <div class="phone-vr">
                    <div class="phone-vr-circle-fill"></div>
                    <div class="phone-vr-img-circle">
                        <a target="_blank" href=" https://wa.me/{whatsapp_number}">
                            <img alt="Whatsapp"
                                src="{base_url}assets/whatsapp.png">
                        </a>
                    </div>
                </div>
            </div>
            <!-- end whatsapp -->
        </div>
    </div>
    <div id="button-contact-vr" class="" style="left:0">
        <div id="gom-all-in-one"><!-- v3 -->

            <!-- Phone -->
            <div id="phone-vr" class="button-contact">
                <div class="phone-vr">
                    <div class="phone-vr-circle-fill"></div>
                    <div class="phone-vr-img-circle">
                        <a href="tel:{number}">
                            <img alt="Phone"
                                src="{base_url}assets/phone.png">
                        </a>
                    </div>
                </div>
            </div>
            <!-- end phone -->

        </div><!-- end v3 class gom-all-in-one -->


    </div>

    <?php
}
?>