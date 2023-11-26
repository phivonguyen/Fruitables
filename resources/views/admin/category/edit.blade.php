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
=======

>>>>>>> 665727581f8d1104c805a8af26a380a45cd2c371
<body>


    <div class="container mt-3">
        <h2>Edit Category</h2>
        <form action="{{ route('category/update', $category->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control">
            </div>

            <!-- Add other fields as needed -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>


</body>
<<<<<<< HEAD
=======

>>>>>>> 665727581f8d1104c805a8af26a380a45cd2c371
</html>
