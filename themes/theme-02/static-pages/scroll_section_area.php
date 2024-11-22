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
                        <textarea name="scroll_middle_content" class="aryaeditor"
                            id=""><?= ES('scroll_middle_content') ?></textarea>
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
                <?php
                $scroll_right_box = ES('scroll_right_box');
                ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="form-label">Show Student(s)</label>
                        <input type="number" value="<?= ES('scroll_student_number', 10) ?>" name="scroll_student_number"
                            class="form-control">
                    </div>
                    <?php
                    if ($scroll_right_box == 'franchise') {
                        ?>
                        <div class="form-group mt-3">
                            <label for="" class="form-label">Show Franchise(s)</label>
                            <input type="number" value="<?= ES('scroll_franshise_number', 10) ?>"
                                name="scroll_student_number" class="form-control">
                        </div>
                        <?php
                    }
                    if ($scroll_right_box == 'passout_students') {
                        ?>
                        <div class="form-group mt-3">
                            <label for="" class="form-label">Show Passout Student(s)</label>
                            <input type="number" value="<?= ES('scroll_passout_student_number', 10) ?>"
                                name="scroll_student_number" class="form-control">
                        </div>
                        <?php
                    }
                    if ($scroll_right_box == 'placement_students') {
                        ?>
                        <div class="form-group mt-3">
                            <label for="" class="form-label">Show Placement Student(s)</label>
                            <input type="number" value="<?= ES('scroll_placement_student_number', 10) ?>"
                                name="scroll_placement_student_number" class="form-control">
                        </div>
                        <center>
                            <a href="{base_url}student/placements"
                                class=" mt-2 text-danger fs-4 animation animation-blink"><i
                                    class="fa fa-link fs-4 text-danger"></i>
                                Manage Placement Students</a>
                        </center>
                        <?php
                    }
                    ?>
                    <div class="form-group mt-3">
                        <label for="" class="form-label">in Right Box</label>
                        <select name="scroll_right_box" id="" class="form-control" data-control="select2">
                            <option value="passout_students" <?= $scroll_right_box == 'passout_students' ? 'selected' : '' ?>>Passout Student(S)</option>
                            <option value="franchise" <?= $scroll_right_box == 'franchise' ? 'selected' : '' ?>>
                                Franchise(S)
                            </option>
                            <?php
                            if (table_exists('placement_students')) {
                                echo '<option value="placement_students" ' . ($scroll_right_box == 'placement_students' ? 'selected' : '') . '>Placement Student(S)</option>';
                            }
                            ?>
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