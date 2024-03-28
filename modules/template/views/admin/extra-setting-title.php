<form action="" class="extra-setting">
    <div class="{card_class}">
        <div class="card-header">
            <h3 class="card-title"><?=$title?></h3>
        </div>
        <div class="card-body p-2">
            <div class="form-group">
                <label for="" class="form-group">Enter Title</label>
                <input type="text" placeholder="<?=$title?>" name="<?=$index?>" value="<?=$this->SiteModel->get_setting($index,$value)?>" class="form-control">
            </div>
        </div>
        <div class="card-footer">
            {publish_button}
        </div>
    </div>
</form>