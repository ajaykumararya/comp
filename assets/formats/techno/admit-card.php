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
            font-size: 13px;
            line-height:1.815;
            /* text-transform: capitalize; */
            /* background-color: black; */
        }
        #photo{
            z-index: 999;
            top:7.6rem;
            right:36px;
            width: 120px !important;;
            height: 95px;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/admit-card.png">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:95px;height:133px">
    </div>
    
    <p class="position-absolute" style="top:25%;left:25%">{center_name}</p>
    <p class="position-absolute" style="top:28%;left:25%">{student_name}</p>
    <p class="position-absolute" style="top:30.89%;left:25%">{father_name}</p>
    <p class="position-absolute" style="top:33.89%;left:25%">{mother_name}</p>
    <p class="position-absolute" style="top:36.89%;left:25%">{dob}</p>
    <p class="position-absolute" style="top:39.89%;left:25%">{enrollment_no}</p>
    <p class="position-absolute" style="top:42.6%;left:25%">{course_name}</p>
    <p class="position-absolute" style="top:45.4%;left:25%">{session}</p>
    <p class="position-absolute" style="top:48.4%;left:25%">{center_name}</p>
    <p class="position-absolute" style="top:51.2%;left:25%">{exam_date}</p>
    <!-- <p class="position-absolute"></p> -->
    <!-- <div class="position-absolute w-100" style="top:27.72%;padding-left:9px;z-index:9999">

        <table class="table table-bordered" style="margin-left:20%">
            <tbody>
                <tr><td>{center_name}</td></tr>
                <tr><td class="text-capitlize">{student_name}</td></tr>
                <tr><td class="text-capitlize">{father_name}</td></tr>
                <tr><td class="text-capitlize">{mother_name}</td></tr>
                <tr><td>{dob}</td></tr>
                <tr><td>{enrollment_no}</td></tr>
                <tr><td>{course_name} </td></tr>
                <tr><td>{session} </td></tr>
                <tr><td>{center_name} </td></tr>
                <tr><td>{exam_date} </td></tr>
            </tbody>
        </table>
    </div> -->
</body>

</html>