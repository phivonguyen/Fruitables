@extends('layouts.app')

@section('title', 'User Profiles')

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
                            <h1 class="text-primary">User Profiles</h1>
                            <p class="mb-4">
                                @if (session('message'))
                                    <p class="alert alert-success">{{ session('message') }}</p>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <form action="{{ route('profile/store') }}" class="" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="text" name="name" value="{{ Auth::user()->name }}"
                                class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="text" name="username" value="{{ Auth::user()->username }}"
                                class="w-100 form-control border-0 py-3 mb-4" placeholder="Your User Name">
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            @if (Auth::user()->user_detail != null && Auth::user()->user_detail->phone != null)
                                <input type="text" name="phone" value="{{ Auth::user()->user_detail->phone }}"
                                    class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Phone">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            @else
                                <input type="text" name="phone" value="{{old('phone')}}"
                                    class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Phone">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            @endif

                            <label class="w-100 py-3 mb-4">Avatar</label>
                            @if (Auth::user()->user_detail != null && Auth::user()->user_detail->avatar != null)
                                <input type="file" class="w-100 form-control border-0 py-3 mb-4" name="avatar">
                                <img src="{{ asset(Auth::user()->user_detail->avatar) }}" width="250px">
                                @error('avatar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            @else
                                <input type="file" class="w-100 form-control border-0 py-3 mb-4" name="avatar">
                                <img src="{{ asset('assets/admin/images/user-ava.png') }}" width="100px" height="100px">
                                @error('avatar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            @endif

                            <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary "
                                type="submit">Submit</button>
                        </form>
                    </div>
                    <div class="col-lg-3">
                        <a href="{{url('change-password')}}" class="btn btn-danger float-end">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- User Profile End -->

@endsection
