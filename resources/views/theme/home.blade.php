@extends('theme.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                {!! Settings::config()['content'] !!}
            </div>
            <div class="col-md-3">
                <div class="news-title">
                    <h5>News</h5>
                </div>
                <div class="news">
                    <ul>

@foreach(\App\Helpers\SettingsHelper::noticeHome() as $notice)
                        <li>
                            <div class="title"><a class="list-item-title" href="{{ url('notice/details/' . $notice->id.'/'.$notice->alias) }}">{{$notice->title}}</a></div>
                            <span>{{$notice->notice_category->title}}, {{$notice->created_at->format('d M Y')}}</span>
                        </li>
@endforeach
                    </ul>
                </div>

                <div class="news-title" style="margin-top: 30px;">
                    <h5>Gallery</h5>
                </div>
                <div class="gallery">
                    @foreach(\App\Helpers\SettingsHelper::gallery() as $gallery)
                        <div class="col-md-6" style="padding: 0px; margin: 0px">
                            <a href="{{url($gallery->url)}}" class="fancylight popup-btn" data-fancybox-group="light">
                                <img class="img-fluid" src="{{url($gallery->url)}}" alt="">
                            </a>
                        </div>
                    @endforeach
                    <a href="{{url('gallery')}}">more..</a>
                </div>


            </div>
        </div>
    </div>


@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/datatable/css/material.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/datatable/css/dataTables.material.min.css')}}"/>
    <style>
        .header{position: relative; background:black}
        .main-elevated{margin-top:25px;}
        .logo_row{padding-bottom: 30px}
        .gallery{
            width: 100%;
            margin: 0px auto;
            overflow: hidden;
            border: 1px solid #e4eef3;
            box-shadow: 0px 1px 5px #aaa;
        }
        .list-item-title{color: black; font-size: 14px}

        .news{
            width: 100%;
            margin: 0px auto;
            height: 200px;
            overflow: hidden;
            border: 1px solid #e4eef3;
            box-shadow: 0px 1px 5px #aaa;
        }

        .news ul{
            list-style:none;
            position:relative;
            padding: 0px;
        }
        .news h5{
            text-align: center;
            color: #0b94ea;
            border-bottom: 1px solid #e4eef3;
            box-shadow: 0px 2px 2px #aaa;
            padding-top: 0px;
            margin-top: 10px;
        }
        .news ul li{
            height: auto;
            background-color: white;
            text-align: left;
            border-bottom: 1px solid #333;
            color: black;
            padding: 3px;
        }
        .news ul li div a{color:#00b0ff}
        .news ul li span{
            font-size: 12px;
            color: gray;
        }

        .news ul p{
            text-align:left;
            padding:10px;
            color:#eee;
            overflow:hidden;
            text-overflow:ellipsis;
            white-space: nowrap;
        }
        .news-title{
            padding: 0px;
            margin-top: 0px;
            border: 1px solid #e4eef3;
            box-shadow: 0px 1px 5px #aaa;
            color: #00c6ff;
        }
        .news-title h5{padding: 5px; margin: 0px; text-align: center}
    </style>
@endpush
@push('script')
     <script>
         var myList = document.getElementsByTagName("table");
         for (i = 0; i < myList.length; i++) {
             //it does work
             myList[i].className = "table table-striped";
         }

         $(function(){
             var tickerLength = $('.news ul li').length;
             var tickerHeight = $('.news ul li').outerHeight();
             $('.news ul li:last-child').prependTo('.news ul');
             $('.news ul').css('marginTop',-tickerHeight);
             function moveTop(){
                 $('.news ul').animate({
                     top : -tickerHeight
                 },600, function(){
                     $('.news ul li:first-child').appendTo('.news ul');
                     $('.news ul').css('top','');
                 });
             }
             setInterval( function(){
                 moveTop();
             }, 3000);
         });
    </script>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
     <script>
         $('.portfolio-item').isotope({
             itemSelector: '.item',
             layoutMode: 'fitRows'
         });
         $('.portfolio-menu ul li').click(function(){
             $('.portfolio-menu ul li').removeClass('active');
             $(this).addClass('active');

             var selector = $(this).attr('data-filter');
             $('.portfolio-item').isotope({
                 filter:selector
             });
             return  false;
         });
         $(document).ready(function() {
             var popup_btn = $('.popup-btn');
             popup_btn.magnificPopup({
                 type : 'image',
                 gallery : {
                     enabled : true
                 }
             });
         });
     </script>
@endpush
@include('notification.notify')