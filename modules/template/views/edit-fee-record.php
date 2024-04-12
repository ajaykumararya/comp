<div class="row">
    <input type="hidden" name="id" value="{id}">

    <div class="form-group col-md-6">
        <label for="" class="form-label">Transaction ID</label>
        <input type="text" class="form-control" readonly value="{payment_id}">
    </div>

    <div class="form-group mb-4 col-md-6">
        <label for="" class="form-label">Date</label>
        <input type="text" name="payment_date" class="form-control current-date" value="{payment_date}">
    </div>
    <b class="text-success fs-2">Total Amount : {amount} {inr} ( {type} )</b>
    <input type="hidden" name="amount" value="{amount}">
    <div class="form-group col-md-6">
        <label for="" class="form-label mt-4">Amount</label>
        <input type="text" class="form-control" name="payable_amount" value="{payable_amount}">
    </div>
    <div class="form-group col-md-6">
        <label for="" class="form-label mt-4">Discount</label>
        <input type="text" class="form-control" name="discount" value="{discount}">
    </div>
    <div class="form-group col-md-6">
        <label for="" class="form-label mt-4">Payment Type</label>
        <select name="payment_type" class="form-control" data-control="select2" id="">
            <option value="cash" selected>Cash</option>
            <option value="cheque">Cheque</option>
            <option value="upi">UPI</option>
        </select>
    </div>
    <div class="col-md-6 form-group">
        <label for="" class="form-label mt-4">Description</label>
        <textarea name="description" class="form-control" id="" rows="3">{description}</textarea>
    </div>
</div>