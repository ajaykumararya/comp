<div class="row">
    <?php
    $col = 12;
    $certificate = $this->SiteModel->get_setting('certificate_show_with_about_us', 'hide') == 'show';
    $principalBox = $this->SiteModel->get_setting('principal_box_show_with_about_us', 'hide') == 'show';

    if ($principalBox)
        $col -= 4;

    if ($certificate):
        $col -= 3;
        ?>

        <div class="col-md-6 col-lg-3">
            <div class="clearfix box">
                <h2 class="title">Our Certificate</h2>
                <div class="clearfix boxInner">
                    <div class="clearfix gallerySlider gallerySlider1">
                        <?php
                        $get = $this->SiteModel->content_certificates();
                        foreach ($get->result() as $row) {

                            echo '
                        
                            <a data-fancybox="gallery" href="upload/' . $row->image . '"
                                data-thumbnail="{base_url}upload/' . $row->image . '" class="galpic fancybox"
                                data-caption="Certificate">
                                <img src="{base_url}upload/' . $row->image . '" style="height: 210px;" alt="" width="300" height="">

                                <div class="galpic-hover d-flex align-items-center justify-content-center"><i
                                        class="fa fa-search"></i></div>
                            </a>
                        ';
                        }
                        ?>
                    </div>
                    <!--<a href="" class="btn btn-green">View All</a>-->
                </div>
            </div>
        </div>
        <?php
    endif;
    ?>
    <div class="col-md-6 col-lg-<?= $col ?>">
        <div class="clearfix title-wrap">
            <h1 class="pageTitle">
                <?= ES('about_college_title') ?>
            </h1>
            <div class="clearfix entry">
                <p style="text-align: justify;">
                    <?= nl2br(ES('about_college_content'), true) ?>
                </p>
                <?php
                if ($title = ES('about_college_button_text')) {
                    echo '<a href="' . ES('about_college_button_link') . '" class="btn btn-default">
                            <span><span
                            class="hvr-bounce-to-bottom">' . $title . ' </span></span>
                        </a>';
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    if ($principalBox):
        ?>
        <div class="col-md-12 col-lg-4">
            <div class="clearfix principal-Desk-wrap">
                <div class="clearfix principal-Desk">
                    <figure class="imageBox">
                        <a href="#">
                            <?php
                            echo img([
                                'src' => UPLOAD . ES('principal_photo'),
                                'width' => 150,
                                'height' => 150
                            ]);
                            ?>
                        </a>
                    </figure>
                    <div class="textBox">
                        <h4 class="title">
                            <?= ES('principal_name') ?>
                        </h4>
                        <h6 class="desig">
                            <?= ES('designation_principal_box') ?>
                        </h6>
                        <p>
                            <?= ES('principal_box_description') ?>
                        </p>
                        <?php
                        if ($title = ES('principal_box_button_text'))
                            echo '<a href="' . ES('principal_box_button_link') . '" class="link">' . $title . ' <i
                                class="fa fa-angle-double-right "></i></a>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endif;
    ?>
</div>