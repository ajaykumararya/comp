<div class="row mb-3">
    <div class="col-md-8"></div>
    <div class="col-md-4">
        <button class="btn btn-primary print-btn"><i class="fa fa-print"></i> Print</button>
    </div>
</div>
<div id="printableContent">
    <div class="col-md-12 p-0 row">
        <table class="table table-bordered table-striped">
            <tr>
                <th colspan="2">Marksheet Duration</th>
                <td><?= humnize_duration_with_ordinal($marksheet_duration, $duration_type) ?></td>
                <th>Course</th>
                <td colspan="4">{course_name} ({duration} {duration_type})</td>
            </tr>
            <tr>
                <th>Roll No.</th>
                <td>{roll_no}</td>
                <th>Enrollment No.</th>
                <td>{enrollment_no}</td>
                <th>Student Name</th>
                <td>{student_name}</td>
                <th>D.O.B</th>
                <td>{dob}</td>
            </tr>
        </table>
        <?php
        $this->load->module('document');
        $result = $this->document->id($marksheet_id)->marksheet();
        // pre($result);
        
        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th rowspan="2" style="vertical-align:middle;width:40%">SUBJECTS</th>
                    <th colspan="2">MAXIMUM MARKS</th>
                    <th colspan="2">MINIMUM MARKS</th>
                    <th colspan="3">OBTAINED MARKS</th>
                </tr>
                <tr>
                    <th style="font-size:10px">THEORY</th>
                    <th style="font-size:10px">PRACTICAL</th>
                    <th style="font-size:10px">THEORY</th>
                    <th style="font-size:10px">PRACTICAL</th>
                    <th style="font-size:10px">TH.</th>
                    <th style="font-size:10px">PR.</th>
                    <th style="font-size:10px">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result['marks'] as $mark) {
                    ?>
                    <tr>
                        <td style="text-align:left;padding-left:5px"><?= $mark['subject_name'] ?></td>
                        <td><?= $mark['theory_max_marks'] ?></td>
                        <td><?= $mark['practical_max_marks'] ?></td>
                        <td><?= $mark['theory_min_marks'] ?></td>
                        <td><?= $mark['practical_min_marks'] ?></td>
                        <td><?= $mark['theory_total'] ?></td>
                        <td><?= $mark['practical_total'] ?></td>
                        <td><?= $mark['total'] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td>TOTAL</td>
                    <td><?= $result['total_max_theory'] ?></td>
                    <td><?= $result['total_max_practical'] ?></td>
                    <td><?= $result['total_min_theory'] ?></td>
                    <td><?= $result['total_min_practical'] ?></td>
                    <td></td>
                    <td></td>
                    <td><?= $result['obtain_total'] ?></td>
                </tr>
            </tfoot>

        </table>
        <table class="table table-bordered">
            <tr>
                <th>Grade</th>
                <td><?= $result['grade'] ?></td>
                <th>Percentage</th>
                <td><?= $result['percentage'] ?> %</td>
                <th>Total</th>
                <td><?= $result['max_total'] ?> / <?= $result['obtain_total'] ?></td>
            </tr>
        </table>
    </div>
</div>