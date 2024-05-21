<!-- <div class="card shadow-sm bg-transparent border-dark">
    <div class="card-header bg-transparent text-center">
        <h3 class="text-center">Franchise Verification Details</h3>
    </div>
    <div class="card-body bg-transparent p-0">
        <table class="table table-bordered pb-0 mb-0">
            <tr>
                <th>Institute Id</th>
                <td>{center_number}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td class="text-capitalize">{name}</td>
            </tr>
            <tr>
                <th>Institute Name</th>
                <td>{institute_name}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{center_full_address}</td>
            </tr>
        </table>
    </div>
</div> -->

<style>
    .student-profile .card {
        border-radius: 10px;
    }

    .student-profile .card .card-header .profile_img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        margin: 10px auto;
        border: 10px solid #ccc;
        border-radius: 50%;
    }

    .student-profile .card h3 {
        font-size: 20px;
        font-weight: 700;
    }

    .student-profile .card p {
        font-size: 16px;
        /* color: #000; */
    }

    .student-profile .table th,
    .student-profile .table td {
        font-size: 14px;
        padding: 5px 10px;
        /* color: #000; */
    }
</style>
<!-- Student Profile -->
<div class="student-profile py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow-sm bg-transparent border-dark">
                    <div class="card-header bg-transparent text-center">
                        <img class="profile_img" src="{owner_profile}" alt="">
                        <h3 class="text-center">{name}</h3>
                    </div>
                    <div class="card-body bg-transparent p-0">
                        <table class="table table-bordered pb-0 mb-0">
                            <tr>
                                <th>Institute ID</th><td>{center_number}</td>
                            </tr>
                            <tr>
                                <th>Email</th><td>{email}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th><td>{contact_number}</td>
                            </tr>
                        </table>
                        <!-- <p class="mb-0"><strong class="pr-1">Roll No:</strong>&nbsp;{roll_no}</p>
                        <p class="mb-0 text-capitalize"><strong class="pr-1">Gender:</strong>&nbsp; {gender}</p>
                        <p class="mb-0"><strong class="pr-1">Mobile:</strong>&nbsp;{contact_number}</p> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card shadow-sm bg-transparent border-dark">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="mb-0 card-title "><i class="far fa-clone pr-1 fs-2 text-dark"></i> &nbsp; General Information Of Center
                        </h3>
                    </div>
                    <div class="card-body pt-0 p-0">
                        <table class="table table-bordered ">
                            <tr>
                                <th width="30%">Center Name</th>
                                <td width="2%">:</td>
                                <td>{institute_name}</td>
                            </tr>
                            <tr>
                                <th width="30%">city </th>
                                <td width="2%">:</td>
                                <td>{DISTRICT_NAME}</td>
                            </tr>
                            <tr>
                                <th width="30%">State </th>
                                <td width="2%">:</td>
                                <td>{STATE_NAME}</td>
                            </tr>
                            <tr>
                                <th width="30%">Address</th>
                                <td width="2%">:</td>
                                <td>{center_full_address}</td>
                            </tr>
                            <tr>
                                <th width="30%">Status</th>
                                <td width="2%">:</td>
                                <td>{center_status}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>