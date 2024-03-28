<div class="row">
    <div class="col-md-5">
        <form action="" class="extra-setting" data-page_reload="true">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Enqyiry Form</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Enter</label>
                        <input name="enquiry_form_title"
                            value="<?= $this->SiteModel->get_setting('enquiry_form_title') ?>" class="form-control"
                            placeholder="Enter Form Title">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Side Image</label>
                        <input type="file" name="enquiry_form_image" class="form-control">
                        <script></script>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>