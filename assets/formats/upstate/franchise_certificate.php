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
            top: 23.2%;
            left: 79.5%;
            width: 150px !important;
            height: 195px;
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
    <img id="back-image" class="position-relative" src="{document_path}/franchise_certificate.jpg">
    <!-- <div class="position-absolute" id="photo">
        <img src="upload/images/franchise_certificate{certiticate_id}.png">
    </div> -->
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:115px;height:143px;">
    </div>
    <div class="position-absolute" style="top:39.7%;left:28%;width:60%;text-align:left;text-transform:uppercase">{institute_name}</div>
    <div class="position-absolute" style="top:30.9%;left:28%;width:60%;text-align:left;text-transform:uppercase">{name}</div>
    <div class="position-absolute" style="top:35.5%;left:28%;width:60%;text-align:left;text-transform:uppercase">Director</div>

    <div class="position-absolute" style="bottom:10%;left:17%;text-transform: uppercase;">{center_number}</div>
    <div class="position-absolute " style="top:44%;left:28%;text-transform:uppercase;width:65%;line-height:1">{center_full_address}</div>
    <div class="position-absolute" style="top:52%;left:57%;text-transform:uppercase">{city},&nbsp;{state}</div>
    <div class="position-absolute" style="top:56.5%;left:10%;text-transform:uppercase;width:80%;text-align:center">UP STATE PARAMEDICAL COUNCIL</div>

    
    <div class="position-absolute" style="bottom:18.2%;left: 32%;font-size:12px">{certificate_issue_date}</div>
    <div class="position-absolute" style="bottom:18.2%;left:73%;font-size:12px">{valid_upto}</div>

    <!-- <div class="position-absolute w-100" style="top:28.5%;padding-left:0px;z-index:9999">

        <div class="middle-div" style="">{center_number}</div>

        <div class="middle-div" style="margin-top:0.5rem;">{city}, &nbsp;{state}</div>
        <div class="middle-div" style="margin-top:0.3rem">{name}</div>
        <div class="middle-div" style="margin-top:.85rem;">{certificate_issue_date}</div>
        <div class="middle-div" style="margin-top:-1rem;margin-left:69%">{valid_upto}</div>

    </div> -->

</body>

</html>