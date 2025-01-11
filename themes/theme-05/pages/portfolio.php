<div class="container margin-tp-10">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="portfolio-list margin-bt-30">
                <div class="headline clearfix">
                    <span class="slider-tb"><strong><?= ES('portfolio_title') ?></strong></span>
                    <div class="controls">
                        <span class="arrows next"><i class="fa fa-angle-right"></i></span><span class="arrows prev">
                            <i class="fa fa-angle-left"></i></span>
                    </div>
                </div>
                <div id="recentWorks">
                    <?php
                    $data = $this->SiteModel->get_contents($type);
                    if ($data->num_rows()):
                        $index = 1;
                        foreach ($data->result() as $row):
                            echo '<div class="thumbnail">
                                        <img src="{base_url}upload/' . $row->field2 . '" alt="" class="img-responsive" title="' . $row->field1 . '">
                                    </div>';
                        endforeach;
                    endif;
                    ?>

                </div>
            </div>
        </div>

    </div>
</div>