<div class="row">
    <div class="col-md-6 mb-5">
        <form action="" class="extra-setting" enctype="multipart/form-data" data-page_load="true">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Header Setting</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="form-label required">Marquee Title</label>
                        <input type="text" name="header_marquee_title"
                            value="<?= ES('header_marquee_title', 'ANNOUNCEMENT') ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Marquee</label>
                        <textarea name="header_marquee" class="form-control"
                            placeholder="Enter Marquee Data"><?= ES('header_marquee', '') ?></textarea>

                    </div>

                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <form class="type-setting-form"
            data-type="our-header-button" enctype="multipart/form-data" method="post" accept-charset="utf-8">

            <div class="card shadow-sm mb-5 border-2 border-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Buttons</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="" class="form-label required">Button Title</label>
                        <input type="text" name="field2" class="form-control" placeholder="Enter Title">
                    </div>
                    <div class="form-group mb-3">
                        <?= inconPickerInput('field1') ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label required">Button Link</label>
                        <input type="text" name="field3" class="form-control" placeholder="Enter Link">
                    </div>

                    <div class="form-group">
                        <label for="" class="form-label required">Button Type</label>
                        <select name="field4" class="form-control">
                            <option value="button">Button</option>
                            <option value="text">Text</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button
                        class="save-btn pulse pulse-success btn btn-outline hover-rotate-end btn-outline-dashed btn-outline-success btn-active-light-success"
                        type="submit"><span class="pulse-ring"></span> <i class="ki-duotone ki-save-2 fs-1"><span
                                class="path1"></span><span class="path2"></span></i>&nbsp;Save</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6 mt-3">
        <div class="card shadow-sm mb-5 border-2 border-primary">
            <div class="card-header">
                <h3 class="card-title">List Buttons</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" setting-table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Button</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = $this->SiteModel->get_contents('our-header-button');
                            if ($data->num_rows()):
                                $index = 1;
                                foreach ($data->result() as $row):
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $index++ ?>.
                                        </td>
                                        <td>
                                            <?php
                                            $html = '<i class="' . $row->field1 . ' text-dark" style="font-size: 30px"></i> &nbsp;'.$row->field2;
                                            
                                            echo '<a href="'.$row->field3.'" '.($row->field4 == 'button' ? ' class="btn btn-primary btn-xs btn-sm"' : '').'>'.$html.'</a>';
                                           
                                            ?>
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
</div>