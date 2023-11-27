@extends('layouts.app')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop</h1>
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
                        <div class="col-xl-3">
                            <form id="searchForm" action="{{ route('search') }}" method="GET"
                                class="input-group w-100 mx-auto d-flex">
                                <input type="search" class="form-control p-3" name="keywords" placeholder="keywords"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3">
                                    <button type="submit"
                                        class="btn btn-primary" style="border: none; background-color: transparent;">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                        </form>
                    </div>
                    <div class="col-6"></div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4>Categories</h4>
                                    <ul id="category-list" class="list-unstyled fruite-categorie">
                                        @foreach ($categories as $category)
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#" class="category-link"
                                                        data-category="{{ $category->id }}">
                                                        <i class="fas fa-apple-alt me-2"></i>{{ $category->name }}
                                                    </a>
                                                    <span>({{ $category->products->count() }})</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h4 class="mb-2">Giá</h4>
                                <form id="priceFilterForm">
                                    <input type="range" class="form-range w-100" id="rangeInput" name="maxPrice"
                                        min="0" max="500" value="0">
                                    <output id="amount" name="amount" min-value="0" max-value="500"
                                        for="rangeInput">0</output>
                                </form>
                            </div>

                            {{-- <script>
                                            $(document).ready(function () {
                                                var rangeInput = $('#rangeInput');
                                                var form = $('#priceFilterForm');

                                                rangeInput.on('input', function () {
                                                    var maxPrice = rangeInput.val();
                                                    updateProductList(maxPrice);
                                                });

                                                function updateProductList(maxPrice) {
                                                    $.ajax({
                                                        type: 'GET',
                                                        url: '{{ route('shop.baled.filter') }}',
                                                        data: { maxPrice: maxPrice },
                                                        beforeSend: function () {
                                                            // Hiển thị chỉ số tải
                                                        },
                                                        success: function (data) {
                                                            $('#product-list').html(data);
                                                        },
                                                        error: function (error) {

                                                            console.log(error);
                                                        },
                                                        complete: function () {

                                                        }
                                                    });
                                                }
                                            });
                                        </script> --}}
                            <div class="col-lg-12">
                                <h4 class="mb-3">Featured products</h4>
                                <div class="d-flex align-items-center justify-content-start">
                                    <div class="rounded me-4" style="width: 100px; height: 100px;">
                                        <img src="img/featur-1.jpg" class="img-fluid rounded" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mb-2">Big Banana</h6>
                                        <div class="d-flex mb-2">
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="d-flex mb-2">
                                            <h5 class="fw-bold me-2">2.99 $</h5>
                                            <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-start">
                                    <div class="rounded me-4" style="width: 100px; height: 100px;">
                                        <img src="img/featur-2.jpg" class="img-fluid rounded" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mb-2">Big Banana</h6>
                                        <div class="d-flex mb-2">
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="d-flex mb-2">
                                            <h5 class="fw-bold me-2">2.99 $</h5>
                                            <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-start">
                                    <div class="rounded me-4" style="width: 100px; height: 100px;">
                                        <img src="img/featur-3.jpg" class="img-fluid rounded" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mb-2">Big Banana</h6>
                                        <div class="d-flex mb-2">
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="d-flex mb-2">
                                            <h5 class="fw-bold me-2">2.99 $</h5>
                                            <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center my-4">
                                    <a href="#"
                                        class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew
                                        More</a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                    <div class="position-absolute"
                                        style="top: 50%; right: 10px; transform: translateY(-50%);">
                                        <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        @if (isset($keywords))
                            <h2>Search Results for "{{ $keywords }}"</h2>
                        @endif
                        <div id="product-list" class="row g-4 justify-content-center">
                            @foreach ($products as $index => $post)
                                <div
                                    class="col-md-6 col-lg-6 col-xl-4 category-product category-{{ $post->category->id }}">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="{{ asset('storage/uploads/' . $post->image) }}"
                                                class="img-fluid w-100 rounded-top" alt="{{ $post->name }}">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                            style="top: 10px; left: 10px;">{{ $post->category->name }}</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4>{{ $post->name }}</h4>
                                            <p>{{ $post->description }}</p>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">
                                                    ${{ number_format($post->price, 2) }} / kg</p>
                                                <a href="#"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (($index + 1) % 3 == 0)
                                @endif
                            @endforeach
                            {{-- <div style="justify-content: center; display: flex;">
                                {{ $products->links() }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Fruits Shop End-->
@endsection
