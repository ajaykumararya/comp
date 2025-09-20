<section class="services-section pb-20 bg-img1 clearfix">
    <div class="container" id="about">
        <div class="row">
            <div class="col-md-6 res-767-center">
                <div class="image-scale-hover mt-80">
                    <img class="img-fluid" src="{base_url}upload/<?= $this->SiteModel->get_setting('about_us_image') ?>">
                </div>
            </div>
            <div class="col-md-6 res-767-pt-30 res-575-pt-15">
                <!--  featured-icon-box -->
                <div class="spacing-9">
                    <!-- section title -->
                    <div class="section-title with-desc clearfix res-575-mb-0">
                        <div class="title-header">
                            <h2 class="title">
                                <?= $this->SiteModel->get_setting('about_us_page_title', 'About Us') ?>
                            </h2>
                        </div>
                        <div class="title-desc">
                            <?= $this->SiteModel->get_setting('about_us_content', 'About Us Content') ?>
                            <?php
                            if ($button = $this->SiteModel->get_setting('about_us_page_button_text')) {
                                $buttonLink = $this->SiteModel->get_setting('about_us_page_button_link', '#');
                                echo '<a href="' . $buttonLink . '" class="res-767-mt-20 res-767-mb-40 ttm-btn ttm-btn-style-border ttm-btn-color-darkgrey">' . $button . ' <i class="ion-ios-arrow-thin-right ml-1"></i></a>';
                            }
                            ?>
                            <!-- <a href="https://amainternational.in" target="_blank"
                                class=" res-767-mt-20 res-767-mb-40 ttm-btn ttm-btn-style-border ttm-btn-color-darkgrey">read
                                more!</a> -->

                        </div>
                    </div><!-- section title end -->
                </div>
            </div>
        </div>
    </div>
</section>