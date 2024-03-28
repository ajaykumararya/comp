<div class="row">
    <div class="col-md-5">
        <form action="" id="add-acheivment">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Our Acheivements</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="counter" class="form-label">Counter</label>
                        <input type="text" placeholder="Enter Counter Like 200+ or 4 Lakh+" class="form-control"
                            name="counter">
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label mt-3">Description</label>
                        <textarea name="description" class="form-control" placeholder="Description"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-7">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Acheivements</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover" id="list-acheivements">
                    <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div><div class="row mt-3">
    <dv class="col-md-4">
        <?=$this->ki_theme->extra_setting_title_form('Section Title','our_acheivements_title','ITCT EDUCATION ACHIEVEMENTS')?>
    </dv>
</div>