<div class="row">
    <div class="col-md-12">
        <form action="" class="extra-setting">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Our Counter </h3>
                    <div class="card-toolbar">
                        {save_button}
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="w-30 fs-1">Title</th>
                                <th class="fs-1">Icon</th>
                                <th class="w-30 fs-1">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $our_counters = [
                                'first_counter' => 'Certified Students',
                                'secound_counter' => 'Courses',
                                'third_counter' => 'Study Centers',
                                'forth_counter' => 'Awarded Centers'
                            ];
                            foreach ($our_counters as $index => $counter) {
                                $title = $this->SiteModel->get_setting($index . '_text', $counter);
                                $value = $this->SiteModel->get_setting($index . '_value');
                                $icon = $this->SiteModel->get_setting($index . '_icon');
                                echo "
                                
                                    <tr>
                                        <td>
                                        <input name='{$index}_text' class='custom_setting_input'
                                    value='$title'>
                                        </td>
                                        <td>
                                            " . inconPickerInput($index . '_icon', $icon) . "
                                        </td>
                                        <td>
                                        <input name='{$index}_value' class='custom_setting_input'
                                        value='$value'>
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
    <div class="col-md-4 mt-4">
        <form action="" class="extra-setting">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Section Setting</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-4">
                        <label for="" class="form-label">Title</label>
                        <input class="form-control" name="<?=$type?>_title"
                            value="<?= ES($type.'_title', 'Why Choose Us') ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control"
                            name="<?=$type?>_description"><?= ES($type.'_description', 'Description') ?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>
</div>