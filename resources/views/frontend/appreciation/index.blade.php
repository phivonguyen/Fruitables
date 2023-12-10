@extends('layouts.app')

@section('title', 'Appreciate for shopping!')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Appreciation</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Collections</a></li>
            <li class="breadcrumb-item active text-white">Appreciation</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <div class="container-fluid py-5">
        <div class="container py-5">
            @if (session('error'))
                <div class="alert alert-error">
                    <strong>Error! </strong>{{ session('error') }}
                </div>
            @endif
            @if (session('message'))
                <div class="alert alert-success">
                    <strong>Message: </strong>{{ session('message') }}
                </div>
            @endif
            <div class="" style="display: flex; justify-content: center; align-items: center;">
                <img src="{{ asset('assets/layouts/img/thankyou.jpg') }}" style="width: 600px;height: 400px" alt=""
                    style="text-align: center">
            </div>

            <br>
            <div class="" style="display: flex; justify-content: center; align-items: center;">
                <a href="{{ url('/home') }}"
                    class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                        class="fa fa-shopping-bag me-2 text-primary" style="text-align: center"></i>
                    Go to Home Page!
                </a>
            </div>
        </div>
    </div>
@endsection
