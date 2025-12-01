<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} - {roll_no} ID Card</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            overflow: hidden;
            font-weight: bold;
            background: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .id-box {
            width: 90mm;
            height: 55mm;
            position: relative;
        }

        .id-box img {
            width: 100%;
            height: 100%;
            display: block;
        }

        .position-absolute {
            position: absolute;
        }

        .text-center {
            text-align: center;
        }

        td,
        p {
            font-weight: bold;
            color: black;
            font-size: 15px;
            line-height: 1.815;
        }

        #photo {
            z-index: 999;
            top: 17.2%;
            left: 16.8%;
        }

        .test {
            border: 1px solid red;
        }
    </style>
</head>

<body class="page">
    <table>
        <tr>
            <!-- Front Side -->
            <td style="width: 50%;">
                <div class="id-box">
                    <img src="{document_path}/id-card.jpg" alt="Front Side" style="width:50%">

                    <div class="position-absolute" id="photo">
                        <img src="upload/{image}" style="width: 130px;height: 169.5px;border:4px solid #9bcb34">
                    </div>

                    <p class="position-absolute" style="top:32.4%;left:22%;text-align:left">
                        {roll_no}</p> 
                    <p class="position-absolute" style="top:34.85%;left:22%;text-align:left">{student_name}</p>
                    <p class="position-absolute" style="top:37.3%;left:22%;text-align:left">{father_name}</p>
                    <p class="position-absolute " style="top:39.75%;left:22%;text-align:left;width:26%;line-height:1;font-size:13px">{course_name}</p>
                    <p class="position-absolute" style="top:42.1%;left:22%;text-align:left">{dob}</p>
                    <p class="position-absolute" style="top:44.6%;left:22%;text-align:left">{contact_number}</p>
                    <p class="position-absolute" style="top:46.9%;left:22%;text-align:left;width:200px">{blood_group}</p>
                </div>
            </td>

            <!-- Back Side -->
            <td style="width:50%">
                <div class="id-box">
                    <!-- <img src="{document_path}/id-card-back.jpg" alt="Back Side"> -->
                </div>
            </td>
        </tr>
    </table>
</body>

</html>