<div class="row">
    <div class="col-md-6">
        <form action="" class="assign-course-to-center">
            <div class="{card_class}">
                <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible">
                    <h3 class="card-title">Select Center</h3>
                    <div class="card-toolbar rotate-180">
                        <i class="ki-duotone ki-down fs-1"></i>
                    </div>
                </div>
                <div id="kt_docs_card_collapsible" class="collapse show">
                    <div class="card-body">
                        <div class="border rounded">
                            <select id="select-center" class="form-select form-select-transparent" name="..."
                                data-placeholder="Select A Center" data-allow-clear="true">
                                <option></option>
                                <?php
                                $list = $this->db->where('type', 'center')->get('centers')->result();
                                foreach ($list as $row) {
                                    echo '<option value="' . $row->id . '" data-kt-rich-content-subcontent="' . $row->institute_name . '"
                                    data-kt-rich-content-icon="' . $row->image . '">' . $row->name . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4" id="profile-box">
    </div>
    <!-- <div class="col-md-4" id="genral-routes-details">
    </div> -->
    <div class="col-md-12" id="assign_form_and_display_box">
    </div>
</div>
