<style>
    .our-program .slick-track{
        padding: 30px 0 !important;
    }
    .our-program .content-box{
        border-color: white!important;
        box-shadow: 0 0 10px 0 gray!important;
    }
</style>
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
                                    <div class="responsive our-program">
                                        <?php
                                        $data = $this->SiteModel->get_contents($type);
                                        if ($data->num_rows()):
                                            $index = 1;
                                            foreach ($data->result() as $row):
                                                ?>
                                                <div class="slide-marquee">
                                                    <div class="content-box" style="border-radius:200px / 20px">
                                                        <img src="{base_url}upload/<?=$row->field2?>"
                                                            class="img-responsive" style="height:200px;width:100%;border-radius:200px / 20px" alt="<?=$row->field1?>">
                                                        <div class="heading text-center" id="request_call" style="margin:0">
                                                            <h4 style="    font-size: 15px;    font-weight: bold;    text-transform: uppercase;"><a href="#"><?=$row->field1?></a></h4>
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