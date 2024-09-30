<?php
$listFeeRecords = $this->student_model->get_switch('fetch_fee_transactions_group_by', ['student_id' => $student_id]);

$num = $listFeeRecords->num_rows();
$isCenterOrAdmin = $this->student_model->isAdminOrCenter();
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Fee Record</h3>
            </div>
            <div class="card-body p-2">

                <?php
                if ($num):
                    ?>
                    <table class="table table-bordered" id="fee-record">
                        <thead>
                            <tr>
                                <th colspan="6" class="text-center fs-bolder fs-2">{student_name}</th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Transaction ID</th>
                                <th>Fee Amount</th>
                                <th>Fee Type</th>
                                <th>
                                    <?= $isCenterOrAdmin ? 'Action' : 'Receipt' ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($listFeeRecords->result() as $record) {
                                echo '<tr>
                                    <td>' . $i++ . '</td>
                                    <td>' . $record->payment_date . '</td>
                                    <td>' . $record->payment_id . '</td>
                                    <td class="fs-4 fw-bolder">' . $record->amount .'
                                    </td>
                                    <td class="text-capitalize">' . $record->payment_type . (
                                        $record->ttl_discount ? '
                                        <small class="d-flex text-success">with Discount : &nbsp; {inr}'.$record->ttl_discount.'</small>' : ''
                                    ).'</td>
                                    <td><div class="btn-group">
                                    ';
                                if ($isCenterOrAdmin) {
                                    echo $this->ki_theme
                                        ->with_icon('pencil')
                                        ->with_pulse('primary')
                                        ->outline_dashed_style('primary')
                                        ->set_attribute([
                                            'data-fee_id' => $record->id,
                                            'class' => 'edit-fee-record'
                                        ])
                                        ->button('Edit');
                                }
                                // generate receipt
                                echo $this->ki_theme
                                    ->with_icon('file')
                                    ->with_pulse('success')
                                    ->outline_dashed_style('success')
                                    ->set_attribute([
                                        'data-fee_id' => $record->payment_id,
                                        'class' => 'print-receipt'
                                    ])
                                    ->button('Receipt');
                                if ($isCenterOrAdmin) {
                                    echo $this->ki_theme
                                        ->with_icon('trash')
                                        ->with_pulse('danger')
                                        ->outline_dashed_style('danger')
                                        ->set_attribute([
                                            'data-fee_id' => $record->id,
                                            'class' => 'delete-fee-record'
                                        ])
                                        ->button('Delete');
                                }
                                echo '
                                    
                                    </div></td>                            
                                </tr>';
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr class="fw-bold fs-6">
                                <th colspan="3" class="text-nowrap text-end">Total</th>
                                <th colspan="3" class="text-success fs-3"></th>
                            </tr>
                        </tfoot>
                    </table>
                    <?php
                else:
                    echo '<h1 class="alert alert-danger">No Record Found</h1>';
                    echo '<img class="mx-auto h-150px h-lg-200px" src="{base_url}assets/media/illustrations/sigma-1/13.png" alt="">';
                endif;
                ?>


            </div>
        </div>
    </div>
</div>

<?php
if ($isCenterOrAdmin) {
    // 
    ?>
    <script id="formTemplate" type="text/x-handlebars-template">
                        <input type="hidden" name="id" value="{{id}}">
    
                        <div class="form-group mb-4">
                            <label class="form-label">Date</label>
                            <input type="text" name="date" class="form-control" placeholder="Enter Roll Number Prefix" value="{{date}}">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label">Date</label>
                            <input type="text" name="date" class="form-control" placeholder="Enter Roll Number Prefix" value="{{date}}">
                        </div>
                    </script>
    <?php
}

?>