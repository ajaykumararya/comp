<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{company_name} ISO</title>

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
            top:4%;
            right:5%;
            padding:0
        }
        #photo1 {
            z-index: 999;
            top: 28.8rem;
            right: 6rem;
            width: 120px !important;
            ;
            height: 95px;
        }
        #center_signature{
            z-index: 999;
            top: 28.8rem;
            left: 23rem;
            width: 120px !important;
            ;
            height: 95px;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/iso.jpg">
    <div class="position-absolute" id="photo" style="">
        <img src="<?=$this->ki_theme->generate_qr(1,null,current_url(),true)?>" style="width:80px;border:2px solid black;">
    </div>
    <p class="position-absolute "  style="top:21.8%;left:5%;width:90%;text-align:center" align="center">
        <h1 style="font-size:2.7rem;line-height:1;font-weight:900">{company_name}</h1>
        <span style="font-size:1.2rem;line-height:1">{address}</span>
    </p>
    <p class="position-absolute" style="top:50%;left:20%;width:60%;text-align:center;font-size:1.2rem">
        {service}
    </p>

    <p class="position-absolute" style="top:61.15%;left:32%;font-size:1rem">{certificate_no}</p>
    <p class="position-absolute" style="top:63.6%;left:32%;font-size:1rem">{org_cert_date}</p>
    <p class="position-absolute" style="top:66.2%;left:32%;font-size:1rem">{issue_date}</p>
    <p class="position-absolute" style="top:69%;left:32%;font-size:1rem">{expiry_date}</p>

</body>

</html>