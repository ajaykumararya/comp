<!-- Section: Team -->
<section id="team" class="bg-silver-deep">
    <div class="container pb-40">
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
        <div class="row mtli-row-clearfix">
            <?php
            $get = content($type);
            if ($get->num_rows() > 0) {
                foreach ($get->result() as $row) {
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="team-members border-bottom-theme-colored2px text-center maxwidth400 mb-30">
                            <div class="team-thumb">
                                <img class="img-fullwidth" alt="" src="{base_url}upload/<?=$row->field1?>">
                                <div class="team-overlay"></div>
                                <!-- <ul class="styled-icons team-social icon-sm">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                </ul> -->
                            </div>
                            <div class="team-details">
                                <h4 class="text-uppercase text-theme-colored font-weight-600 m-5"><?=$row->field2?></h4>
                                <h6 class="text-gray font-13 font-weight-400 line-bottom-centered mt-0"><?=$row->field3?></h6>
                                <p class="hidden-md"><?=$row->field4?></p>
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