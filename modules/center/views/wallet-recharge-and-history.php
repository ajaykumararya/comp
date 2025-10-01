<div class="row g-7">

    <!--begin::Search-->
    <div class="col-lg-6 col-xl-3">
        <!--begin::Contacts-->
        <div class="card card-flush" id="kt_contacts_list">
            <!--begin::Card header-->
            <div class="card-header pt-7" id="kt_contacts_list_header">
                <!--begin::Form-->
                <form class="d-flex align-items-center position-relative w-100 m-0" autocomplete="off">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                        <span class="path1"></span><span class="path2"></span>
                    </i> <!--end::Icon-->

                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid ps-13" name="search" value=""
                        placeholder="Search contacts">
                    <!--end::Input-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-5" id="kt_contacts_list_body">
                <!--begin::List-->
                <div class="scroll-y me-n5 pe-5 h-300px h-xl-auto" data-kt-scroll="true"
                    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                    data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_contacts_list_header"
                    data-kt-scroll-wrappers="#kt_content, #kt_contacts_list_body"
                    data-kt-scroll-stretch="#kt_contacts_list, #kt_contacts_main" data-kt-scroll-offset="5px"
                    style="max-height: 571px;">

                    <!--begin::User-->
                    <div class="d-flex flex-stack py-4">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol  symbol-40px symbol-circle "><img alt="Pic"
                                    src="/metronic8/demo1/assets/media/avatars/300-6.jpg"></div><!--end::Avatar-->
                            <!--begin::Details-->
                            <div class="ms-4">
                                <a href="/metronic8/demo1/apps/contacts/view-contact.html"
                                    class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Emma Smith</a>
                                <div class="fw-semibold fs-7 text-muted">smith@kpmg.com</div>
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::Details-->
                    </div>
                    <!--end::User-->



                </div>
                <!--end::List-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Contacts-->
    </div>
    <!--end::Search-->

    <!--begin::Content-->
    <div class="col-xl-9">

        <!--begin::Card-->
        <div class="card card-flush h-lg-100" id="kt_contacts_main">
            <!--begin::Card body-->
            <div class="card-body p-0">
                <!--begin::Wrapper-->
                <div class="card-px text-center py-20 my-10">
                    <!--begin::Title-->
                    <h2 class="fs-2x fw-bold mb-10">Welcome to the Wallet Page</h2>
                    <!--end::Title-->

                    <!--begin::Description-->
                    <p class="text-gray-500 fs-4 fw-semibold mb-10">
                        This page allows you to manage your center wallet. <br>
                        You can view balance, recharge the wallet, and track deductions easily.
                    </p>
                    <!--end::Description-->

                </div>
                <!--end::Wrapper-->

                <!--begin::Illustration-->
                <div class="text-center px-4">
                    <img class="mw-100 mh-300px" alt=""
                        src="{base_url}assets/media/illustrations/sketchy-1/5.png">
                </div>
                <!--end::Illustration-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->

    </div>
    <!--end::Content-->
</div>