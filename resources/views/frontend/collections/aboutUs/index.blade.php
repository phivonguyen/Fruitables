@extends('layouts.app')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">About us</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">About us</li>
        </ol>
    </div>

    <!-- Single Page Header End -->
    @foreach ($aboutUs as $about)
        <div style="display: flex;margin:100px 70px 50px 70px">
            <div style="margin-right: 50px">
                <img src="{{ $about->image }}" width="600px" height="350px" style="border-radius: 10px">
            </div>
            <div>
                <h1 style="color:rgb(31, 159, 31)">{{ $about->menu }}</h1>
                <i class="text-uppercase" style="font-family:sans-serif;color:black">
                    {{ $about->description }}</i>
            </div><br>
        </div>
        <div style="display: flex;margin:100px 70px 50px 70px">
            <div style="margin-right: 50px">
                <h1 style="color:rgb(31, 159, 31)">{{ $about->trademark }}</h1>
                <i class="text-uppercase" style="font-family:sans-serif;color:black">
                    {{ $about->des_trademark }}</i>
            </div><br>
            <div>
                <img src="{{ $about->image1 }}" width="600px" height="350px" style="border-radius: 10px">
            </div>

        </div>
    @endforeach
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="p-5 bg-light rounded">
                <div class="row g-4">
                    <div class="col-lg-12" style="display:flex">
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
                        <div class="h-100 rounded" style="position: relative;right:190px">
                            <iframe style="height: 400px;width:900px;border-radius:10px"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.26805637699!2d106.6792684387372!3d10.790769858974791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f6a752ab57b%3A0x2200ce7d4f57d1f5!2sFPT%20APTECH!5e0!3m2!1svi!2s!4v1702710459894!5m2!1svi!2s"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
