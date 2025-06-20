<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{institute_name} Certificate</title>
    {basic_header_link}
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;

            font-weight: bold;
        }

        .text-capitlize {
            text-transform: capitalize;
        }

        .position-relative {
            position: relative;
        }

        .position-absolute {
            position: absolute;
        }

        .w-100 {
            width: 100%;
            display: grid;
        }

        span {
            font-weight: bold;
            color: #1a4891;
            font-size: 14px;
            display: inline-block;
        }

        #photo1 {
            z-index: 999;
            top: 44.5rem;
            right: 12rem;
            width: 120px !important;
            height: 95px;
        }

        #photo {
            z-index: 999;
            top: 48.3%;
            left: 80.3%;
        }

        .middle-div {
            margin-left: 21.2rem;
        }

        .test {
            border: 1px solid red
        }

        #center_signature {
            z-index: 999;
            top: 44.5rem;
            left: 13rem;
            width: 120px !important;
            height: 95px;
        }

        p {
            /* font-size: 20px; */
        }
    </style>
</head>
<?php
$this->mypdf->addPage('L');
?>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/franchise-certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:114px;height:145px;border:2px solid #017ba4">
    </div>
    <p class="position-absolute " style="top:42.5%;left:20%;width:700px;text-align:center">{institute_name}</p>
    <p class="position-absolute" style="top:46.5%;left:25%;">{name}</p>
    <p class="position-absolute" style="top:50.5%;left:25%;">{city}, &nbsp;{state}</p>
    <p class="position-absolute" style="top:54.5%;left:25%;">{center_number}</p>
    <p class="position-absolute" style="top:58.5%;left:25%;">{certificate_issue_date}</p>
    <p class="position-absolute" style="top:62.5%;left:25%;">{valid_upto}</p>
    <?php
    $this->ki_theme->generate_qr($id, 'franchise_certificate', current_url());
    ?>
    <div class="position-absolute" style="top:79.4%;left:46.9%">
        <img src="upload/images/franchise_certificate_{id}.png" style="width:63px">
    </div>

</body>

</html>