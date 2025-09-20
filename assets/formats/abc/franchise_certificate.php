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
            top: 34.5%;
            left: 74.8%;
            width: 120px !important;
            height: 95px;
        }

        #photo {
            z-index: 999;
            top: 78%;
            left: 35%;
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
$this->mypdf->addPage('L');
// $this->ki_theme->generate_qr($certificate_id, 'franchise_certificate', current_url());
?>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/franchise-certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/franchise_certificate_{certificate_id}.png" style="width:79px;height:79px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:100px;height:100px">
    </div>
    
    <p class="position-absolute" style="top:40.1%;left:16%;text-align:center;width:68%;font-size:16px">{name}</p>

    <p class="position-absolute" style="top:47.1%;left:16%;text-align:center;width:68%;font-size:16px">{institute_name}</p>
    <p class="position-absolute" style="top:50%;left:16%;text-align:center;width:68%;font-size:16px;line-height:1">{center_full_address}</p>
    
    <p class="position-absolute" style="top:54.8%;left: 48%;font-size:16px">{center_number}</p>
    <p class="position-absolute" style="top:69.9%;left: 30%;font-size:16px">{certificate_issue_date}</p>
    <p class="position-absolute" style="top:66.8%;left:43%;font-size:16px">{valid_upto}</p>


</body>

</html>