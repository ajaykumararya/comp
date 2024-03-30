<!-- START SECTION COUNTER -->
<section class="parallax_bg overlay_bg_blue_70"
    data-parallax-bg-image="https://www.rgycsm.org/assets/images/counter_bg.jpg">
    <div class="container">
        <div class="row">
            <?php
            $our_counters = [
                'first_counter' => 'Certified Students',
                'secound_counter' => 'Courses',
                'third_counter' => 'Study Centers',
                'forth_counter' => 'Awarded Centers'
            ];
            $i = 1;
            foreach($our_counters as $index => $counter){
                $title = $this->SiteModel->get_setting($index.'_title',$counter);
                $value = $this->SiteModel->get_setting($index.'_value',0);
                preg_match_all('/\d+/', $value, $matches);

                $numbers = $matches[0]; 
                $counter = '';
                $plus_sign = $value;
                if ($numbers) {
                    $counter = $numbers[0];
                    $plus_sign = str_replace($counter, '', $plus_sign);
                }
            ?>
            <div class="col-lg-3 col-md-3 col-6">
                <div class="box_counter counter_style1 text_white text-center animation" data-animation="fadeInUp"
                    data-animation-delay="0.02s">
                    <div class="counter_icon">
                        <img src="{theme_url}assets/images/counter_icon<?=$i++?>.png" alt="counter_icon1" />
                    </div>
                    <div class="counter_content">
                        <h3 class="counter_text"><span class="counter"><?=$counter?></span><?=$plus_sign?></h3>
                        <p><?=$title?></p>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
            <!-- <div class="col-lg-3 col-md-3 col-6">
                <div class="box_counter counter_style1 text_white text-center animation" data-animation="fadeInUp"
                    data-animation-delay="0.03s">
                    <div class="counter_icon">
                        <img src="{theme_url}assets/images/counter_icon2.png" alt="counter_icon2" />
                    </div>
                    <div class="counter_content">
                        <h3 class="counter_text"><span class="counter">70</span>+</h3>
                        <p>Courses</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6">
                <div class="box_counter counter_style1 text_white text-center animation" data-animation="fadeInUp"
                    data-animation-delay="0.04s">
                    <div class="counter_icon">
                        <img src="{theme_url}assets/images/counter_icon3.png" alt="counter_icon3" />
                    </div>
                    <div class="counter_content">
                        <h3 class="counter_text"><span class="counter">1658</span>+</h3>
                        <p>Study Centres</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6">
                <div class="box_counter counter_style1 text_white text-center animation" data-animation="fadeInUp"
                    data-animation-delay="0.05s">
                    <div class="counter_icon">
                        <img src="{theme_url}assets/images/counter_icon4.png" alt="counter_icon4" />
                    </div>
                    <div class="counter_content">
                        <h3 class="counter_text"><span class="counter">853</span>+</h3>
                        <p>Awarded Centres</p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- END SECTION COUNTER -->