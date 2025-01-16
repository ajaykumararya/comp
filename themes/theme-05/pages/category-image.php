<section class="popular__courses  mp-4">

    <div class="container">
        <div class="section__heading">
            <h3 class="mb-1">
                <?= ES("{$type}_title") ?>
            </h3>
        </div>

        <div class="row">
            <?php
            $data = $this->SiteModel->get_contents($type);
            if ($data->num_rows()):
                $index = 1;
                foreach ($data->result() as $row):
                    ?>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="product_box" style="margin-bottom:13px">
                            <a href="<?= $row->field3 ?>" target="_blank">
                                <img src="{assets}<?= $row->field1 ?>" class="img-responsive" alt="cpisd">
                            </a>

                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>

        </div>
    </div>



</section>