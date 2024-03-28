<!------------our cousrse section start----------------->
<section id="our_courses" class="sec_padd">
    <div class="container">
        <div class="text-center">
            <h1><?=$this->SiteModel->get_setting('course_page_title','Our Popular Courses')?> </h1>
            <div class="mt-separator_center"><img src="{theme_url}assets/images/title.webp" alt="graduation.webp">
            </div>
        </div>
        <div class="courses_slider">
            <?php
            $listCourses = $this->SiteModel->content_courses();
            foreach($listCourses->result() as $row){
            ?>
            <div>
                <div class="box">
                    <div class="courses_head">
                        <h5><?=$row->title?></h5>
                    </div>
                    <img src="{base_url}upload/<?=$row->image?>">
                    <div class="box-content">
                        <h3 class="title"><?=$row->title?></h3>
                        <ul class="icon">
                            <?php
                            if($row->button_text)
                                echo '<li><a href="'.$row->button_link.'">'.$row->button_text.'</a></li>';
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<!------------our cousrse section end----------------->