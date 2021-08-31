    <style type="text/css">
        table{width: 100%}
        .container{border: 1px solid gray; width: 100%;  margin: 0 auto; padding: 7px}
        .row{float: left; width: 100%}
        .col-3{width: 33%; float: left; padding: 0px; margin: 0px;}
        .col-4{width: 40%; float: left; padding: 0px; margin: 0px;}
        .col-6{width: 50%; float: left; padding: 0px; margin: 0px;}
        .col-9{width: 67%; float: left; padding: 0px; margin: 0px;}
        .col-8{width: 60%; float: left; padding: 0px; margin: 0px;}
        .center{text-align: center; width: 34%;}
        .right{text-align: right; }
        .profile{text-align: right; top:0 }
        .left img{padding-left: 30px }
        .col-10{width: 85%; float: left; padding: 0px; margin: 0px}
        .col-2{width:15%; float: left; padding: 0px; margin: 0px}
        .app-form{font-size: 16px; font-weight: bold;}
        .title{font-size: 16px}
        .border{border-bottom: 0px;}
         td{padding: 20px 0px}
        .container_main{ page-break-after: always;}
    </style>
@foreach($studentLists as $student)
    <div class="container_main">
        <table class="container border">
    <tr class="row">
        <td class="col-3 left"><img src="uploads/logo/{{Settings::config()['diu_logo']}}"></td>
        <td class="col-3 center"><img src="uploads/logo/{{Settings::config()['logo']}}">
            <br><span class="app-form">(Application Form)</span></td>
        <td class="col-3 right"><img src="uploads/logo/{{Settings::config()['diil_logo']}}"></td>

    </tr>
</table>
<table class="container">
    <tr class="row">
        <td class="col-10">
            <table>
                <tr class="row">
                    <td class="col-4 title">
                       Registration Number
                    </td>
                    <td class="col-8"> {{$student->role_number}}</td>
                </tr>
                <tr class="row">
                    <td class="col-4 title">
                        Applicant Name
                    </td>
                    <td class="col-8"> {{$student->user->name}}</td>
                </tr>
                <tr class="row">
                    <td class="col-4 title">
                        Exam Level
                    </td>
                    <td class="col-8">{{$student->exam_level->title}}</td>
                </tr>
                <tr class="row">
                    <td class="col-4 title">
                        Exam Schedule
                    </td>
                    <td class="col-8"> {{ $student->schedule->title}}</td>
                </tr>
                <tr class="row">
                    <td class="col-4 title">
                        Exam Date
                    </td>
                    <td class="col-8">
                        {{ date_create($student->schedule->exam_date)->format('d M Y')}}
                    </td>
                </tr>
                <tr class="row">
                    <td class="col-4 title">
                        Email
                    </td>
                    <td class="col-8">{{$student->user->email}}</td>
                </tr>
                <tr class="row">
                    <td class="col-4 title">
                        Mobile
                    </td>
                    <td class="col-8">{{$student->user->mobile}}</td>
                </tr>
                <tr class="row">
                    <td class="col-4 title">
                        Gender
                    </td>
                    <td class="col-8">{{$student->user->gender}}</td>
                </tr>
                <tr class="row">
                    <td class="col-4 title">
                        Date of Birth
                    </td>
                    <td class="col-8">{{$student->user->profile->dob}}</td>
                </tr>
                <tr class="row">
                    <td class="col-4 title">
                        Father's Name
                    </td>
                    <td class="col-8">{{$student->user->profile->father_name}}</td>
                </tr>
                <tr class="row">
                    <td class="col-4 title">
                        Mother's Name
                    </td>
                    <td class="col-8">{{$student->user->profile->mother_name}}</td>
                </tr>
                <tr class="row">
                    <td class="col-4 title">
                        Nationality
                    </td>
                    <td class="col-8">{{$student->user->profile->nationality}}</td>
                </tr>
                <tr class="row">
                    <td class="col-4 title">
                        Religion
                    </td>
                    <td class="col-8">{{$student->user->profile->religion->title}}</td>
                </tr>
                <tr class="row">
                    <td class="col-4 title">
                        Identity
                    </td>
                    <td class="col-8">{{$student->user->profile->identity}}</td>
                </tr>
                <tr class="row">
                    <td class="col-4 title">
                        Identity File
                    </td>
                    <td class="col-8">
                        <img width="200" style="max-height: 280px" src="uploads/identity/{{$student->user->profile->identity_file}}">
                    </td>
                </tr>
                <tr class="row">
                    <td class="col-4 title">
                        Address
                    </td>
                    <td class="col-8">{{$student->user->profile->address}}</td>
                </tr>
                <tr class="row">
                    <td class="col-4 title">
                        Signature
                    </td>
                    <td class="col-8 "><img style="max-width: 250px" src="uploads/signature/{{$student->user->profile->signature}}"></td>
                </tr>
            </table>
        </td>
        <td class="col-2 profile">
            <img style="position:absolute; top: 100px; right:0px; max-width: 180px" src="uploads/avatar/{{$student->user->profile->avatar}}">
        </td>
    </tr>
</table>
    </div>
@endforeach
