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
            text-transform: uppercase;
            font-weight: bold;
            font-size: 19px;
        }

        .text-capitlize {
            text-transform: uppercase;
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
            top: 45.1%;
            left: 79.05%;
            width: 120px !important;
            height: 95px;
        }

        #photo {
            z-index: 999;
            top: 76%;
            left: 21%;
            width: 94px;
            padding:0
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
        <img src="upload/images/franchise_certificate_{id}.png" style="width:74px;height:80px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" class="" style="width:166px;height:197px">
    </div>
    <div class="position-absolute" style="top:47%;left:10%;width:76%;text-align:center;text-transform:uppercase">{institute_name}</div>

    <div class="position-absolute" style="top:42%;left:35%;">{name}</div>
    <!-- <div class="position-absolute" style="top:57.7%;left:27%;">{city}, &nbsp;{state}</div> -->
    <div class="position-absolute" style="top:68%;left:26.5%;width:580px">{center_full_address}</div>
    <div class="position-absolute" style="top:52.4%;left:27%;">{center_number}</div>
    
    <div class="position-absolute" style="top:57.7%;left: 27%">{certificate_issue_date}</div>
    <div class="position-absolute" style="top:63.2%;left:27%">{valid_upto}</div>

</body>

</html>