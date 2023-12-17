@extends('layouts.admin')

@section('title', 'User Lists')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Users List</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('users/create') }}">Create</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> New User </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            @if (session('message'))
                <div class="alert alert-success">
                    <strong>success! </strong>{{ session('message') }}
                </div>
            @endif
            <div class="container mt-3">
                <table class="table table-striped" border=1>
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Avatar</td>
                            <td>Name</td>
                            <td>Role</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    @if (optional($item->user_detail)->avatar)
                                        <img src= "{{ asset($item->user_detail->avatar) }}"
                                            style="width:150px; height:150px;" alt="">
                                    @else
                                        <img src="{{ asset('assets/admin/images/user-ava.png') }}"
                                            style="width:150px; height:150px;" alt="">
                                    @endif
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @if ($item->roles == '1')
                                        <span class="badge rounded-pill bg-primary">Admin</span>
                                    @elseif ($item->roles == '0')
                                        <span class="badge rounded-pill bg-success">User</span>
                                        <!-- Display the status message as text if it doesn't match any of the above values -->
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('admin/users/' . $item->id . '/edit') }}"
                                        class="btn btn-warning">Edit</a>
                                    <a href="{{ url('admin/users/' . $item->id . '/delete') }}"
                                        onclick="return confirm('Are you sure you want to delete this Users ?')"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No User are existed</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
