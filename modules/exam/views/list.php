<div class="row">
    <div class="col-md-12">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Exam(s)</h3>
            </div>
            <div class="div card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="list-exams">
                        <thead>
                            <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                <th>#</th>
                                <th>Title</th>
                                <th>Course</th>
                                <th>Schedule</th>
                                <th>Timer</th>
                                <th>Status</th>
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
<script id="template" type="text/x-handlebars-template">
    <label class="parent-ans btn btn-outline btn-outline-dashed btn-active-light-primary d-flex flex-stack text-start p-2 mb-5 {{parent_class}}">
        <div class="d-flex align-items-center me-2">
            <div class="form-check form-check-custom form-check-solid form-check-primary me-6">
                <input class="form-check-input is-right" type="radio" name="is_right[]" {{is_chcked}}/>
                <input type="hidden" name="ans[]" class="ans" value="{{answer}}">
            </div>
            <div class="flex-grow-1">
                <h2 class="d-flex align-items-center fs-3 fw-bold flex-wrap ans-title">
                    {{answer}}
                </h2>
            </div>
        </div>
        <div class="ms-5">
            <button class="btn btn-primary edit-ans btn-sm" type="button"><span class="fa fa-edit"></span></button>
            <button class="btn btn-danger delete-ans btn-sm" type="button"><span class="fa fa-trash"></span></button>
            <input type="hidden" name="ans_id[]" class="ans_id" value="{{answer_id}}">
        </div>
    </label>
</script>
