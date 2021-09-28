<!-- Hero -->
@if(count(\App\Helpers\SettingsHelper::sliders($page))>0)
<header class="hero">
    <!-- start carousel -->
    <div id="carouselHero" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">

            @foreach(\App\Helpers\SettingsHelper::sliders($page) as $key => $slider)
            <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="{{$key}}" class="active" aria-label="{{$key}}"></button>
            @endforeach
        </div>

        <div class="carousel-inner">
            @foreach(\App\Helpers\SettingsHelper::sliders($page) as $key => $slider)
            <div class="carousel-item {!! $key==0?"active":"" !!}">
                <img src="{{url($slider->img_url)}}" class="d-block w-100" alt="hero image">

                <div class="container hero-container">
                    <div class="hero-subheading">{{$slider->title}}</div>
                    <div class="hero-heading text-uppercase">{{$slider->content}}</div>
{{--                    <div class="hero-heading text-uppercase">{{$slider->content}}</div>--}}
                    @if(!empty($slider->link_url))
                    <a class="btn btn-primary btn-md text-uppercase" href="{{$slider->link_url}}">{{$slider->link_text}}</a>
                    @endif
                </div>
            </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" style="z-index: 3;" type="button" data-bs-target="#carouselHero" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" style="z-index: 3;" type="button" data-bs-target="#carouselHero" data-bs-slide="next">
            <span class="carousel-control-next-icon" style="z-index: 3;" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- end carousel -->

    <div class="overlay"></div>
</header>
@else
    @include('theme2.breadcrumb',['page'=>$page])
@endif
