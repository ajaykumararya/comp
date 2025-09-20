<div class="vc_row wpb_row vc_row-fluid vc_custom_1528900735495">
    <?php
    $data = $this->SiteModel->get_contents($type);
    if ($data->num_rows()):
        $index = 1;
        foreach ($data->result() as $row):
            ?>
            <div class="wpb_column vc_column_container vc_col-sm-4">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <div class="icon-box icon-box-large icon-box-left style-square">
                            <div class="icon-wrap">
                                <div class="icon-element">
                                    <div class="icon-element-inner"
                                        style="border-color: #acceef;border-width: 1px;border-style: solid;border-radius: 22px">
                                        <i class="icon-item <?=$row->field1?>" style="color: <?=$row->field4?>"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-content">
                                <div class="feature-content-title">
                                    <h4><?=$row->field2?></h4>
                                </div>
                                <div class="feature-content-text">
                                    <p><?=$row->field3?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endforeach;
        
    endif;
    ?>
</div>