<!-- START SECTION FEATURE -->
<section class="bg_gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center">
                        <h2 class="main-heading center-heading">
                            <?= $this->SiteModel->get_setting('important_link_page_title', 'Our Importent Link') ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <?php
            $fields = $this->SiteModel->get_setting('important_link_page', '', true);
            if ($fields) {
                foreach ($fields as $value) {
                    $my_index = $value->title;
                    $value = $value->link;
                    ?>
                    <div class="col-lg-2 col-md-2">
                        <div class="icon_box text-center  icon_box_style2 box_shadow2 radius_all_10 animation"
                            data-animation="fadeInUp" data-animation-delay="0.02s">
                            <a href="<?=$value?>">
                                <div class="box_icon bg_light_green  mb-3">
                                    <img src="{theme_url}assets/images/instructors.png" alt="book" />
                                </div>
                            </a>
                            <div class="intro_desc">
                                <p><a href="<?=$value?>"><?=$my_index?></a></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<!-- END SECTION FEATURE -->
