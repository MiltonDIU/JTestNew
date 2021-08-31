@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Create New Notice</div>
        <div class="panel-body">

            {!! Form::open(['url' => '/' . Config("authorization.route-prefix") . '/notice', 'class' => 'form-horizontal', 'files' => true]) !!}

            @include ('admin.notices.form')

            {!! Form::close() !!}

        </div>
    </div>
@endsection
@include('notification.notify')