<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
=======

>>>>>>> 665727581f8d1104c805a8af26a380a45cd2c371
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<<<<<<< HEAD
<body>
    <form action="{{ route('product_detail/store') }}" method="post" enctype="multipart/form-data" class="mt-4">
        @csrf
    
=======

<body>
    <form action="{{ route('product_detail/store') }}" method="post" enctype="multipart/form-data" class="mt-4">
        @csrf

>>>>>>> 665727581f8d1104c805a8af26a380a45cd2c371
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
<<<<<<< HEAD
    
=======

>>>>>>> 665727581f8d1104c805a8af26a380a45cd2c371
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter name" class="form-control">
        </div>
<<<<<<< HEAD
    
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" placeholder="Enter description" class="form-control">
        </div>
    
=======

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" placeholder="Enter description"
                class="form-control">
        </div>

>>>>>>> 665727581f8d1104c805a8af26a380a45cd2c371
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" name="price" id="price" placeholder="Enter price" class="form-control">
        </div>
<<<<<<< HEAD
    
=======

>>>>>>> 665727581f8d1104c805a8af26a380a45cd2c371
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
<<<<<<< HEAD
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
</body>
</html>
=======

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>

</html>
>>>>>>> 665727581f8d1104c805a8af26a380a45cd2c371
