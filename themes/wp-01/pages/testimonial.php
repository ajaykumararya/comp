<section
    class="elementor-section elementor-top-section elementor-element elementor-element-1123faec elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="1123faec" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4d4fcfd7"
            data-id="4d4fcfd7" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-312abbf4 elementor-widget elementor-widget-section-title"
                    data-id="312abbf4" data-element_type="widget" data-widget_type="section-title.default">
                    <div class="elementor-widget-container">

                        <div class="section-title-wrapper columns row">
                            <div class="section-title">
                                <h2><?= ES($type . '_page_title') ?></h2>
                                <p><?= ES($type . '_page_description') ?></p>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="elementor-element elementor-element-5b9e135 elementor-widget elementor-widget-Testimonials"
                    data-id="5b9e135" data-element_type="widget" data-widget_type="Testimonials.default">
                    <div class="elementor-widget-container">



                        <div class="row">
                            <div id="testimonialsMainBox"
                                class="small-12 columns testimonials side-controls dark_testimonial">
                                <?php
                                $data = $this->SiteModel->get_contents($type);
                                // echo $data->num_rows();
                                if ($data->num_rows()):
                                    $index = 1;
                                    foreach ($data->result() as $row):
                                        $link = $row->field7;
                                        ?>
                                        <div class="testimonial">
                                            <div class="testimonial-thumb"><img loading="lazy" decoding="async" width="165"
                                                    height="165" src="{base_url}upload/<?= $row->field1 ?>"
                                                    class="attachment-wc-testimonial-thumb size-wc-testimonial-thumb wp-post-image"
                                                    alt="" /></div><!-- Testimonial Thumb /-->
                                            <div class="testimonial-detail">
                                                <h4><?= $row->field2 ?></h4>
                                                <p><?= $row->field3 ?></p><cite><?= $row->field4 ?></cite>
                                            </div><!-- Testimonial Detail /-->
                                            <div class="clearfix"></div>
                                        </div><!-- testimonial /-->
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