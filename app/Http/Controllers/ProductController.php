<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{




    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.products', compact('product'));
    }

    public function popular()
    {
        $products = Product::orderBy('views', 'desc')->take(10)->get();
        return view('pages.popular', compact('products'));
    }
    public function recent()
    {
        $products = Product::latest('views', 'desc')->take(5)->get();
        return view('pages.recent', compact('products'));
    }

}
