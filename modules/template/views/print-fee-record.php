<div class="d-flex flex-column flex-xl-row">
    <link href="{base_url}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css">
    <link href="{base_url}assets/css/style.bundle.css" rel="stylesheet" type="text/css">

    <!--begin::Content-->
    <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
        <!--begin::Invoice 2 content-->
        <div class="mt-n1">
            <!--begin::Top-->
            <div class="d-flex flex-stack pb-10">
                <!--begin::Logo-->
                <a href="#">
                    <img alt="Logo" src="{base_url}upload/{logo}" style="height:87px">
                </a>
                <!--end::Logo-->

                <!--begin::Action-->
                <button class="btn btn-sm btn-success">Print</button>
                <!--end::Action-->
            </div>
            <!--end::Top-->

            <!--begin::Wrapper-->
            <div class="m-0">
                <!--begin::Label-->

                <!--end::Label-->

                <!--begin::Row-->
                <div class="row g-5 mb-11">
                    <!--end::Col-->
                    <div class="col-sm-6">
                        <div class="fw-bold fs-3 text-gray-800 mb-8">Trancation ID #{payment_id}</div>
                    </div>
                    <!--end::Col-->

                    <!--end::Col-->
                    <div class="col-sm-6">
                        <!--end::Label-->
                        <div class="fw-semibold fs-7 text-gray-600 mb-1">Date:</div>

                        <div class="fw-bold fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                            <span class="pe-2">{payment_date}</span>
                        </div>
                        <!--end::Label-->

                        <!--end::Info
                        <div class="fw-bold fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                            <span class="pe-2">02 May 2021</span>

                            <span class="fs-7 text-danger d-flex align-items-center">
                                <span class="bullet bullet-dot bg-danger me-2"></span>

                                Due in 7 days
                            </span>
                        </div>
                        end::Info-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->

                <!--begin::Row-->
                <div class="row g-5 mb-12">
                    <!--end::Col-->
                    <div class="col-sm-6">
                        <!--end::Label-->
                        <div class="fw-semibold fs-7 text-gray-600 mb-1">Issue For:</div>
                        <!--end::Label-->

                        <!--end::Text-->
                        <div class="fw-bold fs-6 text-gray-800">{student_name}</div>
                        <!--end::Text-->

                        <!--end::Description-->
                        <div class="fw-semibold fs-7 text-gray-600">
                            {address}
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Col-->

                    <!--end::Col-->
                    <div class="col-sm-6">
                        <!--end::Label-->
                        <div class="fw-semibold fs-7 text-gray-600 mb-1">Issued By:</div>
                        <!--end::Label-->

                        <!--end::Text-->
                        <div class="fw-bold fs-6 text-gray-800">{center_name}</div>
                        <!--end::Text-->

                        <!--end::Description-->
                        <div class="fw-semibold fs-7 text-gray-600">
                            {center_full_address}
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->


                <!--begin::Content-->
                <div class="flex-grow-1">
                    <!--begin::Table-->
                    <div class="table-responsive border-bottom mb-9">
                        <table class="table mb-3">
                            <thead>
                                <tr class="border-bottom fs-6 fw-bold text-muted">
                                    <th class="min-w-80px text-end pb-2">Month</th>
                                    <th class="min-w-70px text-end pb-2">Type</th>
                                    <th class="min-w-80px text-end pb-2">Amount</th>
                                    <th class="min-w-100px text-end pb-2">Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $discount = 0;
                                $ttl = 0;
                                $subttl = 0;
                                foreach ($record as $row) {

                                    echo '<tr class="fw-bold text-gray-700 fs-5 text-end">
                                    
                                            <td class="pt-6">' . ucwords(str_replace('_', ' ', $row['type'])) . '</td>
                                            <td class="text-capitalize pt-6">' . $row['payment_type'] . '</td>
                                            <td class="pt-6">{inr} ' . $row['amount'] . '
                                            ';
                                    if ($row['discount']) {
                                        $discount += $row['discount'];
                                        echo '<br> <span class="text-danger fs-7">( Discount : {inr} ' . $row['discount'] . ')</span>';
                                    }
                                    $ttl += $row['amount'];
                                    $subttl += $row['payable_amount'];
                                    echo '
                                            
                                            </td>
                                            <td class="pt-6 text-gray-900 fw-bolder">{inr} ' . $row['payable_amount'] . '</td>
                                        </tr>';

                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->

                    <!--begin::Container-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Section-->
                        <div class="mw-600px">
                            <?php
                            /*
                            <!--begin::Item-->
                            <div class="d-flex flex-stack mb-3">
                                <!--begin::Accountname-->
                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Outstanding Amount</div>
                                <!--end::Accountname-->

                                <!--begin::Label-->
                                <div class="text-end fw-bold fs-6 text-gray-800">{inr}
                                    <?php
                                   
                                    $ttlOutStandingAmount = $this->student_model->total_course_fee($institute_id,$course_id);
                                    echo $ttlOutStandingAmount ;
                                    ?>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                            */
                            ?>
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Accountname-->
                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Total Payable Amount:</div>
                                <!--end::Accountname-->

                                <!--begin::Label-->
                                <div class="text-end fw-bold fs-6 text-gray-800">{inr}
                                    <?= ($subttl + $discount) ?>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                            <?php
                            if ($discount):
                                ?>
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Accountname-->
                                    <div class="fw-semibold pe-10 text-gray-600 fs-7">Discount Amount:</div>
                                    <!--end::Accountname-->

                                    <!--begin::Label-->
                                    <div class="text-end fw-bold fs-6 text-gray-800">{inr}
                                        <?= $discount ?>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Accountnumber-->
                                    <div class="fw-semibold pe-10 text-gray-600 fs-7">Total Fess - Less Dis:</div>
                                    <!--end::Accountnumber-->

                                    <!--begin::Number-->
                                    <div class="text-end fw-bold fs-6 text-gray-800">{inr}
                                        <?= ($subttl) ?>
                                    </div>
                                    <!--end::Number-->
                                </div>
                                <!--end::Item-->
                                <?php
                            endif;
                            ?>
                            <!--begin::Item-->
                            <div class="d-flex flex-stack mb-3">
                                <!--begin::Code-->
                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Total Paid Amount:</div>
                                <!--end::Code-->

                                <!--begin::Label-->
                                <div class="text-end fw-bold fs-6 text-gray-800">{inr}
                                    <?= ($subttl) ?>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                            <?php
                            /*
                            <!--begin::Item-->
                            <div class="d-flex flex-stack mb-3">
                                <!--begin::Accountname-->
                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Remaining Amount</div>
                                <!--end::Accountname-->

                                <!--begin::Label-->
                                <div class="text-end fw-bold fs-6 text-gray-800">{inr}
                                    <?php
                                    $dataAmount = $this->student_model->get_fee_transcations_ttl([
                                        'student_id' => $student_id,
                                        'course_id' => $course_id
                                    ]);
                                    
                                    $ttlOutStandingAmount = $ttlOutStandingAmount - ($dataAmount['ttl_fee'] + $dataAmount['ttl_discount']);
                                    echo $ttlOutStandingAmount;
                                    ?>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                            <?php
                            */
                            ?>
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Invoice 2 content-->
    </div>
    <!--end::Content-->
</div>