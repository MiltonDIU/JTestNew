@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Edit Notice {{ $notice->id }}</div>
        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::model($notice, [
                'method' => 'PATCH',
                'url' => ['/' . Config("authorization.route-prefix") . '/notice', $notice->id],
                'class' => 'form-horizontal',
                'files' => true
            ]) !!}

            @include ('admin.notices.form', ['submitButtonText' => 'Update'])

            {!! Form::close() !!}

        </div>
    </div>
@endsection