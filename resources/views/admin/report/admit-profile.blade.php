@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Admit and Profile</div>
        <div class="panel-body">
            <div class="col-md-6">
                @if(isset($userSchedule[0]))
                    <?php
                    $j = 0;

                    ?>
                    @for($i=0;$i < count($userSchedule) ;$i+=50)
                        <a class="btn btn-success admit-profile" href='{{ url("/" . Config("authorization.route-prefix") . "/student-list-profile/exam-level/".Request::segment(4).'/schedule/'.Request::segment(6).'/download/'.$userSchedule[$j]->role_number) }}'>
                            Download Profile  {{$j+1}} to {{$j+50}}
                        </a>

                        <br>
                        <?php
                        $j += 50;
                        ?>
                    @endfor
                @else
                    No
                @endif
            </div>
            <div class="col-md-6">

                @if(isset($userSchedule[0]))
                    <?php
                    $j = 0;

                    ?>
                    @for($i=0;$i < count($userSchedule) ;$i+=50)
                        <a class="btn btn-success admit-profile " href='{{ url("/" . Config("authorization.route-prefix") . "/student-list-admit/exam-level/".Request::segment(4).'/schedule/'.Request::segment(6).'/download/'.$userSchedule[$j]->role_number) }}'>
                            Download Admit Card {{$j+1}} to {{$j+50}}
                        </a>

                        <br>
                        <?php
                        $j += 50;
                        ?>
                    @endfor
                @else
                    No
                @endif



            </div>

        </div>
    </div>
@endsection
@include('notification.notify')

@push('styles')
    <style>
    .admit-profile{margin-bottom: 10px}

    </style>
@endpush
