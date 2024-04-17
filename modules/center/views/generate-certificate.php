<div class="row">
    <div class="col-md-12">
        <form action="">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">List Certifictes</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="centre-certificates">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Centre Code</th>
                                    <th>Name</th>
                                    <th>Owner Name</th>
                                    <th>Issue Date</th>
                                    <th>Valid Upto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script id="formTemplate" type="text/x-handlebars-template">
    <input type="hidden" name="id" value="{{id}}">
    <div class="form-group mb-4">
        <label class="form-label required">Issue Date</label>
        <input type="text" name="certificate_issue_date" class="form-control current-date" value="{{certificate_issue_date}}">
    </div>
    <div class="form-group mb-4">
        <label class="form-label required">Valid Upto</label>
        <input type="text" name="valid_upto" class="form-control selectdate" value="{{valid_upto}}">
    </div>
</script>
