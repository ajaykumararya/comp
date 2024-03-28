<div class="row">
    <div class="col-md-5">
        <form action="" id="save-slider" enctype="multipart/form-data">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add Slider</h3>
                </div>
                <div class="card-body p-3">
                    <div class="form-group">
                        <label for="image" class="form-label mb-4">Select Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-7">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Slider Image(s)</h3>
            </div>
            <div class="card-body p-3">
                <table id="list-slider" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>