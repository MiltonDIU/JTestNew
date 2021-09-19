<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
<meta charset="utf-8" />
    <title>{!! Settings::config()['title'] !!} </title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- BEGIN GLOBAL MANDATORY STYLES -->

<link href="{{url('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/admin/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/admin/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME GLOBAL STYLES -->
<!-- Page plugin STYLES -->
@stack('style_plugins')
<!-- end  Page plugin STYLES -->
<!-- end BEGIN THEME GLOBAL STYLES -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="{{url('assets/admin/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
<link href="{{url('assets/admin/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- page style -->
@stack('styles')
<!-- end page style -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="{{url('assets/admin/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/admin/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
<link href="{{url('assets/admin/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->
    <!-- custom style css-->
    <link href="{{url('assets/admin/custom/css/style.css')}}" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="{{url('favicon.ico')}}" /> </head>
<!-- END HEAD -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<div class="page-wrapper">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{ url('/' . Config("authorization.route-prefix")) }}">

                <img height="30" src="{{url('uploads/logo/'.Settings::config()['logo'])}}" alt="J-Test" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            @include('layouts.partial.top_menu');
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
          @include('layouts.partial.left_menu')
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">


            @yield('content')



        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> {{date('Y')}} &copy; Daffodil Web team
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
</div>

<!--[if lt IE 9]>
<script src="{{ url('assets/admin/assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ url('assets/admin/global/plugins/excanvas.min.js') }}"></script>
<script src="{{ url('assets/admin/global/plugins/ie8.fix.min.js') }}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ url('assets/admin/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!--  Begin page label plugins -->
@stack('scripts_plugins')
<!--  end Begin page label plugins -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ url('assets/admin/global/scripts/app.min.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!--  Begin page label SCRIPTS -->
@stack('scripts')

<!--  end Begin page label SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ url('assets/admin/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>
