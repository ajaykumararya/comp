<!-- ==============================================
    ** Campus Tour **
    =================================================== -->
<section class="campus-tour padding-lg" style="padding-bottom:90px">
    <!-- <div class="container">
            <h2><span>Our campus have a lot to offer for our students</span>TAKE A CAMPUS TOUR</h2>
        </div> -->
    <ul class="gallery clearfix">
        <?php
        foreach ($gallery as $img):
            $imgUrl = base_url('upload/' . $img['image']);
            ?>
            <li>
                <div class="overlay">
                    <h3><?=$img['title']?></h3>
                    <!-- <p>Lorem ipsum</p> -->
                    <a class="galleryItem" href="<?=$imgUrl?>"><span class="icon-enlarge-icon"></span></a>
                    <!-- <a href="gallery.html" class="more"><span class="icon-gallery-more-arrow"></span></a> -->
                </div>
                <figure><img src="<?=$imgUrl?>" class="img-responsive" alt="" style="height:230px"></figure>
            </li>
            <?php
        endforeach;
        ?>
        
    </ul>
</section>