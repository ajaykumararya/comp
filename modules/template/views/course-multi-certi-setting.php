<label class="d-flex flex-stack cursor-pointer mb-5">
    <!--begin:Label-->
    <span class="d-flex align-items-center me-2">
        <!--begin:Icon-->
        <span class="symbol symbol-50px me-6">
            <span class="symbol-label bg-light-warning">
                <span class="fs-2x text-warning">
                    D
                </span>
            </span>
        </span>
        <!--end:Icon-->

        <!--begin:Info-->
        <span class="d-flex flex-column">
            <span class="fw-bold fs-6 text-capitalize course-name">
                Default Certificates
            </span>

            <span class="fs-7 text-muted text-capitalize course-duration">
                No Previews
            </span>
        </span>
        <!--end:Info-->
    </span>
    <!--end:Label-->

    <div class="form-check form-switch form-check-custom form-check-solid">
        <?php
        $checked = $parent_id == 0 ? 'checked' : '';
        ?>
        <input <?= $checked ?> class="form-check-input set-course-parent-certi" type="radio" name="c" value="0"
            data-id="<?= $id ?>" id="flexSwitchDefault" />
    </div>
</label>

<?php
$certies = $this->ki_theme->config('extra_documents');
if ($certies) {
    foreach ($certies as $key => $value) {
        $title = $value['title'];
        $checked = $parent_id == $key ? 'checked' : '';
        $counts = sizeof($value['files']);
        echo '<label class="d-flex flex-stack cursor-pointer mb-5">
                <!--begin:Label-->
                <span class="d-flex align-items-center me-2">
                    <!--begin:Icon-->
                    <span class="symbol symbol-50px me-6">
                        <span class="symbol-label bg-light-warning">
                            <span class="fs-2x text-warning">
                                ' . get_first_latter($title) . '
                            </span>
                        </span>
                    </span>
                    <!--end:Icon-->

                    <!--begin:Info-->
                    <span class="d-flex flex-column">
                        <span class="fw-bold fs-6 text-capitalize course-name">
                            ' . $title . '
                        </span>
                        ';
        if ($counts > 0) {
            foreach ($value['files'] as $data) {
                echo '
                                <span class="fs-7 text-muted text-capitalize course-duration">
                                ' . $data['name'] . '
                                </span>';
            }
        } else {
            echo '
                            <span class="fs-7 text-muted text-capitalize course-duration">
                            Files Not Available.
                            </span>';
        }
        echo '
                    </span>
                    <!--end:Info-->
                </span>
                <!--end:Label-->

                <div class="form-check form-switch form-check-custom form-check-solid">
                
                    <input ' . $checked . ' class="form-check-input set-course-parent-certi" type="radio"
                        value="'.$key.'" data-id="' . $id . '" id="flexSwitchDefault" name="c"/>
                </div>
            </label>';
    }
}


?>