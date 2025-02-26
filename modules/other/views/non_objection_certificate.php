<div class="row">
    <div class="col-md-12 mb-2">
        <form action="" id="form">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add NOC</h3>
                </div>
                <div class="card-body row">
                    <div class="col-md-4 form-group mb-3">
                        <label for="" class="form-label required">Student</label>
                        <select data-allow-clear="true" name="student_id" id="" class="form-control" data-control="select2" data-placeholder="Select Student">
                            
                        </select>
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="" class="form-label required">Sr No.</label>
                        <input type="text" class="form-control" placeholder="Enter Sr. No" name="sr_no">
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="" class="form-label required">Date</label>
                        <input type="text" name="date" class="form-control current-date" value="<?=date('d-m-Y')?>">
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="" class="form-label required">Attained To</label>
                        <input type="text" name="attained_to" class="form-control" placeholder="Ex:- 2020 (TWO THOUSEND TWENTY)">
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="" class="form-label required">Attained From</label>
                        <input type="text" name="attained_from"  class="form-control" placeholder="Ex:- 2020 (TWO THOUSEND TWENTY)">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="" class="form-label required">Passing Year</label>
                        <input type="text" name="passing_year" class="form-control" placeholder="Ex:- 2020 (TWO THOUSEND TWENTY)">
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
                            <th>Sr.NO</th>
                            <th>Date</th>
                            <th>Attained To</th>
                            <th>Attained From</th>
                            <th>Passing Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>