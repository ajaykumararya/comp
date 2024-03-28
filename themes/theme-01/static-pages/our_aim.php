<div class="row">
    <div class="col-md-12">
        <form action="" class="extra-setting">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Our Aim Section</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" placeholder="Enter Title" name="our_aim_page_title" value="<?= $this->SiteModel->get_setting('our_aim_page_title', '<h4>OUR</h4>
                <h1>AIM</h1>') ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="our_aim_page_content" class="aryaeditor" cols="30" rows="10"><?=$this->SiteModel->get_setting('our_aim_page_content')?> </textarea>
                    </div>
                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>
</div>