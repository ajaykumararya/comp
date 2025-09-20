
<div class="container bg-white shadow-sm">
    <div class="row g-4">
        <div class="col-12">
            <h4 class="nceb-heading-primary">
                <?=ES('salient_features_section_title')?>
            </h4>
            <hr>
        </div>
        <div class="col-12 col-md-3 offset-md-1">
            <ul class="list-group list-group-flush mt-md-3 wow slideInLeft text-dark text-center"
                style="visibility: visible; animation-name: slideInLeft;">
                <?php
                $data_index = 'salient_feature_fisrt_links';
                $fields = $this->SiteModel->get_setting($data_index, '', true);
                if ($fields) {
                    foreach ($fields as $value) {
                        $my_index = $value->title;
                        echo '<li class="list-group-item">' . $my_index . '</li>';
                    }
                }

                ?>
            </ul>

        </div>
        <div class="col-12 col-md-4 text-center">
            <?php
            $img = base_url('upload/'.ES('salient_features_section_middle_image'));
            ?>
            <img class="w-80" style="width:100%" alt="{title}" title="{title}" src="<?=$img?>"
                data-src="<?=$img?>">
            <br>
        </div>
        <div class="col-12 col-md-3">
            <ul class="list-group list-group-flush mt-md-3 text-dark text-center"
                style="visibility: visible; animation-name: slideInRight;">
                <?php
                $data_index = 'salient_feature_second_links';
                $fields = $this->SiteModel->get_setting($data_index, '', true);
                if ($fields) {
                    foreach ($fields as $value) {
                        $my_index = $value->title;
                        echo '<li class="list-group-item">' . $my_index . '</li>';
                    }
                }

                ?>
            </ul>
        </div>
        <br>
    </div>

</div>
<br />