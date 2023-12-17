@extends('layouts.app')
@section('title', 'Changes Password')
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Contact</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Users</a></li>
            <li class="breadcrumb-item active text-white">User Profiles</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- User Profile Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="p-5 bg-light rounded">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="text-center mx-auto" style="max-width: 700px;">
                            <h1 class="text-primary">Change Password</h1>
                            <p class="mb-4">
                                @if (session('message'))
                                    <p class="alert alert-error">{{ session('message') }}</p>
                                @endif
                                @if ($errors->any())
                                    <ul class="alert alert-danger mb-2">
                                        @foreach ($errors->all() as $error)
                                            <h5 class="text-danger">{{ $error }}</h5>
                                        @endforeach
                                    </ul>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <form action="{{ route('change-password') }}" method="POST">
                            @csrf
                            <input type="password" name="current_password" class="w-100 form-control border-0 py-3 mb-4"
                                placeholder="Your Current Password">
                            @error('current_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="password" name="password" class="w-100 form-control border-0 py-3 mb-4"
                                placeholder="Your New Password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="password" name="password_confirmation"
                                class="w-100 form-control border-0 py-3 mb-4" placeholder="Confirm Your New Password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary "
                                type="submit">Submit</button>
                            <a href="{{ url('profile') }}">Back to Profile</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- User Profile End -->

@endsection
