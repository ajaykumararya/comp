<section class="ttm-row service-section bg-img1 clearfix">
    <div class="container">
        <div class="row"><!-- row -->
            <div class="col-lg-12 col-md-12 col-sm-12 m-auto">
                <!-- section title -->
                <div class="section-title with-desc text-center clearfix">
                    <div class="title-header">
                        <!-- <h5 class="ttm-textcolor-skincolor">Crafted with solid foundation for global opportunities</h5> -->
                        <h2 class="title">{course_page_title}</h2>
                    </div>
                    <div class="title-desc" style="padding-bottom:40px; font-size:16px;">
                        <!-- <p>From Make-up School to Nail Art courses, London Academy offers a number of world-class
                            courses and training programs that help you build a career in the beauty industry and form a
                            solid foundation.
                        </p> -->
                    </div>
                </div><!-- section title end -->
            </div>
        </div>
        <!-- row end -->
    </div>
</section>
<section class="ttm-row mt_100 p-0 res-991-mt_80">
    <div class="container">
        <!-- row -->
        <div class="row">
            <?php
            $listCourses = $this->SiteModel->content_courses();
            foreach ($listCourses->result() as $row) {
                ?>
                <div class="col-md-4">
                    <div class="featured-imagebox featured-imagebox-post style1 res-767-mb-15 mar-bo">
                        <div class="ttm-post-thumbnail featured-thumbnail">
                            <img class="img-fluid" src="{assets}<?=$row->image?>" alt="<?=$row->title?>">
                        </div>
                        <div class="featured-content box-shadow">
                            <div class="featured-title"><!-- featured-title -->
                                <h5><a href="<?=$row->button_link?>"><?=$row->title?></a></h5>
                            </div>
                            <div class="featured-desc"><!-- featured-title -->
                                <p><?=$row->description?></p>
                            </div>
                            <?php
                            if($row->button_link){
                                echo ' <div class="ttm-border-seperator"></div>
                            <a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline ttm-icon-btn-right mt-10"
                                href="'.$row->button_link.'">'.$row->button_text.' <i class="ti ti-angle-double-right"></i></a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

        </div><!-- row end-->
    </div>
</section>