@extends('layouts.master')

@section('content')

                <div class="panel panel-default">
                    <div class="panel-heading">Edit Exam Level #{{ $exam_level ->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/exam-level') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />




                        {!! Form::model($exam_level, [
     'method' => 'PATCH',
     'url' => ['/' . Config("authorization.route-prefix") . '/exam-level', $exam_level->id],
     'class' => 'form-horizontal',
     'files' => true
 ]) !!}

                        @include ('admin.exam-level.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}




                    </div>
                </div>

@endsection
