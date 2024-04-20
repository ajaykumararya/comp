<table class="table table-bordered">
    <tr>
        <th colspan="2" class="text-center fs-2 text-success fw-bold">{coupon_code}</th>
    </tr>
    <tr>
        <th>Create Time</th>
        <td>{create_time}</td>
    </tr>
    <tr>
        <th>Update Time</th>
        <td>{update_time}</td>
    </tr>
</table>
<input type="hidden" name="id" value="{id}">
<div class="form-group mb-4">
    <label for="" class="form-label" >Update Status</label>
    <select name="isUsed" id="" class="form-control" data-control="select2">
        <?php
        $status = [
            'Pending',
            'Used',
            'Expired',
            'Reject'
        ];
        foreach($status as $index => $type){
            echo '<option value="'.$index.'" '.( $isUsed == $index ? 'selected' : '' ).'>'.$type.'</option>';
        }
        ?>
    </select>
</div>