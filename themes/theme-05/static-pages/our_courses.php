<div class="row">
    <div class="col-md-8">
        <form action="" id="add-course-content">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add Course</h3>
                </div>
                <div class="card-body p-3 row">
                    <div class="form-group mb-4 col-md-6">
                        <label for="title" class="form-label mb-1 required">Course name</label>
                        <input type="text" class="form-control" name="title" placeholder="Course name">
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="image" class="form-label mb-1 required">Course image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="e" class="form-label mb-1 required">Course Eligibility</label>
                        <input type="text" class="form-control" required name="description" placeholder="Enter Eligibility">
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="d" class="form-label mb-1 required">Course Duration</label>
                        <input type="text" class="form-control" required name="duration" placeholder="Enter Duration">
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="button_title" class="form-label mb-1">Button Title</label>
                        <input type="text" class="form-control" name="button_text" placeholder="Button Title">
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="button_link" class="form-label mb-1">Button Link</label>
                        <input type="text" class="form-control" name="button_link" placeholder="Button Link">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <?= $this->ki_theme->extra_setting_title_form('Update Course Title', 'course_page_title', 'Our Popular Courses') ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Content Courses</h3>
            </div>
            <div class="card-body p-2">
                <table class="table table-responsive table-bordered" id="list-content-courses">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>image</th>
                            <th>Title</th>
                            <th>Button</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>