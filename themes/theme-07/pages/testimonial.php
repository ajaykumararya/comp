<!-- Divider: Testimonials -->
<section class="bg-silver-deep">
    <div class="container pt-70 pb-30">
        <div class="section-title">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-uppercase title">
                        <?= filter_title(ES($type . '_page_title')) ?>
                    </h2>
                    <p class="text-uppercase mb-0"><?= ES($type . '_page_description') ?></p>
                    <div class="double-line-bottom-theme-colored-2"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-30">
                <div class="owl-carousel-2col boxed" data-dots="true">
                    <?php
                    $get = content($type);
                    if ($get->num_rows() > 0):
                        foreach ($get->result() as $row):
                            ?>
                            <div class="item">
                                <div class="testimonial pt-10">
                                    <div class="thumb pull-left mb-0 mr-0">
                                        <img class="img-thumbnail img-circle" alt="" src="{base_url}upload/<?=$row->field1?>"
                                            style="width:110px;height:100px">
                                    </div>
                                    <div class="testimonial-content">
                                        <h4 class="mt-0 font-weight-300"><?=$row->field4?></h4>
                                        <h5 class="mt-10 font-16 mb-0"><?=$row->field2?></h5>
                                        <h6 class="mt-5"><?=$row->field3?></h6>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>