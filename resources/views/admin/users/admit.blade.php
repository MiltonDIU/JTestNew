@extends('layouts.master')
@section('content')

    <!-- END THEME PANEL -->
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/')}}">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Profile</span>
            </li>
        </ul>
         </div>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <br>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="{{url('uploads/avatar/'.$admit->user->profile->avatar)}}" class="img-responsive pic-bordered" alt=""> </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> {{$admit->user->name}} </div>
                        <div class="profile-usertitle-job"> {{$admit->user->email}} </div>
                        <br>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                </div>
                <!-- END PORTLET MAIN -->
                <!-- PORTLET MAIN -->

                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PORTLET -->
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption caption-md">
                                    <i class="icon-bar-chart theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Details Information</span>
                                </div>

                            </div>
                            <div class="portlet-body">

                                <div class="table-scrollable table-scrollable-borderless">
                                    <table class="table">

<tr>
    <td colspan="1" style="width: 33%; text-align: left">
        <img  style="max-width: 100px;" src="{{url('uploads/logo/'.Settings::config()['diu_logo'])}}" class="img-responsive pic-bordered" alt="DIU Logo">

    </td>
    <td colspan="1" style="width: 34%; text-align: center">
        <img align="center" style="max-width: 120px"  src="{{url('uploads/logo/'.Settings::config()['logo'])}}" class="img-responsive pic-bordered" alt="J-Test">
(Admit Card)
    </td>
    <td colspan="1" style="width: 33%; text-align: right" >
        <img style="max-width: 100px"  src="{{url('uploads/logo/'.Settings::config()['diil_logo'])}}" class="img-responsive pic-bordered" alt="DIIL">
    </td>
</tr>
<tr>
    <td colspan="2">
        <table class="table">
            <tr>
                <td width="50%">APPLICANTS’ NAME: </td>
                <td width="50%">{{$admit->user->name}}</td>
            </tr>
            <tr>
                <td>Role No: </td>
                <td>{{$admit->role_number}}</td>
            </tr><tr>
                <td>Exam Date and Time: </td>
                <td>{{$admit->schedule->exam_date}}</td>
            </tr><tr>
                <td>Exam Venue</td>
                <td>{{$admit->schedule->exam_venue}}</td>
            </tr><tr>
                <td>NID/Passport/Birth Registration Number:</td>
                <td></td>
            </tr>
        </table>
    </td>
    <td colspan="1">
        <table class="table">
            <tr>
                <td>
                    <img src="{{url('uploads/avatar/'.$admit->user->profile->avatar)}}" class="img-responsive pic-bordered" alt="">

                                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
<td colspan="2">
    <img  style="max-width: 220px;" src="{{url('uploads/signature/'.Settings::config()['signature'])}}" alt="Director Signature">
</td>
<td colspan="1"> <img style="max-width: 220px;" src="{{url('uploads/signature/'.$admit->user->profile->signature)}}" alt="Student Signature">
</td>

</tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END PORTLET -->
                    </div>

                </div>
                 </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>

@endsection


@push('styles')
    <link href="{{url('assets/admin/pages/css/profile.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .page-content{background: #EEF1F5!important;}
    </style>
    @endpush
@include('notification.notify')