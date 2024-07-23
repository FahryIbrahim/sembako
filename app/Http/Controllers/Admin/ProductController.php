<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->file('image')->store('images', 'public');
        } else {
            $filename = null;
        }

        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $filename
        ]);

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->file('image')->store('images', 'public');
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }
        } else {
            $filename = $product->image;
        }

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $filename
        ]);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }
        $product->delete();
        return redirect()->route('products.index');
    }
}
