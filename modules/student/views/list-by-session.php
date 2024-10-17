<div class="form-group mb-4 col-md-4">
    <label class="form-label required">Session</label>

    <select class="form-select" name="session" data-control="select2" data-placeholder="Select a Session"
        data-allow-clear="<?= $this->center_model->isAdmin() ?>">
        <option></option>
        <?php
        // $list = $this->db->where('type', 'center')->get('centers')->result();
        $list = $this->db->where('status', 1)->get('session')->result();

        foreach ($list as $row) {
            echo '<option value="' . $row->id . '" >' . $row->title . '</option>';
        }
        ?>
    </select>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card list-students">
            <div class="card-header">
                <h3 class="card-title">List Students</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <!--begin::Datatable-->
                    <table id="list-students" class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">

                                <th>Roll No</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th>Admission Type</th>
                                <th class="text-end min-w-150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        </tbody>
                    </table>
                    <!--end::Datatable-->
                </div>
            </div>
        </div>
    </div>
</div>