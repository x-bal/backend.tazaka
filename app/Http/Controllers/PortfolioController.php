<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::get();

        return view('portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        $portfolio = new Portfolio();
        $categories = Category::get();

        return view('portfolio.create', compact('portfolio', 'categories'));
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'client' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
        ]);

        try {
            DB::beginTransaction();

            $image = $request->file('image');
            $attr['image'] = $image->storeAs('images/portfolio', date('Ymd') . rand(1000, 9999) . '.' . $image->extension());

            Portfolio::create($attr);

            DB::commit();

            return redirect()->route('portfolio.index')->with('success', 'Portfolio successfully added');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Portfolio $portfolio)
    {
        //
    }

    public function edit(Portfolio $portfolio)
    {
        $categories = Category::get();

        return view('portfolio.edit', compact('portfolio', 'categories'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $attr = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'client' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,png,jpeg',
        ]);

        try {
            DB::beginTransaction();

            if ($request->file('image')) {
                Storage::delete($portfolio->image);
                $image = $request->file('image');
                $attr['image'] = $image->storeAs('images/portfolio', date('Ymd') . rand(1000, 9999) . '.' . $image->extension());
            } else {
                $attr['image'] = $portfolio->image;
            }

            $portfolio->update($attr);

            DB::commit();

            return redirect()->route('portfolio.index')->with('success', 'Portfolio successfully updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Portfolio $portfolio)
    {
        try {
            DB::beginTransaction();

            Storage::delete($portfolio->image);
            $portfolio->delete();

            DB::commit();

            return redirect()->route('portfolio.index')->with('success', 'Portfolio successfully deleted');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
