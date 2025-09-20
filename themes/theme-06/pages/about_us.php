<!-- START SECTION ABOUT -->
<section class="wtpbs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box mb-3" style="padding-bottom:28px">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <h3 class="main-heading-text-per"><?= ES('about_us_page_title') ?></h3>
                            <?= $this->SiteModel->get_setting('about_us_content', 'About Us Content') ?>
                            <?php
                            if ($button = $this->SiteModel->get_setting('about_us_page_button_text')) {
                                $buttonLink = $this->SiteModel->get_setting('about_us_page_button_link', '#');
                                echo '<a href="' . $buttonLink . '" class="btn wtpbs-btn">' . $button . ' <i class="ion-ios-arrow-thin-right ml-1"></i></a>';
                            }
                            ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <div>
                                <img style="width: 65%;    margin-left: 20%;margin-top:10%"
                                    src="{base_url}upload/<?= $this->SiteModel->get_setting('about_us_image') ?>" </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- END SECTION ABOUT -->