<!-- ==============================================
    ** News & Events **
    =================================================== -->
<section class="news-events padding-lg">
    <div class="container">
        <h2>
            <span><?= ES($type . '_description') ?></span>
            <?= ES($type . '_title') ?>
        </h2>
        <ul class="row cs-style-3">
            <?php
            $data = $this->SiteModel->get_contents($type);
            if ($data->num_rows()):
                $index = 1;
                foreach ($data->result() as $row):
                    ?>
                    <li class="col-sm-4">
                        <div class="inner">
                            <figure> <img src="{base_url}upload/<?=$row->field1?>" style="height:265px" class="img-responsive">
                                <figcaption>
                                    <div class="cnt-block"> 
                                        
                                        <a href="news.html" class="plus-icon">+</a>
                                        <h3><?=$row->field2?></h3>
                                        <div class="bottom-block clearfix">
                                            <div class="date">
                                                <div class="icon"><span class="icon-calander-icon"></span></div>
                                                <span><?=date('d M',strtotime($row->field4))?></span> <?=date('Y',strtotime($row->field4))?>
                                            </div>
                                            <!-- <div class="comment">
                                                <div class="icon"><span class="icon-chat-icon"></span></div>
                                                <span>24</span> comments
                                            </div> -->
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                    <?php
                endforeach;
            endif;
            ?>

        </ul>
        <!-- <div class="know-more-wrapper"> <a href="news.html" class="know-more">More Post <span
                    class="icon-more-icon"></span></a> </div> -->
    </div>
</section>