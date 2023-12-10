<div>
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Wishlist</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active text-white">My Wish Lists</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($wishlist as $item)
                            @if ($item->product)
                                <tr>
                                    <th scope="row">
                                        <a
                                            href="{{ url('collections/' . $item->product->category->slug . '/' . $item->product->slug) }}">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $item->product->productImage[0]->image }}"
                                                    class="img-fluid me-5 rounded-circle"
                                                    style="width: 250px; height: 150px;"
                                                    alt="{{ $item->product->name }}">
                                            </div>
                                        </a>
                                    </th>
                                    <td>
                                        <a
                                            href="{{ url('collections/' . $item->product->category->slug . '/' . $item->product->slug) }}">

                                            <p class="mb-0 mt-4">{{ $item->product->name }}</p>
                                        </a>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ number_format($item->product->selling_price) }} $</p>
                                    </td>
                                    <td>
                                        <button href="" wire:click="removeWishlistItem({{ $item->id }})"
                                            class="btn btn-md rounded-circle bg-light border mt-4">
                                            <span wire:loading.remove
                                                wire:target="removeWishlistItem({{ $item->id }})"><i
                                                    class="fa fa-times text-danger"></i> Remove</span>
                                            <span wire:loading wire:target="removeWishlistItem({{ $item->id }})"><i
                                                    class="fa fa-times text-danger"></i>Removing...</span>
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <td colspan="4">
                                <div class=""
                                    style="display: flex; justify-content: center; align-items: center;">
                                    <img src="{{ asset('assets/layouts/img/empty-wishlist.png') }}" alt=""
                                        style="text-align: center">
                                </div>

                                <br>
                                <div class=""
                                    style="display: flex; justify-content: center; align-items: center;">
                                    <a href="{{ url('collections') }}"
                                        class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary" style="text-align: center"></i>
                                        Go to Shop
                                    </a>
                                </div>
                            </td>
                        @endforelse
                    </tbody>
                </table>

            </div>
            {{-- <div class="mt-5">
                <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply
                    Coupon</button>
            </div>
            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p class="mb-0">$96.00</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping</h5>
                                <div class>
                                    <p class="mb-0">Flat rate: $3.00</p>
                                </div>
                            </div>
                            <p class="mb-0 text-end">Shipping to Ukraine.</p>
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4">$99.00</p>
                        </div>
                        <button
                            class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                            type="button">Proceed Checkout</button>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Cart Page End -->
</div>
