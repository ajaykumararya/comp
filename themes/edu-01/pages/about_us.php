<section class="about inner padding-lg">
    <div class="container">
        <div class="row">
            <div class="col-md-7 left-block">
                <h2><?= $this->SiteModel->get_setting('about_us_page_title', 'About Us') ?></h2>
                <p>{about_us_content}</p>
                <?php
                if ($button = $this->SiteModel->get_setting('about_us_page_button_text')) {
                    $buttonLink = $this->SiteModel->get_setting('about_us_page_button_link', '#');
                    echo '<div class="know-more-wrapper">
                                        <a href="' . $buttonLink . '" class="know-more">
                                        ' . $button . ' <span class="icon-more-icon"></span>
                                        </a></div>
                             ';
                }
                ?>
            </div>
            <div class="col-md-5 about-right"> <img src="{base_url}upload/{about_us_image}" class="img-responsive"
                    alt="">
            </div>
        </div>
    </div>
</section>