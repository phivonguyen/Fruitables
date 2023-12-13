@extends('layouts.admin')

@section('title', 'Orders Details')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session()->has('message'))
                <div class="alert alert-warning">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Single Product Start -->
            <div class="container-fluid">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 col-xl-4">
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

                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-6">

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
                                        {{-- @if ($couponOrder !== null)
                                            <tr>
                                                <td colspan="5" class="fw-light">Total Products Amount </td>
                                                <td colspan="1" class="fw-light">{{ number_format($totalPrice) }} đ</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="fw-light">Total Discount Amount(Coupon Code: {{$couponOrder->code}}) </td>
                                                <td colspan="1" class="fw-light">{{ number_format($couponOrder->discount_amount) }} đ</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="fw-bold">Total Amount </td>
                                                <td colspan="1" class="fw-bold">{{ number_format($totalPrice - $couponOrder->discount_amount) }} đ</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="5" class="fw-bold">Total Amount </td>
                                                <td colspan="1" class="fw-bold">{{ number_format($totalPrice) }} đ</td>
                                            </tr>
                                        @endif --}}
                                        <tr>
                                            <td colspan="5" class="fw-bold">Total Amount</td>
                                            <td colspan="1" class="fw-bold">${{ number_format($totalPrice) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-2">
                            @php
                                $date = Request::get('date');
                                $previousDate = \Carbon\Carbon::parse($date)->format('Y-m-d');
                            @endphp
                            <a href="{{ url('admin/orders?date=' . $previousDate . '&status=') }}"
                                class="btn btn-danger btn-sm float-end mx-1">Back</a>
                                <br>
                                <br>
                            <a href="{{ url('admin/invoice/' . $order->id) }}" target="_blank"
                                class="btn btn-warning btn-sm float-end mx-1">View Invoice</a>
                        </div>
                    </div>
                    <div class="card border mt-3">
                        <div class="card-body">
                            <h4>Update Order Status</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <form action="{{ url('admin/orders/' . $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <label>Update Order Status</label>
                                        <div class="input-group">
                                            <select name="order_status" class="form-select">
                                                <option value="{{ $order->status_message }}">- -All Order Status- -
                                                </option>
                                                <option value="In Progress..."
                                                    {{ Request::get('status') == 'In Progress...' ? 'selected' : '' }}>In
                                                    progress
                                                </option>
                                                <option value="completed"
                                                    {{ Request::get('status') == 'completed' ? 'selected' : '' }}>Completed
                                                </option>
                                                <option value="pending"
                                                    {{ Request::get('status') == 'pending' ? 'selected' : '' }}>Pending
                                                </option>
                                                <option value="cancelled"
                                                    {{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>Cancelled
                                                </option>
                                                <option value="out-for-delivery"
                                                    {{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>
                                                    Out for
                                                    delivery</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary text-white">Update</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-7">
                                    <br>
                                    <h4 class="mt-3">Order Status: <span
                                            class="text-uppercase">{{ $order->status_message }}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Product End -->


        </div>
    </div>
@endsection
