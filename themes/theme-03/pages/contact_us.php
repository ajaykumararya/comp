<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 text-left">
        <?= ES('contact_us_details') ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-8">
        <form action="" class="enquiry" id="submitGETINTOUCH">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" required placeholder="Enter Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Mobile</label>
                                <input type="number" name="mobile" required placeholder="Enter Mobile"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" required placeholder="Enter Email"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="form-label">Message</label>
                                <textarea name="message" required placeholder="Enter Message"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
        <iframe src="<?= ES('google_map_url') ?>" width="100%" height="450" frameborder="0" style="border:0"
            allowfullscreen=""></iframe>
    </div>
</div>