<!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>{!! Settings::config()['title'] !!} </title>
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{url('assets/theme/css/base.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/theme/css/mmenu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/theme/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/theme/css/magnific.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/theme/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/theme/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/theme/custom.css')}}">


 @stack('style')
 @stack('styles')
</head>
<body>

<div id="page">
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="mast-head">
                        <h1 class="site-logo">
                            <a href="{{url('/')}}">
                                <img src="{{url('uploads/logo/'.Settings::config()['logo'])}}" alt="J-Test">
                            </a>
                        </h1>
                        <nav class="nav">
                            <ul class="navigation-main">
                                <li class="menu-item-home current-menu-item">
                                    <a href="{{url('/')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{url('notice')}}">Notice</a>
                                </li>
                                <li>
                                    <a href="{{url('result')}}">Result</a>
                                </li>
                                <li class="menu-item-btn">
                                    <a href="{{url('register')}}">Registration</a>
                                </li>
                                <li>
                                    <a href="{{url('syllabus')}}">Syllabus</a>
                                </li>
                                <li>
                                    <a href="{{url('admit')}}">Admit Card </a>
                                </li>
                                <li>
                                    <a href="{{url('gallery')}}">Gallery</a>
                                </li>
                                <li>
                                    <a href="{{url('question-answer')}}">Question </a>
                                </li>
                                <li>
                                    <a href="{{url('/contact')}}">Contact</a>
                                </li>
                                <li  class="menu-item-btn">
                                    @if(Auth::check())
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-key"></i>
                                            Log Out
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

@else
                                        <a href="{{url('login')}}">login</a>
                                    @endif
                                </li>
                            </ul>
                            <!-- #navigation -->

                            <a href="#mobilemenu" class="mobile-nav-trigger">
                                <i class="fa fa-navicon"></i> Menu
                            </a>
                        </nav>

                        <div id="mobilemenu"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="main main-elevated">
       @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="footer-copy">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <p>
                                  {!! Settings::config()['copyright'] !!}
                                </p>
                            </div>
                            <div class="col-sm-6 col-xs-12 text-right">
                                <p>{!! Settings::config()['powered'] !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="{{url('assets/theme/js/jquery-1.12.3.min.js')}}"></script>
<script src="{{url('assets/theme/js/jquery.mmenu.min.all.js')}}"></script>
<script src="{{url('assets/theme/js/jquery.fitvids.js')}}"></script>
<script src="{{url('assets/theme/js/jquery.magnific-popup.js')}}"></script>
<script src="{{url('assets/theme/js/jquery.matchHeight.js')}}"></script>
<script src="{{url('assets/theme/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{url('assets/theme/js/scripts.js')}}"></script>

@stack('script')
@stack('scripts')
</body>
</html>