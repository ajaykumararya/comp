<div class="row">
    <div class="col-md-8">
        <form action="" class="extra-setting">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Setting</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="form-label">Middle Content</label>
                        <textarea name="scroll_middle_content" class="aryaeditor" id=""><?=ES('scroll_middle_content')?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <form action="" class="extra-setting">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Setting</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="form-label">Show Student(s)</label>
                        <input type="number" value="<?= ES('scroll_student_number', 10) ?>" name="scroll_student_number"
                            class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label">Show Franchise(s)</label>
                        <input type="number" value="<?= ES('scroll_franshise_number', 10) ?>" name="scroll_student_number"
                            class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>