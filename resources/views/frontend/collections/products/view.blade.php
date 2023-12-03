@extends('layouts.app')
@section('title')
    {{ $product->meta_title }}
@endsection

@section('meta_keyword')
    {{ $product->meta_keyword }}
@endsection

@section('meta_description')
    {{ $product->meta_description }}
@endsection



@section('content')
    <!-- Single Product Start -->
    <div>
        <livewire:front-end.product.detail :category="$category" :product="$product" />
    </div>
    <!-- Single Product End -->
@endsection
@section('script')
    <link href="{{ asset('assets/layouts/css/jquery.exzoom.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/layouts/js/jquery.exzoom.js') }}"></script>
@endsection
