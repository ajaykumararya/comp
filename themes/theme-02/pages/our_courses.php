<!-- START SECTION COURSES -->
<section class="small_pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center">
                        <h2 class="main-heading center-heading"><?=$this->SiteModel->get_setting('course_page_title','Our Courses')?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <?php
            $listCourses = $this->SiteModel->content_courses();
            foreach($listCourses->result() as $row){
            ?>
            <div class="col-lg-4 col-sm-6">
                <div class="content_box radius_all_10 box_shadow1 animation" data-animation="fadeInUp"
                    data-animation-delay="0.02s">
                    <div class="content_img radius_ltrt_10">
                        <a href="<?=$row->button_link?>"><img
                                src="<?=base_url('upload/'.$row->image)?>" alt="" /></a>
                    </div>
                    <div class="content_desc">
                        <h4 class="content_title">
                            <a href="<?=$row->button_link?>"><?=$row->title?></a>
                        </h4>
                        <div class="courses_info">
                        </div>
                    </div>
                    <div class="content_footer">
                        <div class="teacher">
                            <a href="<?=$row->button_link?>"><span
                                    class="btn btn-default btn-sm"><?=$row->button_text?></span></a>
                        </div>
                        <div class="price">
                            <span class="alert alert-success"><?=$row->duration?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>
        </div>
        <?php
        if($viewAllButton = $this->SiteModel->get_setting('view_all_course_button_text')){
        ?>
        <div class="row">
            <div class="col-12">
                <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.07s">
                    <div class="medium_divider"></div>
                    <a href="<?=$this->SiteModel->get_setting('view_all_course_button_link')?>" class="btn btn-default"><?=$viewAllButton?> <i
                            class="ion-ios-arrow-thin-right ml-1"></i></a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</section>
<!-- END SECTION COURSES -->