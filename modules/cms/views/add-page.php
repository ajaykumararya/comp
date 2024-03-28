<input type="hidden" id="all-methods" value='<?= json_encode($this->ki_theme->modules_and_pages()) ?>'>
<form class="row " method="post" id="page_form">
    <div class="col-md-7">
        <div class="card shadow mb-5">
            <div class="card-header">
                <!--begin::Title-->
                <div class="card-title pulse pulse-primary">
                    <span class="pulse-ring"></span>
                    <i class="ki-duotone ki-add-files fs-1"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span></i>

                    &nbsp;
                    <h3> Add New Page</h3>
                </div>
                <!--end::Title-->
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" name="page_name" class="form-control" placeholder="Enter Page Name">
                </div>
                <div class="form-group all-div">
                    <input type="text" name="link" placeholder="Enter Slug" class="form-control mt-5"
                        autocomplete="off">
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-5">
        <div class="mb-3 text-center card main-card shadow">
            <div class="card-header p-8">
                {publish_button}
            </div>
            <div class="card-body">
                <!--begin::Options-->
                <div class="d-flex flex-stack gap-3 mw-lg-600px" data-kt-buttons="true"
                    data-kt-buttons-target=".form-check-image,.form-check-input">
                    <!--begin::Option-->
                    <label class="form-check-image form-check-success w-100 parent-active parent-hover active">
                        <!--begin::Image-->
                        <div class="form-check-wrapper d-flex flex-center border-gray-200 border-2 mb-0 py-3 px-4">
                            <i
                                class="ki-duotone ki-picture fs-1 text-gray-500 parent-active-gray-700 parent-hover-gray-700"><span
                                    class="path1"></span><span class="path2"></span></i>
                            <span
                                class="fs-7 fw-semibold ms-2 text-gray-500 parent-active-gray-700 parent-hover-gray-700">Content</span>
                        </div>
                        <!--end::Image-->
                        <!--begin::Check-->
                        <div style="visibility: hidden; height: 0 !important; width: 0 !importnat; overflow:hidden">
                            <input class="form-check-input page_type" type="radio" value="content" checked
                                name="page_type" />
                        </div>
                        <!--end::Check-->
                    </label>
                    <!--end::Option-->
                    <!--begin::Option-->
                    <label class="form-check-image form-check-success w-100 parent-active parent-hover ">
                        <!--begin::Image-->
                        <div class="form-check-wrapper d-flex flex-center border-gray-200 border-2 mb-0 py-3 px-4">
                            <i
                                class="ki-outline ki-abstract-49 fs-1 text-gray-500 parent-active-gray-700 parent-hover-gray-700"></i>
                            <span
                                class="fs-7 fw-semibold ms-2 text-gray-500 parent-active-gray-700 parent-hover-gray-700">Custom
                                Link</span>
                        </div>
                        <!--end::Image-->
                        <!--begin::Check-->
                        <div style="visibility: hidden; height: 0 !important; width: 0 !importnat; overflow:hidden">
                            <input class="form-check-input page_type" type="radio" value="link" name="page_type" />
                        </div>
                        <!--end::Check-->
                    </label>
                    <!--end::Option-->
                </div>
                <!--end::Options-->
                <!--begin::Check-->
                <div class="form-check form-check-custom form-check-solid form-check-success form-switch mt-5 ml-6">
                    <input class="form-check-input w-45px h-30px" type="checkbox" name="isMenu"
                        id="kt_builder_sidebar_fixed_desktop1" checked>
                    <!--begin::Label-->
                    <label class="form-check-label text-gray-700 fw-bold fs-1"
                        for="kt_builder_sidebar_fixed_desktop1">List in Menu</label>
                    <!--end::Label-->
                </div>
                <!--end::Check-->
                <!--begin::Check-->
                <div class="form-check form-check-custom form-check-solid form-check-success form-switch mt-5 ml-6">
                    <input class="form-check-input w-45px h-30px" type="checkbox" name="redirection"
                        id="kt_builder_sidebar_fixed_desktop">
                    <!--begin::Label-->
                    <label class="form-check-label text-gray-700 fw-bold fs-1"
                        for="kt_builder_sidebar_fixed_desktop">Redirect A
                        New Page</label>
                    <!--end::Label-->
                </div>
                <!--end::Check-->
            </div>
        </div>

    </div>
</form>