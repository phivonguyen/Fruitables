        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                                class="text-white">123 Street, New York</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                                class="text-white">Email@Example.com</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                        <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                        <a href="#" class="text-white"><small class="text-white ms-2">Sales and
                                Refunds</small></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="{{ url('/home') }}" class="navbar-brand">
                        <h1 class="text-primary display-6">Fruitables</h1>
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>

                    {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button> --}}
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{ url('/home') }}" class="nav-item nav-link active">Home</a>
                            <a href="{{ url('/collections/category')}}" class="nav-item nav-link">Categories</a>
                            <a href="{{ url('/collections') }}" class="nav-item nav-link">Products</a>
                            <a href="shop-detail.html" class="nav-item nav-link">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="cart.html" class="dropdown-item">Cart</a>
                                    <a href="chackout.html" class="dropdown-item">Checkout</a>
                                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                    <a href="404.html" class="dropdown-item">404 Page</a>
                                    <a href="404.html" class="dropdown-item">404 Page</a>
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <button
                                class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                                data-bs-toggle="modal" data-bs-target="#searchModal"><i
                                    class="fas fa-search text-primary"></i></button>
                            <a href="#" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span
                                    class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                    style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                            </a>
                            <a href="#" class="my-auto">
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                        @if (session('avatar'))
                                            <img src="{{ session('avatar') }}" alt="" width="30px"
                                                style="border-radius:  50%">
                                        @else
                                            <i class="fas fa-user fa-2x"></i>
                                        @endif

                                    </a>
                                    <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                        @guest
                                            @if (Route::has('login'))
                                                <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            @endif

                                            @if (Route::has('register'))
                                                <a class="dropdown-item"
                                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                                            @endif
                                        @else
                                            <a class="nav-link " href="#" id="navbarDropdown"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                @if (session('avatar'))
                                                    <img src="{{ session('avatar') }}" alt="" width="30px"
                                                        style="border-radius:  50%">
                                                @else
                                                    <i class="fas fa-user fa-2x"></i>
                                                    {{ Auth::user()->name }}
                                                @endif
                                                {{-- @if (empty(Auth::user()->userAvatar))
                                                        <img src="{{ asset('/uploads/userImg/defaultAvatar/download.jpg') }}"
                                                            width="30px" style="border-radius:  50%">
                                                    @endif {{ Auth::user()->name }} --}}

                                            </a>
                                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                                {{-- <a class="dropdown-item" href="{{ url('profile') }}">
                                                    <i class="fa fa-user"></i>
                                                    Profile
                                                </a>
                                                </li>
                                                <a class="dropdown-item" href="{{ url('orders') }}">
                                                    <i class="fa fa-list"></i> My Orders
                                                </a> --}}
                                                <!-- Check if the user is an admin (role_as == '1') -->
                                                @if (Auth::user()->roles == '1')
                                                    <!-- Display "Admin Panel" link for admins -->
                                                    <a class="dropdown-item" href="{{ url('admin/dashboard') }}">
                                                        <i class="fa fa-list"></i> Admin Panel
                                                    </a>
                                                @endif
                                                <i class="fa-solid fa-right-from-bracket"></i>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">

                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        @endguest
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords"
                                aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->
