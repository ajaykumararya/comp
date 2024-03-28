<div class="col-md-12">
    <div class="{card_class}">
        <div class="card-header">
            <h3 class="card-title">List Search Center</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Institute ID</th>
                            <th>Institute Name</th>
                            <th>Address</th>
                            <th>State</th>
                            <th>Distric</th>
                        </tr>
                    </thead>
                    <tbody>
                        {list}
                            <tr>
                                <td>{image}</td>
                                <td>{name}</td>
                                <td>{center_number}</td>
                                <td>{institute_name}</td>
                                <td>{center_full_address}</td>
                                <td>{STATE_NAME}</td>
                                <td>{DISTRICT_NAME}</td>
                            </tr>
                        {/list}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>