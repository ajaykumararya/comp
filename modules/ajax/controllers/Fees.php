<?php
class Fees extends Ajax_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->config('fees');
    }
    private function GetConfig($index)
    {
        return $this->config->item('searching_types')[$index] ?? 'undefined';
    }
    private function get_fee_box($array = [])
    {
        extract($array);
        $randID = generateCouponCode(3);
        return '
                <div class="col-md-3 my-fee-box">
                    <div class="card border-hover-primary">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                    
                                    <div class="card-toolbar">
                                        <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                            <input class="form-check-input check-input" type="checkbox" value="" checked id="key_'.$randID.'"/>
                                            <label class="form-check-label text-dark" for="key_'.$randID.'">
                                                ' . $title . '
                                            </label>
                                        </div>
                                    </div>
                            </h3>
                        </div>
                        <div class="card-body p-2">                        
                            <input type="hidden" name="index_key[]" value="' . $type . '">
                            <input type="hidden" name="key_id[]" value="' . $index . '">
                            <div class="form-group">
                                <label class="required">Amount</label>
                                <input type="number" class="form-control amount" value="' . $fee . '" required>
                            </div>
                            <div class="form-group">
                                <label>Discount Amount</label>
                                <input type="number" class="form-control discount" placeholder="Discount" value="0">
                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <textarea class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>';
    }
    function get_fees_types()
    {
        $this->response('status', true);
        $Html = '<select class="form-control select-search-type" data-hide-search="true" data-control="select2">
                    <option value="">Select Fee Type</option>
                    ';
        foreach ($this->config->item('searching_types') as $key => $value)
            $Html .= '<option value="' . $key . '">' . $value . '</option>';
        $Html .= '</select>';
        $this->response('html', $Html);
    }
    function get_fees_structure()
    {
        $Html = '<div class="row">';
        if ($this->post('type') == 'admission_fees') {
            $Html .= $this->get_fee_box([
                'type' => 'admission_fees',
                'title' => 'Admission Fees',
                'fee' => 500,
                'index' => '0'
            ]);
        }
        $Html .= '</div>                  
        ';
        $this->response('html', $Html);
        $this->response('status', true);
        $this->response('footer','<div class="d-flex justify-content-end">
                    <!--begin::Section-->
                    <div class="mw-600px">
                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <!--begin::Accountname-->
                            <div class="fw-semibold pe-10 text-gray-600 fs-7">Total Payable Amount:</div>
                            <!--end::Accountname-->

                            <!--begin::Label-->
                            <div class="text-end fw-bold fs-6 text-gray-800"> <span class="">₹</span>
                                <b class="payable-amount">0</b> </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack mb-3">
                            <!--begin::Code-->
                            <div class="fw-semibold pe-10 text-gray-600 fs-7">Total Paid Amount:</div>
                            <!--end::Code-->

                            <!--begin::Label-->
                            <div class="text-end fw-bold fs-6 text-gray-800"> <span class="">₹</span>
                                <b class="ttl-descount">0</b> </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack mb-3">
                            <!--begin::Code-->
                            <div class="fw-semibold pe-10 text-gray-600 fs-7">Total Paid Amount:</div>
                            <!--end::Code-->

                            <!--begin::Label-->
                            <div class="text-end fw-bold fs-6 text-gray-800"> <span class="">₹</span>
                                <b class="paid-amount">0</b> </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <div class="d-flex flex-stack mb-3">
                            <button class="btn btn-primary pay-now" disbled>Submit Fees</button>
                        </div>
                    </div>
                    <!--end::Section-->
                </div>');
    }
}