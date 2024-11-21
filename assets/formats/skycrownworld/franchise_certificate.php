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
            bottom: 2%;
            right: 24px;
            background-color: white;
        }
        #photo img{
            
          
        }

        .middle-div {
            margin-left: 14rem;
        }

        .test {
            border: 1px solid red
        }
        .m-c{
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
    <!-- <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:94.7px;height:113px">
    </div> -->
    
    <!-- <div class="position-absolute name" style="top:36%;left:9%;font-size:36px;width:80%;text-align:center;font-family:cursive">{name}</div> -->
    <div class="position-absolute " style="top:20%;left:20%;width:80%;text-align:center;">
        <p style="text-transform:capitalize;font-size:40px;line-height:1" class="m-c">{institute_name}</p>
        <p style="font-size:15px;color:#1f54ac">{center_full_address}</p>
        <p style="font-size:15px">Mr. {name} Assessed and found to comply with</p>
    </div>

    <!-- <div class="position-absolute" style="top:50%;left:27%;width:50%;text-align:right;font-size:16px">{center_full_address}</div> -->
    <div class="position-absolute" style="top:52.5%;left:63%;font-size:29px;color:#e5002b;"><b>{center_number}</b></div>
    
    <div class="position-absolute" style="top:57.8%;left: 42%;font-size:17px">{certificate_issue_date}</div>
    <div class="position-absolute" style="top:60%;left:42%;font-size:17px">{valid_upto}</div>


</body>

</html>