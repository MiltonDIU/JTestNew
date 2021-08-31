<!DOCTYPE html>
<html>
<head>
    <title>Download</title>
    <style>
        #main{
            border: 1px solid #ccc;
            margin: 0;

            width: 99%;
            margin-top:50px;

        }
        #table tr{

            border-bottom: 1px solid #2e9ad0;
        }

        table caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
        }
        table tr {
            border: 1px solid #F8F8F8;
            padding: 3px;
        }
        table th,
        table td {
            padding: 5px;
            text-align: left;
        }
        table th {
            font-size: 1px;
            letter-spacing: .1em;
            text-transform: uppercase;
        }


    </style>
</head>
<body>

<table id="main">

    <tr>
        <td colspan="1" style="width: 33%; text-align: left">
            <img  style="max-width: 100px;" src="uploads/logo/{{Settings::config()['diu_logo']}}" class="img-responsive pic-bordered" alt="DIU Logo">

        </td>
        <td colspan="1" style="width: 34%; text-align: center">
            <img align="center" style="max-width: 120px"  src="uploads/logo/{{Settings::config()['logo']}}" class="img-responsive pic-bordered" alt="J-Test">
            <br><h2>(Admit Card)</h2>
        </td>
        <td colspan="1" style="width: 33%; text-align: right" >
            <img style="max-width: 100px"  src="uploads/logo/{{Settings::config()['diil_logo']}}" class="img-responsive pic-bordered" alt="DIIL">
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table class="table">
                <tr>
                    <td width="50%">Application’ Name: </td>
                    <td width="50%">{{$admit->user->name}}</td>
                </tr>
                <tr>
                    <td>Registration Number: </td>
                    <td>{{$admit->role_number}}</td>
                </tr><tr>
                    <td>Exam Date and Time: </td>
                    <td>{{$admit->schedule->exam_date}}</td>
                </tr><tr>
                    <td>Exam Venue</td>
                    <td>{{$admit->schedule->exam_venue}}</td>
                </tr><tr>
                    <td>NID/Passport/Birth Registration Number:</td>
                    <td>{{$admit->user->profile->identity}}</td>
                </tr>
            </table>
        </td>
        <td colspan="1">
            <table class="table">
                <tr>
                    <td>
                        <img width="180" src="uploads/avatar/{{$admit->user->profile->avatar}}" class="img-responsive pic-bordered" alt="">

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <img  style="max-width: 220px;" src="uploads/signature/{{Settings::config()['signature']}}" alt="Director Signature">
            <br>
            <br>
            Application’ Signature
        </td>
        <td colspan="1"> <img style="max-width: 220px;" src="uploads/signature/{{$admit->user->profile->signature}}" alt="Student Signature">
        <br>
        <br>
            Director, DIL
        </td>

    </tr>
</table>

</body>
</html>