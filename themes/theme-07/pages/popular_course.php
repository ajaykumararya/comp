<style>
    .img-fullwidth{
        border-radius: 7px 7px 0 0;
    }
</style>
<!-- Section: Courses -->
<section id="courses" class="bg-silver-deep">
    <div class="container pb-40">
        <div class="section-title">
            <div class="row">
                <div class="col-md-12">
                    <!-- about_us_page_title
                about_us_page_description -->
                    <h2 class="text-uppercase title">
                        <?= filter_title(ES('popular_course_page_title')) ?>
                    </h2>
                    <p class="text-uppercase mb-0"><?= ES('popular_course_page_description') ?></p>
                    <div class="double-line-bottom-theme-colored-2"></div>
                </div>
            </div>
        </div>
        <div class="row mtli-row-clearfix">
            <div class="owl-carousel-3col" data-nav="true">
                <?php
                $data = $this->SiteModel->get_contents($type);
                if ($data->num_rows()):
                    foreach ($data->result() as $row):
                        ?>
                        <div class="item">
                            <div class="course-single-item bg-white border-1px clearfix mb-30">
                                <div class="course-thumb">
                                    <img class="img-fullwidth" alt="" src="{base_url}upload/<?= $row->field1 ?>">
                                    <!-- <div class="price-tag">$290</div> -->
                                </div>
                                <div class="course-details clearfix p-20 pt-15">
                                    <div class="course-top-part pull-left mr-40">
                                        <a href="{base_url}course-details/<?=$this->token->encode(['prod_id' => $row->id])?>">
                                            <h4 class="mt-0 mb-5"><?= filter_title($row->field2) ?></h4>
                                        </a>
                                        <!-- <ul class="list-inline">
                                    <li class="review-stars">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>25 <i class="fa fa-comments-o text-theme-colored2"></i></li>
                                    <li>68 <i class="fa fa-thumbs-o-up text-theme-colored2"></i></li>
                                </ul> -->
                                    </div>
                                    <!-- <div class="author-thumb">
                                <img src="images/course/xs1.jpg" alt="" class="img-circle">
                            </div> -->
                                    <div class="clearfix"></div>
                                    <p class="course-description mt-20">
                                        <?= shortText($row->field3) ?>
                                    </p>
                                    <ul class="list-inline course-meta mt-15">
                                        <?php
                                        if ($row->field4) {
                                            echo '<li>
                                                <h6>' . $row->field4 . '</h6>
                                                <span> Course</span>
                                            </li>';
                                        }
                                        if ($row->field5) {
                                            echo '<li>
                                                <h6>' . $row->field5 . '</h6>
                                                <span> Eligibility</span>
                                            </li>';
                                        }
                                        if ($row->field6) {
                                            echo '<li>
                                                <h6><span class="course-time">{inr} ' . $row->field6 . '</span></h6>
                                                <span> Fee</span>
                                            </li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>