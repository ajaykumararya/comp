<div class="row">
    <div class="col-md-12 mb-4">
        <form action="" class="add-iso">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add ISO</h3>
                </div>
                <div class="card-body row">
                    <div class="col-md-6 form-group mb-4">
                        <label for="" class="form-label required">Company Name</label>
                        <textarea class="form-control" name="company_name" placeholder="Enter Comapny Name"
                            id=""></textarea>
                    </div>
                    <div class="col-md-6 form-group mb-4">
                        <label for="" class="form-label required">Company Address</label>
                        <textarea class="form-control" name="company_address" placeholder="Enter Comapny Address"
                            id=""></textarea>
                    </div>
                    <div class="col-md-12 form-group mb-4">
                        <label for="" class="form-label required">Service</label>
                        <textarea class="form-control" name="service" class="form-contorl" placeholder="Enter Service"
                            id=""></textarea>
                    </div>
                    <div class="col-md-3 form-group mb-4">
                        <label for="" class="form-label required">Certificate No.</label>
                        <input type="text" name="certificate_no" placeholder="Enter Certificate No."
                            class="form-control">
                    </div>
                    <div class="col-md-3 form-group mb-4">
                        <label for="" class="form-label required">Certificate Date</label>
                        <input placeholder="Original Certificate Date" type="text" name="org_certificate_date"
                            class="form-control selectdate">
                    </div>
                    <div class="col-md-3 form-group mb-4">
                        <label for="" class="form-label required">Issue Date</label>
                        <input placeholder="Issue Date" type="text" name="issue_date" required
                            class="form-control selectdate">
                    </div>
                    <div class="col-md-3 form-group mb-4">
                        <label for="" class="form-label required">Expiry Date</label>
                        <input placeholder="Expiry Date" type="text" name="expiry_date" required
                            class="form-control selectdate">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List ISO</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped list">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cert. No</th>
                                <th>Company Name</th>
                                <th>Service</th>
                                <th>Issue Date</th>
                                <th>Expiry Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $get = $this->db->order_by('create_at', 'DESC')->get('iso_certificate');
                            if ($get->num_rows()) {
                                $i = 1;
                                foreach ($get->result() as $row) {
                                    echo '<tr>                                    
                                            <td>' . $i++ . '.</td>
                                            <td>' . $row->certificate_no . '</td>
                                            <td>' . $row->company_name . '</td>
                                            <td>' . $row->service . '</td>
                                            <td>' . $row->issue_date . '</td>
                                            <td>' . $row->expiry_date . '</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a target="_blank" href="' . base_url('iso/' . base64_encode(base64_encode($row->id))) . '" class="btn btn-xs btn-sm btn-info">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <button class="btn btn-xs btn-sm btn-danger delete" data-id="' . $row->id . '">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>                                            
                                            </td>                                    
                                        </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('.add-iso').on('submit', function (e) {
            e.preventDefault();
            $.AryaAjax({
                url: 'website/add-iso',
                data: new FormData(this)
            }).then((res) => {
                console.log(res)
                if (res.status) {
                    SwalSuccess('Success', 'ISO Certificate Added Successfully..');
                    location.reload();
                }
                showResponseError(res)
            });
        })
        $('.list').DataTable();
        $('.delete').on('click', function () {
            var id = $(this).data('id');
            SwalWarning('Confirmation!', 'Are you sure for delete it.', true, 'Yes, Delete It').then((res) => {
                if (res.isConfirmed) {
                    alert(id)
                }
            });
        })
    })
</script>