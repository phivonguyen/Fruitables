<div>
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Cart</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Collections</a></li>
            <li class="breadcrumb-item active text-white">Carts</li>
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
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cart as $item)
                            @if ($item->product)
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <a
                                                href="{{ url('collections/' . $item->product->category->slug . '/' . $item->product->slug) }}">
                                                @if ($item->product->productImage)
                                                    <img src="{{ asset($item->product->productImage[0]->image) }}"
                                                        class="img-fluid me-5 rounded-circle"
                                                        style="width: 80px; height: 80px;"
                                                        alt="{{ $item->product->name }}">
                                                @else
                                                    <img src="{{ asset('assets/layouts/img/empty-img.jpg') }}"
                                                        class="img-fluid me-5 rounded-circle"
                                                        style="width: 80px; height: 80px;"
                                                        alt="{{ $item->product->name }}">
                                                @endif
                                            </a>
                                        </div>
                                    </th>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $item->product->name }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ number_format($item->product->selling_price) }} $</p>
                                    </td>
                                    <td>
                                        <div class="input-group quantity mt-4" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="decrementQuantity({{ $item->id }})"
                                                    class="btn btn-sm btn-minus rounded-circle bg-light border">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" readonly style="background-color: inherit;"
                                                class="form-control form-control-sm text-center border-0"
                                                value="{{ $item->quantity }}">
                                            <div class="input-group-btn">
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="incrementQuantity({{ $item->id }})"
                                                    class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">
                                            {{ number_format($item->product->selling_price * $item->quantity) }}
                                            $
                                        </p>
                                        @php
                                            $totalPrice += $item->product->selling_price * $item->quantity;
                                        @endphp
                                    </td>

                                    <td>
                                        <button type="button" wire:loading.attr="disabled"
                                            wire:click="removeCartItem( {{ $item->id }} )"
                                            class="btn btn-md rounded-circle bg-light border mt-4">
                                            <span wire:loading.remove
                                                wire:target="removeCartItem( {{ $item->id }} )">
                                                <i class="fa fa-times text-danger"></i>
                                            </span>
                                            <span wire:loading wire:target="removeCartItem( {{ $item->id }} )">
                                                <i class="fa fa-times text-danger"></i> Removing...
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <td colspan="6">
                                <div class=""
                                    style="display: flex; justify-content: center; align-items: center;">
                                    <img src="{{ asset('assets/layouts/img/empty-cart.png') }}" alt=""
                                        style="text-align: center">
                                </div>

                                <br>
                                <div class=""
                                    style="display: flex; justify-content: center; align-items: center;">
                                    <a href="{{ url('collections') }}"
                                        class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary" style="text-align: center"></i>
                                        Go to Shop Now!
                                    </a>
                                </div>
                            </td>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-5">
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
                                @php
                                    $totalPriceVAT = $totalPrice * 1.1;
                                @endphp
                                <p class="mb-0">${{ number_format($totalPrice) }}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping</h5>
                                <div class="">
                                    <p class="mb-0">VAT rate: 10%</p>
                                </div>
                            </div>
                            <p class="mb-0 text-end">Shipping to ???.</p>
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total: </h5>
                            <p class="mb-0 pe-4">${{ number_format($totalPriceVAT) }}</p>
                        </div>
                        <a href="{{ url('/checkout') }}">
                            <button
                                class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                                type="button">
                                Proceed Checkout
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->
</div>
