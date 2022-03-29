<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category();

        return view('category.create', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        try {
            DB::beginTransaction();

            Category::create(['name' => $request->name]);

            DB::commit();

            return redirect()->route('category.index')->with('success', 'Categori successfully added');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required']);

        try {
            DB::beginTransaction();

            $category->update(['name' => $request->name]);

            DB::commit();

            return redirect()->route('category.index')->with('success', 'Categori successfully updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        try {
            DB::beginTransaction();

            $category->delete();

            DB::commit();

            return redirect()->route('category.index')->with('success', 'Categori successfully deleted');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
