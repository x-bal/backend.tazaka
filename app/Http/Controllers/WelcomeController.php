<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function detailproduct(Product $product)
    {
        return view('detail-product', compact('product'));
    }

    public function detailportfolio(Portfolio $portfolio)
    {
        return view('detail-portfolio', compact('portfolio'));
    }
}
