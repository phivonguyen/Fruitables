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
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Your Name" name="name"
                            value="{{ $contact->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Enter Your Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Your Email"
                            name="email" value="{{ $contact->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Enter Your Subject</label>
                        <input type="text" class="form-control" id="subject" placeholder="Enter Your Subject"
                            name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Reply Mail</label>
                        <textarea class="form-control" id="message" rows="5" placeholder="Reply Mail" name="message" required></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
