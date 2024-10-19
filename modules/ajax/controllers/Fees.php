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
    private function get_fee_box($array = [], $checked = true)
    {
        extract($array);
        $randID = generateCouponCode(3);
        $readonly = $type == 'course_fees' ? 'readonly' : '';
        $penalty = isset($penalty) ? $penalty : false;
        if ($fee == null) {
            $loginType = $this->center_model->isCenter() ? 'center' : 'student';
            $this->response('empty_footer', true);
            return '<div class="overflow-auto pb-5 mb-2">
                        <div class="notice d-flex bg-light-danger rounded border-danger border border-dashed min-w-lg-600px flex-shrink-0 p-6">
                            <i class="ki-duotone ki-notification fs-2tx text-danger me-4"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>

                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <div class="mb-3 mb-md-0 fw-semibold">
                                    <h4 class="text-gray-900 f,w-bold">' . $title . ' not Defined!</h4>

                                    <div class="fs-6 text-gray-700 pe-7">Go to Set Fee Section, And update fee then click on refresh button.</div>
                                </div>
                                <div> 
                                    <button type="button" class="btn btn-active-danger px-6 align-self-center text-nowrap setting-refresh border-dashed border-2 border-danger"> Refresh</button>
                                    <a href="' . base_url('payment/' . $loginType . '-payment-setting') . '" target="_blank" class="btn btn-active-danger px-6 align-self-center text-nowrap undo-setting border-dashed border-2 border-danger"> Configure Fee </a>                           
                                </div>
                            </div>
                        </div>                
                    </div>';
        }
        if (isset($added) && $added) {
            $this->response('empty_footer', true);
            return alert('Already Submit this fees', 'danger');
        }
        return '
                <div class="row my-fee-box p-0 mb-5">
                    <div class="card">
                        <div class="card-body p-0 pt-3 pb-2">   
                            <div class="row p-0">
                                <div class="col-md-3">
                                    <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                        <input class="form-check-input check-input" type="checkbox" name="key_id[]" value="' . $index . '" ' . ($checked ? 'checked' : '') . ' id="key_' . $randID . '"/>
                                        <label class="form-check-label text-dark fs-2" for="key_' . $randID . '">
                                            ' . $title . '
                                        </label>
                                    </div>
                                    <h3 class="text-center text-success">Fee Amount : ' . $fee . ' ' . ($inr = $this->get_data('inr') ). '</h3>
                                    <div class="input-group input-group-sm">
                                        <input type="text" readonly class="form-control" value="Payment Type">
                                        <span class="input-group-text" id="basic-addon2"
                                            style="width:140px;padding:0px!important">
                                            <select name="payment_type[' . $index . ']"  class="form-select">
                                                <option value="cash">Cash</option>
                                                <option value="online">Online</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                                 
                                <input type="hidden" name="index_key[]" value="' . $type . '">

                                <div class="form-group col-md-2">
                                    <label class="required form-label">Payment Date</label>
                                    <input type="text" class="form-control current-date" name="payment_date[' . $index . ']" value="' . $date . '" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="required form-label">Amount</label>
                                    <input type="number" class="form-control amount" ' . $readonly . ' name="payable_amount[' . $index . ']" value="' . $fee . '" required>
                                    '.(($penalty) ? '
                                    <div class="form-check form-switch form-check-danger form-check-solid mt-2">
                                        <input checked class="form-check-input h-20px w-30px penalty-input" type="checkbox" value="" id="'.$index.'"/>
                                        <label class="form-check-label text-dark" for="'.$index.'">
                                            Penalty : 100 '.$inr.'
                                        </label>
                                    </div>
                                    ' : '').'
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="form-label">Discount</label>
                                    <input type="number" class="form-control discount" name="discount[' . $index . ']" placeholder="Discount" value="0">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label">Note</label>
                                    <textarea class="form-control" placeholder="Note" name="note[' . $index . ']"></textarea>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>';
    }
    function submit_fees()
    {
        // $this->response($_POST);
        $data = [];
        if (sizeof($_POST['index_key'])) {
            $payment_id = time();
            foreach ($_POST['key_id'] as $in => $index_key) {
                $amount = $_POST['payable_amount'][$index_key];
                $dicsount = $_POST['discount'][$index_key];
                $data[] = [
                    'type' => $index_key,
                    'duration' => is_numeric($index_key) ? $index_key : 0,
                    'type_key' => $_POST['index_key'][$in],
                    'amount' => $amount,
                    'discount' => $dicsount,
                    'payable_amount' => $amount - $dicsount,
                    'description' => $_POST['note'][$index_key],
                    'payment_type' => $_POST['payment_type'][$index_key],
                    'payment_id' => $payment_id,
                    'payment_date' => $_POST['payment_date'][$index_key],
                    'student_id' => $_POST['student_id'],
                    'course_id' => $_POST['course_id'],
                    'roll_no' => $_POST['roll_no'],
                    'center_id' => $_POST['center_id']
                ];
            }
            // $this->response('data', $data);
            $this->db->insert_batch('student_fee_transactions', $data);
            $this->response('status', true);
        }
    }
    function get_fees_types()
    {
        $student = $this->student_model->withEMI()->get_student_via_id($this->post('id'));
        if ($student->num_rows()) {
            $row = $student->row();

            $this->response('status', true);
            $Html = '<select data-placeholder="Search Type" class="form-control select-search-type" data-allow-clear="true" data-control="select2">
                    <option></option>
                    ';
            foreach ($this->config->item('searching_types') as $key => $value)
                $Html .= '<option value="' . $key . '">' . $value . '</option>';
            $Html .= '</select>';

            $Html .= form_hidden([
                'course_id' => $row->course_id,
                'center_id' => $row->institute_id,
                'roll_no' => $row->roll_no,
                'fee_emi' => $row->fee_emi,
                'fee_emi_type' => $row->fee_emi_type
            ]);
            $this->response('html', $Html);
        } else
            $this->response('error', alert('Something Went Wrong..', 'danger'));
    }
    function get_fees_structure()
    {
        $newSTDClass = new stdClass;
        $inrIcon = $this->get_data('inr');
        $where = [
            'student_id' => $this->post('student_id'),
            'course_id' => $this->post('course_id'),
            'roll_no' => $this->post('roll_no'),
            'center_id' => $this->post('center_id')
        ];
        $this->response('where', $where);
        extract($where);
        $Html = '<div class="row">';
        $switchType = $this->post('type');
        $isPenalty = false;
        if ($switchType) {
            switch ($switchType) {
                default:
                    $get = $this->student_model->get_fee_transcations(['type' => $switchType, 'type_key' => $switchType] + $where);
                    $this->response('empty_footer', $get->num_rows());
                    $Html .= $this->get_fee_box([
                        'type' => $switchType,
                        'title' => $this->GetConfig($switchType),
                        'fee' => fixConifFee($switchType),
                        'date' => date("d-m-Y"),
                        'index' => $switchType,
                        'added' => $get->num_rows(),
                        'record' => $get->num_rows() ? $get->row() : new stdClass
                    ]);
                    break;
                case 'course_fees':
                    $getStudent = $this->student_model->withEMI()->get_student_via_id($where['student_id']);
                    if ($getStudent->num_rows()) {
                        $row = $getStudent->row();
                        $center_course = $this->center_model->get_assign_courses($center_id, ['course_id' => $course_id]);
                        $course_fees = ($center_course->num_rows()) ? $center_course->row('course_fee') : 0;
                        $admissionDate = $row->admission_date;
                        $totalPaidAmount =
                            $totalDiscount =
                            $totalFee = 0;

                        if ($row->fee_emi !== null) {
                            $getFee = $this->db->select('SUM(amount) as ttl_fee,SUM(discount) as ttl_discount,SUM(payable_amount) as ttl_paid_amount')->where($where + ['type_key' => $this->post('type')])->group_by('student_id')->limit(1)->get('student_fee_transactions');
                            if ($getFee->num_rows()) {
                                $totalFee = $getFee->row()->ttl_fee;
                                $totalDiscount = $getFee->row()->ttl_discount;
                                $totalPaidAmount = $getFee->row()->ttl_paid_amount;
                            }
                            $Html .= '<div class="d-flex flex-wrap">
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fs-1 text-success me-2">' . $inrIcon . '</i>                                    
                                            <div class="fs-2 fw-bold text-success">' . $course_fees . '</div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-600">Course Fee</div>
                                    </div>
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fs-1 text-success me-2">' . $inrIcon . '</i>                                    
                                            <div class="fs-2 fw-bold text-success">' . $totalDiscount . '</div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-600">Total Discount</div>
                                    </div>
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3 ">
                                        <div class="d-flex align-items-center">
                                            <i class="fs-1 text-success me-2">' . $inrIcon . '</i>                                    
                                            <div class="fs-2 fw-bold text-success">' . $totalFee . '</div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-600">Total Paid Fee</div>
                                    </div>
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fs-1 text-danger me-2">' . $inrIcon . '</i>                                    
                                            <div class="fs-2 fw-bold text-danger">' . ($course_fees - $totalFee) . '</div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-600">Remaining Fee</div>
                                    </div>
                                </div>';
                        }

                        if ($row->fee_emi == null) { // POPUP FOR GET EMI OR NOT
                            $this->response('empty_footer', true);
                            $numDur = duration_in_month($row->duration, $row->duration_type);
                            $Html .= '<div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="card border-primary card-image">
                                    <div class="card-header border-primary">
                                        <h3 class="card-title text-dark fs-1"><i class="fa fa-cog me-2 fs-1 text-dark"></i> EMI Setting</h3>
                                    </div>
                                    <div class="card-body pt-2">
                                        <table class="table fs-2">
                                        <tr>
                                            <th colspan="2" class="text-center">' . label($row->center_name, 'info fs-2') . '</th>
                                        </tr>
                                            <tr>
                                                <th>Course Name</th><td>' . $row->course_name . '</td>
                                            </tr>
                                            <tr>
                                                <th>Duration</th><td>' . $row->duration . ' ' . ucwords($row->duration_type) . '</td>
                                            </tr>                                            
                                            <tr>
                                                <th>Course Fees</th><td>' . $course_fees . ' ' . $this->get_data('inr') . '</td>
                                                ' . form_hidden('course_fees', $course_fees) . '
                                            </tr>
                                        </table>
                                        <div class="message text-center">
                                            <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                                <input class="form-check-input h-30px w-60px border border-success check-emi-setup" type="checkbox" name="emi_setup" role="switch" id="flexSwitchCheckDefault">
                                                <label class="form-check-label text-success fs-2 fw-bold" for="flexSwitchCheckDefault">
                                                        Do you want to take this student\'s course fees as an EMIs?
                                                </label>
                                            </div>
                                        </div>
                                        <div class="setup d-none" align="center">
                                            <div class="form-group w-50">
                                                <label class="form-label required">Select Month Count</label>
                                                    <select class="form-control cal-emis" name="emi" data-placeholder="SELECT EMIs" data-control="select2">
                                                        <option></option>
                                                        ';
                            for ($i = 1; $i <= $numDur; $i++)
                                $Html .= '<option value="' . $i . '">' . $i . ' Month EMIs</option>';
                            $Html .= '</select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer flex-stack  d-flex">
                                        <div class="d-flex ">
                                            <div class="fs-3 fw-bold price-container d-none">
                                                EMI price : &nbsp;<b class="emi-amount">0</b> ' . $this->get_data('inr') . ' / Month
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary d-flex next-button">NEXT</button>
                                    </div>
                                </div>
                            </div>
                        ';// 9410435006
                        } else if ($row->fee_emi) {
                            $isEmis = true;
                            $nextEMIs = '';
                            $firstEMIs = '';
                            $emiCount = 0;
                            $paidEMIs = 0;
                            $lastHistory = '';
                            $perMonthFee = round($course_fees / $row->fee_emi);
                            $emi_date = '01-' . date('m-Y', strtotime($admissionDate));
                            $date = DateTime::createFromFormat('d-m-Y', $emi_date);
                            $currentDate = DateTime::createFromFormat('d-m-Y', date('d-m-Y'));
                            for ($i = 1; $i <= $row->fee_emi; $i++) {
                                $check = $this->student_model->get_fee_transcations(['duration' => $i, 'type_key' => 'course_fees'] + $where);
                                $emiDate = $date->format('d-m-Y');
                                $interval = $date->diff($currentDate);
                                $penalty = false;
                                if ($date < $currentDate) {
                                    $isPenalty = $penalty = $interval->days;
                                }
                                $date->modify('+1 month');
                                if ($check->num_rows()) {
                                    $paidEMIs++;
                                    $checkRow = $check->row();
                                    $lastHistory = '<div class="overflow-auto pb-5 mb-2">
                                                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
                                                        <i class="ki-duotone ki-bank ' . (empty($checkRow->description) ? 'fs-2tx' : 'fs-5tx') . ' text-primary me-4"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
    
                                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                                            <div class="mb-3 mb-md-0 fw-semibold">
                                                                <h4 class="text-gray-900 fw-bold">Last Transaction of ' . ordinal_number($i) . ' Month EMI on ' . $checkRow->payment_date . '!</h4>
                
                                                                <div class="fs-6 text-gray-700 pe-7">Amount : ' . $checkRow->amount . ' ' . $inrIcon . ', Discount : ' . $checkRow->discount . ' ' . $inrIcon . ', Paid Amount ' . $checkRow->payable_amount . ' ' . $inrIcon . ' </div>
                                                                <div class="fs-3 text-success">Note : ' . $checkRow->description . '</div>
                                                                </div>
        
                                                            <!--a href="#" class="btn btn-primary px-6 align-self-center text-nowrap"> Proceed</a --->
                                                        </div>
                                                    </div>                
                                                </div>';
                                } else {


                                    $view = $this->get_fee_box([
                                        'type' => 'course_fees',
                                        'title' => ordinal_number($i) . ' Month EMI',
                                        'fee' => $perMonthFee,
                                        'date' => $emiDate,
                                        'index' => $i,
                                        'penalty' => $penalty,
                                        'added' => 0,
                                        'record' => $newSTDClass
                                    ], empty($firstEMIs));
                                    if (empty($firstEMIs) or ($i == $row->fee_emi && empty($nextEMIs))) {
                                        $firstEMIs .= $view;
                                    } else {
                                        $nextEMIs .= $view;
                                    }

                                }
                            }
                            if ($paidEMIs == 0) {
                                $Html .= '<div class="overflow-auto pb-5 mb-2">
                                                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed min-w-lg-600px flex-shrink-0 p-6">
                                                        <i class="ki-duotone ki-notification fs-2tx text-warning me-4"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
    
                                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                                            <div class="mb-3 mb-md-0 fw-semibold">
                                                                <h4 class="text-gray-900 fw-bold">Undo EMIs Setting!</h4>
                
                                                                <div class="fs-6 text-gray-700 pe-7">If you want to change or remove the EMIs setting, Please Clcik Undo Button.</div>
                                                            </div>
        
                                                            <button type="button" class="btn btn-active-warning px-6 align-self-center text-nowrap undo-setting border-dashed border-2 border-warning"> Setting Undo</button>
                                                        </div>
                                                    </div>                
                                                </div>';
                            }
                            $Html .= $lastHistory . "\n" . $firstEMIs;
                            if (!empty($nextEMIs)) {
                                $Html .= '<div class="accordion" id="kt_accordion_1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                            <button class="accordion-button fs-4 fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="true" aria-controls="kt_accordion_1_body_1">
                                                Next EMIs
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                                            <div class="accordion-body">
                                            ' . $nextEMIs . '
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            }
                        } else {
                            if ($totalFee == 0) {
                                $Html .= '<div class="overflow-auto pb-5 mb-2">
                                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed min-w-lg-600px flex-shrink-0 p-6">
                                        <i class="ki-duotone ki-notification fs-2tx text-warning me-4"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>

                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                            <div class="mb-3 mb-md-0 fw-semibold">
                                                <h4 class="text-gray-900 fw-bold">Undo Course Fees Setting!</h4>

                                                <div class="fs-6 text-gray-700 pe-7">If you want to change or remove the Fees setting, Please Clcik Undo Button.</div>
                                            </div>

                                            <button type="button" class="btn btn-active-warning px-6 align-self-center text-nowrap undo-setting border-dashed border-2 border-warning"> Setting Undo</button>
                                        </div>
                                    </div>                
                                </div>';
                            }
                            $type = $index = 'course_fees';


                            $Html .= '<div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="card border-primary card-image my-fee-box">
                                    <div class="card-header border-primary">
                                        <h3 class="card-title text-dark fs-1">' . $inrIcon . ' Collect Course Fee</h3>
                                    </div>
                                    <div class="card-body pt-2">
                                        <h3 class="text-center text-danger">Remaining Fee : ' . ($course_fees - $totalFee) . ' ' . $inrIcon . '</h3>
                                        
                                        <input type="checkbox" name="key_id[]" value="' . $type . '" checked class="check-input d-none">            
                                        <input type="hidden" name="index_key[]" value="' . $type . '">

                                        <div class="form-group mb-2">
                                            <label class="required form-label">Payment Date</label>
                                            <input type="text" class="form-control current-date" name="payment_date[' . $index . ']" value="' . date('d-m-Y') . '" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="required form-label">Amount</label>
                                            <input type="number" class="form-control amount" name="payable_amount[' . $index . ']" value="' . ($course_fees - $totalFee) . '" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Discount</label>
                                            <input type="number" class="form-control discount" name="discount[' . $index . ']" placeholder="Discount" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Note</label>
                                            <textarea class="form-control" placeholder="Note" name="note[' . $index . ']"></textarea>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label class="form-label">Payment Type</label>
                                            <select class="form-select form-control-solid" name="payment_type[' . $index . ']">
                                                <option value="cash">Cash</option>
                                                <option value="online">Online</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }

                    }
                    break;
            }
        } else {
            $this->response('empty_footer', true);
            $Html = '';
        }
        $Html .= '</div>                  
        ';
        $this->response('html', $Html);
        $this->response('status', true);

        $this->response('footer', '<div class="d-flex justify-content-end">
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
                            <div class="fw-semibold pe-10 text-gray-600 fs-7">Total Discount:</div>
                            <!--end::Code-->

                            <!--begin::Label-->
                            <div class="text-end fw-bold fs-6 text-gray-800"> <span class="">₹</span>
                                <b class="ttl-discount">0</b> </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->          
                        '.($isPenalty ? '              
                        <!--begin::Item-->
                        <div class="d-flex flex-stack mb-3">
                            <!--begin::Code-->
                            <div class="fw-semibold pe-10 text-gray-600 fs-7">Total Penalty Amount:</div>
                            <!--end::Code-->

                            <!--begin::Label-->
                            <div class="text-end fw-bold fs-6 text-gray-800"> <span class="">₹</span>
                                <b class="penalty-amount">0</b> </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->' : '').'
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
                            <button class="btn btn-primary pay-now" disabled>Submit Fees</button>
                        </div>
                    </div>
                    <!--end::Section-->
                </div>');
    }
    function setup_student_emis()
    {
        // $this->response('data',$_POST);
        if (
            $this->db->where('id', $_POST['student_id'])->update('students', [
                'fee_emi' => $_POST['emi']
            ])
        ) {
            $this->response('status', true);
        } else
            $this->response('error', 'Something went wrong');
    }
    function sync_fee_data()
    {
        $items = $this->config->item('searching_types');
        unset($items['course_fees']);
        $i = 0;
        foreach ($items as $in => $value) {
            $where = ['key' => $in, 'onlyFor' => 'student'];
            $get = $this->db->where($where)->get('student_fix_payment');
            if ($get->num_rows() == 0) {
                $this->db->insert('student_fix_payment', $where + ['description' => 'One Time', 'amount' => 500, 'title' => $value]);
                $i++;
            }
            $in = $in == 'admission_fees' ? 'student_admission_fees' : $in;
            $where = ['key' => $in, 'onlyFor' => 'center'];
            $get = $this->db->where($where)->get('student_fix_payment');
            if ($get->num_rows() == 0) {
                $this->db->insert('student_fix_payment', $where + ['description' => 'One Time', 'amount' => 500, 'title' => $value]);
                $i++;
            }
        }
        $this->response('status', $i != 0);
    }
}