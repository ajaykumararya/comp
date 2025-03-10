<div class="row">
    <div class="col-md-12">
        <form action="" class="extra-setting">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">SEO Setting</h3>
                </div>
                <div class="card-body row">
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label mb-3">Meta Title:</label>
                            <input class="form-control" value="<?=ES('meta_title',ES('title'))?>" required placeholder="Meta Title" type="text" name="meta_title" required
                                maxlength="60">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label mb-3">Meta Keywords:</label>
                            <input class="form-control" tagify='arya' value="<?=meta_keywords()?>" type="text" placeholder="Meta Keywords" name="meta_keywords">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3">

                            <label class="form-label mb-3">Meta Description:</label>
                            <textarea data-kt-autosize="true" name="meta_description" placeholder="Meta Description" class="form-control"
                                required maxlength="160"><?=ES('meta_description')?></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label mb-3">Open Graph Title (For Social Media):</label>
                            <input class="form-control" type="text" name="og_title"
                                placeholder="Open Graph Title (For Social Media)" value="<?=ES('og_title',ES('title'))?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label mb-3">Open Graph Description:</label>
                            <textarea name="og_description" data-kt-autosize="true" class="form-control" maxlength="160"
                                placeholder="Open Graph Description"><?=ES('og_description')?></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>