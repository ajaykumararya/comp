<div class="row">
    <div class="col-md-12">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Forms</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped fs-2" id="list_forms">
                    <thead>
                        <tr>
                            <th>#.</th>
                            <th>Form Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach (config_item('forms') as $index => $form) {
                            echo '<tr>
                                    <td>' . $i++ . '.</td>
                                    <td>' . $form . '</td>
                                    <td class="p-4">'.$this->ki_theme->drawer_button('form',$index,$form);
                                    if($index == 'student_admission'){
                                        echo '<button class="btn btn-primary m-2 student-admission-setting"><i class="fa fa-cog"></i></button>';
                                    }
                                    echo '</td>
                                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>