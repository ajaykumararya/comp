<section
    class="elementor-section elementor-top-section elementor-element elementor-element-5dc70f83 transparent-background elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="5dc70f83" data-element_type="section"
    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-background-overlay"></div>
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4bfa9f1d"
            data-id="4bfa9f1d" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-1c3efb7a elementor-widget elementor-widget-section-title"
                    data-id="1c3efb7a" data-element_type="widget" data-widget_type="section-title.default">
                    <div class="elementor-widget-container">

                        <div class="section-title-wrapper columns row">
                            <div class="section-title">
                                <h2><?= ES($type . '_page_title') ?></h2>
                                <p><?= ES($type . '_page_description') ?></p>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="elementor-element elementor-element-1c862f0d elementor-widget elementor-widget-our_events"
                    data-id="1c862f0d" data-element_type="widget" data-widget_type="our_events.default">
                    <div class="elementor-widget-container">
                        <div class="row">
                            <div id="theEvents" class="small-12 columns testimonials side-controls">
                                <?php
                                $data = $this->SiteModel->get_contents($type);
                                if ($data->num_rows()):
                                    $index = 1;
                                    foreach ($data->result() as $row):
                                        $link = $row->field7;
                                        ?>
                                        <div class="event">
                                            <div class="medium-8 small-12 columns event-data">
                                                <h4>
                                                    <a href="<?=$link?>"><?=$row->field2?></a>
                                                </h4>
                                                <p><?=$row->field3?></p>
                                                <p><strong>Timinings:</strong> <?=$row->field4?><br>
                                                <strong>Date:</strong> <?=date('F m, Y',strtotime($row->field5))?></p><a
                                                    href="<?=$link?>" class="button primary bordered-dark">
                                                    <?=$row->field6?></a>
                                            </div><!-- Event DAta /-->
                                            <div class="medium-4 small-12 columns event-thumb"><a
                                                    href="<?=$link?>">
                                                    <img loading="lazy" decoding="async"
                                                        style="height:283px"
                                                        src="{base_url}upload/<?=$row->field1?>"
                                                        class="attachment-wc-event-grid size-wc-event-grid wp-post-image"
                                                        alt="" /></a></div><!-- Event thumb /-->
                                            <div class="clearfix"></div>
                                        </div><!-- event /-->
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>