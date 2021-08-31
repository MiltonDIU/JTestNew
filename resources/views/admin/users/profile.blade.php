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
                        <img src="{{url('uploads/avatar/'.$user->profile->avatar)}}" class="img-responsive pic-bordered" alt=""> </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> {{$user->name}} </div>
                        <div class="profile-usertitle-job"> {{$user->email}} </div>
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
                                @if ( Auth::user()->role->name=="Admin" )
                                    <a  class="download" href="{{url('admin/admit/'.$user->id)}}">
                                        Admit Download
                                    </a>
                                @endif


                            @if($user->user_schedule->count() > 0)
                                    <a style="margin: 0px 20px"  class="download" href="{{url('admin/profile/'.$user->id.'/exam-level/'.$user->user_schedule->last()->exam_level_id.'/schedule/'.$user->user_schedule->last()->schedule_id.'/download')}}">
                                       Profile Download
                                    </a>
                                @endif
                            </div>
                            <div class="portlet-body">

                                <div class="table-scrollable table-scrollable-borderless">
                                    <table class="table table-hover table-light">
                                        <tbody>
                                        @if(isset($user->user_schedule->last()->schedule))
                                            <tr>
                                                <td>
                                                    <span class="primary-link">Registration of Exam Title</span>
                                                </td>
                                                <td> {{$user->user_schedule->last()->schedule->title}} </td>
                                            </tr>
                                            <tr>
                                                <td> <span class="primary-link">  Exam Date</span>

                                                </td>
                                                <td>

                                                    {{ date_create($user->user_schedule->last()->schedule->exam_date)->format('d M Y')}}

                                                </td>
                                            </tr>
                                        @endif


                                        <tr>
                                            <td>
                                                <span class="primary-link">Registration Number</span>
                                            </td>
                                            <td>
                                                @foreach($user->user_schedule as $role)
                                                    @if($user->user_schedule->last()->schedule->exam_level_id===$role->exam_level_id)
                                                        {{($role->role_number)}}
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <span class="primary-link">Name</span>
                                            </td>
                                            <td> {{$user->name}} </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Email</span>
                                            </td>
                                            <td> {{$user->email}} </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Mobile</span>
                                            </td>
                                            <td> {{$user->mobile}} </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Gender</span>
                                            </td>
                                            <td> {{$user->gender}} </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Date of Birth</span>
                                            </td>
                                            <td> {{$user->profile->dob}} </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Father's Name</span>
                                            </td>
                                            <td> {{$user->profile->father_name}} </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Mother's Name</span>
                                            </td>
                                            <td> {{$user->profile->mother_name}} </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <span class="primary-link">Religion</span>
                                            </td>
                                            <td> {{$user->profile->religion->title}} </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <span class="primary-link">Nationality</span>
                                            </td>
                                            <td> {{$user->profile->nationality}} </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Identity</span>
                                            </td>
                                            <td> {{$user->profile->identity}} </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <span class="primary-link">Identity Document</span>
                                            </td>
                                            <td> <img style="max-width: 400px" src="{{url('uploads/identity/'.$user->profile->identity_file)}}" alt="{{$user->name}}"> </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <span class="primary-link">Signature</span>
                                            </td>
                                            <td> <img style="max-width: 400px" src="{{url('uploads/signature/'.$user->profile->signature)}}" alt="not found signature"> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Address</span>
                                            </td>
                                            <td> {{$user->profile->address}} </td>
                                        </tr>
                                        </tbody></table>
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
        .download{
            float: right;
            line-height: 38px;
            font-size: 22px;
        }
    </style>
@endpush
@include('notification.notify')