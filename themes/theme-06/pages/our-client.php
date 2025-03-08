<style>
    .client-responsive .slick-track{
        padding: 30px 0 !important;
    }
</style>
<section class="academic">
    <div class="container" style="width:100%">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="box">
                    <h3 class="text-center main-heading-text-per"><span
                            class="heading"><?= ES($type.'_title') ?></span></h3>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="slider-box">
                                <div class="tslider">
                                    <div class="client-responsive">
                                        <?php
                                        $data = $this->SiteModel->get_contents($type);
                                        if ($data->num_rows()):
                                            $index = 1;
                                            for($h = 1; $h <= 10; $h++){
                                            foreach ($data->result() as $row):
                                                ?>
                                                <div class="slide-marquee">
                                                    <div class="company-logo box-shadow box-border" style="height:180px;border:none;background:white">
                                                        <img src="{base_url}upload/<?= $row->field2 ?>" class="img-responsive"
                                                            style="height:100%;width:100%;" alt="<?= $row->field1 ?>">

                                                    </div>
                                                </div>
                                                <?php
                                            endforeach;
                                        }
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