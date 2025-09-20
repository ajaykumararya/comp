<style>
    .office-hours input[name="value[]"] {
        display: none;
    }
</style>
<div class="row">
    <?php
    $index = 'salient_feature_fisrt';
    $data_index = "{$index}_links";
    ?>
    <div class="col-md-4">
        <form action="" class="extra-setting-form office-hours">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">
                        Left Side Features
                    </h3>
                </div>
                <div class="card-body field-area p-3" data-index="<?= $data_index ?>">
                    <?php
                    $fields = $this->SiteModel->get_setting($data_index, '', true);
                    if ($fields) {
                        foreach ($fields as $value) {
                            $my_index = $value->title;
                            $value = $value->link;
                            echo '<div class="form-group position-relative mb-4">
                                            <input type="text" name="title[]" placeholder="Enter Open Hours" class="form-control border border-primary border-bottom-0 br-none p-2" value="' . $my_index . '">
                                               <input type="text" name="value[]" placeholder="Enter Value" class="form-control border border-primary border-bottom-0 br-none p-2" autocomplete="off" value="' . $value . '">
                                            <a href="javascript:;" class="btn border-1 border-danger border btn-light-danger h-25px lh-0 w-100 br-none p-2"><i class="ki-outline ki-trash"></i> Delete</a>
                                        </div>';
                        }
                    }
                    ?>
                </div>
                <div class="card-footer">
                    {save_button}
                    <button type="button" class="btn btn-light-primary add-new-field"><i class="ki-outline ki-plus"></i>
                        Add new </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <form action="" class="extra-setting" enctype="multipart/form-data" data-page_load="true">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Middle Section</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="form-label">Section Title</label>
                        <input type="text" name="salient_features_section_title" required
                            value="<?= ES('salient_features_section_title') ?>" class="form-control">
                    </div>
                    <div class="form-group mt-4">
                        <label for="" class="form-label">Middle Image</label>
                        <input type="file" name="salient_features_section_middle_image" class="form-control"
                            accept="image/*">
                        <?php
                        $img = ES('salient_features_section_middle_image');
                        echo img(base_url('upload/' . $img),true,[
                            'style' => 'width:100%;height:230px'
                        ]);
                        ?>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <?php
    $index = 'salient_feature_second';
    $data_index = "{$index}_links";
    ?>
    <div class="col-md-4">
        <form action="" class="extra-setting-form office-hours">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">
                        Right Side Features
                    </h3>
                </div>
                <div class="card-body field-area p-3" data-index="<?= $data_index ?>">
                    <?php
                    $fields = $this->SiteModel->get_setting($data_index, '', true);
                    if ($fields) {
                        foreach ($fields as $value) {
                            $my_index = $value->title;
                            $value = $value->link;
                            echo '<div class="form-group position-relative mb-4">
                                            <input type="text" name="title[]" placeholder="Enter Open Hours" class="form-control border border-primary border-bottom-0 br-none p-2" value="' . $my_index . '">
                                               <input type="text" name="value[]" placeholder="Enter Value" class="form-control border border-primary border-bottom-0 br-none p-2" autocomplete="off" value="' . $value . '">
                                            <a href="javascript:;" class="btn border-1 border-danger border btn-light-danger h-25px lh-0 w-100 br-none p-2"><i class="ki-outline ki-trash"></i> Delete</a>
                                        </div>';
                        }
                    }
                    ?>
                </div>
                <div class="card-footer">
                    {save_button}
                    <button type="button" class="btn btn-light-primary add-new-field"><i class="ki-outline ki-plus"></i>
                        Add new</button>
                </div>
            </div>
        </form>
    </div>
</div>