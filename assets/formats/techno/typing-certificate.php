<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Marsheet</title>
    <!-- <link href="{base_url}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="{base_url}assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> -->
    {basic_header_link}
    <style>
        body{
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
        }

        td,p {
            font-weight: bold;
            color: black;
            font-size: 15px;
            line-height: 1.5;
            /* text-transform: capitalize; */
            /* background-color: black; */
        }

        #photo {
            z-index: 999;
            top: 21.3rem;
            right: 47px;
            width: 120px !important;
            height: 95px;
        }

        #session {
            top: 35.6%;
            left: 16.3%;
            font-weight: bold
        }

        /* table#first td, */
        table th:nth-child(1),table,tfoot tr,
        table#first th {
            border: 1px solid #1a7cfd;
            text-align: center;
        }
        .primary,
        table th{
            color:#1a7cfd
        }

        table {
            border-collapse: collapse;
        }
        .b-tb{
            border-top:1xp solid #1a7cfd;
            border-bottom: 1px solid #1a7cfd;
        }
        .rmrb{
            border-right:0px!important
        }
        .rmb{
            border-left:0px solid transparent!important;
        }
        .lb{
            border-left: 1px solid #1a7cfd;
        }
        .test{
            border:1px solid red
        }
    </style>
</head>

<body class="position-relative">
    <div class="position-absolute" style="top:6.1%;left:78%;font-weight:bold">{certification_no}</div>
    <img id="back-image" class="position-relative" src="{document_path}/typing-certificate.png">
    <p class="position-absolute" id="session">{session}</p>
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:94px;height:113px">
    </div>

    <p class="position-absolute " style="top:48%;left:35%;width:60%;text-align:center">{student_name}</p>
    <p class="position-absolute" style="top:51.6%;left:35%;width:60%;text-align:center">{father_name}</p>
    <p class="position-absolute" style="top:55%;left:45%;width:60%;">{roll_no}</p>
    <p class="position-absolute" style="top:68%;left:45%;width:60%;">{grade}</p>

    <p class="position-absolute" style="top:72.2%;left:8%;width:84%;text-align:center">{center_name}</p>
    <p class="position-absolute" style="top:61.7%;left:25%;text-align:center;width:70%">{course_name}</p>
    <p class="position-absolute text-capitlize" style="top:64.8%;left:30%"><?=humnize_duration($duration,$duration_type)?></p>
    <p class="position-absolute text-capitlize " style="top:64.8%;left:63%;width:250px;text-align:center">{procured}</p>
  
   <p class="position-absolute" style="bottom:7.7%;left:20%;font-size:12px">{issue_date}</p>

</body>

</html>