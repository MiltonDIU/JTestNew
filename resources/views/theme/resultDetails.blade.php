@extends('theme.master')

@section('content')

    <div class="container">

<div class="row">
    <div class="col-xl-12 col-lg-12 col-xs-12">
         <article class="entry">
                <div class="entry-meta">
                    <time class="entry-time" datetime="2017-01-15">{{$result->created_at}}</time>

                </div>

                <h1 class="entry-title">{{$result->schedule->title}}</h1>
                <div class="entry-content">

    <object data="{{url('uploads/results/'.$result->result_file)}}" type="application/pdf" width="100%" height="100%">
        <a href="{{url('uploads/results/'.$result->result_file)}}">Downloads</a>
    </object>




                     </div>
            </article>


    </div>

</div>
    </div>


@endsection
@push('style')

    <style>
        .header{position: relative; background:black}
        .main-elevated{margin-top:25px;}
        .logo_row{padding-bottom: 30px}
        .list-item-title{color: black; font-size: 14px}
    </style>
@endpush