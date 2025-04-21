<div class="row">
    <div class="col-md-6">
        <form action="" class="extra-setting" data-page_load="true">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Header Setting</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <?php
                        $index = ES('website_header_index', 1);
                        ?>
                        <label for="" class="form-label">Header Type(s)</label>
                        <select class="form-select change-img" name="website_header_index">
                            <option value="1" <?= $index == 1 ? 'selected' : '' ?> data-title="Right Side Menu in Header"
                                data-src="{theme_url}assets/images/header-1.jpg">Right Side Menu in Header</option>
                            <option value="2" <?= $index == 2 ? 'selected' : '' ?> data-title="Vertical Menu Header"
                                data-src="{theme_url}assets/images/header-2.jpg">Vertical Menu Header</option>
                        </select>
                    </div>

                    <!--begin::Preview-->
                    <strong
                        class="mt-4 preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                        <!--begin::Title-->

                        <!--end::Thumbnail-->
                    </strong>
                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <?php
        if ($index == 2):
            $data_index = 'topbarlinks';
            ?>
            <form action="" class="extra-setting-form">
                <div class="{card_class}">
                    <div class="card-header">
                        <h3 class="card-title">
                                Topbar Links ( Vertical Menu Header)
                        </h3>
                    </div>
                    <div class="card-body field-area p-3" data-index="<?= $data_index ?>">
                        <?php
                        $fields = $this->SiteModel->get_setting($data_index, '', true);
                        if ($fields) {
                            foreach ($fields as $value) {
                                $my_index = $value->title;
                                $value = $value->link;
                                echo '<div class="form-group position-relative mb-4">
                                            <input type="text" name="title[]" placeholder="Enter Title" class="form-control border border-primary border-bottom-0 br-none p-2" value="' . $my_index . '">
                                               <input type="text" name="value[]" placeholder="Enter Value" class="form-control border border-primary border-bottom-0 br-none p-2" autocomplete="off" value="' . $value . '">
                                            <a href="javascript:;" class="btn border-1 border-danger border btn-light-danger h-25px lh-0 w-100 br-none p-2"><i class="ki-outline ki-trash"></i> Delete</a>
                                        </div>';
                            }
                        }
                        ?>
                    </div>
                    <div class="card-footer">
                        {save_button}
                        <button type="button" class="btn btn-light-primary add-new-field"><i class="ki-outline ki-plus"></i>
                            Add new Link</button>
                    </div>
                </div>
            </form>
            <?php
        endif;
        ?>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.change-img').on('change', function () {
            var selectedValue = $(this).val();
            // alert(selectedValue)

            var selectedTitle = $(this).find('option:selected').data('title');
            var selectImage = $(this).find('option:selected').data('src');

            $('.preview-thumbnail').html(`
            <h3 class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4 title--">
                            ${selectedTitle} </h3>
                        <!--end::Title-->

                        <!--begin::Thumbnail-->
                        <span style="height:128px"
                            class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 overflow-hidden">
                            <img src="${selectImage}"
                                data-src="${selectImage}"
                                class="lozad w-100 rounded" alt="" data-loaded="true" >
                        </span>`);
            // $('.app-prebuilts-thumbnail').find('img').attr('src',selectImage);
            // $('.title--').text(selectedTitle);
        });
        $('.change-img').trigger('change');
    });
</script>