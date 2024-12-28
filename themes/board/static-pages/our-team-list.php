<div class="row">
    <div class="col-md-6">
        {form}
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">Add Team Member</h3>
            </div>
            <div class="card-body">
                <div class="form-group mt-4">
                    <label for="field1" class="form-label required">Name</label>
                    <input type="text" required name="field1" id="field1" value="" class="form-control"
                        placeholder="Enter Title">
                </div>
                <div class="form-group mt-4">
                    <label for="field2" class="form-label required">Designation</label>
                    <textarea type="text" required name="field2" id="field2" value="" class="form-control"
                        placeholder="Enter Description"></textarea>
                </div>
                <div class="form-group mt-4">
                    <label for="field1" class="form-label required">Image</label>
                    <input type="file" name="field3" id="field1" class="form-control" required>
                </div>

                <div class="form-group mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center bg-primary">Member Social Links</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $socialUtils = [
                                '4' => 'Facebook',
                                '5' => 'Twitter',
                                '6' => 'Instagram',
                                '7' => 'Linked-in'
                            ];
                            foreach($socialUtils as $i => $util){
                                echo '<tr>
                                
                                        <td>'.$util.'</td>
                                        <td>
                                            <input type="text" name="field'.$i.'" placeholder="Enter '.$util.' Link" class="form-control custom_setting_input" style="font-size:12px">
                                        </td>
                                        </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {save_button}
            </div>
        </div>
        </form>
    </div>
    <div class="col-md-6">
        <form action="" class="extra-setting" data-page_reload="true">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Setting</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input name="testimonial_title" value="<?= ES('our_team_section_title') ?>" class="form-control"
                            placeholder="Enter Form Title">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Sub Title</label>
                        <input name="testimonial_sub_title" value="<?= ES('our_team_section_sub_title') ?>"
                            class="form-control" placeholder="Enter Form Title">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mt-5">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Our Team</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" setting-table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = $this->SiteModel->get_contents($type);
                            if ($data->num_rows()):
                                $index = 1;
                                foreach ($data->result() as $row):
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $index++ ?>.
                                        </td>
                                        <td>
                                            <?= $row->field1 ?>
                                        </td>
                                        <td>
                                            <?= base64_encode($row->id) ?>
                                        </td>
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
    </div>
</div>