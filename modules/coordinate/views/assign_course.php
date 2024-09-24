<?php
$where = [];
if($this->center_model->isAdmin())
$view = 'Co-Ordniate User';
$where = ['type' => 'co_ordinator'];
if ($isCo = $this->center_model->isCoordinator()) {
    $where = ['added_by' => 'co_ordinator','added_by_id' => $owner_id];
$view = 'Centre';

}
?>
<div class="row">
    <div class="col-md-6">
        <form action="" class="assign-course-to-center">
            <div class="{card_class}">
                <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible">
                    <h3 class="card-title">Selec <?=$view?></h3>
                    <div class="card-toolbar rotate-180">
                        <i class="ki-duotone ki-down fs-1"></i>
                    </div>
                </div>
                <div id="kt_docs_card_collapsible" class="collapse show">
                    <div class="card-body">
                        <div class="border rounded">
                            <select id="select-center" class="form-select form-select-transparent" name="..."
                                data-placeholder="Select  <?=$view?>" data-allow-clear="true"
                                data-control="select2">
                                <option></option>
                                <?php
                                $list = $this->db->where($where)->get('centers')->result();
                                // echo $this->db->last_query();
                                foreach ($list as $row) {
                                    $max = 100;
                                    if($isCo){
                                        $max = $this->db->where(['user_id' => $owner_id,'user_type' => 'co_ordinator'])->get('center_course_category')->row('percentage') ?? 100;
                                    }
                                    echo '<option value="' . $row->id . '" data-kt-rich-content-subcontent="' . $row->institute_name . '"
                                    data-kt-rich-content-icon="' . $row->image . '" data-type="'.$row->type.'" data-max="'.$max.'">' . $row->name . '</option>';
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