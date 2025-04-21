<section
    class="elementor-section elementor-top-section elementor-element elementor-element-1a2a3c0a elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="1a2a3c0a" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-41b67fae"
            data-id="41b67fae" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-60905c2d elementor-widget elementor-widget-image"
                    data-id="60905c2d" data-element_type="widget" data-widget_type="image.default">
                    <div class="elementor-widget-container">
                        <img decoding="async" width="1024" height="692"
                            src="{base_url}upload/<?= $this->SiteModel->get_setting('about_us_image') ?>"
                            class="attachment-large size-large wp-image-366" alt=""
                            srcset=""
                            sizes="(max-width: 1024px) 100vw, 1024px" />
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-2e576cf1 welcome-message"
            data-id="2e576cf1" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-5cc99c9c elementor-widget elementor-widget-text-editor"
                    data-id="5cc99c9c" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <h2><?=filter_title(ES('about_us_page_title'))?></h2>
                       
                        <?php
                        echo ES('about_us_content');
                    if ($button = $this->SiteModel->get_setting('about_us_page_button_text')) {
                        $buttonLink = $this->SiteModel->get_setting('about_us_page_button_link', '#');
                        echo '<a href="' . $buttonLink . '" class="primary bordered-dark button">' . $button . ' <i class="ion-ios-arrow-thin-right ml-1"></i></a>';
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>