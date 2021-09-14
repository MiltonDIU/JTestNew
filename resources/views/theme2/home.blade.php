@extends('theme2.master')
@section('content')



    <!-- Intro Section -->
    <section class="page-section">
        <div class="container d-flex justify-content-between flex-wrap">
            <div class="col-md-7 col-sm-6">
                    {!! Settings::config()['content'] !!}
            </div>

            <div class="col-md-4 col-sm-5">
                <h3>Latest News</h3>

                <div id="latest-news">
                    <ul>
                        <li>
                            <a href="#">Registration J.Test 153</a>
                            <span>Admission, 21 June 2021</span>
                        </li>
                        <li>
                            <a href="#">Registration J.Test 153</a>
                            <span>Admission, 21 June 2021</span>
                        </li>
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



{{--            <h3>J.Test Dates in 2021</h3>--}}

{{--            <div class="table-responsive">--}}
{{--                <table class="table table-bordered">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>Test No.</th>--}}
{{--                        <th>Registration Deadline</th>--}}
{{--                        <th>Exam Date</th>--}}
{{--                        <th colspan="3">Level</th>--}}
{{--                        <th>Announcement of Result</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}

{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td>154th</td>--}}
{{--                        <td>14.08.2021 (Monday)</td>--}}
{{--                        <td>19.09.2021 (Sunday)</td>--}}
{{--                        <td colspan="1">F-G</td>--}}
{{--                        <td colspan="1">D-E</td>--}}
{{--                        <td colspan="1">A-C</td>--}}
{{--                        <td>28.03.2022</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>154th</td>--}}
{{--                        <td>14.08.2021 (Monday)</td>--}}
{{--                        <td>19.09.2021 (Sunday)</td>--}}
{{--                        <td colspan="1">F-G</td>--}}
{{--                        <td colspan="1">D-E</td>--}}
{{--                        <td colspan="1">A-C</td>--}}
{{--                        <td>28.03.2022</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>154th</td>--}}
{{--                        <td>14.08.2021 (Monday)</td>--}}
{{--                        <td>19.09.2021 (Sunday)</td>--}}
{{--                        <td colspan="1">F-G</td>--}}
{{--                        <td colspan="1">D-E</td>--}}
{{--                        <td colspan="1">A-C</td>--}}
{{--                        <td>28.03.2022</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>154th</td>--}}
{{--                        <td>14.08.2021 (Monday)</td>--}}
{{--                        <td>19.09.2021 (Sunday)</td>--}}
{{--                        <td colspan="1">F-G</td>--}}
{{--                        <td colspan="1">D-E</td>--}}
{{--                        <td colspan="1">A-C</td>--}}
{{--                        <td>28.03.2022</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>154th</td>--}}
{{--                        <td>14.08.2021 (Monday)</td>--}}
{{--                        <td>19.09.2021 (Sunday)</td>--}}
{{--                        <td colspan="1">F-G</td>--}}
{{--                        <td colspan="1">D-E</td>--}}
{{--                        <td colspan="1">A-C</td>--}}
{{--                        <td>28.03.2022</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>154th</td>--}}
{{--                        <td>14.08.2021 (Monday)</td>--}}
{{--                        <td>19.09.2021 (Sunday)</td>--}}
{{--                        <td colspan="1">F-G</td>--}}
{{--                        <td colspan="1">D-E</td>--}}
{{--                        <td colspan="1">A-C</td>--}}
{{--                        <td>28.03.2022</td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
        </div>
    </section>

    <!-- Brief Information exam level -->
    @foreach($exam_levels as $exam_level)
    <section class="page-section" id="exam_level_{{$exam_level->id}}">
        <div class="container">
            <h3>{{$exam_level->home_page_title}}</h3>

            <div class="table-responsive">
                {!! $exam_level->details !!}
{{--                <table class="table table-bordered">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>Test No.</th>--}}
{{--                        <th>Registration Deadline</th>--}}
{{--                        <th>Exam Date</th>--}}
{{--                        <th colspan="3">Level</th>--}}
{{--                        <th>Announcement of Result</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}

{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td>154th</td>--}}
{{--                        <td>14.08.2021 (Monday)</td>--}}
{{--                        <td>19.09.2021 (Sunday)</td>--}}
{{--                        <td colspan="1">F-G</td>--}}
{{--                        <td colspan="1">D-E</td>--}}
{{--                        <td colspan="1">A-C</td>--}}
{{--                        <td>28.03.2022</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>154th</td>--}}
{{--                        <td>14.08.2021 (Monday)</td>--}}
{{--                        <td>19.09.2021 (Sunday)</td>--}}
{{--                        <td colspan="1">F-G</td>--}}
{{--                        <td colspan="1">D-E</td>--}}
{{--                        <td colspan="1">A-C</td>--}}
{{--                        <td>28.03.2022</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>154th</td>--}}
{{--                        <td>14.08.2021 (Monday)</td>--}}
{{--                        <td>19.09.2021 (Sunday)</td>--}}
{{--                        <td colspan="1">F-G</td>--}}
{{--                        <td colspan="1">D-E</td>--}}
{{--                        <td colspan="1">A-C</td>--}}
{{--                        <td>28.03.2022</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>154th</td>--}}
{{--                        <td>14.08.2021 (Monday)</td>--}}
{{--                        <td>19.09.2021 (Sunday)</td>--}}
{{--                        <td colspan="1">F-G</td>--}}
{{--                        <td colspan="1">D-E</td>--}}
{{--                        <td colspan="1">A-C</td>--}}
{{--                        <td>28.03.2022</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>154th</td>--}}
{{--                        <td>14.08.2021 (Monday)</td>--}}
{{--                        <td>19.09.2021 (Sunday)</td>--}}
{{--                        <td colspan="1">F-G</td>--}}
{{--                        <td colspan="1">D-E</td>--}}
{{--                        <td colspan="1">A-C</td>--}}
{{--                        <td>28.03.2022</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>154th</td>--}}
{{--                        <td>14.08.2021 (Monday)</td>--}}
{{--                        <td>19.09.2021 (Sunday)</td>--}}
{{--                        <td colspan="1">F-G</td>--}}
{{--                        <td colspan="1">D-E</td>--}}
{{--                        <td colspan="1">A-C</td>--}}
{{--                        <td>28.03.2022</td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
            </div>
        </div>
    </section>

    @endforeach

@endsection





@include('notification.notify')
