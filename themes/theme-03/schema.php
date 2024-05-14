<?php
if ($isPrimary) {
    $sliders = $this->SiteModel->slider();
    if ($sliders->num_rows()) {
        ?>
        <style>
            @media (min-width: 1024px) {
                .carousel-item img {
                    height: 477px !important;
                }
            }
        </style>
        <section class="clearfix bannerWrap os-animation" data-os-animation="fadeIn" data-os-animation-delay=".5s">
            <div id="homeBanner" class="carousel slide carousel-fade" data-ride="carousel">
                <?php
                $i = 0;
                echo '<ol class="carousel-indicators">';
                foreach ($sliders->result() as $slider) {
                    $active = !$i ? 'class="active"' : '';
                    echo '<li data-target="#homeBanner" data-slide-to="' . $i++ . '" ' . $active . '></li>';
                }
                echo '</ol>';
                ?>
                <div class="carousel-inner">
                    <?php
                    $i = 1;
                    foreach ($sliders->result() as $slider) {
                        $active = $i == 1 ? 'active' : '';
                        $i++;
                        ?>
                        <div class="carousel-item <?= $active ?>">
                            <img class="d-block w-100" src="{base_url}upload/<?= $slider->image ?>" alt="First slide">
                        </div>
                        <?php
                    }
                    ?>
                </div>
        </section>
        <?php
        if (ES('latest_update_show', '0') == '1')
            echo $this->parser->parse('pages/latest_updates', [], true);
    }
}
$noticeBox = isset($notice_board);
?>
<section class="clearfix spacer content-area gray-bg">
    <div class="container">
        <div class="clearfix row">
            <div class="col-xs-12 col-sm-12 col-md-<?= $noticeBox ? '8' : '12' ?>">
                <?php
                if (!$isPrimary) {
                    echo '
                        <div class="title-wrap">
                            <h1 class="pageTitle"><span>{page_name}</span></h1>
                        </div>';
                }
                ?>
                <div class="clearfix entry" style="text-align:justify">
                    {content}
                </div>
            </div>
            <?php
            if ($noticeBox):
                ?>
                <div class="col-xs-12 col-sm-12 col-md-4 sidebar">
                    <?php
                    echo notice_board();
                    ?>
                </div>
                <?php
            endif;
            ?>
        </div>
</section>