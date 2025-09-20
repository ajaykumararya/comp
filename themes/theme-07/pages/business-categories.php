<style>
    .industry-card1 img {
        width: 100%;
        height: 246px;
        border-radius: 4px;
    }

    @media only screen and (max-width: 600px) {
        .industry-card1 img {
            height: 155px;
        }
    }

    .industry-title1 {
        text-align: center;
        font-weight: 500;
        margin-top: 8px;
        font-size: 1rem;
    }
</style>
<section class="divider bg-silver-deep">
    <div class="container pt-50 pb-60">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-uppercase title">
                    <?= filter_title(ES($type . '_page_title')) ?>
                </h2>
                <p class="text-uppercase mb-0"><?= ES($type . '_page_description') ?></p>
                <div class="double-line-bottom-theme-colored-2"></div>
            </div>
        </div>
        <div class="row">
            <?php
            $data = $this->SiteModel->get_contents($type);
            if ($data->num_rows()):
                $index = 1;
                foreach ($data->result() as $row):
                    ?>
                    <div class="col-6 col-md-3 col-xs-6">
                        <div class="industry-card1">
                            <img src="<?= base_url('upload/' . $row->field1) ?>" alt="<?= $row->field2 ?>">
                            <div class="industry-title1"><?= $row->field2 ?></div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>

        </div>
    </div>
</section>