<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>KNOWIND Website</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="{{url('img/KnowINDIcon.ico')}}"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- global css -->
    <link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}"/>
    <!-- end of global css -->
    
    <!-- global js -->
    <script src="{{url('js/app.js')}}" type="text/javascript"></script>
    <!-- end of global js -->

</head>

<body class="skin-default">

@if(!request()->routeIs('daftar-akun') AND !request()->routeIs('edit-akun'))
@error('email')
<script type="text/javascript">
    $( document ).ready(function() 
    {
        $('#modal-login').modal('show');
    });
</script>
@enderror
@error('password')
<script type="text/javascript">
    $( document ).ready(function() 
    {
        $('#modal-login').modal('show');
    });
</script>
@enderror   
@endif

<div class="preloader">
    <div class="loader_img"><img src="{{url('img/loader.gif')}}" alt="loading..." height="64" width="64"></div>
</div>
<!-- header logo: style can be found in header-->

<header class="header">
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Header Navbar: style can be found in header-->
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                    class="fa fa-fw ti-menu"></i>
            </a>
        </div>
        <a href="/" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the marginin -->
            <img src="{{url('img/LogoKnowINDsmall.png')}}" alt="logo"/>
        </a> 

        <div class="navbar-right">
            @guest
            @if(!request()->routeIs('daftar-akun'))
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown-->
                <li class="dropdown user user-menu">
                    <div class="dropdown-toggle padding-user">
                        <div class="riot">
                            <div>
                                <span>
                                        <i class="ti-lock"></i>
                                </span>
                                <a href="#modal-login" data-toggle="modal">Sign In</a>  / <a href="{{ route('daftar-akun') }}">Register</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            @endif
            @else
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown-->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle padding-user" data-toggle="dropdown">
                        @if(Auth::user()->avatar == NULL)
                        <img src="{{url('file/avatar/default.png')}}" width="35" class="img-circle img-responsive pull-left"
                             height="35" alt="User Image">
                        @else
                        <img src="{{url('file/avatar/'.Auth::user()->member_id.'/'.Auth::user()->avatar)}}" width="35" class="img-circle img-responsive pull-left"
                             height="35" alt="User Image">
                        @endif
                        <div class="riot">
                            <div>
                                {{ Auth::user()->name }} 
                                <span>
                                    <i class="caret"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            @if(Auth::user()->avatar == NULL)
                            <img src="{{url('file/avatar/default.png')}}" class="img-circle" alt="User Image">
                            @else
                            <img src="{{url('file/avatar/'.Auth::user()->member_id.'/'.Auth::user()->avatar)}}" class="img-circle" alt="User Image">
                            @endif  
                            <p>{{ Auth::user()->name }} </p>
                        </li>
                        <!-- Menu Body -->
                        <li role="presentation"></li>
                        <li><a href="{{route('edit-akun')}}"> <i class="fa fa-fw ti-settings"></i>Edit Akun</a></li>
                        <li role="presentation" class="divider"></li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
            @endguest
        </div>
    </nav>
