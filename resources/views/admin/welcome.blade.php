@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
          <h2>Hello     {{Auth::user()->name}}</h2>
        </div>
    </div>


@endsection
@include('notification.notify')

