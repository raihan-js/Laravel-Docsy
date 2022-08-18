<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="{{ route('home.page') }}" class="navbar-brand logo">
                <img src="{{ asset('frontend/assets/img/Docsylogo.png') }}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="{{ route('home.page') }}" class="menu-logo">
                    <img src="{{ asset('frontend/assets/img/Docsylogo.png') }}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="active">
                    <a href="index-2.html">Home</a>
                </li>
                <li class="has-submenu">
                    <a href="#">Doctors <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="doctor-dashboard.html">Doctor List</a></li>
                        
                    </ul>
                </li>	
                <li class="has-submenu">
                    <a href="#">Features <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="#">Search Doctors</a></li>
                        <li><a href="#">Components</a></li>
                        <li class="has-submenu">
                            <a href="#">About us</a>
                            <ul class="submenu">
                                <li><a href="#">Our Story</a></li>
                                <li><a href="#">Pricing</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                
                
            </ul>		 
        </div>		 
        <ul class="nav header-navbar-rht">

            @if ( !Auth::guard('patient')->check() )
            <li class="nav-item">
                <a class="nav-link header-login" href="{{ route('login.page') }}">login / Signup </a>
            </li>
            @endif

            @if ( Auth::guard('patient')->check() )
            <li class="nav-item dropdown has-arrow logged-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                    <span class="user-img">
                        @if (!Auth::guard('patient')->user()->photo)

                            <img class="rounded-circle" width="31" src="{{ url('storage/frontend/' . 'avatar.png') }}" alt="User Image">

                        @else

                            <img class="rounded-circle" width="31" src="{{ url('storage/frontend/' . Auth::guard('patient') -> user() -> photo) }}" alt="User Image">
                                
                        @endif
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            @if (!Auth::guard('patient')->user()->photo)

                                <img class="rounded-circle" width="31" src="{{ url('storage/frontend/' . 'avatar.png') }}" alt="User Image">

                            @else

                                <img class="rounded-circle" width="31" src="{{ url('storage/frontend/' . Auth::guard('patient') -> user() -> photo) }}" alt="User Image">
                                    
                            @endif
                        </div>
                        <div class="user-text">
                            <h6>{{ Auth::guard('patient')->user()-> name }}</h6>
                            <p class="text-muted mb-0">Patient</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{ route('patient.dashboard') }}">Dashboard</a>
                    <a class="dropdown-item" href="{{ route('patient.settings') }}">Profile Settings</a>
                    <a class="dropdown-item" href="{{ route('patient.logout') }}">Logout</a>
                </div>
            </li>
            @endif
            
            
        </ul>
    </nav>
</header>