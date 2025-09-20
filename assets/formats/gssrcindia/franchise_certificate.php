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
            top:47.2%;
            left: 76.45%;
            width: 120px !important;
            height: 95px;
        }

        #photo {
            z-index: 999;
            top: 75.3%;
            left: 18.2%;
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
    <div class="position-absolute" style="top:44%;left:10%;width:76%;text-align:center;text-transform:capitalize">{institute_name}</div>

    <div class="position-absolute" style="top:55.8%;left:27%;">{center_number}</div>
    <div class="position-absolute" style="top:52.3%;left:27%;">{city}, &nbsp;{state}</div>
    <div class="position-absolute" style="top:48.5%;left:27%;">{name}</div>
    
    <div class="position-absolute" style="top:59%;left: 27%">{certificate_issue_date}</div>
    <div class="position-absolute" style="top:62.3%;left:27%">{valid_upto}</div>

    <p class="position-absolute" style="top:85.5%;left:27%;font-size:12px">{city}, &nbsp;{state}</p>
    <p class="position-absolute" style="top:88%;left: 27%;font-size:12px">{certificate_issue_date}</p>



</body>

</html>