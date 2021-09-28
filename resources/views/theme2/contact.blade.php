@extends('theme2.master')

@section('content')
    @include('theme2.partials.hero',['page'=>'Contact'])
    <section class="page-section" style="padding-top: 2rem;">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                {!! Settings::config()['contact'] !!}

        </div>
        </div>
    </section>

@endsection


@push('style')
    <style>

    </style>

@endpush

@include('notification.notify')
