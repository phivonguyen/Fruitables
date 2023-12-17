<nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
    <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between"
        style="width: 100%">
        <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="../../index.html"></a>
        <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
            <i class="mdi mdi-menu"></i>
        </button>
        <ul class="navbar-nav navbar-nav-right ml-lg-auto">
            <li class="nav-item nav-profile dropdown border-0">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" style="margin-right: 50px" >
                    @if (Auth::user()->user_detail != null && Auth::user()->user_detail->avatar != null)
                        <img src="{{ asset(Auth::user()->user_detail->avatar) }}" width="80px"
                            style="border-radius:  50%">
                    @else
                        <i class="fas fa-user fa-2x"></i>
                    @endif
                    <span class="profile-name">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                    <a class="dropdown-item " href="{{ url('/home') }}">
                        <i class="mdi mdi-home text-primary"></i>
                        Back to Store
                    </a>
                    <a class="dropdown-item " href="{{ url('/profile') }}">
                        <i class="mdi mdi-home text-primary"></i>
                        My Profile
                    </a>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout text-primary"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
