<div class="row">
    <div class="col-md-12 mb-2">
        <form action="" id="form">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add Provisional Certificate</h3>
                </div>
                <div class="card-body row">
                    <div class="col-md-6 form-group mb-3">
                        <label for="" class="form-label required">Student</label>
                        <select data-allow-clear="true" name="student_id" id="" class="form-control" data-control="select2" data-placeholder="Select Student">
                            
                        </select>
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <label for="" class="form-label required">Disposal No.</label>
                        <input type="text" class="form-control" placeholder="Enter Disposal No" name="sr_no">
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <label for="" class="form-label required">Examination Held in</label>
                        <input type="text" name="examination_held" class="form-control select-date-full-month-year" value="<?=date('F-Y')?>">
                    </div>
                    
                    <div class="col-md-6 form-group mb-3">
                        <label for="" class="form-label required">Internship in</label>
                        <input type="text" name="internship" class="form-control select-date-full-month-year" value="<?=date('F-Y')?>">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Certificate</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Disposal No</th>
                            <th>Examination Held</th>
                            <th>Internship </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>