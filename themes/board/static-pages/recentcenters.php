<?php
$hideorShow = ES('isRecentcentre', 'hide');
?>
<div class="row">
    <div class="col-md-6">
        <form action="" class="setting-update">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Setting</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="form-label required">Hide or Show</label>
                        <select name="isRecentcentre" required id="" class="form-select" data-control="select2"
                            data-placeholder="Hide or Show Section">
                            <option value="hide" <?= $hideorShow == 'hide' ? 'selected' : '' ?>>Hide</option>
                            <option value="show" <?= $hideorShow == 'show' ? 'selected' : '' ?>>Show</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="" class="form-label required">Number of Centres Show</label>
                        <input type="number" name="recentcentre_num_show" value="<?=ES('recentcentre_num_show',0)?>" required class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="" class="form-label required">Section Title</label>
                        <input required type="text" name="recentcentre_sectoin_title"
                            value="<?= ES('recentcentre_sectoin_title') ?>" class="form-control"
                            placeholder="Section Title">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>