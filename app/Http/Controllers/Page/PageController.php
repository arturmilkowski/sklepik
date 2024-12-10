<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product\Product;
use App\Services\Cart;

class PageController extends Controller
{
    public function index(Cart $cart): View
    {
        $products = Product::latest()->get();

        return view('page.index', [
            'products' => $products,
            'cart' => $cart
        ]);
    }

    public function about(): View
    {
        return view('page.about');
    }
}
