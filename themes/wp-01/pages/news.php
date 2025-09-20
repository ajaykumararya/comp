<section
    class="elementor-section elementor-top-section elementor-element elementor-element-6ac5b080 grey-bg elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="6ac5b080" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-16b992d8"
            data-id="16b992d8" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-492be74c elementor-widget elementor-widget-section-title"
                    data-id="492be74c" data-element_type="widget" data-widget_type="section-title.default">
                    <div class="elementor-widget-container">

                        <div class="section-title-wrapper columns row">
                            <div class="section-title">
                                <h2><?= ES($type . '_page_title', '') ?></h2>
                                <p><?= ES($type . '_page_description', '') ?></p>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="elementor-element elementor-element-2bf185b elementor-widget elementor-widget-blog_posts"
                    data-id="2bf185b" data-element_type="widget" data-widget_type="blog_posts.default">
                    <div class="elementor-widget-container">
                        <div id="" class="latest-news posts-wrapper row">

                            <?php

                            $data = $this->SiteModel->get_contents($type);
                            if ($data->num_rows()):
                                $index = 0;
                                foreach ($data->result() as $row):
                                    $index++;
                                    if ($index % 4 === 0)
                                        echo '<div class="clearfix"></div>';
                                    $link = $row->field6 ?? '#';
                                    ?>
                                    <div class="medium-6 large-4 small-12 columns news">
                                        <div class="post has-post-thumbnail">
                                            <div class="post-thumb"><a href="<?= $link ?>"><img loading="lazy" decoding="async"
                                                        width="370" height="247" src="{base_url}upload/<?= $row->field1 ?>"
                                                        class="attachment-wc-blog-small size-wc-blog-small wp-post-image"
                                                        alt=""
                                                        style="height:300px" /></a></div>
                                            <div class="post-content">
                                                <div class="category-block">
                                                    <?= $row->field2 ?>
                                                </div><!-- Category Block /-->
                                                <h4><a href="<?= $link ?>"><?= $row->field3 ?></a></h4>
                                                <p>
                                                    <?= $row->field4 ?>
                                                    <a href="<?= $link ?>">
                                                        <?= $row->field5 ?>
                                                    </a>
                                                </p>
                                            </div>
                                        </div><!-- Post ends -->
                                    </div><!-- news Ends /-->
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </div><!-- main wrapper ends -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>