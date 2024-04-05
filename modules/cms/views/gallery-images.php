<div class="row">
    <div class="col-md-12">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">Image Gallery</h3>
            </div>
            <div class="card-body">
                <!--begin::Form-->
                <form class="form" action="#" method="post">
                    <!--begin::Input group-->
                    <div class="form-group row">
                        <!--begin::Label-->
                        <label class="col-lg-2 col-form-label text-lg-right">Upload Files:</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-10">
                            <!--begin::Dropzone-->
                            <div class="dropzone dropzone-queue mb-2" id="kt_dropzonejs_example_3">
                                <!--begin::Controls-->
                                <div class="dropzone-panel mb-lg-0 mb-2">
                                    <a class="dropzone-select btn btn-sm btn-primary me-2">Attach files</a>
                                    <a class="dropzone-remove-all btn btn-sm btn-light-primary">Remove All</a>
                                </div>
                                <!--end::Controls-->

                                <!--begin::Items-->
                                <div class="dropzone-items wm-200px">
                                    <div class="dropzone-item" style="display:none">
                                        <!--begin::File-->
                                        <div class="dropzone-file">
                                            <div class="dropzone-filename" title="some_image_file_name.jpg">
                                                <span data-dz-name>some_image_file_name.jpg</span>
                                                <strong>(<span data-dz-size>340kb</span>)</strong>
                                            </div>

                                            <div class="dropzone-error" data-dz-errormessage></div>
                                        </div>
                                        <!--end::File-->

                                        <!--begin::Progress-->
                                        <div class="dropzone-progress">
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"
                                                    data-dz-uploadprogress>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Progress-->

                                        <!--begin::Toolbar-->
                                        <div class="dropzone-toolbar">
                                            <span class="dropzone-delete" data-dz-remove><i
                                                    class="bi bi-x fs-1"></i></span>
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Dropzone-->

                            <!--begin::Hint-->
                            <span class="form-text text-muted">Max file size is 2MB and max number of files is
                                5.</span>
                            <!--end::Hint-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-5">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Images</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="list-images">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script id="formTemplate" type="text/x-handlebars-template">
    <input type="hidden" name="id" value="{{id}}">
    <div class="form-group">
        <label class="form-label required">Enter Title</label>
        <input type="text" name="title" value="{{title}}" class="form-control" placeholder="Enter Title">
    </div>
</script>