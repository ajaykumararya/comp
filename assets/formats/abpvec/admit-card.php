<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Card</title>
    <!-- <link href="{base_url}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="{base_url}assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> -->
    {basic_header_link}
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        
            font-weight: bold;
        }
        .text-capitlize{
            text-transform: capitalize;
        }
        .position-relative{
            position: relative;
        }
        .position-absolute{
            position: absolute;
        }
        .w-100{
            width: 100%;
        }
        td,p{
            font-weight: bold;
            color:black;
            font-size: 14px;
            line-height:1.815;
            /* text-transform: capitalize; */
            /* background-color: black; */
        }td{
            padding: 0;
            font-size: 12px;
            line-height: 2;
        }
        #photo{
            z-index: 999;
            top:31.55%;
            left:80.7%;
            width: 120px !important;;
            height: 95px;
        }
        .test{
            border: 1px solid red;
        }
        .text-center{
            text-align: center;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/admit-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:100px;height:123px">
    </div>
    <!-- <p class="position-absolute" style="bottom:8%;left:13%;font-size:13px">{createdOn}</p> -->
    <!-- <p class="position-absolute" style="top:1%;left:16%">{admit_card_id}</p> -->

    <p class="position-absolute text-center" style="top:27.2%;left:5.7%;width:140px">{roll_no}</p>
    <p class="position-absolute text-center" style="top:27.2%;left:23.5%;width:140px;">{enrollment_no}</p>
    <p class="position-absolute text-center" style="top:27.2%;left:41%;width:140px;"><?=date('d-m-Y',strtotime($exam_date))?></p>
    <p class="position-absolute text-center" style="top:27.2%;left:59%;width:140px;">{dob}</p>
    <p class="position-absolute text-center" style="top:27.2%;left:76.4%;width:140px;">{session}</p>

    <p class="position-absolute" style="top:30.2%;left:25%">{student_name}</p>
    <p class="position-absolute" style="top:32.7%;left:25%">{father_name}</p>
    <p class="position-absolute" style="top:34.8%;left:25%">{course_name}</p>
    <p class="position-absolute" style="top:37.4%;left:25%">{center_name}</p>
    
    <div class="position-absolute" style="top:48%;left:5.5%;">
        <table>
            <?php
            $list = $this->db->where('course_id', $course_id)->where('duration',$admit_card_duration)->order_by("seq",'ASC')  ->get('subjects');
            if($list->num_rows() > 0){
                $i = 1;
                foreach($list->result() as $row){
                    echo '<tr>
                            <td style="text-align:center;width:78px">'.$i++.'.</td>
                            <td style="text-align:center;width:203px">'.$row->subject_code.'</td>
                            <td style="text-align:center;width:425px">'.$row->subject_name.'</td>
                    </tr>';
                }
            }
            else{
                echo '<tr><td colspan="2" style="text-align:center">No Subject Found</td></tr>';
            }
            ?>
        </table>
    </div>


    <!-- <p class="position-absolute" style="top:64.5%;left:23%">{date}</p>
    <p class="position-absolute" style="top:64.5%;left:57%">{time}</p> -->
    <!-- <p class="position-absolute" style="top:66.8%;left:21%">{center_name}</p> -->
    <?php
    $this->ki_theme->generate_qr($admit_card_id, 'admit_card', current_url());
    ?>
    <div class="position-absolute" style="top:85.5%;left:41.5%">
        <img style="width:132px;height:124px" src="upload/images/admit_card_{admit_card_id}.png" alt="">
    </div>
</body>

</html>