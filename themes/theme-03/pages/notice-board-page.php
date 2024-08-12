<div class="title-wrap">
    <h1 class="pageTitle">Notice <span>Board</span></h1>
</div>
<?php
  
?>
<div class="clearfix newsBox-wrap" id="newsSlider">
    <?php
    $this->db->order_by('field1','ASC');
    $data = $this->SiteModel->get_contents('notice-board');
    if ($data->num_rows()) {
        foreach ($data->result() as $row) {
            $time = strtotime($row->field1);
            $time = $time ? $time : time();
            ?>
            <div class="newsBox">
                <div class="newsContent">
                    <div class="date">
                        <span><?=date('d',$time)?></span>
                        <?=date('M-Y',$time)?>
                    </div>
                    <h5><a href="<?=$row->field3?>"
                            target="_blank"><?=$this->ki_theme->parse_string($row->field2)?></a></h5>
                    <!--<h5><a href="">WBSU UG SEMESTER - I (NEP SYSTEM) FINAL EXAMINATION FORM FILL UP NOTICE 2023-24</a></h5>-->
                    <!--<p></p>-->
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
<div class="clearfix text-right">
    <a href="site/notice.html" class="btn btn-default"><span><span class="hvr-bounce-to-right">View
                All</span></span></a>
</div>