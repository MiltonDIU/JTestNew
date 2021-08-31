@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Edit Gallery {{ $gallery->id }}</div>
        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::model($gallery, [
                'method' => 'PATCH',
                'url' => ['/' . Config("authorization.route-prefix") . '/gallery', $gallery->id],
                'class' => 'form-horizontal',
                'files' => true
            ]) !!}

            @include ('admin.galleries.form', ['submitButtonText' => 'Update'])

            {!! Form::close() !!}

        </div>
    </div>
@endsection