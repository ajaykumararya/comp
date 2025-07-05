<div class="row">
    <!-- <div class="col-md-12 mb-4">
        <form action="" id="add-state">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add New State</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="form-label required">State Name</label>
                        <input type="text" name="state_name" required placeholder="Enter State Name.."
                            class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div> -->
    <div class="col-md-12">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Stats(s)</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>State Name</th>
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
    <input type="hidden" name="id" value="{{STATE_ID}}">
    <div class="form-group">
        <label class="form-label required">Enter State Name</label>
        <input type="text" name="state_name" value="{{STATE_NAME}}" class="form-control" placeholder="Enter State Name">
    </div>
</script>