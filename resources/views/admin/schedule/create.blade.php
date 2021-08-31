@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Create New Exam Schedule</div>
        <div class="panel-body">

            {!! Form::open(['url' => '/' . Config("authorization.route-prefix") . '/schedule', 'class' => 'form-horizontal', 'files' => true]) !!}

            @include ('admin.schedule.form')

            {!! Form::close() !!}

        </div>
    </div>
@endsection
@include('notification.notify')