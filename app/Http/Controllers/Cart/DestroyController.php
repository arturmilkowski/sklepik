<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Product\Type;

// use App\Services\Cart;

class DestroyController extends Controller
{
    public function __invoke(Type $type): RedirectResponse // Cart $cart,
    {
        // $cart->remove($type);

        return back();
    }
}
