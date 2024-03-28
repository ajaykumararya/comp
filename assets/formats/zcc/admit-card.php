<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Admit Card</title>

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
        /* #1a4891; */
        .font {
            font-weight: bold;
            color: black;
            font-size: 13px;
        }
        

        #photo {
            z-index: 999;
            top: 15.3%;
            right: 43px;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/admit-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:109px;height:137px">
    </div>
    <div class="position-absolute font" style="top:15.4%;left:24%">{registration_no}</div>
    <div class="position-absolute font" style="top:18%;left:14%">{student_name}</div>
    <div class="position-absolute font" style="top:20.7%;left:20%">{father_name}</div>
    <div class="position-absolute font" style="top:23.3%;left:20%">{dob}</div>
    <div class="position-absolute font" style="top:26%;left:15%">{course_name}</div>
    
    
    
    <!-- <div class="position-absolute w-100" style="top:17.6%;padding-left:9px;z-index:9999">

        <table class="table table-bordered" style="margin-left:10%;width:64%">
            <tbody>
                <tr>
                    <td style="padding-left:60px">{registration_no}</td>
                </tr>
                <tr>
                    <td class="text-capitlize">{student_name}</td>
                </tr>
                <tr>
                    <td class="text-capitlize"  style="padding-left:40px">{father_name}</td>
                </tr>
                <tr>
                    <td class="text-capitlize"  style="padding-left:40px">{dob}</td>
                </tr>
                <tr>
                    <td>{course_name}</td>
                </tr>
                <tr>
                    <td>{enrollment_no}</td>
                </tr>
                <tr>
                    <td  style="padding-left:90px">{exam_date} </td>
                </tr>
                <tr>
                    <td style="padding-left:100px">{session}</td>
                </tr>
                <tr>
                    <td  style="padding-left:40px">{center_name}</td>
                </tr>
                <tr>
                    <td  style="padding-left:20px">{center_full_address}</td>
                </tr>
            </tbody>
        </table>
    </div> -->
</body>

</html>