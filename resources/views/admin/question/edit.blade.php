@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Edit Question {{ $question->id }}</div>
        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::model($question, [
                'method' => 'PATCH',
                'url' => ['/' . Config("authorization.route-prefix") . '/question', $question->id],
                'class' => 'form-horizontal',
                'files' => true
            ]) !!}

            @include ('admin.question.form', ['submitButtonText' => 'Update'])

            {!! Form::close() !!}

        </div>
    </div>
@endsection