<?php
if ($isPrimary) {
    $sliders = $this->SiteModel->slider();
    if ($sliders->num_rows()) {

        ?>
        <style>
            .slide .slide__inner{
                background-size:100% 100%!important;
                background-repeat: no-repeat!important;
            }
            @media screen and (min-width: 800px) {
                .slide .slide__inner{
                height: 475px!important;
                }
                .slider_wrapper{
                    height:410px
                }
            }
        </style>
        <!-------------------Slider section start---------->
        <section class="slider_wrapper" >

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-8">
                        <div class="slider">
                            <!-- slides -->
                            <div class="slider__slides">
                                <?php
                                $i = 1;
                                foreach ($sliders->result() as $slider) {
                                    $active = $i == 1 ? 's--active' : '';
                                    
                                    $active = $i == $sliders->num_rows() ? 's--prev' : $active;
                                    // $active = $i == $sliders->num_rows() ? 's--prev' : $active;
                                    $i++;
                                    ?>

                                    <div class="slide <?=$active?>" >
                                        <div class="slide__inner" style="background-image:url('<?=base_url('upload/'.$slider->image)?>')!important;">
                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>
                                <!-- <div class="slide s--active">
                                    <div class="slide__inner">
                                        <div class="btn_position">
                                            <a href="https://wa.me/9422123456" target="_blank" class="btn btn-lg">
                                                <span><i class="fas fa-phone-alt pr-1"></i> 9422123456</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide">
                                    <div class="slide__inner">
                                    </div>
                                </div>
                                <div class="slide s--prev">
                                    <div class="slide__inner">
                                    </div>
                                </div> -->


                            </div>
                            <!-- slides end -->
                            <div class="slider__control">
                                <div class="slider__control-line"></div>
                                <div class="slider__control-line"></div>
                            </div>
                            <div class="slider__control slider__control--right m--right">
                                <div class="slider__control-line"></div>
                                <div class="slider__control-line"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="contact-form-wrap my-3" data-aos="fade-right">
                            <div class="section-title text-left">
                                <!-- <span class="sub-title">FRANCHISEE ENQUIRY FORM</span> -->
                                <h2 class="title">ENQUIRY <span class="color-secondary"> FORM</span></h2>
                                <div class="mt-separator"><img src="{theme_url}assets/images/title.webp" alt="graduation.webp">
                                </div>
                            </div>
                            <form id="entry-form" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Your Name"
                                            autocomplete="true" onkeypress="return alphaonly(event)">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Mobile"
                                            autocomplete="true" onkeypress="only_number(event)" maxlength="10">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                            autocomplete="true">
                                    </div>
                                    <div class="col-md-6">
                                        <select name="state" id="state">
                                            <option value="">Select State</option>
                                            <?php
                                            foreach($this->db->order_by('STATE_NAME','ASC')->get('state')->result() as $row)
                                                echo '<option value="'.$row->STATE_ID.'">'.$row->STATE_NAME.'</option>';
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="city" id="city" placeholder="City"
                                            autocomplete="true" onkeypress="return alphaonly(event)">
                                    </div>

                                </div>
                                <button type="button" name="submit" value="submit" class="formSend_btn"
                                    onclick="return validation()">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>



        </section>
        <!-------------------Slider section end----------->
<?php
    }
}
else{
    ?>
    <section id="inner_banner" class="main_bannerWrapper about_banner" style="background-image:url('{theme_url}assets/images/about_banner.webp')">
    <div data-aos="zoom-in-down" class="aos-init aos-animate">
        <div class="conatiner">
            <div class="Head_txt">
                <h1>{page_name}</h1>
                <h6>{page_name} <span><i class="fas fa-angle-double-right pl-2 pr-2"></i></span><a href="{base_url}">HOME </a></h6>
            </div>
        </div>
    </div>
</section>
    <?php
}
?>

{content}

<?php
/*
?>


<!------------want franchise banner section start------------->
<section id="franchise" class="">
    <div class="container">
        <div class="franchise_bg">
            <div class="btn-wrapper btn-wrapper2">
                <a href="https://wa.me/9422123456" target="_blank" class="btn">
                    <span>Apply Now</span>
                </a>
            </div>
        </div>
    </div>
</section>
<!------------want franchise banner section end------------->
*/
?>