<div class="row">
<div class="col-md-12">
        <form action="" class="extra-setting">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Section Setting</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-4">
                        <label for="" class="form-label">Title</label>
                        <input class="form-control" name="<?=$type?>_page_title"
                            value="<?= ES($type.'_page_title', 'Get in touch with us') ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control"
                            name="<?=$type?>_page_description"><?= ES($type.'_page_description', 'Description') ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="form-label">Google Map</label>
                        <textarea class="form-control" name="google_map_url"><?= ES('google_map_url', '') ?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>
</div>
