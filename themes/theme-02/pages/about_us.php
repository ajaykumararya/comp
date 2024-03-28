<!-- START SECTION ABOUT -->
<section class="small_pt  m overflow-hidden">
    <div class="container-fluid p-0">
        <div class="row "><!--no-gutters align-items-center-->
            <div class="col-md-6">
                <div class="box_shadow1 bg-white padding_eight_all  overlap_section pt-0">
                    <!--padding_eight_all overlap_section-->
                    <div class="animation" data-animation="fadeInLeft" data-animation-delay="0.02s">
                        <div class="heading_s1">
                            <h2 class="main-heading"><?=$this->SiteModel->get_setting('about_us_page_title','About Us')?></h2>
                        </div>
                        <?=$this->SiteModel->get_setting('about_us_content','About Us Content')?>
                        <?php
                        if($button = $this->SiteModel->get_setting('about_us_page_button_text')){
                            $buttonLink = $this->SiteModel->get_setting('about_us_page_button_link','#');
                            echo '<a href="'.$buttonLink.'" class="btn btn-default">'.$button.' <i class="ion-ios-arrow-thin-right ml-1"></i></a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <img style="width: 65%;    margin-left: 20%;" src="{base_url}upload/<?=$this->SiteModel->get_setting('about_us_image')?>"
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION ABOUT -->