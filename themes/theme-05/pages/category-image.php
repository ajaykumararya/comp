<section class="popular__courses  mp-4">
    <style>
        @media screen and (max-width: 1024px) {
            .popular__courses .thumbnail {
                height: 200px !important;
            }
        }

        @media screen and (max-width: 768px) {
            .popular__courses .thumbnail {
                height: 234px !important;
            }
        }

        .owl-carousel .owl-item img {
            width: 100% !important;
            height: 100% !important;
        }
    </style>
    <div class="container">
        <div class="section__heading">
            <h3 class="mb-1">
                <?= ES("{$type}_title") ?>
            </h3>
        </div>

        <div class="row" id="category-images">
            <?php
            $data = $this->SiteModel->get_contents($type);
            if ($data->num_rows()):
                $index = 1;
                foreach ($data->result() as $row):
                    ?>
                    <div class="thumbnail">
                        <a href="<?= $row->field3 ?>" target="_blank">

                            <img src="{assets}<?= $row->field1 ?>" alt="" class="img-responsive" title="<?= $row->field2 ?>">
                        </a>

                    </div>
                    <?php
                endforeach;
            endif;
            ?>

        </div>
    </div>



</section>