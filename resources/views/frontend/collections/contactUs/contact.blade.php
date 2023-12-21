@extends('layouts.app')
@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Contact</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Contact</li>
        </ol>
    </div>
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="p-5 bg-light rounded">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="text-center mx-auto" style="max-width: 700px;">
                            <h1 class="text-primary">CONTACT US</h1>
                        </div>
                    </div>
                    @if (isset($user))
                        <div>
                            <p>Name: {{ $user->name }}</p>
                            <p>Email: {{ $user->email }}</p>
                        </div>
                    @endif

                    <div class="col-lg-7">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('send.email') }}" class="" method="POST">

                            @csrf
                            <div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Name*"
                                    name="name">

                            </div>
                            <div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="email" class="w-100 form-control border-0 py-3 mb-4"
                                    placeholder="Enter Your Email*" name="email">

                            </div>
                            <div>
                                @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" class="w-100 form-control border-0 py-3 mb-4"
                                    placeholder="Enter Your subject*" name="subject">

                            </div>
                            <div>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Your Message*"
                                    name="message"></textarea>

                            </div>
                            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}" data-type="image" style="margin-bottom:10px"></div>
                            <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary "
                                type="submit">Submit</button>
                        </form>
                    </div>
                    <div class="col-lg-5">
                        <div class="d-flex p-4 rounded mb-4 bg-white">
                            <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Address</h4>
                                <a href="https://www.google.com/maps/place/123+q1,TpHCM+city" target="_blank">
                                    <p class="mb-2">123 q1, TpHCM city</p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex p-4 rounded mb-4 bg-white">
                            <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Mail Us</h4>
                                <a href="mailto:info@example.com">
                                    <p class="mb-2">info@example.com</p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex p-4 rounded bg-white">
                            <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Telephone</h4>
                                <a href="tel:+01234567890">
                                    <p class="mb-2">(+012) 3456 7890</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0" nonce="rxDxuLTf"></script>
@endsection
