<section>
    <div class="container pb-70">
        <div class="section-content">
            <div class="row">
                <div class="col-md-5">
                    <img class="img-fullwidth maxwidth500"
                        src="{base_url}upload/<?= $this->SiteModel->get_setting('about_us_image') ?>" alt="">
                </div>
                <div class="col-md-7">
                    <h2 class="text-uppercasetext-theme-colored mt-0 mt-sm-30">
                        <?php
                        echo filter_title(ES('about_us_page_title'));
                        ?>
                    </h2>
                    <div class="double-line-bottom-theme-colored-2"></div>
                    <?php
                    echo ES('about_us_content');
                    if ($button = $this->SiteModel->get_setting('about_us_page_button_text')) {
                        $buttonLink = $this->SiteModel->get_setting('about_us_page_button_link', '#');
                        echo '<a href="' . $buttonLink . '" class="btn btn-colored btn-theme-colored2 text-white btn-lg pl-40 pr-40 mt-15">' . $button . ' <i class="ion-ios-arrow-thin-right ml-1"></i></a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>