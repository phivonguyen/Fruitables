@extends('layouts.admin')
@section('content')
<form action="{{route("category/store")}}" method="post" enctype="multipart/form-data" class="mt-4">
    @csrf
    <div class="mb-3">
        <label for="basicInput" class="form-label">Input name of category</label>
        <input type="text" name="name" id="name" class="form-control" id="basicInput" placeholder="Enter text">
        @error('name') <small class="text-danger">{{$message}}</small> @enderror
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image[]" multiple id="image" class="form-control">
        @error('image') <small class="text-danger">{{$message}}</small> @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
