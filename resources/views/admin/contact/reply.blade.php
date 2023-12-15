@extends('layouts.admin')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('contact/index') }}">Back to List</a></li>
        </ol>
    </nav>

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Reply Form</h4>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                <form action="{{ route('send.email') }}" method="POST">
                    @csrf
                    <input type="hidden" name="customer_email" value="{{ $contact->email }}">
                    <div>
                        <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Name" name="name" value="{{ $contact->name }}">
                    </div>
                    <div>
                        <input type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Email" name="email" value="{{ $contact->email }}">
                    </div>
                    <div>
                        <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your subject" name="subject" >
                    </div>
                    <div>
                        <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="REPLY Mail" name="message"></textarea>
                    </div>
                    <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
