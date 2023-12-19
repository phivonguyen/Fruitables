        {{-- begin slidebar --}}
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
                {{-- <a class="sidebar-brand brand-logo" href="../../index.html"><img src="{{ asset('uploads/nothing/logoo.jpg') }}" alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="../../index.html"><img src="{{ asset('admin/images/logo-mini.svg') }}"
                        alt="logo" /></a> --}}
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('admin/dashboard')}}">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/settings') }}">
                        <i class="mdi mdi-contacts menu-icon"></i>
                        <span class="menu-title">Setting site</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-frontend" aria-expanded="false" aria-controls="ui-frontend">
                        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        <span class="menu-title">Home view </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-frontend">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/advertisement')}}">Advertisement</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/about')}}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/hero')}}">Hero Header</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-user" aria-expanded="false" aria-controls="ui-user">
                        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        <span class="menu-title">User </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-user">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/users')}}">View User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/users/create')}}">Add User</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-product" aria-expanded="false" aria-controls="ui-product">
                        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        <span class="menu-title">Product </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-product">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/product') }}">View Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/product/create')}}">Add Product</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
                        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        <span class="menu-title">Orders </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-orders">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/orders') }}">View Orders</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-categories" aria-expanded="false" aria-controls="ui-categories">
                        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        <span class="menu-title">Categories </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-categories">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/category') }}">View Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/category/create')}}">Add Categories</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/contact') }}">
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                        <span class="menu-title">Contact</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-origins" aria-expanded="false" aria-controls="ui-origins">
                        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        <span class="menu-title">Origins </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-origins">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/origin')}}">View Origins</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- end sidebar -->
