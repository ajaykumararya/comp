<div class="row">
    <div class="col-md-4">
        <form action="" class="fetch-stduent-via-roll_no" id="search_by_roll_no">
            <div class="{card_class}">
                <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible">
                    <h3 class="card-title">Search Student</h3>
                    <div class="card-toolbar rotate-180">
                        <i class="ki-duotone ki-down fs-1"></i>
                    </div>
                </div>
                <div id="kt_docs_card_collapsible" class="collapse show">
                    <div class="card-body">
                        <!-- <div class="form-group">
                            <label for="roll_no" class="form-label required">Enter Roll No.</label>
                            <input type="text" autofocus class="form-control" id="roll_no" placeholder="Enter Roll No."
                                name="roll_no">
                        </div> -->
                        <div class="form-group">
                            <label for="liststudent" class="form-label required">Search
                                Student</label>
                            <select name="student_id" data-control="select2" data-placeholder="Select Student"
                                class="form-select first m-h-100px" data-allow-clear="true">
                                <option></option>

                            </select>
                            <ol class="mt-3" type="l">
                                <li>Roll No</li>
                                <li>Name</li>
                                <li>Mobile</li>
                            </ol>

                        </div>
                    </div>
                    <div class="card-footer">
                        {search_button}                        
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <div class="card card-image card-body record-show fade  border-info border shadow">


        </div>
    </div>
</div>