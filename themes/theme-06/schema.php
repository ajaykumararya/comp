<?php
if ($isPrimary) {
    $sliders = $this->SiteModel->slider();
    if ($sliders->num_rows()) {
        ?>
        <section class="banner">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <!-- <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol> -->

                <!-- Wrapper for slides -->
                <!-- <div class="carousel-inner" role="listbox">
                                <div class="item ">
                  <img src="adminpanel/~image/upload-images/slider/" alt="">
                              </div> -->
                <div class="carousel-inner" role="listbox">
                    <?php
                    $i = 1;
                    foreach ($sliders->result() as $slider) {
                        ?>
                        <div class="item <?=$i++ == 1 ? 'active' : ''?>">
                            <img src="{base_url}upload/<?=$slider->image?>" style="width:100%" alt="Banner">
                            <!-- <div class="carousel-caption">
                    ...
                  </div> -->
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <?php
    }
}
?>

{content}