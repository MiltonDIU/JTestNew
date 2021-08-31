@extends('theme.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12" >

                <div style="margin:0 auto;">
                    <h3 align="left"><strong>J.TEST Gallery:</strong></h3>

                    <div class="container" style="margin-top:30px;">
                        <div class="portfolio-menu mt-2 mb-4">
                            <ul>
                                <li class="btn btn-outline-dark active" data-filter="*">All</li>
@foreach($galleryCategory as $category)
                                <li class="btn btn-outline-dark" data-filter=".{{$category->slug}}">{{$category->title}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="portfolio-item row">


                            @foreach($galleryCategory as $category)
                                @foreach($category->gallery as $gallery)
                                    <div class="item  {{$category->slug}}  col-lg-3 col-md-4 col-6 col-sm">
                                        <a href="{{url($gallery->url)}}" class="fancylight popup-btn" data-fancybox-group="light">
                                            <img class="img-fluid" src="{{url($gallery->url)}}" alt="">
                                        </a>
                                    </div>
                                @endforeach
                            @endforeach

                        </div>
                    </div>
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


        .portfolio-menu{
            text-align:center;
        }
        .portfolio-menu ul li{
            display:inline-block;
            margin:0;
            list-style:none;
            padding:10px 15px;
            cursor:pointer;
            -webkit-transition:all 05s ease;
            -moz-transition:all 05s ease;
            -ms-transition:all 05s ease;
            -o-transition:all 05s ease;
            transition:all .5s ease;
        }

        .portfolio-item{
            /*width:100%;*/
        }
        .portfolio-item .item{
            /*width:303px;*/
            float:left;
            margin-bottom:10px;
        }

    </style>
@endpush
@push('script')
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