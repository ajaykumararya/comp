<style>
    #our_aim {
        background-color: #d4d6d7;
    }

    #our_aim .aim_bg {
        background-color: #b7b2ae;
        clip-path: polygon(0 0, 50% 0, 80.5% 47.3%, 50% 100%, 0 100%, 16.8% 49.8%);
        padding-right: 5rem;
        padding-top: 1rem;
        text-align: center;
    }
</style>
<section id="our_aim" class="sec_padd">
    <div class="container">
        <div class="row">
            <div class="col-md-3 aim_bg aos-init aos-animate" data-aos="fade-right">
                <?= $this->SiteModel->get_setting('our_aim_page_title', '<h4>OUR</h4>
                <h1>AIM</h1>') ?>
                <div class="mt-separator_center2"><img src="{theme_url}assets/images/title.webp" alt="graduation.webp">
                </div>
            </div>
            <div class="col-md-9">
                <div class="ourAim_info aos-init aos-animate" data-aos="fade-up" data-aos-delay="900">
                    <?php
                    echo $this->SiteModel->get_setting('our_aim_page_content');
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>