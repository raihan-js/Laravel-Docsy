

<!-- Profile Sidebar -->
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    @if (!Auth::guard('patient')->user()->photo)

                    <img src="{{ url('storage/frontend/' . 'avatar.png') }}" alt="User Image">

                    @else

                    <img src="{{ url('storage/frontend/' . Auth::guard('patient') -> user() -> photo) }}" alt="User Image">
                        
                    @endif
                </a>
                <div class="profile-det-info">
                    <h3>{{ Auth::guard('patient') -> user() -> name }}</h3>
                    <div class="patient-details">
                        <h5><i class="fas fa-envelope"></i>{{ Auth::guard('patient') -> user() -> email }}</h5>
                        <h5><i class="fas fa-phone"></i>{{ Auth::guard('patient') -> user() -> phone }}</h5>
                        <h5><i class="fas fa-birthday-cake"></i> {{ Auth::guard('patient') -> user() -> date_of_birth }}, {{ Auth::guard('patient') -> user() -> age }} years</h5>
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{ Auth::guard('patient') -> user() -> city }}, {{ Auth::guard('patient') -> user() -> country }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li class="">
                        <a href="{{ route('patient.dashboard') }}">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-bookmark"></i>
                            <span>Favourites</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-comments"></i>
                            <span>Message</span>
                            <small class="unread-msg">23</small>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('patient.settings') }}">
                            <i class="fas fa-user-cog"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('patient.password') }}">
                            <i class="fas fa-lock"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('patient.logout') }}">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</div>
<!-- / Profile Sidebar -->

