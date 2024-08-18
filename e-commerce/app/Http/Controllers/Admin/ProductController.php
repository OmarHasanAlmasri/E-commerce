<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Get all the products from the database
        $products = Product::all();
        // return view to show the products in table
        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'qty' => ['required'],
            'price' => ['required'],
            'image' => ['image']
        ]);

//        $product = new Product();
//        $product->name = $request->name;
//        $product->description = $request->description;
//        $product->price = $request->price;
//        $product->qty = $request->qty;
//        $product->save();
        $imageName = time() . "-" . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $imageName);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'qty' => $request->qty,
            'image' => $imageName
        ]);

        return to_route('admin.products.index')->with('success', 'Product has been created.');
    }

    public function destroy($id)
    {
        // Delete the product with the given id
        $product = Product::find($id);

        $product->delete();

        return back()->with('success', 'Product has been deleted');
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'qty' => ['required'],
            'price' => ['required']
        ]);

        $product = Product::find($id);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'qty' => $request->qty
        ]);

        return to_route('admin.products.index')->with('success', 'Product has been updated.');
    }
}
