<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('product.index', compact('products'));
    }

    public function create()
    {
        $product = new Product();

        return view('product.create', compact('product'));
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
        ]);

        try {
            DB::beginTransaction();

            $image = $request->file('image');
            $attr['image'] = $image->storeAs('images/product', date('YmdHis') . '.' . $image->extension());

            Product::create($attr);

            DB::commit();

            return redirect()->route('product.index')->with('success', 'Your product successfully added');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $attr = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,png,jpeg',
        ]);

        try {
            DB::beginTransaction();

            if ($request->file('image')) {
                Storage::delete($product->image);
                $image = $request->file('image');
                $attr['image'] = $image->storeAs('images/product', date('YmdHis') . '.' . $image->extension());
            } else {
                $attr['image'] = $product->image;
            }

            $product->update($attr);

            DB::commit();

            return redirect()->route('product.index')->with('success', 'Your product successfully updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        try {
            DB::beginTransaction();

            Storage::delete($product->image);
            $product->delete();

            DB::commit();

            return redirect()->route('product.index')->with('success', 'Your product successfully deleted');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
