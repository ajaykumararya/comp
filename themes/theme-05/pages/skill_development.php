<style>
    .skill__development .courses_box {
        margin: 15px 0;
        border-radius: 22px;
        overflow: hidden;
        text-align: center;
        border: 1px solid var(--primary-color);
        background-color: var(--primary-color);
    }

    .skill__development .courses_box_cont {
        border-top: 0;
        background-color: #f2f2f2;
        padding: 20px;
        text-align: center;
        border-top: 0;
    }

    .skill__development .courses_box i {
        width: 60px;
        height: 60px;
        background-color: #f2f2f2;
        color: var(--primary-color);
        line-height: 60px;
        margin: 15px auto !important;
        font-size: 32px;
        text-align: center;
        border-radius: 100%;
    }

    .courses_box_cont h4 {
        color: #011d42;
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 10px;
    }
</style>
<section class="popular__courses  skill__development  mp-4">
    <div class="container">
        <div class="section__heading">
            <h3> <?= ES($type . '_title') ?></h3>
            <p>
                <?= ES($type . '_description') ?>
            </p>
        </div>

        <div class="row">
            <?php
            $data = $this->SiteModel->get_contents($type);
            if ($data->num_rows()):
                $index = 1;
                foreach ($data->result() as $row):
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="courses_box">
                            <i class="<?= $row->field1 ?>"></i>
                            <div class="courses_box_cont">
                                <h4> <?= $row->field2 ?> </h4>
                                <p><?= $row->field3 ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>