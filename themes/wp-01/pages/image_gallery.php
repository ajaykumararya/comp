<section
                class="elementor-section elementor-top-section elementor-element elementor-element-29c32390 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                data-id="29c32390" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-286b467a"
                        data-id="286b467a" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-46500b30 elementor-widget elementor-widget-section-title"
                                data-id="46500b30" data-element_type="widget" data-widget_type="section-title.default">
                                <div class="elementor-widget-container">

                                    <div class="section-title-wrapper columns row">
                                        <div class="section-title">
                                            <h2>OUR GALLERY</h2>
                                            <p></p>
                                            <!-- <p>Some Amazing Stuff From Our Campus</p> -->
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="elementor-element elementor-element-1dfc59e7 gallery-spacing-custom elementor-widget elementor-widget-image-gallery"
                                data-id="1dfc59e7" data-element_type="widget" data-widget_type="image-gallery.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-image-gallery">

                                        <style type="text/css">
                                            #gallery-1 {
                                                margin: auto;
                                            }

                                            #gallery-1 .gallery-item {
                                                float: left;
                                                margin-top: 10px;
                                                text-align: center;
                                                width: 25%;
                                            }

                                            #gallery-1 img {
                                                border: 2px solid #cfcfcf;
                                            }

                                            #gallery-1 .gallery-caption {
                                                margin-left: 0;
                                            }

                                            /* see gallery_shortcode() in {theme_url}assets/wp-includes//media.php */
                                        </style>
                                        <div id='gallery-1'
                                            class='gallery galleryid-7 gallery-columns-4 gallery-size-large'>
                                            <?php
                                            $i = 0;
                        foreach ($gallery as $img):
                            $i++;
                            if ($i % 4== 0){
                                echo '<br style="clear: both" />';
                            }
                            ?>
                                            <dl class='gallery-item'>
                                                <dt class='gallery-icon landscape'>
                                                    <a data-elementor-open-lightbox="yes"
                                                        data-elementor-lightbox-slideshow="1dfc59e7"
                                                        data-elementor-lightbox-title="gallery<?=$i?>"
                                                        data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6Mzc5LCJ1cmwiOiJodHRwczpcL1wvd3d3LndlYmZ1bGNyZWF0aW9ucy5jb21cL3RoZW1lc1wvZWR1Y2F0aW9uXC93cC1jb250ZW50XC91cGxvYWRzXC9zaXRlc1wvMlwvMjAxNlwvMTFcL2dhbGxlcnkxLmpwZyIsInNsaWRlc2hvdyI6IjFkZmM1OWU3In0%3D"
                                                        href='{base_url}upload/<?=$img['image']?>'><img
                                                            loading="lazy" decoding="async" width="700" height="467"
                                                            src="{base_url}upload/<?=$img['image']?>"
                                                            class="attachment-large size-large" alt="Smiling guys"
                                                            srcset="{base_url}upload/<?=$img['image']?>"
                                                            sizes="(max-width: 700px) 100vw, 700px" 
                                                            style="height: 250px;"/></a>
                                                </dt>
                                            </dl>
                                            <?php
                                            endforeach;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>