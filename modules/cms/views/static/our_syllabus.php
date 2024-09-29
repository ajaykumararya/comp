<div class="row">
    <div class="col-md-5 mt-4">
        <form action="" id="upload-syllabus">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Upload Syllabus</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label mb-4">Enter Title</label>
                        <input type="text" name="title" placeholder="Enter Title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="file" class="form-label mt-4">Select File</label>
                        <input type="file" id="file" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-7 mt-4">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Syllabus</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="list-syllabus-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5 mt-4">
        <?= $this->ki_theme->extra_setting_title_form('Our Syllabus', 'syllabus_page_title', 'Our Popular Courses') ?>

    </div>
</div>