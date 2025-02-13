<section class="academic">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="box">
                    <h3 class="text-center main-heading-text-per"><span
                            class="heading"><?= ES('our-program_title') ?></span></h3>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="slider-box">
                                <div class="tslider">
                                    <div class="responsive">
                                        <?php
                                        $data = $this->SiteModel->get_contents($type);
                                        if ($data->num_rows()):
                                            $index = 1;
                                            foreach ($data->result() as $row):
                                                ?>
                                                <div class="slide-marquee">
                                                    <div class="content-box">
                                                        <img src="{base_url}upload/<?=$row->field2?>"
                                                            class="img-responsive" style="height:150px;width:100%" alt="<?=$row->field1?>">
                                                        <div class="heading text-center" id="request_call">
                                                            <h4><a href="#"><?=$row->field1?></a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <img src="~lib/image/abc.PNG" class="img-responsive"> -->
            </div>
        </div>
    </div>
</section>