<div class="row">
    <div class="col-md-12">
        <form id="set-fees" action="" method="POST">
            <input type="hidden" name="center_id" value="{id}">
            <div class="{card_class}">
                <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible">
                    <h3 class="card-title">Fees Setting</h3>
                    <div class="card-toolbar rotate-180">
                        <i class="ki-duotone ki-down fs-1"></i>
                    </div>
                </div>
                <div id="kt_docs_card_collapsible" class="collapse show">
                    <div class="card-body">
                        <?php
                        $list = $this->db->get('student_fix_payment');
                        $listing = [];
                        if ($list->num_rows()) {
                            foreach ($list->result() as $row) {
                                $listing[$row->key] = $row;
                            }
                        }
                        $columns = $this->db->list_fields('center_fees');
                        $i = 1;
                        $fees = $this->center_model->center_fees($id, $columns);
                        $centerFees = ($fees->num_rows()) ? $fees->row_array() : [];
                        foreach ($columns as $column) {
                            if (isset($listing[$column])) {
                                $row = $listing[$column];
                                $amount = null;
                                if (isset($centerFees[$column])) {
                                    $amount = $centerFees[$column];
                                }
                                echo '<div class="input-group mb-4 box">
                                        <span class="input-group-text" id="basic-addon1">
                                            <div class="form-check form-switch form-check-custom form-check-solid me-10">
                                                <input ' . ($amount == null ? '' : 'checked') . ' class="form-check-input select-amount h-20px w-30px" name="' . $column . '" type="checkbox" id="flexSwitch20x30' . $i . '"/>
                                                <label class="form-check-label text-dark" for="flexSwitch20x30' . $i++ . '">
                                                    ' . $row->title . '
                                                </label>
                                            </div>
                                        </span>
                                    <input type="number" value="'.$amount.'" ' . ($amount == null ? 'disabled' : '') . ' class="form-control amount-box" name="' . $column . '_amount" placeholder="Enter ' . $row->title . '" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off">
                                    </div>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    var listFields
        = <?= json_encode($columns) ?>;
</script>
