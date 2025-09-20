<div class="container ">

    <div class="row g-4 d-flex">
        <div class="col-md-8">
            <h4 class="nceb-heading-primary">{institute_course_list_title}</h4>
            <hr class="w-25" style="height:10px;">
        </div>
        <div class="col-md-4">
            <?php
            $cats = $this->db->get('course_category');
            if ($cats->num_rows()) {
                ?>
            

                    <div class="form-group mb-3">
                        <label for="" class="form-label">Filter With Category</label>
                        <select data-control="select2" id="filter-with-cats" class="form-control">
                            <option value="0">All</option>
                            <?php
                            foreach ($cats->result() as $cat):
                                echo '<option value="' . $cat->id . '">' . $cat->title . '</option>';
                            endforeach;

                            ?>
                            <!-- <option value="22">DEmo</option> -->
                        </select>
                    </div>
                
                <?php
            }
            ?>
        </div>

        <?php
        $courses = $this->db->get_where('course');
        if ($courses->num_rows()) {
            $i = 1;
            foreach ($courses->result() as $course):
                if ($i == 13)
                    $i = 1;
                $subjectsArray = [];
                $subjects = $this->db->order_by('duration', 'ASC')->get_where('subjects', ['course_id' => $course->id]);
                if ($subjects->num_rows()) {
                    foreach ($subjects->result() as $row)
                        $subjectsArray[] = $row->subject_name . '&nbsp;(' . $row->duration . ' ' . ucfirst($row->duration_type) . ')';
                }
                ?>
                <div class="col-md-4 align-self-center" data-category_id="<?=$course->category_id?>">
                    <div class="card course_card">
                        <div class="card-body sp_g<?= $i++ ?> text-white">
                            <div class="row d-flex">
                                <div class="col-3 align-self-center">
                                    <i class="display-3 nxr-course_icon"></i>
                                </div>

                                <div class="col-9 align-self-center">
                                    <h4>
                                        <?= $course->course_name ?>
                                    </h4>
                                    <p><?= humnize_duration($course->duration, $course->duration_type) ?> </p>
                                    <button class="btn btn-light btn-sm fw-bold"
                                        data-course_subjects="<?= implode('?', $subjectsArray) ?>"
                                        data-course_name="<?= $course->course_name ?>" onclick="subModal(this)">View
                                        Subjects</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php
            endforeach;
        }
        ?>





    </div>
</div>
<br><script>
    $('#filter-with-cats').on('change', function () {
        var id = $(this).val();

        $('[data-category_id]').show();
        if (id != '0') {
            $('[data-category_id]').hide();
            $('[data-category_id="' + id + '"]').show(500);
        }
    })
</script>