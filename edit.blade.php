<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>
<body>
       <h1>Edit a product</h1>
       <div>
        @if ($errors->any())
          <ul>
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
             @endforeach
          </ul>
        @endif
       </div>
       <form method="POST" action="{{ route('Products.update', ['product' => $product]) }}" class="c_form" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ $product->name }}" placeholder="Your Product Name">
    </div>

    <div>
        <label>Quantity</label>
        <input type="text" name="qty" value="{{ $product->qty }}" placeholder="Quantity of product">
    </div>

    <div>
        <label>Price</label>
        <input type="text" name="price" value="{{ $product->price }}" placeholder="Product Price">
    </div>

    <div>
        <label>Current Image</label><br>
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" width="150" alt="Product Image">
        @else
            No image uploaded
        @endif
    </div>

    <div>
        <label>Upload New Image</label>
        <input type="file" name="file">
    </div>

    <div>
        <input type="submit" value="Update the Product">
    </div>
</form>
</body>
</html>
