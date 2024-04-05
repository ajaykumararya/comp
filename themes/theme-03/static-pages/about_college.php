<div class="row">
    <div class="col-md-12 mb-5">
        <form action="" class="extra-setting">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">About College</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label mt-4">Title</label>
                        <input type="text" placeholder="Enter Title" name="about_college_title"
                            value="<?= $this->SiteModel->get_setting('about_college_title') ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label mt-4">Description</label>
                        <textarea name="about_college_content" class="form-control maxlength_textarea" maxlength="500" cols="10"
                            rows="8"><?= $this->SiteModel->get_setting('about_college_content') ?> </textarea>
                    </div>
                    <?php
                    echo $this->ki_theme->extra_setting_button_input('about_college_button');
                    ?>
                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-6">
        <form action="" class="extra-setting" enctype="multipart/form-data" data-page_load="true">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Principal Message</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label mt-4">Principal Image</label>
                        <input type="file" name="principal_photo" class="form-control">
                        <?php
                        echo img([
                            'src' => UPLOAD . $this->SiteModel->get_setting('principal_photo'),
                            'class' => 'w-100px'
                        ]);
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label mt-4">Principal Name</label>
                        <input type="text" placeholder="Enter Principal Name" name="principal_name"
                            value="<?= $this->SiteModel->get_setting('principal_name') ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label mt-4">Designation With College Name</label>
                        <input type="text" placeholder="Enter Designation" name="designation_principal_box"
                            value="<?= $this->SiteModel->get_setting('designation_principal_box') ?>"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label mt-4">Description</label>
                        <textarea name="principal_box_description" class="form-control maxlength_textarea" maxlength="140" cols="30"
                            rows="10"><?= $this->SiteModel->get_setting('principal_box_description') ?> </textarea>
                    </div>

                    <?php
                    echo $this->ki_theme->extra_setting_button_input('principal_box_button');
                    ?>

                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form action="" class="extra-setting" enctype="multipart/form-data" data-page_load="true">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Setting</h3>
                </div>
                <div class="card-body">
                    <?php
                    $status = $this->SiteModel->get_setting('certificate_show_with_about_us', 'hide');
                    ?>
                    <div class="form-group">
                        <label for="title" class="form-label mt-4">Our Certificate(S)</label>
                        <select data-control="select2" placeholder="Enter Principal Name"
                            name="certificate_show_with_about_us" class="form-control">
                            <option value="hide" <?= $status == 'hide' ? 'selected' : '' ?>>Hide</option>
                            <option value="show" <?= $status == 'show' ? 'selected' : '' ?>>Show</option>
                        </select>
                    </div>

                    <?php
                    $status = $this->SiteModel->get_setting('principal_box_show_with_about_us', 'hide');
                    ?>
                    <div class="form-group">
                        <label for="title" class="form-label mt-4">Principal Message</label>
                        <select data-control="select2" placeholder="Enter Principal Name"
                            name="principal_box_show_with_about_us" class="form-control">
                            <option value="hide" <?= $status == 'hide' ? 'selected' : '' ?>>Hide</option>
                            <option value="show" <?= $status == 'show' ? 'selected' : '' ?>>Show</option>
                        </select>
                    </div>

                    <div class="alert alert-success d-flex align-items-center p-5 mt-10 ">
                        <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span
                                class="path2"></span></i>
                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-success">This is an Information</h4>
                            <span>
                                <ol type="A">
                                    <li>You can Add Certificate on <code> <?=anchor('cms/static-pages/our-certificate','Our Certificate')?></code> Page.</li>
                                    <li>You can change the details of <b>Principal Message </b>, from this page.</li>
                                </ol>
                                
                            </span>
                        </div>
                    </div>


                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>
</div>