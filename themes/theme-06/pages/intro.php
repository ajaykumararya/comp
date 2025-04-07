<style>
    .title {
        text-align: center;
        font-weight: bold;
        color: var(--primary-color);
    }

    .section-title {
        font-weight: bold;
        color: var(--primary-color);
    }
</style>


<div class="container mt-4 mb-4">
    <div class="container-box">
        <h1 class="title"><?= ES("{$type}_title", '') ?></h1>
        <p>
            <?= ES("{$type}_description", '') ?>
        </p>

        <div class="row">
            <?php
            $data = $this->SiteModel->get_contents($type);
            if ($data->num_rows()):
                $index = 1;
                foreach ($data->result() as $row):
                    echo '<div class="col-md-6">
                                <h3 class="section-title">' . $row->field1 . '</h3>
                                <p>
                                    ' . $row->field2 . '
                                </p>
                            </div>';
                endforeach;
            endif;
            ?>
        </div>
    </div>
    <br>
</div>