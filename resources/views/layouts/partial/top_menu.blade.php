<ul class="nav navbar-nav pull-right">
    @if (Auth::guest())
        <li><a href="{{ url('/login') }}">Login</a></li>
        <li><a href="{{ url('/register') }}">Register</a></li>
    @else
        <li><a target="_blank" href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
        <li class="dropdown dropdown-user">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

                <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
                <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">
                <li>
                    <a href="{{url('admin/profile')}}">
                        <i class="icon-user"></i> My Profile </a>
                </li>
                <li>
                    <a href="{{url('/admin/password/reset')}}">
                        <i class="icon-pencil"></i> Change Password </a>
                </li>
                               <li>
                    <a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-key"></i>
                        Log Out
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>

    @endif


</ul>