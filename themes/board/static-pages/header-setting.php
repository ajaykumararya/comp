<div class="row">
    <div class="col-md-6">
        <form action="" class="setting-update">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Header Title</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="form-group">Hindi Title</label>
                        <input value="<?=ES('page_hindi_title')?>" type="text" name="page_hindi_title" placeholder="Enter Header Title.."
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Title</label>
                        <input value="<?=ES('page_title_description')?>" type="text" name="page_title_description" placeholder="Description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Sub Title</label>
                        <input value="<?=ES('page_title_sub_description')?>" type="text" name="page_title_sub_description" placeholder="Description"
                            class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="form-label">Open Timing</label>
                        <input value="<?=ES('header_open_timing')?>" type="text" name="header_open_timing" placeholder="(11:00am to 6:00pm IST)"
                            class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <?php
    $buttonClasses = ['success', 'danger', 'warning', 'dark', 'primary'];

    ?>
    <div class="col-md-12 mt-2">
        <form action="" class="setting-update">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Header Right Side Button</h3>
                </div>
                <div class="card-body">
                    <div class="row">


                        <div class="col-md-6">
                            <div class="card border border-warning">
                                <div class="card-header">
                                    <h3 class="card-title">First Button</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="" class="form-label">Theme Button</label>
                                        <select name="header_first_button_class" class="form-control"
                                            data-control="select2">
                                            <?php
                                            $select = ES('header_first_button_class','success');
                                            foreach ($buttonClasses as $in) {
                                                echo '<option value="' . $in . '" '.($select == $in ? 'selected' : '').'>' . ucfirst($in) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Button Title</label>
                                        <input type="text" placeholder="Enter Button Title" class="form-control"
                                            name="header_first_button_title" value="<?=ES('header_first_button_title')?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Button Link</label>
                                        <input type="text" placeholder="Enter Button Link" class="form-control"
                                            name="header_first_button_link" value="<?=ES('header_first_button_link')?>">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="card border border-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Second Button</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="" class="form-label">Theme Button</label>
                                        <select name="header_second_button_class" class="form-control"
                                            data-control="select2">
                                            <?php
                                            $select = ES('header_second_button_class','success');
                                            foreach ($buttonClasses as $in) {
                                                echo '<option value="' . $in . '" '.($select == $in ? 'selected' : '').'>' . ucfirst($in) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Button Title</label>
                                        <input type="text" placeholder="Enter Button Title" class="form-control"
                                            name="header_second_button_title" value="<?=ES('header_second_button_title')?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Button Link</label>
                                        <input type="text" placeholder="Enter Button Link" class="form-control"
                                            name="header_second_button_link" value="<?=ES('header_second_button_link')?>">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>