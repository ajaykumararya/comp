<div class="row">
    <div class="col-md-12">
        <form action="" class="extra-setting" data-page_reload="true">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">?Institute Course Page Title</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Enter Title</label>
                        <input name="institute_course_list_title"
                            value="<?= $this->SiteModel->get_setting('institute_course_list_title', 'Institute Courses') ?>"
                            class="form-control" placeholder="Enter Title">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>