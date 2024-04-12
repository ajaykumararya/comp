<div class="row">
    <div class="col-md-12">
        <form action="" id="add_form">
            <div class="{card_class}">
                <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible">
                    <h3 class="card-title">Select Criteria</h3>
                    <div class="card-toolbar rotate-180">
                        <i class="ki-duotone ki-down fs-1"></i>
                    </div>
                </div>
                <div id="kt_docs_card_collapsible" class="collapse show">
                    <div class="card-body">
                        <div class="row">
                            <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
                                <li class="nav-item">
                                    <a class="active  fs-3 nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0"
                                        data-bs-toggle="tab" href="#kt_tab_pane_4">Filter Student</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-3  btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0"
                                        data-bs-toggle="tab" href="#kt_tab_pane_5">Filter Via
                                        Time Table
                                        Details</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="kt_tab_pane_4" role="tabpanel">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="liststudent" class="form-label required">Select
                                                Student</label>
                                            <select name="student_id" data-control="select2"
                                                data-placeholder="Select Student" class="form-select first"
                                                data-allow-clear="true">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="batch_id" class="form-label required">Select
                                                    Timetable</label>
                                                <select name="batch_id" data-control="select2"
                                                    data-placeholder="Select Time Table" id="batch_id"
                                                    class="form-select" data-allow-clear="true">
                                                    <option></option>
                                                    <?php
                                                    $list = $this->db->get('batch');
                                                    foreach ($list->result() as $c)
                                                        echo "<option value='$c->id'>$c->batch_name</option>";
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="liststudent" class="form-label required">Select
                                                    Student</label>
                                                <select name="student_id" data-control="select2"
                                                    data-placeholder="Select Student" id="liststudent"
                                                    class="form-select" data-allow-clear="true">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-10 view-structure">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
