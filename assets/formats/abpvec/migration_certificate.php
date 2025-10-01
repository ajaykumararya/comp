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
            top: 79%;
            left: 5.2%;
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
    <img id="back-image" class="position-relative" src="{document_path}/migration.jpg">
    <?php
    // $this->ki_theme->generate_qr($id, 'migration', current_url());
    $lastRoll = '';
    $_get = $this->db->where('id', $student_id)->get('admit_cards');
    if($_get->num_rows()){
        $lastRoll = $_get->row()->enrollment_no;
    }
    ?>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:92px;height:86px">
    </div>

    <p class="position-absolute t-u" style="top:38.7%;left:36%;width:350px">{name}</p>
    <p class="position-absolute t-u" style="top:43.3%;left:36%;width:350px">{father_name}</p>
    <p class="position-absolute " style="top:52.5%;left:24%;width:200px;text-align:center"><?=$lastRoll?></p>
    <p class="position-absolute " style="top:52.5%;left:66.5%;width:200px;text-align:center">{roll_no}</p>
    <p class="position-absolute" style="top:48.5%;left:20%;width:600px;line-height:1">{course_name}</p>

    <!-- <p class="position-absolute t-u" style="top:58.5%;left:11%;width:505px;line-height:1">{course_name}</p> -->


    <p class="position-absolute " style="top:87.4%;left:30%;width:135px;">{sr_no}</p>
    <p class="position-absolute " style="top:90%;left:34%;width:135px;">{date}</p>
    
</body>

</html>