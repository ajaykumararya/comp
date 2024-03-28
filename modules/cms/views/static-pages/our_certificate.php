

<div class="row">
    <div class="col-md-4">
        <form action="" id="add-certificate-content">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add Certificate</h3>
                </div>
                <div class="card-body p-3">
                    <div class="form-group mb-4">
                        <label for="title" class="form-label mb-1 required">Course name</label>
                        <input type="text" class="form-control" name="title" placeholder="Course name">
                    </div>
                    <div class="form-group mb-4">
                        <label for="image" class="form-label mb-1 required">Course image</label>
                        <input type="file" class="form-control" name="image" >
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Content Certificates</h3>
            </div>
            <div class="card-body p-2">
                <table class="table table-responsive table-bordered" id="list-certificates">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>image</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <dv class="col-md-4">
        <?=$this->ki_theme->extra_setting_title_form('Certificate Section Title','certificate_page_title','Our Certificates Are')?>
    </dv>
</div>