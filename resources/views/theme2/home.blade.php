@extends('theme2.master')
@section('content')
@include('theme2.partials.hero',['page'=>'Home'])
        <!-- Intro Section -->
    <section class="page-section">
        <div class="container d-flex justify-content-between flex-wrap">
            <div class="col-md-7 col-sm-6">

                    {!! Settings::config()['content'] !!}

            </div>

            <div class="col-md-4 col-sm-5">
                <h3>Latest News</h3>

                <div id="latest-news" class="latest-news">
                    <ul>
                        @foreach(\App\Helpers\SettingsHelper::noticeHome() as $notice)
                            @include('theme2.partials.notice')
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Quick Access -->
    <section class="page-section" id="quick-access">
        <div class="container">
            <h3 class="mb-4">Quick Access</h3>

            <div class="row">
                <div class="mb-3 col-lg-3 col-md-6 col-sm-12">
                    <a href="#test-date">
                    <div class="card p-2">
                        <span class="icon-container"><i class="fa fa-calendar"></i></span>
                       J.Test Dates in 2021
                    </div>
                    </a>
                </div>


                @foreach($exam_levels as $exam_level)

                <div class="mb-3 col-lg-3 col-md-6 col-sm-12">
                    <a href="#exam_level_{{$exam_level->id}}">
                    <div class="card p-2">
                        <span class="icon-container">{{$exam_level->title}}</span>
                       {{$exam_level->home_page_title}}
                    </div>
                    </a>
                </div>

                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section class="page-section gallery" id="gallery">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Gallery</h3>
                <a class="see-all" href="{{url('gallery')}}">See All</a>
            </div>

            <div class="d-flex flex-wrap justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="card p-1">
                        <img class="gallery-img" src="{{ url('assets/theme2/assets/img/1.jpg')}}" alt="successful candidate image" />
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card p-1">
                        <img class="gallery-img" src="{{ url('assets/theme2/assets/img/2.jpg')}}" alt="successful candidate image" />
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card p-1">
                        <img class="gallery-img" src="{{ url('assets/theme2/assets/img/3.jpg')}}" alt="successful candidate image" />
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card p-1 me-0">
                        <img class="gallery-img" src="{{ url('assets/theme2/assets/img/4.jpg')}}" alt="successful candidate image" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JTest Dates in 2021 -->
    <section class="page-section" id="test-date">
        <div class="container">
            {!! Settings::config()['test_date'] !!}

        </div>
    </section>

    <!-- Brief Information exam level -->
    @foreach($exam_levels as $exam_level)
    <section class="page-section" id="exam_level_{{$exam_level->id}}">
        <div class="container">
            <h3>{{$exam_level->home_page_title}}</h3>

            <div class="table-responsive">
                {!! $exam_level->details !!}
            </div>
        </div>
    </section>

    @endforeach

@endsection
@include('notification.notify')

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
@endpush
