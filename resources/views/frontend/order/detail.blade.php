@extends('layouts.app')

@section('title', 'Cart List')

@section('content')

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Orders Detail</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Orders</a></li>
            <li class="breadcrumb-item active text-white">My Order detail</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Single Product Start -->
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            @if (session()->has('message'))
                <div class="alert alert-warning">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-9">
                    <a href="{{ url('orders') }}" class="btn btn-danger btn-sm float-end">Back</a>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3">Order Details</h4>
                            <p class="mb-3">Order Id: {{ $order->id }}</p>
                            <p class="mb-3">Tracking No: {{ $order->tracking_no }}</p>
                            <p class="mb-3">Order Date: {{ $order->created_at->format('d-m-Y h:i A') }}</p>
                            <p class="mb-3">
                                Payment Way: {{ $order->payment_mode }}
                            </p>
                            <p class="mb-3">
                            <h6 class="mb-3">
                                Order Status: {{ $order->status_message }}
                            </h6>
                            </p>

                        </div>
                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3">User Details</h4>
                            <p class="mb-3">Full name: {{ $order->fullname }}</p>
                            <p class="mb-3">Address: {{ $order->address }}</p>
                            <p class="mb-3">Email: {{ $order->email }}</p>
                            <p class="mb-3">Phone: {{ $order->phone }}</p>
                            <p class="mb-3">Post-code: {{ $order->postcode }}</p>
                        </div>
                        <div class="col-lg-12">
                            <h4 class="fw-bold mb-3">Order Items</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Item</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalPrice = 0;
                                        @endphp
                                        @foreach ($order->orderItem as $item)
                                            <tr>
                                                <td class="py-3">
                                                    {{ $item->id }}
                                                </td>
                                                <td class="py-3">
                                                    <div class="d-flex align-items-center mt-2">
                                                        <a
                                                            href="{{ url('collections/' . $item->product->category->slug . '/' . $item->product->slug) }}">
                                                            @if ($item->product->productImage)
                                                                <img src="{{ asset($item->product->productImage[0]->image) }}"
                                                                    class="img-fluid rounded-circle"
                                                                    style="width: 80px; height: 80px;"
                                                                    alt="{{ $item->product->name }}">
                                                            @else
                                                                <img src="{{ asset('assets/layouts/img/empty-img.jpg') }}"
                                                                    class="img-fluid rounded-circle"
                                                                    style="width: 80px; height: 80px;"
                                                                    alt="{{ $item->product->name }}">
                                                            @endif
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="py-3">{{ $item->product->name }}</td>
                                                <td class="py-3">
                                                    ${{ number_format($item->product->selling_price) }}
                                                </td>
                                                <td class="py-3">{{ $item->quantity }}</td>
                                                <td class="py-3">
                                                    ${{ number_format($item->product->selling_price * $item->quantity) }}
                                                </td>
                                                @php
                                                    $totalPrice += $item->quantity * $item->price;
                                                @endphp
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5" class="fw-bold">Total Amount</td>
                                            <td colspan="1" class="fw-bold">${{ number_format($totalPrice) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Single Product End -->

@endsection
