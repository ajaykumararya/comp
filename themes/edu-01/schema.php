<?php
if ($isPrimary) {
    ?>
    <!-- ==============================================
    ** Banner Carousel **
    =================================================== -->
    <div class="banner-outer">
        <div class="banner-slider">
            <div class="slide1">
                <div class="container">
                    <div class="content animated fadeInRight">
                        <div class="fl-right">
                            <h1 class="animated fadeInRight">Explore the World of <span class="animated fadeInRight">Our
                                    Graduates</span> </h1>
                            <p class="animated fadeInRight">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry.</p>
                            <a href="about.html" class="btn animated fadeInRight">Know More <span
                                    class="icon-more-icon"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide2">
                <div class="container">
                    <div class="content">
                        <h1 class="animated fadeInUp">MBA Marketing</h1>
                        <p class="animated fadeInUp">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.</p>
                        <a href="about.html" class="btn animated fadeInUp">Know More <span
                                class="icon-more-icon"></span></a>
                        <a href="gallery.html" class="btn white animated fadeInUp hidden-xs">Take a Tour <span
                                class="icon-more-icon"></span></a>
                    </div>
                </div>
            </div>
            <div class="slide3">
                <div class="container">
                    <div class="content animated fadeInLeft">
                        <h1 class="animated fadeInLeft">Online MBA</h1>
                        <p class="animated fadeInLeft">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.</p>
                        <a href="about.html" class="btn animated fadeInLeft">Know More <span
                                class="icon-more-icon"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="inner-banner blog">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content">
                        <h1>{page_name}</h1>
                        <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

{content}