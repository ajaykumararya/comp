<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Registration Form</title>
    <!-- <link href="{base_url}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="{base_url}assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> -->
    {basic_header_link}
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;

            font-weight: bold;
        }
        .text-center{
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
        }

        td,
        p {
            font-weight: bold;
            color: black;
            font-size: 14px;
            line-height: 1.815;
        }

        #photo {
            z-index: 999;
            top: 22.1%;
            left: 75.5%;
            width: 120px !important;
            ;
            height: 95px;
        }

        .test {
            border: 1px solid red
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
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/registration-form.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:80px;height:104px;">
    </div>
    <!-- <p class="position-absolute" style="top:1%;left:80%">{createdOn}</p>
    <p class="position-absolute" style="top:1%;left:16%">{admit_card_id}</p> -->

    <p class="position-absolute" style="top:20.5%;left:50%">{center_code}</p>
    <p class="position-absolute " style="top:20.6%;left:20.6%;">{roll_no}</p>
    <p class="position-absolute" style="top:31%;left:33.5%">{course_name}</p>
    <p class="position-absolute" style="top:23.4%;left:33.5%">{student_name}</p>
    <p class="position-absolute" style="top:25.9%;left:33.5%">{father_name}</p>
    <p class="position-absolute" style="top:28.5%;left:33.5%">{mother_name}</p>    
    <p class="position-absolute text-capitlize" style="top:33.7%;left:33.5%">{duration} {duration_type}</p>
    <p class="position-absolute text-capitlize" style="top:33.7%;left:63%">{adhar_card_no}876567876765</p>

    <p class="position-absolute text-capitlize" style="top:36.4%;left:33.5%">{gender}</p>
    <p class="position-absolute text-capitlize" style="top:36.4%;left:63%">{marital_status}</p>
    <p class="position-absolute" style="top:39%;left:33.5%">{dob}</p>
    <p class="position-absolute" style="top:39%;left:62%">{category}</p>
    
    <p class="position-absolute" style="top:41.6%;left:33.5%">{contact_number}</p>
    <p class="position-absolute" style="top:41.6%;left:61%;width:300px">{email}</p>

    <p class="position-absolute" style="top:48.8%;left:16%;width:80%">{address}</p>
    <p class="position-absolute text-center" style="top:51.3%;left:16%;width:230px">{STATE_NAME}</p>
    <p class="position-absolute text-center" style="top:51.3%;left:56.5%;width:100px">{DISTRICT_NAME}</p>
    <p class="position-absolute text-center" style="top:51.3%;left:80.4%;width:100px">{pincode}</p>
    
    <?php
    $data = [];
    $listExamination = $this->db->where('student_id',$student_id)->limit(2)->order_by('timestamp','ASC')->get('student_examiniation_passed');
    if($listExamination->num_rows()){
        foreach($listExamination->result() as $row)
            $data[] = (array)$row;
    }
    // pre($data);

    function pData($index,$data,$arrayIndex = 0){
        // global $data;
        return isset($data[$arrayIndex][$index]) ? $data[$arrayIndex][$index] : '';
    }
    // echo pData('passed');
    ?>
    <p class="position-absolute text-center" passed style="top:58.9%;left:6.6%;width:128px"><?=pData('passed',$data)?></p>
    <p class="position-absolute text-center" nos style="top:58.9%;left:23%;width:108px"><?=pData('name_of_stream',$data)?></p>
    <p class="position-absolute text-center" style="top:58.9%;left:37%;width:112px"><?=pData('board_or_university',$data)?></p>
    <p class="position-absolute text-center" style="top:58.9%;left:51.5%;width:108px"><?=pData('year_of_passing',$data)?></p>
    <p class="position-absolute text-center" style="top:58.9%;left:65%;width:108px"><?=pData('marks_obtained',$data)?></p>
    <p class="position-absolute text-center" style="top:58.9%;left:79%;width:108px"><?=pData('percentage_marks',$data)?></p>
    
    <p class="position-absolute text-center" passed style="top:61.5%;left:6.6%;width:128px"><?=pData('passed',$data,1)?></p>
    <p class="position-absolute text-center" nos style="top:61.5%;left:23%;width:108px"><?=pData('name_of_stream',$data,1)?></p>
    <p class="position-absolute text-center" style="top:61.5%;left:37%;width:112px"><?=pData('board_or_university',$data,1)?></p>
    <p class="position-absolute text-center" style="top:61.5%;left:51.5%;width:108px"><?=pData('year_of_passing',$data,1)?></p>
    <p class="position-absolute text-center" style="top:61.5%;left:65%;width:108px"><?=pData('marks_obtained',$data,1)?></p>
    <p class="position-absolute text-center" style="top:61.5%;left:79%;width:108px"><?=pData('percentage_marks',$data,1)?></p>
    
    <!-- <div class="position-absolute" style="top:67.65%;left:43.54%">
        <img style="width:140px;" src="upload/images/admit_card_{admit_card_id}.png" alt="">
    </div> -->
</body>

</html>