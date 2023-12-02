@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="page">
                <div class="page-header">
                    <h3 class="page-title">Add Hero Header Form</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('hero.index') }}">Back to List</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> New Hero Header </li>
                        </ol>
                    </nav>
                </div>
                <form action="{{ route('hero/store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Title</label>
                        <input type="text" name="title" id="title" placeholder="Enter title" class="form-control">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" multiple id="image" class="form-control">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="editor" name="description" rows="4" class="form-control"></textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Status</label>
                        <input type="checkbox" name="status" style="width: 20px; height:20px" />
                        <br>
                        Checked=Hidden
                        <br>
                        Uncheck=visible
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Href</label>
                        <input type="text" name="href" id="href" placeholder="Enter href" class="form-control">
                        @error('href')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>

    </div>
@endsection

@section('scripts')

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
