<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request) {
        $newProduct = new Product();
        $newProduct->name = $request->input('name');
        $newProduct->user_id = auth()->id();
        $imagePath = $request->file('image')->store('products', 'public');
        $newProduct->image = $imagePath;
        $newProduct->save();
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function show() {
        $products = Product::where('user_id', auth()->id())->get();
        return view('pages.jammiya', ['products' => $products]);
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        // if ($product->user_id != auth()->id()) {
        //     return redirect()->back()->with('error', 'Unauthorized action.');
        // }
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

    // public function edite($id) {
    //     $product = Product::findOrFail($id);
    //     // if ($product->user_id != auth()->id()) {
    //     //     return redirect()->back()->with('error', 'Unauthorized action.');
    //     // }
    // }

}
