<div class="row">
    <div class="col-md-6">
        {form}
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">Add Testimonial</h3>
            </div>
            <div class="card-body">
                <div class="form-group mt-4">
                    <label for="field1" class="form-label">Title</label>
                    <input type="text" name="field1" id="field1" value="" class="form-control"
                        placeholder="Enter Title">
                </div>
                <div class="form-group mt-4">
                    <label for="field2" class="form-label">Description</label>
                    <textarea type="text" name="field2" id="field2" value="" class="form-control"
                        placeholder="Enter Description"></textarea>
                </div>
            </div>
            <div class="card-footer">
                {save_button}
            </div>
        </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mt-5">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Testimonial</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" setting-table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Link</th>
                                <th>Update</th>
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
                                            <?= $row->field2 ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row->field4)
                                                echo anchor($row->field4, $row->field4, [
                                                    'target' => '_blank'
                                                ]);
                                            else
                                                echo '<i class="text-danger">Empty</i>';
                                            ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm btn-xs edit-faculty"><i
                                                    class="fa fa-edit"></i></button>
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

