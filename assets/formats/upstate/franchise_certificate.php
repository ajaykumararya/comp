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
    <img id="back-image" class="position-relative" src="{document_path}/franchise-certificate.jpg">
    <!-- <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png">
    </div> -->
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:129px;height:166px;">
    </div>
    <div class="position-absolute" style="top:33%;left:28%;width:60%;text-align:left;text-transform:capitalize">{institute_name}</div>
    <div class="position-absolute" style="top:27.3%;left:28%;width:60%;text-align:left;text-transform:capitalize">{name}</div>
    <div class="position-absolute" style="top:30.1%;left:28%;width:60%;text-align:left;text-transform:capitalize">Director</div>

    <div class="position-absolute" style="top:13.8%;left:73%;text-transform: uppercase;">{center_number}</div>
    <div class="position-absolute" style="top:35.7%;left:28%;">{center_full_address}</div>
    <div class="position-absolute" style="top:56.4%;left:57%;">{city},&nbsp;{state}</div>
    <div class="position-absolute" style="top:60.1%;left:27%;">UP STATE PARAMEDICAL COUNCIL</div>

    
    <div class="position-absolute" style="bottom:19.6%;left: 32%;font-size:12px">{certificate_issue_date}</div>
    <div class="position-absolute" style="bottom:19.6%;left:64%;font-size:12px">{valid_upto}</div>

    <!-- <div class="position-absolute w-100" style="top:28.5%;padding-left:0px;z-index:9999">

        <div class="middle-div" style="">{center_number}</div>

        <div class="middle-div" style="margin-top:0.5rem;">{city}, &nbsp;{state}</div>
        <div class="middle-div" style="margin-top:0.3rem">{name}</div>
        <div class="middle-div" style="margin-top:.85rem;">{certificate_issue_date}</div>
        <div class="middle-div" style="margin-top:-1rem;margin-left:69%">{valid_upto}</div>

    </div> -->

</body>

</html>