<!--begin::Form-->
{form}
<?php
$list = $this->SiteModel->get_contents($type);
$slugs = ['categories'];
if ($list->num_rows()) {
    foreach ($list->result() as $row) {
        $slugs[] = $row->field7;
    }
}
?>
<script>const reservedSlugs = <?= json_encode($slugs) ?>;</script>
<div class="form d-flex flex-column flex-lg-row">
    <!--begin::Aside column-->
    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <!--begin::Thumbnail settings-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Image</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body text-center pt-0">
                <!--begin::Image input-->
                <!--begin::Image input placeholder-->
                <style>
                    .image-input-placeholder {
                        background-image: url('{base_url}assets/media/svg/files/blank-image.svg');
                    }

                    [data-bs-theme="dark"] .image-input-placeholder {
                        background-image: url('{base_url}assets/media/svg/files/blank-image-dark.svg');
                    }
                </style>
                <!--end::Image input placeholder-->

                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                    data-kt-image-input="true">
                    <!--begin::Preview existing product_thumb-->
                    <div class="image-input-wrapper w-150px h-150px" style="background-size:100% 100%"></div>
                    <!--end::Preview existing product_thumb-->

                    <!--begin::Label-->
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change product thumb">
                        <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
                        <!--begin::Inputs-->
                        <input type="file" name="field1" accept=".png, .jpg, .jpeg" />
                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->

                    <!--begin::Cancel-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel product thumb">
                        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                    </span>
                    <!--end::Cancel-->

                    <!--begin::Remove-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove product thumb">
                        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                    </span>
                    <!--end::Remove-->
                </div>
                <!--end::Image input-->

                <!--begin::Description-->
                <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files
                    are accepted</div>
                <!--end::Description-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Thumbnail settings-->

        <!--begin::Category & tags-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Blog Details</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Input group-->
                <!--begin::Label-->
                <label class="form-label">Categories</label>
                <!--end::Label-->

                <!--begin::Select2-->
                <select class="form-select mb-2" name="field3" data-control="select2"
                    data-placeholder="Select Category">
                    <option></option>
                    <?php
                    $categories = $this->SiteModel->get_contents('blog_category');
                    if ($categories->num_rows()) {
                        foreach ($categories->result() as $category) {
                            echo '<option value="' . $category->id . '">' . $category->field1 . '</option>';
                        }
                    }
                    ?>
                </select>
                <!--end::Select2-->

                <!--begin::Description-->
                <div class="text-muted fs-7 mb-3">Add product to a category.</div>
                <!--end::Description-->
                <!--end::Input group-->

                <!--begin::Button-->
                <a href="{base_url}static-page/blog-category" class="btn btn-light-primary btn-sm mb-10">
                    <i class="ki-duotone ki-plus fs-2"></i> Create new category
                </a>
                <!--end::Button-->

                <!--begin::Input group-->
                <!--begin::Label-->
                <label class="form-label required d-block">Author Name</label>
                <!--end::Label-->

                <!--begin::Input-->
                <input name="field6" placeholder="Author Name" class="form-control mb-2" value="" required />
                <!--end::Input-->

                <!--begin::Description-->
                <!--<div class="text-muted fs-7">Add tags to a product.</div>-->
                <!--end::Description-->
                <!--end::Input group-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Category & tags-->

        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="form-group">
                    <label class="form-label required">Publish Date</label>
                    <input type="text" name="field8" class="form-control selectdate" placeholder="Select Publish Date"
                        required value="<?= date('d-m-Y') ?>">
                </div>
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-5">
                <!--begin::Button-->
                <!--<a href="products.html" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">-->
                <!--    Cancel-->
                <!--</a>-->
                <!--end::Button-->

                <!--begin::Button-->
                <button type="submit" id="submitbtn" class="btn btn-primary">
                    <span class="indicator-label">
                        Save Changes
                    </span>
                    <span class="indicator-progress">
                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                </button>
                <!--end::Button-->
            </div>
        </div>
    </div>
    <!--end::Aside column-->

    <!--begin::Main column-->
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

        <!--begin::Tab content-->
        <div class="tab-content">
            <!--begin::Tab pane-->
            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">

                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Title</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" name="field2" class="form-control mb-2" placeholder="Blog Title"
                                    value="" required="" id="title" />
                                <input type="hidden" name="field7" id="slug">
                                <label class="text-warning" id="slugPreview"></label>
                                <!--end::Input-->

                                <!--begin::Description-->
                                <div class="text-muted fs-7">A Blog Title is required and recommended to be unique.
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="form-label required">Short Description</label>
                                <!--end::Label-->

                                <!--begin::Editor-->
                                <textarea id="kt_ecommerce_add_product_description" name="field4"
                                    class="form-control mb-2" required></textarea>
                                <!--end::Editor-->

                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a description to the Blog for better visibility.
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->
                    <!--begin::Media-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Main Content</h2>
                            </div>
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="fv-row mb-2">
                                <textarea class="aryaeditor" name="field5"></textarea>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the Blog Main Content.</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Media-->

                </div>
            </div>
            <!--end::Tab pane-->


        </div>
        <!--end::Tab content-->

    </div>
</div>
<!--end::Main column-->
</form>
<!--end::Form-->

<script>
    const titleEl = document.getElementById('title');
    const slugEl = document.getElementById('slug');         // hidden input
    const previewEl = document.getElementById('slugPreview');
    const btn = document.getElementById('submitbtn');
    function slugify(str) {
        if (!str) return '';
        str = str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
        str = str.replace(/\s+/g, '-');
        try {
            str = str.replace(/[^\p{L}\p{N}\-]+/gu, '');
        } catch (e) {
            str = str.replace(/[^A-Za-z0-9\-]+/g, '');
        }
        str = str.replace(/\-+/g, '-').replace(/^\-+|\-+$/g, '').toLowerCase();
        return str;
    }

    titleEl.addEventListener('input', () => {
        const title = titleEl.value;
        const slug = slugify(title);

        if (reservedSlugs.includes(slug)) {
            slugEl.value = ""; // hidden input खाली कर दिया
            previewEl.innerHTML = `<span class="error">❌ "${slug}" reserved है, दूसरा नाम चुनें</span>`
            btn.style.display = 'none';
        } else {
            slugEl.value = slug;
            previewEl.textContent = `{base_url}blog/${slug}` || '—';
            btn.style.display = 'block';
        }
    });
</script>