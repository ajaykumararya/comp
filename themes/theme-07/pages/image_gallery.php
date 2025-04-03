<!-- Section: Gallery -->
<section id="gallery">
    <div class="container">
        <div class="section-title">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-uppercase title">Campus <span class="text-theme-colored2">Gallery</span>
                    </h2>
                    <p class="text-uppercase mb-0">See our gallery pictures</p>
                    <div class="double-line-bottom-theme-colored-2"></div>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Works Filter -->
                    <!-- <div class="portfolio-filter font-alt align-center">
                        <a href="#" class="active" data-filter="*">All</a>
                        <a href="#select1" class="" data-filter=".select1">Photos</a>
                        <a href="#select2" class="" data-filter=".select2">Campus</a>
                        <a href="#select3" class="" data-filter=".select3">Students</a>
                    </div> -->
                    <!-- End Works Filter -->

                    <!-- Portfolio Gallery Grid -->
                    <div id="grid" class="gallery-isotope default-animation-effect grid-4 gutter clearfix">
                        <?php
                        foreach ($gallery as $img):
                            ?>
                            <!-- Portfolio Item Start -->
                            <div class="gallery-item">
                                <div class="thumb">
                                    <img class="img-fullwidth" style="height:200px" src="{base_url}upload/<?= $img['image'] ?>" alt="project">
                                    <div class="overlay-shade"></div>
                                    <div class="icons-holder">
                                        <div class="icons-holder-inner">
                                            <div
                                                class="styled-icons icon-sm icon-bordered icon-circled icon-theme-colored2">
                                                <a data-lightbox="image" href="{base_url}upload/<?= $img['image'] ?>"><i
                                                        class="fa fa-eye"></i></a>
                                                <!-- <a href="#"><i class="fa fa-link"></i></a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Portfolio Item End -->

                            <?php
                        endforeach;
                        ?>

                    </div>
                    <!-- End Portfolio Gallery Grid -->
                </div>
            </div>
        </div>
    </div>
</section>