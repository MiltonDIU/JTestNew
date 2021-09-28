@extends('theme2.master')

@section('content')


        @include('theme2.breadcrumb',['page'=>'Notice Details'])

    <section class="page-section" style="padding-top: 2rem;">
        <div class="container">
            <div class="row justify-content-center align-items-center">
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
                <h5>Latest Notice</h5>
                <div id="latest-news" class="latest-news">
                    <ul>
                        @foreach($notices2 as $notice )
                            @include('theme2.partials.notice')
                        @endforeach
                    </ul>
                </div>

            </aside>

            <aside class="widget widget_ci_social_widget ci-socials group" style="padding-top: 30px">

                <h5>Related Notice</h5>
                <div id="latest-news" class="latest-news">
                    <ul>
                        @foreach($notices as $notice )
                            @include('theme2.partials.notice')
                        @endforeach
                    </ul>
                </div>
            </aside>
            </div>
    </div>
</div>
    </div>
    </section>

@endsection
