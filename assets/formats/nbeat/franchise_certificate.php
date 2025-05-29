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
            top: 30.2%;
            left: 81.5%;
            width: 120px !important;
            height: 95px;
        }

        #photo {
            z-index: 999;
            top: 34%;
            left: 9%;
            border:1px solid black;
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
        <img src="upload/images/franchise_certificate_{id}.png">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" class="" style="width:107px;height:123px">
    </div>
    <div class="position-absolute" style="top:47%;left:10%;width:76%;text-align:center;text-transform:uppercase">{institute_name}</div>

    <div class="position-absolute" style="top:25.5%;left:82%;">{center_number}</div>
    <!-- <div class="position-absolute" style="top:57.7%;left:27%;">{city}, &nbsp;{state}</div> -->
    <div class="position-absolute " style="top:57%;left:27%;width:700px;line-height:2">{center_full_address}</div>
    <div class="position-absolute" style="top:52.4%;left:27%;">{name}</div>
    
    <div class="position-absolute" style="top:67.3%;left: 27%">{authorized_courses}</div>
    <div class="position-absolute" style="top:73%;left:27%">{certificate_issue_date}</div>
    <div class="position-absolute" style="top:77.7%;left:27%">{valid_upto}</div>
    <!-- <div class="position-absolute" id="center_signature">
        <img src="upload/{signature}" style="width:200px;height:80px">
    </div> -->
    <!-- <div class="position-absolute w-100" style="top:28.5%;padding-left:0px;z-index:9999">

        <div class="middle-div" style="">{center_number}</div>

        <div class="middle-div" style="margin-top:0.5rem;">{city}, &nbsp;{state}</div>
        <div class="middle-div" style="margin-top:0.3rem">{name}</div>
        <div class="middle-div" style="margin-top:.85rem;">{certificate_issue_date}</div>
        <div class="middle-div" style="margin-top:-1rem;margin-left:69%">{valid_upto}</div>

    </div> -->

</body>

</html>