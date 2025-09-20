<style type="text/css">
        #marq-ne .marq-ul li {
            padding: 10px;
        }

        #marq-ne .marq-ul li a {
            font-family: system-ui;
            font-size: 15px;
            color: white;
        }

        #marq-ne .marq-ul li a i {
            color: #f4a024;
        }
    </style>
<section class="advantages" id="">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <div class="box box-form">
                    <p><?=ES('enquiry_form_subtitle')?></p>
                    <h5><?=ES('enquiry_form_title')?></h5>
                    <form class="" action="#" id="submitGETINTOUCH" method="post" autocomplete="off">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i>
                                        </div>
                                        <input type="text" name="name" class="form-control name_an"
                                            placeholder="Enter Full Name *" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope-o"
                                                aria-hidden="true"></i></div>
                                        <input type="email" name="email" class="form-control email_an"
                                            placeholder="Enter Email Address *" autocomplete="off" required>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i>
                                        </div>
                                        <input type="text" name="mobile" class="form-control mobile_an"
                                            placeholder="Enter Mobile Number" autocomplete="off" required>
                                    </div>

                                </div>
                            </div>
                            <!-- <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                                <input type="text" name="state" class="form-control state_an" placeholder="Enter State Name *">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                                <input type="text" name="city" class="form-control city_an" placeholder="Enter City Name *">
                                            </div>
                                        </div>
                                    </div> -->
                            <!-- <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-university" aria-hidden="true"></i></div>
                                                <input type="text" name="program" class="form-control program_an" placeholder="Enter Faculty Name *">
                                            </div>
                                        </div>
                                    </div> -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i>
                                        </div>
                                        <input type="text" name="course_name" class="form-control"
                                            placeholder="Enter Course Name *" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-commenting-o"
                                                aria-hidden="true"></i></div>
                                        <input type="text" name="message" class="form-control" required
                                            placeholder="Enter Your Message *">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-lg-12">
                                <div class="form-group text-center">
                                    <button class="btn" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <div class="content">
                    <h4 style="color:white"><?=ES('notice-board_title')?></h4>
                    <div class="content-box box-shadow box-border">
                        <marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="5"
                            style="height: 284px;" id='marq-ne'>
                            <ul class="marq-ul">
                            <?php

                                            $data = $this->SiteModel->get_contents('notice-board');
                                            if ($data->num_rows()) {
                                                foreach ($data->result() as $row) {
                                                    ?>
                                                    <li>
                                                        <a href="<?= $row->field3 ?>"
                                                            target="_blank">
                                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<?= $this->ki_theme->parse_string($row->field2) ?>
                                                        </a>
                                                    </li>
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
    <!-- <img src="~lib/image/abc1.PNG" class="img-responsive"> -->
</section>