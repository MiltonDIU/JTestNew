<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{!! Settings::config()['title'] !!} </title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css"/>
    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="{{url('assets/theme2/css/styles.css')}}" rel="stylesheet" />

    @stack('style')
    @stack('styles')
</head>

{{--<body id="page-top">--}}

{{--<div id="topbar">--}}
{{--    <div class="container d-flex align-items-center justify-content-between h-100">--}}

{{--        <div class="d-flex">--}}
{{--            <span style="margin-right: 20px;"><i class="fa fa-phone"></i>&nbsp; +8801847140018</span>--}}
{{--            <span><i class="fa fa-envelope"></i>&nbsp; dil@daffodilvarsity.edu.bd</span>--}}
{{--        </div>--}}

{{--        @if(Auth::check())--}}
{{--            <div class="d-flex">--}}
{{--                <a style="margin-right: 20px;" href="{{ url('/logout') }}"--}}
{{--                   onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();"><i class="icon-key"></i>--}}
{{--                    Log Out--}}
{{--                </a>--}}
{{--                <form id="logout-form" action="{{ url('/logout') }}" method="POST"--}}
{{--                      style="display: none;">--}}
{{--                    {{ csrf_field() }}--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        @else--}}
{{--            <div class="d-flex">--}}
{{--                <a style="margin-right: 20px;" href="{{url('register')}}">Registration</a>--}}
{{--                <a href="{{url('login')}}">Login</a>--}}
{{--            </div>--}}
{{--        @endif--}}





{{--    </div>--}}
{{--</div>--}}



{{--<!-- Navigation -->--}}
{{--<nav class="navbar navbar-dark navbar-expand-lg fixed-top" id="mainNav">--}}
{{--    <div class="container">--}}

{{--        <a class="navbar-brand"  href="{{url('/')}}">--}}
{{--            <img src="{{url('uploads/logo/'.Settings::config()['logo'])}}" alt="J-Test">--}}
{{--        </a>--}}
{{--        <button--}}
{{--            class="navbar-toggler"--}}
{{--            type="button"--}}
{{--            data-bs-toggle="collapse"--}}
{{--            data-bs-target="#navbarResponsive"--}}
{{--            aria-controls="navbarResponsive"--}}
{{--            aria-expanded="false"--}}
{{--            aria-label="Toggle navigation"--}}
{{--        >--}}
{{--            Menu--}}
{{--            <i class="fas fa-bars ms-1"></i>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarResponsive">--}}
{{--            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{url('/')}}">Home</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{url('notice')}}">Notice</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{url('result')}}">Result</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{url('syllabus')}}">Syllabus</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{url('admit')}}">Admit Card</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{url('gallery')}}">Gallery</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{url('question-answer')}}">Question</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{url('contact')}}">Contact</a>--}}
{{--                </li>--}}
{{--                <span class="auth">--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="{{url('register')}}">Registration</a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                   @if(Auth::check())--}}
{{--                      <a class="nav-link" href="{{ url('/logout') }}"--}}
{{--                         onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();"><i class="icon-key"></i>--}}
{{--                                            Log Out--}}
{{--                                        </a>--}}

{{--                      <form id="logout-form" action="{{ url('/logout') }}" method="POST"--}}
{{--                            style="display: none;">--}}
{{--                                            {{ csrf_field() }}--}}
{{--                                        </form>--}}

{{--                  @else--}}
{{--                      <a class="nav-link" href="{{url('login')}}">login</a>--}}
{{--                  @endif--}}

{{--              </li>--}}
{{--            </span>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
{{--<!-- Hero -->--}}
{{--<header class="hero">--}}

{{--    <!-- start carousel -->--}}
{{--    <div id="carouselHero" class="carousel slide" data-bs-ride="carousel">--}}
{{--        <div class="carousel-indicators">--}}
{{--            <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>--}}
{{--            <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="1" aria-label="Slide 2"></button>--}}
{{--            <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="2" aria-label="Slide 3"></button>--}}
{{--        </div>--}}

{{--        <div class="carousel-inner">--}}
{{--            <div class="carousel-item active">--}}
{{--                <img src="assets/img/hero_min.png" class="d-block w-100" alt="hero image">--}}

{{--                <div class="container hero-container">--}}
{{--                    <div class="hero-subheading">Become a global citizen</div>--}}
{{--                    <div class="hero-heading text-uppercase">by learning JAPANESE</div>--}}
{{--                    <a class="btn btn-primary btn-md text-uppercase" href="#">SIGNUP NOW</a>--}}
{{--                    &nbsp;&nbsp;--}}
{{--                    <a--}}
{{--                        class="--}}
{{--                  btn btn-outline-primary btn-md--}}
{{--                  text-uppercase text-white--}}
{{--                  border-white--}}
{{--                  learn-more-btn--}}
{{--                "--}}
{{--                        href="#"--}}
{{--                    >LEARN MORE</a--}}
{{--                    >--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="carousel-item">--}}
{{--                <img src="assets/img/hero_min.png" class="d-block w-100" alt="hero image">--}}
{{--            </div>--}}

{{--            <div class="carousel-item">--}}
{{--                <img src="assets/img/hero_min.png" class="d-block w-100" alt="hero image">--}}

{{--                <div class="container hero-container">--}}
{{--                    <div class="hero-subheading">Become a global citizen</div>--}}
{{--                    <div class="hero-heading text-uppercase">by learning JAPANESE</div>--}}
{{--                    <a class="btn btn-primary btn-md text-uppercase" href="#">SIGNUP NOW</a>--}}
{{--                    &nbsp;&nbsp;--}}
{{--                    <a--}}
{{--                        class="--}}
{{--                  btn btn-outline-primary btn-md--}}
{{--                  text-uppercase text-white--}}
{{--                  border-white--}}
{{--                  learn-more-btn--}}
{{--                "--}}
{{--                        href="#"--}}
{{--                    >LEARN MORE</a--}}
{{--                    >--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <button class="carousel-control-prev" style="z-index: 3;" type="button" data-bs-target="#carouselHero" data-bs-slide="prev">--}}
{{--            <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--            <span class="visually-hidden">Previous</span>--}}
{{--        </button>--}}

{{--        <button class="carousel-control-next" style="z-index: 3;" type="button" data-bs-target="#carouselHero" data-bs-slide="next">--}}
{{--            <span class="carousel-control-next-icon" style="z-index: 3;" aria-hidden="true"></span>--}}
{{--            <span class="visually-hidden">Next</span>--}}
{{--        </button>--}}
{{--    </div>--}}
{{--    <!-- end carousel -->--}}

{{--    <div class="overlay"></div>--}}
{{--</header>--}}

{{--@yield('content')--}}



{{--<!-- Bootstrap core JS-->--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>--}}
{{--<!-- JQuery CDN -->--}}
{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
{{--<!-- JQuery Easy Ticker -->--}}
{{--<script src="{{url('assets/theme2/js/jquery.easy-ticker.min.js')}}"></script>--}}
{{--<!-- Core theme JS-->--}}
{{--<script src="{{url('assets/theme2/js/scripts.js')}}"></script>--}}
{{--@stack('script')--}}
{{--@stack('scripts')--}}
{{--</body>--}}

<body id="page-top">


<div id="topbar">
    <div class="container d-flex align-items-center justify-content-between h-100">

        <div class="d-flex">
            <span style="margin-right: 20px;"><i class="fa fa-phone"></i>&nbsp; +8801847140018</span>
            <span><i class="fa fa-envelope"></i>&nbsp; dil@daffodilvarsity.edu.bd</span>
        </div>

        @if(Auth::check())
            <div class="d-flex">
                <a style="margin-right: 20px;" href="{{ url('/logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-key"></i>
                    Log Out
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        @else
            <div class="d-flex">
                <a style="margin-right: 20px;" href="{{url('register')}}">Registration</a>
                <a href="{{url('login')}}">Login</a>
            </div>
        @endif





    </div>
</div>



<!-- Navigation -->
<nav class="navbar navbar-dark navbar-expand-lg fixed-top" id="mainNav">
    <div class="container">

        <a class="navbar-brand"  href="{{url('/')}}">
            <img src="{{url('uploads/logo/'.Settings::config()['logo'])}}" alt="J-Test">
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('notice')}}">Notice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('result')}}">Result</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('syllabus')}}">Syllabus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('admit')}}">Admit Card</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('gallery')}}">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('question-answer')}}">Question</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('contact')}}">Contact</a>
                </li>
                <span class="auth">
              <li class="nav-item">
                <a class="nav-link" href="{{url('register')}}">Registration</a>
              </li>
              <li class="nav-item">
                   @if(Auth::check())
                      <a class="nav-link" href="{{ url('/logout') }}"
                         onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-key"></i>
                                            Log Out
                                        </a>

                      <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                  @else
                      <a class="nav-link" href="{{url('login')}}">login</a>
                  @endif

              </li>
            </span>
            </ul>
        </div>
    </div>
</nav>


@yield('content')

<!-- Footer -->
<footer class="footer py-4 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 text-lg-start">
                {!! Settings::config()['copyright'] !!}
            </div>
            <div class="col-lg-3 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="#!"
                ><i class="fab fa-facebook-f"></i
                    ></a>
                <a class="btn btn-dark btn-social mx-2" href="#!"
                ><i class="fab fa-linkedin-in"></i
                    ></a>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a class="link-dark text-decoration-none me-3" href="#!"
                >Privacy Policy</a
                >
                <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- JQuery Easy Ticker -->
<script src="{{url('assets/theme2/js/jquery.easy-ticker.min.js')}}"></script>
<!-- Core theme JS-->
<script src="{{url('assets/theme2/js/scripts.js')}}"></script>
@stack('script')
@stack('scripts')
</body>
</html>
