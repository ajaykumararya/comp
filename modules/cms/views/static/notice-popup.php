
<?php
$popupTitle = ES('home_page_alert_popup_title');
$popupStatus = ES('home_page_alert_popup_status', false);
$popupDescription = ES('home_page_alert_popup_description');
?>
<div class="row">
    <div class="col-md-12">
        <form action="" class="extra-setting">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Notice Popup</h3>
                </div>
                <div class="card-body row">
                    <div class="form-group mb-4 col-md-6">
                        <label for="" class="form-label mb-4">Popup Visibility</label>
                        <select name="home_page_alert_popup_status" id="" class="form-control">
                            <option value="0" <?=$popupStatus == '0' ? 'selected' : ''?>>Hide</option>
                            <option value="1" <?=$popupStatus == '1' ? 'selected' : ''?>>Show</option>
                        </select>
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="" class="form-label mb-4">Title</label>
                        <input type="text" name="home_page_alert_popup_title" placeholder="Enter Title" value="<?=$popupTitle?>" class="form-control">
                    </div>
                    <div class="form-group mb-4 col-md-12">
                        <label for="" class="form-label mb-4">Description</label>
                        <textarea name="home_page_alert_popup_description" id="" class="aryaeditor"><?=$popupDescription?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>