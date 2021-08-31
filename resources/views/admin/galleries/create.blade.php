@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Create New Gallery</div>
        <div class="panel-body">

            {!! Form::open(['url' => '/' . Config("authorization.route-prefix") . '/gallery', 'class' => 'form-horizontal', 'files' => true]) !!}

            @include ('admin.galleries.form')

            {!! Form::close() !!}

        </div>
    </div>
@endsection
@include('notification.notify')