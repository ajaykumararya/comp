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
            top: 8%;
            left: 5.9%;
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
    $this->mypdf->addPage('L');
    $this->ki_theme->generate_qr($id, 'franchise_certificate', current_url());
    ?>
    <div class="position-absolute" id="photo">
        <img src="upload/images/franchise_certificate_{id}.png" style="width:118px;height:117px">
    </div>
    <div class="position-absolute" style="top:8.9%;right:6%;width:265px;height:60px">
        <img src="{base_url}site/bar/{center_number}" alt="" style="width:100%;height:100%">
    </div>
    <!-- <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:129px;height:166px;">
    </div> -->
    <p class="position-absolute text-center"
        style="font-size:1.4rem;top:44%;left:8%;width:84%;text-transform:upparcase">
        {institute_name}</p>
    <!-- <div class="position-absolute" style="top:27.3%;left:28%;width:60%;text-align:left;text-transform:capitalize">{name}</div> -->
    <!-- <div class="position-absolute " style="top:48.3%;left:32%;width:60%;text-align:left;line-height:2">{center_full_address}</div> -->

    <p class="position-absolute" style="top:63%;left: 49%;">{center_number}</p>

    <div class="position-absolute" style="top:78.5%;left: 13%;"><?=date('d/m/Y',strtotime($certificate_issue_date))?></div>
    <div class="position-absolute" style="top:68%;left: 56%;width:400px">
        <?php
        if (strtotime($valid_upto)  > time()) {
            $date1 = new DateTime($certificate_issue_date); // Start date
            $date2 = new DateTime($valid_upto); // End date
        
            $diff = $date1->diff($date2); // Calculate difference
        
            // echo $diff->y.' Year';
            echo date('d/F/Y',strtotime($valid_upto));
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