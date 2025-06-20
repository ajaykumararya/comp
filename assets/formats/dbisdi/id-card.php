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
        table tr td {
            font-size: 16px;
            text-align: left;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/id-card.jpg" style="width:50%;margin:0">
    <div class="position-absolute" style="top:14.4%;left:16.6%">
        <img src="upload/{image}" style="width: 132px;height:170px;border:3px solid #fe6502" />
    </div>
    <p class="position-absolute" style="top:29.9%;left:20%">{student_name}</p>


    <p class="position-absolute" style="top:31.8%;left:20%">{father_name}</p>
    <p class="position-absolute" style="top:33.8%;left:20%;">{roll_no}</p>
    <p class="position-absolute " style="top:35.7%;left:20%">DBISDI</p>
    <p class="position-absolute " style="top:37.6%;left:20%">{batch_name}</p>
    <p class="position-absolute " style="top:39.5%;left:20%">{dob}</p>
    <p class="position-absolute " style="top:41.4%;left:20%">{contact_number}</p>
    <!-- <div class="position-absolute" style="top:23.7rem;left:1.7%;">
        <img src="upload/images/id_card_{student_id}.png" style="width:110px;height:110px;" alt="">
    </div> -->
</body>

</html>