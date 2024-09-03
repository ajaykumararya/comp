<div class="row">
    <div class="col-md-12">
        <form id="set-fees" action="" method="POST">
            <div class="{card_class}">
                <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible">
                    <h3 class="card-title">Centre Fix Amount Setting</h3>
                    <div class="card-toolbar rotate-180">
                        <i class="ki-duotone ki-down fs-1"></i>
                    </div>
                </div>
                <div id="kt_docs_card_collapsible" class="collapse show">
                    <div class="card-body p-0">
                        <table class="table table-bordered table-striped table-hover" id="student-payment-setting">
                            <thead>
                                <tr>
                                    <th>#.</th>
                                    <th>Title</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {save_button}
                    <button type="button" class="btn btn-info sync-fee-data">Sync Fee Data</button>
                </div>
            </div>
        </form>
    </div>
</div>