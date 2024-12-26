<?php
$hideorShow = ES('isRecentcentre', 'hide');
if ($hideorShow == 'show') {
    $limit = ES('recentcentre_num_show', 0);
    // echo $limit;
    $get = $this->db->where([
        'status' => 1,
        'type' => 'center'
    ])->limit($limit)->get('centers');
    if ($get->num_rows()) {
        ?>

        <!-- Recently Joined Center Section -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card bg-white border-0 rounded-0 w-100 h-100 p-3">
                        <h4 class="nceb-heading-primary">{recentcentre_sectoin_title}</h4>
                        <hr class="w-25" style="height:10px;">

                        <div class="glider-contain multiple">
                            <div class="glider" id="recentCenters">
                                <?php

                                foreach ($get->result() as $row) {
                                    $name = $row->name;
                                    $img = 'upload/'.$row->image;
                                    // pre($row);
                                    ?>

                                    <div class="p-2">
                                        <div class="card bg-white shadow-sm border-0 w-100">
                                            <div class="card-header bg-secondary text-white text-center">
                                                <?=$row->center_number?>
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="position-relative">
                                                    <img src="<?=$img?>"
                                                        data-src="<?=$img?>"
                                                        class="center_head_img rounded-circle img-fluid w-100 border border-5 border-secondary"
                                                        alt="<?=$title?> center head image of <?=$row->center_number?>">
                                                </div>
                                                <div class="center_head_name"><b><?=$name?></b></div>
                                            </div>
                                            <div class="card-footer bg-primary text-white text-center">
                                                <?=get_route($row->state_id,'state')?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                
                                ?>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <?php
    }
}
?>