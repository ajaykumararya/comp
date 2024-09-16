<div class="row">
    <div class="col-md-6">
        <form action="" class="submit-load-request">
            <div class="{card_class} card-image">
                <div class="card-header">
                    <h3 class="card-title">Add Money Wallet</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Options</span>

                            <span class="ms-1" data-bs-toggle="tooltip" title="Select an option.">
                                <i class="ki-duotone ki-information text-gray-500 fs-7"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span></i>
                            </span>
                        </label>
                        <!--end::Label-->

                        <!--begin::Buttons-->
                        <div class="d-flex flex-stack gap-5 mb-3">
                            <button type="button"
                                class="btn btn-light-primary border border-primary border-dashed w-100"
                                data-kt-docs-advanced-forms="interactive">100</button>
                            <button type="button"
                                class="btn btn-light-primary border border-primary border-dashed w-100"
                                data-kt-docs-advanced-forms="interactive">500</button>
                            <button type="button"
                                class="btn btn-light-primary border border-primary border-dashed w-100"
                                data-kt-docs-advanced-forms="interactive">1000</button>
                        </div>
                        <!--begin::Buttons-->

                        <input type="number" class="form-control amount" placeholder="Enter Amount" name="amount"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Note</label>
                        <textarea name="note" id="" class="form-control"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <?php
                    echo $this->ki_theme->with_icon('plus')->save_button('Load Wallet', '');
                    echo $this->ki_theme->
                        with_icon('eye', 3)
                        ->set_class('hover-rotate-start m-3')
                        ->outline_dashed_style('danger')
                        ->add_action('History', 'admin/wallet-history');
                    ?>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <div class="card card-flush h-xl-100 card-image {card_class}">
            <div class="card-header pt-5">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-900">Latest Transactions</span>
                    <span class="text-gray-500 mt-1 fw-semibold fs-6">Only 7 days transactions are listed here</span>
                </h3>
                <!--end::Title-->
            </div>
            <div class="card-body">
                <?php
                $sevenDaysAgo = date('Y-m-d H:i:s', strtotime('-7 days'));
                $get = $this->db->where('timestamp >=', $sevenDaysAgo)->where([
                    'user_type' => 'center',
                    'user_id' => $owner_id
                ])->order_by('update_time', 'DESC')->get('transactions');
                // echo $this->db->last_query();
                if ($get->num_rows()) {

                    foreach ($get->result() as $row) {
                        $color = 'danger';
                        $icon = 'cross';
                        $not = 'not';
                        if ($row->payment_status) {
                            $color = 'success';
                            $icon = 'check';
                            $not = '';
                        }
                        ?>
                        <div class="overflow-auto pb-5 mb-2">
                            <div
                                class="notice d-flex bg-light-<?= $color ?> rounded border-<?= $color ?> border border-dashed flex-shrink-0 p-6">
                                <?php
                                echo $this->ki_theme->keen_icon($icon . '-circle text-' . $color, 2, '2tx', 'duotone');
                                ?>
                                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                    <div class="mb-3 mb-md-0 fw-semibold">
                                        <h4 class="text-gray-900 fw-bold"><?= $row->amount ?>         <?= $inr ?>, Payment <?= $not ?>
                                            done.
                                        </h4>

                                        <div class="fs-6 text-gray-700 pe-7">
                                            <i class="fa fa-clock"></i> <?= timeAgo($row->update_time) ?>
                                            <?php
                                            if (!$row->payment_status) {
                                                try {
                                                    $this->razorpay->fetchOrderStatus($row->order_id);
                                                } catch (Exception $e) {
                                                    echo '<br>' . '<span class="text-danger">' . $e->getMessage() . '</span>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div>
                                        <?php
                                        if (!$row->payment_status) {
                                            echo '<button type="button" data-id="' . $row->id . '"
                                    class="btn btn-active-danger px-6 align-self-center text-nowrap try-again-payment border-dashed border-2 border-danger">
                                    Try Again</button>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>