@extends('theme.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12" >

                <div style="margin:0 auto;">
                     <h3 align="left"><strong>J.TEST Question Answer:</strong></h3>

                    <div class="container" style="margin-top:30px;">
                        <div class="row">
                            <div class="col-md-12">
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
                    </div>
                </div>
		 
		
              
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
@push('script')
<script>

</script>
@endpush
@include('notification.notify')