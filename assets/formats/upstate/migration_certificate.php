<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{name} Admit Card</title>
    <style>
        * {
            font-weight: bold;
            /* text-transform: uppercase; */

        }

        .text-capitlize {
            text-transform: uppercase;
        }

        .position-relative {
            position: relative;
        }

        .position-absolute {
            position: absolute;
            font-weight: bold;
        }

        div.position-absolute {
            font-size: 18px;
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

        #photo {
            z-index: 999;
            top: 86.8%;
            left: 47%;
        }

        #photo1 {
            top: 71.2%;
            left: 8.5%;
        }

        p {
            font-weight: bold;
        }

        .middle-div {
            width: 60%;
            margin-left: 9rem;
            text-align: center;
            /* border:1px solid red; */
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        div {
            /* text-transform: uppercase !important; */
        }

        .test {
            border: 1px solid red
        }

        #center_signature {
            z-index: 999;
            bottom: 11%;
            left: 65%;
        }

        .hindi-text {
            font-size: 25pt !important;
            font-family: "Noto Sans Devanagari", sans-serif;
        }

        .t-u {
            /* text-transform: uppercase */
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/migration-certificate.jpg">
    <?php
    $this->ki_theme->generate_qr($id, 'migration', current_url());
    ?>
    <div class="position-absolute" id="photo1">
        <img src="upload/images/migration_{id}.png" style="width:96px;height:96px">
    </div>

    <p class="position-absolute t-u" style="top:30%;left:42%;width:350px">{name}</p>
    <p class="position-absolute t-u" style="top:36.3%;left:30%;width:350px">{father_name}</p>
    <p class="position-absolute " style="top:2.5%;left:13%;width:135px;font-size:12px">{sr_no}</p>
    <!-- <p class="position-absolute" style="top:4%;left:70%;width:150px;text-align:center">{roll_no}</p> -->
    <p class="position-absolute " style="top:42.8%;left:20%;width:580px;line-height:1">{institute_name}</p>
    <p class="position-absolute t-u " style="top:49%;left:25%;width:505px;line-height:1">{course_name}</p>
    <?php
    $admissionTime = strtotime($admission_date);

    if ($duration_type == 'month') {
        $toDateString = strtotime("+$duration months", $admissionTime);
    } else if ($duration_type == 'year') {
        $toDateString = strtotime("+$duration years", $admissionTime);
    }
    $toDateString = strtotime('-1 month', $toDateString);
    echo '<p class="position-absolute" style="top:55.2%;left:21%"> '.date('Y', $toDateString).'</p>';
    echo '<p class="position-absolute" style="top:55.2%;left:58%"> '.$roll_no.'</p>';
    ?>

    <p class="position-absolute " style="top:82.2%;left:24%;width:135px;">{date}</p>
   


</body>

</html>