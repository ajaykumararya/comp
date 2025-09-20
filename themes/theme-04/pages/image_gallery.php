<section class="ttm-row bg-img2 clearfix">
    <div class="container">
        <div class="row mt_100">
            <?php
            foreach ($gallery as $img):
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="featured-imagebox style2">
                        <div class="ttm-post-thumbnail featured-thumbnail">
                            <img class="img-fluid" src="{assets}<?=$img['image']?>" alt="<?=$img['title']?>">
                            <div class="ttm-icon-box">
                                <a class="ttm_prettyphoto ttm_image ttm-textcolor-skincolor" title="Gallery"
                                    data-gal="1" data-rel="prettyPhoto" href="{assets}<?=$img['image']?>"><i
                                        class="fa fa-camera"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
            ?>
        </div>
    </div>
</section>