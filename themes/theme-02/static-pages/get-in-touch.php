<div class="row">
    <div class="col-md-12">
        <form action="" class="extra-setting" data-page_reload="true">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Get in Touch ( Section )</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Enter Title</label>
                        <input name="get_in_touch_title"
                            value="<?= $this->SiteModel->get_setting('get_in_touch_title', 'Get In Touch') ?>"
                            class="form-control" placeholder="Enter Title">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label">Google Map Url</label>
                        <textarea name="google_map_url" rows="7"
                            class="form-control"><?= $this->SiteModel->get_setting('google_map_url') ?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <form action="" class="extra-setting" data-page_reload="true">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Get in Touch Form Data</h3>
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
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $list = $this->SiteModel->list_enquiries('get_in_touch');
                                if ($list->num_rows()):
                                    foreach ($list->result() as $row):
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td><?=$row->date?></td>
                                            <td><?=$row->name?></td>
                                            <td><?=$row->email?></td>
                                            <td><?=$row->mobile?></td>
                                            <td><?=$row->subject?></td>
                                            <td><?=$row->message?></td>
                                            <td><?=$row->id?></td>
                                        </tr>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>