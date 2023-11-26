@extends('layouts.admin')
@section('title', 'Admin Categories List')

@section('content')
    <div class="page-header">
        <h3 class="page-title">Category List</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('category/create') }}">Create Category</a>
                </li>
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
            {{-- <a href="{{route("category/create")}}">create category</a> --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Created_at</td>
                        <td>Updated_at</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <a href="{{ route('category/edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('category/delete', $item->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection
