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
            top: 21.45%;
            left: 78.64%;
            width: 120px !important;
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
// $this->ki_theme->generate_qr($certificate_id, 'franchise_certificate', current_url());
?>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/franchise-certificate.jpg">
    <!-- <div class="position-absolute" id="photo">
        <img src="upload/images/franchise_certificate_{certificate_id}.png" style="width:79px;height:79px">
    </div> -->
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:76px;height:95px">
    </div>
    
    <p class="position-absolute " style="top:40%;left:16%;text-align:center;width:345px">{name}</p>

    <p class="position-absolute" style="top:68.2%;left:10%;width:80%;text-align:center">{center_number}</p>
    
    <p class="position-absolute" style="top:75.9%;left: 16%;font-size:12px">{certificate_issue_date}</p>
    <p class="position-absolute" style="top:77.5%;left:16%;font-size:12px">{valid_upto}</p>


</body>

</html>