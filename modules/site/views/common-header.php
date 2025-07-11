<script src="{base_url}assets/jquery-1.12.4.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"
    integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
    integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link href='https://fonts.googleapis.com/css?family=Reem Kufi' rel='stylesheet'>
<style>
    :root {
        --my-theme-color:
            <?= ES('theme_color_value', '#762051') ?>
    }

    body,
    li,
    .title {
        font-family: 'Reem Kufi' !important;
    }

    @media print {
        body * {
            visibility: hidden;
        }

        #printableContent,
        #printableContent * {
            visibility: visible;
            font-size: 20px;
        }

        #printableContent {
            width: 98%;
            position: absolute;
            left: 2%;
            top: 2%
        }
    }
</style>
<script>
    const base_url = '<?= base_url() ?>';
    var AryaCMS = '0.1.3',
        ajax_url = base_url + 'ajax/';
    <?php
    foreach ($this->ki_theme->default_vars() as $var => $var_value) {
        ?>
        const <?= $var ?> = `<?= $var_value ?>`;
        <?php
    }
    ?>
    $(document).ready(function () {
        $('[data-control="select2"]').select2();
    })
</script>
<style>
    .float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 90px;
        right: 15px;
        background-color: #25d366;
        color: #fff;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #565656;
        z-index: 100;
    }

    .my-float {
        margin-top: 16px
    }

    .form-label.required::after {
        content: '*';
        color: red;
        /* font-size: 20px; */
        font-weight: 600;
        padding: 5px;
    }

    .select2 {
        width: 100% !important;
    }

    .card-header.rebel,
    .panel-heading.rebel {
        border-radius: 0;
    }

    .card-header h3 {
        margin: 0 !important;
    }

    .rebel {
        position: relative
    }

    .rebel-inner {
        position: absolute;
        top: 0;
        left: -10px;
        height: 100%;
        background-color: #343a40;
        width: 10px;
        z-index: 999;
        border-radius: 28px 0 0;
    }

    .rebel-inner:before {
        content: "";
        position: absolute;
        border-style: solid;
        border-color: transparent;
        bottom: -10px;
        border-width: 0 10px 10px 0;
        border-right-color: #343a40;
        left: 0;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{base_url}assets/plugins/custom/datatables/datatables.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4@5/bootstrap-4.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.js.iife.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css" />


<script src="{base_url}assets/custom/custom.js"></script>
<?php
if (CHECK_PERMISSION('EBOOK')) {
    echo '<script src="https://checkout.razorpay.com/v1/checkout.js"></script>';
    echo '<script src="{base_url}assets/ebook.js"></script>';
}
if (file_exists(DOCUMENT_PATH . '/config.php'))
    include DOCUMENT_PATH . '/config.php';
?>