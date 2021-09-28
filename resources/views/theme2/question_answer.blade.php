@extends('theme2.master')

@section('content')
    <!-- Hero -->

        @include('theme2.breadcrumb',['page'=>'J.TEST Question Answer'])

    <section class="page-section" style="padding-top: 8rem;">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <ul>
                    @foreach($questions as $item)
                        <li>
                            <a target="_blank" href="{{url($item->question_url?"$item->question_url":"")}}">{{$item->question_title}}</a> |
                            <a target="_blank" href="{{url($item->listening_url?"$item->listening_url":"")}}">{{$item->listening_title}}</a>|
                            <a target="_blank" href="{{url($item->answer_url?"$item->answer_url":"")}}">{{$item->answer_title}}</a>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </section>




@endsection


@push('style')
    <style>

    </style>

@endpush

@include('notification.notify')
