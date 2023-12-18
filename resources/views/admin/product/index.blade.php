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
            @if (session('message'))
                <div class="alert alert-success">
                    <strong>success!</strong>{{ session('message') }}
                </div>
            @endif
            <div class="container mt-3">
                <table class="table table-striped" border=1>
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Image</td>
                            <td>Product</td>
                            <td>Category</td>
                            <td>Description</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    @if ($item->productImage->first() )
                                        <img src= "{{ asset($item->productImage->first()->image) }}" style="width:150px; height:150px;"
                                            alt="">
                                    @else
                                        No Image Available
                                    @endif
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @if ($item->category->name)
                                        {{ $item->category->name }}
                                    @else
                                        No Category available
                                    @endif
                                </td>
                                <td>{{ substr($item->description, 0, 30) }}...</td>
                                <td>{{ $item->original_price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="{{ url('admin/product/' . $item->id . '/edit') }}"
                                        class="btn btn-warning">Edit</a>
                                    <a href="{{ route('product/delete', $item->id) }}"
                                        onclick="return confirm('Are you sure you want to delete this product ?')"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No product available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
