@extends('theme2.master')
@section('content')
    <!-- Hero -->
    <header class="hero">
        <div class="overlay"></div>
        <div class="container hero-container">
            <div class="hero-subheading">Become a global citizen</div>
            <div class="hero-heading text-uppercase">by learning JAPANESE</div>
            <a class="btn btn-primary btn-md text-uppercase" href="#">SIGNUP NOW</a>
            &nbsp;&nbsp;
            <a
                class="
                btn btn-outline-primary btn-md
                text-uppercase text-white
                border-white
                learn-more-btn
              "
                href="#"
            >LEARN MORE</a
            >
        </div>
    </header>


    <!-- Intro Section -->
    <section class="page-section">
        <div class="container d-flex justify-content-between flex-wrap">
            <div class="col-md-7 col-sm-6">
                    {!! Settings::config()['content'] !!}
            </div>

            <div class="col-md-4 col-sm-5">
                <h3>Latest News</h3>

                <div class="news" id="latest-news">
                    <ul>
                        @foreach(\App\Helpers\SettingsHelper::noticeHome() as $notice)
                        <li>
                            <a href="{{ url('notice/details/' . $notice->id.'/'.$notice->alias) }}">{{$notice->title}}</a>
                            <span>{{$notice->notice_category->title}}, {{$notice->created_at->format('d M Y')}}</span>
                        </li>

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
                    <div class="card p-2">
                        <span class="icon-container"><i class="fa fa-calendar"></i></span>
                        <a href="#test-date">J.Test Dates in 2021</a>
                    </div>
                </div>


                @foreach($exam_levels as $exam_level)
                <div class="mb-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="card p-2">
                        <span class="icon-container">{{$exam_level->title}}</span>
                        <a href="#exam_level_{{$exam_level->id}}">{{$exam_level->home_page_title}}</a>
                    </div>
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
                <a class="see-all" href="./gallery.html">See All</a>
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
