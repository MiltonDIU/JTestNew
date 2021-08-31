@extends('layouts.master')

@section('content')
  <div class="panel panel-default">
                    <div class="panel-heading">Create New Religion</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/religion') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />


                        <form method="POST" action="{{ url('/admin/religion') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.religion.form')

                        </form>

                    </div>
                </div>

@endsection
