<section class="sec_padd">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card border-danger radius_all_10 box_shadow1 animation animated fadeInUp"
                    data-animation="fadeInUp" data-animation-delay="0.02s" style="animation-delay: 0.02s; opacity: 1;">
                    <div class="card-header bg-danger pb-0">
                        <h5 class="card-title text-white">Students</h5>
                    </div>
                    <div class="card-body p-0">
                        <marquee behavior="scroll" direction="up" scrollamount="3" onmouseover="this.stop();"
                            onmouseout="this.start();" style="height:400px;">
                            <ul class="lst">
                                <?php
                                $get = $this->student_model->get_switch('limit', [
                                    'limit' => ES('scroll_student_number', 10)
                                ]);
                                if ($get->num_rows()) {
                                    foreach ($get->result() as $row) {
                                        $name = $row->student_name;
                                        // pre($row);
                                        ?>
                                        <!------------     -------------->
                                        <li class="border-danger" style="border-bottom: 2px dotted;padding-top:10px">
                                            <center>
                                                <strong><?= $row->center_name ?></strong><br>
                                                <img class="alignnone size-full wp-image-4843" src="upload/<?= $row->image ?>"
                                                    alt="" style="height:110px;width:120px;">
                                                <br>
                                                <strong><?= $name ?></strong><br>
                                                <strong><?= $row->roll_no ?></strong><br>
                                            </center>
                                        </li>
                                        <!------------     -------------->
                                        <?php
                                    }
                                }
                                ?>

                            </ul>
                        </marquee>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-danger radius_all_10 box_shadow1 animation animated fadeInUp"
                    data-animation="fadeInUp" data-animation-delay="0.02s" style="animation-delay: 0.02s; opacity: 1;">
                    <div class="card-body">
                        <?= ES('scroll_middle_content') ?>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-danger radius_all_10 box_shadow1 animation animated fadeInUp"
                    data-animation="fadeInUp" data-animation-delay="0.02s" style="animation-delay: 0.02s; opacity: 1;">
                    <div class="card-header bg-danger pb-0">
                        <h5 class="card-title text-white">Franchise</h5>
                    </div>
                    <div class="card-body p-0">
                        <marquee behavior="scroll" direction="up" scrollamount="3" onmouseover="this.stop();"
                            onmouseout="this.start();" style="height:400px;">
                            <ul class="lst">
                                <?php
                                $limit = ES('scroll_franshise_number', 10);
                                $get = $this->db->where([
                                    'status' => 1,
                                    'type' => 'center'
                                ])->limit($limit)->get('centers');
                                if ($get->num_rows()) {
                                    foreach ($get->result() as $row) {
                                        $name = $row->name;
                                        // pre($row);
                                        ?>
                                        <!------------     -------------->
                                        <li class="border-danger" style="border-bottom: 2px dotted;padding-top:10px">
                                            <center>
                                                <strong><?= $row->institute_name ?></strong><br>
                                                <img class="alignnone size-full wp-image-4843" src="upload/<?= $row->image ?>"
                                                    alt="" style="height:110px;width:120px;">
                                                <br>
                                                <strong><?= $name ?></strong><br>
                                                <strong><?=$row->center_number?></strong><br>
                                            </center>
                                        </li>
                                        <!------------     -------------->
                                        <?php
                                    }
                                }


                                ?>
                            </ul>
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>