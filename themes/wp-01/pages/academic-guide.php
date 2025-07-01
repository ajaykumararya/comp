<style>
    .elementor-7 .elementor-element.elementor-element-172289f3>.elementor-element-populated>.elementor-background-overlay {
        background-color: #e77a31ba !important;
    }

    .elementor-7 .elementor-element.elementor-element-1b0f9eea>.elementor-element-populated>.elementor-background-overlay,
    .elementor-7 .elementor-element.elementor-element-46bfa6cb>.elementor-element-populated>.elementor-background-overlay {
        background-color: #9b0404b8!important;
    }
</style>
<section
    class="elementor-section elementor-top-section elementor-element elementor-element-4aa2b141 elementor-section-full_width information-boxes elementor-section-height-default elementor-section-height-default"
    data-id="4aa2b141" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">

        <?php
        $backImages = [
            'first' => '1b0f9eea',
            'second' => '172289f3',
            'third' => '46bfa6cb'
        ];
        foreach ($backImages as $key => $value) {

            $icon = ES($key . '_icon');
            $title = ES($key . '_title');
            $desc = ES($key . '_description');
            $buttn = ES($key . '_button_title');
            $btnLink = ES($key . '_button_link');
            ?>
            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-<?= $value ?>"
                data-id="<?= $value ?>" data-element_type="column"
                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-background-overlay"></div>
                    <div class="elementor-element elementor-element-4d6bac72 elementor-widget elementor-widget-text-editor"
                        data-id="4d6bac72" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                            <h3><i class="<?= $icon ?>"></i> <?= $title ?></h3>
                            <p>
                                <?= $desc ?>
                            </p>
                            <div class="clearfix"> </div>
                            <div class="text-center">
                                <?php
                                if ($btnLink):
                                    ?>
                                    <a class="primary button bordered-light" href="<?= $btnLink ?>">
                                        <?= $buttn ?></a>
                                    <?php
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>


    </div>
</section>