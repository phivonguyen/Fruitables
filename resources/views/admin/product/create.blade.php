@extends('layouts.admin')
@section('content')

    <form action="{{ route('product/store') }}" method="post" enctype="multipart/form-data" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image[]" multiple id="image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" placeholder="Enter description"
                class="form-control">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" name="price" id="price" placeholder="Enter price" class="form-control">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @endsection
