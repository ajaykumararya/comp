<section class="divider bg-silver-deep">
    <div class="container pt-50 pb-60">
        <div class="row">
            <?php
            $data = $this->SiteModel->get_contents($type);
            if ($data->num_rows()):
                $index = 1;
                foreach ($data->result() as $row):
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 mb-sm-30">
                        <div class="feature-box text-center">
                            <div class="feature-icon">
                                <img src="{base_url}upload/<?=$row->field1?>" alt="">
                            </div>
                            <div class="feature-title">
                                <h3><?=$row->field2?></h3>
                                <?php
                                if($row->field4){
                                    echo '<a href="'.$row->field5.'" class="read-more font-roboto-slab text-theme-colored2">'.$row->field4.'</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>