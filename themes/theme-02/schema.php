<?php
if ($isPrimary) {
    $sliders = $this->SiteModel->slider();
    if ($sliders->num_rows()) {
        ?>
        <style>
            .banner-bg {
                display: block;
            }
            .banner-bg-mobile {
                display: none;
            }
            @media only screen and (max-width: 767px) {
                .banner-bg {
                    display: none;
                }
                .banner-bg-mobile {
                    display: block;
                }
                .banner_content_wrap .carousel-item {
                    padding: 0px 0;
                }
            }
        </style>
        <section class="banner_section p-0 full_screen">
            <div id="carouselExampleFade" class="banner_content_wrap carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $i = 1;
                    foreach ($sliders->result() as $slider) {
                      $active = $i == 1 ? 'active' : '';
                        ?>
                        <div class="carousel-item <?=$active?>  background_bg overlay_bg_40 background_bg_image<?= $i++ ?>">
                            <span class="banner-bg"><img src="{base_url}upload/<?= $slider->image ?>" width="100%"></span>
                            <span class="banner-bg-mobile"><img src="{base_url}upload/<?= $slider->image ?>" width="100%"></span>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="carousel-nav carousel_style1">
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                            <i class="ion-chevron-left"></i>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                            <i class="ion-chevron-right"></i>
                        </a>
                    </div>
                </div>
        </section>
        <?php
    }
} else {
    ?>
    <section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50"
        data-parallax-bg-image="assets/images/about_bg.jpg"
        style="position: relative; background: transparent; overflow: hidden; z-index: 1;">
        <div class="parallax-inner"
            style="position: absolute; background-image: url(&quot;assets/images/about_bg.jpg&quot;); background-position: center center; background-repeat: no-repeat; background-size: cover; width: 1423px; height: 347px; transform: translate3d(0px, -152px, 0px); transition: transform 100ms ease 0s; z-index: -1;">
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h1>{page_name}</h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-sm-end">
                            <li class="breadcrumb-item"><a href="{base_url}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {page_name}
                            </li>
                        </ol>
                    </nav>
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



<!-- START SECTION EVENT -->
<!-- START SECTION EVENT -->
<!-- START SECTION REGISTER -->
<section class="pb-0 background_bg bg_blue_dark" data-img-src="https://www.rgycsm.org/assets/images/pattern_bg.png">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-6 col-md-7">
                <div class="register_form radius_all_10 text_white padding_eight_all animation"
                    data-animation="fadeInLeft" data-animation-delay="0.02s">
                    <div class="heading_s1 heading_light">
                        <h2>
                            Get A Free <span class="text_default">Online Courses</span>
                        </h2>
                    </div>
                    <form method="post" name="enq" class="pt-md-2 form_transparent">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input required="required" placeholder="Enter Name *" class="form-control" name="name"
                                    type="text" />
                            </div>
                            <div class="form-group col-sm-6">
                                <input required="required" placeholder="Enter Email *" class="form-control" name="email"
                                    type="email" />
                            </div>
                            <div class="form-group col-sm-6">
                                <input required="required" placeholder="Enter Phone No *" class="form-control"
                                    name="phone" type="tel" />
                            </div>
                            <div class="form-group col-sm-6">
                                <input required="required" placeholder="Course Name" class="form-control" name="phone"
                                    type="text" />
                            </div>
                            <div class="form-group col-sm-12">
                                <textarea required="required" placeholder="Message *" class="form-control"
                                    name="message" rows="4"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" title="Submit Your Message!" class="btn btn-default" name="submit"
                                    value="Submit">
                                    Submit Now
                                </button>
                            </div>
                            <div class="col-sm-12">
                                <div id="alert-msg" class="alert-msg text-center"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="large_divider"></div>
            </div>
            <div class="col-lg-6 col-md-5">
                <div class="text-center animation" data-animation="fadeInRight" data-animation-delay="0.03s">
                    <img src="{theme_url}assets/images/girl_img.png" alt="girl_img" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION REGISTER -->
<!-- START SECTION TESTIMONIAL -->
<!--<section>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8">
            <div
              class="text-center animation"
              data-animation="fadeInUp"
              data-animation-delay="0.01s"
            >
              <div class="heading_s1 text-center">
                <h2 class="main-heading center-heading">Student Say!</h2>
              </div>
              <p>
                If you are going to use a passage of Lorem Ipsum, you need to be
                sure there isn't anything embarrassing hidden in the middle of
                text
              </p>
              <div class="small_divider"></div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div
            class="col-12 animation"
            data-animation="fadeInUp"
            data-animation-delay="0.02s"
          >
            <div
              class="testimonial_slider testimonial_style1 carousel_slider owl-carousel owl-theme"
              data-margin="30"
              data-loop="true"
              data-autoplay="true"
              data-dots="false"
              data-responsive='{"0":{"items": "1"}, "576":{"items": "2"}, "1199":{"items": "2"}}'
            >
              <div class="testimonial_box">
                <div class="testimonial_img">
                  <img
                    class="radius_all_5"
                    src="https://www.rgycsm.org/assets/images/client_img1.jpg"
                    alt="client"
                  />
                </div>
                <div class="testi_meta">
                  <div class="testi_user">
                    <h6>Lissa Castro</h6>
                    <span class="text_default">Co-Founder</span>
                  </div>
                  <div class="testi_desc">
                    <p>
                      Sed ut perspiciatis unde omnis iste natus error sit
                      voluptatem accusantium doloremque laudantium, quaeillo
                      inventore veritatis et quasi architecto beatae vitae dicta
                      sunt explicabo.
                    </p>
                  </div>
                </div>
              </div>
              <div class="testimonial_box">
                <div class="testimonial_img">
                  <img
                    class="radius_all_5"
                    src="https://www.rgycsm.org/assets/images/client_img2.jpg"
                    alt="client"
                  />
                </div>
                <div class="testi_meta">
                  <div class="testi_user">
                    <h6>Lissa Castro</h6>
                    <span class="text_default">Co-Founder</span>
                  </div>
                  <div class="testi_desc">
                    <p>
                      Sed ut perspiciatis unde omnis iste natus error sit
                      voluptatem accusantium doloremque laudantium, quaeillo
                      inventore veritatis et quasi architecto beatae vitae dicta
                      sunt explicabo.
                    </p>
                  </div>
                </div>
              </div>
              <div class="testimonial_box">
                <div class="testimonial_img">
                  <img
                    class="radius_all_5"
                    src="https://www.rgycsm.org/assets/images/client_img3.jpg"
                    alt="client"
                  />
                </div>
                <div class="testi_meta">
                  <div class="testi_user">
                    <h6>Lissa Castro</h6>
                    <span class="text_default">Co-Founder</span>
                  </div>
                  <div class="testi_desc">
                    <p>
                      Sed ut perspiciatis unde omnis iste natus error sit
                      voluptatem accusantium doloremque laudantium, quaeillo
                      inventore veritatis et quasi architecto beatae vitae dicta
                      sunt explicabo.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>-->
<!-- END SECTION TESTIMONIAL -->
<!-- START SECTION BLOG -->
<!-- END SECTION BLOG -->
<!-- START SECTION CLIENT LOGO -->

<!-- END SECTION CALL TO ACTION -->
<section class="bg_default small_pt small_pb">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="text_white cta_section">
                    <div class="medium_divider d-block d-md-none"></div>
                    <div class="heading_s1 heading_light">
                        <h2>Get The Coaching Training Today!</h2>
                    </div>
                    <p>
                        If you are going to use a passage of embarrassing hidden in the
                        middle of text
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-md-right">
                    <a href="#" class="btn btn-outline-white">Get Started</a>
                </div>
                <div class="medium_divider d-block d-md-none"></div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION CALL TO ACTION -->
*/
?>
