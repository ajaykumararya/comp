<?php
$get = $this->SiteModel->get_contents('faculty_category', ['id' => $type]);
if ($get->num_rows()) {
    $row = $get->row();
    ?>
    <section class="bg_gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="text-center animation animated fadeInUp" data-animation="fadeInUp"
                        data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                        <div class="heading_s1 text-center">
                            <h2 class="main-heading center-heading">
                                <?= $row->field1 ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <?php
                $getItems = $this->SiteModel->get_contents('faculty', ['field3' => $row->id]);
                if ($getItems->num_rows()) {
                    foreach ($getItems->result() as $item) {
                        ?>
                        <div class="col-lg-2 col-md-2">
                            <div style="min-height:1px;border:2px solid red;color:red" class="icon_box text-center  icon_box_style2 box_shadow2 radius_all_10 animation animated fadeInUp"
                                data-animation="fadeInUp" data-animation-delay="0.02s" style="animation-delay: 0.02s; opacity: 1;">

                                <div class="<?=$item->field1?> mb-3" style="font-size:30px">

                                </div>

                                <div class="intro_desc" style="color:red">
                                    <?=$item->field2?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>
        </div>
    </section>
    <?php
}

?>