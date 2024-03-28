<div class="row">
    <form action="" class="change-password">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">Change Password</h3>
            </div>
            <div class="card-body  row">
                <div class="form-group col-md-4">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="text" name="current_password" placeholder="Enter Current Password" class="form-control">
                </div>
                <div class="fv-row col-md-4  mb-8 fv-plugins-icon-container" data-kt-password-meter="true">
                    <label for="" class="form-label">Enter Password</label>
                    <!--begin::Wrapper-->
                    <div class="mb-1">
                        <!--begin::Input wrapper-->
                        <div class="position-relative mb-3">
                            <input class="form-control bg-transparent" type="password" placeholder="Password"
                                name="password" autocomplete="off">

                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                data-kt-password-meter-control="visibility">
                                <i class="ki-duotone ki-eye-slash fs-2"></i> <i
                                    class="ki-duotone ki-eye fs-2 d-none"></i> </span>
                        </div>
                        <!--end::Input wrapper-->

                        <!--begin::Meter-->
                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                        <!--end::Meter-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Hint-->
                    <div class="text-muted">
                        Use 8 or more characters with a mix of letters, numbers &amp; symbols.
                    </div>
                    <!--end::Hint-->
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    </div>
                </div>
                <div class="fv-row  col-md-4 mb-8 fv-plugins-icon-container">
                    <label for="" class="form-label">Enter Repeat Password</label>
                    <!--begin::Repeat Password-->
                    <input type="password" placeholder="Repeat Password" name="confirm-password" autocomplete="off"
                        class="form-control bg-transparent">
                    <!--end::Repeat Password-->
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                {save_button}
            </div>
        </div>
    </form>
</div>