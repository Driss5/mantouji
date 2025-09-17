<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
</head>
<body>
    <h2>Update Product</h2>
    <form action="{{ Route('updateProduct', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="file" class="input" name="image" value="{{ $product->image }}">
        <input type="text" placeholder="Product name" class="input" name="name" value="{{ $product->name }}">
        <button class="add-btn" type="submite">Update Product</button>
    </form>
</body>
</html>