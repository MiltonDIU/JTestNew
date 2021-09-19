@extends('theme2.master')
@section('content')

    <section class="page-section" style="padding-top: 2rem;">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <form class="col-sm-6 mt-4">
                    <div class="mb-3">
                        <label class="col-form-label" for="email">Email Address</label>
                        <input class="form-control" type="email" id="email">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label" for="password">Password</label>
                        <input class="form-control" type="password" id="password">
                    </div>

                    <div class="d-flex mb-3">
                        <div class="form-check me-5">
                            <input class="form-check-input" type="checkbox" value="" id="remember-me">
                            <label class="form-check-label" for="remember-me">
                                Remember Me
                            </label>
                        </div>
                        <a href="#">Forgot Password?</a>
                    </div>

                    <input class="btn col-sm-12 btn-primary mb-3" type="submit" value="Login">

                    <p>Don't have an account? <a href="registration.html">Register here</a></p>
                </form>
            </div>
        </div>
    </section>


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
