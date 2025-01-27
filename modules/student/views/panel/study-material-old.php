<?php
$login_id = $this->student_model->studentId();
$list = $this->student_model->get_switch('student_study_data', [
    'id' => $login_id
]);
if ($list->num_rows()) {
    echo '<div class="row">
            <div class="col-md-12">
                <div class="{card_class}">
                    <div class="card-header">
                        <h3 class="card-title">Study Material</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                <thead>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                        <th>Time</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>';

    foreach ($list->result() as $row) {     
        echo '<tr data-time="'.$row->material_id.'">
                    <td>'.date('d-m-Y',$row->assign_time).'</td>
                    <td>'.$row->title.' <p class="text-gray-500">'.$row->description.'</p></td>
                    <td>
                        <button class="btn btn-action btn-primary btn-xs btn-sm" data-id="'.$row->material_id.'"><i class="fa fa-eye"></i> View</button>
                    </td>
                </tr>';

    }
    echo '                      </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
} else {
    echo $this->ki_theme->item_not_found('Not Found', 'Study Material not found.');
}
?>