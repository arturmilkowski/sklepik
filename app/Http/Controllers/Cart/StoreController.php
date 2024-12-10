<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
// use App\Services\Cart;
use App\Models\Product\Type;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Type $type): RedirectResponse // Cart $cart,
    {
        // $cart->add($type);

        return back();
    }
}
