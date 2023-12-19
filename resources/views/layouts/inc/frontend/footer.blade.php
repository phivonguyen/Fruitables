<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
    <div class="container py-5">
        <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
            <div class="row g-4">
                <div class="col-lg-3">
                    <a href="#">
                        <h1 class="text-primary mb-0">Fruitables</h1>
                        <p class="text-secondary mb-0">Fresh products</p>
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative mx-auto">
                        <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number"
                            placeholder="Your Email">
                        <button type="submit"
                            class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white"
                            style="top: 0; right: 0;">Subscribe Now</button>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="d-flex justify-content-end pt-3">
                        @if($appSetting->twitter)
                        <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href="{{$appSetting->twitter}}" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        @endif
                        @if($appSetting->facebook)
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="{{$appSetting->facebook}}" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        @endif
                        @if($appSetting->youtube)
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="{{$appSetting->youtube}}" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                        @endif
                        @if($appSetting->instragram)
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="{{$appSetting->instragram}}" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Why People Like us!</h4>
                    <p class="mb-4">Fruits and vegetables contain many vitamins and minerals that are good for your health.
                        Many of these are antioxidants,
                        and may reduce the risk of many diseases: vitamin A (beta-carotene)</p>
                    {{-- <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a> --}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Shop Info</h4>
                    <a class="btn-link" href="{{ url('/aboutUs') }}">About Us</a>
                    <a class="btn-link" href="{{ url('/contactUs') }}">Contact Us</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Account</h4>
                    <a class="btn-link" href="">My Account</a>
                    <a class="btn-link" href="{{ url('/collections') }}">Collections</a>
                    <a class="btn-link" href="{{ url('carts') }}">Shopping Cart</a>
                    <a class="btn-link" href="{{ url('wishlist') }}">Wishlist</a>
                    <a class="btn-link" href="{{ url('/orders') }}">My Order</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Contact</h4>
                    <p>Address: {{ $appSetting->address }}</p>
                    <p>Email: {{ $appSetting->email1 }}</p>
                    <p>Phone: {{ $appSetting->phone1 }}</p>
                    <p>Payment Accepted: Paypal</p>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
        class="fa fa-arrow-up"></i></a>
