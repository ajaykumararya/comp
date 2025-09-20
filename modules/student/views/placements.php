<div class="row">
    <div class="col-md-6">
        <form action="" id="add-placement">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Placement Students</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="liststudent" class="form-label required">Select
                            Student</label>
                        <select name="student_id" data-control="select2" data-placeholder="Select Student"
                            class="form-select first m-h-100px" data-allow-clear="true">
                            <option></option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label required">Designation</label>
                        <input type="text" placeholder="Enter Designation" name="designation" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label required">Company Name</label>
                        <input type="text" placeholder="Enter Company Name" name="company_name" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12 mt-2">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Placement Student(s)</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="listplacements">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Designation</th>
                            <th>Company</th>
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