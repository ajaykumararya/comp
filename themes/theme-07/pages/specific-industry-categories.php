<style>
    .circle-card {
        width: 100%;
        height: 160px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid #ccc;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        background: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    @media only screen and (max-width: 600px) {
        .circle-card {
            height: 72px;
        }
    }

    .circle-card:hover {
        transform: scale(1.05);
    }

    .circle-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .circle-card-title {
        text-align: center;
        margin-top: 10px;
        font-size: 0.95rem;
        font-weight: 500;
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
                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="circle-card">
                            <img src="<?= base_url('upload/' . $row->field1) ?>" alt="<?= $row->field2 ?>">
                        </div>
                        <div class="circle-card-title"><?= $row->field2 ?></div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>

        </div>
    </div>
</section>