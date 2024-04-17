<div class="card">
    <table class="table-striped table table-bordered">
        <tr>
            <th colspan="4" class="fs-2 fw-bold text-center ">
                <strong class="position-relative text-capitalize    ">

                    {institute_name}
                    <small class="text-success fs-2">Documents</small>
                    <span
                        class="d-inline-block position-absolute h-2px bottom-0 end-0 start-0 bg-success translate rounded"></span>
                </strong>
            </th>
        </tr>
        <tr>
            <th class="w-50">Aadhar Card</th>
            <td class="w-50">
                <div class="btn-group">
                    <label class="btn btn-active-info btn-sm border-info border border-1" for="adhar">
                        <input type="file" name="adhar" class="d-none" id="adhar">
                        <i class="fa fa-cloud-upload"></i>
                        Change
                    </label>
                    <a href="{base_url}{upload}/{adhar}" target="_blank" class="btn btn-sm btn-active-primary border-primary border border-1">
                        <i class="fa fa-eye"></i>
                        View
                    </a>
                </div>
            </td>
        </tr>
        <tr>
            <th class="w-50">Signature</th>
            <td class="w-50">{qualification_of_center_head}</td>
        </tr>
        <tr>
            <th>Address Proof</th>
            <td class="">{email}</td>
        </tr>
        <tr>
            <th>Agreement</th>
            <td class="">{contact_number}</td>
        </tr>
    </table>
</div>