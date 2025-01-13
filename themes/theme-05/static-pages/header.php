<div class="row">
    <div class="col-md-6">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">Header Logo(s)</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 1; $i <= 3; $i++) {
                            $name = 'header_logo_' . $i;
                            $file = ES($name);
                            $isExist = file_exists(('upload/' . $file));
                            echo '<tr>
                                        <td>' . $i . '.</td>
                                        <td>
                                            ';
                            echo $isExist ? img(base_url('upload/' . $file), false, [
                                'width' => '100'
                            ]) : label('File not found', 'danger');
                            echo '
                                        </td>
                                        <td>
                                        <form action="" class="extra-setting" enctype="multipart/form-data" data-page_load="true">
                                        <div class="input-group mb-5">
                                            <input type="file" name="' . $name . '" class="form-control"  aria-describedby="basic-addon2" autocomplete="off">
                                            <span class="input-group-text" id="basic-addon2" style="padding:0">
                                                <button class="btn btn-xs btn-sm btn-success"><i class="fa fa-save"></i></button>
                                            </span>
                                        </div>
                                        </form>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm remove-setting" data-key_type="type" data-key="'.$name.'"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <?php
        $data_index = 'header_hightlight_btn_links'
            ?>
        <form action="" class="extra-setting-form">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">
                        Right Side Buttons
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
                                            <input type="text" name="title[]" placeholder="Enter Title" class="form-control border border-primary border-bottom-0 br-none p-2" value="' . $my_index . '">
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
                        Add new Link</button>
                </div>
            </div>
        </form>
    </div>
</div>