<div class="row p-0 m-0">
    <div class="col-md-4">
        <div class="card border-dark">
            <div class="card-header">
                <h3 class="card-title">List All Courses</h3>
            </div>
            <div class="card-body p-3 scroll h-400px px-5">
                <?php
                if (sizeof($all_courses)) {
                    foreach ($all_courses as $row) {
                        ?>
                        <label class="d-flex flex-stack cursor-pointer mb-5">
                            <!--begin:Label-->
                            <span class="d-flex align-items-center me-2">
                                <!--begin:Icon-->
                                <span class="symbol symbol-50px me-6">
                                    <span class="symbol-label bg-light-warning">
                                        <span class="fs-2x text-warning">
                                            <?= get_first_latter($row['course_name']) ?>
                                        </span>
                                    </span>
                                </span>
                                <!--end:Icon-->

                                <!--begin:Info-->
                                <span class="d-flex flex-column">
                                    <span class="fw-bold fs-6 text-capitalize course-name">
                                        <?= $row['course_name'] ?>
                                    </span>

                                    <span class="fs-7 text-muted text-capitalize course-duration">
                                        <?= humnize_duration($row['duration'], $row['duration_type'], false) ?>
                                    </span>
                                </span>
                                <!--end:Info-->
                            </span>
                            <!--end:Label-->

                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <?php
                                $chk = $this->db->where([
                                    'center_id' => $id,
                                    'course_id' => $row['id']
                                ])->get('center_courses');
                                $amount = $chk->num_rows() ? $chk->row("course_fee") : $row['fees'];
                                $checked = $chk->num_rows() ? ($chk->row('isDeleted') == '0' ? 'checked' : '') : '';
                                ?>
                                <input <?= $checked ?> data-amount="<?= $amount ?>" class="form-check-input assign-to-center"
                                    type="checkbox" value="<?= $row['id'] ?>" id="flexSwitchDefault" />
                            </div>
                        </label>
                        <?php
                    }
                } else
                    echo alert('Course not Found', 'danger');
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow border-dark">
            <div class="card-header">
                <h3 class="card-title">List Center Courses</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped pb-3" id="list-center-courses">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course Name</th>
                                <th>Course Fee</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1;
                            foreach ($assignedCourses as $row) {
                                echo "<tr>
                                        <td>{$index}</td>
                                        <td>{$row['course_name']}
                                            <label class='badge badge-primary' style='float:right'>
                                            {$row['duration']} {$row['duration_type']}
                                            </label>
                                        </td>
                                        <td>{$row['course_fee']} {inr}</td>
                                        <td>" . get_status($row['status']) . "</td>
                                     </tr>";
                                $index++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>