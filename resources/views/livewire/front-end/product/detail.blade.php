<div>
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">
            Fruitables
        </h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Collections</a></li>
            <li class="breadcrumb-item active text-white">{{ $category->name }}</li>
            <li class="breadcrumb-item active text-white">{{ $product->name }}</li>
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
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="bg-white border rounded" wire:ignore>
                                @if ($product->productImage)
                                    <div class="exzoom" id="exzoom">
                                        <!-- Images -->
                                        <div class="exzoom_img_box ">
                                            <ul class=' exzoom_img_ul'>
                                                @foreach ($product->productImage as $img)
                                                    <li><img src="{{ asset($img->image) }}" /></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="exzoom_nav"></div>
                                        <!-- Nav Buttons -->
                                        <p class="exzoom_btn">
                                            <a href="javascript:void(0);" class="exzoom_prev_btn">
                                                < </a>
                                                    <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                        </p>
                                    </div>
                                @else
                                    No image added
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6" style="position: relative">
                            @if ($product->quantity > 0)
                                <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                                    style="top: 10px; right: 10px;">In Stock</div>
                            @else
                                <div class="text-white bg-danger px-3 py-1 rounded position-absolute"
                                    style="top: 10px; right: 10px;">Out Of Stock</div>
                            @endif

                            <h4 class="fw-bold mb-3">{{ $product->name }}</h4>
                            <p class="mb-3">Category: {{ $category->name }}</p>
                            <h5 class="fw-bold mb-3">{{ $product->selling_price }} $</h5>
                            <h5 class="text-danger text-decoration-line-through">{{ $product->original_price }} $</h5>
                            <div class="d-flex mb-4">
                                {{-- <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i> --}}
                            </div>
                            <p class="mb-4">The exquisite taste of these fruits is truly a sensory delight. Each bite
                                is a burst of natural sweetness, a symphony of flavors that dances on the palate.</p>
                            <p class="mb-4">The freshness and juiciness are unparalleled, making every piece a juicy
                                and delectable treat. Nature's candy, indeed, and a testament to the bountiful and
                                delicious wonders of fruits.</p>

                            <div class="input-group quantity mb-5" style="width: 100px;">
                                <div class="input-group-btn" wire:click="decrementQuantity">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" wire:model.live='quantityCount'
                                    class="form-control form-control-sm text-center border-0"
                                    value="{{ $this->quantityCount }}">
                                <div class="input-group-btn" wire:click="incrementQuantity">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="button" wire:click="addToWishList({{ $product->id }})"
                                class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary">
                                <span wire:loading.remove wire:target="addToWishList">
                                    @if (session('checkWishlist') === true)
                                        <i class="fa fa-heart me-2" style="color: rgb(169, 14, 0)"></i>
                                    @else
                                        <i class="fa fa-heart me-2 text-primary"></i> Add to Wish Lists
                                    @endif
                                </span>
                                <span wire:loading wire:target="addToWishList">Wishing ... </span>
                            </button>

                            <button type="button" wire:click='addToCart({{ $product->id }})'
                                class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                            </button>
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button"
                                        role="tab" id="nav-about-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-about" aria-controls="nav-about"
                                        aria-selected="true">Description</button>
                                    {{-- <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                        id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                        aria-controls="nav-mission" aria-selected="false">Reviews</button> --}}
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-about" role="tabpanel"
                                    aria-labelledby="nav-about-tab">
                                    <p>{!! $product->description !!} </p>

                                    <div class="px-2">
                                        <div class="row g-4">
                                            <div class="col-6">
                                                <div
                                                    class="row text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Origin</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">{{ $product->origin }}</p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row bg-light text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Quality</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">Organic</p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Feature</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">
                                                            {{ $product->featured == true ? 'Super Featured' : 'not Featured' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row bg-light text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Treading:</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">
                                                            {{ $product->trending == true ? 'Trending right nowwww' : 'Not really famous' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="tab-pane" id="nav-mission" role="tabpanel"
                                    aria-labelledby="nav-mission-tab">
                                    <div class="d-flex">
                                        <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                            style="width: 100px; height: 100px;" alt="">
                                        <div class="">
                                            <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                            <div class="d-flex justify-content-between">
                                                <h5>Jason Smith</h5>
                                                <div class="d-flex mb-3">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <p>The generated Lorem Ipsum is therefore always free from repetition
                                                injected humour, or non-characteristic
                                                words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                            style="width: 100px; height: 100px;" alt="">
                                        <div class="">
                                            <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                            <div class="d-flex justify-content-between">
                                                <h5>Sam Peters</h5>
                                                <div class="d-flex mb-3">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <p class="text-dark">The generated Lorem Ipsum is therefore always free
                                                from repetition injected humour, or non-characteristic
                                                words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="nav-vision" role="tabpanel">
                                    <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et
                                        tempor sit. Aliqu diam
                                        amet diam et eos labore. 3</p>
                                    <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                                        labore.
                                        Clita erat ipsum et lorem et sit</p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="row g-4 fruite">
                        <div class="col-lg-12">
                            <div class="input-group w-100 mx-auto d-flex mb-4">
                                <input type="search" class="form-control p-3" placeholder="keywords"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i
                                        class="fa fa-search"></i></span>
                            </div>
                            <div class="mb-4">
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
                                <img src="{{ asset('assets/layouts/img/banner-fruits.jpg') }}"
                                    class="img-fluid w-100 rounded" alt="">
                                <div class="position-absolute"
                                    style="top: 50%; right: 10px; transform: translateY(-50%);">
                                    <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($category->relatedProducts)
                <h1 class="fw-bold mb-0">Related products</h1>
                <div class="vesitable">
                    <div class="owl-carousel vegetable-carousel justify-content-center">
                        @foreach ($category->relatedProducts as $item)
                            <div class="border border-primary rounded position-relative vesitable-item">
                                <a href="{{ url('collections/' . $item->category->slug . '/' . $item->slug) }}">
                                    @if ($item->productImage->first())
                                        <div class="vesitable-img">
                                            <img src="{{ asset($item->productImage->first()->image) }}"
                                                class="img-fluid w-100 rounded-top" alt="" style="width: 300px; height: 300px">
                                        </div>
                                    @else
                                        No Images Available
                                    @endif
                                </a>
                                @if ($category)
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                                        style="top: 10px; right: 10px;">{{ $category->name }}
                                    </div>
                                @endif
                                <div class="p-4 pb-0 rounded-bottom">
                                    <h4>{{ $item->name }}</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                        incididunt</p>
                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                        <p class="text-dark fs-5 fw-bold">${{ $item->selling_price }} / kg</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Single Product End -->
</div>

@push('scripts')
    <script>
        $(function() {

            $("#exzoom").exzoom({

                // thumbnail nav options
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,
                // autoplay
                "autoPlay": false,
                // autoplay interval in milliseconds
                "autoPlayTimeout": 2000

            });
        });
    </script>
@endpush
