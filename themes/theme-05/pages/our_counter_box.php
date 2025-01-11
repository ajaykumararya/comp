<section class="section-counter">



    <div class="container">
        <div class="section__heading w-100">
            <h3> <?= ES('our_counter_box_title') ?> </h3>
        </div>

        <div class="count-box">
            <?php
            $data = $this->SiteModel->get_contents($type);
            if ($data->num_rows()):
                $index = 1;
                foreach ($data->result() as $row):
                    ?>
                    <div class="col">
                        <div class="item-box">
                            <div class="icon_box">
                                <img src="{base_url}upload/<?= $row->field2 ?>" class="img_icom" alt="">
                            </div>

                            <div class="Details-count">
                                <h2 id="ContentPlaceHolder2_get_training_center" class="count"><?= $row->field3 ?? '00' ?> </h2>
                                <p><?= $row->field1 ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>



</section>