<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
=======

>>>>>>> 665727581f8d1104c805a8af26a380a45cd2c371
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
</head>
<<<<<<< HEAD
<body>


<div class="container mt-3">
    <h2>Edit Product</h2>
    <form action="{{ route('product/update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <img src="{{ asset('storage/uploads/'.$product->image) }}" alt="Current Image" style="max-width: 100px;">
            <input type="file" name="image" id="image" class="form-control">
        </div>
        
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter name" class="form-control" value="{{ $product->name }}">
        </div>
    
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" placeholder="Enter description" class="form-control" value="{{ $product->description }}">
        </div>
    
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" name="price" id="price" placeholder="Enter price" class="form-control" value="{{ $product->price }}">
        </div>
    
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>


</body>
=======

<body>


    <div class="container mt-3">
        <h2>Edit Product</h2>
        <form action="{{ route('product/update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <img src="{{ asset('storage/uploads/' . $product->image) }}" alt="Current Image"
                    style="max-width: 100px;">
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter name" class="form-control"
                    value="{{ $product->name }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" placeholder="Enter description"
                    class="form-control" value="{{ $product->description }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" id="price" placeholder="Enter price" class="form-control"
                    value="{{ $product->price }}">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>


</body>

>>>>>>> 665727581f8d1104c805a8af26a380a45cd2c371
</html>
