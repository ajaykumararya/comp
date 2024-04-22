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
            font-size: 12px;
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
            right: 47px;
            width: 120px !important;
            ;
            height: 95px;
        }

        #photo {
            z-index: 999;
            top: 32.8%;
            left: 5.8rem;
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
    <div class="position-absolute" id="photo">
        <img src="upload/images/franchise_certificate_{certificate_id}.png" style="width:79px;height:79px">
    </div>
    <!-- <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:94.7px;height:113px">
    </div> -->
    
    <div class="position-absolute" style="top:23%;left:25%;width:50%;text-align:center;text-transform:capitalize">{institute_name}</div>
    
    <div class="position-absolute" style="top:25.2%;left:27%;">{name}</div>

    <div class="position-absolute" style="top:26.7%;left:27%;">{city}, &nbsp;{state}</div>
    <div class="position-absolute" style="top:28.25%;left:27%;">{center_number}</div>
    
    <div class="position-absolute" style="top:29.8%;left: 27%">{certificate_issue_date}</div>
    <div class="position-absolute" style="top:31.35%;left:27%">{valid_upto}</div>


</body>

</html>