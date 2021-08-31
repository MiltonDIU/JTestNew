@extends('theme.master')

@section('content')

    <div class="container">

<div class="row">
    <div class="col-xl-9 col-lg-8 col-xs-12">
        <div class="content-wrap">
            <article class="entry">
                <div class="entry-meta">
                    <time class="entry-time" datetime="2017-01-15">{{$notice->created_at}}</time>

                </div>

                <h1 class="entry-title">{{$notice->title}}</h1>
                <div class="entry-content">
                   {!! $notice->content !!}
                     </div>
            </article>
        </div>


    </div>

    <div class="col-xl-3 col-lg-4 col-xs-12">
        <div class="sidebar">
            <aside class="widget widget_ci_social_widget ci-socials group">

                <div class="news-title">
                    <h5>Recent Notice</h5>
                </div>
                <div class="news">
                    <ul>

                        @foreach($notices2 as $notice )
                            <li>
                                <div class="title"><a class="list-item-title" href="{{ url('notice/details/' . $notice->id.'/'.$notice->alias) }}">{{$notice->title}}</a></div>
                                <span>{{$notice->notice_category->title}}, {{$notice->created_at->format('d M Y')}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>





            </aside>
            <aside class="widget widget_ci_social_widget ci-socials group">

                <div class="news-title">
                    <h5>Related Notice</h5>
                </div>
                <div class="news">
                    <ul>

                        @foreach($notices as $notice )
                            <li>
                                <div class="title"><a class="list-item-title" href="{{ url('notice/details/' . $notice->id.'/'.$notice->alias) }}">{{$notice->title}}</a></div>
                                <span>{{$notice->notice_category->title}}, {{$notice->created_at->format('d M Y')}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </aside>
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
@endpush