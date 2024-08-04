<div class="row">
    <div class="{card_class}">
        <div class="card-header">
            <h3 class="card-title">List Enquiry Data</h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table bordered table-striped" id="enquiry_data">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {list}
                            <tr>
                                <td></td>
                                <td>{date}</td>
                                <td>{name}</td>
                                <td>{email}</td>
                                <td>{mobile}</td>
                                <td>{message}</td>
                                <td>{id}</td>
                            </tr>
                        {/list}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>