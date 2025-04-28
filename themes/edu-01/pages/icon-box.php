<section class="our-impotance padding-lg">
    <div class="container">
        <ul class="row">
            <?php
            $data = $this->SiteModel->get_contents($type);
            if ($data->num_rows()):
                $index = 1;
                foreach ($data->result() as $row):
                    ?>
                    <li class="col-sm-4 equal-hight">
                        <div class="inner"> 
                            <img src="<?= base_url('upload/' . $row->field1) ?>" alt="<?= $row->field2 ?>" style="height:64px">
                            <h3><?= $row->field2 ?></h3>
                            <p><?= $row->field3 ?></p>
                        </div>
                    </li>
                    <?php
                endforeach;
            endif;
            ?>
        </ul>
    </div>
</section>