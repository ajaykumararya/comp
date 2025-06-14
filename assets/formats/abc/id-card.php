<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Id Card</title>
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
            width: 400px;
            /* word-spacing: 1px; */
        }

        #photo {
            z-index: 999;
            top: 30%;
            left: 40%;
        }

        #back-image {
            width: 100%;
            margin-left: 32px;
        }

        .image {
            border-radius: 30px;
        }

        .test {
            border: 1px solid red
        }

        .text-center {
            text-align: center;
        }
        table tr th,
        table tr td{
            font-size: 16px;
            text-align: left;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/id-card.jpg" style="width:50%;margin:0">
    <div class="position-absolute" style="width: 120px;top:14%;left:17.2%">
        <img src="upload/{image}" style="width: 100%; height: 100%;" />
    </div>
    <p class="position-absolute text-center" style="top:24.3%;width:400px;font-size:20px">{student_name}</p>
    <div class="position-absolute" style="top:34%;left:10px;width:380px">
        <table style="text-align:left;width:100%">
            <tr>
                <th>Father's Name</th>
                <th>:</th>
                <td>{father_name}</td>
            </tr>
            <tr>
                <th>Address</th>
                <th>:</th>
                <td>{address}</td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <th>:</th>
                <td>{dob}</td>
            </tr>
            <tr>
                <th>Course Name</th>
                <th>:</th>
                <td>{course_name}</td>
            </tr>
            <tr>
                <th>Roll Number</th>
                <th>:</th>
                <td>{roll_no}</td>
            </tr>
        </table>
    </div>
    <p class="position-absolute text-center" style="top:55%;;width:400px">{center_full_address}</p>
    <p class="position-absolute text-center " style="top:1%;;width:400px">{center_name}</p>
    <div class="position-absolute" style="width: 70px;top:15%;left:37%;">
        <img src="<?=$this->ki_theme->generate_qr($student_id,'id-card',current_url(),true)?>" style="padding:0;width: 100%;height:100%" />
    </div>
    <!-- <p class="position-absolute" style="top:15.2%;left:20rem;">{roll_no}</p>
        <p class="position-absolute" style="top:19.3%;left:36.5%">{father_name}</p>
        <p class="position-absolute " style="top:21.5%;left:36.5%">{address}</p>
        <p class="position-absolute " style="top:23.6%;left:36.5%">{dob}</p>
        <p class="position-absolute " style="top:25.8%;left:36.5%">{course_name}</p>
        <p class="position-absolute " style="top:27.9%;left:36.5%">{center_name}</p> -->
    <!-- <div class="position-absolute" style="top:23.7rem;left:1.7%;">
        <img src="upload/images/id_card_{student_id}.png" style="width:110px;height:110px;" alt="">
    </div> -->
</body>

</html>