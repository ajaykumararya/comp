<section
    class="elementor-section elementor-top-section elementor-element elementor-element-532f2dc4 grey-bg elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="532f2dc4" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1b19bba"
            data-id="1b19bba" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-25e5b09c elementor-widget elementor-widget-section-title"
                    data-id="25e5b09c" data-element_type="widget" data-widget_type="section-title.default">
                    <div class="elementor-widget-container">

                        <div class="section-title-wrapper columns row">
                            <div class="section-title">
                                <h2><?= ES('course_page_title') ?></h2>
                                <p><?= ES($type . '_page_description', '') ?></p>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="elementor-element elementor-element-6fd760c8 elementor-widget elementor-widget-our-courses"
                    data-id="6fd760c8" data-element_type="widget" data-widget_type="our-courses.default">
                    <div class="elementor-widget-container">
                        <?php
                        $get = $this->db->select('ccc.title,ccc.id')
                            ->from('content_courses as cc')
                            ->join('course_category as ccc', 'cc.category_id = ccc.id')
                            ->group_by('ccc.id')
                            ->get();
                        ?>

                        <div id="theCourse" class="course-wrapper row style_one">
                            <ul class="tabs" data-tabs id="tabs_theCourse" role="tablist">
                                <?php
                                $i = 1;
                                foreach ($get->result() as $row) {
                                    echo '<li class="tabs-title ' . ($i == 1 ? 'is-active' : '') . '"><a href="#box' . ($row->id) . '">' . $row->title . '</a></li>';
                                    $i++;
                                }
                                ?>
                            </ul>
                            <div class="tabs-content" data-tabs-content="tabs_theCourse">

                                <?php
                                $i = 1;
                                foreach ($get->result() as $rrow) {
                                    $getCourses = $this->db->where('category_id', $rrow->id)->get('content_courses');
                                    ?>
                                    <div class="tabs-panel padding-between team-wrap  <?= ($i == 1 ? 'is-active' : '') ?>"
                                        id="box<?= ($rrow->id) ?>">
                                        <?php
                                        $i++;
                                        if ($getCourses->num_rows() > 0) {
                                            foreach ($getCourses->result() as $row) {
                                                $btnLink = $row->button_link;
                                                ?>
                                                <div class="large-4 medium-6 small-12 columns">
                                                    <div class="course">
                                                        <div class="course-thumb">
                                                            <img decoding="async" width="350" height="265"
                                                                src="{base_url}upload/<?= $row->image ?>"
                                                                class="attachment-wc-grid-course-thumb size-wc-grid-course-thumb wp-post-image"
                                                                alt="" style="height:284px" />
                                                            
                                                                <div class="wc-course-meta-detail">
                                                                <div class="price-tag">
                                                                    {inr} <?=$row->price?>
                                                                </div>
                                                            </div>
                                                        </div><!-- Course Thumb /-->
                                                        <div class="wc-course-details">
                                                            <h3><a href="<?= $btnLink ?>">
                                                                    <?= $row->title ?></a></h3>
                                                            <p><?= $row->description ?></p>
                                                            <ul class="no-bullet">
                                                            <!-- arrow-starter -->
                                                                <li><i class="fa fa-clock"></i> <?= $row->duration ?></li>
                                                                <li><i class="fa fa-graduation-cap"></i> <?= $row->eligibilty ?></li>
                                                            </ul><a href="<?= $btnLink ?>"
                                                                class="secondary button"><?= $row->button_text ?></a>
                                                            <div class="clearfix"></div>
                                                        </div><!-- Course Details ends /-->
                                                    </div><!-- Course div ends /-->
                                                </div><!-- Columns Ends /-->
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div><!-- tab ends -->

                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>