<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Card</title>
    <!-- <link href="{base_url}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="{base_url}assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> -->
    {basic_header_link}
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }

        .text-capitlize {
            text-transform: capitalize;
        }

        .up {
            text-transform: uppercase;
        }

        .position-relative {
            position: relative;
        }

        .position-absolute {
            position: absolute;
        }

        .w-100 {
            width: 100%;
        }

        td,
        p {
            font-weight: bold;
            color: black;
            font-size: 12px;
            line-height: 1.815;
            /* text-transform: capitalize; */
            /* background-color: black; */
        }

        #photo {
            z-index: 999;
            top: 19.85%;
            left: 80.5%;
            width: 120px !important;
            height: 95px;
        }
    </style>
</head>
<?php
// $this->mypdf->addPage('L');
?>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/admit-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:110px;height:122px">
    </div>
    <!-- <p class="position-absolute" style="top:1%;left:80%">{createdOn}</p> -->
    <!-- <p class="position-absolute" style="top:1%;left:16%">{admit_card_id}</p> -->

    <!-- <p class="position-absolute" style="top:1%;left:80%">{createdOn}</p> -->
    <p class="position-absolute up" style="top: 18.5%;left:15%">{student_name}</p>
    <p class="position-absolute" style="top:20.8%;left:20%">{father_name}</p>
    <p class="position-absolute" style="top:22.8%;left:60%">{roll_no}</p>
    <p class="position-absolute" style="top:22.8%;left:21%;width:150px">{enrollment_no}</p>
    <p class="position-absolute" style="top:24.9%;left:20%">{dob}</p>
    <p class="position-absolute text-capitlize" style="top:24.9%;left:43%">{gender}</p>

    <p class="position-absolute" style="top:29%;left:18%">{course_name}</p>
    <p class="position-absolute" style="top:31.3%;left:22%"><?= humnize_duration($duration, $duration_type) ?></p>
    <p class="position-absolute" style="top:31.3%;left:52%"><?= detect_course_type($course_id, $admit_card_duration) ?>
    </p>

    <p class="position-absolute" style="top:33.3%;left:21%">{date} & <?= date('l', strtotime($date)) ?></p>
    <p class="position-absolute" style="top:33.3%;left:68%">{time}</p>
    <p class="position-absolute" style="top:35.3%;left:18%">{center_name}</p>
    <?php
    $this->ki_theme->generate_qr($admit_card_id, 'admit_card', current_url());
    $sign = '';
    if ($student_docs) {
        $docs = (json_decode($student_docs, true));
        if (isset($docs['signature'])) {
            $sign = $docs['signature'];
            if (file_exists('upload/' . $sign . '')) {
                echo '
                <div class="position-absolute" style="top:32.3%;left:79.8%;">
                    <img src="upload/' . $sign . '" style="width:125.3px;height:46.5px">
                </div>
                
                ';
            }
        }
    }
    if (file_exists('upload/' . $center_signature)) {
        echo '<div class="position-absolute" style="top:40.5%;left:72%">
                <img src="upload/{center_signature}" style="width:180px;height:50px">
            </div>';
    }
    ?>
    <div class="position-absolute" style="top:39.5%;left:31rem">
        <img style="width:80px" src="upload/images/admit_card_{admit_card_id}.png" alt="">
    </div>
</body>

</html>