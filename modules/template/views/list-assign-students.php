<table class="table table-bordered">
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($students as $student) {
            $this->ki_theme->set_attribute('data-center_id', $student['institute_id']);
            $check = $this->exam_model->get_student_exam([
                'student_id' => $student['student_id'],
                'exam_id' => $exam_id
            ]);
            if ($check->num_rows()) {
                $this->ki_theme->checked(true);
                if ($check->row('percentage') != null)
                    $this->ki_theme->disabled(true);
            }
            echo '<tr>
            <td>
                <div class="d-flex flex-wrap flex-sm-nowrap">
                <div class="me-7 mb-4">
                    <a href="' . base_url('student/profile/' . $student['student_id']) . '" target="_blank">
                        <div class="symbol symbol-70px">
                            <img src="' . base_url('upload/' . $student['image']) . '" onerror="this.src=`' . base_url() . 'assets/media/student.png`" alt=""/>
                        </div>
                    </a>
                </div>
                <div class="flex-grow-1">
                    ' . $student['student_name'] . '<br>
                    <span class="text-danger">' . $student['roll_no'] . '</span><br>
                    ' . $student['center_name'] . '
                </div>
                
                </div>
                
                </td>
            <td>
                ' . $this->ki_theme->switch('', $student['student_id']) . '
            </td>
      </tr>';
        }
        ?>
    </tbody>
</table>