</header>

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar-->
        <section class="sidebar">
            <div id="menu" role="navigation">
                <div class="nav_profile">
                    <div class="media profile-left">
                        <a class="pull-left profile-thumb" href="#">
                            @guest
                            <img src="{{ url('file/avatar/default.png')}}" class="img-circle" alt="User Image"></a>
                            @else
                                @if(Auth::user()->avatar == NULL)
                                <img src="{{url('file/avatar/default.png')}}" class="img-circle" alt="User Image"></a>
                                @else
                                <img src="{{url('file/avatar/'.Auth::user()->member_id.'/'.Auth::user()->avatar)}}" class="img-circle" alt="User Image"></a>
                                @endif
                            @endguest
                        <div class="content-profile">
                            @guest
                            <h4 class="media-heading">Guest</h4>
                            @else
                            <h4 class="media-heading">{{ Auth::user()->name }}</h4>
                            @endguest
                            @auth
                            <ul class="icon-list">
                                <li>
                                    <a href="{{route('edit-akun')}}">
                                        <i class="fa fa-fw ti-settings"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                    document.getElementById('logout-form').submit();">
                                        <i class="fa fa-fw ti-shift-right"></i>
                                    </a>
                                </li>
                            </ul>
                            @endauth
                        </div>
                    </div>
                </div>
                <ul class="navigation">
                    <!--<li class="active" id="active">-->
                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        <a href="{{ route('home')}}">
                            <i class="menu-icon ti-desktop"></i>
                            <span class="mm-text ">Homepage</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('event') ? 'active' : '' }} {{ request()->routeIs('event-detail') ? 'active' : '' }}">
                        <a href="{{ route('event') }}">
                            <i class="menu-icon ti-calendar"></i>
                            <span class="mm-text ">Event</span>
                        </a>
                    </li>

                    <li class="{{request()->routeIs('app-update') ? 'active' : '' }} {{request()->routeIs('app-update-detail') ? 'active' : '' }}">
                        <a href="{{url('app-update')}}">
                            <i class="menu-icon ti-tablet"></i></i>
                            <span class="mm-text ">App Update</span>
                        </a>
                    </li>

                    <li class="menu-dropdown {{request()->routeIs('daftar-akun') ? 'active' : '' }} {{request()->routeIs('list-kontributor') ? 'active' : '' }}">
                        <a href="#">
                            <i class="menu-icon ti-menu"></i>
                            <span>
                                    Kontribusi
                            </span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="{{request()->routeIs('daftar-akun') ? 'active' : '' }}">
                                <a href="{{route('daftar-akun')}}">
                                    <i class="fa fa-fw ti-control-skip-forward"></i> Jadi Kontributor
                                </a>
                            </li>
                            <li class="{{request()->routeIs('list-kontributor') ? 'active' : '' }}">
                                <a href="{{route('list-kontributor')}}">
                                    <i class="fa fa-fw ti-control-skip-forward"></i> List Kontributor
                                </a>
                            </li>
                            <li>
                                <a href="/donasi">
                                    <i class="fa fa-fw ti-control-skip-forward"></i> Donasi
                                </a>
                            </li>
                        </ul>
                    </li>

                     @auth
                     <li class="menu-dropdown {{request()->routeIs('manage-database') ? 'active' : '' }}">
                        <a href="#">
                            <i class="menu-icon ti-layout-grid4"></i>
                            <span class="mm-text ">Manage Data</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{route('manage-database')}}#konten">
                                    <i class="fa fa-fw ti-layout-grid4"></i> Konten
                                </a>
                            </li>
                            <li>
                                <a href="{{route('manage-database')}}#penerjemah">
                                    <i class="fa fa-fw ti-layout-grid4"></i> Penerjemah
                                </a>
                            </li>
                            @if(Auth::user()->type == 'admin')
                            <li>
                                <a href="{{route('manage-database')}}#update">
                                    <i class="fa fa-fw ti-layout-grid4"></i> Update
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endauth

                    <li>
                        <a href="{{route('tentang-kami')}}">
                            <i class="menu-icon ti-user"></i>
                            <span class="mm-text ">Tentang Kami</span>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
    </aside>
    <aside class="right-side">
        <section class="content-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-5 col-xs-8">
                    <div class="header-element">
                        <h3>
                            @if (request()->routeIs('home'))
                                Homepage
                            @elseif (request()->routeIs('edit-akun'))
                                Edit Akun
                            @elseif (request()->routeIs('event'))
                                Event
                            @elseif (request()->routeIs('event-detail'))
                                Event
                            @elseif(request()->routeIs('app-update'))
                                App Update
                            @elseif(request()->routeIs('app-update-detail'))
                                App Update
                            @elseif(request()->routeIs('list-kontributor'))
                                List Kontributor
                            @elseif(request()->routeIs('tentang-kami'))
                                Tentang Kami
                            @elseif (request()->routeIs('manage-database'))
                                Manage Data
                            @endif
                        </h3>
                    </div>
                </div>
                <div class="col-lg-4 col-lg-offset-2 col-md-6 col-sm-7 col-xs-4">
                    <div class="header-object">
                        <!--
                        <span class="option-search pull-right hidden-xs">
                            <span class="search-wrapper">
                                <input type="text" placeholder="Search here"><i class="ti-search"></i>
                            </span>
                        </span>
                        -->
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            
            @yield('content')

        </section>
        <!-- /.content --> 

    </aside>
    <!-- /.right-side -->
</div>
<!-- ./wrapper -->

<!-- Footer -->
<footer>
    <div class="text-center" style="padding: 20px 0px; background-color: lightgray">
        <span><b>Copyright &copy; Website KnowIND 2020</b></span>
    </div>
</footer>
<!-- End of Footer -->

<div id="modal-login" class="modal fade">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">              
                <h4 class="modal-title"><b>Member Login</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <i class="fa fa-at"></i>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus required>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock"></i>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="current-password" required> 
                    </div>
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __(' Remember Me') }}
                        </label>
                    </div>
                    @error('email')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('password')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">
                            LOGIN
                        </button>
                    </div>
                </form>
                    <div class="form-group">
                        <a href="{{ url('google') }}">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">
                                Login dengan google
                            </button>
                        </a>
                    </div>             
            </div>
            <div class="modal-footer">
                @if (Route::has('password.request'))
                <a href="{{ route('reset-email') }}">Forgot Password?</a>
                @endif
            </div>
        </div>
    </div>
</div> 

</body>

</html>