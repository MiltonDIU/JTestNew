@extends('layouts.master')

@section('content')
   <div class="panel panel-default">
                    <div class="panel-heading">Create New Result</div>
       @if ($errors->any())
           <ul class="alert alert-danger">
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       @endif
                    <div class="panel-body">
                        <a href="{{ url('/admin/result') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

{!! Form::open(['url' => '/' . Config("authorization.route-prefix") . '/result', 'class' => 'form-horizontal', 'files' => true]) !!}

@include ('admin.results.form')

{!! Form::close() !!}


                    </div>
                </div>

@endsection
