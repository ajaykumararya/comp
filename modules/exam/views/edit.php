<div class="row">
    <h1 class="text-success fw-bold fs-1">{course_name}</h1>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="" class="form-label">Exam Schedule</label>
            <div class="input-group mb-5">
                <span class="input-group-text" id="basic-addon1">
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="" id="flexSwitchDefault"
                            name="schedule_status" <?=$schedule_status ? 'checked' : ''?> />

                    </div>
                </span>
                <input type="text" class="form-control selectRange-with-time" name="schedule" <?=$schedule_status ? '' : 'disabled'?>
                    placeholder="Select Schedule" autocomplete="off" value="{schedule}">
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="" class="form-label">Exam Timer</label>
            <div class="input-group mb-5">
                <span class="input-group-text" id="basic-addon1">
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox"  id="flexSwitchDefault"
                            name="timer_status" <?=$timer_status ? 'checked' : ''?> />

                    </div>
                </span>
                <input type="text" class="form-control timer" name="timer" value="{timer}" <?=$timer_status ? '' : 'disabled'?> placeholder="Select Timer"
                    autocomplete="off">
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <div class="form-group">
            <label for="" class="form-label required">Exam Title</label>
            <textarea name="exam_title" id="exam-editor" rows="2" placeholder="Enter Title"
                class=" exam-editor form-control">{exam_title}</textarea>
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <div class="form-group">
            <label for="" class="form-label">Description</label>
            <textarea name="description" id="" rows="2" placeholder="Enter Description"
                class="form-control exam-editor ">{description}</textarea>
        </div>
    </div>

    <div class="col-md-12 mb-4">
        <div class="form-group">
            <label for="" class="form-label">Max Questions</label>
            <input type="" class="form-control" name="max_questions" value="{max_questions}">
        </div>
    </div>


</div>