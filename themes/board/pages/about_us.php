<div class="container">
    <div class="row g-3">
        <div class="col-md-12 d-flex flex-fill">
            <div class="card bg-white shadow-sm border-0 rounded-0 w-100">
                <div class="card-body">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <h4 class="nceb-heading-primary">
                                <?= $this->SiteModel->get_setting('about_us_page_title', 'About Us') ?>
                            </h4>
                            <hr class="w-50">
                        </div>
                        <div class="col-md-4 align-self-center p-5 pt-0">

                            <div class="p-2">
                                <img class="card-3d img-fluid" alt="logo" title="{title}"
                                    src="{base_url}upload/{about_us_image}"
                                    style="transform: perspective(405px) rotateX(0deg) rotateY(0deg);border-radius: 5px;">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <p class="text-justify">
                                {about_us_content}
                            </p>
                            <!-- <a href="about-nceb.php" class="btn btn-secondary">Read more...</a> -->
                            <?php
                            if ($button = $this->SiteModel->get_setting('about_us_page_button_text')) {
                                $buttonLink = $this->SiteModel->get_setting('about_us_page_button_link', '#');
                                echo '
                                        <a href="' . $buttonLink . '" class="btn pull-right btn-secondary">
                                        ' . $button . '
                                        </a>
                             ';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>