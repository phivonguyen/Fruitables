@extends('layouts.admin')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">
            @if (session('message'))
                <div class="alert alert-success">
                    <h3>{{ session('message') }}</h3>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
                <div class="row">
                    <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                        <div class="card bg-warning">
                            <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="color-card">
                                        <p class="mb-0 color-card-head">Total Product:</p>
                                        <h2 class="text-white"> {{ $totalProducts }}
                                        </h2>
                                    </div>
                                    <i
                                        class="card-icon-indicator mdi mdi-numeric-1-box-multiple-outline bg-inverse-icon-warning"></i>
                                </div>
                                <h6 class="text-white">All product from Fruitables</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                        <div class="card bg-danger">
                            <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="color-card">
                                        <p class="mb-0 color-card-head">Total Origin:</p>
                                        <h2 class="text-white"> {{ $totalOrigins }}
                                        </h2>
                                    </div>
                                    <i
                                        class="card-icon-indicator mdi mdi-numeric-2-box-multiple-outline bg-inverse-icon-danger"></i>

                                </div>
                                <h6 class="text-white">Place(America, Japan)
                                    <br>
                                    origin(Walmart, Fruitables)
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                        <div class="card bg-primary">
                            <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="color-card">
                                        <p class="mb-0 color-card-head">Total Categories:</p>
                                        <h2 class="text-white">{{ $totalCategories }}
                                        </h2>
                                    </div>
                                    <i
                                        class="card-icon-indicator mdi mdi-numeric-3-box-multiple-outline bg-inverse-icon-primary"></i>
                                </div>
                                <h6 class="text-white">Defaults: Fruit, Meat, Vegetables, Tubers </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 stretch-card pb-sm-3 pb-lg-0">
                        <div class="card bg-success">
                            <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="color-card">
                                        <p class="mb-0 color-card-head">Total Users:</p>
                                        <h2 class="text-white">{{ $totalUsers }}
                                        </h2>
                                    </div>
                                    <i
                                        class="card-icon-indicator mdi mdi-numeric-4-box-multiple-outline bg-inverse-icon-success"></i>
                                </div>
                                <h6 class="text-white">All roles: Admin, User</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
                <div class="row">
                    <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                        <div class="card bg-info">
                            <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="color-card">
                                        <p class="mb-0 color-card-head">Total Orders:</p>
                                        <h2 class="text-white"> {{ $totalOrders }}
                                        </h2>
                                    </div>
                                    <i
                                        class="card-icon-indicator mdi mdi-numeric-5-box-multiple-outline bg-inverse-icon-info"></i>
                                </div>
                                <h6 class="text-white">Order: Which success checkout order!</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                        <div class="card bg-danger">
                            <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="color-card">
                                        <p class="mb-0 color-card-head">Today's Orders</p>
                                        <h2 class="text-white"> {{ $todayOrders }}
                                        </h2>
                                    </div>
                                    <i
                                        class="card-icon-indicator mdi mdi-numeric-6-box-multiple-outline bg-inverse-icon-danger"></i>
                                </div>
                                <h6></h6>
                                <h6 class="text-white">Today date: {{ $todayDate }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                        <div class="card bg-primary">
                            <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="color-card">
                                        <p class="mb-0 color-card-head">Orders for this month:</p>
                                        <h2 class="text-white"> {{ $monthOrders }}
                                        </h2>
                                    </div>
                                    <i
                                        class="card-icon-indicator mdi mdi-numeric-7-box-multiple-outline bg-inverse-icon-primary"></i>
                                </div>
                                <h6 class="text-white">Month: {{ $thisMonth }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 stretch-card pb-sm-3 pb-lg-0">
                        <div class="card bg-success">
                            <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="color-card">
                                        <p class="mb-0 color-card-head">Today Sales:</p>
                                        <h2 class="text-white">${{ number_format($todayRevenue) }}</h2>
                                    </div>
                                    <i
                                        class="card-icon-indicator mdi mdi-numeric-8-box-multiple-outline bg-inverse-icon-success"></i>
                                </div>
                                <h6 class="text-white">The revenue before deducting taxes and business lease expenses.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h3 class="text-center">Order of each month</h3>
                        </div>
                        <div class="row">
                            <canvas id="ordersChart"></canvas>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <script>
                                var ctx = document.getElementById('ordersChart').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: {!! json_encode($chartData['labels']) !!},
                                        datasets: [{
                                            label: 'Number of Orders each month',
                                            data: {!! json_encode($chartData['values']) !!},
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderColor: 'rgb(255, 0, 0)',
                                            borderWidth: 3
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                ticks: {
                                                    fontSize: 12 // Kích thước chữ trục y
                                                }
                                            },
                                            x: {
                                                ticks: {
                                                    fontSize: 12 // Kích thước chữ trục y
                                                }
                                            }
                                        },
                                        responsive: true,
                                        plugins: {
                                            legend: {
                                                position: 'top',
                                            },
                                            // title: {
                                            //     display: true,
                                            //     text: 'Order By Month',
                                            //     color: 'black',
                                            // }
                                        }
                                    }
                                });
                            </script>
                        </div>
                        <div class="row">
                            <h3 class="text-center">Product of each origins</h3>
                        </div>
                        <div class="row">
                            <div class="">
                                <canvas id="originProductChart"></canvas>
                                <script>
                                    var originLabels = {!! json_encode($chartData['originLabels']) !!};
                                    var originData = {!! json_encode($chartData['originData']) !!};

                                    var ctx = document.getElementById('originProductChart').getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: originLabels,
                                            datasets: [{
                                                label: 'Number of Products',
                                                data: originData,
                                                backgroundColor: 'rgb(0, 255, 0)',
                                                borderColor: 'rgb(0, 255, 0)',
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body px-0 overflow-auto">
                        <h4 class="card-title pl-4">Top 5 Users (Highest Order Revenue)</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($top5Users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    {{-- <img src="assets/images/faces/face1.jpg" alt="image" /> --}}
                                                    <div class="table-user-name ml-3">
                                                        <p class="mb-0 font-weight-medium"> {{ $user->name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>$ {{ number_format($user->top5_user) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- <a class="text-black mt-3 d-block pl-4" href="#">
                            <span class="font-weight-medium h6">View all order history</span>
                            <i class="mdi mdi-chevron-right"></i></a> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body px-0 overflow-auto">
                        <h4 class="card-title pl-4">Top 5 Best Product (Highest Product Order)</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Product</th>
                                        <th>Total Revenue</th>
                                        <th>Total Quantity Sold</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($top5Products as $product)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    {{-- <img src="assets/images/faces/face1.jpg" alt="image" /> --}}
                                                    <div class="table-user-name ml-3">
                                                        <p class="mb-0 font-weight-medium"> {{ $product->name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>${{ number_format($product->total_revenue) }}</td>
                                            <td>{{ $product->total_quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- <a class="text-black mt-3 d-block pl-4" href="#">
                            <span class="font-weight-medium h6">View all order history</span>
                            <i class="mdi mdi-chevron-right"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-black">Revenue By Month</h4>
                        <p class="text-muted">Created by anonymous</p>
                        <div class="list-wrapper">
                            <canvas id="revenueChart"></canvas>
                            <script>
                                var revenueLabels = {!! json_encode($chartData['revenueLabels']) !!};
                                var revenueData = {!! json_encode($chartData['revenueData']) !!};

                                var ctx = document.getElementById('revenueChart').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: revenueLabels,
                                        datasets: [{
                                            label: 'Revenue',
                                            data: revenueData,
                                            backgroundColor: 'rgb(0, 0, 255)',
                                            borderColor: 'rgb(0, 0, 255)',
                                            borderWidth: 2
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: false
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-black">How much Users compare to Admin?</h4>
                        <canvas id="roleChart"></canvas>
                        <script>
                            var roleLabels = {!! json_encode($chartData['roleLabels']) !!};
                            var roleData = {!! json_encode($chartData['roleData']) !!};

                            var ctx = document.getElementById('roleChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'polarArea',
                                data: {
                                    labels: roleLabels,
                                    datasets: [{
                                        data: roleData,
                                        backgroundColor: [
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                        ],
                                        borderColor: [
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(255, 159, 64, 1)',
                                            'rgba(255, 99, 132, 1)',
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {}
                            });
                        </script>
                        <a class="text-black mt-3 mb-0 d-block h6" href="{{ url('admin/users')}}">View all <i
                                class="mdi mdi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
