<!---------------about us section start------------------>
<section id="Home_about" class="sec_padd">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="about-content" data-aos="fade-right">
                    <div class="section-title">
                        <h2 class="title"><?= $this->SiteModel->get_setting('about_us_page_title', 'About Us') ?></h2>
                        <div class="mt-separator"><img src="{theme_url}assets/images/title.webp" alt="graduation.webp">
                        </div>
                        {about_us_content}

                    </div>
                    <?php
                    if ($button = $this->SiteModel->get_setting('about_us_page_button_text')) {
                        $buttonLink = $this->SiteModel->get_setting('about_us_page_button_link', '#');
                        echo '<div class="btn-wrapper">
                                        <a href="' . $buttonLink . '" class="btn">
                                        <span>' . $button . '</span>
                                        </a>
                                    </div>';
                        // echo '<a href="' . $buttonLink . '" class="btn btn-default">' . $button . ' <i class="ion-ios-arrow-thin-right ml-1"></i></a>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-7">
                <div class="about_bg" data-aos="fade-left">
                    <img style="width: 65%;    margin-left: 20%;" src="{base_url}upload/{about_us_image}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!---------------about us section end------------------>