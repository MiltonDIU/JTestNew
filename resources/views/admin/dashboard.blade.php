@extends('layouts.master')

@section('content')

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="#">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Dashboard</span>
            </li>
        </ul>

    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> Dashboard
    </h1>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-green-sharp">
                            <span data-counter="counterup" data-value="0">{{$student}}</span>
                        </h3>
                        <small>TOTAL Student</small>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
                        </span>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red-haze">
                            <span data-counter="counterup" data-value="0">{{$totalPaidStudent}}</span>
                        </h3>
                        <small>Total Paid Student</small>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                                            <span style="width: 100%;" class="progress-bar progress-bar-success red-haze">

                                            </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-sharp">
                            <span data-counter="counterup" data-value="0">{!! ($refundStudent+$nextExam) !!}</span>
                        </h3>
                        <small>Refund Student</small>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                                            <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">

                                            </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red-haze">
                            <span data-counter="counterup" data-value="0">{!! $totalPaidStudent-($refundStudent+$nextExam) !!}</span>
                        </h3>
                        <small>Grand Total Paid Student</small>
                    </div>
                </div>

                <div class="progress-info">
                    <div class="progress">
                                            <span style="width: 100%;" class="progress-bar progress-bar-success red-haze">

                                            </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-sharp">
                            <span data-counter="counterup" data-value="0">{{$cStudent}}</span>
                        </h3>
                        <small>Current Registration</small>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                                            <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">

                                            </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-haze">
                            <span data-counter="counterup" data-value="0">{{$paidStudent}}</span>
                        </h3>
                        <small>Current Paid Student</small>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                                            <span style="width: 100%;" class="progress-bar progress-bar-success blue-haze">

                                            </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-sharp">
                            <span data-counter="counterup" data-value="7800">{{$schedule}}</span>
                        </h3>
                        <small>Exam Schedule</small>
                    </div>

                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-sharp">
                            <span data-counter="counterup" data-value="7800">{{$notice}}</span>
                        </h3>
                        <small>Notice</small>
                    </div>

                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@include('notification.notify')

@push('styles')
   <style>
       .page-content{background:#EEF1F5!important;}
   </style>

    @endpush

@push('scripts')
