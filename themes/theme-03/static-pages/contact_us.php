<div class="row">
    <div class="col-md-12">
        <form action="" class="extra-setting" data-page_reload="true">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Contact Us Details</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mt-3">
                        <label for="" class="form-label">Google Map Url</label>
                        <textarea name="google_map_url" rows="7"
                            class="form-control"><?= $this->SiteModel->get_setting('google_map_url') ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Contact Us Details</label>
                        <textarea name="contact_us_details" class="form-control aryaeditor" placeholder="Enter Details"><?= $this->SiteModel->get_setting('contact_us_details', '
                                                                                <p>Address Landmark, City,<br>District - ZIPCODE, State,  INDIA </p>
                                                                        <p>(033) XXXX-7392 </p>
                                                                        <p>gggg@gmail.com, yyyy@gmail.com </p>
                                                                            ') ?></textarea>
                    </div>

                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>