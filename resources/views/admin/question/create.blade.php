@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Create New Question</div>
        <div class="panel-body">

            {!! Form::open(['url' => '/' . Config("authorization.route-prefix") . '/question/', 'class' => 'form-horizontal', 'files' => true]) !!}

            @include ('admin.question.form')

            {!! Form::close() !!}

        </div>
    </div>
@endsection
@include('notification.notify')