@extends('layouts.admin')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('users/index') }}">Back to User List</a></li>
        </ol>
    </nav>

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Edit Form</h4>
                <form action="{{ url('admin/users/' . $users->id) }}" method="post" enctype="multipart/form-data"
                    class="form-sample">
                    @csrf
                    @method('PUT')

                    <p class="card-description">User info</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" id="name" class="form-control" id="basicInput"
                                        value="{{ $users->name }}" placeholder="Enter name">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" id="email" class="form-control" readonly id="basicInput"
                                        value="{{ $users->email }}" placeholder="Enter email">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" placeholder="Enter username"
                                        value="{{ $users->username }}" />
                                    @error('username')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="text" name="password" id="password" class="form-control"
                                        id="basicInput" placeholder="Enter password">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Roles</label>
                                <div class="col-sm-9">
                                    <select name="roles" class="form-control">
                                        <option value="">Select Roles</option>
                                        <option value="0" {{ $users->roles == 0 ? 'selected' : '' }}>User</option>
                                        <option value="1" {{ $users->roles == 1 ? 'selected' : '' }}>Admin</option>
                                    </select>
                                    @error('roles')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" style="width: 100px" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
