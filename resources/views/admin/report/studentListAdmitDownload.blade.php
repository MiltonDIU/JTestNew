
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
    .container_main{ page-break-after: always;}
table td{
  font-size:15px;  
}
</style>
@foreach($studentLists as $admit)
    <div class="container_main">
<table id="main">
    <tr>
        <td colspan="1" style="width: 33%; text-align: left">
            <img  style="max-width: 100px; top: 0" src="uploads/logo/{{Settings::config()['diu_logo']}}" class="img-responsive pic-bordered" alt="DIU Logo">

        </td>
        <td colspan="1" style="width: 34%; text-align: center">
            <img align="center" style="max-width: 120px"  src="uploads/logo/{{Settings::config()['logo']}}" class="img-responsive pic-bordered" alt="J-Test">

        </td>
        <td colspan="1" style="width: 33%; text-align: right" >
            <img style="max-width: 100px"  src="uploads/logo/{{Settings::config()['diil_logo']}}" class="img-responsive pic-bordered" alt="DIIL">
        </td>
    </tr>
    <tr>
        <td colspan="3"> <h3 style="text-align: center; font-size: 18px; padding: 0px; margin: 0px; text-decoration: underline">(Admit Card)</h3></td>
    </tr>
    <tr>
        <td colspan="2">
            <table class="table">

                <tr>
                    <td colspan="2"><strong>Applicant's Details</strong></td>
                </tr>
                <tr>
                    <td width="45%">Applicant Name: </td>
                    <td width="55%">{{$admit->user->name}}</td>
                </tr>

                <tr>
                    <td>
                        Date of Birth
                    </td>
                    <td>{{$admit->user->profile->dob}}</td>
                </tr>

                <tr>
                    <td>Identity Document:</td>
                    <td>{{$admit->user->profile->identity_type}}: {{$admit->user->profile->identity}}</td>
                </tr>
                <tr>
                    <td colspan="2"><strong>Exam Details</strong></td>
                </tr>
                <tr>

                    <td>Registration Number: </td>
                    <td>{{$admit->role_number}}</td>
                </tr>
                <tr>
                    <td>Exam Level: </td>
                    <td>{{$admit->exam_level->title}}</td>
                </tr>

                <tr>
                    <td>Exam Venue</td>
                    <td>{{$admit->schedule->exam_venue}}</td>
                </tr>
                <tr>
                    <td>Exam Date and Time: </td>
                    <td> {{ date_create($admit->schedule->exam_date)->format('d-m-Y, h:i:s A')}}</td>
                </tr>
            </table>
        </td>
        <td colspan="1" valign="top">
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
            <img style="max-height: 120px; max-width:180px" src="uploads/signature/{{$admit->user->profile->signature}}" alt="Student Signature">
            <br>
           
            Applicant Signature
        </td>

        <td colspan="1">
            <img  style="max-width: 120px; max-width:180px" src="uploads/signature/{{Settings::config()['signature']}}" alt="Director Signature">
            <br>
          
            Officer, DIL
        </td>

    </tr>
</table>

<table>
    <tr>
        <td>{!! Settings::config()['admit_message'] !!}</td>
    </tr>
</table>
    </div>
@endforeach
s