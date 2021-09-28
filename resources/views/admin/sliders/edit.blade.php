@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Edit Gallery {{ $slider->id }}</div>
        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::model($slider, [
                'method' => 'PATCH',
                'url' => ['/' . Config("authorization.route-prefix") . '/slider', $slider->id],
                'class' => 'form-horizontal',
                'files' => true
            ]) !!}

            @include ('admin.sliders.form', ['submitButtonText' => 'Update'])

            {!! Form::close() !!}

        </div>
    </div>
@endsection
