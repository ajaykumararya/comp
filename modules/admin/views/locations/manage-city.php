<div class="row">
    <!---
    <div class="col-md-12 mb-4">
        <form action="" class="add-state">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add New District</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label required">State</label>
                                <select required class="form-select " name="STATE_ID" data-control="select2"
                                    data-placeholder="Select a State">
                                    <option value="">--Select--</option>
                                    <option></option>
                                    <?php
                                    $state = $this->db->order_by('STATE_NAME', 'ASC')->get('state');
                                    if ($state->num_rows()) {
                                        foreach ($state->result() as $row)
                                            echo '<option value="' . $row->STATE_ID . '">' . $row->STATE_NAME . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label required">District Name</label>
                                <input type="text" name="city_id" required placeholder="Enter District Name.."
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    ---->
    <div class="col-md-12">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List District(s)</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>State Name</th>
                                <th>District Name</th>
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
    <input type="hidden" name="id" value="{{DISTRICT_ID}}">
    <div class="form-group">
        <label class="form-label required">Enter District Name</label>
        <input type="text" name="district_name" value="{{DISTRICT_NAME}}" class="form-control" placeholder="Enter District Name">
    </div>
</script>