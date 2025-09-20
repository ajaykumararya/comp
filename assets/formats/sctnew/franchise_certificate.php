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

        .text-center {
            text-align: center;
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
            top: 79%;
            left: 47%;
            width: 170px;
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
    <?php
    $this->ki_theme->generate_qr($id, 'franchise_certificate', current_url());
    ?>
    <div class="position-absolute" id="photo">
        <img src="upload/images/franchise_certificate_{id}.png" style="width:118px;height:117px">
    </div>
    <!-- <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:129px;height:166px;">
    </div> -->
    <p class="position-absolute text-center"
        style="font-size:1.4rem;top:43%;left:8%;width:84%;text-transform:upparcase">
        {institute_name}</p>
    <!-- <div class="position-absolute" style="top:27.3%;left:28%;width:60%;text-align:left;text-transform:capitalize">{name}</div> -->
    <div class="position-absolute " style="top:48.3%;left:32%;width:60%;text-align:left;line-height:2">{center_full_address}</div>

    <p class="position-absolute" style="top:66%;left: 56%;font-size:15px">{center_number}</p>

    <div class="position-absolute" style="top:70.8%;left: 75.5%;font-size:13px">{certificate_issue_date}</div>
    <div class="position-absolute" style="top:70.8%;left:48.5%;font-size:13px">
        <?php
        if ($valid_upto  < date('d-m-Y')) {
            $date1 = new DateTime($certificate_issue_date); // Start date
            $date2 = new DateTime($valid_upto); // End date
        
            $diff = $date1->diff($date2); // Calculate difference
        
            echo $diff->y.' Year';
        } else
            echo '<span style="color:red">Expired</span>';
        ?>
    </div>

    <!-- <div class="position-absolute w-100" style="top:28.5%;padding-left:0px;z-index:9999">

        <div class="middle-div" style="">{center_number}</div>

        <div class="middle-div" style="margin-top:0.3rem">{name}</div>
        rgin-top:0.5rem;">{city}, &nbsp;{state}</div>
        <div class="middle-div" style="ma<div class="middle-div" style="margin-top:.85rem;">{certificate_issue_date}</div>
        <div class="middle-div" style="margin-top:-1rem;margin-left:69%">{valid_upto}</div>

    </div> -->

</body>

</html>