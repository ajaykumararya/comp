<div class="row">
    <div class="col-md-7">
        <form action="" class="extra-setting">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">About Us Content</h3>
                </div>
                <div class="card-body p-2">
                    <div class="form-group">
                        <label for="" class="form-label mb-4">Content</label>
                        <textarea class="aryaeditor" id="aryaeditor" name="about_us_content"><?=$this->SiteModel->get_setting('about_us_content')?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-5">
        <form action="" class="extra-setting" enctype="multipart/form-data">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">About Us Image</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="image" class="form-label mb-4 required">Logo</label>
                        <input type="file" name="about_us_image" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">
                            <img src="<?= base_url('upload/') . $this->SiteModel->get_setting('about_us_image') ?>" alt=""
                                id="logo" class="img-fluid w-100 h-300px">
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
    <div class="col-md-6 mt-4">
        <form action="" class="extra-setting">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Update Title</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="form-label">Title</label>
                        <input class="form-control" name="about_us_page_title" value="<?=$this->SiteModel->get_setting('about_us_page_title','About Us')?>">
                    </div>
                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-6 mt-4">
        <form action="" class="extra-setting">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Update Button</h3>
                </div>
                <div class="card-body">
                <div class="form-group">
                        <label for="" class="form-label">Button Text</label>
                        <input class="form-control" name="about_us_page_button_text" value="<?=$this->SiteModel->get_setting('about_us_page_button_text')?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Button Link</label>
                        <input class="form-control" name="about_us_page_button_link" value="<?=$this->SiteModel->get_setting('about_us_page_button_link','#')?>">
                    </div>
                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>

</div>