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
            top: 10.25rem;
            right: 1.28rem;
            width: 120px !important;            
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
    <img id="back-image" class="position-relative" src="{document_path}/franchise-certificate.jpg">
    <!-- <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png">
    </div> -->
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:74.7px;height:90px">
    </div>
    <div class="position-absolute" style="top:23.7%;left:25.5%;">{name}</div>
    <div class="position-absolute" style="top:26.15%;left:25.5%;">{institute_name}</div>
    <div class="position-absolute" style="top:28.6%;left:27.5%;">{city}, &nbsp;{state}</div>

    <div class="position-absolute" style="top:32.75%;left:20.5%;font-size:12px">{certificate_issue_date}</div>
    <div class="position-absolute" style="top:34.8%;left:20.5%;font-size:12px">{valid_upto}</div>
    

</body>

</html>