<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} MARKSHEET</title>
    {basic_header_link}
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .primary{
            color:#0651a4
        }
        .text-capitlize {
            text-transform: capitalize;
        }

        .position-relative {
            position: relative;
        }

        .position-absolute {
            position: absolute;
            padding-left:10px
        }

        .w-100 {
            width: 100%;
            display: grid;
        }

        p {
            font-weight: bold;            
            color: black;
            font-size: 14px;
            display: inline-block;
            /* word-spacing: 1px; */
        }

        #photo {
            z-index: 999;
            top: 22.89%;
            right: 49.4px;
        }
        
        table#first {
            color: black;
            font-size: 14px;
            border-collapse: collapse;
        }
        /* table td, */
        table th:nth-child(1),table,tfoot tr{
            border : 1px solid #1a4891;
            text-align: center;
            font-weight: bold;
            padding:0;
            margin:0;
            line-height:0!important;
        }
        table tr:nth-child(1){
            padding:0!important;
            margin:0!important;
            line-height:0!important;
        }
        .b-tb{
            border-top:1xp solid #1a4891;
            border-bottom: 1px solid #1a4891;
        }
        .rmrb{
            border-right:0px!important
        }
        .rmb{
            border-left:0px solid transparent!important;
        }
        .lb{
            border-left: 1px solid #1a4891;
        }
        table head tr th{
            color: #0651a4 !important;
        }
        table tr td{
                        line-height:1.6;
        }
        .p-0{
            padding: 0 !important;;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/marksheet.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:85px;height:108px">
    </div>
    <p class="position-absolute" style="top:22.1%;left:25%;font-size:14px;color:black">{roll_no}</p>
    <p class="position-absolute" style="top:13.67%;left:77%;font-size:12px;color:black;width:130px;text-align:center;">{enrollment_no}</p>
    <p class="position-absolute" style="top:25.9%;left:29.1%;width:250px">{student_name}</p>
    <p class="position-absolute" style="top:25.76%;left:68.5%;width:100px">{dob}</p>

    <p class="position-absolute" style="top:29%;left:16%;width:210px">{father_name}</p>
    <p class="position-absolute" style="top:29.1%;left:56.3%;width:220px;z-index:999999">{mother_name}</p>

    <p class="position-absolute" style="top:32.3%;left:20%;width:550px">{course_name}</p>

    <p class="position-absolute" style="top:35.5%;left:50%;width:70px;text-align:center">{grade}</p>
    <p class="position-absolute" style="top:35.5%;left:74.5%;width:130px;text-align:center">{duration} {duration_type}</p>


    <p class="position-absolute" style="top:38.7%;left:32%;width:500px">{center_name}</p>
    <div class="position-absolute " style="top:47%;left:8%;width:84%;padding:0">
        <table id="first" border="0" style="width:100%">
            <thead>
                <tr>
                    <th class="primary" rowspan="2" width="53%" style="text-align:left;padding-left:35px">SUBJECTS</th>
                    <th class="primary" colspan="2" style="font-size:10.81px;padding:4px">MAXIMUM MARKS</th>
                    <th class="primary lb" colspan="2" style="font-size:10.81px;padding:4px">MINIMUM MARKS</th>
                    <th class="primary lb" colspan="3" style="font-size:10.81px;padding:4px">OBTAINED MARKS</th>
                </tr>
                <tr>
                    <th class="primary b-tb" style="font-size:10px">THEORY</th>
                    <th class="primary b-tb" style="font-size:10px">PRACTICAL</th>
                    <th class="primary b-tb lb" style="font-size:10px">THEORY</th>
                    <th class="primary b-tb" style="font-size:10px">PRACTICAL</th>
                    <th class="primary b-tb lb" style="font-size:10px">TH.</th>
                    <th class="primary b-tb" style="font-size:10px">PR.</th>
                    <th class="primary b-tb" style="font-size:10px">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                {marks}
                <tr>
                    <td class="primary lb" style="text-align:left;padding-left:2px">{subject_name}</td>
                    <td class="primary lb">{theory_max_marks}</td>
                    <td class="primary lb">{practical_max_marks}</td>
                    <td class="primary lb">{theory_min_marks}</td>
                    <td class="primary lb">{practical_min_marks}</td>
                    <td class="lb">{theory_total}</td>
                    <td>{practical_total}</td>
                    <td class="">{total}</td>
                </tr>
                {/marks}
            </tbody>
            <tfoot>
                <tr>
                    <td class="primary">TOTAL</td>
                    <td class="primary lb">{total_max_theory}</td>
                    <td class="primary">{total_max_practical}</td>
                    <td class="primary lb">{total_min_theory}</td>
                    <td class="primary">{total_min_practical}</td>
                    <td class="lb"></td>
                    <td></td>
                    <td class="">{obtain_total}</td>
                </tr>
            </tfoot>

        </table>
    </div>
    <!-- <p class="position-absolute" style="bottom:31.4%;left:33%;font-size:15px">{total}</p> -->
    <p class="position-absolute p-0" style="bottom:20.9%;left:45.7%;font-size:15px;padding:0">({percentage}%)</p>
    <p class="position-absolute p-0" style="bottom:20.9%;left:66%;font-size:15px;padding:0;width:40px">{grade}</p>

    <p class="position-absolute p-0" style="bottom:18.3%;left:37.5%;font-size:15px;padding:0">{session}</p>
    <p class="position-absolute p-0" style="bottom:18.3%;left:62%;font-size:15px;padding:0">{issue_date}</p>
    
    <div class="position-absolute" style="bottom:10.1%;left:45.4%;">
        <img src="upload/images/marksheet_{result_id}.png" style="width:88px;height:88px;" alt="">

    </div>
</body>

</html>