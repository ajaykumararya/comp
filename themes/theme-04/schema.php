<?php
if ($isPrimary) {
    $sliders = $this->SiteModel->slider();
    if ($sliders->num_rows()) {
        ?>
        <div class=" bgakc1 pt-4 pb-4">

            <div id="wowslider-container1" class="shadow">
                <div class="ws_images">
                    <ul>
                    <?php
                        $i = 1;
                        foreach ($sliders->result() as $slider) {
                            $active = $i == 1 ? 'active' : '';
                            echo '<li><img src="{base_url}upload/'.$slider->image.'" alt="" title="{title}"
                            id="wows1_'.$i.'" /></li>';
                            $i++;
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <script type="text/javascript" src="{theme_url}wslider/engine1/wowslider.js"></script>
            <script type="text/javascript" src="{theme_url}wslider/engine1/script.js"></script>
            <!-- Offer -->
            <div class="col-sm-11 bgakc0 ptb-5">
            </div>
            <!-- Offer End-->
            <div class="col-sm-12 bgakc1 ptb-5">
            </div>
        </div>
            <?php
    }
} else {
    ?>
        <div class="clearfix"></div>
        <section class="inner-intro  padding ptb-xs-40 bg-img1 overlay-dark light-color">
            <div class="container">
                <div class="row title">
                    <h1>{page_name}</h1>
                    <div class="page-breadcrumb">
                        <a>Home</a>/<span>{page_name}</span>
                    </div>
                </div>
            </div>
        </section>
        <?php
}
?>

{content}