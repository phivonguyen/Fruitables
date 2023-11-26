@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

<<<<<<< HEAD
                        {{-- {{ Auth::user()->username }} --}}
                    </div>

                    <br>
                    {{-- {{ $msg }} --}}
=======
                        {{ __('You are logged in!') }}
                    </div>

>>>>>>> 665727581f8d1104c805a8af26a380a45cd2c371
                </div>
            </div>
        </div>
    </div>
@endsection
