<!-- Section: Events -->
<section>
    <div class="container pb-50">
        <div class="section-content">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-uppercase line-bottom-theme-colored-2 mt-0 line-height-1">
                        <i class="<?= ES('events_section_icon') ?> mr-10"></i>
                        <?= filter_title(ES('events_section_title')) ?>
                    </h3>
                    <?php
                    $this->db->order_by('field1', 'ASC');
                    $data = $this->SiteModel->get_contents('events');
                    if ($data->num_rows()):
                        foreach ($data->result() as $row):
                            ?>
                            <article>
                                <div class="event-block">
                                    <div class="event-date text-center">
                                        <ul class="text-white font-18 font-weight-600">
                                            <li class="border-bottom"><?= date('d', strtotime($row->field1)) ?></li>
                                            <li class=""><?= date('M', strtotime($row->field1)) ?></li>
                                        </ul>
                                    </div>
                                    <div class="event-meta border-1px pl-40">
                                        <div class="event-content pull-left flip">
                                            <h4 class="event-title media-heading font-roboto-slab font-weight-700">
                                                <a href="#"><?= $row->field2 ?></a>
                                            </h4>

                                            <span class="text-gray-darkgray"><i
                                                    class="fa fa-map-marker mr-5 text-theme-colored2"></i>
                                                <?= $row->field3 ?>
                                            </span>
                                            <p class="mt-5">
                                                <?= $row->field4 ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
                <div class="col-md-6">
                    <h3 class="text-uppercase line-bottom-theme-colored-2 line-height-1 mt-0 mt-sm-30">
                        <i class="<?= ES('events_section_icon') ?> mr-10"></i>
                        <?= filter_title(ES('events_section_title')) ?>
                    </h3>
                    <div class="panel-group accordion-stylished-left-border accordion-icon-filled accordion-no-border accordion-icon-left accordion-icon-filled-theme-colored2"
                        id="accordion6" role="tablist" aria-multiselectable="true">
                        <?php
                        $this->db->order_by('id', 'DESC');
                        $data = $this->SiteModel->get_contents('faq');
                        if ($data->num_rows()):
                            $index = 1;
                            foreach ($data->result() as $row):
                                ?>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headin<?=$index?>">
                                        <h6 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion6" href="#collaps<?=$index?>"
                                                aria-expanded="true" aria-controls="collaps<?=$index?>">
                                                <?=$row->field1?>
                                            </a>
                                        </h6>
                                    </div>
                                    <div id="collaps<?=$index?>" class="panel-collapse collapse <?=$index == 1 ? 'in' : ''?>" role="tabpanel"
                                        aria-labelledby="headin<?=$index?>">
                                        <div class="panel-body">
                                            <?=$row->field2?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $index++;
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>