<!-- ==============================================
    ** Testimonials **
    =================================================== -->
<section class="testimonial padding-lg">
    <div class="container">
        <div class="wrapper">
            <h2><?= ES($type . '_title', 'Alumini Testimonials') ?></h2>
            <ul class="testimonial-slide">
                <?php
                $data = $this->SiteModel->get_contents($type);
                if ($data->num_rows()):
                    foreach ($data->result() as $row):
                        ?>
                        <li>
                            <p><?=$row->field3?></p>
                            <span><?=$row->field2?>, <span><?=$row->field4?></span></span>
                        </li>
                        <?php
                    endforeach;
                endif;
                ?>
            </ul>
            <div id="bx-pager">
                <?php
                if ($data->num_rows()):
                    $i = 0;
                    foreach ($data->result() as $row):
                        ?>
                        <a data-slide-index="<?= $i++ ?>" href="#">
                            <img src="<?= base_url('upload/' . $row->field1) ?>"
                                class="img-circle" alt="" style="    height: 93px;    width: 100px;" /></a>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>