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
            top: 21.3rem;
            right: 47px;
            width: 120px !important;
            ;
            height: 95px;
        }

        #photo {
            z-index: 999;
            bottom: 14%;
            left: 6rem;
            width: 70px;
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
    <img id="back-image" class="position-relative" src="{document_path}/franchise_certificate.png">
    <!-- <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png">
    </div> -->
    <!-- <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:94.7px;height:113px">
    </div> -->
    <div class="position-absolute" style="top:25.2%;left:17%;width:76%;text-align:center;text-transform:capitalize">{institute_name}</div>

    <div class="position-absolute" style="top:28.2%;left:27%;">{center_number}</div>
    <div class="position-absolute" style="top:30.4%;left:27%;">{city}, &nbsp;{state}</div>
    <div class="position-absolute" style="top:32.7%;left:27%;">{name}</div>
    
    <div class="position-absolute" style="top:35.1%;left: 27%">{certificate_issue_date}</div>
    <div class="position-absolute" style="top:35.1%;left:69%">{valid_upto}</div>

    <!-- <div class="position-absolute w-100" style="top:28.5%;padding-left:0px;z-index:9999">

        <div class="middle-div" style="">{center_number}</div>

        <div class="middle-div" style="margin-top:0.5rem;">{city}, &nbsp;{state}</div>
        <div class="middle-div" style="margin-top:0.3rem">{name}</div>
        <div class="middle-div" style="margin-top:.85rem;">{certificate_issue_date}</div>
        <div class="middle-div" style="margin-top:-1rem;margin-left:69%">{valid_upto}</div>

    </div> -->

</body>

</html>