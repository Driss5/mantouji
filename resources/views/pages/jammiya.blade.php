<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/jammiya.css') }}">
    <title>Document</title>
</head>
<body>
    <nav class="navbar">
        <h1 class="logo">Mantouji</h1>
        <button id="menu-toggle" class="menu-btn">☰</button>
    </nav>

    <div id="sidebar" class="sidebar">
        <button class="side-btn">See Products</button>
        <button id="openModal" class="side-btn">Add New Product</button>
    </div>

    <div id="productModal" class="modal">
        <div class="modal-content">
            <span id="closeModal" class="close">&times;</span>
            <h2>Add New Product</h2>
            <form action="{{ Route('addProduct') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" class="input" name="image">
                <input type="text" placeholder="Product name" class="input" name="name">
                <button class="add-btn" type="submite">Add Product</button>
            </form>
        </div>
    </div>

    <div class="content">
     <!--<div class="product-card">
            <img src="https://via.placeholder.com/150" alt="Product Image" class="product-img">
            <h3 class="product-name">Product Name</h3>

            <div class="product-rating">
                <span>★</span>
                <span>★</span>
                <span>★</span>
                <span>★</span>
                <span>★</span>
            </div>

            <div class="product-actions">
                <button class="update-btn">✏️</button>
                <button class="delete-btn">🗑️</button>
            </div>

            <button class="show-comments-btn">Show Comments</button>
        </div>
    </div> -->

    @foreach ($products as $product)
        <div class="product-card">                                  
            <img src="{{ asset('storage/'.$product->image) }}" alt="Product Image" class="product-img">
            <h3 class="product-name">{{ $product->name }}</h3>

            <div class="product-rating">
                @for ($i = 0; $i < $product->reviews; $i++)
                    <span>★</span>
                @endfor
                ({{ $product->reviews_number }})
            </div>

            <div class="product-actions">
                <button class="update-btn" data-id="{{ $product->id }}" data-name="{{ $product->name }}">✏️</button>

            <!-- <a href="{{ Route('updateProduct', $product->id)}}">✏️</a> -->
                <form action="{{Route('deleteProduct', $product->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn">🗑️</button>
                </form>
            </div>
            <button class="show-comments-btn">Show Comments</button>
        </div>

    @endforeach

    <script src="{{asset('js/jammiya.js')}}"></script>

</body>
</html>