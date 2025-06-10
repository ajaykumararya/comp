<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{name} Franchise Id Card</title>
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
    <img id="back-image" class="position-relative" src="{document_path}/franchise-id-card.jpg" style="width:50%;margin:0">
    <div class="position-absolute" style="width: 98px;top:11.95%;left:17.8%">
        <img src="upload/{image}" style="width: 100%; height: 115px;" />
    </div>
    <p class="position-absolute text-center " style="top:22%;width:390px;font-size:20px">{name}</p>
    <div class="position-absolute" style="top:29%;left:10px;width:380px">
        <table style="text-align:left;width:100%">
            <tr>
                <th>Center Code</th>
                <th>:</th>
                <td>{center_number}</td>
            </tr>
            <tr>
                <th>Center Name & Address</th>
                <th>:</th>
                <td>{institute_name} & {center_full_address}</td>
            </tr>
            <tr>
                <th>Issue Date</th>
                <th>:</th>
                <td>{id_card_issue_date}</td>
            </tr>
        </table>
    </div>
    <div class="position-absolute" style="width: 70px;top:42%;left:17.8%;">
        <img src="<?=$this->ki_theme->generate_qr($id,'fracnhise-id-card',current_url(),true)?>" style="padding:0;width: 100%;height:100%" />
    </div>
</body>

</html>