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
            top: 68.65%;
            left: 40.85%;
        }

        .middle-div {
            margin-left: 21.2rem;
        }

        .test {
            border: 1px solid red
        }

        #center_signature {
            z-index: 999;
            top: 44.5rem;
            left: 13rem;
            width: 120px !important;
            height: 95px;
        }

        p {
            /* font-size: 20px; */
        }
        .text-center{
            text-align: center;
        }
    </style>
</head>
<?php
// $this->mypdf->addPage('L');
?>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/franchise-certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:116px;height:116px;">
    </div>
    <p class="position-absolute" style="top:2.3%;left:12%;width:170px;font-size:12px">{serial_no}</p>
    <p class="position-absolute" style="top:2.3%;left:84%;width:170px;font-size:12px">{center_number}</p>

    <p class="position-absolute text-center " style="top: 46.2%;left:32%;width:63%">{institute_name}</p>
    <p class="position-absolute  text-center" style="top:57.8%;left:39%;width:170px">{center_number}</p>
    <p class="position-absolute text-center" style="top:62.5%;left:29%;"><?=date('Y',strtotime($certificate_issue_date))?> - <?=date('Y',strtotime($valid_upto))?></p>
    <!-- <p class="position-absolute text-center" style="top:62.2%;left:73%;">{certificate_issue_date}</p> -->
    <!-- <p class="position-absolute  text-center" style="top:62.2%;left:54%;width:120px">{valid_upto}</p> -->
    <!-- <p class="position-absolute" style="top:67.3%;left:25%;width:380px">{name}</p> -->
    <!-- <p class="position-absolute" style="top:67.3%;left:67.5%;width:300px">{city}, &nbsp;{state}</p> -->

    <?php
    // $this->ki_theme->generate_qr($id, 'franchise_certificate', current_url());
    ?>

</body>

</html>