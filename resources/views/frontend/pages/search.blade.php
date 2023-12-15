@extends('layouts.app')

@section('title', 'Search Products')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Collections
        </h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Collections</a></li>
            <li class="breadcrumb-item active text-white">Search</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">Search fruits shop</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-6"></div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">
                                @if (count($search) > 0)
                                    @foreach ($search as $product)
                                        <div class="col-md-6 col-lg-6 col-xl-4">
                                            <a
                                                href="{{ url('/collections/' . $product->category->slug . '/' . $product->slug) }}">
                                                <div class="rounded position-relative fruite-item">
                                                    <div class="fruite-img">
                                                        <img src="{{ asset($product->productImage->first()->image) }}"
                                                            class="img-fluid w-100 rounded-top"
                                                            style="width: 300px;height: 200px" alt="">
                                                    </div>
                                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                        style="top: 10px; left: 10px;">{{ $product->category->name }}
                                                    </div>
                                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                        <h4>{{ $product->name }}</h4>
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed
                                                            do
                                                            eiusmod te
                                                            incididunt</p>
                                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                                            <p class="text-dark fs-5 fw-bold mb-0">
                                                                ${{ $product->original_price }} / kg</p>
                                                            <a href="#"
                                                                class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                    class="fa fa-shopping-bag me-2 text-primary"></i>
                                                                Add
                                                                to
                                                                cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-md-12 col-lg-12">
                                        <div class="border border-secondary px-4 py-3 rounded-pill text-primary w-100">
                                            No
                                            Product is available for {{ $category->name }}</div>
                                        <img src="{{ asset('uploads/nothing/no-product-found.png') }}"
                                            class="img-fluid rounded"alt="" style="width: 970px; height: 588px">
                                        <div class="d-flex justify-content-center my-4">
                                            <a href="{{ route('collections') }}"
                                                class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Shop
                                                Another Now</a>

                                        </div>
                                    </div>
                                @endif
                                <div class="col-12">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->

@endsection
