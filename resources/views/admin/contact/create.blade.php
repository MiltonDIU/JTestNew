@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
                    <div class="panel-heading">Create New Contact</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/contact') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/contact') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.contact.form')

                        </form>

                    </div>
                </div>

@endsection
