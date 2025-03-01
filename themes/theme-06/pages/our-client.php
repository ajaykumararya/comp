<section class="company">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="box">
                    <h3 class="text-center main-heading-text-per"><?= ES('our-client_title') ?></h3>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <div class="row">
                                <?php
                                $data = $this->SiteModel->get_contents($type);
                                if ($data->num_rows()):
                                    $index = 1;
                                    foreach ($data->result() as $row):
                                        ?>
                                        <div class="col-lg-2 col-md-2 col-xs-12">
                                            <div class="company-logo box-shadow box-border" align="center">
                                                <img src="{base_url}upload/<?=$row->field2?>"
                                                    class="img-responsive" alt="<?=$row->field1?>">
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
    </div>
</section>