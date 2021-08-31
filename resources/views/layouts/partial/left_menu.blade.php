<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">

    <li class="sidebar-toggler-wrapper hide">
        <div class="sidebar-toggler">
            <span></span>
        </div>
    </li>


    <li class="nav-item start ">
        <a href="{{url('admin')}}" class="nav-link nav-toggle">
            <i class="icon-home"></i>
            <span class="title">Dashboard</span>

        </a>

    </li>
    @if(Auth::user()->role->name ==="Admin")
    <li class="heading">
        <h3 class="uppercase">Features</h3>
    </li>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">User Settings</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li><a href="{{ url('/' . Config("authorization.route-prefix") . '/users') }}" >Users</a></li>
            <li><a href="{{ url('/' . Config("authorization.route-prefix") . '/roles') }}" >Role</a></li>
            <li><a href="{{ url('/' . Config("authorization.route-prefix") . '/permissions') }}">Permission</a></li>
        </ul>
    </li>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-puzzle"></i>
            <span class="title">General Settings</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li> <a href="{{ url('/' . Config("authorization.route-prefix") . '/settings') }}"  >Home Settings</a>
            </li>
            <li> <a href="{{ url('/' . Config("authorization.route-prefix") . '/exam-level') }}"  >Exam/Degree Level</a>
            </li>
            <li> <a href="{{ url('/' . Config("authorization.route-prefix") . '/religion') }}"  >Religion</a>
            </li>
            <li> <a href="{{ url('/' . Config("authorization.route-prefix") . '/schedule') }}"  >Exam Schedule</a>
            </li>

        </ul>
    </li>

        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-note"></i>
                <span class="title">Notices</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">

                <li> <a href="{{ url('/' . Config("authorization.route-prefix") . '/notice-category') }}"  >Notice Category</a>
                </li>
                <li> <a href="{{ url('/' . Config("authorization.route-prefix") . '/notice') }}"  >Notice</a>
                </li>
            </ul>
        </li>

        <li class="nav-item start ">
            <a href="{{ url('/' . Config("authorization.route-prefix") . '/schedule') }}"  >
                <i class="icon-users"></i>
                <span class="title">Student List </span>
            </a>
        </li>


        <li class="nav-item start ">
            <a href="{{ url('/' . Config("authorization.route-prefix") . '/readmission') }}"  >
                <i class="icon-users"></i>
                <span class="title">Readmission</span>
            </a>
        </li>

        <li class="nav-item start ">
            <a href="{{ url('/' . Config("authorization.route-prefix") . '/result') }}"  >
                <i class="icon-cloud-download"></i>
                <span class="title">Result </span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-note"></i>
                <span class="title">Gallery</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">

                <li> <a href="{{ url('/' . Config("authorization.route-prefix") . '/gallery-category') }}"  >Gallery Category</a>
                </li>
                <li> <a href="{{ url('/' . Config("authorization.route-prefix") . '/gallery') }}"  >Gallery</a>
                </li>
            </ul>
        </li>
        <li class="nav-item start ">
            <a href="{{ url('/' . Config("authorization.route-prefix") . '/question') }}"  >
                <i class="icon-arrow-right"></i>
                <span class="title">Question & Answer</span>
            </a>
        </li>
       @else
        <li><a href="{{ url('/' . Config("authorization.route-prefix") . '/profile') }}"  > <i class="fa fa-hand-o-right"></i>
                <span class="title">Profile</span></a></li>

        @if((Settings::admit()['yes']==1) and Settings::admit()['status']==1) )
        <li> <a href="{{ url('/' . Config("authorization.route-prefix") . '/admit') }}"  > <i class="fa fa-hand-o-right"></i>
                <span class="title">Download Admit</span></a></li>
@endif



@endif
</ul>
                