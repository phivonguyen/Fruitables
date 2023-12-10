@extends('layouts.app')

@section('title', 'Orders List')

@section('content')

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Orders List</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Cart</a></li>
            <li class="breadcrumb-item active text-white">Order</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            @if (session('error'))
                <div class="alert alert-error">
                    <strong>Error! </strong>{{ session('error') }}
                </div>
            @endif
            @if (session('message'))
                <div class="alert alert-success">
                    <strong>Message: </strong>{{ session('message') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tracking Number</th>
                            <th scope="col">User</th>
                            <th scope="col">Payment Way</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $item)
                            <tr>
                                <td class="mb-0 mt-4">
                                    {{ $item->tracking_no }}
                                </td>
                                <td class="mb-0 mt-4">
                                    <p>{{ $item->fullname }}</p>
                                </td>
                                <td class="mb-0 mt-4">
                                    <p>{{ $item->payment_mode }}</p>
                                </td>
                                <td class="mb-0 mt-4">
                                    <p>{{ $item->created_at->format('d-m-Y') }}</p>
                                </td>
                                <td class="mb-0 mt-4">
                                    <p>
                                        @if ($item->status_message == 'In Progress...')
                                            <span class="badge rounded-pill bg-primary">In Progress...</span>
                                        @elseif ($item->status_message == 'completed')
                                            <span class="badge rounded-pill bg-success">Completed</span>
                                        @elseif ($item->status_message == 'pending')
                                            <span class="badge rounded-pill bg-warning text-dark">Pending</span>
                                        @elseif ($item->status_message == 'cancelled')
                                            <span class="badge rounded-pill bg-danger">Cancelled</span>
                                        @elseif ($item->status_message == 'out-for-delivery')
                                            <span class="badge rounded-pill bg-info text-dark">Out for Delivery</span>
                                        @else
                                            {{ $item->status_message }}
                                            <!-- Display the status message as text if it doesn't match any of the above values -->
                                        @endif
                                    </p>
                                </td>
                                <td>
                                    <a href="{{ url('orders/' . $item->id) }}" class="btn btn-primary btn-sm">Details</a>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6">
                                <div class="" style="display: flex; justify-content: center; align-items: center;">
                                    <img src="{{ asset('assets/layouts/img/no-order.png') }}" alt=""
                                        style="text-align: center">
                                </div>

                                <br>
                                <div class="" style="display: flex; justify-content: center; align-items: center;">
                                    <a href="{{ url('collections') }}"
                                        class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary" style="text-align: center"></i>
                                        Go to Order Now!
                                    </a>
                                </div>
                            </td>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->
@endsection
