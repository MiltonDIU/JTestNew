@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
                    <div class="panel-heading">Edit Result #{{ $result->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/result') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />



                        <form method="POST" action="{{ url('admin/result/' . $result->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.results.form', ['submitButtonText' => 'Update'])

                        </form>

                    </div>
                </div>

@endsection
