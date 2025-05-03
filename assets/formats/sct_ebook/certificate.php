<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Certificate</title>
    <style>
        * {
            font-weight: bold;
            text-transform: uppercase;

        }

        .text-capitlize {
            /* text-transform: uppercase; */
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
            top: 32.5%;
            left: 8.1%;
        }

        #photo1 {
            top: 33.49%;
            left: 81.55%;
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

        div{
            /* text-transform: uppercase!important; */
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
            font-family: freeserif
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 88px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:102px;height:115px">
    </div>


    <p class="position-absolute " style="top:2%;left:28%;width:320px">{serial_no}</p>

    <div class="position-absolute hindi-text " style="width:340px;top:42%;left:40%">{hindi_name}</div>
    <div class="position-absolute hindi-text " style="width:340px;top:44.8%;left:40%">{hindi_father_name}</div>
    <div class="position-absolute hindi-text" style="width:82%;top:47.3%;left:8%;text-align:center">{hindi_center_name}</div>
    <div class="position-absolute hindi-text " style="width:460px;top:53%;left:18%;text-align:center">{hindi_course_name}</div>
    <div class="position-absolute hindi-text " style="top:50%;left:28%;width:190px;text-align:center"><?=getHindiMonthFromDate($to_date)?></div>
    <div class="position-absolute hindi-text " style="top:50%;left:65%;width:190px;text-align:center"><?=date('Y',strtotime($to_date))?></div>
        <?php
    $getCat = $this->db->select('cat.title')
                        ->from('course_category as cat')
                        ->join('course as c','c.category_id = cat.id and c.id = '.$course_id)
                        ->get();
    $category_title = $getCat->num_rows() 
                        ? $getCat->row('title') : '';

?>
    <p class="position-absolute text-center " style="left:64%;top:67.5%;width:250px;line-height:1"><?=$category_title?></p>

    <p class="position-absolute text-center" style="left:35%;top:57.8%;width:450px">{student_name}</p>
    <p class="position-absolute text-center" style="left:35%;top:61%;width:450px">{father_name}</p>
    <p class="position-absolute text-center" style="left:52%;top:64%;width:350px">{center_name}</p>
    <p class="position-absolute text-center" style="left:8%;top:70.3%;width:84%">{course_name}</p>
    <!-- <div class="position-absolute " style="top:52%;left:30%">{dob}</div> -->

    <div class="position-absolute hindi-text " style="top:74.8%;left:17%;width:190px;text-align:center"><?=date('F',strtotime($to_date))?></div>
    <div class="position-absolute hindi-text " style="top:74.8%;left:65%;width:190px;text-align:center"><?=date('Y',strtotime($to_date))?></div>

    <p class="position-absolute" style="left:24%;top:86%;width:82px;width:200px;text-transform:uppercase"><?=ordinal_number(date('n',strtotime($createdOn)))?> <?=date(' F Y',strtotime($createdOn))?></p>
    <p class="position-absolute" style="left:24%;top:90.5%;width:82px;">Nagpur</p>
   

   

</body>

</html>