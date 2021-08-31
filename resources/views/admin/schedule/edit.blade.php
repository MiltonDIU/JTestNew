@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Edit Exam Schedule {{ $schedule->id }}</div>
        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::model($schedule, [
                'method' => 'PATCH',
                'url' => ['/' . Config("authorization.route-prefix") . '/schedule', $schedule->id],
                'class' => 'form-horizontal',
                'files' => true
            ]) !!}

            @include ('admin.schedule.form', ['submitButtonText' => 'Update'])

            {!! Form::close() !!}

        </div>
    </div>
@endsection