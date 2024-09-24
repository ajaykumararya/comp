
<div class="row p-0 m-0">
    <div class="col-md-4">
        <div class="card border-dark">
            <div class="card-header">
                <h3 class="card-title">List All Courses Categories</h3>
            </div>
            <div class="card-body p-3 scroll h-400px px-5">
                <?php
                if (sizeof($all_category)) {
                    foreach ($all_category as $row) {
                        ?>
                        <label class="d-flex flex-stack cursor-pointer mb-5">
                            <!--begin:Label-->
                            <span class="d-flex align-items-center me-2">
                                <!--begin:Icon-->
                                <span class="symbol symbol-50px me-6">
                                    <span class="symbol-label bg-light-warning">
                                        <span class="fs-2x text-warning">
                                            <?= get_first_latter($row['title']) ?>
                                        </span>
                                    </span>
                                </span>
                                <!--end:Icon-->

                                <!--begin:Info-->
                                <span class="d-flex flex-column">
                                    <span class="fw-bold fs-6 text-capitalize course-name">
                                        <?= $row['title'] ?>
                                    </span>

                                </span>
                                <!--end:Info-->
                            </span>
                            <!--end:Label-->

                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <?php
                                $chk = $this->db->where([
                                    'user_id' => $id,
                                    'category_id' => $row['id'],
                                    'user_type' => $type
                                ])->get('center_course_category');
                                $checked = $chk->num_rows() ? 'checked' : '';
                                ?>
                                <input <?= $checked ?> class="form-check-input assign-to-center"
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
                <h3 class="card-title">List User Categories</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped pb-3" id="list-center-courses">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course Category</th>
                                <th>Percentage</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1;
                            foreach ($assignedCategory as $row) {
                                echo "<tr>
                                        <td>{$index}</td>
                                        <td>{$row['title']}
                                        </td>
                                        <td>{$row['percentage']}%</td>
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