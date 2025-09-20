<div class="row">
    <div class="col-md-7">
        <div class="card border-success">
            <div class="card-header min-h-20px py-2 bg-light-success">
                <h3 class="card-title">Manage Menu</h3>
                <div class="toolbar">
                    {save_button}
                </div>
            </div>
            <div class="card-body menu-section p-3 min-h-500px"></div>
        </div>
    </div>
    <?php
    if (CHECK_PERMISSION('MENU_RIGHT_BUTTON') && !CHECK_PERMISSION('EBOOK')) {
        ?>
        <div class="col-md-5">
            <form action="" class="extra-setting">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Menu Right Button</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="" class="form-label">Button Title</label>
                            <input type="text" name="menu_right_button_title" value="<?= ES('menu_right_button_title') ?>"
                                placeholder="Enter Button Title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Button Link</label>
                            <input type="text" name="menu_right_button_link" value="<?= ES('menu_right_button_link') ?>"
                                placeholder="Enter Button Link" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        {save_button}
                    </div>
                </div>
            </form>
        </div>
        <?PHP
    }
    ?>
</div>