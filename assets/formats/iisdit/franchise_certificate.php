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
            font-size: 15px;
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
            top: 21.3rem;
            right: 14%;
            width: 120px !important;
            ;
            height: 95px;
        }

        #photo {
            z-index: 999;
            bottom: 22%;
            left: 46.5%;
            width: 70px;
        }

        .middle-div {
            margin-left: 14rem;
        }

        .test {
            border: 1px solid red
        }
    </style>
</head>
<?php
$this->ki_theme->generate_qr($certificate_id, 'franchise_certificate', current_url());
?>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/franchise-certificate.jpg">
    <div class="position-absolute" id="photo" style="background:white;border:1px solid black">
        <img src="upload/images/franchise_certificate_{id}.png">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:127px;height:127px;border:1px solid black">
    </div>

    
    <div class="position-absolute" style="top:39.7%;left:20%;">{name}</div>
    <div class="position-absolute" style="top:43.7%;left:20%;width:50%;">{institute_name}</div>
    <div class="position-absolute" style="top:47.8%;left:20%;">{city}, &nbsp;{state}</div>
    <div class="position-absolute" style="top:52.2%;left:20%;text-transform: uppercase;">{center_number}</div>

    <div class="position-absolute" style="top:56.5%;left: 20%">{certificate_issue_date}</div>
    <div class="position-absolute" style="top:60.5%;left:20%">{valid_upto}</div>

</body>

</html>