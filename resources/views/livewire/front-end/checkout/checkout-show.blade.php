<div>
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Checkout</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Collections</a></li>
            <li class="breadcrumb-item active text-white">Checkout</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Checkout Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="mb-4">Billing details</h1>
            @if ($this->totalProductAmount != '0')
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">Full Name<sup>*</sup></label>
                                    <input type="text" wire.model="fullname" id="fullname" class="form-control"
                                        placeholder="Full Name">
                                    @error('fullname')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Full Address <sup>*</sup></label>
                            <textarea wire:model="address" id="address" name="address" class="form-control" rows="2">{{ old('address') }}</textarea>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                            <input type="number" wire:model="postcode" id="postcode" class="form-control"
                                placeholder="Enter Postcode/Zip" />
                            @error('postcode')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Mobile<sup>*</sup></label>
                            <input type="text" wire:model="phone" id="phone" class="form-control"
                                placeholder="Enter Phone Number" autofocus />
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Email Address<sup>*</sup></label>
                            <input type="email" wire:model="email" id="email" class="form-control"
                                placeholder="Enter Email Address" />
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <br>
                        <div class="form-item">
                            <textarea name="text" wire:model="user_description" id="user_description" class="form-control" spellcheck="false"
                                cols="30" rows="11" placeholder="Order Notes (Required)"></textarea>
                            @error('user_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-5">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Products</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $item)
                                        @if ($item->product)
                                            <tr>
                                                <th scope="row">
                                                    <div class="d-flex align-items-center mt-2">
                                                        <a
                                                            href="{{ url('collections/' . $item->product->category->slug . '/' . $item->product->slug) }}">
                                                            @if ($item->product->productImage)
                                                                <img src="{{ asset($item->product->productImage[0]->image) }}"
                                                                    class="img-fluid rounded-circle"
                                                                    style="width: 90px; height: 90px;"
                                                                    alt="{{ $item->product->name }}">
                                                            @else
                                                                <img src="{{ asset('assets/layouts/img/empty-img.jpg') }}"
                                                                    class="img-fluid rounded-circle"
                                                                    style="width: 90px; height: 90px;"
                                                                    alt="{{ $item->product->name }}">
                                                            @endif
                                                        </a>
                                                    </div>
                                                </th>
                                                <td class="py-5">{{ $item->product->name }}</td>
                                                <td class="py-5">
                                                    ${{ number_format($item->product->selling_price) }}
                                                </td>
                                                <td class="py-5">{{ $item->quantity }}</td>
                                                <td class="py-5">
                                                    ${{ number_format($item->product->selling_price * $item->quantity) }}
                                                </td>
                                                @php
                                                    $totalPrice += $item->product->selling_price * $item->quantity;
                                                @endphp
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark py-3">Sub Total</p>
                                        </td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">${{ number_format($totalProductAmount) }}</p>
                                            </div>
                                        </td>
                                        @php
                                            $totalPriceVAT = $totalPrice * 1.1 + 2;
                                        @endphp
                                    </tr>
                                    {{-- <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark py-4">Shipping</p>
                                        </td>
                                        <td colspan="3" class="py-5">
                                            <div class="form-check text-start">
                                                <input type="checkbox" class="form-check-input bg-primary border-0"
                                                    id="Shipping-1" name="Shipping-1" value="Shipping">
                                                <label class="form-check-label" for="Shipping-1">Free
                                                    Shipping</label>
                                            </div>
                                            <div class="form-check text-start">
                                                <input type="checkbox" class="form-check-input bg-primary border-0"
                                                    id="Shipping-2" name="Shipping-1" value="Shipping">
                                                <label class="form-check-label" for="Shipping-2">VAT rate:
                                                    10%</label>

                                            </div>
                                            <div class="form-check text-start">
                                                <input type="checkbox" class="form-check-input bg-primary border-0"
                                                    id="Shipping-3" name="Shipping-1" value="Shipping">
                                                <label class="form-check-label" for="Shipping-3">Services fee:
                                                    $2.00</label>
                                            </div>
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                        </td>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">$ {{ number_format($totalPriceVAT) }}
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        <div class="col-12">
                            <div class="form-check text-start my-3">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Transfer-1"
                                    name="Transfer" value="Transfer">
                                <label class="form-check-label" for="Transfer-1">Direct Bank Transfer</label>
                            </div>
                            <p class="text-start text-dark">Make your payment directly into our bank account.
                                Please use your Order ID as the payment reference. Your order will not be shipped
                                until the funds have cleared in our account.</p>
                        </div>
                    </div> --}}
                        {{-- <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="checkbox" class="form-check-input bg-primary border-0"
                                        id="Payments-1" name="Payments" value="Payments">
                                    <label class="form-check-label" for="Payments-1">Check Payments</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="checkbox" class="form-check-input bg-primary border-0"
                                        id="Delivery-1" name="Delivery" value="Delivery">
                                    <label class="form-check-label" for="Delivery-1">Cash On Delivery</label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    {{-- <label class="form-check-label" for="Paypal-1">Paypal</label> --}}
                                    <br>
                                    {{-- <div wire:ignore>
                                        <div id="paypal-button-container"></div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <button type="button" wire:loading.attr="disabled" wire:click="codOrder"
                                    class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">
                                    <span wire:loading.remove wire:target="codOrder">
                                        Place Order (Cash on Delivery)
                                    </span>
                                    <span wire:loading wire:target="codOrder">
                                        Placing Order
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button type="button" wire:loading.attr="disabled" wire:click="codOrder"
                            class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">
                            <span wire:loading.remove wire:target="codOrder">
                                Place Order (Cash on Delivery)
                            </span>
                            <span wire:loading wire:target="codOrder">
                                Placing Order
                            </span>
                        </button>
                    </div> --}}
                </div>
        </div>
    @else
        <div class="" style="display: flex; justify-content: center; align-items: center;">
            <img src="{{ asset('assets/layouts/img/empty-cart.png') }}" alt="" style="text-align: center">
        </div>

        <br>
        <div class="" style="display: flex; justify-content: center; align-items: center;">
            <a href="{{ url('collections') }}"
                class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                    class="fa fa-shopping-bag me-2 text-primary" style="text-align: center"></i>
                Go to Shop Now!
            </a>
        </div>
        @endif
    </div>
</div>
<!-- Checkout Page End -->
</div>

@push('scripts-payment')
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script
        src="https://www.paypal.com/sdk/js?client-id=AaDk8uQMlmq-7fV3eBJ6t4kVZ_bm1B9mEBaGQNVsPIDIZvwYulm7MOWHDPmna0JKNIovt6CrJW8gfJCh&currency=USD"
        onload="console.log('PayPal SDK loaded!')"></script>
    <script>
        paypal.Buttons({
            // onClick is called when the button is clicked
            onClick() {
                // Show a validation error if the checkbox is not checked
                if (!document.getElementById('fullname').value ||
                    !document.getElementById('phone').value ||
                    !document.getElementById('email').value ||
                    !document.getElementById('postcode').value ||
                    !document.getElementById('address').value
                ) {
                    Livewire.dispatch('validationForAll');
                    return false;
                } else {
                    @this.set('fullname', document.getElementById('fullname').value);
                    @this.set('phone', document.getElementById('phone').value);
                    @this.set('email', document.getElementById('email').value);
                    @this.set('postcode', document.getElementById('postcode').value);
                    @this.set('address', document.getElementById('address').value);
                }
            },
            createOrder: function(data, actions) {
                // var discountAmount = {{ session('discountAmount') ? session('discountAmount') : 0 }};
                // amountUSD = amountUSD - discountAmount;
                var amountUSD = "{{ $this->totalProductAmount }}";
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: amountUSD
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // This function will be executed after a successful transaction
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    if (transaction.status == "COMPLETED") {
                        Livewire.dispatch('transactionDispatch', {
                            value: transaction.id
                        });
                    }
                    //   alert('Transaction completed by ' + details.payer.name.given_name);
                    // Add any additional logic or redirect to a success page here
                });
            }
        }).render('#paypal-button-container');
    </script>
@endpush
