@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Create New Role</div>
        <div class="panel-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                    </div>
            @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif




            {!! Form::open(['url' => '/' . Config("authorization.route-prefix") . '/roles', 'class' => 'form-horizontal', 'files' => true]) !!}

            @include ('admin.roles.form')

            {!! Form::close() !!}

        </div>
    </div>
@endsection