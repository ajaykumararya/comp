<div class="card border-primary card-image my-fee-box">
    <div class="card-header border-primary">
        <h3 class="card-title text-dark fs-1"> <span class="">₹</span> Collect Course Fee</h3>
    </div>
    <div class="card-body pt-2">
        <h3 class="text-center text-danger">Remaining Fee : <?=$remaining_fee?> <span class="">₹</span> </h3>

        <div class="form-group mb-2">
            <label class="required form-label">Payment Date</label>
            <input type="text" class="form-control current-date flatpickr-input" name="payment_date"
                value="<?=$this->ki_theme->date()?>" required="" readonly="readonly">
        </div>
        <div class="form-group mb-2">
            <label class="required form-label">Amount</label>
            <input type="number" class="form-control amount" name="payable_amount" value="<?=$remaining_fee?>"
                required="">
        </div>
        <div class="form-group mb-2">
            <label class="form-label">Discount</label>
            <input type="number" class="form-control discount" name="discount" placeholder="Discount" value="0">
        </div>
        <div class="form-group">
            <label class="form-label">Note</label>
            <textarea class="form-control" placeholder="Note" name="note"></textarea>
        </div>
        <div class="form-group mt-3">
            <label class="form-label">Payment Type</label>
            <select class="form-select form-control-solid" name="payment_type">
                <option value="cash">Cash</option>
                <option value="online">Online</option>
            </select>
        </div>
    </div>
    <div class="card-footer">
        {save_button}
    </div>
</div>