@extends('layouts.admin')
@section('content')
    <form action="{{ route('about/store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="basicInput" class="form-label">Input Image</label>
            <input type="file" name="image" id="image" class="form-control" id="basicInput" placeholder="Enter text">
        </div>
        <div class="mb-3">
            <label for="basicInput" class="form-label">Input name</label>
            <input type="text" name="name" id="name" class="form-control" id="basicInput"
                placeholder="Enter text">
        </div>
        <div class="mb-3">
            <label for="basicInput" class="form-label">Input description</label>
            <input type="text" name="description" id="description" class="form-control" id="basicInput"
                placeholder="Enter text">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="1">Hidden</option>
                <option value="0">Presently</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
