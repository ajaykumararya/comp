hii
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{name} Registration Certificate</title>
    {basic_header_link}
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
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

        p {
            font-weight: bold;
            color: black;
            font-size: 14px;
            display: inline-block;
            /* word-spacing: 1px; */
        }

        #photo {
            z-index: 999;
            top: 67%;
            left: 77%;
        }

        table th:nth-child(1),
        table,
        tfoot tr {
            border: 1px solid black;
            text-align: center;
            /* font-weight: bold; */
            padding: 0;
            margin: 0;
            line-height: 0 !important;
        }

        .fw {
            font-weight: bold;
        }

        table tr:nth-child(1) {
            padding: 0 !important;
            margin: 0 !important;
            line-height: 0 !important;
        }

        .b-tb {
            border-top: 1xp solid black;
            border-bottom: 1px solid black;
        }

        .rmrb {
            border-right: 0px !important
        }

        .rmb {
            border-left: 0px solid transparent !important;
        }

        .lb {
            border-left: 1px solid black;
        }

        table head tr th {
            color: #0651a4 !important;
        }

        table tr td {
            line-height: 1.6;
        }

        table {
            border-collapse: collapse;
        }

        .test {
            border: 1px solid red
        }
    </style>
</head>
<?php
$this->ki_theme->generate_qr($id, 'registration_form', base_url('registration-form/' . $studentEncodeId))
    ?>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/registration-certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/registration_form_{id}.png" style="width:100px;height:100px">
    </div>
    <p class="position-absolute" style="top:2.6%;left:14%;width:120px">1000{serial_no}</p>
    <p class="position-absolute " style="top:31.9%;left:35%;line-height:1;width:45%">{exam_or_course}</p>
    <p class="position-absolute" style="top:34.8%;left:35%;width:200px">{registration_no}</p>
    <p class="position-absolute " style="top:38.6%;left:35%;width:120px"><?=date('d-m-Y-',strtotime($timestamp))?></p>
    <p class="position-absolute" style="top:42%;left:35%;width:255px">{name}</p>
    <p class="position-absolute" style="top:45.4%;left:35%;width:255px">{father_name}</p>
    <p class="position-absolute" style="top:48.9%;left:35%;width:255px">{mother_name}</p>
    <p class="position-absolute" style="top:52.4%;left:35%;width:255px">{dob}</p>
    <p class="position-absolute " style="top:55.9%;left:35%;width:455px;line-height:1">{address}</p>
    <p class="position-absolute " style="top:59.4%;left:35%;width:60%;line-height:1;text-align:left">{institute_name}</p>
    <p class="position-absolute text-capitlize" style="top:62.6%;left:35%">{training_period}</p>
    <p class="position-absolute " style="top:66%;left:35%;width:330px;line-height:1">{examination_body}</p>

    <!-- <p class="position-absolute " style="top:35.3%;left:36.5%">{center_name}</p> -->
    <!-- <p class="position-absolute " style="top:39.6%;left:36.5%">{dob}</p> -->
     <?php
     if(file_exists('upload/'.$photo)):
        ?>
    <div class="position-absolute" style="top:34.2%;left:81.03%;">
        <img src="upload/<?=$photo?>" style="width:62.5px;height:81px;" alt="">
    </div>
    <?php
    endif;
    ?>
    <!-- <p class="position-absolute" style="bottom:27%;left:69%;width:67px;font-size:15px">{division}</p> -->
    <!-- <p class="position-absolute" style="bottom:15.6%;left:77%;width:68px;font-size:15px">{grade}</p> -->

</body>

</html>