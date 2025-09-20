<div class="row">
    <div class="col-md-12">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Registration Data</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="registrationVerificationData">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Father Name</th>
                            <?php
                            if(PATH == 'upstate'):
                            ?>
                            <th>Mother Name</th>
                            <th>Exam Roll No.</th>
                            <th>Enrollment No.</th>
                            <?php
                            endif;
                            ?>
                            <th>Exam / Course</th>
                            <th>College / Institute Name</th>
                            <th>Exam Centre Name</th>
                            <th>Passing of Year</th>
                            <th>Pass / Fail</th>
                            <th>D.O.B</th>
                            <th><?=(PATH == 'upstate') ? 'Training Period' : 'Expiry Date'?></th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>