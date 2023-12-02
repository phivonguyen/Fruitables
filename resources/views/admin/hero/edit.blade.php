@extends('layouts.admin')
@section('content')
    <div class="container mt-3">
        <div class="page">
            <div class="page-header">
                <h3 class="page-title">Edit Hero Header Form</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('hero.index') }}">Back to List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Hero Header </li>
                    </ol>
                </nav>
            </div>


            <form action="{{ url('admin/hero/' . $hero->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter Title" class="form-control"
                        value="{{ $hero->title }}">
                </div>

                <div class="mb-3">
                    <label for="images" class="form-label">Images</label>
                    <input type="file" name="image" class="form-control">
                    <img src="{{ asset("$hero->image") }}" style="width:50px; height:50px;">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="editor" name="description" rows="4" class="form-control">{{ $hero->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Href</label>
                    <input type="text" name="href" id="href" placeholder="Enter Href" class="form-control"
                        value="{{ $hero->href }}">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Status</label>
                    <input type="checkbox" name="status" {{ $hero->status == '0' ? '' : 'checked' }}
                        style="width: 20px; height:20px" />
                    <br>
                    Checked=Hidden,
                    <br>
                    Uncheck=visible
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    @endsection

    @section('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endsection
