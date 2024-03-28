<div class="row">
    <div class="col-md-12">
        <form action="" class="content-form">
            <input type="hidden" id="content_id" value="<?=$content_id?>">
            <div class="card shadow border-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Page Content</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="form-label mb-4">Page Content</label>
                        <textarea name="content" id="aryaeditor" cols="30" rows="10" class="aryaeditor form-control"><?=$content?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>