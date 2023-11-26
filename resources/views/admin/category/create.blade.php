<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <form action="{{route("category/store")}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="basicInput" class="form-label">Basic Input</label>
            <input type="text" name="name" id="name" class="form-control" id="basicInput" placeholder="Enter text">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>