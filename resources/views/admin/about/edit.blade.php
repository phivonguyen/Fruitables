@extends('layouts.admin')
@section('content')
    <div class="container mt-3">
        <h2>Edit advertisement</h2>
        <form action="{{ route('about/update', $about->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <img src="{{ asset($about->image) }}" alt="{{ $about->name }}" style="max-width: 200px; margin-bottom: 10px;">
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value="{{ $about->name }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" value="{{ $about->description }}"
                    class="form-control">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" {{ $about->status == 1 ? 'selected' : '' }}>Hidden</option>
                    <option value="0" {{ $about->status == 0 ? 'selected' : '' }}>Presently</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
