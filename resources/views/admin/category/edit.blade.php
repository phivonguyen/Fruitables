@extends('layouts.admin')
@section('content')


    <div class="container mt-3">
        <h2>Edit Category</h2>
        <form action="{{ route('category/update', $category->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="images" class="form-label">Images</label>
                @foreach (json_decode($category->image) as $image)
                    <img src="{{ asset('uploads/'.$image) }}" alt="Current Image" style="max-width: 100px;">
                @endforeach
                <input type="file" name="images[]" id="images" class="form-control" multiple>
            </div>

            <!-- Add other fields as needed -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection
