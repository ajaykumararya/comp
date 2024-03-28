<div class="row">
    <div class="col-md-4">
        <form id="add_course">
            <div class="{card_class}">
                <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible">
                    <h3 class="card-title">Add Course</h3>
                    <div class="card-toolbar rotate-180">
                        <i class="ki-duotone ki-down fs-1"></i>
                    </div>
                </div>
                <div id="kt_docs_card_collapsible" class="collapse show">
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label class="form-label required">Select Category</label>
                            <select name="category_id" data-control="select2" data-placeholder="Select Course Category"
                                class="form-control">
                                <option value="">Select Course Category</option>
                                <?php
                                $list = $this->db->order_by('title', 'ASC')->get('course_category');
                                foreach ($list->result() as $row) {
                                    echo "<option value='{$row->id}'>{$row->title}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label required">Enter Course Name</label>
                            <input type="text" name="course_name" class="form-control" placeholder="Enter Course name">
                        </div>
                        <div class="form-group">
                            <label class="form-label required">Course duration</label>
                            <div class="input-group">
                                <input type="text" name="duration" class="form-control" placeholder="Duration"
                                    autocomplete="off">
                                <span class="input-group-text" id="basic-addon2"
                                    style="width:140px;padding:5px!important">
                                    <select name="duration_type" data-control="select2" data-placeholder="Duration Type"
                                        class="form-control">
                                        <?php
                                        foreach ($this->ki_theme->course_duration() as $key => $value)
                                            echo "<option value='{$key}'>{$value}</option>";
                                        ?>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label">Enter Course Fee</label>
                            <input type="number" name="fees" class="form-control" placeholder="Enter Course Fee">
                        </div>
                    </div>
                    <div class="card-footer">
                        {publish_button}
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <div class="{card_class}">
            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#list">
                <h3 class="card-title">List Course(s)</h3>
                <div class="card-toolbar rotate-180">
                    <i class="ki-duotone ki-down fs-1"></i>
                </div>
            </div>
            <div id="list" class="collapse show">
                <div class="card-body">

                    <div class="table-responsive">
                        <!--begin::Datatable-->
                        <table id="course_list" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">

                                    <th>Course Name</th>
                                    <th>Course Category</th>
                                    <th>Duration</th>
                                    <th width=12%>Fee</th>
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
</div>

<script id="formTemplate" type="text/x-handlebars-template">
    <input type="hidden" name="id" value="{{course_id}}">
    <div class="form-group mb-4">
        <label class="form-label required">Enter Course Name</label>
        <input type="text" name="course_name" class="form-control" placeholder="Enter Course name" value="{{course_name}}">
    </div>
    <div class="form-group mb-4">
        <label class="form-label">Enter Course Fee</label>
        <input type="number" name="fees" class="form-control" placeholder="Enter Course Fee" value="{{fees}}">
    </div>
</script>