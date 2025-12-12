<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
 <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
       <h1>Create a product</h1>
          <div>
            <a href="{{ route('Products.index') }}">View Product</a>
        </div><br>
       <div>
        @if ($errors->any())
          <ul>
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
             @endforeach
          </ul>
        @endif
       </div>
      <form method="POST" action="{{ route('Products.store') }}" enctype="multipart/form-data">

        @csrf
           <div>
            <Label>Name</Label>
            <input type="text" name="name" placeholder="Your Product Name">
           </div>

             <div>
            <Label>Quantity</Label>
            <input type="text" name="qty" placeholder="Quantity of product">
           </div>

             <div>
            <Label>Price</Label>
            <input type="text" name="price" placeholder="Product Price">
           </div>
          <div>
            <Label>Upload Image</Label>
            <input type="file" name="file" placeholder="Upload Image">
           </div>
           <div>
            <input type="submit" value="Save a New Product">
           </div>
       </form>
</body>
</html>
