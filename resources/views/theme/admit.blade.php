@extends('theme.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12" >

                <div style="margin:0 auto;">
                     <h3 align="left"><strong>J.TEST Admit Card:</strong></h3>

                    <div class="container" style="margin-top:30px;">
                        <div class="row">
                            <div class="col-md-12">
                                <ul id="tree1">
                                    @foreach($examLevel as $exam)
                                    <li><a href="#">{{$exam->title}}</a>
                                        <ul>
                                            @foreach($exam->schedule as $schedule)
                                                @if($schedule->status==1 && $schedule->admit==1)
                                                    <li>
                                                    {{$schedule->title}} ({{date('d-m-Y', strtotime($schedule->exam_date))}})
                                                <ul>
                                                    @foreach($schedule->user_schedule as $us)
@if($us->status!=0)
<li>
<a href="{{url('admit/'.$us->user->id)}}">{{$us->user->name}} ({{$us->user->profile->dob}})</a>
</li>
@endif
                                                        @endforeach
                                                </ul>
                                                    </li>
                                                    @endif

                                            @endforeach
                                        </ul>
                                    </li>
@endforeach
                                </ul>
                            </div>

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


        .tree, .tree ul {
            margin:0;
            padding:0;
            list-style:none
        }
        .tree ul {
            margin-left:1em;
            position:relative
        }
        .tree ul ul {
            margin-left:.5em
        }
        .tree ul:before {
            content:"";
            display:block;
            width:0;
            position:absolute;
            top:0;
            bottom:0;
            left:0;
            border-left:1px solid
        }
        .tree li {
            margin:0;
            padding:0 1em;
            line-height:2em;
            color:#369;
            font-weight:700;
            position:relative
        }
        .tree ul li:before {
            content:"";
            display:block;
            width:10px;
            height:0;
            border-top:1px solid;
            margin-top:-1px;
            position:absolute;
            top:1em;
            left:0
        }
        .tree ul li:last-child:before {
            background:#fff;
            height:auto;
            top:1em;
            bottom:0
        }
        .indicator {
            margin-right:5px;
        }
        .tree li a {
            text-decoration: none;
            color:#369;
        }
        .tree li button, .tree li button:active, .tree li button:focus {
            text-decoration: none;
            color:#369;
            border:none;
            background:transparent;
            margin:0px 0px 0px 0px;
            padding:0px 0px 0px 0px;
            outline: 0;
        }
    </style>
@endpush
@push('script')
<script>
    $.fn.extend({
        treed: function (o) {

            var openedClass = 'glyphicon-minus-sign';
            var closedClass = 'glyphicon-plus-sign';

            if (typeof o != 'undefined'){
                if (typeof o.openedClass != 'undefined'){
                    openedClass = o.openedClass;
                }
                if (typeof o.closedClass != 'undefined'){
                    closedClass = o.closedClass;
                }
            };

            //initialize each of the top levels
            var tree = $(this);
            tree.addClass("tree");
            tree.find('li').has("ul").each(function () {
                var branch = $(this); //li with children ul
                branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
                branch.addClass('branch');
                branch.on('click', function (e) {
                    if (this == e.target) {
                        var icon = $(this).children('i:first');
                        icon.toggleClass(openedClass + " " + closedClass);
                        $(this).children().children().toggle();
                    }
                })
                branch.children().children().toggle();
            });
            //fire event from the dynamically added icon
            tree.find('.branch .indicator').each(function(){
                $(this).on('click', function () {
                    $(this).closest('li').click();
                });
            });
            //fire event to open branch if the li contains an anchor instead of text
            tree.find('.branch>a').each(function () {
                $(this).on('click', function (e) {
                    $(this).closest('li').click();
                    e.preventDefault();
                });
            });
            //fire event to open branch if the li contains a button instead of text
            tree.find('.branch>button').each(function () {
                $(this).on('click', function (e) {
                    $(this).closest('li').click();
                    e.preventDefault();
                });
            });
        }
    });

    //Initialization of treeviews

    $('#tree1').treed();


</script>
@endpush
@include('notification.notify')