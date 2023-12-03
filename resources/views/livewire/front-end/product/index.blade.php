<div class="row">
    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">Fresh fruits shop</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="search" class="form-control p-3" placeholder="keywords"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i
                                        class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Sorting:</label>
                                <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                                    form="fruitform">
                                    <option value="volvo">All</option>
                                    <option value="saab">Popularity</option>
                                    <option value="opel">Organic</option>
                                    <option value="audi">Fantastic</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Origins</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            @if ($category->origins)
                                                @foreach ($category->origins as $originItem)
                                                    <li>
                                                        <div class="d-flex justify-content-between fruite-name">
                                                            <a href="javascript:void(0)">
                                                                <input type="checkbox" wire:model.live="originInputs"
                                                                    value="{{ $originItem->name }}">
                                                                <i
                                                                    class="fas fa-apple-alt me-2"></i>{{ $originItem->name }}
                                                                <span>({{ $category->origins()->count() }})</span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="javascript:void(0)"><i
                                                                class="fas fa-apple-alt me-2"></i>No Origin
                                                            available</a>
                                                        <span>(0)</span>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4 class="mb-2">Price</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="javascript:void(0)">
                                                        <input type="radio" wire:model.live="priceInput"
                                                            value="expensive-to-cheap" name="priceSort"> Cheap to
                                                        Expensive

                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="javascript:void(0)">
                                                        <input type="radio" wire:model.live="priceInput"
                                                            value="cheap-to-expensive" name="priceSort"> Expensive to
                                                        Cheap

                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Additional</h4>
                                        <div class="mb-2">
                                            <input type="radio" class="me-2" id="Categories-1" name="Categories-1"
                                                value="Beverages">
                                            <label for="Categories-1"> Organic</label>
                                        </div>
                                        <div class="mb-2">
                                            <input type="radio" class="me-2" id="Categories-2" name="Categories-1"
                                                value="Beverages">
                                            <label for="Categories-2"> Fresh</label>
                                        </div>
                                        <div class="mb-2">
                                            <input type="radio" class="me-2" id="Categories-3" name="Categories-1"
                                                value="Beverages">
                                            <label for="Categories-3"> Sales</label>
                                        </div>
                                        <div class="mb-2">
                                            <input type="radio" class="me-2" id="Categories-4" name="Categories-1"
                                                value="Beverages">
                                            <label for="Categories-4"> Discount</label>
                                        </div>
                                        <div class="mb-2">
                                            <input type="radio" class="me-2" id="Categories-5" name="Categories-1"
                                                value="Beverages">
                                            <label for="Categories-5"> Expired</label>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-lg-12">
                                    @if ($featuredProducts)
                                        <h4 class="mb-3">Featured products</h4>
                                        @foreach ($featuredProducts as $featured)
                                            <div class="d-flex align-items-center justify-content-start">
                                                <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                    <img src="{{ $featured->image }}" class="img-fluid rounded"
                                                        alt="">
                                                </div>
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
                                            <a href="#"
                                                class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">View
                                                More</a>
                                        </div>
                                    @else
                                        <div class="alert alert-success">
                                            No featured products available for {{ $category->name }}
                                        </div>
                                    @endif
                                </div> --}}

                                <div class="col-lg-12">
                                    <div class="position-relative">
                                        <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded"
                                            alt="">
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
                                                    <div
                                                        class="p-4 border border-secondary border-top-0 rounded-bottom">
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
</div>
