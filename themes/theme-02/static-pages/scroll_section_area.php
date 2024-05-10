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

                    <div class="form-group mt-3">
                        <label for="" class="form-label">Show Passout Student(s)</label>
                        <input type="number" value="<?= ES('scroll_passout_student_number', 10) ?>" name="scroll_student_number"
                            class="form-control">
                    </div>


                    <div class="form-group mt-3">
                        <label for="" class="form-label">in Right Box</label>
                        <select name="scroll_right_box" id="" class="form-control" data-control="select2">
                            <option value="passout_students" <?=ES('scroll_right_box') == 'passout_students' ? 'selected' : ''?>>Passout Student(S)</option>
                            <option value="franchise" <?=ES('scroll_right_box') == 'franchise' ? 'selected' : ''?>>Franchise(S)</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>