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
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="course" class="form-label required">Select Timetable</label>
                                    <select name="batch_id" data-control="select2" data-placeholder="Select Time Table"
                                        id="course" class="form-select">
                                        <option></option>
                                        <?php
                                        $list = $this->db->get('batch');
                                        foreach ($list->result() as $c)
                                            echo "<option value='$c->id'>$c->batch_name</option>";
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="attendance_date" class="form-label required">Attendance Date</label>
                                    <input type="text" class="form-control attendance-date" value="<?=$this->ki_theme->date() ?>"
                                        id="attendance_date" name="attendance_date"
                                        placeholder="Select Attendance Date">
                                </div>
                            </div>
                            <div class="col-md-2 text-end">
                                <div class="form-group pt-8">
                                    {search_button}
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12 mt-10 view-list">
        
    </div>
</div>
