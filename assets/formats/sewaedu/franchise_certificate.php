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
            top: 20.5rem;
            right: 62.5px;
            width: 120px !important;
            height: 95px;
        }

        #photo {
            z-index: 999;
            bottom: 20.1%;
            left: 27.05rem;
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
    <img id="back-image" class="position-relative" src="{document_path}/franchise_certificate.jpg">
    <?php
    $this->ki_theme->generate_qr($id, 'franchise_certificate', current_url());
    ?>
    <div class="position-absolute" id="photo">
        <img src="upload/images/franchise_certificate_{id}.png">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:114px;height:147px">
    </div>
    <div class="position-absolute" style="top:42%;left:10%;width:76%;text-align:center;text-transform:capitalize">{institute_name}</div>

    <div class="position-absolute" style="top:56%;left:27%;">{center_number}</div>
    <div class="position-absolute" style="top:51.4%;left:27%;">{city}, &nbsp;{state}</div>
    <div class="position-absolute" style="top:47.4%;left:27%;">{name}</div>
    
    <div class="position-absolute" style="top:60.4%;left: 27%">{certificate_issue_date}</div>
    <div class="position-absolute" style="top:64.6%;left:27%">{valid_upto}</div>
    
    <!-- <div class="position-absolute w-100" style="top:28.5%;padding-left:0px;z-index:9999">

        <div class="middle-div" style="">{center_number}</div>

        <div class="middle-div" style="margin-top:0.5rem;">{city}, &nbsp;{state}</div>
        <div class="middle-div" style="margin-top:0.3rem">{name}</div>
        <div class="middle-div" style="margin-top:.85rem;">{certificate_issue_date}</div>
        <div class="middle-div" style="margin-top:-1rem;margin-left:69%">{valid_upto}</div>

    </div> -->

</body>

</html>