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
            top: 34.3%;
            left: 82%;
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
            text-transform: uppercase
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/migration-certificate.jpg">
    <?php
    $this->ki_theme->generate_qr($id, 'migration', current_url());
    $enrollment_no = '';
    $getEnroll = $this->db->where('student_id',$student_id)->order_by('id','DESC')->limit(1)->get('admit_cards');
    $enrollment_no = $getEnroll->num_rows() ? $getEnroll->row('enrollment_no') : '';
    ?>
    <div class="position-absolute" id="photo1">
        <img src="upload/images/migration_{id}.png" style="width:72px">
    </div>

    <p class="position-absolute" style="top:2.8%;left:15%;width:150px;font-size:11px">{roll_no}</p>
    <p class="position-absolute" style="top:2.8%;left:86%;width:150px;font-size:11px"><?=$enrollment_no?></p>

    <p class="position-absolute t-u" style="top:38.3%;left:36%;width:350px">{name}</p>
    <p class="position-absolute t-u" style="top:43%;left:36%;width:350px">{father_name}</p>
    <p class="position-absolute " style="top:3.6%;left:16%;width:135px;">{sr_no}</p>
    <p class="position-absolute" style="top:48.5%;left:20%;width:600px;line-height:1">{institute_name}</p>
    <p class="position-absolute t-u" style="top:58.5%;left:11%;width:505px;line-height:1">{course_name}</p>
    <p class="position-absolute t-u" style="top:54%;left:60%;width:305px;line-height:1">{course_category}</p>
    <!-- <p class="position-absolute" style="top:52%;left:49%;width:398px;line-height:1">{institute_name}</p> -->

    <p class="position-absolute " style="top:86%;left:16%;width:135px;">{date}</p>
    <!-- <p class="position-absolute " style="top:50%;left:31%;width:135px;font-size:12px">{examination_held}</p>
    <p class="position-absolute " style="top:50%;left:85.6%;width:135px;font-size:12px">{internship}</p> -->
   


</body>

</html>