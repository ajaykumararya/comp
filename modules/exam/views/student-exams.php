<div class="row">
    <div class="col-md-12">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Student Exam(s)</h3>
            </div>
            <div class="div card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="list-student-exams">
                        <thead>
                            <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                <th>#</th>
                                <th>Student</th>
                                <th>Exam</th>
                                <th>Attempt Time</th>
                                <th>Result</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script id="formTemplate" type="text/x-handlebars-template">
    <input type="hidden" name="id" value="{{assign_exam_id}}">
     <div class="input-group mb-5">
        <label for="d" class="input-group-text">Attemped Time</label>        
        <input type="text" id="d" name="attempt_time" class="form-control date-with-time" placeholder="Select Date & Time" value="{{timeStringToTime attempt_time}}">

    </div>

     <div class="input-group mb-5">
        <label class="input-group-text">Percentage</label>
        <input type="number" name="percentage" placeholder="Enter Percentage" min="0" max="100" step="0.01" value="{{percentage}}" class="form-control percenatge-input">
        <span class="input-group-text">%</span>
    </div>
</script>