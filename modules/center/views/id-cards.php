<div class="row">
    <div class="col-md-12 mb-4">
        <form action="" id="center_id_card">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Generate Id card-header</h3>
                </div>
                <div class="card-body row">
                    <div class="form-group mb-4 col-md-4 col-xs-12 col-sm-12 ">
                        <label class="form-label required">Center</label>

                        <select class="form-select" name="center_id" data-control="select2"
                            data-placeholder="Select a Center" data-allow-clear="<?= $this->center_model->isAdmin() ?>">
                            <option></option>
                            <?php
                            $list = $this->center_model->get_center(0, 'center')->result();
                            foreach ($list as $row) {
                                echo '<option value="' . $row->id . '" data-kt-rich-content-subcontent="' . $row->institute_name . '"
                                    data-kt-rich-content-icon="' . $row->image . '">' . $row->name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-4 col-md-4 col-xs-12 col-sm-12 ">
                        <label for="" class="form-label required">Issue Date</label>
                        <input class="form-control selectdate" name="issue_date" value="<?=$this->ki_theme->date()?>" />
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12 mb-4">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Id Card(s)</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="id_cards">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Center Code</th>
                            <th>Institute Name</th>
                            <th>Name</th>
                            <th>Issue Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>