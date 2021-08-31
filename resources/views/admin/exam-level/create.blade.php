@extends('layouts.master')

@section('content')

                <div class="panel panel-default">
                    <div class="panel-heading">Create New Exam Level</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/exam-level') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        <form method="POST" action="{{ url('/admin/exam-level') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.exam-level.form')

                        </form>

                    </div>
                </div>

@endsection
