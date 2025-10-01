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
            top: 76.2%;
            left: 9%;
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
$this->mypdf->addPage('L');
?>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/franchise-certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:117px;height:114px;">
    </div>

    <p class="position-absolute text-center " style="top:51%;left:5%;width:90%">{institute_name}</p>
    <p class="position-absolute  text-center" style="top:62.2%;left:29%;width:170px">{center_number}</p>
    <p class="position-absolute text-center" style="top:62.2%;left:73%;">{certificate_issue_date}</p>
    <p class="position-absolute  text-center" style="top:62.2%;left:54%;width:120px">{valid_upto}</p>
    <p class="position-absolute" style="top:67.3%;left:25%;width:380px">{name}</p>
    <p class="position-absolute" style="top:67.3%;left:67.5%;width:300px">{city}, &nbsp;{state}</p>
    <!-- <p class="position-absolute" style="top:43.5%;left:24%;">{name}</p>
    <p class="position-absolute " style="top:46.5%;left:24%;">{institute_name}</p>
    <p class="position-absolute" style="top:49.7%;left:24%;">{city}, &nbsp;{state}</p>
    <p class="position-absolute" style="top:52.8%;left:24%;">{center_number}</p>
    <p class="position-absolute" style="top:55.7%;left:24%;"><?=date('Y',strtotime($certificate_issue_date))?>-<?=date('Y',strtotime($valid_upto))?></p>
    <p class="position-absolute" style="top:58.5%;left:24%;">{certificate_issue_date}</p>
    <p class="position-absolute" style="top:61.6%;left:24%;">{valid_upto}</p>

    <p class="position-absolute" style="top:88.6%;left:26%;font-size:13px">{certificate_issue_date}</p> -->

    <?php
    // $this->ki_theme->generate_qr($id, 'franchise_certificate', current_url());
    ?>
    <!-- <div class="position-absolute" style="top:85.3%;left:35%">
        <img src="upload/images/franchise_certificate_{id}.png" style="width:55px">
    </div> -->

</body>

</html>