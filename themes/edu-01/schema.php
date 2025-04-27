<?php
if ($isPrimary) {
    $sliders = $this->SiteModel->get_contents('revosultion_slider');
    if ($sliders->num_rows()) {
        ?>
        <!-- ==============================================
    ** Banner Carousel **
    =================================================== -->
        <div class="banner-outer">
            <div class="banner-slider">
                <?php
                $i = 1;
                foreach ($sliders->result() as $slider) {
                    $animateClass = $slider->field6 == 'right' ? 'fadeInRight' : 'fadeInLeft';
                    ?>
                    <div class="slide<?= $i++ ?>" style="background: url({base_url}upload/<?=$slider->field1?>) no-repeat center top / cover;">
                        <div class="container">
                            <div class="content animated <?= $animateClass ?>">
                                <div class="fl-<?=$slider->field6 ?? 'left'?>">
                                    <h1 class="animated <?= $animateClass ?>">
                                        <?= $slider->field2 ?>
                                    </h1>
                                    <p class="animated <?= $animateClass ?>">
                                        <?= $slider->field3 ?>
                                    </p>
                                    <?php
                                    if ($slider->field5):
                                        echo '<a href="'.$slider->field5.'" class="btn animated <?=$animateClass?>">'.$slider->field4.' <span
                                            class="icon-more-icon"></span></a>';
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }
} else {
    ?>
    <div class="inner-banner blog">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content">
                        <h1>{page_name}</h1>
                        <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

{content}
