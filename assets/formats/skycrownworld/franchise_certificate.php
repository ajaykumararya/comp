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
            font-size: 17px;
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
            top: 17.5%;
            left: 43.85%;
            width: 120px !important;
            height: 95px;
        }

        #photo {
            z-index: 999;
            top: 84.5%;
            right: 38px;
        }

        #photo img {}

        .middle-div {
            margin-left: 14rem;
        }

        .test {
            border: 1px solid red
        }

        .m-c {
            color: #0c3374;
        }
    </style>
</head>
<?php
$this->ki_theme->generate_qr($certificate_id, 'franchise_certificate', current_url());
?>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/franchise-certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/franchise_certificate_{certificate_id}.png" style="width:100px;padding:0">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:95px;height:124px">
    </div>

    <p class="position-absolute" style="top:31%;left:5%;width:90%;text-align:center;font-size:16px;">{institute_name}</p>
    <p class="position-absolute " style="top:33.4%;left:18%;width:75%;text-align:center;font-size:15px;">{center_full_address}</p>
   
        <p class="position-absolute" style="top:47%;left:26%;font-size:15px">{center_number}</p>
        <p class="position-absolute" style="top:49.2%;left:26%;font-size:15px">{name}</p>
        <p class="position-absolute" style="top:51.3%;left:26%;font-size:15px">{contact_number}</p>
        <p class="position-absolute" style="top:53.5%;left:26%;font-size:15px">{email}</p>
        <p class="position-absolute" style="top:55.6%;left:26%;font-size:15px">{certificate_issue_date} to {valid_upto}</p>


</body>

</html>