<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product\Product;

class PageController extends Controller
{
    public function index(): View
    {
        // $products = Product::latest()->get();

        return view('page.index', [
            // 'products' => $products,
        ]);
    }

    public function about(): View
    {
        return view('page.about');
    }
}
