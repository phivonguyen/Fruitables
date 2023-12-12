        {{-- begin slidebar --}}
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
                <a class="sidebar-brand brand-logo" href="../../index.html"><img src="{{ asset('uploads/nothing/logoo.jpg') }}" alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="../../index.html"><img src="{{ asset('admin/images/logo-mini.svg') }}"
                        alt="logo" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="{{ asset('admin/images/cat copy.jpeg') }}" alt="profile" />
                            <span class="login-status online"></span>
                            <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column pr-3">
                            <span class="font-weight-medium mb-2">Duong Nx</span>
                            <span class="font-weight-normal">$3,333.00</span>
                        </div>
                        <span class="badge badge-danger text-white ml-3 rounded">3</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('admin/dashboard')}}">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                        aria-controls="ui-basic">
                        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        <span class="menu-title">FrontEnd </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/advertisement')}}">Advertisement</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/about')}}">About</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/product') }}">
                        <i class="mdi mdi-contacts menu-icon"></i>
                        <span class="menu-title">Product</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/orders') }}">
                        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        <span class="menu-title">Orders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/category') }}">
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                        <span class="menu-title">Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('admin/hero')}}">
                        <i class="mdi mdi-table-large menu-icon"></i>
                        <span class="menu-title">Hero Header</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/origin')}}">
                        <i class="mdi mdi-table-large menu-icon"></i>
                        <span class="menu-title">Origins</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="https://www.bootstrapdash.com/demo/breeze-free/documentation/documentation.html">
                        <i class="mdi mdi-file-document-box menu-icon"></i>
                        <span class="menu-title">Documentation</span>
                    </a>
                </li>
                <li class="nav-item sidebar-actions">
                    <div class="nav-link">
                        <div class="mt-4">
                            <div class="border-none">
                                <p class="text-black">Notification</p>
                            </div>
                            <ul class="mt-4 pl-0">
                                <li>Sign Out</li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- end sidebar -->
