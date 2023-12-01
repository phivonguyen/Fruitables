@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Products List</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('product/create') }}">Create</a></li>
                <li class="breadcrumb-item active" aria-current="page"> New Product </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        @if (session('success'))
            <div class="alert alert-success">
                <strong>success!</strong>{{ session('success') }}
            </div>
        @endif
        <div class="container mt-3">
            <table class="table table-striped" border=1>
                <thead>
                    <tr>
                        <td>Image</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Price</td>
                        <td>Category</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>
                                @if ($item->image)
                                <?php $decodedImages = json_decode($item->image); ?>
                                @if ($decodedImages && count($decodedImages) > 0)
                                    <?php $firstImage = $decodedImages[0]; ?>
                                    <img src="{{ asset('uploads/' . $firstImage) }}" alt="Product Image" style="max-width: 300px;">
                                @endif
                            @endif
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->category_id }}</td>
                            <td>
                                <a href="{{ route('product/edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('product/delete', $item->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
