<div class="row">
    <div class="col-md-8">
        <form action="" class="extra-setting">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Update Title</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-4">
                        <label for="" class="form-label">Title</label>
                        <input class="form-control" name="reservation_page_title"
                            value="<?= ES('reservation_page_title', 'Title') ?>">
                    </div>
                    <div class="form-group mb-4">
                        <label for="" class="form-label">Sub Title</label>
                        <input class="form-control" name="reservation_page_subtitle"
                            value="<?= ES('reservation_page_subtitle', 'Sub Title') ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control" name="reservation_page_description"><?= ES('reservation_page_description', 'Description')?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <form action="" class="extra-setting" enctype="multipart/form-data">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Section Background-Image</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="image" class="form-label mb-4 required">Image</label>
                        <input type="file" name="reservation_page_bg_image" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">
                            <img src="<?= base_url('upload/') . ES('reservation_page_bg_image') ?>"
                                alt="" id="logo" class="img-fluid w-100 h-200px">
                        </label>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <form action="" class="extra-setting">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Our Counter</h3>
                    <div class="card-toolbar">
                        {save_button}
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="w-50 fs-1">Title</th>
                                <th class="w-50 fs-1">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $our_counters = [
                                'first_counter' => 'Happy Students',
                                'secound_counter' => 'Approved Courses',
                                'third_counter' => 'Certified Teachers',
                                'forth_counter' => 'Graduate Students',
                            ];
                            foreach ($our_counters as $index => $counter) {
                                $title = $this->SiteModel->get_setting($index . '_text', $counter);
                                $value = $this->SiteModel->get_setting($index . '_value');
                                $icon = $this->SiteModel->get_setting($index . '_icon');
                                echo "
                                
                                    <tr>
                                        <td>
                                            " . inconPickerInput($index . '_icon', $icon) . "
                                        </td>
                                        <td>
                                        <input name='{$index}_text' class='custom_setting_input' value='$title'>
                                        </td>
                                        <td>
                                        <input name='{$index}_value' class='custom_setting_input'  value='$value'>
                                        </td>
                                    </tr>
                                
                                ";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>