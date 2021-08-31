@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Home Settings</div>
        <div class="panel-body">

            {!! Form::open(['url' => '/' . Config("authorization.route-prefix") . '/settings', 'class' => 'form-horizontal', 'files' => true]) !!}

            @include ('admin.settings.form')

            {!! Form::close() !!}

        </div>
    </div>
@endsection
@include('notification.notify')