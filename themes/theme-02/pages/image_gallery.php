<section>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <ul class="grid_container gutter_medium grid_col4" style="position: relative; height: 600px;">
                    <li class="grid-sizer"></li>
                    <?php
                    foreach ($gallery as $img):
                        ?>

                        <li class="grid_item events" >
                            <div class="gallery_item" style="height:250px">
                                <a href="#" class="image_link">
                                    <img src="{base_url}upload/<?=$img['image']?>" alt="image" style="height:100%">
                                </a>
                                <div class="gallery_content">
                                    <div class="link_container">
                                        <a href="{base_url}upload/<?=$img['image']?>"
                                            class="image_popup"><span class="ripple"><i class="ion-image"></i></span></a>
                                    </div>
                                    <!--<div class="text_holder text_white">
                                       <h5>ANNUAL MEET 2016 DIGHA</h5>
                                </div>-->
                                </div>
                            </div>
                        </li>
                        <?php
                    endforeach;
                    ?>

                </ul>
            </div>
        </div>
    </div>
</section>