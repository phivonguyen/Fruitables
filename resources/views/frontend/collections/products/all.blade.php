@extends('layouts.app')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Collections
        </h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Collections</a></li>
            <li class="breadcrumb-item active text-white">Products</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">Fresh fruits shop</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Categories</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            @if ($listCat)
                                                @foreach ($listCat as $cat)
                                                    <li>
                                                        <div class="d-flex justify-content-between fruite-name">
                                                            <a href="{{ url('/collections/' . $cat->slug) }}">
                                                                <i class="fas fa-apple-alt me-2"></i>{{ $cat->name }}
                                                            </a>
                                                            <span>({{ $cat->products()->count() }})</span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>No category
                                                            available</a>
                                                        <span>(3)</span>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                </div>
                                <div class="col-lg-12">
                                </div>

                                <div class="col-lg-12">
                                    @if ($featuredProducts)
                                        <h4 class="mb-3">Featured products</h4>
                                        @foreach ($featuredProducts as $featured)
                                            <div class="d-flex align-items-center justify-content-start">
                                                <a
                                                    href="{{ url('collections/' . $featured->category->slug . '/' . $featured->slug) }}">
                                                    @if ($featured->productImage->first())
                                                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                            <img src="{{ asset($featured->productImage->first()->image) }}"
                                                                class="img-fluid rounded" alt="">
                                                        </div>
                                                    @else
                                                        No Images Available
                                                    @endif
                                                </a>
                                                    <div>
                                                        <h6 class="mb-2">{{ $featured->name }}</h6>
                                                        <div class="d-flex mb-2">
                                                            <h5 class="fw-bold me-2">{{ $featured->selling_price }} $</h5>
                                                            <h5 class="text-danger text-decoration-line-through">
                                                                {{ $featured->original_price }} $</h5>
                                                        </div>
                                                    </div>
                                            </div>
                                        @endforeach
                                        <div class="d-flex justify-content-center my-4">
                                            <a href="{{ url('collections/') }}"
                                                class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">View
                                                More</a>
                                        </div>
                                    @else
                                        <div class="alert alert-success">
                                            No featured products available for {{ $category->name }}
                                            <img src="{{ asset('uploads/nothing/no-product-found.png') }}"
                                                class="img-fluid rounded"alt="">
                                        </div>
                                    @endif
                                </div>

                                <div class="col-lg-12">
                                    <div class="position-relative">
                                        <img src="{{asset('assets/layouts/img/banner-fruits.jpg')}}" class="img-fluid w-100 rounded" alt="">
                                        <div class="position-absolute"
                                            style="top: 50%; right: 10px; transform: translateY(-50%);">
                                            <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">
                                @if (count($products) > 0)
                                    @foreach ($products as $product)
                                        <div class="col-md-6 col-lg-6 col-xl-4">
                                            <div class="rounded position-relative fruite-item">
                                                <a
                                                    href="{{ url('collections/' . $product->category->slug . '/' . $product->slug) }}">
                                                    <div class="fruite-img">
                                                        @if ($product->productImage->first())
                                                            <img src="{{ asset($product->productImage->first()->image) }}"
                                                                class="img-fluid w-100 rounded-top"
                                                                style="width: 300px;height: 200px" alt="">
                                                        @else
                                                            No Images Available
                                                        @endif
                                                    </div>
                                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                        style="top: 10px; left: 10px;">{{ $product->category->name }}
                                                    </div>
                                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                        <h4>{{ $product->name }}</h4>
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do
                                                            eiusmod te
                                                            incididunt</p>
                                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                                            <p class="text-dark fs-5 fw-bold mb-0">
                                                                ${{ number_format($product->original_price, 2, ',') }} / kg
                                                            </p>
                                                            <a href="#"
                                                                class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                    class="fa fa-shopping-bag me-2 text-primary"></i>View Details</a>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        {{-- {{$products->link()}} --}}
                                    @endforeach
                                    <div class="col-12">
                                        {{ $products->links() }}
                                    </div>
                                @else
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        No Product is available
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
@endsection
