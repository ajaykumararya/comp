<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Card</title>

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
        p{
            font-size: 12px;
            font-weight: bold;
        }
        td{
            font-weight: bold;
            color:black;
            font-size: 11px;
            line-height:1.5;
            /* text-transform: capitalize; */
            /* background-color: black; */
        }
        #photo{
            z-index: 999;
            top:19.3rem;
            right:77px;
            width: 120px !important;;
            height: 95px;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/admit-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:94.5px;height:110.8px">
    </div>
    <p class="position-absolute text-capitalize"  style="top:24%;left:34%;">{roll_no}</p>
    <p class="position-absolute text-capitalize"  style="top:25.7%;left:34%;">{student_name}</p>
    <p class="position-absolute text-capitalize"  style="top:27.4%;left:34%;">{father_name}</p>
    <p class="position-absolute text-capitalize"  style="top:29.1%;left:34%;">{enrollment_no}</p>
    <p class="position-absolute text-capitalize"  style="top:30.68%;left:34%;">{course_name}</p>
    <p class="position-absolute text-capitalize"  style="top:32.52%;left:34%;">{session}</p>
    <p class="position-absolute text-capitalize"  style="top:34.2%;left:34%;">{center_name}</p>
    <!-- <div class="position-absolute w-100" style="top:25.42%;padding-left:9px;z-index:9999">

        <table class="table table-bordered" style="margin-left:32%">
            <tbody>
                <tr><td>{roll_no}</td></tr>
                <tr><td class="text-capitlize">{student_name}</td></tr>
                <tr><td class="text-capitlize">{father_name}</td></tr>
                <tr><td class="text-capitlize">{enrollment_no}</td></tr>
                <tr><td>{course_name}</td></tr>
                <tr><td>{session}</td></tr>
                <tr><td>{center_name} </td></tr>
            </tbody>
        </table>
    </div> -->
</body>

</html>