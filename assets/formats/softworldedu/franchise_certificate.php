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
            top: 44.5rem;
            right: 12rem;
            width: 120px !important;
            height: 95px;
        }

        #photo {
            z-index: 999;
            top: 56.5%;
            left: 79.4%;
        }

        .middle-div {
            margin-left: 21.2rem;
        }

        .test {
            border: 1px solid red
        }
        #center_signature{
            z-index: 999;
            top: 44.5rem;
            left: 13rem;
            width: 120px !important;
            ;
            height: 95px;
        }
        p{
            font-size: 20px;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/franchise-certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:142px;height:183px">
    </div>
    <div class="position-absolute" id="center_signature">
        <img src="upload/{signature}" style="width:94.7px;height:50px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="{document_path}/director_sign.png" style="width:94.7px;height:50px">
    </div>
    <div class="position-absolute" style="top:8.7%;left:18%;">{serial_no}</div>
    <p class="position-absolute" style="top:59%;left:15%;width:700px;text-align:center">{institute_name}</p>
    <p class="position-absolute" style="top:62.5%;left:25%;">{city}, &nbsp;{state}</p>
    <p class="position-absolute" style="top:67%;left:25%;">{center_number}</p>
    <p class="position-absolute" style="top:70.5%;left:25%;">{name}</p>
    <p class="position-absolute" style="top:74.5%;left:25%;">{certificate_issue_date}</p>
    

</body>

</html>