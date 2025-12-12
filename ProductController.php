<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // List all products
    public function index()
    {
        $products = Product::all();
        return view('Products.index', ['products' => $products]);
    }

    // Show create product form
    public function create()
    {
        return view('Products.create');
    }

    // Store new product with optional image
    public function store(Request $request)
    {
        // Validate form inputs
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:2',
            'file' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Handle image upload if present
        if ($request->hasFile('file')) {
            $data['image'] = $request->file('file')->store('products', 'public');
        }

        // Create product
        Product::create($data);

        return redirect()->route('Products.index')->with('success', 'Product created successfully!');
    }

    // Show edit product form
    public function edit(Product $product)
    {
        return view('Products.edit', ['product' => $product]);
    }

    // Update product with optional image
    public function update(Product $product, Request $request)
    {
        // Validate inputs
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:2',
            'file' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Handle new image upload
        if ($request->hasFile('file')) {

            // Store new image
            $data['image'] = $request->file('file')->store('products', 'public');
        }

        // Update product
        $product->update($data);

        return redirect()->route('Products.index')->with('success', 'Product updated successfully!');
    }

    // Delete product
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('Products.index')->with('success', 'Product deleted successfully!');
    }
}
