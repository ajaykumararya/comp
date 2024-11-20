<div class="row">
    <div class="col-md-12">
        <form action="" class="add-role-user">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-user-plus fs-2 text-dark me-2"></i> Add User</h3>
                </div>
                <div class="card-body row p-3">
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="" class="form-label required">Role Category</label>
                            <select data-allow-clear="true" class="form-select" data-placeholder="Select Role Category"
                                id="role_category" name="role_id" data-control="select2">
                                <option></option>
                                <?php
                                $get = $this->db->get('role_categories');
                                foreach ($get->result() as $row) {
                                    echo '<option value="' . $row->id . '">' . $row->role_category_title . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="" class="form-label required">Name</label>
                            <input type="text" placeholder="Enter Name" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="" class="form-label required">Mobile</label>
                            <input type="text" class="form-control" placeholder="Enter Mobile" name="mobile">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="" class="form-label required">Email</label>
                            <input type="email" name="email" placeholder="Enter Email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="" class="form-label required">Password</label>
                            <input type="text" name="password" placeholder="Enter Password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12">
          <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Role User(s)</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="role_users_table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>    
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
          </div>          
    </div>
</div>