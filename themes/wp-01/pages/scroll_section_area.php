<style>
    .student-card {
        background-color: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1rem;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .student-card h4 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #333;
        text-transform: uppercase;
    }

    .student-card img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin: 0.5rem auto;
        border-radius: 6px;
        border: 1px solid #ddd;
    }

    .student-card .name {
        font-weight: bold;
        font-size: 15px;
        margin-top: 0.5rem;
        color: #444;
    }

    .student-card .roll {
        font-size: 14px;
        color: #555;
        letter-spacing: 0.5px;
    }

    .dot-divider {
        border-top: 1px dotted #888;
        margin-top: 0.5rem;
    }
</style>
<section class="sec_padd">
    <div class="" style="    padding: 0 20px;">
        <div class="row">


            <div class="col-md-6 mb-3">
                <div class="card theme-border radius_all_10 box_shadow1 animation animated fadeInUp"
                    data-animation="fadeInUp" data-animation-delay="0.02s" style="animation-delay: 0.02s; opacity: 1;">
                    <div class="card-body">
                        <?= ES('scroll_middle_content') ?>
                    </div>
                </div>
            </div>


            <div class="col-md-3 mb-3">
                <div class="card theme-border radius_all_10 box_shadow1 animation animated fadeInUp"
                    data-animation="fadeInUp" data-animation-delay="0.02s" style="animation-delay: 0.02s; opacity: 1;">
                    <div class="card-header theme-back pb-0">
                        <h6 class=" text-white"><i class="fa fa-users"></i> Recently Joined Students</h6>
                    </div>
                    <div class="card-body p-0">
                        <marquee behavior="scroll" direction="up" scrollamount="3" onmouseover="this.stop();"
                            onmouseout="this.start();" style="height:562px;">
                            <!-- <ul class="lst"> -->
                            <?php
                            $limit = ES('scroll_student_number', 10);
                            $get = $this->student_model->get_switch('limit', [
                                'limit' => $limit
                            ]);
                            if ($get->num_rows()) {
                                foreach ($get->result() as $row) {
                                    $name = $row->student_name;
                                    // pre($row);
                                    ?>
                                    <!------------     -------------->
                                    <!-- <li class="border-danger" style="border-bottom: 2px dotted;padding-top:10px"> -->

                                    <div class="student-card">
                                        <h4><?= $row->center_name ?></h4>
                                        <img src="upload/<?= $row->image ?>" alt="Student Photo"
                                            onerror="this.src='default.jpg'" />
                                        <div class="name"><?= $name ?></div>
                                        <div class="roll"><?= $row->roll_no ?></div>
                                        <div class="dot-divider"></div>
                                    </div>
                                    <!-- <center>
                                                <strong><?= $row->center_name ?></strong><br>
                                                <img class="alignnone size-full wp-image-4843" src="upload/<?= $row->image ?>"
                                                    alt="" style="height:110px;width:120px;">
                                                <br>
                                                <strong><?= $name ?></strong><br>
                                                <strong><?= $row->roll_no ?></strong><br>
                                            </center> -->
                                    <!-- </li> -->
                                    <!------------     -------------->
                                    <?php
                                }
                            }
                            ?>

                            <!-- </ul> -->
                        </marquee>
                    </div>
                </div>
            </div>



            <?php
            if (ES('scroll_right_box', 'passout_students') == 'passout_students') {
                ?>
                <div class="col-md-3 mb-3">
                    <div class="card theme-border radius_all_10 box_shadow1 animation animated fadeInUp"
                        data-animation="fadeInUp" data-animation-delay="0.02s" style="animation-delay: 0.02s; opacity: 1;">
                        <div class="card-header theme-back pb-0">
                            <h6 class=" text-white"><i class="fa fa-users"></i>Recently Passout Students</h6>
                        </div>
                        <div class="card-body p-0">
                            <marquee behavior="scroll" direction="up" scrollamount="3" onmouseover="this.stop();"
                                onmouseout="this.start();" style="height:562px;">
                                <!-- <ul class="lst"> -->
                                <?php
                                $limit = ES('scroll_passout_student_number', 10);
                                $get = $this->student_model->get_switch('passout', [
                                    'limit' => $limit
                                ]);
                                if (isset($_GET['query'])) {
                                    echo $this->db->last_query();
                                }
                                if ($get->num_rows()) {
                                    foreach ($get->result() as $row) {
                                        $name = $row->student_name;
                                        // pre($row);
                                        ?>
                                        <div class="student-card">
                                            <h4><?= $row->center_name ?></h4>
                                            <img src="upload/<?= $row->image ?>" alt="Student Photo"
                                                onerror="this.src='default.jpg'" />
                                            <div class="name"><?= $name ?></div>
                                            <div class="roll"><?= $row->roll_no ?></div>
                                            <div class="dot-divider"></div>
                                        </div>
                                        <!------------     -------------->
                                        <!-- <li class="border-danger" style="border-bottom: 2px dotted;padding-top:10px">
                                                <center>
                                                    <strong><?= $row->center_name ?></strong><br>
                                                    <img class="alignnone size-full wp-image-4843" src="upload/<?= $row->image ?>"
                                                        alt="" style="height:110px;width:120px;">
                                                    <br>
                                                    <strong><?= $name ?></strong><br>
                                                    <strong><?= $row->roll_no ?></strong><br>
                                                </center>
                                            </li> -->
                                        <!------------     -------------->
                                        <?php
                                    }
                                }
                                ?>

                                <!-- </ul> -->
                            </marquee>
                        </div>
                    </div>
                </div>
                <?php
            } else if (ES('scroll_right_box') == 'placement_students' && table_exists('placement_students')) {
                ?>
                    <div class="col-md-3 mb-3">
                        <div class="card theme-border radius_all_10 box_shadow1 animation animated fadeInUp"
                            data-animation="fadeInUp" data-animation-delay="0.02s" style="animation-delay: 0.02s; opacity: 1;">
                            <div class="card-header theme-back pb-0">
                                <h5 class=" text-white"><i class="fa fa-users"></i> Placement Student(s)</h5>
                            </div>
                            <div class="card-body p-0">
                                <marquee behavior="scroll" direction="up" scrollamount="3" onmouseover="this.stop();"
                                    onmouseout="this.start();" style="height:562px;">
                                    <!-- <ul class="lst"> -->
                                    <?php
                                    $limit = ES('scroll_placement_student_number', 10);
                                    $get = $this->student_model->list_placement_student($limit);
                                    if ($get->num_rows()) {
                                        foreach ($get->result() as $row) {
                                            $name = $row->student_name;
                                            // pre($row);
                                            ?>
                                            <div class="student-card">
                                                <h4><?= $row->company_name ?></h4>
                                                <img src="upload/<?= $row->image ?>" alt="Student Photo"
                                                    onerror="this.src='default.jpg'" />
                                                <div class="name"><?= $name ?></div>
                                                <div class="roll"><?= $row->designation ?></div>
                                                <div class="dot-divider"></div>
                                            </div>
                                            <!------------     -------------->
                                            <!-- <li class="border-danger" style="border-bottom: 2px dotted;padding-top:10px">
                                                    <center>
                                                        <strong><?= $row->company_name ?></strong><br>
                                                        <img class="alignnone size-full wp-image-4843" src="upload/<?= $row->image ?>"
                                                            alt="" style="height:110px;width:120px;">
                                                        <br>
                                                        <strong><?= $name ?></strong><br>
                                                        <strong><?= $row->designation ?></strong><br>
                                                    </center>
                                                </li> -->
                                            <!------------     -------------->
                                        <?php
                                        }
                                    }


                                    ?>
                                    <!-- </ul> -->
                                </marquee>
                            </div>
                        </div>
                    </div>
                <?php
            } else {
                ?>
                    <div class="col-md-3 mb-3">
                        <div class="card theme-border radius_all_10 box_shadow1 animation animated fadeInUp"
                            data-animation="fadeInUp" data-animation-delay="0.02s" style="animation-delay: 0.02s; opacity: 1;">
                            <div class="card-header theme-back pb-0">
                                <h5 class=" text-white"><i class="fa fa-users"></i> Franchise</h5>
                            </div>
                            <div class="card-body p-0">
                                <marquee behavior="scroll" direction="up" scrollamount="3" onmouseover="this.stop();"
                                    onmouseout="this.start();" style="height:562px;">
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
                                                        <strong><?= $row->center_number ?></strong><br>
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
                <?php
            }
            ?>
        </div>
    </div>
</section>