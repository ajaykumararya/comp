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
        .text-center{
            text-align: center;
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
            top: 39.7%;
            left: 41.7%;
            width: 120px !important;
            height: 95px;
        }

        #photo {
            z-index: 999;
            bottom: 10.7%;
            left: 6.5%;
            width: 170px;
        }

        .middle-div {
            margin-left: 14rem;
        }

        .test {
            border: 1px solid red
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/franchise-certificate.jpg">
    <?php
    $this->ki_theme->generate_qr($id, 'franchise_certificate', current_url());
    ?>
    <div class="position-absolute" id="photo">
        <img src="upload/images/franchise_certificate_{id}.png" style="width:115px">
    </div>
    <!-- <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:129px;height:166px;">
    </div> -->
    <p class="position-absolute text-center" style="font-size:1.5rem;top:46%;left:8%;width:84%;text-transform:capitalize">
        {institute_name}</p>
    <!-- <div class="position-absolute" style="top:27.3%;left:28%;width:60%;text-align:left;text-transform:capitalize">{name}</div> -->
    <!-- <div class="position-absolute" style="top:30.1%;left:28%;width:60%;text-align:left;text-transform:capitalize">Director</div> -->

    <p class="position-absolute" style="top:60.5%;left: 31%;font-size:15px">{center_number}</p>


    <div class="position-absolute" style="top:63%;left: 74%;font-size:13px">{certificate_issue_date}</div>
    <div class="position-absolute" style="top:63%;left:55%;font-size:13px">{valid_upto}</div>

    <!-- <div class="position-absolute w-100" style="top:28.5%;padding-left:0px;z-index:9999">

        <div class="middle-div" style="">{center_number}</div>

        <div class="middle-div" style="margin-top:0.5rem;">{city}, &nbsp;{state}</div>
        <div class="middle-div" style="margin-top:0.3rem">{name}</div>
        <div class="middle-div" style="margin-top:.85rem;">{certificate_issue_date}</div>
        <div class="middle-div" style="margin-top:-1rem;margin-left:69%">{valid_upto}</div>

    </div> -->

</body>

</html>