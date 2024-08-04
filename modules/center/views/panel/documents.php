<div class="card">
    <table class="table-striped table table-bordered" data-id="{id}">
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
                        <input type="file" name="adhar" class="d-none upload-center-docs" accept="image/*,.pdf"
                            id="adhar">
                        <i class="fa fa-cloud-upload"></i>
                        Change
                    </label>
                    <?php
                    if (file_exists('upload/' . $adhar) && $adhar) {
                        ?>
                        <a href="{base_url}upload/{adhar}" target="_blank"
                            class="btn btn-sm btn-active-primary border-primary border border-1">
                            <i class="fa fa-eye"></i>
                            View
                        </a>
                        <button type="button" data-id="{center_id}" data-field="adhar" data-file="{adhar}" class="delete-center-doc btn btn-sm btn-active-danger border border-danger border-1">
                            <i class="fa fa-trash"></i>
                            Delete
                        </button>
                        <?php
                    } else {
                        echo badge('Adhar Not Found.', 'danger');
                    }
                    ?>
                </div>
            </td>
        </tr>
        <tr>
            <th class="w-50">Signature</th>
            <td class="w-50">
                <div class="btn-group">
                    <label class="btn btn-active-info btn-sm border-info border border-1" for="signature">
                        <input type="file" name="signature" class="d-none upload-center-docs" accept="image/*,.pdf"
                            id="signature">
                        <i class="fa fa-cloud-upload"></i>
                        Change
                    </label>
                    <?php
                    if (file_exists('upload/' . $signature) && $signature) {
                        ?>
                        <a href="{base_url}upload/{signature}" target="_blank"
                            class="btn btn-sm btn-active-primary border-primary border border-1">
                            <i class="fa fa-eye"></i>
                            View
                        </a>
                        <button type="button" data-id="{center_id}" data-field="signature" data-file="{signature}" class="delete-center-doc btn btn-sm btn-active-danger border border-danger border-1">
                            <i class="fa fa-trash"></i>
                            Delete
                        </button>
                        <?php
                    } else {
                        echo badge('Signature Not Found.', 'danger');
                    }
                    ?>
                </div>
            </td>
        </tr>
        <?php
        if (CHECK_PERMISSION('CENTRE_LOGO')) {
            ?>
            <tr>
                <th class="w-50">Centre Logo</th>
                <td class="w-50">
                    <div class="btn-group">
                        <label class="btn btn-active-info btn-sm border-info border border-1" for="logo">
                            <input type="file" name="logo" class="d-none upload-center-docs" accept="image/*,.pdf"
                                id="logo">
                            <i class="fa fa-cloud-upload"></i>
                            Change
                        </label>
                        <?php
                        if (file_exists('upload/' . $logo) && $logo) {
                            ?>
                            <a href="{base_url}upload/{logo}" target="_blank"
                                class="btn btn-sm btn-active-primary border-primary border border-1">
                                <i class="fa fa-eye"></i>
                                View
                            </a>
                            <button type="button" data-id="{center_id}" data-file="{logo}" data-field="logo" class="delete-center-doc btn btn-sm btn-active-danger border border-danger border-1">
                                <i class="fa fa-trash"></i>
                                Delete
                            </button>
                            <?php
                        } else {
                            echo badge('Centre Logo Not Found.', 'danger');
                        }
                        ?>
                    </div>
                </td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <th>Address Proof</th>
            <td class="">
                <div class="btn-group">
                    <label class="btn btn-active-info btn-sm border-info border border-1" for="address_proof">
                        <input type="file" name="address_proof" class="d-none upload-center-docs" accept="image/*,.pdf"
                            id="address_proof">
                        <i class="fa fa-cloud-upload"></i>
                        Change
                    </label>
                    <?php
                    if (file_exists('upload/' . $address_proof) && $address_proof) {
                        ?>
                        <a href="{base_url}upload/{address_proof}" target="_blank"
                            class="btn btn-sm btn-active-primary border-primary border border-1">
                            <i class="fa fa-eye"></i>
                            View
                        </a>
                        <button type="button" data-id="{center_id}" data-file="{address_proof}" data-field="address_proof" class="delete-center-doc btn btn-sm btn-active-danger border border-danger border-1">
                            <i class="fa fa-trash"></i>
                            Delete
                        </button>
                        <?php
                    } else {
                        echo badge('Address Proof Not Found.', 'danger');
                    }
                    ?>
                </div>
            </td>
        </tr>
        <tr>
            <th>Agreement</th>
            <td class="">
                <div class="btn-group">
                    <label class="btn btn-active-info btn-sm border-info border border-1" for="agreement">
                        <input type="file" name="agreement" class="d-none upload-center-docs" accept="image/*,.pdf"
                            id="agreement">
                        <i class="fa fa-cloud-upload"></i>
                        Change
                    </label>
                    <?php
                    if (file_exists('upload/' . $agreement) && $agreement) {
                        ?>
                        <a href="{base_url}upload/{agreement}" target="_blank"
                            class="btn btn-sm btn-active-primary border-primary border border-1">
                            <i class="fa fa-eye"></i>
                            View
                        </a>
                        <button type="button" data-id="{center_id}" data-file="{agreement}" data-field="agreement" class="delete-center-doc btn btn-sm btn-active-danger border border-danger border-1">
                            <i class="fa fa-trash"></i>
                            Delete
                        </button>
                        <?php
                    } else {
                        echo badge('Agreement Not Found.', 'danger');
                    }
                    ?>
                </div>
            </td>
        </tr>
    </table>
</div>