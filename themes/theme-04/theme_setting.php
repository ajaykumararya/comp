<form class="extra-setting">


    <div class="{card_class}">
        <div class="card-header">
            <h3 class="card-title">Slider Bottom Buttons</h3>
            <div class="card-toolbar">
                <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                    <input <?=$this->SiteModel->get_setting('slider_icons') == 'on' ? 'checked' : ''?> class="form-check-input " name="slider_icons" type="checkbox" id="kt_flexSwitchCustomDefault_1_1" />
                    <label class="form-check-label" for="kt_flexSwitchCustomDefault_1_1">
                        Show / Hide
                    </label>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row p-0">
                <?php
                for($i = 1; $i <= 5; $i++){
                    $title = $this->SiteModel->get_setting('slider_title_'.$i);
                    $value = $this->SiteModel->get_setting('slider_value_'.$i,'#');
                    $icon = $this->SiteModel->get_setting('slider_icon_'.$i);
                    echo '<div class="col-md-4 mb-2">
                            <div class="card card-flush border border-primary">
                                <div class="card-body p-4">
                                    <div class="form-group">
                                        '.inconPickerInput('slider_icon_'.$i,$icon).'
                                    </div>
                                    <div class="form-group mt-2">
                                        <input value="'.$title.'" name="slider_title_'.$i.'"  type="text" class="form-control" placeholder="Title">
                                    </div>                                    
                                    <div class="form-group mt-2">
                                        <input value="'.$value.'"  name="slider_value_'.$i.'" type="text" class="form-control" placeholder="Url">
                                    </div>
                                </div>
                            </div>
                            
                        </div>';
                }
                ?>
                
            </div>
        </div>
        <div class="card-footer">
            {save_button}
        </div>
    </div>
</form>