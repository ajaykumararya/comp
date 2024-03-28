<!-- END SECTION CLIENT LOGO -->
<section class="small_pt small_pb">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center">
                        <h2 class="main-heading center-heading">Our Certificates Are</h2>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .certificates_size {
                width: 200px;
            }
            .associated_size {
                width: 150px;
            }
        </style>
        <div class="row">
            <div class="col-md-12">
                <div class="marquee marquee--nezuko" data-speed=25>
                    <div class="marquee__row marquee__row--nezuko">
                        <?php
                        $get = $this->SiteModel->content_certificates();
                        foreach($get->result() as $row){
                            echo '<img class="marquee__item marquee__item--nezuko certificates_size"
                            src="{base_url}upload/'.$row->image.'" alt="'.$row->title.'" data-clone=0>
                        ';
                        }
                        ?>
                        <!-- <img class="marquee__item marquee__item--nezuko certificates_size"
                            src="{theme_url}assets/images/certificates/ISO2015.jpg" alt="Olympia Group" data-clone=0>
                        <img class="marquee__item marquee__item--nezuko certificates_size"
                            src="{theme_url}assets/images/certificates/MCA.jpg" alt="Tanishq" data-clone=0>
                        <img class="marquee__item marquee__item--nezuko certificates_size"
                            src="{theme_url}assets/images/certificates/MSME.jpg" alt="Titan" data-clone=0>
                        <img class="marquee__item marquee__item--nezuko certificates_size"
                            src="{theme_url}assets/images/certificates/NGO-624x858.jpg" alt="Aditya Birla Group"
                            data-clone=0>
                        <img class="marquee__item marquee__item--nezuko certificates_size"
                            src="{theme_url}assets/images/certificates/PAN-624x858.jpg" alt="Aditya Birla Group"
                            data-clone=0>
                        <img class="marquee__item marquee__item--nezuko certificates_size"
                            src="{theme_url}assets/images/certificates/SKILL-INDIA.jpg" alt="Aditya Birla Group"
                            data-clone=0>
                        <img class="marquee__item marquee__item--nezuko certificates_size"
                            src="{theme_url}assets/images/certificates/TAN.jpg" alt="Aditya Birla Group" data-clone=0>
                        <img class="marquee__item marquee__item--nezuko certificates_size"
                            src="{theme_url}assets/images/certificates/TRADE-MARK.jpg" alt="Aditya Birla Group"
                            data-clone=0>
                        <img class="marquee__item marquee__item--nezuko certificates_size"
                            src="{theme_url}assets/images/certificates/trust.jpg" alt="Aditya Birla Group" data-clone=0> -->
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-12">
                <div class="marquee marquee--nezuko" data-speed=25>
                    <div class="marquee__row marquee__row--nezuko">
                        <img class="marquee__item marquee__item--nezuko associated_size"
                            src="{theme_url}assets/images/associated/copyright.png" alt="Essar Group" data-clone=0>
                        <img class="marquee__item marquee__item--nezuko associated_size"
                            src="{theme_url}assets/images/associated/mca.png" alt="Olympia Group" data-clone=0>
                        <img class="marquee__item marquee__item--nezuko associated_size"
                            src="{theme_url}assets/images/associated/MSME.png" alt="Tanishq" data-clone=0>
                        <img class="marquee__item marquee__item--nezuko associated_size"
                            src="{theme_url}assets/images/associated/planning_commission.png" alt="Titan" data-clone=0>
                        <img class="marquee__item marquee__item--nezuko associated_size"
                            src="{theme_url}assets/images/associated/pmgdisa.png" alt="Aditya Birla Group" data-clone=0>
                        <img class="marquee__item marquee__item--nezuko associated_size"
                            src="{theme_url}assets/images/associated/tm.png" alt="Aditya Birla Group" data-clone=0>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    </div>
</section>