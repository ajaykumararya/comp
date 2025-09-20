<div class="row">
    <div class="col-md-12 mb-3">
        <form action="" class="extra-setting mt-3" data-page_reload="true">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Setting</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="title" class="form-label">News Section Title</label>
                                <input name="latest_news_section_title" value="<?= ES('latest_news_section_title') ?>"
                                    class="form-control" placeholder="Enter Section Title">
                            </div>
                        </div>
                        <!-- <div class="col-md-6">

                            <div class="form-group">
                                <label for="title" class="form-label">Countor Or Stats Section Title</label>
                                <input name="counter_section_title" value="<?= ES('counter_section_title') ?>"
                                    class="form-control" placeholder="Enter Section Title">
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
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
                                // 'forth_counter' => 'Awarded Centers'
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
</div>
<hr>
<div class="row">
    <div class="col-md-5">
        {form}
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add Latest News</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="form-label">News Heading</label>
                        <input type="text" name="field1" placeholder="Enter Heading..." class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>

    </div>

    <div class="col-md-7">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Latest News</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" setting-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $this->SiteModel->get_contents($type);
                        if ($data->num_rows()):
                            $index = 1;
                            foreach ($data->result() as $row):
                                ?>
                                <tr>
                                    <td>
                                        <?= $index++ ?>.
                                    </td>
                                    <td>
                                        <?= $row->field1 ?>
                                    </td>
                                    <td>
                                        <?= base64_encode($row->id) ?>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>