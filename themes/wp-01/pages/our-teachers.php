<section
    class="elementor-section elementor-top-section elementor-element elementor-element-3a4f718d elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="3a4f718d" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-73f51259"
            data-id="73f51259" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-4e2ccd06 elementor-widget elementor-widget-section-title"
                    data-id="4e2ccd06" data-element_type="widget" data-widget_type="section-title.default">
                    <div class="elementor-widget-container">

                        <div class="section-title-wrapper columns row">
                            <div class="section-title">
                                <h2><?= ES($type . '_page_title', '') ?></h2>
                                <p><?= ES($type . '_page_description', '') ?></p>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="elementor-element elementor-element-6cd75103 elementor-widget elementor-widget-our_team"
                    data-id="6cd75103" data-element_type="widget" data-widget_type="our_team.default">
                    <div class="elementor-widget-container">
                        <div id="ourTeachers" class="teachers-wrapper style_one">
                            <?php
                            $data = $this->SiteModel->get_contents($type);
                            if ($data->num_rows()):
                                $index = 1;
                                foreach ($data->result() as $row):
                                    ?>
                                    <div class="teachers">
                                        <div class="teacher">
                                            <div class="teacher-thumb">
                                                <img loading="lazy" decoding="async" width="350" height="350"
                                                    src="{base_url}upload/<?= $row->field1 ?>"
                                                    class="attachment-wc-teacher-thumbnail size-wc-teacher-thumbnail wp-post-image"
                                                    alt="" style="height:260px" />
                                                <div class="teacher-links menu-centered">

                                                </div><!-- staff links /-->
                                            </div><!-- Thumbnail class /-->
                                            <div class="teacher-meta">
                                                <h4><?= $row->field2 ?><br><span><?= $row->field3 ?></span></h4>
                                            </div> <!-- Meta Info /-->
                                        </div><!-- Iner Div /-->
                                    </div><!-- teacher Ends -->
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </div><!-- teachers -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>