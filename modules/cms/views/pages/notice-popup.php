<?php
$popupTitle = ES('home_page_alert_popup_title');
$popupStatus = ES('home_page_alert_popup_status', false);
$popupDescription = ES('home_page_alert_popup_description');
if ($popupStatus):
    ?>
    <style>
        #ApplynowModal button.close {
            position: absolute;
            right: 15px;
            top: 15px;
            border: 2px solid #555;
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }

        #ApplynowModal .notice {
            border: 1px solid #555;
            border-radius: 16px;
            padding: 21px 19px 42px;
            position: relative;
        }
    </style>
    <div class="modal fade" id="ApplynowModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <!-- Modal body -->
                <div class="modal-body " style="padding:3rem!important">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="notice mb-0 abt-box text-center">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <div class="title mb-3 text-center">
                                    <h2 class="text-danger text-underline"><?= $popupTitle ?></h2>
                                </div>
                                <?= $popupDescription ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#ApplynowModal").modal('show');
            $('#ApplynowModal').on('hidden.bs.modal', function () {
                $("#ApplynowModal2").modal('show');
            });
        });
    </script>
    <?php
endif;

?>