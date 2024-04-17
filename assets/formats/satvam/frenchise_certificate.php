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
            top: 30.3rem;
            right: 12rem;
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
            margin-left: 21.2rem;
        }

        .test {
            border: 1px solid red
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/franshise-certificate.jpg">
    <!-- <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png">
    </div> -->
    <div class="position-absolute" id="photo1">
        <img src="{document_path}/director_sign.png" style="width:94.7px;height:50px">
    </div>
    <div class="position-absolute" style="top:26%;left:39.5%;">{name}</div>
    <div class="position-absolute" style="top:28%;left:39.5%;">{city}, &nbsp;{state}</div>
    <div class="position-absolute" style="top:29.7%;left:39.5%;">{institute_name}</div>
    <div class="position-absolute" style="top:31.6%;left:39.5%;">{certificate_issue_date}</div>
    <div class="position-absolute" style="top:33.4%;left:39.5%;">{valid_upto}</div>
    

</body>

</html>