<div class="clearfix title-wrap text-center  mt-5 mb-0">
    <h2 class="secTitle">
        <?= ES("{$type}_title", 'Our Facilities') ?>
    </h2>
</div>
<div class="clearfix row">
    <?php
    $col = (isset($notice_board) ? 6 : 4);
    $data = content($type);
    if ($data->num_rows()) {
        foreach ($data->result() as $row) {
            echo '<div class="col-md-6 col-xl-' . $col . '">
                        <div class="clearfix serviceBox">
                            <a href="#" class="icon">
                                <i class="' . $row->field1 . '"></i>
                            </a>
                            <h3><a href="#">' . $row->field2 . '</a></h3>
                            <p>
                                ' . $row->field3;
            if ($row->field4) {
                echo '<a href="' . $row->field5 . '" title=""
                                    class="link" style="color:#f7931d;">' . $row->field4 . '</a>';
            }
            echo '</p>
                        </div>
                    </div>';
        }
    }
    ?>
</div>