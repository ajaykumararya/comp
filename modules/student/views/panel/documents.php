<div class="row">
    <form action="" class="change-student-password">
        <input type="hidden" name="student_id" value="{student_id}">
        <div class="col-md-12">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Documents</h3>                    
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-bordered mb-0">
                        <thead>
                            <tr>
                                <th class="w-50">Document</th>
                                <th class="w-50">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Adhaar Details</th>
                                <td>
                                    <?=$this->ki_theme
                                                    ->with_icon('eye',3)
                                                    ->with_pulse('primary')
                                                    ->outline_dashed_style('primary')
                                                    ->set_class('btn-sm')
                                                    ->set_attribute([
                                                        'target' => '_blank'
                                                    ])
                                                    ->add_action('View','upload/'.$student_aadhar)?>
                                </td>
                            </tr> 
                            <?php
                            
                            if($student_docs != null){
                                $decodes = json_decode($student_docs);
                                if(($decodes)){
                                    foreach($decodes as $doc => $value){
                                        echo '<tr>
                                                <th>';
                                                echo empty($doc) ? '<b class="text-danger">UNKNOWN FILE</b>' : $doc;
                                                echo '</th>
                                                <td>
                                                    '.
                                                    $this->ki_theme
                                                    ->with_icon('eye',3)
                                                    ->with_pulse('primary')
                                                    ->outline_dashed_style('primary')
                                                    ->set_class('btn-sm')
                                                    ->set_attribute([
                                                        'target' => '_blank'
                                                    ])
                                                    ->add_action('View','upload/'.$value)
                                                    .'
                                                </td>
                                        </tr>';
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>