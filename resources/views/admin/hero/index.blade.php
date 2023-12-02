@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Heroes List</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('hero/create') }}">Create Hero Header</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> New Hero Header </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    <strong>success!</strong>{{ session('success') }}
                </div>
            @endif
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="container mt-3">
                <table class="table table-striped" border=1>
                    <thead>
                        <tr>
                            <td>Title</td>
                            <td>Image</td>
                            <td>Description</td>
                            <td>Status</td>
                            <td>Link for</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($heroes as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <img src="{{ asset("$item->image") }}" style="width:150px; height:150px;" alt="">
                                </td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->status == '0' ? 'Visible' : 'Hidden' }}</td>
                                <td>{{ $item->href }}</td>
                                <td>
                                    <a href="{{ url('admin/hero/' . $item->id . '/edit') }}"
                                        class="btn btn-warning">Edit</a>
                                    <a href="{{ url('admin/hero/' . $item->id . '/delete') }}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
