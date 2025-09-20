<?php
// Permission : EXAM SLOT SYSTEM
?>

<div class="row 2">
    <div class="col-md-12">
        <form action="" id="form">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add Exam Centre</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label required">Centre Name</label>
                                <input type="text" name="centre_name" class="form-control" placeholder="Centre Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label required">Centre Code</label>
                                <input type="text" name="centre_code" class="form-control" placeholder="Centre code">
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label for="" class="form-label required">Address</label>
                                <textarea name="centre_address" class="form-control" id=""
                                    placeholder="Enter Address"></textarea>
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
    <div class="col-md-12">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Exam Centre(s)</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script id="formTemplate" type="text/x-handlebars-template">
        <input type="hidden" name="id" value="{{id}}">
        <div class="form-group mb-3">
            <label for="" class="form-label required">Centre Name</label>
            <input type="text" name="centre_name" value="{{centre_name}}" class="form-control" placeholder="Centre Name">
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label required">Centre Code</label>
            <input type="text" name="centre_code" value="{{centre_code}}" class="form-control" placeholder="Centre code">
        </div>
        <div class="form-group">
            <label for="" class="form-label required">Address</label>
            <textarea name="centre_address" class="form-control" id=""
                placeholder="Enter Address">{{centre_address}}</textarea>
        </div>
</script>