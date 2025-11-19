<style>
    .course-hero {
  position: relative;
  background-size: cover;
  background-position: center;
  color: #fff;
  padding: 80px 50px;
  margin-top:128px;
}

.course-hero .overlay {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.6);
  z-index: 1;
}

.course-hero-content {
  position: relative;
  z-index: 2;
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  max-width: 1080px;
  margin: 0 auto;
}

.course-info h1 {
  font-size: 36px;
  font-weight: 700;
  margin-bottom: 10px;
}

.course-info p, 
.course-info a {
  color: #fff;
  margin-bottom: 8px;
}

.rating {
  margin: 10px 0;
}

.score {
  background: #d32f2f;
  padding: 2px 8px;
  border-radius: 4px;
  margin-left: 5px;
}

.progress-wrapper {
  margin-top: 15px;
  position: relative;
  width: 300px;
  height: 8px;
  background: #fff;
  border-radius: 5px;
}

.progress-bar {
  height: 100%;
  width: 50%; /* example: 5/10 students */
  background: orange;
  border-radius: 5px;
}

.progress-text {
  position: absolute;
  right: 0;
  top: -25px;
  font-size: 14px;
}

.course-video {
  position: relative;
  border-radius: 15px;
  overflow: hidden;
  width: 300px;
}

.course-video img {
  width: 100%;
  border-radius: 15px;
  display: block;
}


</style>
<div class="course-hero" style="background-image:url('{base_url}assets/file/<?=$field13?>');">
  <div class="overlay"></div>
  <div class="course-hero-content">
    <!-- Left -->
    <div class="course-info">
      <h1>{field2}</h1>
      <?php
        $category = $this->db->where('id',$field7)->get('course_category')->row('title') ?? '';
        $category =  !empty($category) ? '<p>in <a href="#">'.$category.'</a></p> ' : '';
         $rating = $field10 == null ? 3 : $field10;
        ?>
      
      <div class="rating">
        <?=str_repeat('⭐',$rating)?> <span><?=$rating?>.00</span>
      </div>
      <?php
      if(!empty($field11) && $field11 != null)
        echo '<p>Created by <a href="#">'.$field11.'</a></p>';
      ?>
      <!--<div class="progress-wrapper">-->
      <!--  <div class="progress-bar"></div>-->
      <!--  <span class="progress-text">5/10 Students</span>-->
      <!--</div>-->
    </div>

    <!-- Right -->
    <div class="course-video">
      <img src="{base_url}upload/{field1}" alt="thumbnail">
    </div>
  </div>
</div>
<style>
    .eduvibe-widget-details .widget-content ul li {
        display: flex;
        justify-content: space-between;
    }

    .eduvibe-widget-details .widget-content ul li span {
        font-weight: 600;
        font-size: 16px;
        line-height: 26px;
        display: inline-block;
    }

    .eduvibe-widget-details .widget-content ul li span {
        font-weight: 600;
        font-size: 16px;
        line-height: 26px;
        display: inline-block;
    }
    .eduvibe-widget-details .widget-content ul li span  i{
        color: var(--primary-color);
        margin-right: 10px;
    }
    .widget-content ul li {
    padding: 13PX;
}
</style>
<div class="container mt-30 mb-30 pt-30 pb-30 wtpbs" style="padding-top:17px">
    <div class="row">
        <div class="col-md-8">
            <div class="single-service box">
                <section class="elementor-section elementor-top-section elementor-element elementor-element-13a952b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="13a952b" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-92d16a1" data-id="92d16a1" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-28538d9 elementor-widget elementor-widget-text-editor" data-id="28538d9" data-element_type="widget" data-widget_type="text-editor.default">
                <div class="elementor-widget-container">
                <p>&nbsp;{field12}</p>
                </div>
                </div>
                </div>
                </div>
                </div>
                </section>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="sidebar sidebar-left mt-sm-30 ml-30 ml-sm-0">
                <div class="widget bg-silver-deep p-15" style="border:2px solid var(--primary-color);border-radius:6px">
                    <div class="categories">
                        <div class="eduvibe-widget-details mt--35">
                            <div class="widget-content">
                                <ul>
                                    <li><span><i class="fa fa-clock-o"></i> Course Duration</span><span>{field4}</span>
                                    </li>

                                    <li><span><i class="fa fa-graduation-cap"></i> Eligibility</span><span>{field5}</span></li>

                                    <!-- <li><span><i class="icon-draft-line"></i> Fee Type </span><span>One Time</span></li> -->



                                    <li><span><i class="fa fa-language"></i> Language</span><span>English / Hindi</span></li>
                                    <li><span><i class="fa fa-certificate"></i> Certificate</span><span>Yes</span></li>
                                    <li><span><i class="fa fa-users"></i> Students</span><span> <?=$field14 ? $field14 : 0?></span></li>
                                    <li><span><i class="fa fa-inr"></i> Price</span><span>{inr} {field6}</span></li>

                                </ul>

                                <div class="" style="    padding: 12px;    text-align: end;">
                                    <a class="btn wtpbs-btn"
                                        href="<?= ES('popular_course_page_btn_url', '#') ?>">
                                        Apply Now
                                    </a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<script>
    document.title = `{field2}`;
</script>

