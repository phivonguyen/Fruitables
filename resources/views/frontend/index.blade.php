@extends('layouts.app')

@section('title', 'Fruitable Homepage')

{{-- @section('styles')
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
@endsection --}}

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <h4 class="mb-3 text-secondary">100% Organic Foods</h4>
                    <h1 class="mb-5 display-3 text-primary">Organic Veggies & Fruits Foods</h1>
                    <div class="position-relative mx-auto">
                        <form action="{{ url('search') }}" method="GET" role="search">
                            <input ur value="" name="search"
                                class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="search"
                                placeholder="Search">

                            <button type="submit"
                                class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100"
                                style="top: 0; right: 25%;">Submit Now</button>
                        </form>


                    </div>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            @foreach ($heroes as $key => $hero)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }} rounded">
                                    @if ($hero->image)
                                        <img src="{{ asset("$hero->image") }}"
                                            class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                    @endif

                                    <a href="#" class="btn px-4 py-2 text-white rounded">{!! $hero->title !!}</a>
                                </div>
                            @endforeach

                            {{-- <div class="carousel-item rounded">
                                <img src="{{ asset('assets') }}/layouts/img/hero-img-2.jpg"
                                    class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">Vesitables</a>
                            </div> --}}
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Featurs Section Start -->
    <div class="container-fluid featurs py-5">
        <div class="container py-5">
            <div class="row g-4">
                @foreach ($advertisement as $post)
                    @if ($post->status == 'presently')
                        {{-- Bỏ qua và không hiển thị nếu trạng thái là inactive --}}
                        @continue
                    @endif
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-car-side fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>{{ $post->name }}</h5>
                                <p class="mb-0">{{ $post->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Featurs Section End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-4 text-start">
                        <h1>Our Organic Products</h1>
                    </div>
                    <div class="col-lg-8 text-end">
                        <ul class="nav nav-pills d-inline-flex text-center mb-5">
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill active all-products-link"
                                    data-bs-toggle="pill" href="#">
                                    <span class="text-dark" style="width: 130px;">All Products</span>
                                </a>
                            </li>
                            <ul id="category-list" class="nav nav-pills d-inline-flex text-center mb-5">
                                @foreach ($categories as $category)
                                    <li class="nav-item">
                                        <div class="d-flex m-2 py-2 bg-light rounded-pill category-link"
                                            data-category="{{ $category->id }}">
                                            <a href="#">
                                                <span class="text-dark" style="width: 130px;">{{ $category->name }}</span>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4 category-products">
                                    @foreach ($products as $product)
                                        <div
                                            class="col-md-6 col-lg-4 col-xl-3 category-product category-{{ $product->category->id }}">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    @if ($product->productImage->first())
                                                        <a
                                                            href="{{ url('collections/' . $product->category->slug . '/' . $product->slug) }}">
                                                            <img src="{{ asset($product->productImage->first()->image) }}"
                                                                class="img-fluid w-100 rounded-top"
                                                                alt="{{ $product->name }}"
                                                                style="width: 330px; height: 230px">
                                                        </a>
                                                    @else
                                                        <p>No Image Available</p>
                                                    @endif
                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                    style="top: 10px; left: 10px;">{{ $product->category->name }}</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{{ $product->name }}</h4>
                                                    <p>{{ $product->description }}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">
                                                            ${{ number_format($product->original_price, 2) }} / kg</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->


    <!-- Featurs Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="row g-4 justify-content-center">
                @foreach ($about as $post)
                    @if ($post->status == 'presently')
                        {{-- Bỏ qua và không hiển thị nếu trạng thái là inactive --}}
                        @continue
                    @endif

                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-secondary rounded border border-secondary">
                                <img src="{{ asset($post->image) }}" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-primary text-center p-4 rounded">
                                        <h5 class="text-white">{{ $post->name }}</h5>
                                        <h3 class="mb-0">{{ $post->description }}</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var elements = document.querySelectorAll('.status-presently');
                        elements.forEach(function(element) {
                            element.style.display = 'none';
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    <!-- Featurs End -->


    <!-- vesitable Shop Start-->
    <div class="container-fluid vesitable py-5">
        <div class="container py-5">
            <h1 class="mb-0">Fresh Organic Vegetables</h1>
            <div class="direction" style="position: relative;top:50px">
                <button id="prev" class="btn btn-primary position-absolute start-0 translate-middle-y">
                    <i class="fas fa-arrow-circle-left fa-2x"></i>
                </button>
                <button id="next" class="btn btn-primary position-absolute end-0 translate-middle-y">
                    <i class="fas fa-arrow-circle-right fa-2x"></i>
                </button>

                <script>
                    document.getElementById('next').onclick = function() {
                        const widthItem = document.querySelector('.item').offsetWidth;
                        document.getElementById('formList').scrollLeft += widthItem;
                    }
                    document.getElementById('prev').onclick = function() {
                        const widthItem = document.querySelector('.item').offsetWidth;
                        document.getElementById('formList').scrollLeft -= widthItem;
                    }
                </script>
            </div>
            <div id="formList">
                <div id="list">
                    @foreach ($products as $product)
                        <div class="item">
                            <a href="{{ url('collections/' . $product->category->slug . '/' . $product->slug) }}">
                                @if ($product->productImage->first())
                                    <img src="{{ asset($product->productImage->first()->image) }}"
                                        class="img-fluid w-100 rounded-top" alt="{{ $product->name }}"
                                        style="width: 330px; height: 230px">
                                @else
                                    <p>No Image Available</p>
                                @endif
                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                    style="top: 10px; left: 10px;">{{ $product->category->name }}</div>
                                <div class="content">
                                    <table width="100%" cellspacing="0">
                                        <h4>{{ $product->name }}</h4>
                                        <p>{{ substr($product->description, 0, 75) . '...' }}</p>

                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-0">
                                                ${{ number_format($product->original_price, 2) }} / kg</p>
                                            <a href="javascript(0)"
                                                class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                    class="fa fa-shopping-bag me-2 text-primary"></i> Check details</a>
                                    </table>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- vesitable Shop End -->


    <!-- Banner Section Start-->
    <div class="container-fluid banner bg-secondary my-5">
        <div class="container py-5">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <div class="py-4">
                        <h1 class="display-3 text-white">Fresh Exotic Fruits</h1>
                        <p class="fw-normal display-3 text-dark mb-4">in Our Store</p>
                        <p class="mb-4 text-dark">I wanted to express my appreciation for the outstanding fresh apples I
                            recently purchased from your store.
                            They were not only delicious but also showcased a level of freshness that truly made a
                            difference.
                            Thank you for providing such quality produce.</p>
                        <a href="{{ url('collections') }}"
                            class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="{{ asset('assets') }}/layouts/img/baner-1.png" class="img-fluid w-100 rounded"
                            alt="">
                        <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute"
                            style="width: 140px; height: 140px; top: 0; left: 0;">
                            <h1 style="font-size: 100px;">1</h1>
                            <div class="d-flex flex-column">
                                <span class="h2 mb-0">99$</span>
                                <span class="h4 text-muted mb-0">kg</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->


    <!-- Bestsaler Product Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-4">Trending Products</h1>
                <p>Our best-selling fruits, including juicy oranges, crisp apples, and succulent strawberries,
                    have captured the hearts and palates of many.
                    The secret lies in their exceptional quality, freshness, and delicious taste.</p>
            </div>
            <div class="row g-4">
                @foreach ($trendingProducts as $product)
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    @if ($product->productImage->first())
                                        <a
                                            href="{{ url('collections/' . $product->category->slug . '/' . $product->slug) }}">
                                            <img src="{{ asset($product->productImage->first()->image) }}"
                                                class="img-fluid w-100 rounded-top" alt="{{ $product->name }}"
                                                style="width: 330px; height: 230px; border-radius: 50%!important">
                                        </a>
                                    @else
                                        <p>No Image Available</p>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">{{ $product->name }}</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">${{ number_format($product->original_price, 2) }} / kg</h4>
                                    {{-- <a href="{{ route('chitiet', ['id' => $product->id]) }}"
                                    class="btn border border-secondary rounded-pill px-3 text-primary">
                                    <i class="fa fa-shopping-bag me-2 text-primary"></i> View product's detail
                                </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($loop->iteration == 6)
                    @break
                @endif
            @endforeach
        </div>
    </div>

    <!-- Bestsaler Product End -->


    <!-- Fact Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="bg-light p-5 rounded">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>satisfied customers</h4>
                            <h1>1963</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>quality of service</h4>
                            <h1>99%</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>quality certificates</h4>
                            <h1>33</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>Available Products</h4>
                            <h1>789</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact Start -->

    <!-- Bestsaler Product Start -->
    @if ($featuredProducts)
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                    <h1 class="display-4">Featured Products</h1>
                    <p>Our best-selling fruits, including juicy oranges, crisp apples, and succulent strawberries,
                        have captured the hearts and palates of many.
                        The secret lies in their exceptional quality, freshness, and delicious taste.</p>
                </div>
                <div class="row g-4">
                    @forelse ($featuredProducts as $product)
                        <div class="col-lg-6 col-xl-4">
                            <div class="p-4 rounded bg-light">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        @if ($product->productImage->first())
                                            <a
                                                href="{{ url('collections/' . $product->category->slug . '/' . $product->slug) }}">
                                                <img src="{{ asset($product->productImage->first()->image) }}"
                                                    class="img-fluid w-100 rounded-top" alt="{{ $product->name }}"
                                                    style="width: 330px; height: 230px; border-radius: 50%!important">
                                            </a>
                                        @else
                                            <p>No Image Available</p>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="h5">{{ $product->name }}</a>
                                        <div class="d-flex my-3">
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h4 class="mb-3">${{ number_format($product->selling_price, 2) }} / kg</h4>
                                        {{-- <a href="{{ route('chitiet', ['id' => $product->id]) }}"
                                    class="btn border border-secondary rounded-pill px-3 text-primary">
                                    <i class="fa fa-shopping-bag me-2 text-primary"></i> View product's detail
                                </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($loop->iteration == 6)
                        @break
                    @endif
                @empty
                    Not featured product available
                @endforelse
            </div>
        </div>
@endif

<!-- Bestsaler Product End -->


<!-- Tastimonial Start -->
<div class="container-fluid testimonial py-5">
    <div class="container py-5">
        <div class="testimonial-header text-center">
            <h4 class="text-primary">Our Testimonial</h4>
            <h1 class="display-5 mb-5 text-dark">Our Client Saying!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                        style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="{{ asset('assets') }}/img/testimonial-1.jpg" class="img-fluid rounded"
                                style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Client Name</h4>
                            <p class="m-0 pb-3">Profession</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                        style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="{{ asset('assets') }}/layouts/img/testimonial-1.jpg"
                                class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Client Name</h4>
                            <p class="m-0 pb-3">Profession</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                        style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="{{ asset('assets') }}/layouts/img/testimonial-1.jpg"
                                class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Client Name</h4>
                            <p class="m-0 pb-3">Profession</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tastimonial End -->

@endsection
@section('styles')
<style>
    .direction {
        text-align: center;
    }

    .direction button {
        font-family: cursive;
        font-weight: bold;
        background-color: white;
        border: none;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        transition: 0.5s;
        margin: 0 10px;
    }

    .item {
        border-radius: 15px;
        width: 300px;
        height: 500px;
        /* background-image: linear-gradient(to top, #AEC0CE, #ECECF2); */
        border-style: groove;
        border-width: 1px;
        border-style: #81c408;
        overflow: hidden;
        transition: 0.5s;
        margin: 10px;
        scroll-snap-align: start;
    }

    .item:hover {
        box-shadow: 1px 1px 0px 1px #81c408
    }

    .item .avatar {
        display: block;
        margin: 50px auto 10px;
        width: 100px;
        height: 150px;
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0 10px 15px #7e878d;
    }

    .item .content {
        padding: 30px;
    }

    .item .content table td {
        padding: 10px 0;
        border-bottom: 1px solid #AEC0CE;
    }

    .item .content table td:nth-child(2) {
        text-align: right;
    }

    .item .nameGroup {
        text-align: center;
        border-bottom: none !important;
    }

    #list {
        display: flex;
        width: max-content;
    }

    #formList {
        width: 1280px;
        max-width: 100%;
        overflow: auto;
        margin: 100px auto 50px;
        scroll-behavior: smooth;
        scroll-snap-type: both;
    }

    #formList::-webkit-scrollbar {
        display: none;
    }

    @media screen and (max-width: 1024px) {
        .item {
            width: calc(33.3vw - 20px);
        }

        .direction {
            display: none;
        }
    }

    @media screen and (max-width: 768px) {
        .item {
            width: calc(50vw - 20px);
        }

        .direction {
            display: none;
        }
    }
</style>
@endsection

@section('script')
<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/layouts/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assets/layouts/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/layouts/lib/lightbox/js/lightbox.min.js') }}"></script>
<script src="{{ asset('assets/layouts/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<!-- Template Javascript -->
<script src="{{ asset('assets/layouts/js/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- <script>
    $(document).ready(function() {
        $(".category-link").click(function(e) {
            e.preventDefault();
            var categoryId = $(this).data("category");
            $(".category-product").hide();
            $(".category-" + categoryId).show();
        });
    });
</script> --}}

<script>
    $(document).ready(function() {
        console.log("jQuery loaded successfully!");

        var allProducts = $(".category-product");
        var maxItemsToShow = 4;

        allProducts.slice(maxItemsToShow).addClass('d-none');
        $(".category-link").click(function(e) {
            e.preventDefault();
            var categoryId = $(this).data("category");

            $(".category-product").addClass('d-none');
            $(".category-" + categoryId).removeClass('d-none');
        });

        $(".all-products-link").click(function(e) {
            e.preventDefault();
            allProducts.slice(maxItemsToShow).removeClass('d-none');
        });
    });
</script>

@endsection
