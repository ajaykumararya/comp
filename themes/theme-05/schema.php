<?php
if ($isPrimary) {
    $sliders = $this->SiteModel->slider();

    ?>
    <style>
        /* Set a fixed height for the NivoSlider container */
        .nivoSlider {
            height: 380px !important;
            /* Adjust as needed */
            position: relative;
            overflow: hidden;
        }

        @media (max-width: 480px) {
            .nivoSlider {
                height: 200px !important;
            }
        }

        /* Ensure images fill the container properly */
        .nivoSlider img {
            width: 100%;
            /* Make images responsive */
            height: 100%;
            /* Maintain the fixed height */
            object-fit: cover;
            /* Ensures the images cover the container without distortion */
            object-position: center;
            /* Center the image */
        }
    </style>
    <div class="container  margin-tp-20">
        <div class="row">
            <?php
            if ($sliders->num_rows()) {
                ?>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="nivo-slider" style="background-color: #fff;">
                        <div class="slider-content">
                            <div id="slider" class="nivoSlider">
                                <?php
                                foreach ($sliders->result() as $slider)
                                    echo '<img src="{base_url}upload/' . $slider->image . '" alt="{title}">';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>


            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="panel with-nav-tabs panel-primary">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1primary" data-toggle="tab" class="text-center"><strong><?=ES('notice-board_title')?></strong></a></li>

                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1primary">
                                <div class="widget-body1 latest-post">
                                    <div class="scroll" style="overflow: auto; height: 292px; margin-right: -15px;">
                                        <ul>
                                            <?php
                                            $this->db->order_by('field1', 'DESC');
                                            $data = $this->SiteModel->get_contents('notice-board');
                                            if ($data->num_rows()) {
                                                foreach ($data->result() as $row) {
                                                    $time = strtotime($row->field1);
                                                    $time = $time ? $time : time();
                                                    ?>
                                                    <li><a href="<?= $row->field3 ?>"
                                                            target="_blank">
                                                            <span class="text-<?=$row->field4 == 1 ? 'danger' : 'black'?>"><?= $this->ki_theme->parse_string($row->field2) ?></span></a>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <?php
}
?>

{content}
<!-- <br> -->