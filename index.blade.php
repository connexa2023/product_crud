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
    <h1>Products</h1>
    <div>
       @if (session()->has('success'))
<div class="success">
    {{ session('success') }}
</div>
@endif
    </div>
     <div class="table-section" >
        <div>
            <a href="{{ route('Products.create') }}">Create a New Product</a>
        </div><br>
        <table border="1" class="table-wrapper">
            <tr>

                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Image</th>
                <th>Delete</th>
            </tr>
               @foreach ($products as $product)
    <tr>
    <td>{{ $product->name }}</td>
    <td>{{ $product->qty }}</td>
    <td>{{ $product->price }}</td>
    <td><a href="{{route('Products.edit',['product'=>$product]) }}">Edit</a></td>
    <td>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" width="120">
            @else
                No Image
            @endif
        </td>
    <td>
    <form method="post" action="{{ route('Products.destroy',['product'=>$product]) }}" >
        @csrf
        @method('delete')
        <input type="submit" value="delete" class="delete-btn">
    </form>
</td>

</tr>

@endforeach

        </table>
    </div>
</body>
</html>
