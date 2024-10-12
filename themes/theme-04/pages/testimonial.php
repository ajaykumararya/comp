<section class="ttm-row testimonial-section bg-img2 p-0 clearfix">
    <div class="container">

        <!-- service slider end-->
        <!-- testimonials -->
        <div class="row">
            <div class="col-lg-10 col-md-12 m-auto">
                <div class="title-header pt-80 text-center">
                    <h5 class="ttm-textcolor-skincolor"
                        style="font-weight: 500; font-size:50px; line-height: 60px; margin-bottom: 0px; font-family: 'Marck Script';">
                        <?= ES('testimonial_title') ?>
                    </h5>
                    <h2 class="title"
                        style="font-weight:400; padding-top:15px;font-size: 42px;line-height: 52px;margin-bottom: 0;text-transform: uppercase;">
                        <?= ES('testimonial_sub_title') ?>
                    </h2>
                </div>

                <div class="testimonial-slide style1 owl-carousel res-991-pt-40" data-item="1" data-nav="true"
                    data-dots="false" data-auto="false">
                    <?php
                    $get = (content('testimonial'));
                    if ($get->num_rows()) {
                        foreach ($get->result() as $row) {
                            // pre($row);
                            ?>
                            <div class="testimonials style1 text-center">
                                <div class="testimonial-content">
                                    <h3><?= $row->field1 ?></h3>
                                    <p><?= $row->field2 ?></p>
                                    <?php
                                    if ($row->field3) {
                                        echo '<a href="' . $row->field4 . '"
                                        class="m-4 res-767-mt-20 res-767-mb-40 ttm-btn ttm-btn-style-border ttm-btn-color-darkgrey">' . $row->field3 . '</a>';
                                    }
                                    ?>

                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
        <!-- testimonials end -->
    </div>

    <div class="sep_holder pt-50">
        <div class="sep_line mb-15"></div>
    </div>
</section>