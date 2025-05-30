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
            font-size: 19px;
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
            top: 17.65rem;
            left: 76.47%;
            width: 120px !important;
            height: 95px;
        }

        #photo {
            z-index: 999;
            bottom: 13%;
            left: 26.95rem;
            width: 94px;
        }

        .middle-div {
            margin-left: 14rem;
        }

        .test {
            border: 1px solid red
        }
        #center_signature{
            z-index: 999;
            top: 33.7rem;
            left: 12rem;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/franchise-certificate.jpg">
    <?php
    $this->ki_theme->generate_qr($id, 'franchise_certificate', current_url());
    ?>
    <div class="position-absolute" id="photo">
        <img src="upload/images/franchise_certificate_{id}.png">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:109px;height:141px">
    </div>
    <div class="position-absolute" style="top:39.5%;left:10%;width:76%;text-align:center;text-transform:capitalize">{institute_name}</div>

    <div class="position-absolute" style="top:44%;left:27%;">{name}</div>
    <div class="position-absolute" style="top:50.7%;left:27%;">{center_number}</div>
    <div class="position-absolute" style="top:47.5%;left:27%;">{city}, &nbsp;{state}</div>
    
    <div class="position-absolute" style="top:53.9%;left: 27%">{certificate_issue_date}</div>
    <div class="position-absolute" style="top:57.4%;left:27%">{valid_upto}</div>
    
<?php
$this->mypdf->addPage('L');
?>
</body>

</html>